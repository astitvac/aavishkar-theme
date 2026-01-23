# Building Proofline Page (aavishkar.ai/proofline) — Final Local → Divi → Launch Checklist

**Last updated:** 2026-01-20
**Target URL:** `https://aavishkar.ai/proofline`
**This guide builds on:** `CompanyPage/Building_aavishkar_site.md` (Design System v2.0 + proven Divi workflow)

---

## 0) Current Status & Key Files

### ✅ COMPLETED (as of 2026-01-15):
- [x] Proofline logo uploaded to WP Media Library
- [x] Page created at `/proofline` (published, page ID: 2952)
- [x] Full Proofline CSS added to child theme `style.css` (source of truth: `CompanyPage/style-v2.0-header-enhanced.css`)
- [x] Custom header template created in Theme Builder (Section has `pl-header` class)
- [x] Proofline footer template added in Theme Builder (empty footer to avoid default Divi footer)
- [x] Header nav fixed (removed `<br>` tags inside `.pl-nav` so links render horizontally)
- [x] Proofline layout CSS (Hero grid + screenshot card + Lighthouse grid + form grid) merged into `style-v2.0-header-enhanced.css` and deployed to WordPress by copy/pasting the **entire file** into the child theme `style.css`
- [x] CSS scoping issue fixed (see Section 5 for critical discovery)
- [x] Demos section built (`#demos`, `.pl-demos`) per `proofline-mock-light.html`
- [x] About section built (`#about`, `.pl-about-section`) per `proofline-mock-light.html`
- [x] Header anchor links wired + working (`#demos`, `#lighthouse`, `#about`)
- [x] Header CTA styling improvements added to CSS:
  - [x] “Apply” CTA vertical centering (`inline-flex`)
  - [x] Proofline header layout hardening (prevents Divi column gutters/flex from pushing the CTA off-canvas)
  - [x] Condensed Proofline header spacing (remove Divi column top/bottom padding so header matches the local mock)
- [x] Copy updated in local mock (`CompanyPage/proofline-mock-light.html`) for Hero/Lighthouse/Demos/About (2026-01-15)
- [x] Proofline hero headline updated + “knowledge creation” highlight style matched to homepage (uses `<strong>` + `#c87fd0`)

### ✅ COMPLETED (2026-01-20):
- [x] **Wording consistency pass completed** — standardized on "Founding Labs" terminology:
  - Updated `proofline-hero.html`: CTA now reads "Apply as a Founding Lab"
  - Updated `proofline-lighthouse.html`: eyebrow now reads "Founding Labs"
  - Updated `proofline-demos.html`: CTA now reads "Apply as a Founding Lab"
  - Note: Divi Theme Builder header nav link needs manual update ("Lighthouse Labs" → "Founding Labs")
- [x] New high-quality logo deployed: `Proofline_Logo_web_large.png`
- [x] Logo sizing CSS (80px height)

### 📋 REMAINING:
- [ ] (Later) Create Contact Form 7 form (Founding Labs) + swap in (after layout matches mock)
- [ ] WP Rocket hardening: ensure **visitors** get the latest child theme CSS (minified/Used CSS can serve a stale `style.css`)
- [ ] Final QA & polish (responsive + Visual Builder parity + performance)
- [ ] **Divi Theme Builder**: Update header nav link text from "Lighthouse Labs" to "Founding Labs"

### 🔴 GAP ANALYSIS: What's NOT yet implemented vs `proofline-mock-light.html`

| Section | Mock Reference (lines) | WordPress Status | Notes |
|---------|----------------------|------------------|-------|
| **Header** | 17-37 | ✅ Working | Nav is horizontal; **Apply CTA can appear “missing” if WP Rocket serves stale minified CSS** (see Troubleshooting) |
| **Hero** | 41-88 | ✅ Working | 2‑column grid + screenshot card styles now apply via CSS |
| **Lighthouse Labs** | 91-208 | ✅ Working | 2‑column grid + form grid styles now apply via CSS |
| **Demos** | 212-268 | ✅ Working | 3 demo tiles present + styled via `.pl-demo-tile` |
| **About** | 272-283 | ✅ Working | About section present + styled |

### ✅ What’s live right now (checked 2026-01-12)
- **Present**: `#hero`, `#lighthouse`, `#demos`, `#about` exist on the published page.
- **Header nav**: fixed (no `<br>` tags inside `.pl-nav`) and anchors scroll.
- **Background**: light mode gradient applied for `body.page-id-2952`.
- **Footer**: hidden for Proofline (`display: none`).
- **Known gotcha**: WP Rocket can serve a stale minified child theme CSS file, making the header “Apply” CTA appear missing/off‑screen even though it’s present in the header HTML (see Troubleshooting + Phase H QA).
- **CSS workflow (IMPORTANT)**: keep `CompanyPage/style-v2.0-header-enhanced.css` as the **single source of truth** and deploy by copy/pasting the **entire file** into WP → child theme `style.css` (then clear caches). This keeps local and WordPress perfectly in sync.

### ✅ Latest edits we’re deploying (2026-01-15)
- **Hero headline (Proofline)**: “The scientific engine for **knowledge creation**.”
  - Uses `<strong>` for the highlighted words (same pattern as homepage) and a Proofline-scoped CSS rule to match the pink highlight.
- **Copy refresh**: shorter, more direct “Git” framing across Hero/Lighthouse/Demos/About (see Phase J)
- **Header visual preference**: condensed header spacing, matching the local mock more closely (see Phase E + Troubleshooting)

### ✅ Copy deployment status (WordPress)
- **As verified live on 2026-01-15**: Hero + Lighthouse + Demos + About copy now match `CompanyPage/proofline-mock-light.html`.

