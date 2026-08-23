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
| `chat-proxy.php` | Backend proxy for Aria chatbot API calls | ✅ Live — reads key from .htaccess SetEnv |
| `divi-chat-embed.html` | Divi block embed for Aria chatbot | ✅ Live |
| `chat-agent.html` | Aria chatbot frontend UI | ✅ Live — HTML injected directly into Divi Theme Options → Body |
| `knowledge-base.js` | Shared AI knowledge base used by Aria | ✅ Live — deployed to `/wp-content/uploads/lip/knowledge-base.js` |
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

- **Aria chatbot** — Claude API-powered chat agent embedded on the site. All files in `wordpress/` — `chat-agent.html` (frontend), `knowledge-base.js` (shared knowledge), `chat-proxy.php` (API proxy), `divi-chat-embed.html` (embed block).
- **LIP Command Centre** — the internal platform is separate from this website. Don't mix app files with website files.
- **Client questionnaire** — lives in `LIP-Command-Centre/public/docs/client-questionnaire.html` (served by the app, not the website).
