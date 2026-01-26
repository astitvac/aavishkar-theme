# Blog Post Quick Start Guide

**Time: 30 minutes per post**

## Prerequisites
- [ ] Featured image ready (1200×675px, <200KB)
- [ ] HTML content written
- [ ] Excerpt written (80-100 words)

## Checklist

### 1. Upload Featured Image
- [ ] WordPress → Media → Add New
- [ ] Upload image
- [ ] Note filename

### 2. Create Post
- [ ] WordPress → Posts → Add New
- [ ] Add title
- [ ] Click "Use Default Editor" first

### 3. Add Content
- [ ] Click "+" → "Custom HTML"
- [ ] Copy from `theme/partials/blog-posts/{post-slug}.html`
- [ ] Paste into Custom HTML block

### 4. Configure Settings (Right Sidebar)
- [ ] Featured Image: Set uploaded image
- [ ] Category: Check "Featured"
- [ ] Excerpt: Add 80-100 word summary
- [ ] Tags: Add relevant tags

### 5. **CRITICAL: Convert to Divi Builder**
- [ ] Click purple **"Use The Divi Builder"** button
- [ ] Select **"Use Existing Content"**
- [ ] Click **"Start Building"**
- [ ] Click **"Save"** or **"Update"** to save post
- [ ] **WHY:** Theme Builder requires Divi format for white background

### 6. Preview & Publish
- [ ] Click "Preview" → Review (should show white background)
- [ ] Click "Publish" → Confirm

### 7. Clear Caches
- [ ] Divi: Theme Options → Builder → Static CSS → Clear
- [ ] WP Rocket: Clear cache + Clear Used CSS
- [ ] Browser: Ctrl+F5

### 8. Verify Homepage
- [ ] Visit https://aavishkar.ai
- [ ] Check "OUR THINKING" section
- [ ] Confirm post displays correctly
- [ ] Check post page has white background

### 9. Git Commit
```bash
git add theme/partials/blog-posts/
git commit -m "Add: [Post Title] blog post"
git push origin main
```

## HTML Template

```html
<div class="aav-abstract-box">
  <h3>Executive Summary</h3>
  <p>Summary paragraph...</p>
</div>

<h2>Introduction</h2>
<p>Intro paragraph...</p>

<div class="aav-divider"></div>

<h2>Main Section</h2>
<p>Content...</p>

<h3>Subsection</h3>
<ul>
  <li>List item 1</li>
  <li>List item 2</li>
</ul>

<blockquote>Key insight or important quote...</blockquote>

<div class="aav-divider"></div>

<h2>Conclusion</h2>
<p>Closing thoughts...</p>

<h2>Next Steps</h2>
<p>Call to action with <a href="/page/">internal links</a>.</p>
```

## Common Issues

**Post has PURPLE background instead of WHITE? (MOST COMMON)**
- **Cause:** Post is still in Default Editor format, not Divi Builder
- **Fix:**
  1. Edit post in WordPress admin
  2. Click purple "Use The Divi Builder" button
  3. Select "Use Existing Content" → "Start Building"
  4. Click "Save/Update"
  5. Clear all caches
- **Why:** Theme Builder requires Divi format for `.aav-article-body` white background
- **Visual Builder won't save?** You must convert in backend admin first, not Visual Builder

**Post not on homepage?**
- Check category is "Featured", "Deep Dive", or "Insights"
- Verify post status is "Published" (not draft)
- Clear all caches

**Formatting looks wrong?**
- Clear Divi static CSS cache
- Clear WP Rocket cache
- Hard refresh browser (Ctrl+F5)
- Check post is in Divi Builder format (not Default Editor)

**Featured image not showing?**
- Check image was uploaded to Media Library first
- Verify featured image is set in post settings
- Confirm image size <200KB

**Preview shows black text?**
- This is correct! Black text on white background is intentional for readability
- Preview is accurate

## File Locations

**HTML Content:**
```
theme/partials/blog-posts/{post-slug}.html
```

**JSON Metadata (optional):**
```
theme/partials/blog-posts/{post-slug}.json
```

**CSS Styles:**
```
theme/style.css (lines 2413-2700)
```

**Full Guide:**
```
PROOFLINE-BLOG-POST-DEPLOYMENT.md
```

## Example: Proofline Post

**Published:** 2026-01-23 (fixed 2026-01-26)
**URL:** https://aavishkar.ai/introducing-proofline/
**Files:**
- `theme/partials/blog-posts/introducing-proofline.html`
- `theme/partials/blog-posts/introducing-proofline.json`
- Featured image: `proofline_whitepaper.png` (uploaded to WP)

**Time taken:** 30 minutes from HTML creation to live publication

**Key Learning:**
- Initially published with Default Editor → Purple background (incorrect)
- Fixed by converting to Divi Builder format → White background (correct)
- Lesson: Always convert to Divi Builder after pasting HTML content
