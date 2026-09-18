# LIP Services Website
**Domain:** lipservices.com.au
**Platform:** WordPress (Divi theme)
**Last updated:** 2026-08-17

> ⚠ **If you were opened directly on this folder:** you can't see or update Command Centre's shared operational context this way (`in-progress.md`, `focus-areas.md`, `coding-priorities.md` — the "Active Right Now" / priority tracking read on Command Centre's Home screen). That gap caused real tracking drift in past sessions (see `in-progress.md`'s 2026-08-20 decision entry). Prefer opening `LIP-Command-Centre` instead, even for website-only work — the shared context lives at `../AI-Personal Assistant/context/` relative to that project root. If you do need to work from here directly, at minimum read and update `../AI-Personal Assistant/context/in-progress.md` yourself before ending the session.

---

## Folder Structure

```
LIP-Website/
├── CLAUDE.md              ← this file
├── pages/                 ← current, accurate page content — see rule below
├── wordpress/             ← non-page site assets: chatbot, scripts, reusable snippets
├── archive/                ← superseded/stale files, kept for history — never treat as current
├── assets/                ← images, icons, brand graphics for the website
└── copy/                  ← website copy drafts, SEO content, page outlines, plan-of-attack
```

**Rule (confirmed 2026-08-17):** `pages/` holds every file that reflects genuinely current, live-accurate page content — whether that's a Divi Code module fragment or a full standalone draft — regardless of build stage. `wordpress/` is only for things that aren't page content themselves: the Aria chatbot files, reusable snippets like the jump-links TOC template, and scripts. The moment a homepage/landing-page variant is superseded, it moves to `archive/` with a banner comment explaining why and what replaced it — don't leave stale variants sitting in `pages/` or `wordpress/` where they look current. This replaced an earlier, looser "drafts vs deployed" split that let 5 different homepage copies accumulate before being sorted out on 2026-08-17 (see `copy/plan-of-attack-2026.md` step 4).

### pages/
Current page content. Once a page is published on WordPress, note the live URL here.

| File | Status | Live URL |
|---|---|---|
| `home-page-section.html` | ✅ Confirmed live-accurate 2026-08-17 (pricing, CTA, and founder photo URL all verified against the live site) | `/` |
| `get-started.html` | ✅ Confirmed live-accurate 2026-08-17 (form fields and title verified against the live site) | `/get-started/` |
| `ai-receptionist-for-tradies.html` | ✅ Live, verified 2026-08-17 | `/ai-receptionist-for-tradies/` |
| `quote-follow-up-for-tradies.html` | ✅ Live, verified 2026-08-17. **Filename doesn't match live slug** — WP's actual slug is longer than planned (`quote-follow-up-automation-for-tradies`), see `pages/seo-meta-schema-index.md` slug mismatch note | `/quote-follow-up-automation-for-tradies/` |
| `invoice-reminders-for-tradies.html` | ✅ Live, verified 2026-08-17. **Filename doesn't match live slug** — WP's actual slug is longer than planned (`invoice-reminder-automation-for-tradies`), see `pages/seo-meta-schema-index.md` slug mismatch note | `/invoice-reminder-automation-for-tradies/` |
| `video-marketing-for-tradies.html` | ✅ Live, verified 2026-08-17 | `/video-marketing-for-tradies/` |
| `about.html` | 📝 Drafted 2026-08-19, not yet pasted into Divi. Founder bio/origin story — decided 2026-08-19 to stand up as a real nav-level page rather than a blog post (see `copy/plan-of-attack-2026.md`). **Needs a main-nav entry added in Appearance → Menus once live** — outside version control, Robert to do in WP admin. | `/about/` (planned) |
| `seo-meta-schema-index.md` | Tracking doc, not a page itself | — |

### wordpress/
Non-page site assets deployed to or embedded in WordPress.

