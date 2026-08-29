# LIP Services — AI Discovery Strategy (getting found and recommended by AI, not just Google)
**Site:** lipservices.com.au (WordPress/Divi)
**Prepared:** 2026-08-29
**Basis:** Live re-audit of the site 2026-08-28, plus everything still-open from the original `seo-aeo-strategy-2026.md` audit (2026-08-05) — see that file's archived copy at `archive/seo-aeo-strategy-2026-superseded.md` for the full original text and what's already been shipped from it.
**Scope, per Robert's explicit ask (2026-08-28):** a plain-English doc + checklist. **Update 2026-08-29:** Robert asked to line up Command Centre's content generation with this checklist — done for the blog generator (see "What's built" below). Publishing/schema/posting itself is still manual — nothing auto-pastes to WordPress or auto-injects schema.

---

## Why this exists (the plain-English version)

Old world: someone types a question into Google, sees ten blue links, clicks one.

New world, already happening: someone asks ChatGPT, Claude, Perplexity or Gemini "who should I call to stop missing tradie jobs" — and the AI just answers. Sometimes it even books the call for them. The website is never clicked.

If the site isn't written and structured so an AI can reliably read it and lift correct facts out of it, LIP Services is invisible in that channel — not ranked low, not found at all. This doc is what has to be true about the site (and the profile/review presence around it) for an AI to:

1. **Find it** (Access)
2. **Get the facts right** (Extraction)
3. **Trust it enough to actually recommend it** (Trust)

## The three-layer model

Explain-it-to-a-12-year-old version:

1. **Access** — can the robot even get in the front door? Is the site blocked, or crawlable?
2. **Extraction** — once it's inside, can it find clearly labelled rooms, or is everything piled in a messy garage? This is schema markup, real FAQ sections, plain answer-first writing.
3. **Trust** — even holding the right facts, does the AI actually believe this is a real, reputable business worth recommending over a competitor? This is consistent name/address/phone everywhere, real reviews, real backlinks.

**Access is already fine** (confirmed in the 2026-08-28 audit — crawlable, `robots.txt` has no GPTBot/ClaudeBot/etc. disallow). Extraction and Trust are where the real gaps are, and that's what the rest of this doc is about.

A separate, non-obvious point worth keeping in mind: a private "business brain" (a NotebookLM, a Claude project, an internal Vertex AI setup) keeps *Robert's own* facts straight and saves time drafting — but it does **not** get a stranger's AI to cite LIP Services. Only what's actually published — the site content, the Google Business Profile, and consistent reviews/directories — feeds what a stranger's AI can find and quote. Don't confuse the two.

---

## Where things stand today

✅ **Done:**
- Site crawlable, no bot blocks
- Duplicate homepage, title tags, meta descriptions fixed (Aug 2026)
- 4 trades landing pages live with real, source-backed content — not thin/generic filler
- Google Business Profile socials (`sameAs`) synced across 7 platforms, real CID (2026-08-19)
- All 7 social bios pasted live, YouTube channel cleaned up (2026-08-29)
- Command Centre's blog generator now outputs real FAQ content (answer-first Q&A) + a related-service tag on every new post (2026-08-29) — new posts arrive AEO-ready instead of needing retrofitting; existing live pages (homepage, 4 trades pages) still need their FAQ sections written by hand, the generator only covers new blog content

