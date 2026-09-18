<?php
// ══════════════════════════════════════════════════════════════
// LIP Services — Claude API Proxy
// ══════════════════════════════════════════════════════════════
// Upload this file to your WordPress root: /public_html/chat-proxy.php
// It will be accessible at: https://lipservices.com.au/chat-proxy.php
//
// SETUP: Replace YOUR_API_KEY_HERE with your Anthropic API key.
// ══════════════════════════════════════════════════════════════

// ── Configuration ────────────────────────────────────────────
define('ANTHROPIC_API_KEY',    getenv('ANTHROPIC_API_KEY') ?: 'YOUR_API_KEY_HERE');
define('NOTIFICATION_EMAIL',   'rob@lipservices.com.au');
define('ALLOWED_ORIGIN',       'https://lipservices.com.au');
define('LIPS_CRM_URL',         'https://crm.lipservices.com.au');
define('ARIA_WEBHOOK_SECRET',  getenv('ARIA_WEBHOOK_SECRET') ?: 'YOUR_ARIA_WEBHOOK_SECRET_HERE');   // must match settings.aria_webhook_secret for LIP Services' org — see supabase/add_aria_webhook_secret.sql
// ─────────────────────────────────────────────────────────────

// CORS — only accept requests from your own domain
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
$allowed = [ALLOWED_ORIGIN, 'https://www.lipservices.com.au'];
if (in_array($origin, $allowed)) {
    header('Access-Control-Allow-Origin: ' . $origin);
}
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Handle preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$raw  = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!$data || !isset($data['action'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
    exit;
}

// ── Route: chat message — REMOVED 2026-09-18 ────────────────────
// This forwarded whatever `system` string the browser sent straight to
// Claude on ANTHROPIC_API_KEY, with no real check (the Origin check above
// only ever sets a response header, it never rejects a request) — an
// open, unauthenticated relay billed to Robert's own API key, confirmed
// live via a plan-check. The live conversation now happens server-side in
// LIPS-CRM's /api/aria/chat, which builds its own system prompt from the
// org's settings and never accepts one from the caller. See
// LIPS-CRM/lib/ariaChatPrompt.js and wordpress/divi-chat-embed.html's
// CHAT_API_URL. This ANTHROPIC_API_KEY constant is no longer used by this
// file at all — kept defined above only so a future action added here
// doesn't silently break if it's still referenced.

// ── Route: lead capture ───────────────────────────────────────
if ($data['action'] === 'lead') {

    $name       = htmlspecialchars($data['name']       ?? 'Unknown', ENT_QUOTES);
    $email      = htmlspecialchars($data['email']      ?? 'Not provided', ENT_QUOTES);
    $transcript = htmlspecialchars($data['transcript'] ?? 'No transcript', ENT_QUOTES);
    $timestamp  = date('d M Y, g:ia T');

    $subject = "New chat lead — {$name}";
    $body    = "A visitor completed a chat conversation with Aria on lipservices.com.au.\n\n"
             . "Name:      {$name}\n"
             . "Email:     {$email}\n"
             . "Captured:  {$timestamp}\n\n"
             . "── Transcript ──────────────────────────────\n\n"
             . strip_tags($transcript);

    $headers = "From: Aria <noreply@lipservices.com.au>\r\n"
             . "Reply-To: {$email}\r\n"
             . "Content-Type: text/plain; charset=UTF-8";

    $sent = mail(NOTIFICATION_EMAIL, $subject, $body, $headers);

    echo json_encode(['ok' => $sent]);
    exit;
}

// ── Route: Aria lead capture → LIPS-CRM ──────────────────────
if ($data['action'] === 'lead_capture') {

    $log          = $data['conversation_log'] ?? '';
    $log_lower    = strtolower($log);
    $name         = $data['name']         ?? null;
    $email        = $data['email']        ?? null;
    $phone        = $data['phone']        ?? null;
    $lead_status  = $data['lead_status']  ?? 'COLD';
    $lead_source  = $data['lead_source']  ?? 'website_chatbot';

    // Classify pain point from conversation log
    $pain_point = 'PAIN_GENERAL';
    if (preg_match('/lead.?gen|outreach|prospect|find.?client/i', $log))            $pain_point = 'PAIN_LEADS';
    elseif (preg_match('/missed.?call|receptionist|after.?hours|answer.?call/i', $log)) $pain_point = 'PAIN_CALLS';
    elseif (preg_match('/book|appointment|schedul|calendar/i', $log))               $pain_point = 'PAIN_BOOKING';
    elseif (preg_match('/google.?ads|meta.?ads|facebook.?ads|paid.?ads/i', $log))  $pain_point = 'PAIN_ADS';
    elseif (preg_match('/crm|workflow|automat|admin|spreadsheet/i', $log))          $pain_point = 'PAIN_ADMIN';
    elseif (preg_match('/price|cost|how.?much|fee|charge|afford/i', $log))          $pain_point = 'PAIN_PRICING';

    // Classify business type from conversation log
    $business_type = 'BIZ_OTHER';
    if (preg_match('/plumb|electri|tradie|builder|contractor|roofer|landscap|hvac|air.?con/i', $log))          $business_type = 'BIZ_TRADES';
    elseif (preg_match('/physio|chiro|allied.?health|wellness|gym|personal.?train|salon|beauty/i', $log))      $business_type = 'BIZ_HEALTH';
    elseif (preg_match('/lawyer|solicitor|accountant|finance|mortgage|financial.?advis/i', $log))              $business_type = 'BIZ_LEGAL_FINANCE';
    elseif (preg_match('/real.?estate|property.?manag|agent|buyer|vendor/i', $log))                            $business_type = 'BIZ_REALESTATE';
    elseif (preg_match('/coach|mentor|consultant|speaker|trainer/i', $log))                                    $business_type = 'BIZ_COACHING';
    elseif (preg_match('/doctor|gp|dentist|dental|medical|clinic|hospital|specialist/i', $log))               $business_type = 'BIZ_MEDICAL';

    $payload = json_encode([
        'secret'           => ARIA_WEBHOOK_SECRET,
        'name'             => $name,
        'email'            => $email,
        'phone'            => $phone,
        'lead_status'      => $lead_status,
        'pain_point'       => $pain_point,
        'business_type'    => $business_type,
        'lead_source'      => $lead_source,
        'conversation_log' => $log,
    ]);

    $ch = curl_init(LIPS_CRM_URL . '/api/webhooks/aria');
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $payload,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 10,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
    ]);

    $response  = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    http_response_code($http_code >= 200 && $http_code < 300 ? 200 : 500);
    echo $response ?: json_encode(['ok' => false]);
    exit;
}

// Unknown action
http_response_code(400);
echo json_encode(['error' => 'Unknown action']);
