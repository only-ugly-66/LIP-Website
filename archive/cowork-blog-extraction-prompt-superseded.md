**⚠️ SUPERSEDED 2026-08-20:** this second-pass Cowork extraction step is no longer needed. `generateBlogPost` in `LIP-Command-Centre/src/dashboard/api.ts` now returns focus keyword, image prompt, filename, and alt text in the same call that writes the post — Research → Blog tab shows all of it under "Publishing Metadata" with copy buttons. Kept here for reference only, don't use as the live workflow.

---

# Cowork prompt — Blog Post Meta Extraction (single pass)

**What this is:** a copy-paste prompt for Claude Cowork (no Claude Code / VS Code needed) that extracts meta description, focus keyword, and an image generation prompt from a finished blog post draft in one pass. Matches the conventions in `wordpress/blog-post-template.md` and `pages/seo-meta-schema-index.md` — built 2026-08-20 so the output needs no reformatting before it goes into RankMath / an image generator.

**How to use:** copy everything below the line into Cowork, paste your finished blog post body where marked, and (optional but recommended) paste the current focus-keyword list from `pages/seo-meta-schema-index.md` so Cowork can check for overlap — it won't have live access to that file unless you give it the text.

---

You are extracting publishing metadata from a finished blog post for lipservices.com.au (WordPress, RankMath SEO). Do not rewrite or improve the post — only extract and generate the three items below, based strictly on what's actually in the post.

**1. Focus keyword**
- One phrase only, the strongest search-intent match for this post's actual content.
- Must not duplicate a keyword already in use elsewhere on the site (I'll paste the current list below if I have it — check against it; if I haven't pasted one, just flag "not checked against existing site keywords, verify before publishing").
- Should already appear naturally in the post's title and first paragraph — if it doesn't, tell me instead of forcing one that doesn't fit.

**2. Meta description**
- 150–160 characters exactly (count them).
- Includes the focus keyword.
- Matches the post's actual intent — no clickbait, no promise the post doesn't deliver on.
- Ends with a short, soft call to action.

**3. Featured image prompt**
- A single prompt suitable for an AI image generator, composed for a 1200×630px (or wider, same ratio) landscape featured image.
- Subject centred, not tight to the edges — Divi's blog grid crops smaller for the thumbnail view.
- Photographic/realistic style matching a small Australian trade-services brand — no illustration, no stock-photo cliché "handshake" or "businessman at laptop" imagery. Ground it in what the post is actually about.
- Also give me: a suggested filename (hyphenated, includes the focus keyword, e.g. `ai-receptionist-tradies-blog.jpg`) and suggested alt text (describes the image, includes the focus keyword if it fits naturally without forcing it).

Return the three items as plain labelled text, not JSON — I'm pasting straight into WordPress fields, not parsing it.

---

**Existing focus keywords already in use (check against these):**
[paste the Focus Keyword column from pages/seo-meta-schema-index.md here, or leave blank if not checking]

**Blog post to extract from:**
[paste finished post title + body here]