### ✅ Latest live verification snapshot (browser check, 2026-01-12)
- Body classes include `page-id-2952` (WordPress does **not** add `page-proofline` automatically)
- All anchors exist: `#hero/#lighthouse/#demos/#about`
- Footer is hidden
- **Apply CTA**: present in DOM, but can render off-canvas at 1280px when a stale WP Rocket minified CSS is served (raw `style.css` contains the fix; minified cache may not)

### Key learnings / gotchas (2026-01-12)
- **No `page-{slug}` body class**: WordPress/Divi does not auto-generate `page-proofline`. Use `body.page-id-2952` for page scoping and `.pl-header` for header scoping.
- **Divi Page Settings doesn’t expose a reliable “body CSS class” field**: don’t depend on adding custom body classes in the builder UI.
- **WP Rocket CSS optimization can mask real CSS changes**: the browser may load `/wp-content/cache/min/.../Child_divi_theme/style.css?...` which can lag behind the real `/wp-content/themes/Child_divi_theme/style.css` until caches/Used CSS are cleared.
- **Header Apply CTA “missing” is usually layout + caching**: the CTA exists, but can get pushed off-screen by Divi guttered columns and fixed 25/50/25 flex rules unless the Proofline header hardening rules are actually being served to visitors.

**Hero Section Requirements (lines 41-88):**
- 2-column grid layout (`.pl-hero-grid`)
- Left: eyebrow, h1, subtitle, CTA buttons, note
- Right: product screenshot mockup with callouts (`.pl-screenshot`)

**Lighthouse Section Requirements (lines 91-208):**
- 2-column layout (`.pl-lighthouse-grid`)
- Left: copy + bullet blocks ("What you get" / "What we ask")
- Right: form card with fields: Name, Email, Org, Role, Team Size, Domain, Decisions textarea, Data sensitivity radio

**Demos Section Requirements (lines 212-268):**
- Section header with eyebrow + h2
- 3 demo tiles (`.pl-demo-tile`) each with: kicker, title, description, media placeholder, caption chips

**About Section Requirements (lines 272-283):**
- Simple centered section
- "Built by Aavishkar.ai" heading + link

### Key Files in `CompanyPage/`:
- ✅ `Proofline_product_brochure.md` (messaging + feature truth source)
- ✅ `style-v2.0-header-enhanced.css` **(SOURCE OF TRUTH for all CSS - copy to WP)**
- ✅ `proofline-mock-light.html` (HTML reference for page sections)
- ✅ `divi-custom-css-v2.0-optimized.css` (interactions + perf)
- ✅ `page-metallic-background-v1.1-optimized.css` (background architecture)

### Key URLs:
- **Live page:** `https://aavishkar.ai/proofline`
- **Logo:** `https://aavishkar.ai/wp-content/uploads/2026/01/Proofline_Logo_web_large.png`

---

## 1) Final decisions from our Proofline page iterations (what we are deploying)

- **Page focus:** Proofline (with a minimal LabOS mention allowed in the hero note only)
- **Hero title (light mode):** “The scientific engine for **knowledge creation**.”
- **Primary promise:** provenance + versioning for team knowledge; claims stay traceable; knowledge compounds
- **Structure:** vertically stacked sections (homepage-style) for easy Divi portability
- **Core page goals:**
  - Quick explanation of Proofline
  - Easy sign-up opportunity (labs / teams)
  - Quick demos (mock UI)
  - About-us link back to `https://aavishkar.ai/`

---

## 2) Brand color alignment (must-follow)

From `style-v2.0-header-enhanced.css` + `page-metallic-background-v1.1-optimized.css`:

- **Primary Purple:** `#9e23a3`
- **Deep Purple:** `#6f2dbd`
- **Highlight Pink:** `#c87fd0`
- **Accent Blue:** `#0b447b`
- **Medium Purple:** `#6c3ca8`

Rule of thumb:

- Buttons / key accents → `#9e23a3` and the Aavishkar gradient  
  `linear-gradient(145deg, #6f2dbd 0%, #9e23a3 45%, #6f2dbd 100%)`
- Eyebrows / subtle highlight → `#c87fd0` (and the pink→blue text gradient used on the site)

---

## 3) Assets (local → WordPress Media Library)

Local asset files (for upload):

- `Website Revamp Files/Proofline Logo Only.png`
- `Website Revamp Files/Proofline Logo.jpg`

Checklist:

- [x] Upload Proofline logo(s) to WP Media Library
- [ ] Add **descriptive alt text** (e.g., “Proofline logo”)
- [ ] If the logo appears “too tall” due to transparent padding:
  - [ ] **Best fix:** crop/export a new PNG with padding removed, then re-upload
  - [ ] Fallback: constrain the logo box via CSS (see Phase 7)

---

## 4) Phase A — Restore/Create the local mockups (recommended source of truth)

Even if the final deployment is in Divi, having a local mock is our “safe iteration” layer.

### A.1 Create/restore these files under `CompanyPage/`

- [ ] `proofline-mock-light.html` (PRIMARY mock template)
- [ ] `proofline-light.css` (PRIMARY light mode styles)
- [ ] (Optional) `proofline-mock.html` + `proofline.css` (dark mode variant)

If you previously had these and they’re now missing:

- [ ] Restore them from Git history (GitHub) or local backups/recycle bin

### A.2 Run a local server (PowerShell-safe)

```powershell
cd "C:\Users\astit\OneDrive\Desktop\Aavishkar\Aavishkar.ai\Wordpress"
python -m http.server 8081
```

Open:

- `http://localhost:8081/CompanyPage/proofline-mock-light.html`

### A.3 Local mockup QA

