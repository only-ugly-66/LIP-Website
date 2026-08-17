# SEO Quick Wins Playbook
**Purpose:** A ~20-minute audit you can run live on any prospect's website — during a call or before one — to surface 3–5 concrete, specific findings. Specific beats generic: "your homepage title doesn't mention what you do" lands harder than "you should improve your SEO."

---

## The 20-minute audit

Run these checks in order. Stop once you have 3–5 solid findings — you don't need every category to make the case.

### 1. Duplicate/competing pages (5 min)
- Load the homepage. Then try common variant URLs (a slug matching the business name, `/home/`, `/welcome/`) and see if any serve the same content under a different URL.
- **Why it matters:** two URLs with the same content split ranking signal and confuse search engines about which to show. Very common on WordPress sites with a static front page misconfigured.
- **What a finding looks like:** "You've got two URLs both trying to be your homepage — that's splitting your ranking power in half."

### 2. Title tag and meta description (3 min)
- View page source (or use browser dev tools) on the homepage and top 2–3 service pages. Find `<title>` and `<meta name="description">`.
- **Check:** Does the title describe what the business *sells* and *who for*, or just the brand name? Would a prospect's Google search actually contain these words?
- **What a finding looks like:** "Your homepage title just says your business name — nobody searches for a business they've never heard of. It should say what you do and for who."

### 3. Do landing pages exist for what they sell? (5 min)
- Check the sitemap (`/sitemap.xml` or `/sitemap_index.xml`) or crawl the nav. Count how many of their stated services/offerings have their own dedicated URL, versus living only as a homepage section.
- **Why it matters:** a service with no dedicated page can never rank for the specific phrase someone searches for that service. Everything funnels through one page competing for one broad term instead of many pages each winnable for a specific term.
- **What a finding looks like:** "You offer six services but only have one page. Each of those could be its own page ranking for its own searches — right now they're all fighting for the same one."

### 4. Robots.txt and sitemap (2 min)
- Check `/robots.txt`. Is a `Sitemap:` line present? Does it block anything it shouldn't (check for accidental `Disallow: /` left over from a staging site)?
- **What a finding looks like:** "Your site doesn't tell Google where your sitemap is — that slows down how fast new pages get found."

### 5. Content-to-offer match (3 min)
- If there's a blog, skim the last 5–10 posts. Do they match what the business actually sells and who it serves, or are they generic/off-topic?
- **What a finding looks like:** "You serve four industries but every blog post is about just one of them — the other three have nothing to point a prospect toward."

### 6. Google Business Profile (if local business) (2 min)
- Search the business name + suburb. Is the GBP claimed, complete, with matching name/address/phone to the website? Recent reviews?
- **What a finding looks like:** "Your Google listing shows an old phone number — that's a mismatch that hurts local trust signals."

### 7. The AEO check (2 min)
- Ask ChatGPT or Perplexity the question their ideal customer would ask (e.g. "best [service] in [suburb/industry]"). Is the business named? Are competitors?
- **What a finding looks like:** "I asked ChatGPT who the best [X] in [area] was — it named two of your competitors and not you."

---

## Turning findings into the conversation

1. **Lead with the most concrete, most surprising finding**, not the most technical one. "Two of your pages are fighting each other" lands better than "your canonical tags are misconfigured."
2. **Show, don't just tell** — pull up the actual title tag, the actual duplicate URLs, the actual ChatGPT answer, on screen if possible.
3. **Frame as quick wins vs. structural work** — some of these (title tag, meta description, robots.txt) are genuinely fixable in under an hour. Say so. It builds trust and isn't the thing you're charging for anyway — the landing page build-out and content strategy is.
4. **Don't audit everything for free.** This 20-minute pass is enough to prove competence and find real problems. The full build (landing pages, content calendar, schema, ongoing AEO tracking) is the paid engagement.

---

## Reusable finding templates

Swap in specifics from the audit:

- "You've got [N] pages competing for the same content — that's diluting your ranking instead of stacking it."
- "Your homepage title tag says [X] — nobody searches for that. It should say [what they sell] for [who]."
- "You offer [N] services but only [M] have their own page. Each one is a missed chance to rank for its own search."
- "I asked [ChatGPT/Perplexity] '[buyer question]' — you weren't mentioned, but [competitor] was."
- "Your Google Business Profile [issue] — that's the first thing most local searchers see."

---

*Companion doc: `seo-aeo-strategy-2026.md` in this folder is the fully worked example — the LIP Services site audited against this exact playbook.*
