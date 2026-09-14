# Website Overhaul — Build Spec
**Prepared:** 2026-09-14
**Origin:** Malcolm's informal review + independent Opus PDF review + Opus gap-check against this repo's actual source files. Full decision trail in LIP-Command-Centre's memory (`lip_services_website_2026_09_overhaul.md`) if this doc needs context later.

This is the ready-to-build spec. Cross-check against `site-map-and-focus-2026.md` and `pages/seo-meta-schema-index.md` as you go — update both when pages/nav actually change, per that doc's own rule.

---

## 1. Navigation — final structure

```
Home
  └ Blog
About
  └ Contact  → links to the existing /get-started/ page (don't build a second form page)
Services
  ├ Pricing overview  → anchor link to homepage #pricing section
  ├ AI Voice Agent      (/ai-voice-agent/ — live)
  ├ Automated CRM        (/automated-crm/ — live)
  ├ AI Automated Office Manager  (/ai-office-manager/ — live)
  └ Video & Content Creation  (page TBD — see §7, custom pricing)
Who We Help  [renamed from "For Tradies"]
  ├ Trades & Home Services  → new hub page (content below — matches the other 5 for consistency)
  ├ Health & Wellness       (new hub — content in §6)
  ├ Legal & Financial       (new hub — content in §6)
  ├ Real Estate & Property  (new hub — content in §6)
  ├ Coaches & Consultants   (new hub — content in §6)
  └ Medical & Dental        (new hub — content in §6)
```

**Revised twice now.** Originally Trades was going to sit as its own 3-level sub-hub (Who We Help → Trades & Home Services → 4 pages) — dropped for a flat dropdown since 3-level dropdowns are a real rendering risk in Divi's menu module. Then briefly pointed "Trades & Home Services" straight at its strongest existing page (AI Receptionist for Tradies) to avoid extra build work. **Final call (2026-09-14):** built Trades its own lightweight hub page too, matching the other 5 — `pages/trades-and-home-services.html`, built. Two reasons this is better than linking straight to a deep page: (1) genuine nav consistency, every vertical is one hub-page click away, not "5 hubs + 1 deep page" for Trades specifically; (2) it closes a real SEO gap — none of the 4 existing trades pages target the *broad* "trades" query, they're all narrow (AI receptionist, quote follow-up, invoice reminders, video marketing specifically), so nothing was landing a visitor searching something like "AI systems for tradies." The Trades hub gets 4 service cards instead of 3, since — unlike the other 5 — this vertical already has real dedicated pages for everything rather than falling back to the generic pillars.

All 3 pillar pages confirmed live (checked 2026-09-14: `/automated-crm/` and `/ai-office-manager/` both return 200). No dead-nav-link risk building this now.

