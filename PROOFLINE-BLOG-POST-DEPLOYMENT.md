# Proofline Blog Post Deployment Guide

## ✅ Completed

### Files Created
1. **HTML Content**: `theme/partials/blog-posts/introducing-proofline.html`
   - Complete article with Executive Summary, 9 major sections, proper formatting
   - Uses glassmorphism abstract box, section dividers, blockquotes, lists
   - ~2,800 words, ~12-15 minute read
   - Internal links to Proofline page and contact

2. **JSON Metadata**: `theme/partials/blog-posts/introducing-proofline.json`
   - Title, slug, excerpt, category (Featured), tags
   - Ready for automated deployment system

## 🎯 Deployment Options

### OPTION A: Manual WordPress Publishing (RECOMMENDED FOR FIRST POST)

**Time: ~30 minutes**

#### Step 1: Create Featured Image (Required)
You have 3 options:

**OPTION 1 - Use Proofline DAG Visual (RECOMMENDED)**
1. Open `/proofline/` page in browser
2. Screenshot the DAG visual (the branching diagram)
3. Open in image editor (Photoshop/Figma/Canva)
4. Add title overlay: "Introducing Proofline: Dynamic State Engine"
5. Resize to **1200×675px** (16:9 ratio)
6. Export as JPG, optimize to <200KB (use TinyPNG)
7. Save as: `proofline-whitepaper-hero.jpg`

**OPTION 2 - Use Proofline Logo**
- Located at: `assets/logos/Proofline_Logo_web_large.png`
- Create graphic with purple gradient background
- Center logo with subtitle "Version Control for Ideas"
- Resize to 1200×675px

**OPTION 3 - Create Abstract Visual**
- Purple metallic gradient background
- Title: "Introducing Proofline"
- Subtitle: "The Dynamic State Engine"
- Abstract connection lines inspired by DAG

#### Step 2: Upload Featured Image
1. WordPress → Media → Add New
2. Upload `proofline-whitepaper-hero.jpg`
3. Add alt text: "Proofline Dynamic State Engine for Knowledge Work"
4. Note the upload path (should be: `/wp-content/uploads/2026/01/proofline-whitepaper-hero.jpg`)

#### Step 3: Create WordPress Post
1. **WordPress → Posts → Add New**
2. **Title**: "Introducing Proofline: The Dynamic State Engine for Knowledge Work"
3. **Permalink**: Click "Edit" → Change to `/introducing-proofline/`
4. **Content**:
   - Click "+" → Add "Custom HTML" block
   - Open: `theme/partials/blog-posts/introducing-proofline.html`
   - Copy entire contents
   - Paste into Custom HTML block

#### Step 4: Configure Post Settings (Right Sidebar)

**Featured Image:**
- Click "Set featured image"
- Select the image you uploaded in Step 2
- Confirm it displays correctly

**Categories:**
- ✅ Check "Featured" (REQUIRED for homepage purple badge)
- Optional: Also check "Deep Dive" if you want dual categorization

**Excerpt:**
```
The Knowledge IDE unified the workspace—but how do AI agents stay coordinated? Proofline™ serves as the 'brain' of the system, a Dynamic State Engine that captures every hypothesis, decision, and insight. Like Git for code, Proofline brings version control to ideas, transforming fragmented tools into an orchestrated intelligence platform. This is the technical deep-dive into the engine powering the future of knowledge work.
```

**Tags:**
- Proofline
- Knowledge IDE
- Dynamic State Engine
- AI Agents
- Version Control
- Productivity

**SEO (if Yoast installed):**
- Focus keyphrase: "Proofline Dynamic State Engine"
- Meta description: Use excerpt above

#### Step 5: Preview & Test
1. Click "Preview" button
2. **Check formatting:**
   - ✅ Executive summary glassmorphism box displays
   - ✅ Section dividers render correctly
   - ✅ Lists formatted properly
   - ✅ Blockquotes styled with purple accent
   - ✅ Links working (Proofline page, contact)
   - ✅ Mobile responsive

3. **Test reading flow:**
   - Read through for typos
   - Verify logical progression
   - Check CTAs are clear

#### Step 6: Publish
1. Click "Publish" button
2. Confirm publication
3. Note post URL

