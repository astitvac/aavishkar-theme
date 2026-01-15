# Aavishkar.ai Blog Post Template Structure v3.0

**Last Updated:** December 2025  
**Status:** ✅ COMPLETE - Professional academic styling with enhanced mobile readability

## Divi Theme Builder Template Layout

### Section 1: Post Header (aav-article-header)
**Section Classes**: `aav-article-header aav-section-large`
**Row Classes**: `aav-container-large`

**Modules**:
1. **Post Title Module**
   - Module Classes: `aav-article-title`
   - Uses dynamic content: Post Title

2. **Text Module** (Post Meta)
   - Module Classes: `aav-article-meta`
   - Custom HTML content:
   ```html
   <div class="aav-article-authors">
       <span class="aav-author-name">%author_name%</span>
       <span class="aav-author-title">%custom_field_author_title%</span>
   </div>
   <div class="aav-article-date">
       Published: %post_date%
   </div>
   <div class="aav-article-categories">
       Categories: %post_categories%
   </div>
   ```

3. **Text Module** (Abstract/Excerpt - Optional)
   - Module Classes: `aav-abstract-box`
   - Content: Post Excerpt (dynamic)

### Section 2: Main Article Content (aav-article)
**Section Classes**: `aav-article aav-section-large`
**Row Classes**: `aav-container-large`

**Modules**:
1. **Post Content Module**
   - Module Classes: `aav-article-body`
   - Uses dynamic content: Post Content
   - This will automatically style H2, H3, paragraphs, lists, etc.

### Section 3: Article Footer (aav-article-footer)
**Section Classes**: `aav-article-footer aav-section-small`
**Row Classes**: `aav-container-small`

**Modules**:
1. **Text Module** (Tags)
   - Content: Post Tags (dynamic)
   - Module Classes: `aav-article-tags`

2. **Comments Module**
   - Module Classes: `aav-article-comments`

## ✅ ENHANCED FEATURES v3.0

### **Mobile Readability Improvements:**
- **Enhanced Typography**: Increased line-height (1.8-1.9) and margin spacing for comfortable mobile reading
- **Responsive Font Sizes**: `clamp()` functions ensure optimal text size across all devices
- **Better Content Spacing**: Generous padding and margins prevent cramped appearance
- **Improved List Spacing**: Enhanced spacing between list items and proper indentation
- **Optimized Blockquotes**: Better padding and line-height for mobile quote readability

### **Performance Optimizations:**
- **Reduced Glass Effects**: Optimized backdrop-filter blur from 16px to 8px on mobile
- **CSS Containment**: Added layout containment for better rendering performance
- **Hardware Acceleration**: Enhanced will-change properties for smooth animations

### **Visual Builder Compatibility:**
- **Dual CSS Targeting**: All styling works consistently in both Visual Builder and front-end
- **Admin/Non-Admin Consistency**: Fixed text color differences between signed-in and incognito modes
- **Enhanced Contrast**: Maximum contrast white background for perfect black text readability

## Required CSS Classes (Already in style-v2.0-header-enhanced.css)

### Existing Classes to Leverage:
- `.aav-section-large` - For main sections (optimized padding: 40px-70px)
- `.aav-section-small` - For compact sections (optimized padding: 30px-50px)
- `.aav-container-large` - For wide content areas with glassmorphism
- `.aav-container-small` - For compact content areas
- `.aav-h1`, `.aav-h2`, `.aav-lead` - Typography classes with mobile optimization

