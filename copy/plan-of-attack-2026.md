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
- **Topic queue (added 2026-08-20):** `copy/blog-topic-ideas-2026.md` — 10 pain-first long-tail topics, each mapped to a funnel page and checked against existing focus keywords. Pull from here before inventing a new topic ad hoc.

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
| Google Business Profile | Local intent, near-ready-to-book | Booking/website link → Get Started (`?src=google-business-profile`) | Informational, local-SEO keyword-aware |

- [ ] YouTube channel cleanup before new uploads (found 2026-08-19): ~20 videos are old intro/outro/banner render clips titled "Your Business [X] Logo" — off-brand for the channel's public Videos tab. Source software confirmed still accessible (Viddyoze, create.viddyoze.com) as of 2026-08-19, so these are safe to **delete outright** rather than just hide. One more video, "15 Steps To Maximise Your ROI Using Facebook Ad Spend" (Robert's old Facebook ads methodology, pre-dates the pivot to LIP Services' AI systems), should go **Private** instead — off-brand, not deleted, in case any of it is worth mining later.
- **Note (2026-08-19):** Viddyoze logo-reveal clips are fully customisable (re-render with actual LIP Services branding, not the "Your Business Logo" placeholder) and can be dropped into CapCut for final editing — available as an intro/outro asset source for future video content or client demo material, independent of the cleanup above.
- [ ] **High priority (flagged 2026-08-19):** get actual video content posted across platforms (YouTube, Facebook, Instagram, Threads, TikTok) — capturing eyeballs is the current bottleneck, not just having profiles set up. Sequence with the YouTube cleanup above (clean channel first, then post).

