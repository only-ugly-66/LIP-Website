<!-- ══════════════════════════════════════════════════════════
     ARCHIVED 2026-08-29 — superseded by copy/ai-discovery-strategy-2026.md
     This was the original 2026-08-05 SEO/AEO audit. Items 1-4 (duplicate
     homepage, title tag, meta description, sitemap) and item 5 (trades
     landing pages) are done — see pages/seo-meta-schema-index.md and
     copy/plan-of-attack-2026.md for the executed record.
     Everything still open here (FAQ/schema, answer-first writing,
     comparison pages, the monthly AI-citation check, off-site trust
     signals) was carried forward, not dropped — it's now folded into
     copy/ai-discovery-strategy-2026.md's checklist alongside the
     2026-08-28 AI-agent-discovery framework (llms.txt, per-service
     schema, the access/extraction/trust model). Keep this file for
     the original audit record; don't treat it as the live plan.
     ══════════════════════════════════════════════════════════ -->

# LIP Services — SEO & AEO Strategy
**Site:** lipservices.com.au (WordPress/Divi)
**Prepared:** 2026-08-05
**Basis:** Live audit of homepage, robots.txt, sitemap.xml, and indexed content — not a generic checklist.

---

## What the audit found

### 🔴 Fix this week

**1. Duplicate homepage — actively diluting rankings**
`https://lipservices.com.au/` and `https://lipservices.com.au/local-internet-presence-services/` serve near-identical content with two different title tags:
- `/` → "LIP Services - Local Internet Presence Services"
- `/local-internet-presence-services/` → "Local Internet Presence Services - Local Internet Presence Services"

This is the single highest-priority fix. Two URLs competing for the same content splits ranking signals and confuses Google about which page to show. Classic WordPress cause: a static front page set under Settings → Reading, with the old page slug left live.
- **Fix:** Decide which URL is canonical (almost certainly `/`), then either 301-redirect `/local-internet-presence-services/` to `/`, or set a `rel=canonical` tag pointing to `/`. If using Yoast/RankMath, this is a five-minute job.

**2. Homepage title tag doesn't target search intent**
Current: *"LIP Services - Local Internet Presence Services"* — this explains the brand name to someone who already knows it. It doesn't match anything a prospect actually types into Google.
- **Fix:** Rewrite to lead with what's being sold + who it's for, brand last. E.g. *"AI Marketing Automation for Small Business | LIP Services"* or, if leaning into a vertical, *"AI Receptionist & Lead Gen for Tradies | LIP Services"*. Keep under ~60 characters.

**3. No meta description detected**
Without one, Google writes its own snippet from page content — usually worse than one you'd write yourself, and it directly affects click-through rate from the results page.
- **Fix:** Write one 150–160 character description per key page, matching the title's intent, ending with a soft CTA.

**4. No sitemap declared in robots.txt**
`robots.txt` blocks the usual WordPress paths but doesn't reference a sitemap. If Search Console isn't separately pointed at one, new pages may be discovered slowly.
- **Fix:** Confirm an XML sitemap exists (Yoast/RankMath auto-generate one, usually at `/sitemap_index.xml`), add `Sitemap: https://lipservices.com.au/sitemap_index.xml` to robots.txt, and confirm it's submitted in Google Search Console.

### 🟡 The bigger structural gap (this month)

**5. Zero dedicated landing pages for services or verticals**
The sitemap shows ~9 real content URLs total. All six services (AI Receptionist, CRM/Automation, Lead Gen, Ad Management, Market Research, White-Label) and all six target verticals (trades, health/wellness, legal/financial, real estate, coaching/consulting, medical/dental) currently live only as sections *within* the single homepage — none has its own indexable URL.

This means there is currently no page that can rank for the actual long-tail phrases prospects search, e.g.:
- "AI receptionist for tradies Australia"
- "lead generation for real estate agents"
- "automated CRM for allied health practice"

Every one of those is a realistic, winnable long-tail search term with a dedicated landing page — and right now none of them exist. This is the single biggest content opportunity on the site.

- **Fix:** Build landing pages at the service × vertical intersection, prioritised by where you already have case studies or client results to point to. Don't try to do all 36 combinations — start with the 4–6 combinations where you have the strongest proof (e.g. trades, since that's your own background and where the video script work already lives).

**6. Blog content is 100% skewed to one vertical**
All existing blog posts (6 of them) are about allied health / patient marketing. The site's stated target verticals include trades/home services, legal/financial, real estate, and coaching/consulting — none of which have a single supporting article. Given the founder story leans into trades background, and video scripts already exist for that audience ("The first tradie to reply wins the job," etc.), this is a content gap with material already half-made.
- **Fix:** Repurpose existing trade-focused video scripts into blog posts. Cheapest content to produce is content you've already written once for another medium.

### 🟢 AEO layer (once the above is solid)

The "get quoted by AI chatbots" tactics from your recent reading are legitimate *if built on a fixed foundation* — doing them before fixing the duplicate homepage and missing landing pages is optimising a house with no rooms.

Once 1–5 above are done:
- Format new landing pages so each section answers one question in its first two sentences (headings as questions: "How much does an AI receptionist cost?" not "Pricing").
- Add Organization + FAQ schema markup site-wide (Divi/Yoast support this natively).
- Build 2–3 comparison pages where they're genuinely honest — "AI Receptionist vs Traditional Answering Service," "LIP Services vs [category] alternatives."
- Monthly: ask ChatGPT, Claude and Perplexity the 5–10 questions a prospect would ask ("best AI automation for tradies in Australia") and log whether LIP Services is named. This is free and takes 15 minutes — it's the only reliable way to know if AEO work is landing.

### Off-site / trust signals

- Confirm the Google Business Profile is complete and matches site NAP (name/address/phone) exactly — worth checking directly since one of the existing blog posts is literally about optimising a client's GBP.
- Build a small number of genuine backlinks via the same channel already being used for content: guest appearances, trade press, local business directories relevant to the trades/allied-health verticals.

---

## Priority order

1. Fix duplicate homepage (redirect or canonical)
2. Rewrite homepage title tag + add meta description
3. Confirm/submit XML sitemap
4. Build 3–4 service × vertical landing pages, starting with trades
5. Repurpose existing trade video scripts into blog posts
6. Add schema markup to new + existing pages
7. Set up the monthly "ask AI the buyer question" tracking log
8. Build 2–3 honest comparison pages

Items 1–3 are each under 30 minutes of work and should happen before anything else — they're actively costing rankings right now, independent of any content strategy.