- [ ] Desktop 1440px: alignment + spacing
- [ ] Laptop 1024px: 2-column sections readable
- [ ] Tablet 768px: stacks cleanly
- [ ] Mobile 480px: no horizontal scroll; large tap targets

---

## 5) Phase B — Create the Proofline page in WordPress

### B.1 Create the page

- [ ] WP Admin → Pages → **Add New**
- [ ] Title: **Proofline**
- [ ] Slug/permalink: **proofline**
- [ ] Click **Use Divi Builder**
- [ ] Save as **Draft** initially

### B.2 Body class strategy (CRITICAL DISCOVERY)

**⚠️ WordPress/Divi does NOT auto-generate `page-{slug}` body classes!**

**Evidence:** Home page body has `home page-id-2542`, NOT `page-home`. Proofline page has `page page-id-2952`, NOT `page-proofline`.

**The Fix (Two-Part Strategy):**

1. **For header/section-level CSS:** Use section class scoping (`.pl-header`) instead of body class
2. **For body-level CSS (background, footer):** Use `page-id-2952` selector as fallback

**How the home page CSS works (pattern to follow):**
```css
/* Home page uses section classes, NOT body.page-home */
.aav-hero .aav-h1 { ... }
.et_pb_section.aav-hero { ... }
```

**Proofline CSS scoping pattern:**
```css
/* Header/nav: use section class .pl-header */
.pl-header .pl-nav { display: flex; }
.pl-nav-link { color: rgba(15,23,42,0.72); }

/* Body-level overrides: use page-id fallback */
body.page-proofline #page-container,
body.page-id-2952 #page-container { background: ...; }
```

- [x] Added `pl-header` class to header Section in Theme Builder
- [x] CSS updated to use `.pl-header` and `page-id-2952` selectors
- [x] Header CSS now applies correctly

---

## 6) Phase C — Where the Proofline CSS lives (UPDATED)

### C.1 Source of Truth: Local CSS File

**File:** `CompanyPage/style-v2.0-header-enhanced.css`

This single file contains ALL site CSS including Proofline styles. When making CSS changes:
1. Edit this local file
2. Copy entire file contents to WordPress
3. Clear caches

### C.2 WordPress Location: Child Theme style.css

**Location:** Appearance → Theme File Editor → style.css

- [x] Base + Proofline CSS is in child theme (NOT Divi Theme Options)
- [x] Proofline **layout CSS** is present (Hero grid, screenshot styles, Lighthouse grid, form grid).
  - ✅ Implemented by merging the required rules (originally in `CompanyPage/proofline-light.css`) into `CompanyPage/style-v2.0-header-enhanced.css` using `body.page-id-2952 ...` scoping.
- [x] Proofline-only overrides are scoped to `body.page-id-2952` to avoid impacting other site pages.

### C.3 Finding the Proofline CSS inside `style-v2.0-header-enhanced.css`

Instead of relying on exact line numbers (they shift as we iterate), search for these anchors:

- `PROOFLINE PAGE CSS - Light Mode` (main Proofline block: background, sections, demos, about)
- `PROOFLINE HEADER FIXES (Divi Override)` (header-specific fixes)
- `Proofline header layout hardening` (prevents Apply CTA being pushed off-canvas)
- `Hide global footer on Proofline page` (footer suppression)

### C.4 WP Rocket gotcha: visitors may receive a different CSS file than the one you edited
WP Rocket can serve a minified copy from:

- `/wp-content/cache/min/.../wp-content/themes/Child_divi_theme/style.css?...`

This file can lag behind the real theme file:

- `/wp-content/themes/Child_divi_theme/style.css`

**How to verify quickly**
- Open both URLs and search for `page-id-2952` or `Proofline header layout hardening`.
- If the minified file is missing those strings, visitors may not see the latest Proofline fixes.

**How to fix**
- WP Rocket → Tools: **Clear cache** + **Clear Used CSS**
- Divi: clear Static CSS
- If it keeps happening, exclude the child theme stylesheet from WP Rocket minification:
  - WP Rocket → File Optimization → CSS → **Excluded CSS Files**:
    - `wp-content/themes/Child_divi_theme/style.css`

### C.5 WordPress compatibility rule: avoid CSS variables

Your Aavishkar CSS intentionally avoids variables for WP validator compatibility.

- [ ] Do **not** rely on `:root { --tokens }` in WordPress-pasted CSS
- [ ] Use direct values (`#9e23a3`, etc.)

### C.4 Divi build defaults (recommended settings to match the v2.0 system)

These settings prevent Divi defaults from fighting the `.aav-*` design system:

- [ ] **Prefer HTML in Text modules** using `.aav-h1`, `.aav-h2`, `.aav-lead`, `.aav-btn` classes  
      (avoid styling fonts/colors in Divi “Design” tab unless absolutely necessary)
- [ ] **Row sizing (common fix):** Row → Design → Sizing  
  - Width: **100%**  
  - Max Width: **100%**  
  - Gutter Width: **1** (or keep default, but ensure it doesn’t break your layout)
- [ ] **Overflow visibility when needed:** If any dropdowns/tooltips get clipped, set  
      Section/Row/Column → Advanced → Visibility/Overflow: **Visible**
- [ ] **Device visibility:** Ensure key modules are not disabled on Phone/Tablet

---

## 7) Phase D — Background strategy (important: site uses a metallic/dark base)

Your site background system (`page-metallic-background-v1.1-optimized.css`) is dark + has a `body::before` overlay.

If you want Proofline to be **light mode** (Elicit-like), you must override the background for this page.

### D.1 Light-page override (scoped)

Add a scoped override to your Proofline CSS (wherever you paste it):