#### Step 7: Clear Caches (CRITICAL)
```bash
# In WordPress admin:
1. Divi → Theme Options → Builder → Advanced → Static CSS → Clear
2. WP Rocket → Dashboard → Clear cache + Clear Used CSS
3. Browser: Ctrl+F5 (hard refresh)
```

#### Step 8: Verify Homepage Display
1. Go to: https://aavishkar.ai
2. Scroll to "OUR THINKING" section
3. **Verify:**
   - ✅ New post appears in card grid
   - ✅ Featured image loads
   - ✅ Title displays (2-line clamp)
   - ✅ Excerpt truncates (4-line clamp)
   - ✅ Purple "Featured" badge shows
   - ✅ "Read Insight →" link works
   - ✅ Date shows "January 2026"
   - ✅ Reading time shows "12 min read" (auto-calculated)

---

### OPTION B: Automated Git-Based Deployment

**Setup Time: 30 minutes (one-time)**
**Future Posts: 5 minutes per post**

This option creates a Git-to-WordPress pipeline where pushing to main automatically creates/updates posts.

#### Prerequisites
- Files already created: ✅ HTML + JSON in `theme/partials/blog-posts/`
- Featured image uploaded to WordPress Media Library
- WP Pusher configured and working

#### Step 1: Add Auto-Importer Function (One-Time Setup)

Add this to `theme/functions.php` (after line 241):

```php
/**
 * Auto-import blog posts from theme/partials/blog-posts/
 * Triggered on WP Pusher sync
 */
function aav_auto_import_posts() {
    $posts_dir = get_stylesheet_directory() . '/partials/blog-posts/';

    if (!is_dir($posts_dir)) return;

    $json_files = glob($posts_dir . '*.json');

    foreach ($json_files as $json_file) {
        $meta = json_decode(file_get_contents($json_file), true);
        $html_file = str_replace('.json', '.html', $json_file);

        if (!file_exists($html_file)) continue;

        // Check if post already exists
        $existing_post = get_page_by_path($meta['slug'], OBJECT, 'post');

        if ($existing_post) {
            // Update existing post
            wp_update_post([
                'ID' => $existing_post->ID,
                'post_content' => file_get_contents($html_file),
                'post_excerpt' => $meta['excerpt'],
                'post_status' => $meta['status']
            ]);
        } else {
            // Create new post
            $post_id = wp_insert_post([
                'post_title' => $meta['title'],
                'post_name' => $meta['slug'],
                'post_content' => file_get_contents($html_file),
                'post_excerpt' => $meta['excerpt'],
                'post_status' => $meta['status'],
                'post_type' => 'post'
            ]);

            // Set category
            $category = get_category_by_slug(strtolower($meta['category']));
            if ($category) {
                wp_set_post_categories($post_id, [$category->term_id]);
            }

            // Set tags
            wp_set_post_tags($post_id, $meta['tags']);

            // Set featured image (must exist in media library)
            $image_id = attachment_url_to_postid('/wp-content/uploads/2026/01/' . $meta['featured_image']);
            if ($image_id) {
                set_post_thumbnail($post_id, $image_id);
            }
        }
    }
}
add_action('wppusher_post_push', 'aav_auto_import_posts');
```

#### Step 2: Upload Featured Image First
1. Create featured image (same as Option A, Step 1)
2. Upload to WordPress Media Library
3. Ensure filename matches JSON: `proofline-whitepaper-hero.jpg`

#### Step 3: Deploy via Git
```bash
# From theme directory
git add theme/partials/blog-posts/introducing-proofline.*
git add theme/functions.php  # If adding importer
git commit -m "Add: Introducing Proofline whitepaper blog post

- HTML content with full article structure
- JSON metadata for automated import
- Category: Featured (homepage auto-display)
- Reading time: ~12-15 minutes"
git push origin main
```

#### Step 4: Wait for WP Pusher
- WP Pusher detects push (usually <1 minute)
- Syncs files to WordPress
- Triggers `aav_auto_import_posts()` function
- Post created automatically

#### Step 5: Verify Publication
1. WordPress → Posts → Check for "Introducing Proofline"
2. Verify status: Published, category: Featured, featured image set
3. Clear caches (Divi + WP Rocket + Browser)
4. Check homepage display

---

## 📝 Quick Reference

