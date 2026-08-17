# LIP Services — Website & Social Lead Capture: Plan of Attack
**Date:** 2026-08-16
**Purpose:** Single reference for this push. Work top to bottom, in order — don't start a later step before the one above it is closed. Anything that comes up mid-build that isn't on this list goes in the Parking Lot, not into the current step.

**Companion docs (the "why," not repeated here):** `seo-aeo-strategy-2026.md` (full technical audit, 2026-08-05) and `seo-quick-wins-playbook.md` (reusable sales tool built from the same audit). **Per-page title/meta/schema tracking:** `pages/seo-meta-schema-index.md` — draft it there before pasting into RankMath, one place instead of scattered across chat history.

---

## Current state (as of 2026-08-16)
- ✅ Get-started page live, posts leads straight into the CRM (`crm.lipservices.com.au/api/webhooks/landing`)
- ✅ Contact section updated
- ✅ Front page (`page-landing.php`) updated
- ✅ Duplicate homepage eliminated
- ⚠️ Title tag + meta description + schema — done in working tree, not yet committed
- ✅ Lead source tagging — form reads `?src=` param, defaults to `landing_page` (2026-08-17)
- ❌ No social lead capture set up yet

## Needs Robert's input before Phase 1 can finish
1. What specifically needs tweaking on the get-started page?

---

## Phase 1 — Website (traffic + lead capture + search/AI ranking)

