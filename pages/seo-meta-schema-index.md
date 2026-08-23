# LIP Services — SEO Meta & Schema Index

**What this is:** A staging/planning record of title, meta description, and schema per page — draft it here, paste into RankMath, then mark confirmed. **RankMath is the actual live source of truth, not this file.** If it's not been re-checked against the live site in a while, treat it as "last known intent," not fact — that's what the Last Confirmed Live column is for.

**Status key:** 📝 Drafted (written here, not yet pasted) · ✅ Pasted Live (in RankMath/Code module) · 🔒 Confirmed (checked against the actual live site)

---

## Sitewide (not per-page)

Managed in WP Admin → RankMath SEO → Titles & Meta → **Local SEO** tab. Applies to every page via auto-injected Organization/LocalBusiness/WebSite/Place schema — don't duplicate this per-page.

| Field | Current live value | Status |
|---|---|---|
| Business name | Local Internet Presence Services (alt: LIP Services) | 🔒 confirmed 2026-08-16 |
| Address | 14 Pollard Drive, Leopold, VIC 3224, Australia | ⚠️ Robert updating — old address, decision pending |
| Phone | +61 422 717 798 | 🔒 confirmed 2026-08-16 |
| Email (schema) | rob@lipservices.com.au | 🔒 confirmed correct 2026-08-17 |
| sameAs | facebook.com/localinternetpresenceservices · instagram.com/l.i.p.services · youtube.com/@LipservicesAuSite · linkedin.com/company/6419689 · threads.com/@l.i.p.services · tiktok.com/@l.i.p.services · google.com/maps?cid=18419614376604528516 | ✅ Pasted Live 2026-08-19 — all 7 platforms confirmed in RankMath Local SEO sameAs field (Facebook, Instagram, YouTube, LinkedIn, Threads, TikTok, Google Business Profile). Google Business Profile CID verified by decoding the real Maps place URL (`0xff9f9daf2930ef84` → decimal `18419614376604528516`) — an earlier CID guess (`4837786786`) was wrong and was replaced before pasting. No active X/Twitter profile. No Pinterest. Not yet re-checked against the live site (🔒 confirm next time you're verifying pages). |

**Flag fully resolved (2026-08-17):** Robert confirmed `rob@lipservices.com.au` (with `.au`) is correct and live/monitored. Fixed in `wordpress/knowledge-base.js`, `wordpress/voice-agent-prompt.md` (display text), and `wordpress/chat-proxy.php`'s `NOTIFICATION_EMAIL` constant (functional — where Aria's "New chat lead" notification emails actually land). The footer email itself (shown on the live site) isn't in a repo file — it's set directly in Divi, outside version control — worth checking it also reads `.au` next time you're in there, not confirmed either way yet.

---

## Per-page

**Focus keyword rule (RankMath, confirmed 2026-08-16):** one distinct focus keyword per page, never reused across pages — duplicate targeting cannibalizes both pages' rankings. Home is intentionally exempt (broad, multi-vertical, not a single-keyword page). Keyword should appear in: title, URL, meta description, first paragraph, one subheading, one image alt tag.

**RankMath score target: ~70-85%, not 100%.** Robert confirmed 70% was the previous ceiling. The gap to 100% is almost entirely the 2,500-word minimum and 1-1.5% keyword density target — both wrong fits for conversion-focused landing pages (word-count padding and density-counting fight the actual goal of getting someone to the get-started form). Don't chase those two past a natural fit. Everything else on the checklist (keyword placement, TOC, images, short paragraphs, unique keyword) is worth hitting in full.