### 7. Founder bio page — /about/ (added 2026-08-19)
- [x] Drafted as a blog post first (`copy/blog-founder-story.md`), then decided it should stand up as a real nav-level page instead — a founder bio isn't disposable blog content, it has evergreen value as site architecture. Built to `pages/about.html`, old draft archived to `archive/blog-founder-story-superseded.md`.
- [x] Positioning settled: About page = pure founder bio (no product pitch). Jim's Franchise blog post = proof-driven methodology/conversion piece (opens with personal credibility, but its job is explaining the 4-phase system and funnelling into the product pages). Different jobs, cross-linked both ways.
- [x] Paste `pages/about.html` into a Divi Code module — done 2026-08-19, uploaded to WordPress, not yet published (waiting on image)
- [ ] **Add to main Divi nav** (Appearance → Menus) — decided 2026-08-19 this gets permanent top-level visibility, not just a footer/blog link
- [ ] Featured/hero image — real photo from the block/caravan/build, not stock (fits the page's "this is honest and current" tone). **Blocking publish.**
- [ ] Once both About and the Jim's post are live: add the intro backlink from Jim's post → About (see `pages/seo-meta-schema-index.md` internal linking map)
- **Status (2026-08-19, end of session):** Both `pages/about.html` and `copy/blog-jims-franchise-system.md` are now uploaded into WordPress. Both waiting on images before going live — About needs a real block/caravan shot, Jim's post needs its featured image per `pages/seo-meta-schema-index.md`. Permalink structure set to `/blog/%postname%/` (Custom Structure, Posts only) so the Jim's post gets its planned `/blog/` prefix — confirmed working. Found and diagnosed (not yet fixed) a separate, unrelated footer bug: Terms/Privacy footer links are missing `https://`/leading `/`, causing broken concatenated URLs like `/terms/lipservices.com.au/privacy` — Robert fixing directly in Divi.
- **⚠️ Verify before publishing (2026-08-19):** the Jim's post's planned slug assumes `/blog/jims-franchise-lead-system/` — that `/blog/` prefix only appears if WordPress's Permalink settings (Settings → Permalinks) are actually configured to put Posts under `/blog/`. If not, it may publish at a different URL with no `/blog/` segment, same failure mode as the trades-page slug mismatch (2026-08-17). Check Permalink settings and confirm the real live URL matches the front matter before wiring any cross-links to it.

### 8. Blog index page (flagged 2026-08-19)
- **Gap found:** with Home as a static homepage, WordPress needs a designated Posts page (Settings → Reading) for any blog archive URL to exist at all — likely never configured, meaning there's currently no page listing all posts.
- [x] Create a Page titled "Blog," set as the Posts page in Reading settings — done 2026-08-19, `/blog/` index live
- [x] Link it modestly (single footer line, not a nav tab yet) — done 2026-08-19, keeps the deliberately clutter-free/no-sidebar design intact. Revisit promoting to main nav once there's more than 2 posts to justify it.
- [x] **Pre-publish blocker:** old pre-pivot Facebook-ads-consulting posts set to Draft — done 2026-08-19, confirmed clean.
- **Live state confirmed 2026-08-19** (via `/blog/`): 2 posts live — "What Is AI and What Can It Actually Do for Tradies, Coaches and Consultants?" and "Do Australian Small Service Businesses Actually Need AI Marketing Tools?" (matches tracked draft `copy/blog-ai-marketing-tools-tradies.md`). 1 post in Draft waiting on a picture (the Jim's Franchise post). **Open item:** the first post isn't in `pages/seo-meta-schema-index.md` — no tracked focus keyword/meta description, origin unconfirmed (possibly published directly via WordPress/content creator, outside this repo's pipeline). Worth adding to the tracking doc once its metadata is known, so future posts get checked against it for keyword overlap.

### 9. Pillar audit (flagged 2026-08-19)
**Two unrelated things share the word "pillar" — don't conflate them:**
- **Command Centre's "Pillar"** (Cash Flow / Client Attraction / Business Reality / AI & Automation / Behind the Build) — a content-ideation category used by the content machine in Command Centre (`src/dashboard/content-strategy.ts`, `Research.tsx`). Still the right reference for categorising ideas the content machine produces — not being replaced by anything below, just needs auditing for accuracy.
- **RankMath's "Pillar Content"** — a WordPress/SEO feature (cornerstone-content toggle + AI internal Link Suggestions). Only works in the WP Block Editor, not Divi Code modules — so it applies to blog **posts** (Jim's Franchise, AI-marketing-tools, future posts) but not Home/About/Get Started/the 4 trades pages, which stay on the existing manual internal-linking-map process in `pages/seo-meta-schema-index.md`.

- [ ] Jim's Franchise post's Command Centre `Pillar` field fixed today — was incorrectly dual-tagged "Behind the Build / Business Reality," corrected to single-value "Behind the Build" (the field is single-select; the post's actual content — origin story + 4-phase system — matches Behind the Build's defined intent, not Business Reality's "relatable grind" content).
- [ ] **To do:** go through every other piece of content the content machine has produced (the AI-marketing-tools post, and anything published after) and confirm each has exactly one correct Command Centre pillar assigned — don't assume existing tags are right, the Jim's post mismatch shows they weren't being set carefully.
- [ ] **To do, WP-side (once Jim's Franchise post is live):** Titles & Meta → Posts (Advanced Mode) → enable **Link Suggestions**, method = focus keyword. Then edit the Jim's Franchise post → RankMath General tab → check **"This post is Pillar Content"** (it's the strongest cornerstone piece — everything else should eventually link to it). Future blog posts will then get automatic link suggestions back to it in the editor.

- [x] Draft one-line bio + profile description per platform — same core identity (name, logo, phone) everywhere, tone adjusted per row above. Drafted 2026-08-19 in `copy/social-profile-bios.md`, not yet pasted to any platform.
- [ ] Confirm NAP (name/address/phone) matches the website exactly on every profile

---

## Parking lot — logged, not forgotten, not now
- All 36 service × vertical landing page combinations (doing 3–4 to start)
- Comparison pages ("LIP Services vs X") — part of the AEO layer, Phase 1 step 6
- Backlink building / guest appearances
- Google Business Profile audit (flagged in the Aug 5 audit, untouched here)
- Anything else that comes up mid-build — write it here, don't chase it mid-step
