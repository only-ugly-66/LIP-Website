# LIP Services Website
**Domain:** lipservices.com.au
**Platform:** WordPress (Divi theme)
**Last updated:** 2026-06-15

---

## Folder Structure

```
LIP-Website/
├── CLAUDE.md              ← this file
├── pages/                 ← standalone HTML files (drafts, prototypes, pre-live pages)
├── wordpress/             ← files deployed to or embedded in WordPress
├── assets/                ← images, icons, brand graphics for the website
└── copy/                  ← website copy drafts, SEO content, page outlines
```

### pages/
HTML files built before they go live. Once a page is published on WordPress, note the live URL here.

| File | Status | Live URL |
|---|---|---|
| `landing-page-v2.html` | Draft — needs hosting | — |

### wordpress/
Files that are deployed to or embedded in the WordPress site.

| File | Purpose | Status |
|---|---|---|
| `chat-proxy.php` | Backend proxy for Aria chatbot API calls | Check if deployed |
| `divi-chat-embed.html` | Divi block embed for Aria chatbot | Check if deployed |
| `divi-blocks.html` | Custom Divi block HTML | Check if deployed |
| `page-landing.php` | WordPress page template | Check if deployed |
| `chat-agent.html` | Aria chatbot frontend UI | Migrated from Claude-Lips — verify live status |
| `knowledge-base.js` | Shared AI knowledge base used by Aria | Migrated from Claude-Lips — verify live status |

---

## Hosting & Deployment

| Detail | Value |
|---|---|
| Hosting | [fill in — e.g. SiteGround, WP Engine, cPanel] |
| WordPress admin | [fill in URL] |
| FTP/SFTP access | [fill in or note where credentials are stored] |
| Divi version | [fill in] |

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