```css
/* Make Proofline page light even if site background is dark */
body.page-id-2952,
body.page-id-2952 #page-container,
body.page-id-2952 #et-main-area {
  background: #f8fafc !important;
}

/* Disable the metallic noise overlay on this page (optional) */
body.page-id-2952::before {
  opacity: 0 !important;
  animation: none !important;
  background: none !important;
}
```

Checklist:

- [ ] Proofline page background is light
- [ ] Other site pages remain unchanged

---

## 8) Phase E — Header Template (✅ COMPLETED & WORKING)

### ✅ Created: Proofline-specific header in Theme Builder

**Location:** Divi → Theme Builder → Custom Template for Proofline page

**Structure (IMPORTANT: Note `pl-header` class on Section):**
```
Section (CSS Class: aav-site-header pl-header)  ← CRITICAL: pl-header enables CSS scoping
└── Row (CSS Class: aav-bar) - 3 columns
    ├── Column 1: Image Module
    │   └── Image: Proofline-Logo-Only.png
    │   └── CSS Class: aav-logo
    │   └── Link: /proofline
    │
    ├── Column 2: Text Module
    │   └── HTML (NO <br> tags between links!):
    │       <nav class="pl-nav">
    │       <a class="pl-nav-link" href="#demos">Demos</a>
    │       <a class="pl-nav-link" href="#lighthouse">Founding Labs</a>
    │       <a class="pl-nav-link" href="#about">About</a>
    │       </nav>
    │
    └── Column 3: Text Module
        └── HTML:
            <a class="aav-btn aav-btn-primary pl-nav-cta" href="#lighthouse">Apply</a>
```

**⚠️ Critical Nav HTML Note:** Do NOT put `<br>` tags between nav links - this causes vertical stacking.

### Header CSS Fixes (in `style-v2.0-header-enhanced.css`)

**CSS Scoping Strategy:** Uses `.pl-header` section class (NOT `body.page-proofline`) because WP/Divi doesn't auto-generate page-slug body classes.