| Page | URL | Focus Keyword | Title Tag | Meta Description | Schema | Status | Last Confirmed Live |
|---|---|---|---|---|---|---|---|
| Home | `/` | *(none — intentionally broad, serves all verticals)* | AI Marketing & Automation for Small Business \| LIP Services | AI receptionist, lead generation and automation for local and professional service businesses — enterprise tools at a small business price. Get started free. | Sitewide only (see above) | ✅ Content + footer fix live and verified. ⚠️ Title live but broken — RankMath auto-appends old site name, now 79 chars (target was 59). See Site Title fix below. | 🔒 confirmed 2026-08-16 |
| Get Started | `/get-started/` | *(none — conversion page, not a search-target page)* | Get Started — Free AI Marketing Plan \| LIP Services | Book a free, no-obligation call and see how AI can generate leads, book appointments, and save you hours each week. Get started with LIP Services today. | Sitewide only | ✅ Live, slug confirmed. ⚠️ Same title-suffix issue as Home | 🔒 confirmed 2026-08-16 |
| AI Receptionist (tradies) | `/ai-receptionist-for-tradies/` | AI receptionist for tradies | AI Receptionist for Tradies \| LIP Services | Never miss another job because you were on the tools. An AI receptionist answers every call, qualifies the lead, and books the job, 24/7. Book a free call. | Sitewide only | ✅ Live, verified 2026-08-17. Same title-suffix issue as Home/Get Started | 🔒 confirmed 2026-08-17 |
| Quote Follow-Up (tradies) | `/quote-follow-up-automation-for-tradies/` ⚠️ note: **not** `/quote-follow-up-for-tradies/` — actual slug is longer than planned, see below | quote follow-up automation for tradies | Quote Follow-Up Automation for Tradies \| LIP Services | Stop losing jobs to silence. Automated follow-up chases every quote you send so nothing goes cold. See how it works. | Sitewide only | ✅ Live, verified 2026-08-17. Cross-links fixed same day (see note below) | 🔒 confirmed 2026-08-17 |
| Invoice Reminders (tradies) | `/invoice-reminder-automation-for-tradies/` ⚠️ note: **not** `/invoice-reminders-for-tradies/` — actual slug is longer than planned, see below | invoice reminder automation for tradies | Invoice Reminder Automation for Tradies \| LIP Services *(live title differs from what was drafted — RankMath used the keyword directly, not the original "Invoice & Payment Reminders" wording)* | 92% of construction businesses had overdue invoices last year. Automated reminders chase late payments for you, without the awkward call. | Sitewide only | ✅ Live, verified 2026-08-17. Cross-links fixed same day (see note below) | 🔒 confirmed 2026-08-17 |

