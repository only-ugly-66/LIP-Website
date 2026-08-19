# Blog Post Template — LIP Services

**What this is:** the repeatable pattern for every new WordPress blog post from here on. Blog posts stay on their own track from the Claude-Code-built landing pages in `pages/` — they're written/edited straight in the WordPress block editor (Posts, not Pages), not built as Divi Code module HTML. See `copy/plan-of-attack-2026.md` Phase 1 step 5.

Copy this file's structure into a new `copy/blog-<slug>.md` draft per post. Fill in every front-matter field before it's considered ready to paste into WordPress.

---

## Front matter (fill in per post)

```
Status: Draft | Ready for WordPress | Published
Title: <the actual H1 / post title>
Slug: /blog/<slug>
Meta description: <150-160 chars, includes focus keyword>
Focus keyword: <one, unique — check it's not already used by another page,
                 see pages/seo-meta-schema-index.md>
Featured image: <see Featured Image section below>
Categories: <1, matches the content pillar — Cash Flow / Client Attraction /
             Business Reality / AI & Automation / Behind the Build>
Pillar: <same as above, in Command Centre's Research.tsx language>
Source: <what this was repurposed from — video script, client story, etc.
         Cheapest content is already-written content, see plan-of-attack-2026.md>
Links out: <bullet list — every internal link this post makes, see Internal
            Linking below>
Links in (to add once published): <which existing pages should get a link
            added pointing at this new post — a new post is not done until
            something already-live points at it>
```

---

## Featured Image

WordPress's **Featured Image** field (right sidebar of the post editor) — not an inline `<img>` in the content. It's what drives the blog archive/grid thumbnail, the social share card (og:image), and RankMath's SEO image check.

- **Size:** 1200×630px minimum (standard OG/social card ratio — Facebook, LinkedIn, X all read this). Divi's blog module will crop smaller for the grid view regardless, so compose the subject centred, not tight to the edges.
- **Format:** JPG for photos, PNG only if it needs transparency. Compress before upload (TinyPNG or similar) — an unoptimised featured image is one of the easiest page-speed hits to avoid.
- **Filename:** descriptive, hyphenated, includes the focus keyword if it fits naturally — `ai-receptionist-tradies-blog.jpg`, not `IMG_4821.jpg`. Filename is a minor RankMath signal.
- **Alt text:** set on upload (Media Library → the image → Alt Text field). Should describe the image and include the focus keyword if it fits without forcing it.
- **Source:** Robert uploads manually per post (own photos, client work stills, or a licensed/stock shot) — this stays outside the automated content pipeline deliberately, same as the rest of the "generate copy, add images by hand" split in `plan-of-attack-2026.md`.

---

## Jump Box (Table of Contents)

Reuse `wordpress/jump-links-toc-template.html` exactly — same component already live on all 4 trades landing pages, don't build a new one per post.

**How to place it in a blog post:**
1. In the WordPress block editor, add a **Custom HTML** block directly after the title, before the first paragraph.
2. Paste the full contents of `jump-links-toc-template.html` (style block + nav + section wrappers) into it, OR if the rest of the post is written in normal WP blocks (not one HTML block), paste just the `<style>` + `<nav class="toc">` portion into the HTML block, then wrap each subsequent H2 section's content in `<section id="...">...</section>` via HTML blocks at each section boundary.
3. Match TOC link text to the H2 heading word-for-word.
4. **3–6 sections is the sweet spot** (per the template's own notes and confirmed again in `plan-of-attack-2026.md`) — fewer rarely earns Google's "jump to" sub-links, more gets truncated in the search result.
5. Section `id`s must be unique on the page and kebab-case (`#phase-1-be-found`, not `#Phase 1`).

---

## Internal Linking Strategy

Same principle as the landing pages (`pages/seo-meta-schema-index.md` → Internal linking map): **no orphan pages.** A post isn't done at "published" — it's done once something already-live links to it and it links back out.

**Every blog post should link:**
1. **Back to Home** (or let the global Divi nav/logo handle this automatically — it does, same as the trades pages).
2. **Forward to the most relevant service/landing page(s)** — whichever of the trades pages (or future vertical pages) the post's subject matter actually supports. Anchor text should read naturally, not keyword-stuffed — e.g. "an AI receptionist answering every call" linking to `/ai-receptionist-for-tradies/`, not a bare "click here."
3. **Forward to Get Started** — at least once, usually in the closing section, with a `?src=blog-<slug>` UTM-style tag on the URL (same source-tagging convention the trades pages use, so this post's conversions are traceable in the CRM separately from other traffic).
4. **To other blog posts**, once more than one exists — a "Related reading" block at the end, same shape as the trades pages' "More Ways We Help Tradies" cross-link block.

**And update the linking map:** add a row to `pages/seo-meta-schema-index.md`'s Internal linking map table for the new post (both directions — what it links to, and what should link to it), same discipline as a new landing page.

**Lesson carried over from the trades-page slug mismatch (2026-08-17):** don't hardcode a link to a page using its *planned* slug before that page is confirmed live — WordPress derives slugs from whatever title gets published, which can differ from the draft. Confirm the real published URL before wiring cross-links, or add them as a follow-up pass right after publishing.

---

## RankMath / SEO checklist (same rule as landing pages)

- Focus keyword in: title, URL/slug, meta description, first paragraph, one subheading, one image alt tag (the featured image, plus any in-content images).
- One focus keyword per post, not reused elsewhere on the site — check `pages/seo-meta-schema-index.md` first.
- Target ~70-85% RankMath score, not 100% — don't pad word count or force keyword density past a natural fit purely to chase the last checklist items (same reasoning as the landing pages: it fights the goal of a piece someone actually wants to read).

---

## Publish checklist

- [ ] Front matter complete (all fields above)
- [ ] Featured image uploaded, sized ≥1200×630, alt text set
- [ ] Jump box HTML pasted in, 3–6 sections, ids match TOC links exactly
- [ ] Links out: Home (automatic via nav), 1+ relevant service page, Get Started with `?src=` tag
- [ ] Row added to `pages/seo-meta-schema-index.md` (per-page table + internal linking map)
- [ ] Published, then: add "Links in" — go to the page(s) identified in front matter and add a link pointing at this new post