### 1. Confirm the 3 quick SEO fixes (Aug 5 audit)
- [x] Duplicate homepage fixed — competing pages eliminated (2026-08-16)
- [x] Homepage title tag rewritten — `page-landing.php` (2026-08-16): "AI Marketing & Automation for Small Business | LIP Services"
- [x] Homepage meta description added — same file (2026-08-16)
- [x] Organization schema (JSON-LD) added to homepage (2026-08-16) — `sameAs` left empty, fill in once Phase 2 social profiles exist
- [ ] Get-started page title/meta description — copy drafted, needs pasting into WP page settings (Yoast/RankMath) since that page is a Divi fragment, not a standalone file (`pages/get-started.html`): Title "Get Started — Free AI Marketing Plan | LIP Services", description "Book a free, no-obligation call and see how AI can generate leads, book appointments, and save you hours each week. Get started with LIP Services today."
- [ ] FAQ schema — deliberately not added yet. Needs a real, visible FAQ section on the page first (Google penalises/ignores schema that doesn't match visible content) — see step 6, or pull forward if wanted
- [ ] Sitemap referenced in robots.txt — still open, WP admin side

~30 min total for what's left, WordPress admin side.

### 2. Get-started page tweaks
- [ ] Robert to specify what's off — review live once flagged

### 3. Add lead-source tagging to the enquiry form
- [x] Replace hardcoded `source: 'landing_page'` with a value read from a URL param (2026-08-17) — `leadSource()` reads `?src=` off the page URL, falls back to `'landing_page'` when absent. Applied to all three copies of the form found at the time. **Correction (2026-08-17, later same day):** a fuller audit found only `pages/get-started.html` (moved from `wordpress/landing-page-get-started-section.html`) is actually live — `page-landing.php` and `landing-page-contact-section.html` were stale and have since been moved to `archive/` (see step 4 notes). The fix is only live-relevant in `pages/get-started.html`; it's harmless but inert in the two archived copies. CRM webhook (`LIPS-CRM/app/api/webhooks/landing/route.js`) takes `source` as free text, no allowlist, so any `?src=` value works out of the box.
- [x] Lets every future bio link, ad, or landing page report distinctly in the CRM

**Gate: Phase 2 does not start until this is done** — otherwise social lead volume is invisible in the CRM. ✅ Unblocked.

### 4. Build service × vertical landing pages
- [x] Start with trades — founder story + existing video scripts already fit this vertical
- [x] 4 pages built 2026-08-17, trades vertical only (see decision note below) — not all 36 combinations (see Parking Lot)
- [x] Each page funnels to get-started (`?src=` tagged per page — see step 3)
- [x] Include the jump-links table of contents on each page — template at `wordpress/jump-links-toc-template.html`
- **Scope decision (2026-08-17):** went deeper on trades (one page per real, source-backed problem) rather than wider across verticals — vertical expansion (the 36-combo matrix) stays parked until non-trades verticals have their own sourced pain points/proof, same reasoning as the Parking Lot entry below.
- **Pages built:**
  1. `pages/ai-receptionist-for-tradies.html` — missed calls
  2. `pages/quote-follow-up-for-tradies.html` — dead quotes / no follow-up
  3. `pages/invoice-reminders-for-tradies.html` — late payments (real stat: 92% of construction businesses had overdue invoices last year)
  4. `pages/video-marketing-for-tradies.html` — too busy to market / referral dependence (no productized price exists for this one in either pricing model — CTA is a custom quote, not a fixed number)
- **Pricing flag resolved (2026-08-17):** the setup-fee pricing model ($1,500 setup etc) is stale — Robert confirmed the subscription model in `pages/home-page-section.html` ($197–$447/mo) is current and matches the live site. All 4 new pages use the subscription numbers. **Full audit same day:** turned out there were 5 competing homepage copies total. The 2 stale ones plus 2 other orphaned/superseded drafts were moved to `archive/` with banner comments — see `CLAUDE.md` for the full breakdown. Only `pages/home-page-section.html` (home) and `pages/get-started.html` (get-started) are confirmed live-accurate.
- [x] Pasted into Divi Code modules and published, confirmed live 2026-08-17
- **Slug mismatch found &amp; fully fixed (2026-08-17):** 2 of the 4 pages got longer, keyword-exact slugs than planned once published (WordPress derives the slug from the Page Title, which Robert/RankMath set differently than the draft) — `quote-follow-up-for-tradies` → actually `quote-follow-up-automation-for-tradies`, `invoice-reminders-for-tradies` → actually `invoice-reminder-automation-for-tradies`. This broke the hardcoded "More Ways We Help Tradies" cross-links between all 4 pages (they 404'd, WordPress served the homepage as a fallback, which looked like a caching bug at first). Fixed in the local `pages/*.html` source files and pasted into all 4 live Divi Code modules same day — verified live, every cross-link resolves correctly now.
- **Lesson for the next batch of pages:** don't hardcode cross-links between not-yet-published pages based on the planned slug. Either confirm the real slug after publishing before adding cross-links, or publish first and add the "related pages" links as a follow-up pass once every URL in the set is confirmed live.
- **Build workflow (decided 2026-08-16):** Claude Code writes the page HTML, Robert pastes it into a Divi Code module. Content inside the module isn't Divi-editable, but global menu and footer stay uniform since those live at the theme level, outside the module.
- **File location (2026-08-16):** page HTML files — this one and all future landing pages — live in `pages/`, not `wordpress/`. `pages/home-page-section.html` is the current example.

### 5. Repurpose existing trade video scripts into blog posts
- [ ] Cheapest content available — already written once for another medium
- **Workflow:** blog posts stay on their own track — Robert generates copy via the content creator and uploads images manually, separate from the Claude-Code-built pages above. Same jump-links template applies here too (`wordpress/jump-links-toc-template.html`) — 3–6 sections per post is the sweet spot.

### 6. AEO layer — only once 1–5 are solid
- [ ] Monthly 15-min log: ask ChatGPT/Claude/Perplexity the buyer question, record whether LIP Services is named
- [ ] 2–3 honest comparison pages

(Schema markup moved to step 1 — Robert's doing it alongside meta data rather than waiting for this step.)

---

## Phase 2 — Social lead capture

Blocked on Phase 1 step 3 (source tagging) — no point sending social traffic somewhere that can't report where it came from.

| Platform | Role | Lead mechanism | Tone |
|---|---|---|---|
| Facebook | Awareness + retarget | Native Lead Ads or bio link (`?src=facebook`) | Tradie-facing, punchy |
| Instagram | Awareness + traffic | Single bio link (`?src=instagram`), Story link stickers | Tradie-facing, punchy |
| YouTube | Distribution for existing video pipeline | About/description link (`?src=youtube`) | Tradie-facing, punchy |
| LinkedIn | Direct B2B lead gen | Native Lead Gen Forms | Business / case-study |

- [ ] Draft one-line bio + profile description per platform — same core identity (name, logo, phone) everywhere, tone adjusted per row above
- [ ] Confirm NAP (name/address/phone) matches the website exactly on every profile

---

## Parking lot — logged, not forgotten, not now
- All 36 service × vertical landing page combinations (doing 3–4 to start)
- Comparison pages ("LIP Services vs X") — part of the AEO layer, Phase 1 step 6
- Backlink building / guest appearances
- Google Business Profile audit (flagged in the Aug 5 audit, untouched here)
- Anything else that comes up mid-build — write it here, don't chase it mid-step