### New Classes Needed (Add to style.css):
```css
/* Article-specific styling */
.aav-article-header {
  background: transparent;
  color: #ffffff;
  text-align: center;
}

.aav-article-title {
  font-family: dinmedium, Arial, sans-serif;
  font-size: clamp(32px, 5vw, 48px);
  line-height: 1.1;
  margin-bottom: 24px;
  color: #ffffff;
  text-shadow: 0 2px 4px rgba(0,0,0,.35);
}

.aav-article-meta {
  font-size: 16px;
  color: #e8e9f5;
  margin-bottom: 32px;
  opacity: 0.9;
}

.aav-article-authors {
  margin-bottom: 8px;
}

.aav-author-name {
  font-weight: 600;
  color: #ffffff;
}

.aav-author-title {
  color: #c8c9d4;
  font-style: italic;
}

.aav-article-date,
.aav-article-categories {
  font-size: 14px;
  color: #b8b9c4;
  margin-bottom: 4px;
}

.aav-abstract-box {
  background: linear-gradient(135deg, 
    rgba(255,255,255,0.12) 0%, 
    rgba(243,239,250,0.18) 50%, 
    rgba(255,255,255,0.08) 100%);
  border: 1px solid rgba(255,255,255,0.25);
  border-left: 4px solid #9e23a3;
  border-radius: 12px;
  padding: 24px 32px;
  margin: 32px auto;
  max-width: 900px;
  backdrop-filter: saturate(120%) blur(8px);
  -webkit-backdrop-filter: saturate(120%) blur(8px);
  box-shadow: 0 8px 32px rgba(0,0,0,0.15);
}

.aav-article {
  background: transparent;
  color: #ffffff;
}

.aav-article-body {
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(255,255,255,0.12);
  border-radius: 16px;
  padding: 48px;
  backdrop-filter: saturate(120%) blur(12px);
  -webkit-backdrop-filter: saturate(120%) blur(12px);
  box-shadow: 0 12px 48px rgba(0,0,0,0.2);
  color: #ffffff;
  line-height: 1.7;
}

.aav-article-body h2 {
  font-family: dinmedium, Arial, sans-serif;
  font-size: clamp(24px, 3.5vw, 32px);
  color: #ffffff;
  margin: 40px 0 16px 0;
  text-shadow: 0 1px 2px rgba(0,0,0,.25);
}

.aav-article-body h3 {
  font-family: dinmedium, Arial, sans-serif;
  font-size: clamp(20px, 2.8vw, 24px);
  color: #e8e9f5;
  margin: 32px 0 12px 0;
}

.aav-article-body p {
  margin-bottom: 16px;
  color: #d8d9e4;
}

.aav-article-body ul,
.aav-article-body ol {
  margin: 16px 0;
  padding-left: 24px;
  color: #d8d9e4;
}

.aav-article-body li {
  margin-bottom: 8px;
}

.aav-article-body a {
  color: #c87fd0;
  text-decoration: underline;
  transition: color 0.3s ease;
}

.aav-article-body a:hover {
  color: #9e23a3;
}

.aav-article-footer {
  background: transparent;
  border-top: 1px solid rgba(255,255,255,0.1);
}

.aav-article-tags {
  text-align: center;
  margin-bottom: 24px;
}

.aav-article-comments {
  background: rgba(255,255,255,0.05);
  border-radius: 12px;
  padding: 24px;
}

/* Mobile optimizations */
@media (max-width: 768px) {
  .aav-article-body {
    padding: 24px;
  }
  
  .aav-abstract-box {
    padding: 16px 20px;
    margin: 24px auto;
  }
}
```

## 📧 Enhanced Contact Form System v3.0

### **Multi-Path Form Structure:**

#### **Path 1: LabOS Pilot**
- Organization details (name, domain, team size)
- Research challenges assessment
- Data sources available (PDFs, notes, spreadsheets, ELN exports)
- Pilot timeline preferences
- Comprehensive lab environment understanding

#### **Path 2: Research Use Case**
- Use case title and description
- Current workflow pain points
- Available inputs and desired outputs
- Impact measurement and success metrics
- Workflow optimization focus

#### **Path 3: Engineering Team**
- Role focus (Full-stack, Backend, Frontend, ML, etc.)
- Portfolio/GitHub links
- Location and availability preferences
- Motivation and unique perspective
- Relevant experience highlights

### **Technical Implementation:**
```html
<!-- Contact Form 7 Structure -->
[radio aav-intent use_label_element default:1 class:aav-intent "Pilot LabOS in our lab" "Share a research use case" "Join the engineering team"]

<!-- Conditional sections with JavaScript -->
<div class="aav-section aav-pilot">...</div>
<div class="aav-section aav-usecase" style="display:none">...</div>
<div class="aav-section aav-engineer" style="display:none">...</div>
```

### **Enhanced Features:**
- **Color-coded sections**: Blue for pilot, teal for use cases, purple for engineering
- **Glassmorphism containers**: Consistent with site design aesthetic
- **Mobile-optimized**: Vertical radio buttons, enhanced touch targets
- **Smooth animations**: JavaScript-powered section transitions
- **Professional validation**: WordPress CSS validator compatible
- **Email routing**: Automatic categorization to ac@aavishkar.ai
- **Lead qualification**: Pre-categorized inquiries for faster response

## 🎥 YouTube Demo Integration

### **Demo Links Across Site:**
- **Header CTA**: "Watch Demo" → https://www.youtube.com/watch?v=j9GWXisJPEk
- **Hero Section**: "LabOS Demo" → https://www.youtube.com/watch?v=j9GWXisJPEk  
- **LabOS Section**: "LabOS Demo" → https://www.youtube.com/watch?v=j9GWXisJPEk

### **Implementation:**
```html
<a class="aav-btn aav-btn-primary aav-btn-labos" href="https://www.youtube.com/watch?v=j9GWXisJPEk" target="_blank" rel="noopener">LabOS Demo ▸</a>
```

### **User Experience Benefits:**
- **Multiple access points** for demo viewing
- **New tab opening** preserves site engagement
- **Consistent messaging** across all demo CTAs
- **Professional external link handling**