❌ **Still open — Extraction layer:**
- No `Service` schema for any of the 6 real services — only the sitewide default `Organization`/`WebSite`/`Place` block RankMath auto-injects
- No `FAQPage` schema anywhere, and (per the original audit's own rule — schema needs matching *visible* content) no real visible FAQ sections on any page yet either — this is really two gaps, not one
- No `llms.txt` — an emerging plain-text convention some AI crawlers check for a direct, structured company summary
- "Book a Call" is a human-mediated form only — no way for an AI agent booking on a customer's behalf to actually complete anything on the site

⏸ **Still open — Trust layer / carried over from the Aug 5 plan, never chased:**
- Comparison pages ("LIP Services vs X") — parked since 2026-08-16
- Monthly "ask the AI the buyer question, log if we're named" check — designed 2026-08-16, never actually run once
- Genuine backlinks (guest appearances, trade press, directories) — parked since 2026-08-16
- Answer-first writing (headings phrased as the actual question, answered plainly in the first two sentences) — recommended in the Aug 5 audit, not applied to any live page yet
- Google Business Profile posting cadence — the profile itself is accurate (NAP, socials, CID all confirmed), but nothing regular is being posted to it. Flagged 2026-08-29 (Robert): GBP is also a trust/AEO resource, not just a directory listing — worth keeping active, not just correct.

---

## The checklist

### A. Website content (the deep work)

1. **Real FAQ content first** — 3–6 genuine questions and plain answers per landing page (and the homepage). This has to land *before* FAQ schema goes on top of it — same "don't add schema with nothing visible behind it" rule as the original audit, just applied past the homepage.
2. **Per-service schema** — one `Service` schema block per real service (AI Receptionist, CRM/Automation, Lead Gen, Ad Management, Market Research, White-Label), on whichever page actually describes it. This is what lets an AI lift "LIP Services offers X, for Y" as a clean fact instead of having to parse prose to guess it.
3. **FAQ schema** — once #1 is live, wrap it in `FAQPage` schema (Divi/RankMath support this natively).
4. **Answer-first writing** — headings phrased as the real question a buyer would type or ask an AI ("How much does an AI receptionist cost?"), with the first two sentences underneath answering it directly in plain, quotable language. Different from SEO-style headings, which are keyword phrases, not questions.
5. **`llms.txt`** — a short plain-text file at the site root: what LIP Services does, who it's for, links to the key pages. Low effort, an emerging standard, worth doing once #1–3 give it something real to point to.
6. **Comparison pages** — "AI Receptionist vs Traditional Answering Service," "LIP Services vs [category] alternatives." Exactly the kind of page an AI reaches for when someone asks it to compare options. On the books since Aug 16, never built.
7. **Agent-actionable booking — flag only, not a build.** If Get Started stays a human-fill-in form, an AI agent booking on a customer's behalf can't complete the loop. Revisit once agent-to-website booking conventions are more settled — not worth building against a moving target yet.

### B. Keep-in-sync layer (shorter, ongoing — this is the Trust layer)

1. **NAP consistency** — name/address/phone must match exactly across the site, Google Business Profile, and every directory/social in `sameAs`. Synced once already (2026-08-19); the address is currently flagged pending in `pages/seo-meta-schema-index.md` — recheck once that settles.
2. **Real reviews** — genuine, recent Google Business Profile reviews carry real trust weight with both human searchers and AI systems that cross-reference review signals.
3. **A small number of genuine backlinks** — guest appearances, trade press, local directories. Parked since Aug 16, still valuable, still not chased.
4. **Monthly AI-citation check (15 min, free)** — ask ChatGPT, Claude, and Perplexity the actual questions a prospect would ask ("best AI receptionist for tradies in Australia," etc.) and log whether LIP Services gets named. This is the only real feedback loop for whether any of the above is working — everything else in this doc is a bet until this confirms it's landing. Log results in the tracking table below.
5. **Keep the Google Business Profile actually active, not just accurate** — a complete-but-static profile isn't enough. Google (and AI systems that pull from Google's local data) weight *freshness* as its own trust signal: a GBP Post every couple of weeks (an offer, a recent job, a tip), Q&A answered, photos added periodically. This is a genuinely separate task from the NAP-accuracy check above — accuracy means the facts are right, activity means the profile still looks alive. Easy to let slide since nothing breaks visibly if it goes stale.

---

## Monthly AI-citation log

*(First run not done yet — add a row each month.)*

| Date | Questions asked | Named by ChatGPT? | Named by Claude? | Named by Perplexity? | Notes |
|---|---|---|---|---|---|
| — | — | — | — | — | — |

---

## What's built in Command Centre (updated 2026-08-29)

- **Blog generator outputs AEO content** — `generateBlogPost` (`LIP-Command-Centre/src/dashboard/api.ts`) now returns real FAQ Q&A pairs (answer-first, grounded only in given facts — same anti-hallucination rule as the rest of the post) and a related-service tag, shown in Research → Blog tab. Covers new content going forward; existing live pages still need FAQ written by hand.
- **This checklist is now tracked on Command Centre's Home screen** too — see `AI-Personal Assistant/context/aeo-checklist.md`, rendered as an "AEO Checklist" card. Update that file's status column as items ship; this doc stays the detailed "why," that file stays the short tracked list.

## What NOT to build yet (Robert's call, 2026-08-28)

- No automation of publishing/schema/posting itself — nothing auto-pastes to WordPress, auto-injects schema, or auto-posts to Google Business Profile. Content *generation* can be AEO-aware (see above); the actual publish step stays manual/operator-run.
- No agent-booking integration — not enough of a settled standard yet (see A7)

---

## Priority order

1. Real FAQ content — 3–6 Qs per landing page + homepage (new blog posts now generate this automatically; the 5 existing live pages still need it written by hand)
2. Per-service `Service` schema
3. `FAQPage` schema (once #1 is live)
4. `llms.txt`
5. Run the monthly AI-citation check once, to get a real baseline
6. Start a Google Business Profile posting cadence (roughly fortnightly)
7. Comparison pages
8. Backlink push

---

*Housekeeping: this doc folds forward everything still-open from the original 2026-08-05 audit (`archive/seo-aeo-strategy-2026-superseded.md`) plus the 2026-08-28 AI-agent-discovery framework. `copy/plan-of-attack-2026.md` step 6 and its Parking Lot both point here now for the AEO/AI-discovery items — don't re-track the same open item in both places.*