"For Tradies" parent currently points at `#` — the new "Who We Help" parent needs a real destination too (either a light overview page, or just make it non-clickable and rely on the dropdown, but a `#` link is exactly the bug being fixed elsewhere on this list, don't reintroduce it here).

**Why Contact → Get Started, not a new page:** `/get-started/` already exists, is already the site's one real conversion page, and already has the low-commitment form (details + "we'll be in touch") that answers the "every CTA is high-commitment" finding. Building a second, thinner contact page would just split that value in two.

**Why Pricing is nested under Services, not a top-level nav item:** the homepage already has a `#pricing` anchor (see `site-map-and-focus-2026.md`'s in-page jump box). Reusing it costs nothing and directly answers the original PDF finding ("no Pricing in the nav") without adding a 5th top-level button.

---

## 2. Header

**Current state (confirmed by reading the live HTML, 2026-09-14):** two separate, visually mismatched pieces stacked on top of each other:
1. A dark navy bar (`.lip-top-bar`, `#0f0f1a` background) injected via a raw PHP function (`lip_get_started_bar()`, hooked to `wp_body_open`) — currently renders only an email link and the "Get Started" CTA. **No phone number renders here at all**, despite `site-map-and-focus-2026.md` describing this bar's intended design as "phone, email, Get Started CTA." Something dropped the phone element at some point — this is a real regression, not just an old design choice.
2. The actual Divi Theme Builder header template below it (logo + "Home / For Tradies" menu).

**This is very likely why Divi's scroll-shrink header setting hasn't worked** — that dark bar isn't a Divi element, so Divi's sticky/shrink controls can't touch it. You'd have been configuring settings that only ever applied to the menu row underneath.

**Fix:** move the phone number and CTA into the Divi header template itself as modules (a text module + button module docked in the header row), rather than leaving them in the separate PHP-injected bar. This merges the two pieces into one Divi-controlled row (fixing the "two stacked eras" look), and Divi's shrink-on-scroll then works on the whole thing, since it's all one Divi element. Keep the PHP bar only if you want a distinct mobile-only fallback — otherwise retire it once its content moves into Divi.

**Content for the merged row:** logo + nav on one side; **Aria's number (0480 088 984)** + "Book a Free Strategy Call" button on the other. Per your call, Aria's number is the public one, no live transfer to your personal number — ruled out on purpose (transfer cost risk on Telnyx, and most callers to LIP's own line are prospects testing the tech, not emergencies). Compensating mechanism (same-day callback via a tagged, post-call SMS trigger into LIPS-CRM) is scoped and agreed but **deliberately deferred until after this website revamp is done** — see `aria_direct_contact_escalation_build` in Command Centre's memory for the full spec when it's time to build it. Nothing to do here now, just don't assume it exists yet.

---

## 3. Footer

Rebuild as multi-column instead of the current centered stack (the stacking is very likely *why* it reads bulky regardless of content — a layout problem, not a content-volume problem).

- **Col 1:** logo (leave as-is until the logo redesign — re-exporting the current 150×150 crop now is wasted effort if it's getting replaced), "Local Internet Presence Services", Aria's number, email, ABN 96 976 308 814, "Goroke, VIC — servicing Australia-wide" (real registered address, pulled from the site's own schema markup)
- **Col 2:** Services, Who We Help, About, Blog, Get Started
- **Col 3:** Terms & Conditions, Privacy Policy, Disclaimers

**Correction to the earlier plan:** keep **Disclaimers** — it's a real, separately maintained file in this repo (`copy/disclaimers.md`), not an affiliate-era leftover. Cut **Disclosures** and **Facebook Policy** specifically — those two are the actual old-theme artifacts the PDF review flagged.

**Remove entirely:** "Built with AI-assisted content creation — the same approach we help service businesses automate." Relocate into About, reframed (see §5).

---

## 4. Homepage copy

**Services overview section** (the categorical "what we do" section — 6 cards currently, being trimmed): resolve down to **3 real categories**, not 4. The Office Manager is a pricing bundle of Voice Agent + CRM, not a fourth distinct thing you *do* — it belongs in the Pricing section below, not listed as a peer category next to its own components. So:
- AI Voice Agent (Receptionist)
- Automated CRM
- Video & Content Creation

Heading: **"Three services. One growth system."** — now actually true.

**Pricing section** (the 3 dollar-figure cards): stays Voice Agent / CRM / Office Manager, unchanged in structure — this section was already correct, it just needs the contradiction below fixed.

**Hero stat bar:** currently "$0 — Upfront retainer required," which directly contradicts the setup fees in the pricing section a few scrolls down. Replace with a no-lock-in framing, matching the real terms in `copy/terms-and-conditions.md` (month-to-month, cancel any time) so the two pages corroborate each other. Suggested wording: **"No lock-in contracts"** or **"Month-to-month — cancel any time."**

**Cut entirely:** "3-5x average lead flow increase" — no data behind it. Rather than inventing a replacement number, reuse the one figure you've already standardized: **"Costs less than a part-time receptionist ($2,500+/month)"** — true, specific, and ties directly into the existing receptionist-cost comparison instead of adding a new unproven claim.

**Keep:** "14 days to first automation live" — confirmed real, describes actual onboarding, not a marketing multiplier.

**Receptionist cost comparison:** standardize to "$2,500/month or more" everywhere it appears (currently moves between $2,500 and $2,500-$5,000 in two spots on the same page).

**"Our System" section (LIP AI Growth System — Attract/Capture/Convert/Retain):** keep the framework, rework Step 1 only. Current: *"Targeted ads and SEO-optimised content bring the right people to the business."* This leans on paid ad management, which is going back-pocket. Suggested replacement: **"Search-visible content and word-of-mouth systems bring the right people to the business."** (Google/Meta Ads can stay listed under "Technology Used" as tools you're capable of using — the fix is not pitching Ad Campaign Management as a standing public service, not erasing that you can run ads.)

**Primary CTA:** alongside "Book a Free Strategy Call," add: **"Or call Aria now on 0480 088 984 — she'll book it in for you."** Framed as a live demonstration of the product, not just an alternate contact method.

---

## 5. About page

Two separate additions, don't conflate them:

**1. The AI-disclosure line, relocated and reframed** (moving out of the footer per §3). Suggested placement: near wherever the founder story explains how LIP Services actually works, not as a standalone disclosure paragraph bolted on. Draft:

> *"Worth saying plainly: this site, including its words, runs on the same AI-assisted systems LIP Services installs for clients. If you're wondering whether any of this actually works, you're already looking at the proof."*

**2. The storytelling connective tissue Malcolm actually asked for** — the About page currently shows the three life chapters (12 years doubting generic marketing courses, 5 years at Jim's Fencing, 2 years travelling) without explicitly tying each one to a feature of what LIP Services now does. That link is the missing piece, not more biography. Draft paragraph to adapt into your own voice (this is a starting point, not final copy — check every specific claim against what's actually true before it goes live):

> *"Twelve years of watching generic marketing courses over-promise and under-deliver is exactly why LIP Services doesn't lock anyone into a long contract. Five years at Jim's Fencing showed me how a good system never lets a lead go cold between the call and the invoice, which is the model behind the automated follow-up every client gets here. Two years on the road gave me time to actually ask small business owners what was eating their evenings — and the answer wasn't more leads, it was time. That's the actual problem this business is built to solve."*

---

## 6. "Who We Help" — the 5 new vertical hubs

**Built (2026-09-14):** `pages/health-and-wellness.html`, `pages/legal-and-financial.html`, `pages/real-estate-and-property.html`, `pages/coaches-and-consultants.html`, `pages/medical-and-dental.html`, plus `pages/trades-and-home-services.html` (added for nav consistency and to close an SEO gap — see §1) — ready to paste into Divi Code modules. Each matches the existing trades/pillar-page design system, lighter weight (hero, pain point, service cards, final CTA, related links — no TOC or founder-proof section). Trades' hub has 4 service cards instead of 3, linking to its own existing dedicated pages rather than the generic pillars.

Each is a short hub page: pain-point framing specific to that industry (not a reskinned template), then three brief blurbs linking to the relevant Services pillar page. Per the pillar/cluster rule agreed earlier: every link below goes to the generic pillar page for now; a vertical graduates to its own dedicated deep page later once there's real demand or proof in that vertical, the same way Trades already has "AI Receptionist for Tradies" instead of just linking to the generic Voice Agent page.

### Health & Wellness
*(physios, chiropractors, allied health, salons, fitness studios)*

> A missed appointment doesn't just cost you the session — it breaks the routine that was actually working for your client. Health and wellness businesses live and die on repeat bookings, and every no-show or forgotten rebooking is a client quietly drifting off your calendar.

- **Automated CRM** — automatic appointment reminders and rebooking prompts, so clients come back on schedule instead of falling off it.
- **AI Voice Agent** — calls get answered 24/7, including outside clinic hours, and it takes routine booking calls off your reception team's plate so they can focus on the client actually in the room, not the phone ringing behind the desk. Time spent on hold-and-transfer is time not spent on client care.
- **Video & Content Creation** — blog posts, video, and newsletters that keep your practice visible between visits, all built to run through the same CRM already managing your bookings.

### Legal & Financial
*(solicitors, accountants, financial advisors, mortgage brokers)*

> A missed call from a new enquiry doesn't just cost a booking — for a professional service, it's often the only shot you get. These are high-value, low-frequency leads with long decision cycles, and they expect a level of polish the moment they reach out.

- **AI Voice Agent** — every enquiry answered professionally, 24/7, with no call going to voicemail and losing momentum. It also takes routine intake calls off your front-of-house staff, freeing that time for actual client work — the billable kind.
- **Automated CRM** — nurture sequences for clients who take weeks to decide, so you're still front of mind when they're ready.
- **Video & Content Creation** — explainer content, blog posts, and newsletters that build trust before the first meeting even happens, delivered through the same CRM already managing your leads.

### Real Estate & Property
*(agents and property managers)*

> A buyer who calls about a listing on Saturday and doesn't hear back until Monday has usually already called someone else. Real estate runs on speed — and property managers separately carry a constant stream of maintenance and tenant enquiries that never really stops.

- **AI Voice Agent** — instant response and appointment booking for open-home and listing enquiries, any time they come in. For property managers, it also takes the constant stream of routine maintenance calls off your team, freeing them to focus on the tenants and owners who actually need a person.
- **Automated CRM** — automated per-listing follow-up so no enquiry goes cold while you're at another open home.
- **Video & Content Creation** — listing walkthroughs, blog content, and newsletters that keep properties (and you) visible, run through the same CRM handling your leads.

### Coaches & Consultants
*(business coaches, marketing consultants, HR advisors)*

> People are researching you before the discovery call. If your booking process looks like a one-person hustle, that's the first thing they notice — and for a business built on personal authority, that's the wrong first impression.

- **AI Voice Agent** — a professional booking experience for discovery calls that matches the authority you're selling.
- **Automated CRM** — automated no-show follow-up and re-engagement, so a missed call isn't a lost client.
- **Video & Content Creation** — authority-building video, blog posts, and newsletters that do the convincing before you ever get on a call, all built into the same CRM running your bookings.

### Medical & Dental
*(GP clinics, dental practices, specialists)*

> A missed call from a patient in pain doesn't wait for business hours — and an empty specialist slot is time the practice can't get back. Patient communication in this space also carries higher expectations around professionalism and follow-through than most other industries.

- **AI Voice Agent** — 24/7 call handling so a patient in urgent need is never left on hold or sent to voicemail. It also means front-desk staff aren't buried in routine calls all day and can give the patient standing in front of them their full attention — time not spent on the phone is time spent on care.
- **Automated CRM** — automated appointment reminders that cut no-shows, protecting slots that are expensive to leave empty.
- **Video & Content Creation** — practice-introduction video, blog posts, and newsletters that put patients at ease before they even walk in, run through the same CRM managing your appointments.

---

## 7. Video & Content Creation pricing

**Built (2026-09-14):** `pages/video-content-creation.html` — ready to paste into Divi. Matches the same industry-agnostic pillar template as the other 3 (TOC, problem, how-it-works, included, who-it's-for, proof, pricing, final CTA, related), no fixed price — the Pricing section explicitly explains *why* it's custom rather than just omitting a number ("unlike the AI Voice Agent and CRM, this one doesn't have a flat monthly rate... scoped on a quick call rather than guessed at here"), so the absence of a dollar figure reads as an honest choice rather than the "half the services have no price" credibility gap the original PDF review flagged.

**Scope note:** this service covers more than video — blog posts and newsletters are part of it too, delivered through the same CRM already running bookings/follow-up, not a separate content platform. The 5 vertical hub blurbs in §6 already reflect this; make sure the pillar page's own copy says the same thing rather than reading as video-only.

---

## 8. Market Research — repositioned

No longer a paid, standalone service. Becomes a free downloadable guide, offered only on the Automated CRM page:

> **Free guide: What your competitors' systems are already doing (and how to catch up)** — a short, no-cost breakdown of the automation most local competitors have already quietly put in place. Email-gated, no sales pitch.

This replaces the old "Market Research & Intelligence" service card. Note for `knowledge-base.js` (§9): the KB's problem list still says "no visibility into what competitors are doing" — keep that line, but Aria should point people to this guide rather than a paid research service when it comes up.

---

## 9. `wordpress/knowledge-base.js` — exact edits needed

This file is the source of truth for both the chat widget and Aria's Telnyx voice line — if it isn't edited in the same pass as the homepage copy, Aria keeps quoting claims the site just removed.

- **Line 24, remove:** `- 3–5x average increase in lead flow`
- **Line 25, remove:** `- No upfront retainer on performance services`
- **Replace both with:**
  ```
  - Costs less than a part-time receptionist ($2,500+/month)
  - No lock-in contracts — month-to-month
  ```
- **Line 26, keep as-is:** `- First automation live within 14 days`
- **§SERVICES — add a 4th entry** below the Office Manager tier:
  ```
  **4. Video & Content Creation** — custom pricing
  Scoped to the client's needs on a free consult call. Ask Rob for a quote based on what they're after.
  ```
- **§THE FOUR-STEP GROWTH SYSTEM, Step 1 — replace:**
  `Targeted ads and SEO-optimised content bring the right people to the business.`
  **with:**
  `Search-visible content and word-of-mouth systems bring the right people to the business.`
- **§THE PROBLEM LIP SERVICES SOLVES — no change needed**, but add one line after "No visibility into what competitors are doing": *(handled by pointing to the free guide, not a paid service — add an instruction under "WHAT ARIA SHOULD ALWAYS DO" or a short note here that Aria should mention the free competitor-insight guide on the CRM page if this comes up, not offer a paid research engagement.)*
- **Stale pointer, line 63:** the comment says "also update: pages/landing-page-v2.html (live pricing page)" — per `site-map-and-focus-2026.md`, that file is archived and the live homepage source is `pages/home-page-section.html` now. Fix this comment so the next edit doesn't get pasted into the wrong file.
- **Name:** this file already correctly says "Rob van Herwynen" — no change needed here, only the page metadata elsewhere is wrong (see §11).

After editing: re-check `wordpress/voice-agent-prompt.md` for the same two retired claims, fix if present, and **re-paste it into the Telnyx dashboard manually** — it does not sync from the repo automatically.

---

## 10. Graphics workstream (Malcolm's original ask — still the cheapest proof available)

Case studies stay deferred until real client material exists, which makes these the only credibility assets buildable this week:

- A real screenshot of the CRM dashboard (pipeline/contact view) — from your own LIPS-CRM instance
- A phone or iPad mockup showing a realistic notification, e.g. *"The Smith quote has just been confirmed — client notified, appointment booked"* (Malcolm's exact example, works as-is)
- A photo of you actually using the system (a desk/laptop shot is enough if a tradie-in-field photo isn't available yet)
- Once you have permission from even one client: a simple logo strip, "these businesses run on LIP Services"

---

## 11. Small fixes checklist (no further decisions needed, just execution)

- **Locale:** `<html lang="en-US">` and `og:locale: en_US` confirmed live — should be `en_AU`. Check WordPress Settings → General → Site Language, and RankMath's locale setting if it overrides it. Also fix `inLanguage` in the RankMath schema block.
- **Name sweep:** legal form is **Robert van Herwynen**, casual is **Rob**. Fix the Twitter/OG metadata ("Robert Herwynen" → "Robert van Herwynen"). Homepage's "Robert van Herwynen" is already correct. `knowledge-base.js`'s "Rob van Herwynen" is already correct. Use "Rob" in casual/CTA copy, full name in schema and the About byline.
- **Footer logo:** hold — don't re-export the squashed 150×150 crop, it's getting replaced by the logo redesign anyway.
- **Icons:** replace the emoji used across Services/Who We Help/Pricing cards with Divi's built-in icon module (Font Awesome, in brand colour) — no new tooling needed, stays editable in Divi's visual builder rather than hardcoded in a Code module.
- **Documentation:** update `site-map-and-focus-2026.md`, `pages/seo-meta-schema-index.md`, and the Internal Linking Map as each item above goes live — this project's own stated rule is a page isn't "done" until it's linked from somewhere and logged there.

---

## 12. Suggested build order

1. Fix the header (§2) — resolves the visual "two eras stacked" complaint immediately and is the highest-visibility change
2. Homepage copy (§4) + `knowledge-base.js` (§9) + Telnyx re-paste, same sitting — don't let the site and Aria disagree even briefly
3. Footer (§3)
4. Nav restructure (§1) — safe now, all pillar pages confirmed live
5. About insert (§5)
6. Video & Content Creation page + pricing note (§7)
7. Market Research repositioning on the CRM page (§8)
8. The 5 vertical hubs (§6) — largest single content task, no dependency on anything else, can run in parallel with the above
9. Graphics (§10) — no dependency, can start any time
10. Small fixes (§11) — cheap, do whenever convenient, but don't forget them
11. Locale fix (§13) — lowest priority on this entire list, do last

---

## 13. Locale fix — en-US → en-AU (low priority, do last)

**Worth knowing before doing this:** the `.com.au` domain is already the dominant geo-targeting signal Google uses — this fix won't move Australian search rankings, the domain already does that job. What it actually fixes is narrower: accessibility (screen readers announce the wrong reading dialect), the occasional browser "translate this page?" prompt, and closing a loose end a technical reader might notice in the page source. Not urgent. Zero downside to fixing it, just don't reprioritize anything above it to get here.

**Steps:**
1. **WP Admin → Settings → General → Site Language** — change the dropdown from "English (United States)" to "English (Australia)", then Save Changes. WordPress pulls the language pack automatically, nothing to install.
2. This one setting fixes both things the PDF review flagged — the `<html lang="en-US">` attribute and RankMath's `og:locale: en_US` meta tag both read off this same WordPress locale value.
3. **Purge the LiteSpeed cache afterward** (LiteSpeed Cache → Purge All, or the lightning-bolt icon in the admin bar) — otherwise the site keeps serving the old cached `en-US` page until it expires on its own.
4. Note: this also switches the wp-admin dashboard's own display language to Australian English — cosmetically almost identical to US English, don't be surprised by a stray relabeled setting.
5. If RankMath's schema block (`inLanguage` in the JSON-LD, separate from the meta tag) doesn't update after the purge, resave the homepage once in the editor to force RankMath to regenerate it — should be a non-issue in most cases since it normally reads live off the same setting.

---

## 14. Menu build steps (Appearance → Menus)

Unlike the header/footer, the menu itself isn't a code snippet — it's WordPress's native drag-and-drop menu builder, so this is a manual click-through, not a paste. Do this after the new pages exist (Video & Content Creation, the 5 vertical hubs) so nothing links to a page that isn't live yet.

1. **WP Admin → Appearance → Menus**, open the menu currently used for "Header Menu."
2. **Fix About:** drag "About" out from under "Home" so it becomes its own top-level item.
3. **Add Contact under About:** Add a Custom Link — URL `https://lipservices.com.au/get-started/`, Link Text "Contact" — then drag it to sit as a child of "About." (This reuses the existing Get Started page rather than building a second contact page — see §1.)
4. **Add Blog under Home:** if "Blog" isn't already a menu item, add the Blog page, drag it to sit as a child of "Home."
5. **Build the Services parent:** Add a Custom Link — URL `https://lipservices.com.au/#services`, Link Text "Services" (this reuses the homepage's existing in-page anchor rather than a dead `#`, so it's still clickable on its own). Then add these as its children, in order:
   - Custom Link → `https://lipservices.com.au/#pricing`, text "Pricing"
   - Page → AI Voice Agent
   - Page → Automated CRM
   - Page → AI Automated Office Manager
   - Page → Video & Content Creation (once that page is live)
6. **Rename "For Tradies" to "Who We Help"** rather than deleting and rebuilding it — edit the existing menu item's label, and change its URL from `#` to `https://lipservices.com.au/#who` (reuses the homepage's existing anchor — note it's `#who`, not `#who-we-help`, per the actual jump-nav in `pages/home-page-section.html` — fixing the dead-link finding at the same time).
7. **Remove the 4 existing trades pages as direct children** of that item, replace with a single child: Page → Trades & Home Services (the new hub page, `pages/trades-and-home-services.html` — see the note in §1 on why this replaced linking straight to AI Receptionist for Tradies). The 4 deep trades pages stay reachable from within that hub page itself, not from the nav.
8. **Add the 6 new vertical hub pages** as further children of "Who We Help," once each is live: Trades & Home Services, Health & Wellness, Legal & Financial, Real Estate & Property, Coaches & Consultants, Medical & Dental.
9. **Save Menu**, then check the live site on both desktop and mobile — a dropdown this size (6 items under Who We Help, 5 under Services) is worth eyeballing on a phone screen specifically, since the PDF review never checked mobile rendering at all.
