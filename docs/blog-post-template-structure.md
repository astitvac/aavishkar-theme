# Aavishkar.ai Blog Post Template Structure & Best Practices

**Last Updated:** January 2026
**Status:** ✅ COMPREHENSIVE GUIDE - Based on published article analysis
**Version:** 4.0

---

## Table of Contents

1. [Overview](#overview)
2. [Content Structure Best Practices](#content-structure-best-practices)
3. [HTML Content Template](#html-content-template)
4. [Supported HTML Elements Reference](#supported-html-elements-reference)
5. [Content Guidelines](#content-guidelines)
6. [WordPress Implementation Workflow](#wordpress-implementation-workflow)
7. [CSS Customization Guide](#css-customization-guide)
8. [Verification Checklist](#verification-checklist)

---

## Overview

This guide provides comprehensive instructions for creating professional, long-form blog posts on aavishkar.ai. All blog posts follow a consistent structure with glassmorphism styling, purple metallic backgrounds, and responsive typography optimized for readability.

### Published Blog Post Examples

Our published articles demonstrate the content patterns and formatting:
- **[Why a Knowledge IDE?](https://aavishkar.ai/why-a-knowledge-ide/)** - Thought leadership piece
- **[Knowledge IDE Whitepaper](https://aavishkar.ai/knowledge-ide/)** - Technical deep dive
- **[Re-coding the Scientific Method](https://aavishkar.ai/re-coding-the-scientific-method/)** - Conceptual exploration

### Key Features

- **Professional Academic Styling**: Long-form content with clear information hierarchy
- **Glassmorphism Design**: Transparent glass containers with backdrop blur effects
- **Purple Metallic Background**: Consistent with site's design system
- **Responsive Typography**: clamp() functions ensure optimal sizing across devices
- **Rich HTML Formatting**: Code blocks, blockquotes, callouts, dividers, and more
- **Mobile-Optimized**: Enhanced readability with proper spacing and contrast

---

## Content Structure Best Practices

Every successful blog post on aavishkar.ai follows a proven content structure. This section outlines each component and how to use it effectively.

### 1. Executive Summary

**Purpose:** Hook readers with a clear, compelling overview of the article's value.

**Implementation:**
```html
<div class="aav-abstract-box">
  <h3>Executive Summary</h3>
  <p>2-3 sentence overview of the article's main thesis and key takeaways.</p>
</div>
```

**Guidelines:**
- Place immediately after the introduction or as the first element
- Keep to 2-3 sentences (50-100 words maximum)
- Focus on benefits and outcomes, not implementation details
- Make it standalone - readers should understand value without reading full article
- Use direct, clear language

**Example:**
```html
<div class="aav-abstract-box">
  <h3>Executive Summary</h3>
  <p>Modern science faces a paradox: exponential information growth coupled with cognitive bottlenecks in knowledge synthesis. This paper proposes a Knowledge IDE—an integrated environment combining structured knowledge bases, specialized AI agents, and collaborative workspaces—to transform how we create, connect, and validate scientific insights.</p>
</div>
```

---

### 2. Introduction Section

**Purpose:** Establish context, relevance, and set up the problem or topic.

**Structure:**
```html
<h2>Introduction</h2>
<p>Opening paragraph establishing context and relevance...</p>
<p>Supporting paragraph with details and background...</p>
<p>Optional third paragraph setting up the rest of the article...</p>
```

**Guidelines:**
- Start with a broad, relatable statement
- Narrow down to the specific problem or topic
- Explain why this matters now
- Set expectations for what the article will cover
- 200-400 words total

**Example Pattern:**
1. State the challenge or opportunity
2. Provide context with data or examples
3. Introduce the solution or approach
4. Preview the article structure

---

### 3. Main Content Sections

**Purpose:** Develop your argument or explanation through 4-8 major sections.

**Standard Pattern:**
```html
<h2>Section Title</h2>
<p>Opening paragraph establishing the section's focus...</p>
<p>Supporting paragraphs with details and examples...</p>
<ul>
  <li><strong>Key Point 1</strong> - Explanation</li>
  <li><strong>Key Point 2</strong> - Explanation</li>
  <li><strong>Key Point 3</strong> - Explanation</li>
</ul>
<blockquote>Key insight or important principle for emphasis.</blockquote>
<div class="aav-divider"></div>
```

**Section Guidelines:**
- **H2 Headings**: Use for major sections (4-8 per article)
- **H3 Subsections**: Use sparingly for complex sections
- **Paragraph Length**: 3-5 sentences per paragraph maximum
- **Section Length**: 200-400 words per major section
- **Logical Flow**: Each section should build on previous sections

**H2 Heading Best Practices:**
- Make them descriptive, not vague ("The Limits of Existing Tools" vs "Background")
- Use parallel structure (all questions, all statements, etc.)
- Keep to 2-8 words
- Front-load important keywords

---

### 4. Blockquotes

**Purpose:** Emphasize key insights, principles, or takeaways that deserve special attention.

**Implementation:**
```html
<blockquote>
  A compelling insight, key takeaway, or important principle that deserves emphasis. Should be 1-3 sentences maximum.
</blockquote>
```

**When to Use Blockquotes:**
- Core principles or definitions
- Surprising findings or counterintuitive insights
- Transition statements between major concepts
- Summary statements that capture complex ideas

**Guidelines:**
- Use sparingly: 1 blockquote per 2-3 major sections
- Keep to 1-3 sentences
- Should be understandable without surrounding context
- Don't overuse - saves impact for truly important points

**Example:**
```html
<blockquote>In short, the current landscape is defined by a choice between tools that lack integration (each holding a piece of the puzzle) or those that lack intelligence (offering little support for high-level reasoning).</blockquote>
```

---

### 5. Lists

**Purpose:** Break down complex information into scannable, digestible chunks.

**Bullet Lists (Unordered):**
```html
<ul>
  <li><strong>Item Title:</strong> Description and explanation of the concept</li>
  <li><strong>Another Item:</strong> More details about this point</li>
  <li><strong>Third Item:</strong> Additional information</li>
</ul>
```

**Numbered Lists (Ordered):**
```html
<ol>
  <li>First step with clear explanation</li>
  <li>Second step building on the first</li>
  <li>Third step completing the sequence</li>
</ol>
```

**When to Use Each:**
- **Bullet lists**: Related concepts, features, benefits, challenges (no inherent order)
- **Numbered lists**: Sequential steps, ranked items, chronological events

**List Best Practices:**
- **Bold the first phrase** of each bullet for scannability
- Keep list items parallel in structure
- Use 3-7 items per list (not too short, not overwhelming)
- Each item should be roughly equal in importance
- Don't nest lists more than 2 levels deep

---

### 6. Section Dividers

**Purpose:** Create visual breathing room between major sections.

**Implementation:**
```html
<div class="aav-divider"></div>
```

**When to Use:**
- Between major H2 sections
- After blockquotes (to create emphasis)
- Before major topic transitions

**When NOT to Use:**
- After every paragraph (creates visual clutter)
- Within a single cohesive section
- Right before or after headings (headings provide their own visual break)

**Typical Pattern:**
```html
<h2>Section Title</h2>
<p>Content...</p>
<p>More content...</p>
<blockquote>Key insight...</blockquote>
<div class="aav-divider"></div>

<h2>Next Section Title</h2>
```

---

### 7. Links

**Purpose:** Connect readers to related content, sources, and external resources.

**Internal Links:**
```html
<a href="/knowledge-ide/">Knowledge IDE whitepaper</a>
```

**External Links:**
```html
<a href="https://github.com/astitvac/AI4Science" target="_blank" rel="noopener">open-source research</a>
```

**Link Best Practices:**
- **Descriptive Link Text**: Use meaningful phrases ("Knowledge IDE whitepaper" not "click here")
- **Internal Links**: Use relative paths (no target="_blank")
- **External Links**: Always include `target="_blank" rel="noopener"` for security
- **Strategic Placement**: 3-8 links per article (don't over-link)
- **Natural Integration**: Links should flow naturally within sentences

**What to Link To:**
- Related blog posts or pages on your site
- Referenced research papers or studies
- Open-source repositories or demos
- Relevant external resources that add value
- Contact or application pages (in CTA sections)

---

### 8. Next Steps / Call to Action

**Purpose:** Give readers clear next actions and maintain engagement.

**Standard Pattern:**
```html
<h2>Next Steps</h2>
<p>Invitation paragraph explaining what readers can do next...</p>
<p>For [specific audience], <a href="/relevant-page/">specific action</a>. For [another audience], <a href="/alternative-page/">alternative action</a>.</p>
```

**CTA Guidelines:**
- Always include at the end of every article
- Provide 2-3 different action paths for different reader types
- Make actions specific and easy to understand
- Link to relevant resources (contact, whitepaper, demo, GitHub)
- Personalize based on article topic

**Example:**
```html
<h2>Join Us in Reimagining Research</h2>
<p>The Knowledge IDE framework represents a fundamental shift in how we approach scientific discovery. Whether you're a researcher, engineer, or simply someone passionate about advancing human knowledge, there are ways to engage.</p>
<p>For researchers interested in piloting LabOS, <a href="/contact/">contact us</a> to discuss your use case. For engineers excited about building the future of knowledge tools, explore our <a href="https://github.com/astitvac/AI4Science" target="_blank" rel="noopener">open-source research</a> or reach out to join our team.</p>
```

---

## HTML Content Template

Use this ready-to-paste template when creating new blog posts. Copy the entire template, customize the content, and paste into a WordPress Custom HTML block.

```html
<!-- Executive Summary -->
<div class="aav-abstract-box">
  <h3>Executive Summary</h3>
  <p>[2-3 sentence overview of your article's key thesis and main takeaways. Make it compelling and benefit-focused.]</p>
</div>

<!-- Introduction -->
<h2>Introduction</h2>
<p>[Opening paragraph establishing context and relevance. Start broad and relatable.]</p>
<p>[Supporting paragraph with details, data, or examples that illustrate the problem or opportunity.]</p>
<p>[Optional third paragraph that sets up the rest of the article and previews what's to come.]</p>

<div class="aav-divider"></div>

<!-- Main Section 1 -->
<h2>[Your First Major Section Title]</h2>
<p>[Opening paragraph introducing the section's main concept or argument.]</p>
<p>[Supporting paragraph with details, examples, or evidence.]</p>
<p>[Optional third paragraph deepening the explanation or adding nuance.]</p>

<div class="aav-divider"></div>

<!-- Main Section 2 with List -->
<h2>[Your Second Major Section Title]</h2>
<p>[Opening paragraph setting up the list or explaining the category.]</p>

<ul>
  <li><strong>[Point 1 Title]</strong> - Explanation and details about this point.</li>
  <li><strong>[Point 2 Title]</strong> - More details about this concept or feature.</li>
  <li><strong>[Point 3 Title]</strong> - Additional information about this aspect.</li>
  <li><strong>[Point 4 Title]</strong> - Further explanation of this element.</li>
</ul>

<p>[Optional closing paragraph summarizing the list or providing transition.]</p>

<div class="aav-divider"></div>

<!-- Main Section 3 with Blockquote -->
<h2>[Your Third Major Section Title]</h2>
<p>[Opening paragraph introducing a key concept or principle.]</p>
<p>[Supporting paragraph with details and elaboration.]</p>

<blockquote>[A powerful insight, key takeaway, or important principle that deserves special emphasis. Keep to 1-3 sentences.]</blockquote>

<div class="aav-divider"></div>

<!-- Main Section 4 with Subsections -->
<h2>[Your Fourth Major Section Title]</h2>
<p>[Opening paragraph introducing a complex topic that needs subsections.]</p>

<h3>[Subsection A]</h3>
<p>[Explanation of first sub-topic with details and examples.]</p>

<h3>[Subsection B]</h3>
<p>[Explanation of second sub-topic with details and examples.]</p>

<h3>[Subsection C]</h3>
<p>[Explanation of third sub-topic with details and examples.]</p>

<p>[Optional closing paragraph tying subsections together.]</p>

<div class="aav-divider"></div>

<!-- Continue with Additional Sections as Needed -->
<!-- Aim for 4-8 major H2 sections total -->

<h2>[Another Major Section]</h2>
<p>[Content following the patterns above...]</p>

<div class="aav-divider"></div>

<!-- Conclusion / Next Steps -->
<h2>Next Steps</h2>
<p>[Invitation paragraph explaining the opportunity or value of taking action.]</p>
<p>For [specific audience type], <a href="/relevant-internal-page/">specific call to action</a>. For [another audience type], <a href="https://external-resource.com" target="_blank" rel="noopener">alternative action</a>, or <a href="/contact/">get in touch</a> to discuss your unique needs.</p>
```

### Template Customization Tips

1. **Replace all [bracketed placeholders]** with your actual content
2. **Adjust number of sections** - aim for 4-8 major H2 sections
3. **Vary the patterns** - not every section needs a list or blockquote
4. **Add images** if helpful (see Supported Elements for image syntax)
5. **Remove unnecessary dividers** if sections flow naturally without visual breaks
6. **Customize the CTA** based on your article's specific topic and audience

---

## Supported HTML Elements Reference

This section provides a complete reference of all HTML elements styled by the blog post CSS system, with examples and usage guidance.

### Text Formatting

#### Paragraphs
```html
<p>Standard paragraph text with automatic spacing and line-height.</p>
```
**Styling:**
- Font size: 16px
- Line height: 1.8-1.9 (enhanced mobile readability)
- Color: Black (#000000) on light background
- Margin bottom: 16px

**When to Use:** Default text element for all body content

---

#### Bold Text
```html
<strong>Important concept or key term</strong>
```
**Styling:**
- Font weight: 600-700
- Same color as body text
- No additional spacing

**When to Use:**
- Key terms and concepts
- First mention of important ideas
- List item titles
- Making content scannable

---

#### Italic Text
```html
<em>Subtle emphasis or nuance</em>
```
**Styling:**
- Font style: italic
- Same color and weight as body text

**When to Use:**
- Subtle emphasis
- Introducing new terminology
- Book/article titles
- Foreign words or phrases
- Use sparingly for impact

---

#### Links
```html
<!-- Internal link -->
<a href="/internal-page/">Descriptive link text</a>

<!-- External link -->
<a href="https://external.com" target="_blank" rel="noopener">External resource</a>
```
**Styling:**
- Color: Purple (#c87fd0)
- Underlined on hover
- Smooth transition effect

**Best Practices:**
- Use descriptive text (not "click here")
- Internal links: relative paths, no target blank
- External links: include `target="_blank" rel="noopener"`
- 3-8 links per article

---

### Headings

#### H2 - Major Sections
```html
<h2>Major Section Title</h2>
```
**Styling:**
- Font family: dinmedium
- Font size: clamp(24px, 3.8vw, 40px) - responsive
- Color: Black with text shadow
- Margin: 40px top, 16px bottom

**When to Use:**
- Major section breaks (4-8 per article)
- Primary content organization
- Clear topic transitions

---

#### H3 - Subsections
```html
<h3>Subsection Title</h3>
```
**Styling:**
- Font family: dinmedium
- Font size: 22px (fixed)
- Color: Lighter shade
- Margin: 32px top, 12px bottom

**When to Use:**
- Subsections within H2 sections
- Breaking up complex topics
- Use sparingly (not in every section)

---

### Special Containers

#### Executive Summary Box
```html
<div class="aav-abstract-box">
  <h3>Executive Summary</h3>
  <p>Your executive summary content here, 2-3 sentences maximum.</p>
</div>
```
**Styling:**
- Glassmorphism container with purple left border (4px)
- Backdrop blur effect
- Enhanced visibility and prominence
- Padding: 24-32px
- Border radius: 12px
- Max width: 900px centered

**When to Use:**
- Beginning of article (after title, before introduction)
- 2-3 sentence high-level overview
- Should be compelling and standalone

**Visual Appearance:** Light glass container with prominent purple accent border on left side

---

#### Blockquotes
```html
<blockquote>
  A compelling insight, key takeaway, or important principle that deserves emphasis. Keep to 1-3 sentences for maximum impact.
</blockquote>
```
**Styling:**
- Purple left border (4px solid)
- Light purple background
- Larger font size than body text
- Extra padding for emphasis
- Italic styling

**When to Use:**
- Core principles or definitions
- Key insights that deserve highlighting
- Transition statements between major ideas
- 1 blockquote per 2-3 sections (use sparingly)

**Visual Appearance:** Indented text block with purple accent, stands out from regular paragraphs

---

#### Section Divider
```html
<div class="aav-divider"></div>
```
**Styling:**
- Horizontal line with gradient
- Subtle opacity
- Margin: 32px top and bottom
- Full width

**When to Use:**
- Between major H2 sections
- After blockquotes for emphasis
- Before major topic transitions

**When NOT to Use:**
- After every paragraph (creates clutter)
- Right before or after headings

**Visual Appearance:** Thin horizontal line that creates breathing room

---

#### Code Blocks
```html
<!-- Inline code -->
<code>inline code snippet</code>

<!-- Multi-line code block -->
<pre><code>
function example() {
  // Multi-line code
  return true;
}
</code></pre>
```
**Styling:**
- Monospace font
- Light background for inline code
- Scrollable container for long blocks
- Syntax highlighting (via WordPress plugin if available)

**When to Use:**
- Function names, variable names, commands
- Code snippets and examples
- Technical terminology that should stand out

**Visual Appearance:** Monospace text with subtle background highlight

---

#### Callout Boxes
```html
<!-- Info callout -->
<div class="aav-callout aav-callout-info">
  <p>📘 <strong>Info:</strong> Additional context or helpful tip that supplements the main content.</p>
</div>

<!-- Warning callout -->
<div class="aav-callout aav-callout-warning">
  <p>⚠️ <strong>Warning:</strong> Important caveat or consideration that readers should be aware of.</p>
</div>
```
**Styling:**
- Color-coded (blue for info, yellow for warning)
- Icon + bold label + content
- Glassmorphism styling matching site aesthetic
- Border radius and padding

**When to Use:**
- Important tips or pro tips
- Warnings about common pitfalls
- Side notes that don't fit main flow
- Technical requirements or prerequisites

**Visual Appearance:** Colored box that stands apart from main content flow

---

### Lists

#### Unordered (Bullet) Lists
```html
<ul>
  <li>First item without emphasis</li>
  <li><strong>Second item with title:</strong> Additional explanation and details</li>
  <li><strong>Third item with title:</strong> More information about this point</li>
</ul>
```
**Styling:**
- 24px left indent
- 8px spacing between items
- Bullet points auto-styled
- Bold titles create visual hierarchy

**When to Use:**
- Related concepts without inherent order
- Features or benefits
- Challenges or problems
- Requirements or criteria

**Best Practices:**
- 3-7 items per list
- Bold first phrase for scannability
- Keep items parallel in structure

---

#### Ordered (Numbered) Lists
```html
<ol>
  <li>First step in the process</li>
  <li>Second step building on the first</li>
  <li>Third step completing the sequence</li>
</ol>
```
**Styling:**
- Numbers auto-generated
- Same indent and spacing as bullet lists
- Sequential numbering maintained automatically

**When to Use:**
- Step-by-step instructions
- Ranked items (top 5 lists)
- Chronological sequences
- Prioritized actions

---

### Images

#### Standard Image
```html
<img src="/path/to/image.jpg" alt="Descriptive alt text for accessibility" style="max-width: 100%; height: auto; border-radius: 16px; box-shadow: 0 8px 24px rgba(0,0,0,0.15);">
```
**Styling:**
- Responsive (max-width: 100%)
- Rounded corners (16px border radius)
- Shadow for depth
- Centered by default

**Best Practices:**
- Always include descriptive alt text
- Optimize images before upload (under 200KB)
- Recommended width: 1200px for full-width images
- Use JPG for photos, PNG for graphics with transparency

---

#### Image with Caption
```html
<div class="aav-figure">
  <img src="/path/to/image.jpg" alt="Descriptive alt text" style="max-width: 100%; height: auto; border-radius: 16px; box-shadow: 0 8px 24px rgba(0,0,0,0.15);">
  <figcaption><em>Caption text providing context or explanation for the image.</em></figcaption>
</div>
```
**When to Use:**
- Diagrams or screenshots that need explanation
- Data visualizations
- Concept illustrations

**Best Practices:**
- Keep captions concise (1-2 sentences)
- Use italic styling for visual distinction
- Explain what the image shows and why it matters

---

### Tables (Optional)

```html
<table>
  <thead>
    <tr>
      <th>Column 1 Header</th>
      <th>Column 2 Header</th>
      <th>Column 3 Header</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Data 1</td>
      <td>Data 2</td>
      <td>Data 3</td>
    </tr>
    <tr>
      <td>Data 4</td>
      <td>Data 5</td>
      <td>Data 6</td>
    </tr>
  </tbody>
</table>
```

**When to Use:**
- Comparing multiple items across dimensions
- Data that needs structured layout
- Feature comparisons

**Note:** Tables work on mobile but consider using lists for better responsiveness

---

## Content Guidelines

### Article Length

**Recommended Length:**
- **Minimum**: 1500 words (5-7 minute read)
- **Optimal**: 2000-2500 words (8-10 minute read)
- **Maximum**: 3500 words (only exceed with strong justification)

**Why This Matters:**
- Too short: Appears superficial, hurts SEO
- Too long: Reader fatigue, high bounce rates
- Optimal range: Comprehensive without overwhelming

**Length by Article Type:**
- **Thought leadership**: 1500-2000 words
- **Technical deep dive**: 2500-3500 words
- **Case studies**: 1800-2200 words
- **Tutorials**: 2000-3000 words

---

### Tone & Voice

**Core Principles:**
- **Professional but accessible** - Academic rigor without jargon overload
- **Authoritative** - You're the expert, speak with confidence
- **Forward-looking** - Focus on transformation and possibility
- **Practical** - Balance theory with actionable insights

**Specific Guidelines:**

**DO:**
- Use "we" when referring to your team/company
- Use "you" when addressing readers directly
- Explain complex concepts with analogies
- Show enthusiasm for your topic
- Acknowledge limitations and trade-offs

**DON'T:**
- Use unnecessary jargon or buzzwords
- Make unsupported claims
- Write in passive voice excessively
- Use clichés ("game-changer," "paradigm shift")
- Talk down to readers or oversimplify

**Example Comparison:**

❌ **Too Casual:** "This is super cool and totally fixes everything!"
❌ **Too Jargon-Heavy:** "Our enterprise-grade SaaS solution leverages ML ops to synergize..."
✅ **Just Right:** "This approach addresses a fundamental challenge: connecting scattered insights into actionable knowledge."

---

### Section Structure

**Optimal Structure:**
- **4-8 major H2 sections** per article
- **2-4 paragraphs per section** (150-300 words each)
- **1-2 lists per article** for structured information
- **1-3 blockquotes total** for key insights
- **Clear progression** from problem → solution → implications

**Section Flow Patterns:**

**Pattern 1: Problem-Solution**
1. Introduction (context)
2. The Problem (challenges)
3. Why Current Solutions Fall Short
4. Our Approach
5. How It Works
6. Benefits and Impact
7. Next Steps

**Pattern 2: Conceptual Framework**
1. Introduction (big picture)
2. Core Concept Explained
3. Component A
4. Component B
5. Component C
6. Putting It Together
7. Broader Implications
8. Next Steps

**Pattern 3: Deep Dive**
1. Introduction (setup)
2. Background and Context
3. Technical Details Part 1
4. Technical Details Part 2
5. Implementation Considerations
6. Real-World Applications
7. Future Directions
8. Next Steps

---

### Writing Tips

#### Start Strong
**Hook readers in the first 100 words:**
- Lead with a surprising fact or statistic
- Pose a compelling question
- Present a paradox or contradiction
- Paint a vivid scenario

❌ **Weak Opening:** "In this post, we'll talk about knowledge management."
✅ **Strong Opening:** "Modern science faces a paradox: we're producing more information than ever, yet our ability to create new knowledge is bottlenecked."

---

#### Use Concrete Examples
**Make abstract concepts tangible:**
- Real-world scenarios
- Specific numbers and data
- Named case studies
- "Before and after" comparisons

❌ **Abstract:** "Our system improves efficiency."
✅ **Concrete:** "Researchers reduced literature review time from 40 hours to 6 hours per project."

---

#### Bold Key Phrases
**Help scanners find important points:**
- Key terms on first mention
- List item titles
- Important concepts
- Data points that deserve attention

**Example:**
"The Knowledge Base transforms scattered information into an organized, **queryable asset**—a **digital twin** of a team's knowledge."

---

#### Vary Sentence Length
**Create rhythm and maintain engagement:**
- Short punchy sentences for emphasis
- Longer explanatory sentences for nuance
- Mix of simple and complex structures

**Example:**
"This is a problem. [Short] Traditional tools force researchers to act as human middleware, manually bridging gaps between disconnected systems. [Long] The result? [Short] Wasted time and lost insights. [Short]"

---

#### Use Active Voice
**Make writing direct and engaging:**

❌ **Passive:** "The system was designed by our team to address these challenges."
✅ **Active:** "We designed the system to address these challenges."

❌ **Passive:** "Insights are generated by specialized AI agents."
✅ **Active:** "Specialized AI agents generate insights."

**When Passive is OK:**
- When the actor is unknown or irrelevant
- In scientific/technical descriptions
- To emphasize the receiver of action

---

#### Avoid Buzzwords
**Red Flag Words:**
- Synergy, leverage (as a verb)
- Paradigm shift, game-changer
- Revolutionary (unless truly justified)
- Best-in-class, world-class
- Cutting-edge, bleeding-edge
- Ecosystem, space (industry)

**Better Alternatives:**
- Instead of "leverage": use, utilize, apply
- Instead of "paradigm shift": fundamental change, new approach
- Instead of "game-changer": significant improvement, major advancement

---

#### Visual Formatting

**Paragraph Breaks:**
- Maximum 3-5 sentences per paragraph
- Break up long paragraphs even if conceptually related
- One idea per paragraph

**White Space:**
- Don't create walls of text
- Use lists to break up dense information
- Add dividers between major sections

**Scanability:**
- Bold important concepts
- Use descriptive headings
- Lead with key information

---

### SEO Considerations

**Title Optimization:**
- 50-60 characters ideal
- Include primary keyword
- Make it compelling, not just descriptive

**Meta Description (Excerpt):**
- 150-160 characters
- Include primary keyword naturally
- Include a call to action or benefit

**Header Structure:**
- One H1 (post title - automatic)
- Multiple H2s for main sections
- Occasional H3s for subsections
- Logical hierarchy

**Internal Linking:**
- Link to 2-4 related posts/pages
- Use descriptive anchor text
- Link naturally within content flow

**External Linking:**
- Link to authoritative sources
- Support claims with data/research
- Use `rel="noopener"` for external links

---

## WordPress Implementation Workflow

This section provides step-by-step instructions for publishing blog posts on the aavishkar.ai WordPress site.

### Step 1: Create New Post

1. **Navigate to Posts**
   - WordPress Admin Dashboard
   - Posts → Add New

2. **Enter Post Title**
   - This becomes the `.aav-article-title`
   - 50-60 characters ideal
   - Include primary keyword
   - Make it compelling and clear

3. **Write Excerpt**
   - Right sidebar → Excerpt panel
   - 150-160 characters
   - Used in post listings and search results
   - Include primary keyword naturally
   - Make it benefit-focused

**Example Excerpt:**
"Modern science produces more information than ever, yet our ability to synthesize knowledge is bottlenecked. Discover how a Knowledge IDE can transform scientific discovery through integrated AI and structured knowledge."

---

### Step 2: Add Featured Image

1. **Click "Set featured image"**
   - Located in right sidebar
   - Opens media library

2. **Upload Image**
   - **Recommended size**: 1200px × 630px (social sharing optimized)
   - **Minimum width**: 600px
   - **Format**: JPG for photos, PNG for graphics
   - **File size**: Under 200KB (optimize before upload)

3. **Optimize Image** (before uploading)
   - Use tools like TinyPNG or ImageOptim
   - Compress without losing quality
   - Rename file descriptively (no spaces)

4. **Add Alt Text**
   - Describe image for accessibility
   - Include keywords naturally
   - Be specific and descriptive

5. **Set as Featured Image**
   - Click "Set featured image" button
   - Image appears in post listings and at top of post

**Featured Image Best Practices:**
- Use high-quality, relevant images
- Avoid generic stock photos
- Custom graphics or diagrams work well
- Ensure good contrast for text overlay (if used)

---

### Step 3: Create Content with HTML Block

1. **Add HTML Block**
   - In editor, click "+" button to add block
   - Search for "Custom HTML" or "HTML"
   - Block appears in editor

2. **Paste HTML Content**
   - Use template from [HTML Content Template](#html-content-template)
   - Or adapt from `theme/partials/blog-post-html-template.html`
   - Paste entire HTML structure

3. **Customize Content**
   - Replace all [placeholder text]
   - Keep CSS classes intact
   - Maintain HTML structure
   - Don't remove structural divs

4. **Preview to Verify**
   - Click "Preview" button (top right)
   - Check formatting renders correctly
   - Verify all elements display properly
   - Test on mobile view

**Common Issues:**
- Missing closing tags → Breaks layout
- Removed CSS classes → Styling doesn't apply
- Broken image paths → Images don't display
- Unclosed blockquotes → Formatting extends too far

---

### Step 4: Assign Categories & Tags

**Categories** (Right Sidebar)

Available categories:
- **Featured** - Highlighted articles (use sparingly, max 3-5 posts)
- **Deep Dive** - Long-form technical content (2000+ words)
- **Blog** - Standard articles and thought leadership
- **Announcement** - Company news and updates (if applicable)

**Best Practices:**
- Choose 1 primary category
- Can use multiple if truly applicable
- "Featured" should be reserved for best content

---

**Tags** (Right Sidebar)

**How to Add:**
- Type tag name in tags field
- Press Enter to add
- Use existing tags when possible (auto-suggest appears)

**Recommended Tags:**
- 3-5 tags per post
- Use existing tags for consistency
- Create new tags only if truly needed

**Example Tags for Aavishkar:**
- LLMs, Knowledge IDE, Research, Enterprise
- Scientific Method, AI Agents, Knowledge Graph
- Lab OS, Hypothesis, Discovery
- Academic, Technical, Whitepaper

**Tag Strategy:**
- **Topic tags**: What the post is about (LLMs, Knowledge IDE)
- **Audience tags**: Who it's for (Researchers, Engineers)
- **Format tags**: Type of content (Deep Dive, Tutorial)

---

### Step 5: Configure Post Settings

**Author** (Right Sidebar)
- Set to "aavishkar" or "astitva"
- Maintains consistent voice
- Shows in post meta

**Publish Date** (Right Sidebar)
- **Publish immediately**: Uses current date/time
- **Schedule**: Choose future date for scheduled publishing
- Best practice: Publish during business hours (9 AM - 5 PM local time)

**URL Slug** (Right Sidebar → Permalink)
- Auto-generated from title
- Can customize if needed
- Keep it short and descriptive
- Use hyphens, not underscores
- Example: `/why-knowledge-ide/`

**Visibility** (Right Sidebar)
- **Public**: Visible to everyone (default for blog posts)
- **Private**: Only visible to admins
- **Password Protected**: Requires password

**Discussion** (Right Sidebar - if available)
- Allow comments (if enabled site-wide)
- Can disable for specific posts

---

### Step 6: Preview & Publish

**Preview Checklist:**

1. **Click "Preview"** (top right)
   - Opens preview in new tab
   - Shows how post will look live

2. **Visual Check:**
   - [ ] Title displays correctly and is prominent
   - [ ] Featured image appears and looks good
   - [ ] Executive summary box renders with glass effect
   - [ ] All headings are properly sized and styled
   - [ ] Paragraphs have proper spacing
   - [ ] Lists are formatted correctly with bullets/numbers
   - [ ] Blockquotes stand out with purple border
   - [ ] Section dividers create appropriate spacing
   - [ ] Images display and are properly sized

3. **Functionality Check:**
   - [ ] All links work (click each one)
   - [ ] External links open in new tab
   - [ ] Internal links stay in same tab
   - [ ] No broken images or 404 errors

4. **Mobile Check:**
   - [ ] Responsive text sizing looks good
   - [ ] Images scale properly
   - [ ] Spacing is comfortable, not cramped
   - [ ] Buttons and links are easy to tap
   - [ ] No horizontal scrolling

5. **Content Check:**
   - [ ] No typos or grammatical errors
   - [ ] All placeholder text replaced
   - [ ] No broken formatting
   - [ ] Code blocks (if any) are readable

**If Everything Looks Good:**

1. **Click "Publish"** (top right)
2. **Confirm publish** in dialog

**Post-Publish Actions:**

Immediately after publishing, clear all caches:

1. **Divi Cache:**
   - Divi → Theme Options → Builder → Advanced
   - Static CSS File Generation → Click "Clear"

2. **WP Rocket Cache:**
   - WP Rocket → Dashboard
   - Click "Clear cache"
   - Click "Clear Used CSS" (if available)

3. **Browser Cache:**
   - Hard refresh: Ctrl+F5 (Windows) or Cmd+Shift+R (Mac)
   - Or open in incognito/private window

4. **Verify Live:**
   - Visit published post URL
   - Confirm everything displays correctly
   - Test on actual mobile device if possible

---

### Troubleshooting Common Issues

**Issue: Styling doesn't appear**
- **Solution**: Clear Divi static CSS and WP Rocket caches
- **Prevention**: Always clear caches after publishing

**Issue: Featured image doesn't show**
- **Solution**: Ensure image is set as featured image, not just uploaded
- **Prevention**: Double-check in right sidebar before publishing

**Issue: Links don't work**
- **Solution**: Check for typos in URLs, ensure proper http:// or https://
- **Prevention**: Test all links in preview

**Issue: Mobile formatting broken**
- **Solution**: Check for missing closing tags, validate HTML structure
- **Prevention**: Use provided template, don't modify structural elements

**Issue: Text color wrong (white instead of black)**
- **Solution**: May be viewing in Visual Builder or signed-in admin view
- **Prevention**: Check in incognito window for true front-end appearance

---

## CSS Customization Guide

All blog post styling is centralized in `theme/style.css`. This section explains the CSS architecture and how to customize if needed.

### CSS File Location

**Primary CSS:** `theme/style.css` (lines 1270-1823)
- Contains all blog post-specific styles
- Automatically loaded on all pages
- Version controlled with theme

**Enhancement CSS:** Divi → Theme Options → Custom CSS
- Page background styles
- Additional site-wide enhancements
- Separate from theme CSS for easy updates

---

### Available CSS Classes

**Main Containers:**
```css
.aav-article-header      /* Header section wrapper */
.aav-article             /* Main content wrapper */
.aav-article-body        /* Content container with glass effect */
.aav-article-footer      /* Footer section wrapper */
```

**Typography:**
```css
.aav-article-title       /* Post title (40-64px responsive) */
.aav-article-meta        /* Author, date, categories display */
.aav-author-name         /* Author name styling */
.aav-article-date        /* Publish date styling */
```

**Special Elements:**
```css
.aav-abstract-box        /* Executive summary glass box */
.aav-divider             /* Section separator line */
.aav-featured-image      /* Featured image styling */
.aav-code                /* Code block styling */
.aav-callout             /* Callout container */
.aav-callout-info        /* Info callout (blue) */
.aav-callout-warning     /* Warning callout (yellow) */
.aav-toc                 /* Table of contents (optional) */
.aav-article-tags        /* Post tags display */
```

---

### Adding Custom Styles

**Method 1: Inline Styles (Quick fixes)**

Add directly in HTML block:
```html
<div style="text-align: center; padding: 20px; background: rgba(255,255,255,0.05);">
  Custom content here
</div>
```

**When to Use:**
- One-off styling for specific post
- Quick visual adjustments
- Testing before adding to CSS

**Limitations:**
- Not reusable across posts
- Harder to maintain
- Can be overridden by theme CSS

---

**Method 2: Custom CSS Classes (Recommended)**

Add to Divi → Theme Options → Custom CSS:
```css
/* Custom callout for specific use case */
.my-custom-callout {
  background: linear-gradient(135deg, rgba(11,68,123,0.15), rgba(158,35,163,0.15));
  border-left: 4px solid #0b447b;
  padding: 24px;
  border-radius: 12px;
  margin: 24px 0;
}

/* Custom list styling */
.aav-article-body .checklist li {
  list-style: none;
  padding-left: 32px;
  position: relative;
}

.aav-article-body .checklist li:before {
  content: "✓";
  position: absolute;
  left: 0;
  color: #9e23a3;
  font-weight: bold;
}
```

Then use in HTML:
```html
<div class="my-custom-callout">
  <p>Custom styled content</p>
</div>

<ul class="checklist">
  <li>Item with custom checkmark</li>
  <li>Another item</li>
</ul>
```

**When to Use:**
- Styling needed across multiple posts
- Complex custom components
- Maintaining design consistency

---

### Mobile Optimization

The blog system automatically handles mobile optimization. **Avoid overriding unless necessary.**

**Auto-Responsive Features:**
```css
/* These are already implemented */
@media (max-width: 768px) {
  .aav-article-body {
    padding: 24px;              /* Reduced from 48px */
    backdrop-filter: blur(8px); /* Reduced from 12px for performance */
  }

  .aav-article-title {
    font-size: clamp(40px, 8vw, 48px); /* Scales with viewport */
  }

  .aav-abstract-box {
    padding: 16px 20px;         /* Reduced from 24px 32px */
    margin: 24px auto;          /* Reduced from 32px auto */
  }
}
```

**Mobile Considerations:**
- **Reduced padding**: More content visible on small screens
- **Optimized blur**: Less blur for better mobile performance
- **Responsive fonts**: clamp() ensures readability across devices
- **Touch targets**: Buttons and links sized for finger taps (minimum 44px)

**Don't Override:**
- Font size scaling (unless broken)
- Padding reductions (unless too cramped)
- Blur optimizations (performance)

---

### Performance Optimization

**Current Optimizations (Already Implemented):**

1. **CSS Containment:**
```css
.aav-article-body {
  contain: layout style;  /* Isolates rendering */
}
```

2. **Hardware Acceleration:**
```css
.aav-abstract-box {
  will-change: transform;  /* GPU rendering */
  transform: translateZ(0); /* Force GPU layer */
}
```

3. **Reduced Blur on Mobile:**
```css
@media (max-width: 768px) {
  backdrop-filter: blur(8px); /* Instead of 12px */
}
```

**Best Practices:**
- Don't add excessive shadows (limit to 2-3 per element)
- Avoid complex gradients with many color stops
- Minimize backdrop-filter usage (expensive operation)
- Use transform for animations, not position/width/height

---

### Color Customization

**Brand Colors (Already Defined):**
```css
/* Primary Purple */
--purple-primary: #9e23a3;

/* Deep Purple */
--purple-deep: #6f2dbd;

/* Pink Highlight */
--pink-highlight: #c87fd0;

/* Blue Accent */
--blue-accent: #0b447b;
```

**Note:** WordPress strips CSS custom properties, so use direct values:

```css
/* Correct for WordPress */
.my-element {
  color: #9e23a3;
  background: linear-gradient(135deg, #6f2dbd, #9e23a3);
}

/* Incorrect - will be stripped */
.my-element {
  color: var(--purple-primary);
}
```

---

### Typography Customization

**Font Families:**
```css
font-family: dinmedium, Arial, sans-serif;      /* Headlines */
font-family: din1451, gill-sans, sans-serif;    /* Body text */
font-family: dinalternate, Arial, sans-serif;   /* Special uses */
```

**Responsive Typography Pattern:**
```css
font-size: clamp(minimum, preferred, maximum);

/* Examples */
font-size: clamp(16px, 2vw, 20px);  /* Body text */
font-size: clamp(24px, 4vw, 40px);  /* H2 headings */
font-size: clamp(40px, 6vw, 64px);  /* Article title */
```

**How clamp() Works:**
- **minimum**: Size at smallest viewport
- **preferred**: Scales with viewport (2vw, 4vw, etc.)
- **maximum**: Size at largest viewport

---

## Verification Checklist

Use this checklist before and after publishing each blog post.

### Content Quality

- [ ] **Executive summary is clear and compelling**
  - 2-3 sentences maximum
  - Captures key value proposition
  - Standalone and understandable

- [ ] **Introduction hooks the reader**
  - Opens with compelling statement
  - Establishes relevance
  - Sets up the rest of article

- [ ] **Sections flow logically**
  - Clear progression of ideas
  - Smooth transitions between sections
  - Each section builds on previous

- [ ] **Blockquotes emphasize key insights**
  - Used sparingly (1-3 total)
  - Genuinely important points
  - Standalone comprehensible

- [ ] **Lists break up dense information**
  - 3-7 items per list
  - Bold titles for scannability
  - Parallel structure

- [ ] **Links work correctly**
  - All links tested and functional
  - Internal links use relative paths
  - External links open in new tab
  - Descriptive anchor text

- [ ] **CTA is clear and actionable**
  - Multiple options for different audiences
  - Specific actions, not vague suggestions
  - Links to relevant resources

---

### Formatting

- [ ] **All HTML elements render correctly**
  - Executive summary box displays
  - Headings sized properly
  - Lists formatted correctly
  - Blockquotes styled with purple border

- [ ] **Images display properly**
  - Featured image appears
  - All inline images load
  - Images scale responsively
  - Alt text provided

- [ ] **Code blocks are formatted** (if applicable)
  - Monospace font
  - Proper indentation
  - Scrollable if needed

- [ ] **Spacing looks good**
  - Not too cramped
  - Not too sparse
  - Consistent throughout
  - Dividers in appropriate places

- [ ] **No broken styling**
  - No missing closing tags
  - CSS classes applied correctly
  - Glass effects visible
  - Colors display properly

---

### Technical

- [ ] **Featured image appears**
  - Set in right sidebar
  - Displays in post header
  - Shows in post listings
  - Optimized file size (under 200KB)

- [ ] **Categories/tags assigned**
  - At least 1 category selected
  - 3-5 relevant tags added
  - Using existing tags when possible

- [ ] **Author is correct**
  - Set to "aavishkar" or "astitva"
  - Displays in post meta

- [ ] **Excerpt is set**
  - 150-160 characters
  - Compelling and benefit-focused
  - Includes primary keyword

- [ ] **Mobile view looks good**
  - Text readable without zooming
  - Images scale properly
  - Spacing comfortable
  - No horizontal scrolling
  - Touch targets adequate size

- [ ] **Links open correctly**
  - Internal links: same tab
  - External links: new tab
  - All URLs valid and working

---

### Performance

- [ ] **Caches cleared**
  - Divi Static CSS cleared
  - WP Rocket cache cleared
  - WP Rocket Used CSS cleared
  - Browser hard refresh performed

- [ ] **Page loads quickly**
  - Under 3 seconds on desktop
  - Under 5 seconds on mobile
  - No console errors

- [ ] **No console errors**
  - Check browser console (F12)
  - No JavaScript errors
  - No missing resources (404s)

- [ ] **Images optimized**
  - Featured image under 200KB
  - Inline images compressed
  - Appropriate dimensions (not oversized)
  - Correct format (JPG for photos, PNG for graphics)

---

### SEO

- [ ] **Title is descriptive**
  - 50-60 characters
  - Includes primary keyword
  - Compelling, not just descriptive
  - Unique (not duplicate)

- [ ] **Excerpt includes keywords**
  - 150-160 characters
  - Primary keyword included naturally
  - Compelling call to action or benefit
  - Unique meta description

- [ ] **H2 structure is logical**
  - Multiple H2 headings (4-8)
  - Descriptive, not vague
  - Proper hierarchy (no H3 before H2)

- [ ] **Internal links to related content**
  - 2-4 internal links per post
  - Links to relevant pages/posts
  - Descriptive anchor text
  - Natural integration in content

- [ ] **Alt text on featured image**
  - Descriptive and specific
  - Includes keywords naturally
  - Accessible for screen readers

---

### Final Publication Check

**Before clicking "Publish":**

1. **Preview one more time**
   - Review entire post in preview mode
   - Check on actual mobile device if possible
   - Verify nothing was missed

2. **Spell check and grammar**
   - Use browser spell check
   - Read through for flow
   - Check for typos in headings (most visible)

3. **Verify all placeholders replaced**
   - No [bracketed text] remaining
   - No "Lorem ipsum" or dummy content
   - All sections customized

**After clicking "Publish":**

1. **Clear all caches** (see Step 6 above)
2. **Visit live URL** and verify appearance
3. **Test on mobile device** (not just desktop responsive view)
4. **Share with team** for final review (optional)

---

## Appendix: Quick Reference

### Common HTML Patterns

**Section with List:**
```html
<h2>Section Title</h2>
<p>Intro paragraph.</p>
<ul>
  <li><strong>Point 1</strong> - Details</li>
  <li><strong>Point 2</strong> - Details</li>
</ul>
<div class="aav-divider"></div>
```

**Section with Blockquote:**
```html
<h2>Section Title</h2>
<p>First paragraph.</p>
<p>Second paragraph.</p>
<blockquote>Key insight.</blockquote>
<div class="aav-divider"></div>
```

**Section with Image:**
```html
<h2>Section Title</h2>
<p>Intro paragraph.</p>
<div class="aav-figure">
  <img src="/path/to/image.jpg" alt="Description" style="max-width: 100%; height: auto; border-radius: 16px; box-shadow: 0 8px 24px rgba(0,0,0,0.15);">
  <figcaption><em>Image caption</em></figcaption>
</div>
<p>Follow-up paragraph.</p>
<div class="aav-divider"></div>
```

---

### File Locations

**Documentation:**
- This guide: `docs/blog-post-template-structure.md`
- Main guide: `docs/Building_aavishkar_site.md`

**Templates:**
- HTML template: `theme/partials/blog-post-html-template.html`
- Example whitepaper: `theme/partials/whitepaper-content.html`

**Styles:**
- Main CSS: `theme/style.css` (lines 1270-1823)
- Theme CSS: WordPress → Child Theme → style.css

**Functions:**
- Partials system: `theme/functions.php`

---

### Support Resources

**For Questions:**
- Review published examples on aavishkar.ai/blog
- Check `CLAUDE.md` for architectural guidance
- Refer to `Building_aavishkar_site.md` for design system

**For Bugs:**
- Clear all caches first (Divi + WP Rocket + Browser)
- Check browser console for errors (F12)
- Verify HTML structure is intact
- Test in incognito/private window

---

**End of Guide**

**Last Updated:** January 2026
**Version:** 4.0
**Status:** ✅ Complete and Ready to Use
