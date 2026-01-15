# Aavishkar.ai WordPress Theme

Automated deployment system for Aavishkar.ai website using Git + WP Pusher.

**Live Site:** https://aavishkar.ai
**Theme:** Divi Child Theme (Child_divi_theme)

---

## Quick Start

### For CSS Changes
```bash
# 1. Edit the CSS file
code theme/style.css

# 2. Commit and push
git add theme/style.css
git commit -m "Update: [describe your change]"
git push origin main

# 3. WP Pusher auto-syncs to WordPress (~30 seconds)
# 4. Clear caches in WordPress Admin:
#    - Divi → Theme Options → Builder → Advanced → Static CSS File Generation → Clear
#    - WP Rocket → Clear cache
```

### For HTML Content Changes
```bash
# 1. Edit the partial
code theme/partials/proofline-hero.html

# 2. Commit and push
git add theme/partials/proofline-hero.html
git commit -m "Update: hero section copy"
git push origin main

# 3. Content updates automatically!
```

---

## Repository Structure

```
aavishkar-theme/
├── README.md                    # This file
├── .gitignore                   # Git ignore rules
│
├── theme/                       # → Auto-syncs to WordPress child theme
│   ├── style.css               # Main CSS (SOURCE OF TRUTH)
│   ├── functions.php           # Theme functions + partials loader
│   ├── partials/               # HTML content blocks (auto-deploy!)
│   │   ├── proofline-hero.html
│   │   ├── proofline-lighthouse.html
│   │   ├── proofline-demos.html
│   │   ├── proofline-about.html
│   │   ├── contact-form.html
│   │   └── whitepaper-content.html
│   └── fonts/                  # Typography files
│       └── *.ttf
│
├── divi-css/                   # Divi Theme Options CSS (manual deploy)
│   └── divi-custom-css-v2.0-optimized.css
│
├── mockups/                    # Local development mockups (not deployed)
│   ├── proofline-mock-light.html
│   └── mock-page.html
│
├── docs/                       # Documentation
│   ├── Building_aavishkar_site.md
│   ├── Building_proofline_page.md
│   └── ...
│
└── assets/                     # Source assets
    ├── logos/
    └── backgrounds/
```

---

## How It Works

### Auto-Deployment Flow
```
Local Edit → Git Push → WP Pusher Webhook → WordPress Updated
```

| File Type | Location | Auto-Deploy |
|-----------|----------|-------------|
| CSS | `theme/style.css` | ✅ Yes |
| PHP Functions | `theme/functions.php` | ✅ Yes |
| HTML Partials | `theme/partials/*.html` | ✅ Yes |
| Fonts | `theme/fonts/*` | ✅ Yes |
| Divi Custom CSS | `divi-css/*.css` | ❌ Manual |
| Mockups | `mockups/*` | ❌ Not deployed |

### Using HTML Partials in Divi

The partials system allows HTML content to be version-controlled and auto-deployed.

**In Divi Code Module (PHP execution):**
```php
<?php aav_partial('proofline-hero'); ?>
```

**In Divi Text Module (Shortcode):**
```
[aav_partial name="proofline-hero"]
```

**List Available Partials (admin only):**
```
[aav_list_partials]
```

---

## CSS Architecture

### File: `theme/style.css`

This is the **single source of truth** for all site CSS.

| Section | Lines (approx) | Purpose |
|---------|----------------|---------|
| Font Faces | 1-50 | DIN font family definitions |
| Design System | 51-1040 | `.aav-*` component classes |
| Footer | 1041-1165 | Footer styles |
| Blog/Articles | 1166-2300 | Blog post template |
| Responsive | 2301-2700 | Mobile/tablet breakpoints |
| Visual Builder | 2701-3099 | Divi VB compatibility |
| **Proofline** | 3100-3650 | Proofline page styles |

### CSS Class Naming Convention

All custom classes use the `.aav-*` prefix:

```css
/* Layout */
.aav-hero, .aav-mission, .aav-labos, .aav-footer

/* Components */
.aav-btn, .aav-card, .aav-container

/* Typography */
.aav-h1, .aav-h2, .aav-lead, .aav-eyebrow

/* Proofline-specific */
.pl-hero, .pl-nav, .pl-header, .pl-lighthouse
```

### Divi Specificity Pattern

To override Divi defaults, use high-specificity selectors:

```css
/* Standard pattern */
.et_pb_section.aav-hero { ... }

/* Visual Builder compatibility */
#et-fb-app .et_pb_section.aav-hero,
.et-fb-root .et_pb_section.aav-hero { ... }
```

---

## Page-Specific CSS

### Proofline Page (page ID: 2952)

```css
/* Body-level overrides use page-id selector */
body.page-id-2952 #page-container { ... }
body.page-id-2952::before { ... }

/* Section-level uses class scoping */
.pl-header .pl-nav { ... }
.pl-hero .pl-h1 { ... }
```

**Important:** WordPress/Divi does NOT auto-generate `page-{slug}` body classes.
Use `body.page-id-XXXX` for body-level CSS targeting.

---

## Development Workflow

### Local Development

1. **Start local server:**
   ```bash
   cd aavishkar-theme/mockups
   python -m http.server 8081
   ```

