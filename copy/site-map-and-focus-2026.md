# LIP Services — Site Map, Content Taxonomy & Social Reference
**Prepared:** 2026-08-29
**What this is:** The doc to open when you don't know what to work on next. It's a map (what pages/posts/socials exist and how they connect), a taxonomy (what topics/pillars content gets organised under), and a focus + follow-up list (what's actually next). It doesn't replace the other planning docs — it points to them so you're not hunting across five files to remember where things stand.

**Related docs, and what each one is actually for:**
- `plan-of-attack-2026.md` — phased execution log for the current website/social push. Check/tick things off there.
- `ai-discovery-strategy-2026.md` — the AI-discovery (AEO/GEO) checklist specifically: schema, FAQ content, `llms.txt`, comparison pages, the monthly AI-citation check.
- `pages/seo-meta-schema-index.md` — per-page title/meta/schema/keyword tracking, source of truth for what's actually live.
- `blog-topic-ideas-2026.md` / `LIP-Command-Centre/Video Script/video-topic-queue-2026.md` — the 10-topic content queue (same list, two formats).
- `social-profile-bios.md` — drafted bio text per platform.
- This doc — structure, taxonomy, and "what's next" only. Update it when the site's shape changes (a page goes live, a nav item moves), not for day-to-day task ticking.

---

## 1. Website page hierarchy

```
lipservices.com.au/
│
├─ Home ( / )                                    ✅ live
│   └─ sections: Problem · Services · Our System · Who We Help · Pricing · Get Started
│       (in-page jump box, not real sub-pages)
│
├─ Get Started ( /get-started/ )                 ✅ live — the one real conversion page
│
├─ For Tradies  (nav dropdown, 4 pages)
│   ├─ AI Receptionist for Tradies                ✅ live
│   ├─ Quote Follow-Up Automation for Tradies      ✅ live
│   ├─ Invoice Reminder Automation for Tradies     ✅ live
│   └─ Video Marketing for Tradies                 ✅ live
│
├─ About ( /about/ )                              ✅ live (published 2026-08-29, real "Magpie Rest Dawn" photo)
│   (still not in main nav — add via Appearance → Menus)
│
└─ Blog ( /blog/ )                                ✅ index live
    ├─ What Is AI and What Can It Actually Do...   ✅ live
    ├─ AI Marketing Tools for Service Businesses    ✅ live
    └─ Jim's Franchise Lead System                  ✅ live (published 2026-08-29, real featured image)
```

**Not built yet, deliberately parked:**
- Comparison pages ("LIP Services vs X") — tracked in `ai-discovery-strategy-2026.md`
- The other 32 service × vertical landing page combinations — trades-only until another vertical has sourced pain points/proof (2026-08-17 decision)
- Any non-trades vertical content at all

**How a new page actually gets made** (so this doesn't have to be re-explained each time): Claude Code writes the page HTML in `pages/`, Robert pastes it into a Divi Code module and publishes. Global nav/footer/header bar stay uniform automatically (they live at the theme level, outside the module — see Site Nav Architecture below). After publishing: confirm the real slug (WordPress derives it from the Page Title, which has drifted from the plan twice already — see `seo-meta-schema-index.md`'s slug-mismatch notes), add its row to `seo-meta-schema-index.md`, and add its links to the Internal Linking Map below before considering it done.

### Site nav architecture (settled 2026-08-17)
- **Real global Divi menu** (every page): Home + "For Tradies" dropdown. Manually curated, not a WP Category — Category-based menus are what caused an earlier mess (stale posts silently piling into a "Marketing" menu).
- **Header bar** (Divi Child Theme, sitewide): phone, email, Get Started CTA. Server-rendered via `functions.php`'s `wp_body_open` hook.
- **Homepage jump box**: in-page section links, homepage only. Same jump-box component reused on all 4 trades pages.

---

## 2. Internal linking map

What links to what, and what's still pending. Full detail lives in `pages/seo-meta-schema-index.md` — this is the condensed shape.

| From | To | Status |
|---|---|---|
| Home | Get Started | ✅ live (header bar + hero, sitewide) |
| Home | 4 trades pages | 🟡 "Who We Help" card wired, not confirmed live |
| Each of the 4 trades pages | Get Started + the other 3 trades pages | ✅ live |
| Jim's Franchise post | Video Marketing → AI Receptionist → Quote Follow-Up → Invoice Reminders (phase-matched) | ✅ live (post published 2026-08-29) |
| Jim's Franchise post | Get Started | ✅ live |
| About | Jim's Franchise post | ✅ live |
| Jim's Franchise post | About | 🔴 not started — both pages are live now, this specific backlink still isn't built |
| *(nothing yet)* | Jim's Franchise post | 🔴 not started — still nothing links to it from elsewhere |
| *(nothing yet)* | About | 🔴 not started — still needs adding to main nav + Home |

**Rule going forward:** a new page goes live already linked from somewhere — no orphan pages left for the sitemap alone to surface. Add a row here when a page is planned, before it goes live, same discipline as the focus-keyword check.

---

## 3. Content taxonomy — pillars, topics, subjects

### The 5 content pillars (`LIP-Command-Centre/src/dashboard/content-strategy.ts`)
Used to categorise every piece of content the video/content machine produces — one pillar per piece, never dual-tagged (a real mistake this caught once already on the Jim's Franchise post).

| Pillar | Core emotion | Used for |
|---|---|---|
| 💰 Cash Flow | Relief & Recognition | Invoice/payment pain, missed-call cost |
| Client Attraction | Hope & Aspiration | Quotes going cold, lead generation, video marketing |
| Business Reality | Validation & Humour | Admin overload, "day in the life," relatable grind |
| AI & Automation | Curiosity & Possibility | How the AI systems actually work |
| Behind the Build | Trust & Transparency | Founder story, About page, origin content |

**Outstanding housekeeping:** every piece of content the machine has produced needs its pillar tag double-checked (only the Jim's Franchise post has actually been audited so far) — see Follow-Up List below.

### The 10-topic content queue (trades vertical, pain-first)
Same list lives in two places by design — `blog-topic-ideas-2026.md` (blog-shaped) and `Video Script/video-topic-queue-2026.md` (Brief-shaped for Command Centre). **Sequencing: film first, blog repurposes the footage after** — matches the "cheapest content is content already written once" principle.

**Direction change (2026-08-29/30, Robert):** the 4 live trades landing pages already cover the core pain points this queue targets (missed calls, cold quotes, unpaid invoices, low visibility) — more pain-point content from here hits diminishing returns. New topic ideation should pivot to the **CRM/backend time-saved angle** (what the automation actually gives someone back in their week) instead, which is still untouched ground. This queue's remaining rows aren't cancelled, just no longer the priority for *new* ideas. Also: the AI Voice Agent/Receptionist stays off-limits in any content, any format, until Telnyx's AU number approval actually lands — don't pitch it as live.

| # | Topic (pain-first) | Funnels to | Pillar | Status |
|---|---|---|---|---|
| 2 | Why tradie quotes go cold | Quote Follow-Up page | Client Attraction | ✅ Produced 2026-08-30, in "Ready to post" |
| 6 | Why tradies don't post on social media | Video Marketing page | Client Attraction | ✅ Produced 2026-08-30, in "Ready to post" |
| 7 | Is word of mouth enough anymore | Video Marketing page | Client Attraction | ✅ Produced 2026-08-30, in "Ready to post" |
| 3 | How long to wait before following up a quote | Quote Follow-Up page | Client Attraction | ✅ Produced 2026-08-31, in "Ready to post" |
| 4 | How to chase an unpaid invoice without sounding rude | Invoice Reminders page | Cash Flow | ✅ Produced 2026-08-31, in "Ready to post" |
| 9 | Signs your business is losing money to admin, not tools | Multiple (top-funnel) | Business Reality | ✅ Produced 2026-08-31, in "Ready to post" |
| 1 | Cost of a missed call for a tradie | AI Receptionist page | Cash Flow | ⚠️ Needs a sourced stat |
| 8 | Hours a week tradies lose to admin | AI Receptionist + Invoice Reminders | Business Reality | ⚠️ Needs a sourced stat |
| 5 | Average time tradies wait to get paid in Australia | Invoice Reminders page | Cash Flow | ⚠️ Needs a sourced stat (different from the 92% figure already live) |
| 10 | A day in the life of a busy tradie | About page | Business Reality | ✅ Ready — About published 2026-08-29, hold is cleared |

**Sourcing rule (non-negotiable):** any stat needs a real citable source — paste it into the Brief/Blog generator's "Source to cite" field, or Claude won't invent one. Find the source before sitting down to generate, not mid-flow.

**Suggested pace:** one topic a week is reasonable against everything else in motion — this is a queue, not a deadline.

---

## 4. Social channels

| Platform | URL / handle | Role | Bio status | Content status |
|---|---|---|---|---|
| Facebook | facebook.com/localinternetpresenceservices | Awareness + retarget | ✅ pasted live 2026-08-29 | Not posting yet |
| Instagram | instagram.com/l.i.p.services | Awareness + traffic | ✅ pasted live 2026-08-29 | Not posting yet |
| YouTube | youtube.com/@LipservicesAuSite | Distribution for the video pipeline | ✅ pasted live 2026-08-29 | ✅ Cleanup done 2026-08-29 — channel's ready for new uploads |
| LinkedIn | linkedin.com/company/6419689 | Direct B2B lead gen | ✅ pasted live 2026-08-29 | Not posting yet |
| Threads | threads.com/@l.i.p.services | Mirrors Instagram | ✅ pasted live 2026-08-29 | Not posting yet |
| TikTok | tiktok.com/@l.i.p.services | Awareness + traffic | ✅ pasted live 2026-08-29 | Not posting yet |
| Google Business Profile | (Maps CID `18419614376604528516`) | Local intent, near-ready-to-book | ✅ pasted live 2026-08-29 | 🔴 Profile accurate, but nothing's been posted to it — see `ai-discovery-strategy-2026.md` |

**NAP used everywhere:** LIP Services (Local Internet Presence Services) · 📞 0422 717 798 · lipservices.com.au — bios are live now, worth a spot-check that this matches exactly on every profile (this is also the AEO Trust-layer check in `ai-discovery-strategy-2026.md`, not independently re-verified yet).

**YouTube cleanup — done 2026-08-29:** all old off-brand clips (the ~20 Viddyoze template previews + the old Facebook-ad-methodology video) moved to Draft/unavailable. Channel is clean and ready for new uploads.

**3 videos already cleared to post, sitting ready:** Founder — Systems (Jim's franchise story, recommended first), Founder — The Gap, First To Reply Wins — titles/descriptions drafted from real Whisper transcripts. A 4th, Founder — Tools, is held back because it name-drops the AI receptionist, which isn't live yet.

**3 more talking-head videos produced 2026-08-31:** After hours calls, Just 3 Seconds, One missed call — all in "Ready to post," none posted yet.

**Publishing/scheduling tool decision (2026-08-13):** buy Blotato (~$29/mo, up to 20 accounts, 9 platforms) rather than build native platform integrations — Meta's own API needs developer app review (weeks), not worth building/maintaining solo. Recommendation only, not yet subscribed.

---

## 5. Current focus

The three physical blockers that were here (missing photos, YouTube cleanup, bios not pasted) are all cleared as of 2026-08-29. What's left is smaller, structural finishing work plus the one real bottleneck Robert flagged 2026-08-19 that's still true:

1. **Actually posting** — every profile and page is ready, and all 6 topic-queue videos plus 6 talking-head/founder videos are now produced (12 total sitting in "Ready to post"), but nothing is going out yet. This is the real bottleneck now: eyeballs need posted content, not just configured profiles. See the new Publish Loop Tracker (section 7) for the 6 topic-queue videos specifically.
2. **Small linking gaps on About/Jim's post** — both pages are live, but About isn't in the main nav yet, and nothing links to either page from elsewhere on the site (Home, the trades pages).
3. **The AEO/content-depth work** (`ai-discovery-strategy-2026.md`) — real FAQ content, schema, `llms.txt` — none of it started yet.

Everything else (comparison pages) is real but not urgent compared to these three.

**New for content ideation specifically:** pivot toward the CRM time-saved angle over more pain-point topics — see the note above the topic-queue table.

---

## 6. Follow-up list — ranked

1. **Post the 3 cleared founder videos** to YouTube (Systems → Gap → First To Reply Wins) — channel's clean, bios are live, nothing left blocking this
2. **Run the publish loop on all 6 produced topic-queue videos** (2, 3, 4, 6, 7, 9 — all "Ready to post" as of 2026-08-31) — blog first, then post with the link in comments. See section 7 tracker below.
3. **Add About to the main Divi nav** (Appearance → Menus), and wire the two-way backlink between About and the Jim's Franchise post (see Internal Linking Map)
4. **Spot-check NAP consistency** now that bios are live across all 7 platforms
5. **New topic ideation: CRM time-saved angle** — pivot away from more pain-point topics (see note above the topic-queue table)

---

## 7. Publish loop tracker

Robert's loop (2026-08-31): **reel from a pillar → blog post repurposed from the reel → blog published on the site → reel posted to YT/FB/LinkedIn with the blog link dropped as the first comment.**

**Sequencing matters:** the blog needs to be live *before* the video goes up, so there's an actual URL to paste into the comment — posting the video first just means coming back to it later. Blog first, then post, comment immediately.

Every render's post-render `.docx`/`.txt` package (in its `Ready to post/` folder) now has a blank "Blog post link" field at the top for exactly this — fill it in once the blog's live, then copy straight into the comment.

All 6 rows below are currently at the same stage: reel done, nothing else started.

| # | Topic | Reel | Blog drafted | Blog live (URL) | Posted YT | Posted FB | Posted LinkedIn |
|---|---|---|---|---|---|---|---|
| 2 | Why tradie quotes go cold | ✅ | 🔴 | 🔴 | 🔴 | 🔴 | 🔴 |
| 6 | Why tradies don't post on social media | ✅ | 🔴 | 🔴 | 🔴 | 🔴 | 🔴 |
| 7 | Is word of mouth enough anymore | ✅ | 🔴 | 🔴 | 🔴 | 🔴 | 🔴 |
| 3 | How long to wait before following up a quote | ✅ | 🔴 | 🔴 | 🔴 | 🔴 | 🔴 |
| 4 | How to chase an unpaid invoice without sounding rude | ✅ | 🔴 | 🔴 | 🔴 | 🔴 | 🔴 |
| 9 | Signs your business is losing money to admin, not tools | ✅ | 🔴 | 🔴 | 🔴 | 🔴 | 🔴 |

Update a row's cells as each step actually happens — this table is the "did we actually finish the loop" check, separate from the topic-queue table above (which only tracks whether the reel itself got made).

Talking-head/founder-style videos (the 3 pre-existing ones in section 4, plus 3 new ones produced 2026-08-31: *After hours calls*, *Just 3 Seconds*, *One missed call*) aren't in this tracker — they're not built from a content pillar and don't have a planned blog repurpose, so they follow the simpler "just post it" path in the Follow-Up List instead.

### Recommended posting sequence (2026-08-31)

Founder/talking-head videos need no prep (post immediately). Topic-queue reels each need their blog written and published first — so the two tracks run in parallel, one of each per week, rather than posting all 12 at once. Never two reels funnelling to the same landing page back-to-back (#2/#3 both → Quote Follow-Up, #6/#7 both → Video Marketing) — spaced a week apart so each gets its own blog and its own moment. Founder — Systems goes first: strongest trust story, and credibility content should lead on freshly-live profiles before any pitch-shaped content.

| Week | Credibility (post now, no prep) | Topic-queue (write + publish blog first, then post) |
|---|---|---|
| 1 | Founder — Systems | #9 — Signs you're losing money to admin |
| 2 | Founder — The Gap | #2 — Why tradie quotes go cold |
| 3 | First To Reply Wins | #6 — Why tradies don't post on social media |
| 4 | After hours calls | #3 — How long to wait before following up a quote |
| 5 | One missed call | #7 — Is word of mouth enough anymore |
| 6 | Just 3 Seconds | #4 — Chasing an unpaid invoice without sounding rude |
7. **Work the AEO checklist** in `ai-discovery-strategy-2026.md` — starting with real FAQ content per landing page
8. **Pillar audit** — check every existing piece of content's Command Centre pillar tag is single, correct, and matches its actual content (only the Jim's Franchise post has been checked so far)
9. **Decide on Blotato** — subscribe or keep manual-posting for now
10. **Comparison pages** ("LIP Services vs X") — once the above has breathing room

---

*Update this doc when the site's actual shape changes (a page or post goes live, nav changes, a new platform gets added) — it's a structural map, not a task tracker. Task-level detail stays in `plan-of-attack-2026.md` and `ai-discovery-strategy-2026.md`.*