### Key Files
- **HTML**: `theme/partials/blog-posts/introducing-proofline.html`
- **Metadata**: `theme/partials/blog-posts/introducing-proofline.json`
- **Featured Image**: Create 1200×675px, <200KB
- **Proofline Logo**: `assets/logos/Proofline_Logo_web_large.png`
- **DAG Visual**: `theme/partials/proofline-hero-visual.html`

### Homepage Auto-Display Checklist
For automatic appearance on homepage "OUR THINKING" section:
- ✅ Post status: Published
- ✅ Featured image: Set (1200×675px, 16:9)
- ✅ Category: Featured (or Deep Dive or Insights)
- ✅ Excerpt: Written (80-100 words)

### Internal Links in Post
- Proofline page: `/proofline/`
- Contact/Demo: `/contact/`
- Previous whitepaper: Link if exists

### Rollback Plan
If issues arise:
1. **Quick rollback**: Change post status to "Draft"
2. **Homepage not updating**: Clear all caches, wait 5 minutes
3. **Formatting broken**: Edit HTML in WordPress, fix, re-publish

---

## 🎨 Featured Image Creation Guide

### Recommended: Option 1 (DAG Visual)

**Tools Needed:**
- Browser (to screenshot Proofline page)
- Image editor (Figma/Photoshop/Canva)
- TinyPNG.com (for optimization)

**Steps:**
1. Open https://aavishkar.ai/proofline/ (or local dev)
2. Scroll to DAG visual
3. Screenshot the branching diagram (IDEA → EVIDENCE → HYPOTHESIS → INSIGHT)
4. Import to Figma/Photoshop
5. Create 1200×675px canvas with purple gradient background:
   ```
   Gradient: linear-gradient(135deg, #6f2dbd 0%, #9e23a3 50%, #0b447b 100%)
   ```
6. Place DAG visual in center
7. Add title overlay (top or bottom):
   - "Introducing Proofline"
   - Subtitle: "Dynamic State Engine for Knowledge Work"
   - Font: dinmedium or bold sans-serif
   - Color: White with text shadow for readability
8. Export as JPG, quality 85%
9. Optimize at TinyPNG.com to get <200KB
10. Save as: `proofline-whitepaper-hero.jpg`

**Color Palette:**
- Primary Purple: `#9e23a3`
- Deep Purple: `#6f2dbd`
- Pink Highlight: `#c87fd0`
- Blue Accent: `#0b447b`

---

## ✅ Success Criteria

### Post Publication
- [ ] HTML validates and renders correctly
- [ ] Featured image displays properly
- [ ] All links work (internal and external)
- [ ] Mobile responsive formatting
- [ ] Reading time ~12-15 minutes

### Homepage Integration
- [ ] Post appears in "OUR THINKING" section
- [ ] Purple "Featured" badge displays
- [ ] Image loads quickly (<200KB)
- [ ] Title and excerpt properly truncated
- [ ] "Read Insight →" link works
- [ ] Position: Top 6 most recent posts

### SEO & Discoverability
- [ ] Permalink: `/introducing-proofline/`
- [ ] Meta description set
- [ ] Featured image has alt text
- [ ] Internal links to related content
- [ ] Tags assigned

### User Experience
- [ ] Clear progression: Problem → Context → Solution → Engine → Action
- [ ] Blockquotes highlight key insights
- [ ] Lists make complex info scannable
- [ ] Section dividers create visual breathing room
- [ ] Strong CTA directing to Proofline page

---

## 🚀 Next Steps After Publishing

### Immediate (Day 1)
1. Announce on LinkedIn/Twitter
2. Add internal link from Proofline page: "Read the technical deep-dive"
3. Monitor analytics for engagement

### Short-term (Week 1)
1. Feature in email newsletter
2. Create social media graphics with key quotes
3. Track homepage click-through rate

### Long-term (Month 1)
1. A/B test different featured images
2. Analyze reading completion rate
3. Create follow-up content (e.g., "Proofline Use Cases")

---

## 📞 Support

**Issues?**
- Cache not clearing → Wait 5-10 minutes, try incognito browser
- Post not appearing on homepage → Verify category is "Featured"
- Formatting broken → Check Custom HTML block, ensure classes intact
- Featured image not showing → Re-upload, check file size <200KB

**Questions?**
Refer to:
- `docs/blog-post-implementation-guide.md`
- `docs/Building_aavishkar_site.md`
- `theme/partials/blog-post-html-template.html`