2. **Open in browser:**
   ```
   http://localhost:8081/proofline-mock-light.html
   ```

3. **Edit and test:**
   - CSS: `theme/style.css`
   - HTML: `mockups/*.html`

### Deploying Changes

```bash
# Stage changes
git add .

# Commit with descriptive message
git commit -m "Update: [component] - [description]"

# Push to trigger auto-deploy
git push origin main
```

### After Deployment

**Always clear caches:**

1. **Divi Static CSS:**
   - Divi → Theme Options → Builder → Advanced → Static CSS File Generation → Clear

2. **WP Rocket:**
   - WP Admin → WP Rocket → Dashboard → Clear cache
   - Also: Tools → Clear Used CSS

3. **Browser:**
   - Hard refresh: `Ctrl+F5` (Windows) / `Cmd+Shift+R` (Mac)

---

## Divi Custom CSS (Manual Deploy)

The file `divi-css/divi-custom-css-v2.0-optimized.css` cannot be auto-deployed because it goes into Divi Theme Options (database), not files.

**To deploy:**

1. Open `divi-css/divi-custom-css-v2.0-optimized.css`
2. Copy entire contents
3. Go to: WP Admin → Divi → Theme Options → General → Custom CSS
4. Paste and save
5. Clear caches

---

## WP Pusher Setup

### Initial Setup (One-time)

1. **Install WP Pusher:**
   - Download from https://wppusher.com/
   - WP Admin → Plugins → Add New → Upload

2. **Connect GitHub:**
   - WP Admin → WP Pusher → GitHub
   - Click "Obtain a GitHub token"
   - Authorize and paste token

3. **Link Theme:**
   - WP Admin → WP Pusher → Install Theme
   - Repository: `YOUR_USERNAME/aavishkar-theme`
   - Subdirectory: `theme`
   - Branch: `main`
   - Check "Link to existing theme" → `Child_divi_theme`

4. **Enable Webhook:**
   - WP Admin → WP Pusher → Themes → aavishkar-theme
   - Copy webhook URL
   - GitHub → Repository → Settings → Webhooks → Add
   - Paste URL, select "Just push event"

### Troubleshooting WP Pusher

**Changes not deploying?**
1. Check GitHub webhook delivery (Settings → Webhooks → Recent Deliveries)
2. Verify WP Pusher is active (WP Admin → WP Pusher)
3. Try manual update: WP Pusher → Themes → Update

**Partial file error?**
1. Ensure file ends with `.html`
2. Check file permissions
3. Use `[aav_list_partials]` to debug

---

## File Reference

### Production Files

| File | Purpose | Deploy Method |
|------|---------|---------------|
| `theme/style.css` | All CSS styles | WP Pusher (auto) |
| `theme/functions.php` | PHP functions + shortcodes | WP Pusher (auto) |
| `theme/partials/*.html` | Page content blocks | WP Pusher (auto) |
| `theme/fonts/*.ttf` | Typography | WP Pusher (auto) |
| `divi-css/*.css` | Divi Theme Options | Manual copy-paste |

### Reference Files (Not Deployed)

| File | Purpose |
|------|---------|
| `mockups/*.html` | Local development testing |
| `docs/*.md` | Implementation guides |
| `assets/*` | Source design files |

---

## Troubleshooting

### CSS Not Applying

1. **Check selector specificity:**
   ```css
   /* Use Divi-compatible selectors */
   .et_pb_section.aav-hero { ... }
   ```

2. **Clear all caches:**
   - Divi Static CSS
   - WP Rocket cache + Used CSS
   - Browser cache

3. **Check for WP Rocket minification lag:**
   - Compare: `/wp-content/themes/Child_divi_theme/style.css`
   - With: `/wp-content/cache/min/.../style.css`
   - If different, clear WP Rocket Used CSS

### Partial Not Loading

1. **Check file exists:**
   ```
   [aav_list_partials]
   ```

2. **Verify naming:**
   - File: `proofline-hero.html`
   - Usage: `[aav_partial name="proofline-hero"]`
   - (No .html extension in shortcode)

3. **Check PHP execution:**
   - Code modules: PHP works
   - Text modules: Use shortcode only

### Visual Builder Shows Different Styles

Add dual targeting:
```css
/* Frontend */
.et_pb_section.aav-hero { ... }

/* Visual Builder */
#et-fb-app .et_pb_section.aav-hero,
.et-fb-root .et_pb_section.aav-hero { ... }
```

---

## Brand Colors

```css
--aav-purple-primary: #9e23a3;
--aav-purple-deep: #6f2dbd;
--aav-pink-highlight: #c87fd0;
--aav-blue-accent: #0b447b;
--aav-purple-medium: #6c3ca8;
```

**Button Gradient:**
```css
background: linear-gradient(145deg, #6f2dbd 0%, #9e23a3 45%, #6f2dbd 100%);
```

---

## Support

- **Build Guide:** `docs/Building_aavishkar_site.md`
- **Proofline Guide:** `docs/Building_proofline_page.md`
- **Blog Template:** `docs/blog-post-implementation-guide.md`

---

## Version History

| Date | Change |
|------|--------|
| 2026-01-14 | Initial Git + WP Pusher setup |
| 2026-01-15 | Added partials system for content deployment |