**92% overdue-invoices stat, source added 2026-08-23:** cited to [Stonegate Legal — Statutory Demands in Construction](https://stonegatelegal.com.au/statutory-demands-in-construction-complete-guide/), which states "92% of Australian construction firms reported overdue invoices in the last 12 months" — note that article itself doesn't cite a primary source for the figure, so this is a secondary citation, not a primary study. Linked inline (small "source" superscript) in the body copy of `pages/invoice-reminders-for-tradies.html`; the meta description above is plain text (search snippets can't carry a link) and the Wimmera Construction cold-email draft in Command Centre's Outreach tab also uses this stat unlinked (plain-text email body, same reasoning). This is also the same 92% figure used in the Founder — Systems / Jim's Franchise content and referenced in `blog-topic-ideas-2026.md`'s topic #5 (which needs a *different, complementary* stat, not this one repeated).
| Video Marketing (tradies) | `/video-marketing-for-tradies/` | video marketing for tradies | Video Marketing for Tradies \| LIP Services | Too busy to market? We write the scripts, edit the videos, and schedule the posts, you just supply the footage. | Sitewide only | ✅ Live, verified 2026-08-17 | 🔒 confirmed 2026-08-17 |
| Jim's Franchise Lead System (blog) | `/blog/jims-franchise-lead-system/` (confirmed working 2026-08-19 — Permalinks set to Custom Structure `/blog/%postname%/`) | small business lead management system | Why I Don't Ask You to Take My Word for It, and Why I Built LIP Services \| LIP Services | 12 years watching digital marketing sell hope with no guarantees, a near-miss as a Jim's franchisee, and the system it led to: one you can test yourself, not just take on faith. | Sitewide only + Article schema (WP/RankMath adds this automatically for Posts) | ✅ Uploaded to WordPress 2026-08-19, not yet published — waiting on featured image | — |
| What Is AI, Explained for Tradies (blog) | `/blog/what-is-ai-and-what-can-it-actually-do-for-tradies-coaches-and-consultants/` | What Is AI and What Can It Actually Do | What Is AI and What Can It Actually Do for Tradies, Coaches and Consultants? \| LIP Services | AI explained in plain English for Australian tradies, coaches and consultants. What it actually does, what it won't do, and where to start in your business. | Sitewide only + Article schema (WP/RankMath adds this automatically for Posts) | ✅ Live, confirmed 2026-08-19. Published via the Command Centre content creator, outside the `copy/` drafting pipeline — no local draft file exists for this one. | 🔒 confirmed 2026-08-19 |
| AI Marketing Tools for Service Businesses (blog) | `/blog/do-australian-small-service-businesses-actually-need-ai-marketing-tools/` | AI Marketing Tools | Do Australian Small Service Businesses Actually Need AI Marketing Tools? \| LIP Services | Discover if AI marketing tools solve your real problems — missed calls, slow follow-ups, inconsistent content. Start free. | Sitewide only + Article schema (WP/RankMath adds this automatically for Posts) | ✅ Live, confirmed 2026-08-19. **Live values differ from the original draft** (`copy/blog-ai-marketing-tools-tradies.md` had focus keyword "AI marketing tools for service businesses" and a different meta description) — table updated to match what's actually live, per this doc's own rule that RankMath/live is the source of truth, not the draft file. | 🔒 confirmed 2026-08-19 |
| About / Founder Story | `/about/` | LIP Services founder story (branded/story-intent, not commercial) | The Long Way Round to LIP Services \| LIP Services | Twelve years of doubt, five years fencing for Jim's, two years on the road, and a vacant block in the bush: the real, unpolished story behind LIP Services. | Sitewide only (consider adding Person schema for Rob van Herwynen once page is live — not yet added) | ✅ Uploaded to WordPress 2026-08-19 (`pages/about.html` pasted into a Divi Code module), not yet published — waiting on a real block/caravan photo. Still needs a main-nav entry added in Divi (Appearance → Menus). **Decision (2026-08-19):** this started as a blog draft (`copy/blog-founder-story.md`, now archived) but was promoted to a real nav-level page — pure founder bio, distinct from the Jim's-franchise post which is a proof-driven methodology/conversion piece. | — |

**IndexNow submission (2026-08-17):** all 4 trades pages submitted via RankMath's Instant Indexing to push for faster indexing than waiting on regular crawl. Not a ranking signal itself, just a "here's a URL, come look" ping — worth a spot-check in a few days via `site:lipservices.com.au` or Search Console to confirm Google actually indexed them, since submission ≠ indexing.

**Slug mismatch, found and fully fixed 2026-08-17:** the URL for a WP page is set by its own title-derived slug, not by what the file's `<a href>` links assume. 2 of the 4 pages ended up with longer, keyword-exact slugs than planned (WordPress/RankMath derived them from the published Page Title, which differed from the draft). This broke the "More Ways We Help Tradies" cross-links between all 4 pages, which had hardcoded the assumed shorter URLs — they 404'd and WordPress served the homepage as a fallback instead of a real 404, which is why it initially looked like a caching issue. Fixed in the local source files (`pages/*.html`) and pasted into all 4 live Divi Code modules same day — verified live, every cross-link across all 4 pages now resolves correctly.

**Sitewide fix needed:** WP Admin → Settings → General → **Site Title** → change from "Local Internet Presence Services" to "LIP Services". RankMath's title separator pulls from this field on every page, so it's a one-time fix rather than something to patch per page.

---

## Internal linking map

Two different things worth separating: **incoming links** (backlinks from other sites — stays in the Parking Lot on `plan-of-attack-2026.md`, it's outreach work not a build task) vs. **internal links** (our own pages linking to each other — actionable now, tracked here).

Principle: Home is the highest-authority page — it should link out to every landing page as it's built. Every landing page links back to Home and forward to Get Started. No orphan pages — a new page goes live already linked from somewhere, not left for the sitemap alone to surface.

| From | To | Where / Anchor Text | Status |
|---|---|---|---|
| Home | Get Started | Sitewide header bar CTA (`?src=header-bar`, all pages) + hero CTAs | ✅ live |
| Home | AI Receptionist (tradies) | "Who We Help" → Trades & Home Services card, anchor ≈ "AI receptionist for tradies" | 📝 Wired 2026-08-17, not live yet |
| AI Receptionist (tradies) | Get Started | Primary CTA (`?src=trades-receptionist-page`) + related links to other 3 trades pages | ✅ built |
| Quote Follow-Up (tradies) | Get Started | Primary CTA (`?src=trades-followup-page`) + related links to other 3 trades pages | ✅ built |
| Invoice Reminders (tradies) | Get Started | Primary CTA (`?src=trades-invoicing-page`) + related links to other 3 trades pages | ✅ built |
| Video Marketing (tradies) | Get Started | Primary CTA (`?src=trades-video-page`) + related links to other 3 trades pages | ✅ built |
| All 4 trades pages | Home | Global Divi nav/logo (theme-level, not in-module) | ✅ automatic once pasted into Divi |
| Jim's Franchise Lead System (blog) | Video Marketing (Phase 1) · AI Receptionist (Phase 2) · Quote Follow-Up (Phase 3) · Invoice Reminders (Phase 4) | Inline anchor text within each phase section, `?src=blog-jims-franchise-lead-system` | 📝 Built into draft, not live |
| Jim's Franchise Lead System (blog) | Get Started | Closing CTA (`?src=blog-jims-franchise-lead-system`) | 📝 Built into draft, not live |
| *(none yet)* | Jim's Franchise Lead System (blog) | First post — nothing links to it yet since it isn't published. Once live: add to Home's future blog/content section, and consider a "the story behind this" link from the 4 trades pages back to it | 🔴 not started |
| About / Founder Story | Jim's Franchise Lead System (blog) | "I've written it up separately" / "that's the next part of the story" — 2 inline links, About is positioned as the prequel, Jim's post as the payoff/system | 📝 Built into `pages/about.html`, not live |
| Jim's Franchise Lead System (blog) | About / Founder Story | Planned: add an intro link at the top of the Jim's post pointing back to About once both are live | 🔴 not started |
| *(none yet)* | About / Founder Story | Once live: add to the main Divi nav (Appearance → Menus) and Home's future content section | 🔴 not started |

*Add a row per new page's links as it's planned — same discipline as the focus keyword check, do it before the page goes live, not after.*

**Site nav architecture, settled 2026-08-17** (was a mess before this — see the "Marketing"/"Privacy" stale-menu finding earlier this same day):
- **Real global Divi menu** (Appearance → Menus, appears on every page): Home + "For Tradies" dropdown (4 pages). Manually curated, not a WP Category — deliberately, since Category-based menus are what caused the original mess (old blog posts silently accumulating into "Marketing").
- **Custom header bar** (Divi Child Theme `functions.php`, `wp_body_open` hook, sitewide): phone, email, and the Get Started CTA (`?src=header-bar`). Server-rendered, not JS-injected — the earlier JS/DOM-search approach was fragile and got caught out by LiteSpeed caching.
- **Homepage jump box** (`pages/home-page-section.html` only, not sitewide): in-page "Jump To" links to the homepage's own sections (Problem, Services, Our System, Who We Help, Pricing, Get Started). Replaces the old embedded sticky anchor-nav, which broke off-homepage since those anchors don't exist on other pages. Same jump-box component already used on all 4 trades pages (`wordpress/jump-links-toc-template.html`).

---

*Add a row per page as it's built. When starting a new landing page (Phase 1 step 4 in `copy/plan-of-attack-2026.md`), draft its name, focus keyword, title/meta here before pasting into RankMath — keeps everything in one place instead of scattered across chat history. Check the next combo's keyword against every row above first — no repeats.*