| File | Purpose | Status |
|---|---|---|
| `chat-proxy.php` | Backend for the chat widget's lead capture only (`lead`/`lead_capture` actions) | ✅ Live — its old `chat` action (forwarded a caller-supplied system prompt straight to Claude, an open unauthenticated relay) was removed 2026-09-18 |
| `divi-chat-embed.html` | Aria chatbot frontend UI + Divi block embed, both in one file | ✅ Live — the whole file is pasted into Divi Theme Options → Integrations → "Add code to the `<body>` tag," sitewide. No longer holds the system prompt (moved server-side, see below) |
| `knowledge-base.js` | Reference doc for pricing/services/proof-points — hand-edited, then manually copied into other places | Reference doc only as of 2026-09-18, not loaded live by anything. See its own header for the current propagation list (now includes `LIPS-CRM/lib/ariaChatPrompt.js`) |
| `voice-agent-prompt.md` | Prompt reference for the voice agent | Reference doc |
| `jump-links-toc-template.html` | Reusable "In This Article" TOC snippet | Template — stays put, not a page (see `copy/plan-of-attack-2026.md` step 4) |

### archive/
Superseded homepage/landing-page variants, sorted out 2026-08-17 after finding 5 competing copies of the homepage. Each file has a banner comment explaining why it's archived and what replaced it. Never paste these into Divi or treat them as a content source without checking with Robert first.

| File | Why archived |
|---|---|
| `divi-blocks.html` | Oldest full-homepage draft (2026-06-15), block-by-block Divi approach, old pricing |
| `page-landing.php` | Its own commit called it superseded; old pricing; has a form the live site doesn't have |
| `landing-page-contact-section.html` | Its commit called it "the live deployment path" but the live site has since diverged (no form, different pricing) — Robert edited live content directly in Divi without syncing back |
| `landing-page-v2.html` | Orphaned, correct pricing but old title tag and unclear provenance — unreferenced in current docs |
| `cowork-blog-extraction-prompt-superseded.md` | Manual Cowork prompt for extracting meta/keyword/image-prompt from a finished post — superseded 2026-08-20 when `generateBlogPost` (Command Centre) started returning all of it in the same generation pass |
| `chat-agent-superseded.html` | Standalone "AI Chat Agent Demo" page with its own separate `CHAT_RULES` that had already drifted from the real live widget — not linked or embedded anywhere live (confirmed with Robert 2026-09-18), this repo's own `CLAUDE.md` had incorrectly documented it as live for some time |

---

## Hosting & Deployment

| Detail | Value |
|---|---|
| Hosting | DreamIT Host |
| WordPress admin | https://lipservices.com.au/wp-admin/ |
| FTP/SFTP access | Via cPanel (no standalone FTP client configured) |
| Divi version | 5.7.4 |

---

## Naming Convention for Client Sites

Client websites follow the same structure under their own project folder:

```
Projects/
  LIP-Website/              ← LIP Services own site (this folder)
  [ClientName]-Website/     ← one folder per client, same structure inside
    CLAUDE.md
    pages/
    wordpress/
    assets/
    copy/
```

---

## Connected Systems

- **Aria chatbot** — Claude API-powered chat agent embedded on the site. As of 2026-09-18 the actual conversation is server-side in LIPS-CRM (`app/api/aria/chat/route.js` + `lib/ariaChatPrompt.js`), not this repo — this repo only has the widget UI (`wordpress/divi-chat-embed.html`, pasted whole into Divi) and its lead-capture backend (`wordpress/chat-proxy.php`, `lead`/`lead_capture` actions only now). `knowledge-base.js` is a reference doc for hand-editing pricing/services, not loaded live by anything. `archive/chat-agent-superseded.html` was a demo page with its own drifted copy of the rules — not live, don't use it as a reference for what Aria actually says on the site.
- **LIP Command Centre** — the internal platform is separate from this website. Don't mix app files with website files.
- **Client questionnaire** — lives in `LIP-Command-Centre/public/docs/client-questionnaire.html` (served by the app, not the website).
