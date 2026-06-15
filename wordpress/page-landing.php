<?php /* Template Name: LIP Landing Page */ ?>
<!DOCTYPE html>
<html lang="en-AU">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LIP Services — AI Marketing &amp; Automation for Small Business</title>
  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

    :root {
      --navy: #0f0f1a;
      --indigo: #4f46e5;
      --indigo-light: #6366f1;
      --indigo-pale: #eef2ff;
      --green: #10b981;
      --green-pale: #d1fae5;
      --text: #1a1a2e;
      --muted: #64748b;
      --border: #e2e8f0;
      --white: #ffffff;
    }

    html { scroll-behavior: smooth; }

    body {
      font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
      color: var(--text);
      background: var(--white);
      line-height: 1.6;
    }

    /* ── NAV ── */
    nav {
      position: sticky;
      top: 0;
      z-index: 100;
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(8px);
      border-bottom: 1px solid var(--border);
      padding: 0 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 64px;
    }

    .nav-logo {
      font-size: 20px;
      font-weight: 800;
      color: var(--navy);
      letter-spacing: -0.5px;
    }

    .nav-logo span { color: var(--indigo); }

    .nav-links {
      display: flex;
      gap: 32px;
      list-style: none;
    }

    .nav-links a {
      text-decoration: none;
      color: var(--muted);
      font-size: 14px;
      font-weight: 500;
      transition: color 0.2s;
    }

    .nav-links a:hover { color: var(--indigo); }

    .nav-cta {
      background: var(--indigo);
      color: var(--white) !important;
      padding: 8px 20px;
      border-radius: 8px;
      font-weight: 600 !important;
    }

    .nav-cta:hover { background: var(--indigo-light); color: var(--white) !important; }

    /* ── HERO ── */
    .hero {
      background: var(--navy);
      color: var(--white);
      padding: 100px 40px 80px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(ellipse 80% 60% at 50% 0%, rgba(79,70,229,0.35) 0%, transparent 70%);
    }

    .hero-inner { position: relative; max-width: 820px; margin: 0 auto; }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(79,70,229,0.2);
      border: 1px solid rgba(79,70,229,0.4);
      color: #a5b4fc;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
      padding: 6px 16px;
      border-radius: 20px;
      margin-bottom: 28px;
    }

    .hero h1 {
      font-size: clamp(36px, 5vw, 58px);
      font-weight: 800;
      line-height: 1.1;
      letter-spacing: -1.5px;
      margin-bottom: 24px;
    }

    .hero h1 .accent { color: #818cf8; }

    .hero p {
      font-size: 18px;
      color: #94a3b8;
      max-width: 600px;
      margin: 0 auto 40px;
      line-height: 1.7;
    }

    .hero-ctas {
      display: flex;
      gap: 16px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .btn-primary {
      background: var(--indigo);
      color: var(--white);
      padding: 14px 32px;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 700;
      text-decoration: none;
      transition: background 0.2s, transform 0.15s;
      display: inline-block;
    }

    .btn-primary:hover { background: var(--indigo-light); transform: translateY(-1px); }

    .btn-ghost {
      background: transparent;
      color: var(--white);
      padding: 14px 32px;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 600;
      text-decoration: none;
      border: 1px solid rgba(255,255,255,0.2);
      transition: border-color 0.2s, background 0.2s;
      display: inline-block;
    }

    .btn-ghost:hover { border-color: rgba(255,255,255,0.5); background: rgba(255,255,255,0.05); }

    .hero-stats {
      display: flex;
      justify-content: center;
      gap: 48px;
      margin-top: 64px;
      padding-top: 40px;
      border-top: 1px solid rgba(255,255,255,0.08);
      flex-wrap: wrap;
    }

    .stat-item { text-align: center; }
    .stat-num { font-size: 32px; font-weight: 800; color: var(--white); }
    .stat-num span { color: #818cf8; }
    .stat-label { font-size: 13px; color: #64748b; margin-top: 4px; }

    /* ── SECTION COMMONS ── */
    section { padding: 80px 40px; }
    .section-inner { max-width: 1100px; margin: 0 auto; }

    .section-label {
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      color: var(--indigo);
      margin-bottom: 12px;
    }

    .section-title {
      font-size: clamp(26px, 3.5vw, 40px);
      font-weight: 800;
      letter-spacing: -0.8px;
      line-height: 1.2;
      margin-bottom: 16px;
    }

    .section-sub {
      font-size: 17px;
      color: var(--muted);
      max-width: 580px;
      line-height: 1.7;
    }

    /* ── PROBLEM ── */
    .problem { background: #fafafa; }

    .problem-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px;
      margin-top: 48px;
      align-items: center;
    }

    .problem-list { list-style: none; }

    .problem-list li {
      display: flex;
      gap: 14px;
      align-items: flex-start;
      padding: 16px 0;
      border-bottom: 1px solid var(--border);
      font-size: 15px;
      color: var(--muted);
    }

    .problem-list li:last-child { border-bottom: none; }

    .x-icon {
      width: 20px;
      height: 20px;
      background: #fee2e2;
      border-radius: 50%;
      color: #ef4444;
      font-size: 12px;
      font-weight: 800;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      margin-top: 2px;
    }

    .solution-card {
      background: var(--navy);
      color: var(--white);
      border-radius: 20px;
      padding: 40px;
    }

    .solution-card h3 {
      font-size: 22px;
      font-weight: 800;
      margin-bottom: 16px;
      line-height: 1.3;
    }

    .solution-card p {
      color: #94a3b8;
      font-size: 15px;
      line-height: 1.7;
      margin-bottom: 24px;
    }

    .solution-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }

    .tag {
      background: rgba(79,70,229,0.2);
      border: 1px solid rgba(79,70,229,0.3);
      color: #a5b4fc;
      font-size: 12px;
      font-weight: 600;
      padding: 4px 12px;
      border-radius: 20px;
    }

    /* ── SERVICES ── */
    .services-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
      margin-top: 48px;
    }

    .service-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 32px;
      transition: box-shadow 0.2s, transform 0.2s;
    }

    .service-card:hover {
      box-shadow: 0 8px 32px rgba(0,0,0,0.08);
      transform: translateY(-2px);
    }

    .service-card.featured {
      background: var(--indigo);
      border-color: var(--indigo);
      color: var(--white);
    }

    .service-icon {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      background: var(--indigo-pale);
      color: var(--indigo);
      font-size: 22px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
    }

    .service-card.featured .service-icon {
      background: rgba(255,255,255,0.15);
      color: var(--white);
    }

    .service-card h3 {
      font-size: 17px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .service-card p {
      font-size: 14px;
      color: var(--muted);
      line-height: 1.6;
    }

    .service-card.featured p { color: rgba(255,255,255,0.75); }

    .service-list {
      list-style: none;
      margin-top: 14px;
    }

    .service-list li {
      font-size: 13px;
      color: var(--muted);
      padding: 4px 0;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .service-card.featured .service-list li { color: rgba(255,255,255,0.7); }

    .service-list li::before {
      content: '→';
      color: var(--indigo);
      font-weight: 700;
      font-size: 12px;
    }

    .service-card.featured .service-list li::before { color: rgba(255,255,255,0.6); }

    /* ── SYSTEM ── */
    .system { background: var(--navy); color: var(--white); }

    .system .section-label { color: #818cf8; }
    .system .section-sub { color: #94a3b8; }

    .system-steps {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 24px;
      margin-top: 56px;
    }

    .step-card {
      background: rgba(255,255,255,0.04);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 16px;
      padding: 28px;
      position: relative;
    }

    .step-num {
      font-size: 11px;
      font-weight: 700;
      color: #818cf8;
      letter-spacing: 1px;
      text-transform: uppercase;
      margin-bottom: 14px;
    }

    .step-card h3 {
      font-size: 16px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .step-card p {
      font-size: 13.5px;
      color: #94a3b8;
      line-height: 1.6;
    }

    /* ── WHO WE HELP ── */
    .who-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      margin-top: 48px;
    }

    .who-card {
      background: #f8fafc;
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 28px;
    }

    .who-card .who-icon {
      font-size: 28px;
      margin-bottom: 14px;
    }

    .who-card h3 {
      font-size: 16px;
      font-weight: 700;
      margin-bottom: 8px;
    }

    .who-card p {
      font-size: 13.5px;
      color: var(--muted);
      line-height: 1.6;
    }

    /* ── PRICING ── */
    .pricing { background: var(--indigo-pale); }

    .pricing-card {
      background: var(--white);
      border-radius: 24px;
      padding: 64px;
      max-width: 720px;
      margin: 48px auto 0;
      text-align: center;
      box-shadow: 0 4px 32px rgba(79,70,229,0.1);
      border: 1px solid rgba(79,70,229,0.15);
    }

    .pricing-card h3 {
      font-size: 28px;
      font-weight: 800;
      margin-bottom: 16px;
      letter-spacing: -0.5px;
    }

    .pricing-card p {
      font-size: 17px;
      color: var(--muted);
      max-width: 500px;
      margin: 0 auto 40px;
      line-height: 1.7;
    }

    .pricing-points {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      text-align: left;
      margin-bottom: 40px;
    }

    .pricing-point {
      display: flex;
      gap: 12px;
      align-items: flex-start;
    }

    .check {
      width: 20px;
      height: 20px;
      background: var(--green-pale);
      border-radius: 50%;
      color: var(--green);
      font-size: 11px;
      font-weight: 800;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      margin-top: 2px;
    }

    .pricing-point span { font-size: 14px; color: var(--text); font-weight: 500; }

    /* ── STACK ── */
    .stack { background: #fafafa; }

    .stack-logos {
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
      margin-top: 40px;
      justify-content: center;
    }

    .stack-pill {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 40px;
      padding: 10px 22px;
      font-size: 14px;
      font-weight: 600;
      color: var(--text);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .stack-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--indigo);
    }

    /* ── FOUNDER ── */
    .founder-inner {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 80px;
      align-items: center;
    }

    .founder-image {
      background: linear-gradient(135deg, var(--navy) 0%, #1e1b4b 100%);
      border-radius: 20px;
      aspect-ratio: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 80px;
    }

    .founder-content .section-label { margin-bottom: 8px; }

    .founder-content h2 {
      font-size: 36px;
      font-weight: 800;
      letter-spacing: -0.8px;
      margin-bottom: 8px;
    }

    .founder-name-sub {
      font-size: 14px;
      color: var(--muted);
      margin-bottom: 24px;
    }

    .founder-content p {
      font-size: 15.5px;
      color: var(--muted);
      line-height: 1.8;
      margin-bottom: 16px;
    }

    /* ── CTA ── */
    .cta-section {
      background: var(--navy);
      text-align: center;
      padding: 100px 40px;
    }

    .cta-section .section-label { color: #818cf8; }

    .cta-section h2 {
      font-size: clamp(28px, 4vw, 46px);
      font-weight: 800;
      color: var(--white);
      letter-spacing: -1px;
      margin-bottom: 16px;
    }

    .cta-section p {
      font-size: 18px;
      color: #94a3b8;
      max-width: 520px;
      margin: 0 auto 40px;
      line-height: 1.7;
    }

    /* ── FOOTER ── */
    footer {
      background: #07070f;
      color: #475569;
      padding: 40px;
      text-align: center;
      font-size: 13px;
    }

    footer a { color: #818cf8; text-decoration: none; }
    footer .footer-logo { font-size: 18px; font-weight: 800; color: var(--white); margin-bottom: 8px; }
    footer .footer-logo span { color: var(--indigo); }

    /* ── PRICING TIERS ── */
    .pricing-tiers {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
      margin-bottom: 24px;
      text-align: left;
      align-items: start;
    }

    .pt-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 34px 28px;
      position: relative;
      display: flex;
      flex-direction: column;
    }

    .pt-featured {
      background: var(--navy);
      border-color: var(--navy);
      color: var(--white);
      transform: scale(1.035);
      box-shadow: 0 12px 48px rgba(15,15,26,0.28);
    }

    .pt-badge {
      position: absolute;
      top: -13px;
      left: 50%;
      transform: translateX(-50%);
      background: var(--indigo);
      color: var(--white);
      font-size: 10px;
      font-weight: 700;
      padding: 4px 16px;
      border-radius: 20px;
      letter-spacing: 0.8px;
      text-transform: uppercase;
      white-space: nowrap;
    }

    .pt-type {
      font-size: 10px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1.2px;
      color: var(--indigo);
      margin-bottom: 14px;
    }

    .pt-icon {
      width: 46px;
      height: 46px;
      border-radius: 12px;
      background: var(--indigo-pale);
      color: var(--indigo);
      font-size: 21px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 16px;
    }

    .pt-title {
      font-size: 18px;
      font-weight: 800;
      margin-bottom: 10px;
      letter-spacing: -0.3px;
      line-height: 1.3;
    }

    .pt-desc {
      font-size: 13.5px;
      color: var(--muted);
      line-height: 1.65;
      margin-bottom: 20px;
    }

    .pt-featured .pt-desc { color: rgba(255,255,255,0.65); }

    .pt-price {
      padding: 16px 0;
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
      margin-bottom: 20px;
    }

    .pt-featured .pt-price { border-color: rgba(255,255,255,0.12); }

    .pt-price-main {
      font-size: 24px;
      font-weight: 800;
      color: var(--text);
      letter-spacing: -0.5px;
      line-height: 1.2;
    }

    .pt-price-note {
      font-size: 14px;
      font-weight: 500;
      color: var(--muted);
    }

    .pt-price-sub {
      font-size: 12.5px;
      color: var(--muted);
      margin-top: 5px;
    }

    .pt-features {
      list-style: none;
      margin-bottom: 26px;
      flex: 1;
    }

    .pt-features li {
      font-size: 13px;
      color: var(--muted);
      padding: 5px 0;
      display: flex;
      align-items: flex-start;
      gap: 9px;
      line-height: 1.4;
    }

    .pt-features li::before {
      content: '✓';
      color: var(--green);
      font-weight: 800;
      font-size: 11px;
      flex-shrink: 0;
      margin-top: 2px;
    }

    .pt-featured .pt-features li { color: rgba(255,255,255,0.72); }
    .pt-featured .pt-features li::before { color: #6ee7b7; }

    .pt-cta {
      display: block;
      text-align: center;
      padding: 12px 20px;
      border-radius: 10px;
      font-size: 14px;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.2s;
    }

    .pt-cta-outline {
      border: 2px solid var(--indigo);
      color: var(--indigo);
      background: transparent;
    }

    .pt-cta-outline:hover { background: var(--indigo); color: var(--white); }

    .pt-cta-solid {
      background: var(--white);
      color: var(--navy);
    }

    .pt-cta-solid:hover { background: #f0f0f0; }

    .pt-bundle {
      background: var(--white);
      border: 1px solid rgba(79,70,229,0.2);
      border-radius: 14px;
      padding: 18px 24px;
      display: flex;
      align-items: center;
      gap: 16px;
      text-align: left;
      font-size: 14px;
      color: var(--text);
      line-height: 1.55;
    }

    .pt-bundle-icon { font-size: 22px; flex-shrink: 0; }
    .pt-bundle-text { flex: 1; }
    .pt-bundle-text strong { font-weight: 700; }
    .pt-bundle-text span { color: var(--muted); }

    /* ── RESPONSIVE ── */
    @media (max-width: 768px) {
      nav { padding: 0 20px; }
      .nav-links { display: none; }
      section { padding: 60px 20px; }
      .hero { padding: 80px 20px 60px; }
      .problem-grid, .founder-inner { grid-template-columns: 1fr; }
      .services-grid, .who-grid { grid-template-columns: 1fr; }
      .system-steps { grid-template-columns: 1fr 1fr; }
      .pricing-tiers { grid-template-columns: 1fr; }
      .pt-featured { transform: none; }
      .pt-bundle { flex-wrap: wrap; }
      .hero-stats { gap: 28px; }
    }
  </style>
</head>
<body>

<!-- NAV -->
<nav>
  <div class="nav-logo">LIP<span>.</span>Services</div>
  <ul class="nav-links">
    <li><a href="#services">Services</a></li>
    <li><a href="#system">Our System</a></li>
    <li><a href="#who">Who We Help</a></li>
    <li><a href="#pricing">Pricing</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="https://calendar.app.google/oqTcitaDB6RRbLiy5" target="_blank" rel="noopener" class="nav-cta">Book a Call</a></li>
  </ul>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-inner">
    <div class="hero-badge">⚡ AI-Powered Growth for Small Business</div>
    <h1>We Build <span class="accent">AI Systems</span><br/>That Grow Your Business<br/>While You Work</h1>
    <p>LIP Services combines AI automation, paid media, and smart lead generation to give local and professional service businesses the marketing firepower of a large company — without the price tag.</p>
    <div class="hero-ctas">
      <a href="https://calendar.app.google/oqTcitaDB6RRbLiy5" target="_blank" rel="noopener" class="btn-primary">Book a Free Strategy Call</a>
      <a href="#services" class="btn-ghost">See What We Do</a>
    </div>
    <div class="hero-stats">
      <div class="stat-item">
        <div class="stat-num">3–5<span>×</span></div>
        <div class="stat-label">Average lead flow increase</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">0<span>$</span></div>
        <div class="stat-label">Upfront retainer required</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">14</div>
        <div class="stat-label">Days to first automation live</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">24<span>/7</span></div>
        <div class="stat-label">AI receptionist uptime</div>
      </div>
    </div>
  </div>
</section>

<!-- PROBLEM -->
<section class="problem" id="problem">
  <div class="section-inner">
    <div class="problem-grid">
      <div>
        <div class="section-label">The Problem</div>
        <h2 class="section-title">Big competitors have marketing teams.<br/>You have a business to run.</h2>
        <p class="section-sub">Most small businesses are leaving leads and revenue on the table — not because they're bad at what they do, but because they don't have the time or tools to compete.</p>
        <ul class="problem-list" style="margin-top:32px">
          <li><div class="x-icon">✕</div> Missed calls and enquiries that go cold</li>
          <li><div class="x-icon">✕</div> No system to follow up with leads automatically</li>
          <li><div class="x-icon">✕</div> Ad spend with no clear ROI tracking</li>
          <li><div class="x-icon">✕</div> Hours wasted on manual admin and scheduling</li>
          <li><div class="x-icon">✕</div> No visibility into what competitors are doing</li>
        </ul>
      </div>
      <div class="solution-card">
        <h3>We replace all of that with AI systems that run 24/7.</h3>
        <p>From the moment a prospect finds you online, to the booking confirmation in their inbox — every step is automated, optimised, and tracked. You focus on delivering the work. We handle the growth.</p>
        <div class="solution-tags">
          <span class="tag">AI Lead Generation</span>
          <span class="tag">Auto Follow-Up</span>
          <span class="tag">Smart Booking</span>
          <span class="tag">Paid Media</span>
          <span class="tag">CRM Automation</span>
          <span class="tag">Market Intelligence</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section id="services">
  <div class="section-inner">
    <div class="section-label">What We Do</div>
    <h2 class="section-title">Five services. One growth system.</h2>
    <p class="section-sub">Each service is designed to work together — or stand alone if you need a specific problem solved first.</p>
    <div class="services-grid">

      <div class="service-card featured">
        <div class="service-icon">🤖</div>
        <h3>AI Receptionist &amp; Booking</h3>
        <p>Never miss an enquiry again. Our AI handles inbound calls, chats, and messages — qualifying leads and booking appointments automatically, around the clock.</p>
        <ul class="service-list">
          <li>24/7 lead qualification</li>
          <li>Instant booking confirmation</li>
          <li>Calendar &amp; CRM sync</li>
          <li>Custom scripts for your business</li>
        </ul>
      </div>

      <div class="service-card">
        <div class="service-icon">🎯</div>
        <h3>Lead Generation &amp; Outreach</h3>
        <p>Automated prospecting pipelines that find, warm up, and deliver qualified leads to your inbox — without cold calling or manual follow-up.</p>
        <ul class="service-list">
          <li>Targeted prospect lists</li>
          <li>AI-written outreach sequences</li>
          <li>Follow-up automation</li>
          <li>Pipeline reporting</li>
        </ul>
      </div>

      <div class="service-card">
        <div class="service-icon">📣</div>
        <h3>Ad Campaign Management</h3>
        <p>AI-optimised paid media across Google and Meta. We build, manage, and continuously improve your campaigns so your ad spend works harder every week.</p>
        <ul class="service-list">
          <li>Google &amp; Meta ads</li>
          <li>AI-generated ad creative</li>
          <li>Conversion tracking</li>
          <li>Monthly performance reports</li>
        </ul>
      </div>

      <div class="service-card">
        <div class="service-icon">🔍</div>
        <h3>Market Research &amp; Intelligence</h3>
        <p>Know exactly what your competitors are doing and where the opportunities are. AI-powered research delivered as clear, actionable reports.</p>
        <ul class="service-list">
          <li>Competitor audits</li>
          <li>Local market analysis</li>
          <li>Positioning recommendations</li>
          <li>Trend monitoring</li>
        </ul>
      </div>

      <div class="service-card">
        <div class="service-icon">⚙️</div>
        <h3>Business Automation &amp; CRM</h3>
        <p>Connect your tools and eliminate repetitive admin. From CRM setup to workflow automation, we build the operating system your business runs on.</p>
        <ul class="service-list">
          <li>CRM setup &amp; integration</li>
          <li>Workflow automation (Make / n8n)</li>
          <li>Email &amp; SMS sequences</li>
          <li>Reporting dashboards</li>
        </ul>
      </div>

      <div class="service-card" style="background:#f8fafc; border-style: dashed;">
        <div class="service-icon" style="background:#f1f5f9;">🏷️</div>
        <h3>White-Label &amp; Reseller</h3>
        <p>Already running an agency? We deliver AI automation services under your brand. Full white-label capability with no minimum volume requirements.</p>
        <ul class="service-list">
          <li>Branded deliverables</li>
          <li>Partner pricing</li>
          <li>Dedicated support</li>
          <li>Scalable capacity</li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- SYSTEM -->
<section class="system" id="system">
  <div class="section-inner">
    <div class="section-label">The LIP AI Growth System</div>
    <h2 class="section-title" style="color:white">From first contact to paying client —<br/>fully automated.</h2>
    <p class="section-sub">A clear four-step process that turns your online presence into a lead-generating, booking-filling machine.</p>
    <div class="system-steps">
      <div class="step-card">
        <div class="step-num">Step 01</div>
        <h3>Attract</h3>
        <p>Targeted ads and SEO-optimised content bring the right people to your business — people already looking for what you offer.</p>
      </div>
      <div class="step-card">
        <div class="step-num">Step 02</div>
        <h3>Capture</h3>
        <p>AI-powered landing pages and chatbots capture every enquiry, qualify leads instantly, and never let a prospect go cold.</p>
      </div>
      <div class="step-card">
        <div class="step-num">Step 03</div>
        <h3>Convert</h3>
        <p>Automated follow-up sequences and an AI receptionist turn interested prospects into booked appointments — without any manual effort.</p>
      </div>
      <div class="step-card">
        <div class="step-num">Step 04</div>
        <h3>Retain</h3>
        <p>Post-sale automations, review requests, and re-engagement campaigns keep clients coming back and referring others.</p>
      </div>
    </div>
  </div>
</section>

<!-- WHO WE HELP -->
<section id="who">
  <div class="section-inner">
    <div class="section-label">Who We Help</div>
    <h2 class="section-title">Built for local service<br/>and professional businesses.</h2>
    <p class="section-sub">If you book appointments, take enquiries, or rely on local reputation — we can help you grow faster with less effort.</p>
    <div class="who-grid">
      <div class="who-card">
        <div class="who-icon">🔧</div>
        <h3>Trades &amp; Home Services</h3>
        <p>Plumbers, electricians, HVAC, builders, landscapers. Get more jobs booked without answering every call yourself.</p>
      </div>
      <div class="who-card">
        <div class="who-icon">💆</div>
        <h3>Health &amp; Wellness</h3>
        <p>Physios, chiropractors, allied health, salons, and fitness studios. Fill your calendar and reduce no-shows automatically.</p>
      </div>
      <div class="who-card">
        <div class="who-icon">⚖️</div>
        <h3>Legal &amp; Financial</h3>
        <p>Solicitors, accountants, financial advisors, mortgage brokers. Generate qualified enquiries while you focus on client work.</p>
      </div>
      <div class="who-card">
        <div class="who-icon">🏠</div>
        <h3>Real Estate &amp; Property</h3>
        <p>Agents and property managers. Automate follow-up, appraisal bookings, and landlord outreach at scale.</p>
      </div>
      <div class="who-card">
        <div class="who-icon">📋</div>
        <h3>Coaches &amp; Consultants</h3>
        <p>Business coaches, marketing consultants, HR advisors. Build a consistent pipeline so you stop relying on referrals alone.</p>
      </div>
      <div class="who-card">
        <div class="who-icon">🦷</div>
        <h3>Medical &amp; Dental</h3>
        <p>GP clinics, dental practices, specialists. Reduce front-desk load with AI booking and automated patient follow-up.</p>
      </div>
    </div>
  </div>
</section>

<!-- PRICING -->
<section class="pricing" id="pricing">
  <div class="section-inner" style="text-align:center">
    <div class="section-label">Pricing</div>
    <h2 class="section-title">Simple pricing.<br/>Built around results.</h2>
    <p class="section-sub" style="margin:0 auto 40px">
      Two models depending on the service. Growth services are performance-based — you only pay when we deliver.
      AI infrastructure builds use a transparent setup + maintenance structure with no hidden costs.
    </p>

    <div class="pricing-tiers">

      <!-- CARD 1: Lead Gen / Email -->
      <div class="pt-card">
        <div class="pt-type">Performance Model</div>
        <div class="pt-icon">🎯</div>
        <h3 class="pt-title">Lead Generation &amp; Email Automation</h3>
        <p class="pt-desc">Outreach sequences, email list revival, ad campaigns. We get paid on the results we deliver — no upfront fee, no retainer, no risk.</p>
        <div class="pt-price">
          <div class="pt-price-main">$0 upfront</div>
          <div class="pt-price-sub">Performance fee on leads or revenue generated</div>
        </div>
        <ul class="pt-features">
          <li>Targeted prospect list building</li>
          <li>AI-written outreach sequences</li>
          <li>Dead email list revival campaigns</li>
          <li>Google &amp; Meta ad management</li>
          <li>Automated follow-up flows</li>
          <li>Pipeline &amp; conversion reporting</li>
          <li>Cancel any time if targets aren't met</li>
        </ul>
        <a href="https://calendar.app.google/oqTcitaDB6RRbLiy5" target="_blank" rel="noopener" class="pt-cta pt-cta-outline">Get a Growth Plan →</a>
      </div>

      <!-- CARD 2: Voice Agent (featured) -->
      <div class="pt-card pt-featured">
        <div class="pt-badge">Most Popular</div>
        <div class="pt-type" style="color:#a5b4fc">Build + Maintain</div>
        <div class="pt-icon" style="background:rgba(255,255,255,0.1);color:white">🤖</div>
        <h3 class="pt-title">AI Voice Agent</h3>
        <p class="pt-desc">A custom AI receptionist that answers inbound calls, qualifies leads, and books appointments — 24 hours a day, every day.</p>
        <div class="pt-price">
          <div class="pt-price-main" style="color:white">From $1,500 <span class="pt-price-note" style="color:#a5b4fc">setup</span></div>
          <div class="pt-price-sub" style="color:#a5b4fc">+ from $250/mo maintenance</div>
        </div>
        <ul class="pt-features">
          <li>Custom call script &amp; AI persona</li>
          <li>Lead qualification &amp; routing</li>
          <li>CRM &amp; calendar integration</li>
          <li>Call recording &amp; monitoring</li>
          <li>Script updates &amp; optimisation</li>
          <li>Platform &amp; API cost coverage</li>
          <li>Priority support &amp; uptime guarantee</li>
        </ul>
        <a href="https://calendar.app.google/oqTcitaDB6RRbLiy5" target="_blank" rel="noopener" class="pt-cta pt-cta-solid">Get a Quote →</a>
      </div>

      <!-- CARD 3: Booking System -->
      <div class="pt-card">
        <div class="pt-type">Build + Maintain</div>
        <div class="pt-icon">📅</div>
        <h3 class="pt-title">Smart Booking System</h3>
        <p class="pt-desc">A fully automated booking flow connected to your calendar, CRM, and client communications. Set up once, runs without you.</p>
        <div class="pt-price">
          <div class="pt-price-main">From $750 <span class="pt-price-note">setup</span></div>
          <div class="pt-price-sub">+ from $150/mo maintenance</div>
        </div>
        <ul class="pt-features">
          <li>Online booking page &amp; embed widget</li>
          <li>Calendar &amp; CRM sync</li>
          <li>Automated confirmations &amp; reminders</li>
          <li>No-show follow-up sequences</li>
          <li>Payment collection (optional)</li>
          <li>Monthly upkeep &amp; updates</li>
          <li>Integration support included</li>
        </ul>
        <a href="https://calendar.app.google/oqTcitaDB6RRbLiy5" target="_blank" rel="noopener" class="pt-cta pt-cta-outline">Get a Quote →</a>
      </div>

    </div>

    <!-- Bundle -->
    <div class="pt-bundle">
      <div class="pt-bundle-icon">⚡</div>
      <div class="pt-bundle-text">
        <strong>Voice Agent + Booking System Bundle</strong>
        <span> — Combined setup from $2,000 · Maintenance from $350/mo. The voice agent books directly into your booking system — one seamless flow from call to confirmed appointment.</span>
      </div>
      <a href="https://calendar.app.google/oqTcitaDB6RRbLiy5" target="_blank" rel="noopener" class="pt-cta pt-cta-outline" style="white-space:nowrap;padding:10px 22px;font-size:13px">Bundle Quote</a>
    </div>

    <p style="margin-top:22px;font-size:13px;color:var(--muted)">
      Setup fees are one-time. Maintenance covers platform costs, monitoring, updates, and support. Exact pricing depends on complexity — book a call for a custom quote.
    </p>
  </div>
</section>

<!-- STACK -->
<section class="stack">
  <div class="section-inner" style="text-align:center">
    <div class="section-label">Our Technology</div>
    <h2 class="section-title">Enterprise AI tools.<br/>Small business price.</h2>
    <p class="section-sub" style="margin:0 auto">We use the same AI infrastructure as the world's largest companies — configured specifically for local and professional service businesses.</p>
    <div class="stack-logos">
      <div class="stack-pill"><span class="stack-dot"></span>Claude AI (Anthropic)</div>
      <div class="stack-pill"><span class="stack-dot"></span>Make (Integromat)</div>
      <div class="stack-pill"><span class="stack-dot"></span>n8n Automation</div>
      <div class="stack-pill"><span class="stack-dot"></span>GoHighLevel CRM</div>
      <div class="stack-pill"><span class="stack-dot"></span>Google Ads</div>
      <div class="stack-pill"><span class="stack-dot"></span>Meta Ads</div>
      <div class="stack-pill"><span class="stack-dot"></span>Airtable</div>
      <div class="stack-pill"><span class="stack-dot"></span>Zapier</div>
      <div class="stack-pill"><span class="stack-dot"></span>OpenAI</div>
      <div class="stack-pill"><span class="stack-dot"></span>Twilio</div>
    </div>
  </div>
</section>

<!-- FOUNDER -->
<section id="about">
  <div class="section-inner">
    <div class="founder-inner">
      <div class="founder-image">👤</div>
      <div class="founder-content">
        <div class="section-label">Meet the Founder</div>
        <h2>Hi, I'm Rob.</h2>
        <div class="founder-name-sub">Robert van Herwynen — Founder, LIP Services</div>
        <p>I didn't come from a marketing background. I came from a tradie background — years of hands-on work, no shortcuts, no tech team. Then I discovered AI. At 60.</p>
        <p>It changed everything. I realised I could deliver results that used to take an entire marketing department — in a fraction of the time, and for a fraction of the cost. That's when LIP Services was born.</p>
        <p>You don't have to be a tech person to have AI working for your business. If I figured this out coming from where I came from, so can you. That's exactly why I started this — and it's exactly what I build for every client.</p>
        <a href="https://calendar.app.google/oqTcitaDB6RRbLiy5" target="_blank" rel="noopener" class="btn-primary" style="margin-top:8px">Book a Call with Rob →</a>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section" id="contact">
  <div class="section-label">Get Started</div>
  <h2>Ready to put AI to work<br/>for your business?</h2>
  <p>Book a free 30-minute strategy call. We'll map out exactly which automations would have the biggest impact on your growth — no obligation, no hard sell.</p>
  <a href="https://calendar.app.google/oqTcitaDB6RRbLiy5" target="_blank" rel="noopener" class="btn-primary" style="font-size:17px; padding:16px 40px;">Schedule a Free Call →</a>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-logo">LIP<span>.</span>Services</div>
  <p style="margin-bottom:8px">Local Internet Presence Services · AI Marketing &amp; Automation · Australia-Wide</p>
  <p>
    <a href="mailto:rob@lipservices.com">rob@lipservices.com</a> &nbsp;·&nbsp;
    <a href="tel:+61422717798">0422 717 798</a> &nbsp;·&nbsp;
    <a href="https://lipservices.com.au">lipservices.com.au</a>
  </p>
  <p style="margin-top:12px; font-size:12px; color:#334155">ABN 96 976 308 814</p>
  <p style="margin-top:8px; font-size:12px; color:#334155">© 2026 LIP Services. All rights reserved.</p>
</footer>

<!-- ══════════════════════════════════════════════════════════
     Aria Chat Widget — inline (Divi header/footer bypassed)
     ══════════════════════════════════════════════════════════ -->
<style>
#lip-widget *,#lip-widget *::before,#lip-widget *::after{box-sizing:border-box}
#lip-widget{position:fixed;bottom:24px;right:24px;z-index:99999;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif}
#lip-btn{width:62px;height:62px;border-radius:50%;background:#4f46e5;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 24px rgba(79,70,229,.55);transition:transform .2s,box-shadow .2s;position:relative}
#lip-btn:hover{transform:scale(1.07);box-shadow:0 6px 30px rgba(79,70,229,.65)}
#lip-btn svg{width:27px;height:27px;fill:white;transition:opacity .15s}
#lip-btn .ico-chat{display:block}#lip-btn .ico-close{display:none}
#lip-btn.open .ico-chat{display:none}#lip-btn.open .ico-close{display:block}
.lip-notif{position:absolute;top:1px;right:1px;width:15px;height:15px;background:#10b981;border-radius:50%;border:2.5px solid white;display:none;animation:lip-pulse 2.2s infinite}
@keyframes lip-pulse{0%,100%{transform:scale(1)}50%{transform:scale(1.25)}}
#lip-panel{position:absolute;bottom:76px;right:0;width:384px;height:568px;background:white;border-radius:20px;box-shadow:0 24px 64px rgba(0,0,0,.3);display:flex;flex-direction:column;overflow:hidden;transform-origin:bottom right;transform:scale(.82) translateY(8px);opacity:0;pointer-events:none;transition:transform .28s cubic-bezier(.34,1.56,.64,1),opacity .2s}
#lip-panel.open{transform:scale(1) translateY(0);opacity:1;pointer-events:all}
.lip-hdr{background:#0f0f1a;padding:16px 18px;display:flex;align-items:center;gap:12px;flex-shrink:0}
.lip-av{width:42px;height:42px;border-radius:50%;background:linear-gradient(135deg,#4f46e5,#818cf8);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0}
.lip-hi{flex:1;min-width:0}
.lip-hn{font-size:14px;font-weight:700;color:white}
.lip-hs{font-size:12px;color:#10b981;display:flex;align-items:center;gap:5px;margin-top:2px}
.lip-hs::before{content:'';width:7px;height:7px;background:#10b981;border-radius:50%;flex-shrink:0}
.lip-hb{font-size:11px;font-weight:700;color:#6366f1}
.lip-msgs{flex:1;overflow-y:auto;padding:18px 14px;display:flex;flex-direction:column;gap:12px;background:#f8fafc;scroll-behavior:smooth}
.lip-msgs::-webkit-scrollbar{width:4px}.lip-msgs::-webkit-scrollbar-thumb{background:#e2e8f0;border-radius:2px}
.lmsg{display:flex;gap:8px;align-items:flex-end}.lmsg.user{flex-direction:row-reverse}
.lmav{width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,#4f46e5,#818cf8);display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0}
.lmbd{max-width:80%;display:flex;flex-direction:column}.lmsg.user .lmbd{align-items:flex-end}
.lmbbl{padding:10px 14px;border-radius:16px;font-size:14px;line-height:1.55;word-break:break-word}
.lmsg.agent .lmbbl{background:white;color:#1a1a2e;border-bottom-left-radius:4px;box-shadow:0 1px 4px rgba(0,0,0,.07)}
.lmsg.user .lmbbl{background:#4f46e5;color:white;border-bottom-right-radius:4px}
.lmt{font-size:10px;color:#94a3b8;margin-top:4px;padding:0 2px}
.lip-book{display:inline-block;margin-top:8px;background:#4f46e5;color:white;text-decoration:none;font-size:13px;font-weight:700;padding:9px 16px;border-radius:10px;transition:background .15s;width:100%;text-align:center}
.lip-book:hover{background:#6366f1;color:white}
.lip-qr{display:flex;flex-wrap:wrap;gap:6px;margin-top:8px}
.lip-qrb{background:white;border:1.5px solid #e2e8f0;border-radius:20px;padding:5px 13px;font-size:12px;font-weight:500;color:#4f46e5;cursor:pointer;transition:all .15s;white-space:nowrap;font-family:inherit}
.lip-qrb:hover{background:#4f46e5;color:white;border-color:#4f46e5}
.lip-typ{display:flex;gap:8px;align-items:flex-end}
.lip-typb{background:white;border-radius:16px;border-bottom-left-radius:4px;padding:13px 16px;box-shadow:0 1px 4px rgba(0,0,0,.07);display:flex;gap:5px;align-items:center}
.ltd{width:7px;height:7px;background:#94a3b8;border-radius:50%;animation:lip-bounce 1.3s infinite}
.ltd:nth-child(2){animation-delay:.18s}.ltd:nth-child(3){animation-delay:.36s}
@keyframes lip-bounce{0%,60%,100%{transform:translateY(0);opacity:.45}30%{transform:translateY(-7px);opacity:1}}
.lip-iw{padding:12px 14px;border-top:1px solid #f0f0f0;background:white;display:flex;gap:8px;align-items:flex-end;flex-shrink:0}
#lip-input{flex:1;border:1.5px solid #e2e8f0;border-radius:12px;padding:10px 14px;font-size:14px;font-family:inherit;outline:none;resize:none;min-height:42px;max-height:110px;line-height:1.45;color:#0f0f1a;transition:border-color .15s}
#lip-input:focus{border-color:#4f46e5}
#lip-input::placeholder{color:#94a3b8}
#lip-send{width:42px;height:42px;background:#4f46e5;border:none;border-radius:10px;cursor:pointer;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:background .15s,transform .1s}
#lip-send:hover{background:#6366f1}#lip-send:active{transform:scale(.94)}
#lip-send:disabled{background:#e2e8f0;cursor:default}
#lip-send svg{width:18px;height:18px;fill:white}#lip-send:disabled svg{fill:#94a3b8}
.lip-ft{text-align:center;font-size:10px;color:#94a3b8;padding:5px 14px 10px;background:white}
@media(max-width:460px){#lip-panel{width:calc(100vw - 16px);height:calc(100dvh - 96px);right:8px;bottom:76px;border-radius:16px}}
</style>

<div id="lip-widget">
  <div id="lip-panel">
    <div class="lip-hdr">
      <div class="lip-av">🤖</div>
      <div class="lip-hi">
        <div class="lip-hn">Aria</div>
        <div class="lip-hs">Online — replies instantly</div>
      </div>
      <div class="lip-hb">LIP Services</div>
    </div>
    <div class="lip-msgs" id="lip-msgs"></div>
    <div class="lip-iw">
      <textarea id="lip-input" placeholder="Ask me anything..." rows="1"
        onkeydown="lipKey(event)" oninput="lipGrow(this)"></textarea>
      <button id="lip-send" onclick="lipSend()">
        <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
      </button>
    </div>
    <div class="lip-ft">Powered by Claude AI · LIP Services</div>
  </div>
  <button id="lip-btn" onclick="lipToggle()">
    <span class="lip-notif" id="lip-notif"></span>
    <svg class="ico-chat" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
    <svg class="ico-close" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
  </button>
</div>

<script src="/wp-content/uploads/lip/knowledge-base.js"></script>
<script>
(function(){

const BOOKING_URL = 'https://calendar.app.google/oqTcitaDB6RRbLiy5';
const PROXY_URL   = '/chat-proxy.php';

const CHAT_RULES = `
## Who you are (chat)
You are Aria, a warm and helpful AI assistant for LIP Services. Your job is to have a genuine conversation, understand what the visitor's business needs, and help them see if LIP Services is a good fit. You are not a salesperson — you are a knowledgeable friend.

## Conversation approach
- Find out what kind of business they run early in the conversation — ask naturally, not as a form
- Understand their biggest challenge: getting leads, converting them, missing calls, too much admin?
- Match 1 or 2 relevant services to their situation — never list all services unprompted
- When there is genuine interest, guide them toward booking a free strategy call with Rob
- If they share their email, acknowledge it warmly

## Chat style rules — always follow
- Maximum 3 sentences per message. No exceptions.
- Never use bullet points or numbered lists — write in natural sentences only.
- One idea per message. If you have two things to say, pick the more important one and let the conversation continue.
- Warm and conversational. Like a helpful friend, not a salesperson.
- Plain Australian English. No jargon, no corporate language.
- Never be pushy.

## If you don't know something
Say Rob would be the best person to answer that on a call — and offer to help them book one.
`;

const SYSTEM = (typeof KNOWLEDGE_BASE !== 'undefined' ? KNOWLEDGE_BASE : '') + CHAT_RULES;

let msgs   = [];
let busy   = false;
let isOpen = false;
let lead   = { name:null, email:null, saved:false };

window.addEventListener('load', function(){
  lipGreet();
  setTimeout(function(){ if(!isOpen) document.getElementById('lip-notif').style.display='block'; }, 3500);
});

function lipGreet(){
  lipAdd('agent', "G'day! I'm Aria from LIP Services. What brings you here today — are you looking to get more leads, save time on admin, or something else?", true);
}

function lipToggle(){
  isOpen = !isOpen;
  document.getElementById('lip-panel').classList.toggle('open', isOpen);
  document.getElementById('lip-btn').classList.toggle('open', isOpen);
  if(isOpen){
    document.getElementById('lip-notif').style.display='none';
    setTimeout(function(){ document.getElementById('lip-input').focus(); }, 320);
  }
}

function lipAdd(role, text, showQR){
  var c = document.getElementById('lip-msgs');
  var t = new Date().toLocaleTimeString('en-AU',{hour:'2-digit',minute:'2-digit'});
  var d = document.createElement('div');
  d.className = 'lmsg ' + role;
  var showBook = BOOKING_URL && /book|strategy call|schedule/i.test(text);
  if(role==='agent'){
    d.innerHTML = '<div class="lmav">🤖</div><div class="lmbd">'
      + '<div class="lmbbl">' + lipFmt(text) + '</div>'
      + (showBook ? '<a class="lip-book" href="'+BOOKING_URL+'" target="_blank" rel="noopener">📅 Book a Free Strategy Call →</a>' : '')
      + (showQR   ? lipQR() : '')
      + '<span class="lmt">Aria · '+t+'</span>'
      + '</div>';
  } else {
    d.innerHTML = '<div class="lmbd"><div class="lmbbl">'+lipFmt(text)+'</div><span class="lmt">'+t+'</span></div>';
  }
  c.appendChild(d);
  c.scrollTop = c.scrollHeight;
}

function lipQR(){
  var opts = ['Get more leads','Too much admin','Missing calls after hours','How does pricing work?'];
  return '<div class="lip-qr">'
    + opts.map(function(o){ return '<button class="lip-qrb" onclick="lipUseQR(this,\''+o.replace(/'/g,"\\'")+'\')">'+ o +'</button>'; }).join('')
    + '</div>';
}

function lipUseQR(el, text){
  var p = el.closest('.lip-qr'); if(p) p.remove();
  document.getElementById('lip-input').value = text;
  lipSend();
}

function lipShowTyping(){
  var c = document.getElementById('lip-msgs');
  var d = document.createElement('div');
  d.className='lip-typ'; d.id='lip-typing';
  d.innerHTML='<div class="lmav">🤖</div><div class="lip-typb"><div class="ltd"></div><div class="ltd"></div><div class="ltd"></div></div>';
  c.appendChild(d); c.scrollTop=c.scrollHeight;
}
function lipHideTyping(){ var e=document.getElementById('lip-typing'); if(e) e.remove(); }

function lipFmt(s){
  return String(s)
    .replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;')
    .replace(/\*\*(.+?)\*\*/g,'<strong>$1</strong>')
    .replace(/\n/g,'<br>');
}

function lipGrow(el){
  el.style.height='auto';
  el.style.height=Math.min(el.scrollHeight,110)+'px';
}

function lipKey(e){
  if(e.key==='Enter' && !e.shiftKey){ e.preventDefault(); lipSend(); }
}

async function lipSend(){
  var el   = document.getElementById('lip-input');
  var text = el.value.trim();
  if(!text || busy) return;
  el.value=''; el.style.height='auto';
  document.getElementById('lip-send').disabled=true;
  lipAdd('user', text);
  lipScan(text);
  msgs.push({role:'user', content:text});
  busy=true; lipShowTyping();
  try {
    var reply = await lipCall();
    lipHideTyping();
    msgs.push({role:'assistant', content:reply});
    lipAdd('agent', reply);
    lipScan(reply);
    lipMaybeSave();
  } catch(err){
    lipHideTyping();
    lipAdd('agent', "Sorry, I hit a snag. Try again in a moment.");
    console.error(err);
  }
  busy=false;
  document.getElementById('lip-send').disabled=false;
  document.getElementById('lip-input').focus();
}

async function lipCall(){
  var res = await fetch(PROXY_URL, {
    method:'POST',
    headers:{'Content-Type':'application/json'},
    body: JSON.stringify({ action:'chat', system:SYSTEM, messages:msgs.slice(-24) })
  });
  if(!res.ok){ var e=await res.json().catch(function(){return {};}); throw new Error(e.error||'HTTP '+res.status); }
  var data = await res.json();
  return data.content[0].text;
}

function lipScan(text){
  if(!lead.email){
    var m=text.match(/[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}/);
    if(m) lead.email=m[0];
  }
  if(!lead.name){
    var m=text.match(/(?:i'm|i am|name(?:'s| is))\s+([A-Z][a-z]{1,})/i);
    if(m) lead.name=m[1];
  }
}

function lipMaybeSave(){
  if(lead.saved || msgs.length < 6) return;
  lead.saved     = true;
  lead.timestamp = new Date().toISOString();
  lead.transcript= msgs.map(function(m){ return (m.role==='user'?'Visitor':'Aria')+': '+m.content; }).join('\n\n');
  fetch(PROXY_URL, {
    method:'POST',
    headers:{'Content-Type':'application/json'},
    body: JSON.stringify({ action:'lead', name:lead.name||'Unknown', email:lead.email||'', transcript:lead.transcript })
  }).catch(function(){});
}

})();
</script>

</body>
</html>