Key fixes applied:
- **Logo size:** 80px height to compensate for PNG transparent padding
- **Nav horizontal layout:** flex with higher specificity to override Divi
- **Nav link colors:** gray text (#0f172a @ 72% opacity), purple hover
- **Apply CTA centering:** `inline-flex` + fixed height so text is centered
- **Header layout hardening:** overrides Divi guttered column widths / fixed 25/50/25 flex that can push the CTA off-screen
- **Condensed header spacing:** removes Divi header column top/bottom padding that makes the header look “expanded”
- **Footer hide:** Multiple selectors including `page-id-2952` fallback

```css
/* Logo fix - uses .pl-header section class */
.pl-header .et_pb_image img,
.pl-header .aav-logo img,
.pl-header.aav-site-header img {
  height: 80px !important;
  max-height: 80px !important;
  width: auto !important;
  object-fit: contain !important;
}

/* Nav horizontal + styled - .pl-nav is unique to Proofline, no body prefix needed */
.pl-nav,
nav.pl-nav,
.pl-header .pl-nav {
  display: flex !important;
  flex-direction: row !important;
  align-items: center !important;
  gap: 8px !important;
}

/* Nav link colors */
.pl-nav a,
.pl-nav-link,
a.pl-nav-link {
  color: rgba(15, 23, 42, 0.72) !important;  /* Gray, not blue */
  font-size: 13px !important;
  font-weight: 700 !important;
  padding: 7px 12px !important;
  border-radius: 12px !important;
  white-space: nowrap !important;
}

/* Footer hide - uses page-id-2952 fallback since page-proofline doesn't exist */
body.page-proofline .et-l--footer,
body.page-id-2952 .aav-footer,
body.page-id-2952 .et-l--footer,
body.page-id-2952 footer.et-l {
  display: none !important;
}
```

---

## 9) Phase F — Build the Proofline page sections in Divi (match `proofline-mock-light.html`)

### F.1 Recommended section order (exact mock)

Build these 4 sections in this order (each as a Divi **Regular Section**):

1. **Hero** (`#hero`, `.pl-hero`)
2. **Lighthouse** (`#lighthouse`, `.pl-lighthouse`)
3. **Demos** (`#demos`, `.pl-demos`)
4. **About** (`#about`, `.pl-about-section`)

### F.2 Divi structure (recommended)

- Use **1-column rows**.
- Put a single **Code module** in each section and paste the HTML blocks from `proofline-mock-light.html`.
- **Important:** Don’t make the Hero a Divi 2‑column row — the HTML already contains `.pl-hero-grid` which becomes 2 columns via CSS.

### F.3 Section-by-section (paste from mock)

For each section:

- [ ] Add **Regular Section**
- [ ] Section → **Advanced → CSS ID & Classes**
  - Set the **CSS ID** to match the anchor (`hero`, `lighthouse`, `demos`, `about`)
  - Set the **CSS Class** to match the mock (`pl-hero`, `pl-lighthouse`, `pl-demos`, `pl-about-section`)
- [ ] Add a **Code module** and paste the matching HTML block from `proofline-mock-light.html`

**Current live status (2026-01-12):** `#hero`, `#lighthouse`, `#demos`, `#about` all exist and are linked from the header.

### F.4 Header anchor links

Once `#demos` and `#about` exist, the header links should scroll correctly. If they don’t:
- Ensure the **CSS ID** is exactly `demos` / `about` (no typos).
- Ensure the header nav HTML contains **no `<br>` tags** between links.

---

## 10) Phase G — Make signup “real” (recommended: Contact Form 7)

You already have a working CF7 pattern in `CompanyPage/Contact_form.html`.

### G.1 Create a Proofline Early Access form (CF7)

- [ ] WP Admin → Contact → Contact Forms → **Add New**
- [ ] Name: “Proofline — Early Access”
- [ ] Minimum fields:
  - Name
  - Email
  - Org/Lab
  - Role (PI/Postdoc/Student/Industry)
  - Optional message
  - Consent checkbox

### G.2 Embed it into the Proofline page

- [ ] Add a Divi Text module in the hero OR in a dedicated “Request Access” section
- [ ] Paste the shortcode: `[contact-form-7 id="..." title="Proofline — Early Access"]`

### G.3 Style to match the app-like signup flow

- [ ] Reuse existing input styles (already used site-wide)
- [ ] Add minimal Proofline overrides scoped to `body.page-id-2952` (colors, spacing)

---

## 11) Phase H — QA (before publish)

### H.1 Front-end layout checks

- [ ] Desktop 1440px
- [ ] Laptop 1024px
- [ ] Tablet 768px
- [ ] Mobile 480px (no horizontal scroll)

### H.2 Visual Builder parity

If the Visual Builder differs:

- [ ] Add dual targeting for any Proofline overrides you need:
  - Front-end: `body.page-id-2952 ...` and/or `.pl-header ...`
  - Visual Builder (if needed): `#et-fb-app body.page-id-2952 ...` and/or `.et-fb-root body.page-id-2952 ...`

### H.3 Cache clearing (must-do after CSS edits)

- [ ] Clear Divi Static CSS
- [ ] Clear WP Rocket cache
- [ ] Hard refresh browser (Ctrl+F5)

### H.4 Troubleshooting (common issues)

- **⚠️ CSS selectors using `body.page-proofline` don't work**
  - WordPress/Divi does NOT auto-generate `page-{slug}` body classes!
  - Use `.pl-header` section class for header CSS (add class to Section in Theme Builder)
  - Use `body.page-id-2952` as fallback for body-level overrides
  - See Section 5 (B.2) for full explanation

- **Proofline page is still dark**
  - Confirm background override uses BOTH selectors: `body.page-proofline, body.page-id-2952`
  - Clear Divi Static CSS + WP Rocket cache

- **Header nav links are stacked vertically**
  - Check for `<br>` tags in nav HTML - remove them!
  - Ensure CSS uses `.pl-nav` directly (not `body.page-proofline .pl-nav`)

- **CSS changes don't show up**
  - Copy latest CSS from `style-v2.0-header-enhanced.css` to WordPress child theme
  - Clear Divi Static CSS + WP Rocket cache + WP Rocket Used CSS (then hard refresh / incognito)

- **Theme File Editor shows `nonce_failure` when clicking “Update File”**
  - This is usually an expired WP security token (page open too long / session timeout).
  - Fix:
    - Copy your CSS to clipboard
    - Re-login to WP Admin in a fresh tab
    - Re-open Appearance → Theme File Editor → `style.css` and update immediately

- **WP Rocket is serving stale minified CSS**
  - Symptom: header styles partially apply but new rules (e.g. `page-id-2952` updates or header hardening) don’t
  - Confirm by checking the served stylesheet:
    - `/wp-content/cache/min/.../wp-content/themes/Child_divi_theme/style.css?...`
  - Fix: WP Rocket → Tools → **Clear Used CSS** + **Clear cache** (and optionally exclude `wp-content/themes/Child_divi_theme/style.css` from minification)

- **Header “Apply” button appears missing**
  - Often it’s **present but pushed off-screen** by Divi guttered columns + fixed 25/50/25 flex
  - Ensure the **header hardening CSS** is being served to visitors (see WP Rocket stale minified CSS above)
  - In the Visual Builder, use the **Layers** panel to select Column 3 → Text module (it may be off-canvas)

- **Hero is hidden under the fixed header**
  - Add extra top padding to the Proofline hero section (scoped CSS), or ensure the first section has enough spacing

- **Logo "creates whitespace" when enlarged**
  - Best: re-export a cropped PNG (remove transparent padding) and re-upload
  - Fallback: constrain logo `height` + `width` with `object-fit: contain`

- **Looks different in Visual Builder**
  - Add Visual Builder selectors (`#et-fb-app` / `.et-fb-root`) for the small set of Proofline-specific overrides that matter

---

## 12) Phase I — SEO + launch

- [ ] Meta title: “Proofline | Version Control for Research Knowledge | Aavishkar.ai”
- [ ] Meta description: 1–2 sentences (pain point → outcome)
- [ ] OpenGraph image
- [ ] Add nav link (optional)
- [ ] Publish page
- [ ] Test live URL: `https://aavishkar.ai/proofline`

---

## Appendix: Copy guardrails (from `Proofline_product_brochure.md`)

Use these terms consistently:

- “Knowledge Cards”
- “Commit”
- “Branch”
- “Merge with synthesis”
- “Audit trail / provenance”

---

## 13) Phase J — Deploy latest copy updates to WordPress (2026-01-15)

**Source of truth for HTML content:** `theme/partials/proofline-*.html` files
**Goal:** Make the live WP page match the updated partial files.

### J.0a HTML Partials Workflow (CRITICAL)

**⚠️ Divi Visual Builder does NOT render shortcodes in Code modules!**

Using `[aav_partial name="proofline-hero"]` in a Divi Code module will display the shortcode as literal text and can cause site errors.

**Recommended Workflow:**

1. **Edit the partial file** in `theme/partials/` (e.g., `proofline-hero.html`)
2. **Commit and push** to Git (for version control)
3. **Copy the HTML** from the partial file
4. **Paste into Divi** Code module
5. **Clear caches** (Divi Static CSS + WP Rocket)

**Why this approach?**
- Partial files are version-controlled (can track changes, revert, etc.)
- Easy to iterate locally before deploying
- Single source of truth for each section
- No shortcode rendering issues

**Partial Files for Proofline:**
| Partial File | Divi Section |
|--------------|--------------|
| `theme/partials/proofline-hero.html` | `#hero` Code module |
| `theme/partials/proofline-demos.html` | `#demos` Code module |
| `theme/partials/proofline-lighthouse.html` | `#lighthouse` Code module |

### J.0 Rules (important)
- Use the existing Divi Sections/IDs (`hero`, `lighthouse`, `demos`, `about`) — don’t create new ones.
- In each section, edit the existing **Code module** and paste the updated HTML block.
- **Do not paste the outer `<section ... id="...">` wrapper** from the mock inside the Code module (Divi already provides the section + ID).

### J.1 Hero (Code module under `#hero`)
Paste this (inner HTML only):
- Lines **42–87** from `CompanyPage/proofline-mock-light.html`
  - Includes the updated hero headline: “The scientific engine for **knowledge creation**.”

### J.2 Lighthouse (Code module under `#lighthouse`)
Paste this (inner HTML only):
- Lines **92–209** from `CompanyPage/proofline-mock-light.html`

### J.3 Demos (Code module under `#demos`)
Paste this (inner HTML only):
- Lines **213–269** from `CompanyPage/proofline-mock-light.html`

### J.4 About (Code module under `#about`)
Paste this (inner HTML only):
- Lines **273–283** from `CompanyPage/proofline-mock-light.html`

### J.5 After updating each section
- [ ] Save/Update page
- [ ] Clear Divi Static CSS + WP Rocket cache/Used CSS
- [ ] Hard refresh (Ctrl+F5) or check incognito

### J.6 Status
- [x] Hero deployed
- [x] Lighthouse deployed
- [x] Demos deployed
- [x] About deployed
- [x] Verified live on `https://aavishkar.ai/proofline` (2026-01-15)

---

## 14) Next steps (to complete Proofline)

### 14.1 Wording consistency ✅ COMPLETED (2026-01-20)
All instances now use "Founding Labs" terminology consistently:
- ✅ Hero eyebrow: "Founding Labs · Invite-only"
- ✅ Hero CTA: "Apply as a Founding Lab"
- ✅ Lighthouse section eyebrow: "Founding Labs"
- ✅ Lighthouse section H2: "Become a Founding Lab"
- ✅ Demos CTA: "Apply as a Founding Lab"

**⚠️ Manual Divi update required:**
- Divi Theme Builder → Proofline header → nav link text
- Change: "Lighthouse Labs" → "Founding Labs"

### 14.2 Verify CSS deployment + caching health
- [ ] Confirm visitors are receiving the latest CSS:
  - Raw: `/wp-content/themes/Child_divi_theme/style.css`
  - Minified: `/wp-content/cache/min/.../Child_divi_theme/style.css?...`
  - Both should include: `page-id-2952`, `PROOFLINE PAGE CSS - Light Mode`, and `Proofline header layout hardening`
- [ ] If minified lags: WP Rocket → Tools → **Clear cache + Clear Used CSS**

### 14.3 Polish (recommended)
- [ ] Replace demo placeholders with real GIF/MP4 loops (30–45s) and optimize for performance
- [ ] Swap the fake HTML form for Contact Form 7 (Phase G) if you want submissions + notifications
- [ ] SEO: title/description + OpenGraph (Phase I)

### 14.4 Optional: tighten the form confirmation copy
Current confirmation area still says: "**Application received. We'll reply in 48 hours. Optional: book a call.**"
If you want it to match the new tone, update it to something like:
- "Received. We'll reply in 48h. Optional: book a call."

---

## 15) Hero Visual - DAG Branching Design

**Updated: 2026-01-22**

The Proofline hero now features a branching DAG (Directed Acyclic Graph) visual that shows knowledge flow with validated/invalidated paths.

### 15.1 Visual Structure

```
●───── IDEA
│
●───────────────────────────● X ─── ALT
│                           │
●───── HYPOTHESIS           │
│                           │ (dotted - learnings merge)
│                           │
◎───── INSIGHT ✓ ←..........┘
```

### 15.2 Color Palette

| Element | Color | Hex |
|---------|-------|-----|
| Primary Purple | Main spine top | `#9e23a3` |
| Medium Purple | Mid spine / branch | `#8a32a8`, `#7c3aad` |
| Deep Purple | Hypothesis nodes | `#6f2dbd` |
| Pink Highlight | Insight glow | `#c87fd0` |
| Validation Red | X mark (invalidated) | `#ef4444` |

### 15.3 Key Visual Elements

1. **Main Spine (x=30)**: Vertical purple line with gradient from `#9e23a3` → `#7c3aad`
2. **Branch**: Horizontal line from EVIDENCE node to ALT HYPOTHESIS (right side)
3. **Nodes**: 6px radius circles with white fill and colored stroke
4. **Cards**: 70px × 28px white cards with colored badge labels
5. **X Mark**: Red circle with crossed lines (invalidated path)
6. **Checkmark**: Purple circle with check (validated insight)
7. **Dotted Lines**: Purple dashed lines (`stroke-dasharray="4 3"`) showing learnings merge back

### 15.4 SVG Specifications

- ViewBox: `0 0 340 250`
- Filter IDs: `pl-card-shadow`, `pl-glow`
- Font: `dinmedium, Arial, sans-serif`
- Node positions (y): IDEA=44, EVIDENCE=79, HYPOTHESIS=129, INSIGHT=179

### 15.5 Two-Column Hero Layout

- **Left (copy)**: Eyebrow, H1, subtitle, CTAs, note
- **Right (visual)**: Glass-effect container with SVG DAG
- Grid: `1fr 1fr`, gap: 60px, centered alignment

### 15.6 CSS Classes for DAG Visual

```css
/* Glass container */
.pl-screenshot {
  max-width: 380px;
  padding: 16px;
  background: rgba(255,255,255,0.85);
  border-radius: 20px;
  border: 1px solid rgba(158, 35, 163, 0.08);
  box-shadow: 0 25px 60px rgba(2, 6, 23, 0.12);
  backdrop-filter: blur(8px);
}

/* Hero grid */
.pl-hero-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 60px;
  align-items: center;
}
```

### 15.7 Responsive Behavior

- **< 980px**: Grid stacks to single column, copy text centers
- **< 520px**: H1 reduces to 36px, CTAs stack vertically

### 15.8 Source Files

| File | Purpose |
|------|---------|
| `mockups/proofline-dag-visual-test.html` | Reference mockup for testing |
| `theme/partials/proofline-hero.html` | Complete hero with visual |
| `theme/partials/proofline-hero-visual.html` | Standalone SVG component |

### 15.9 Finalized Hero Copy

**Eyebrow:** Founding Labs · Invite-only

**Headline:** Supercharge **knowledge creation** in teams

**Subtitle:** Capture hypotheses, evidence, and decisions. Connect them into a **Proofline**™, a scientific engine for knowledge creation.

**CTAs:** "Apply as a Founding Lab" (primary) | "See it in action →" (ghost)

**Note:** Proofline helps you ask better questions of AI and collaborate with your team to create verifiable new knowledge together.

---

## 16) Session Update (2026-01-22) — Demo CTAs & CSS Alignment Fixes

### 16.1 CTA Updates

Updated call-to-action buttons to link to the YouTube demo video.

**Hero Section (`proofline-hero.html`):**
- Changed: "See it in action →" to "Watch 3 min Demo →"
- Added link: `https://www.youtube.com/watch?v=KT6eyadQfIg`
- Added attributes: `target="_blank" rel="noopener"` for external link

**Demos Section (`proofline-demos.html`):**
- Replaced "Back to top" with "Watch 3 min Demo →"
- Same YouTube link with external link attributes

### 16.2 CSS Alignment Fixes

**Logo Fix:**
```css
/* Before: 80px height caused visual issues */
/* After: 56px with object-fit */
.pl-header .aav-logo img {
  height: 56px !important;
  max-height: 56px !important;
  object-fit: contain !important;
}
```

**Header/Hero Alignment:**
The hero container now uses the same 32px side padding as the header bar for visual alignment:
```css
body.page-id-2952 .pl-hero .aav-container-large {
  padding-left: 32px !important;
  padding-right: 32px !important;
}
```

**Responsive Updates:**
- Tablet (≤980px): Hero padding matches header
- Mobile (≤520px): Reduced to 16px for tighter mobile layout

### 16.3 Files Modified
| File | Change |
|------|--------|
| `theme/partials/proofline-hero.html` | CTA text + YouTube link |
| `theme/partials/proofline-demos.html` | CTA replacement + YouTube link |
| `theme/style.css` | Logo height + alignment fixes |

---

## 17) Contact Form 7 Implementation — Founding Labs Form

### 17.1 Overview

Replace the static HTML form in `proofline-lighthouse.html` with Contact Form 7 for:
- Email notifications on submission
- Proper form validation
- WordPress admin tracking

### 17.2 WordPress Admin Setup

#### Step 1: Install Contact Form 7
- WP Admin → Plugins → Add New
- Search "Contact Form 7" → Install → Activate

#### Step 2: Create the Form
- WP Admin → Contact → Add New
- Title: **Proofline — Founding Labs Application**

#### Step 3: Form Template
```
<div class="pl-form-grid">
  <div class="pl-field">
    <label for="pl-name">Name</label>
    [text* your-name id:pl-name placeholder "Your full name"]
  </div>

  <div class="pl-field">
    <label for="pl-email">Email</label>
    [email* your-email id:pl-email placeholder "you@org.com"]
  </div>

  <div class="pl-field">
    <label for="pl-org">Org</label>
    [text* your-org id:pl-org placeholder "Lab / company / institution"]
  </div>

  <div class="pl-field">
    <label for="pl-role">Role</label>
    [select* your-role id:pl-role include_blank "PI / Group Lead" "Postdoc / Senior Researcher" "Graduate Student / RA" "R&D / Product" "Founder / Exec" "Other"]
  </div>

  <div class="pl-field">
    <label for="pl-size">Team size</label>
    [select* team-size id:pl-size include_blank "1–3" "4–10" "11–30"]
  </div>

  <div class="pl-field">
    <label for="pl-domain">Domain</label>
    [select* your-domain id:pl-domain include_blank "Academic lab" "Deep tech" "Enterprise R&D" "Research startup" "Other"]
  </div>

  <div class="pl-field pl-field-wide">
    <label for="pl-decisions">What decisions do you keep redoing?</label>
    [textarea your-decisions id:pl-decisions placeholder "e.g., experiment direction, go/no-go bets, grant claims… and the rework you want to eliminate"]
  </div>

  <fieldset class="pl-field pl-field-wide pl-fieldset">
    <legend>Data sensitivity</legend>
    [radio data-sensitivity id:pl-sensitivity use_label_element default:1 "Public" "Internal" "Regulated"]
  </fieldset>
</div>

[submit class:aav-btn class:aav-btn-primary class:pl-apply-btn "Apply (2 minutes)"]
```

#### Step 4: Mail Tab Configuration
- **To:** `founding-labs@aavishkar.ai` (or your preferred email)
- **From:** `[your-email]`
- **Subject:** `New Founding Labs Application: [your-name] from [your-org]`
- **Message Body:**
```
New Proofline Founding Labs Application

Name: [your-name]
Email: [your-email]
Organization: [your-org]
Role: [your-role]
Team Size: [team-size]
Domain: [your-domain]

Data Sensitivity: [data-sensitivity]

What decisions do you keep redoing?
[your-decisions]

---
Submitted from: https://aavishkar.ai/proofline
```

#### Step 5: Messages Tab
- **Success message:** `Application received. We'll be in touch soon.`

### 17.3 Partial Update

Replace the form HTML in `theme/partials/proofline-lighthouse.html`:

**Before (static form):**
```html
<div class="pl-lighthouse-form-card" aria-label="Apply form">
  <form class="pl-apply-form" action="#applied" method="get">
    ...
  </form>
</div>
```

**After (CF7 shortcode):**
```html
<div class="pl-lighthouse-form-card" aria-label="Apply form">
  [contact-form-7 id="XXXX" title="Proofline — Founding Labs Application"]
</div>
```

### 17.4 CSS Styling (already in style.css)

CF7 form styling for Proofline is located around lines 3623-3669 in `theme/style.css`.

Additional styles for radio buttons, validation, and success messages have been added to ensure visual consistency with the original form design.

### 17.5 Deployment Checklist

- [x] CF7 plugin installed and active
- [x] Form created with all 8 fields
- [x] Email notification configured (ac@aavishkar.ai)
- [x] Success message customized
- [x] Partial updated with CF7 shortcode (form ID: a6ab583)
- [x] Content copied to Divi Code module
- [x] Caches cleared (Divi Static CSS + WP Rocket)
- [x] WP Mail SMTP configured with Gmail OAuth
- [x] Form submission tested
- [x] Email receipt verified

### 17.6 Learnings from CF7 Implementation (2026-01-23)

#### What Worked

**One-Click Gmail OAuth Setup:**
- WP Mail SMTP's one-click OAuth setup eliminated manual Google Cloud Console configuration
- Authentication completed in seconds vs. 30+ minutes for manual OAuth
- No need to create Client ID/Secret manually

**Git + WP Pusher Deployment:**
- Changes to `style.css` and partials auto-deployed via git push
- No need to manually update CSS in WordPress admin
- Version control for both code and form configuration

**CF7 Form Structure:**
- Using `<div class="pl-form-grid">` wrapper maintains existing grid layout
- Individual `<div class="pl-field">` wrappers preserve label/input pairing
- CF7's `[text*]`, `[email*]`, `[select*]` syntax for required fields

#### Key Challenges & Solutions

**1. Form Input Borders Not Visible**
- **Problem:** CF7 form controls had no visible borders until clicked
- **Cause:** CSS rules targeting `.wpcf7 input` were too generic
- **Solution:** Added explicit class-based selectors with `!important`:
```css
body.page-id-2952 .wpcf7-form-control.wpcf7-text,
body.page-id-2952 .wpcf7-form-control.wpcf7-email,
body.page-id-2952 .wpcf7-form-control.wpcf7-select {
  border: 1px solid rgba(15, 23, 42, 0.12) !important;
}
```

**2. Button Text UX Issue**
- **Problem:** Submit button said "Apply (2 minutes)" - confusing after form is filled
- **Lesson:** Time estimates belong in form description, not submit button
- **Solution:** Changed button text to just "Apply"

**3. WP Mail SMTP Domain Warnings**
- **Observation:** SPF/DKIM/DMARC warnings appeared after setup
- **Decision:** Deferred DNS configuration (emails still send via Gmail)
- **Future:** Consider adding SPF/DKIM records for better deliverability

#### Email Configuration Details

**WP Mail SMTP Settings:**
- Mailer: Google / Gmail (OAuth)
- From Email: ac@aavishkar.ai
- From Name: aavishkar.ai
- One-Click Setup: Enabled

**CF7 Mail Template:**
```
To: ac@aavishkar.ai
From: [_site_title] <wordpress@aavishkar.ai>
Subject: New Founding Labs Application: [your-name] from [your-org]
Reply-To: [your-email]
```

#### CSS Styling Strategy

**Grid Layout Preservation:**
- Wrapped entire form in `.pl-form-grid` to maintain 2-column responsive layout
- Each field wrapped in `.pl-field` for consistent spacing
- Wide fields use `.pl-field-wide` class

**CF7-Specific Overrides:**
```css
/* Target CF7 classes explicitly */
.wpcf7-form-control.wpcf7-text { ... }
.wpcf7-form-control.wpcf7-email { ... }
.wpcf7-radio { display: flex !important; }
.wpcf7-not-valid-tip { color: #ef4444 !important; }
```

#### Workflow Best Practices

**1. Test Email Delivery First**
- Configure WP Mail SMTP before creating CF7 form
- Send test email to verify Gmail OAuth connection
- Check spam folder if test email doesn't arrive

**2. Edit in Git, Deploy via Code Module**
- Update `theme/partials/proofline-lighthouse.html` in Git
- Copy HTML to Divi Code module (shortcodes work in Code modules, not Text modules)
- Push CSS changes to Git for auto-deployment

**3. Always Clear All Caches**
- Divi Static CSS
- WP Rocket cache + Used CSS
- Browser hard refresh (Ctrl+F5)

#### Time Investment

- **Initial Setup:** ~20 minutes (CF7 form creation, WP Mail SMTP OAuth, email template)
- **CSS Debugging:** ~10 minutes (border visibility issue)
- **Total:** ~30 minutes from start to working form

**vs. Estimated Manual OAuth Setup:** 45-60 minutes (Google Cloud Console, credentials, etc.)
