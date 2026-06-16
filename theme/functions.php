<?php
function divi__child_theme_enqueue_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'divi__child_theme_enqueue_styles' );


function render_deep_dive_layout() {
    ob_start();  // Start output buffering
    ?>
   
    <div class="container">
        <div class="row px-md-5  cd-flex justify-content-between">
            <?php
            // Query for posts from the "deep-dive" category
            $args = array(
                'category_name'   => 'deep-dive',  // Category slug
                'posts_per_page'  => 6,            // Number of posts to display
            );
            $query = new WP_Query($args);
            
            $row_classes = ['custom-row', 'custom-row1'];
          $border_colors = ['#7994e5', '#a116aa', '#a116aa', '#0f4479', '#7144c5', '#0f4479'];
            $count = 0;

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $row_class = $row_classes[$count % count($row_classes)];
                    $border_color = $border_colors[$count % count($border_colors)];
                    $align_class = ($count % 2 == 0) ? '' : 'justify-content-end';
            ?>
                <div class="col-md-5 <?php echo esc_attr($row_class); ?> d-flex <?php echo esc_attr($align_class); ?>" style="border-top: 5px solid <?php echo esc_attr($border_color); ?>;">
                    <div class="content-wrapper">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" style="border: 1px solid #0b447b; border-radius: 15px;">
                        <?php else : ?>
                            <img src="https://via.placeholder.com/140" alt="Placeholder" style="border: 1px solid #0b447b; border-radius: 5px;">
                        <?php endif; ?>
                        <div class="text-content text-start">
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                            <a href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    </div>
                </div>
            <?php
                    $count++;
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No posts found.</p>';
            endif;
            ?>
        </div>
    </div>

    <?php
    return ob_get_clean();  // Return the buffered content
}

// Register the shortcode
add_shortcode('deep_dive_layout', 'render_deep_dive_layout');


// Register the shortcode
//add_shortcode('deep_dive_layout', 'render_deep_dive_layout');


function add_tags_to_notebook() {
    register_taxonomy_for_object_type('post_tag', 'notebook'); // Enable tags for "notebook"
}
add_action('init', 'add_tags_to_notebook');


/* ==========================================================================
   HTML PARTIALS SYSTEM
   Enables Git-to-WordPress content sync via WP Pusher
   ========================================================================== */

/**
 * Load HTML partial from theme partials directory
 * Usage in Divi Code module: <?php aav_partial('proofline-hero'); ?>
 *
 * @param string $name The name of the partial (without .html extension)
 */
function aav_partial($name) {
    $file = get_stylesheet_directory() . '/partials/' . sanitize_file_name($name) . '.html';
    if (file_exists($file)) {
        include($file);
    } else {
        echo '<!-- Partial not found: ' . esc_html($name) . ' -->';
        if (current_user_can('edit_posts')) {
            echo '<!-- Debug: Looking for file at ' . esc_html($file) . ' -->';
        }
    }
}

/**
 * Shortcode version for Text modules (where PHP isn't executed)
 * Usage: [aav_partial name="proofline-hero"]
 *
 * @param array $atts Shortcode attributes
 * @return string The partial content or error message
 */
function aav_partial_shortcode($atts) {
    $atts = shortcode_atts(array(
        'name' => '',
    ), $atts, 'aav_partial');

    if (empty($atts['name'])) {
        return '<!-- aav_partial: name attribute required -->';
    }

    $file = get_stylesheet_directory() . '/partials/' . sanitize_file_name($atts['name']) . '.html';

    if (file_exists($file)) {
        ob_start();
        include($file);
        return ob_get_clean();
    }

    $error = '<!-- Partial not found: ' . esc_html($atts['name']) . ' -->';
    if (current_user_can('edit_posts')) {
        $error .= '<!-- Debug: Looking for file at ' . esc_html($file) . ' -->';
    }
    return $error;
}
add_shortcode('aav_partial', 'aav_partial_shortcode');

/**
 * List available partials (admin helper)
 * Usage: [aav_list_partials] - Shows available partials for logged-in admins
 */
function aav_list_partials_shortcode() {
    if (!current_user_can('edit_posts')) {
        return '';
    }

    $partials_dir = get_stylesheet_directory() . '/partials/';
    if (!is_dir($partials_dir)) {
        return '<!-- Partials directory not found -->';
    }

    $files = glob($partials_dir . '*.html');
    if (empty($files)) {
        return '<!-- No partials found in ' . esc_html($partials_dir) . ' -->';
    }

    $output = '<div style="background:#f0f0f0;padding:15px;margin:10px 0;border-radius:8px;font-family:monospace;">';
    $output .= '<strong>Available Partials:</strong><br>';
    foreach ($files as $file) {
        $name = basename($file, '.html');
        $output .= '• <code>[aav_partial name="' . esc_html($name) . '"]</code><br>';
    }
    $output .= '</div>';

    return $output;
}
add_shortcode('aav_list_partials', 'aav_list_partials_shortcode');

/**
 * OUR THINKING - Dynamic article cards from published posts
 * Usage: [thinking_hub]
 * Displays 6 most recent published posts from Featured, Deep Dive, or Insights categories
 */
function render_thinking_hub() {
    // Query only published posts from relevant categories
    $args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish', // Only published posts
        'posts_per_page' => 6,
        'category_name'  => 'featured,deep-dive,insights', // Multiple categories
        'orderby'        => 'date',
        'order'          => 'DESC'
    );

    $query = new WP_Query($args);

    // If no posts found, show placeholder
    if (!$query->have_posts()) {
        return '<div class="aav-thinking-placeholder"><p>Our research insights are coming soon. Check back weekly for new discoveries.</p></div>';
    }

    ob_start();
    ?>
    <div class="aav-thinking-grid">
        <?php
        $index = 0;
        while ($query->have_posts()) : $query->the_post();
            // Get primary category
            $categories = get_the_category();
            $primary_category = !empty($categories) ? esc_html($categories[0]->name) : 'Insights';
            $category_slug = !empty($categories) ? esc_attr($categories[0]->slug) : 'insights';

            // Calculate reading time (200 words per minute)
            $content = get_post_field('post_content', get_the_ID());
            $word_count = str_word_count(strip_tags($content));
            $reading_time = max(1, ceil($word_count / 200)); // Minimum 1 minute
        ?>
        <article class="aav-thinking-card">
            <div class="aav-thinking-card-image">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                <?php else : ?>
                    <!-- Fallback gradient if no featured image -->
                    <div style="width:100%;height:100%;background:linear-gradient(135deg,rgba(158,35,163,0.4),rgba(11,68,123,0.4));"></div>
                <?php endif; ?>
                <div class="aav-thinking-card-category" data-category="<?php echo $category_slug; ?>">
                    <?php echo $primary_category; ?>
                </div>
            </div>
            <div class="aav-thinking-card-content">
                <h3 class="aav-thinking-card-title"><?php the_title(); ?></h3>
                <p class="aav-thinking-card-excerpt">
                    <?php
                    $excerpt = get_the_excerpt();
                    if (empty($excerpt)) {
                        // Generate excerpt from content if none set
                        $excerpt = wp_trim_words(strip_tags($content), 20, '...');
                    }
                    echo esc_html($excerpt);
                    ?>
                </p>
                <div class="aav-thinking-card-meta">
                    <span class="aav-thinking-date"><?php echo get_the_date('F Y'); ?></span>
                    <span class="aav-thinking-readtime"><?php echo $reading_time; ?> min read</span>
                </div>
                <a href="<?php the_permalink(); ?>" class="aav-thinking-card-link">Read Insight</a>
            </div>
        </article>
        <?php
        $index++;
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('thinking_hub', 'render_thinking_hub');

/**
 * ARTICLE CATALOGUE - All published posts (no limit)
 * Usage: [article_catalogue]
 * Displays all published posts from Featured, Deep Dive, or Insights categories.
 * Reuses .aav-thinking-card / .aav-thinking-grid CSS pattern for consistency.
 */
function render_article_catalogue() {
    $args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'category_name'  => 'featured,deep-dive,insights',
        'orderby'        => 'date',
        'order'          => 'DESC'
    );

    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        return '<p style="color:#d6d8ef;text-align:center;">No articles published yet.</p>';
    }

    ob_start();
    ?>
    <div class="aav-thinking-grid">
        <?php
        while ($query->have_posts()) : $query->the_post();
            $categories = get_the_category();
            $primary_category = !empty($categories) ? esc_html($categories[0]->name) : 'Insights';
            $category_slug = !empty($categories) ? esc_attr($categories[0]->slug) : 'insights';

            $content = get_post_field('post_content', get_the_ID());
            $word_count = str_word_count(strip_tags($content));
            $reading_time = max(1, ceil($word_count / 200));
        ?>
        <article class="aav-thinking-card">
            <div class="aav-thinking-card-image">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                <?php else : ?>
                    <div style="width:100%;height:100%;background:linear-gradient(135deg,rgba(158,35,163,0.4),rgba(11,68,123,0.4));"></div>
                <?php endif; ?>
                <div class="aav-thinking-card-category" data-category="<?php echo $category_slug; ?>">
                    <?php echo $primary_category; ?>
                </div>
            </div>
            <div class="aav-thinking-card-content">
                <h3 class="aav-thinking-card-title"><?php the_title(); ?></h3>
                <p class="aav-thinking-card-excerpt">
                    <?php
                    $excerpt = get_the_excerpt();
                    if (empty($excerpt)) {
                        $excerpt = wp_trim_words(strip_tags($content), 20, '...');
                    }
                    echo esc_html($excerpt);
                    ?>
                </p>
                <div class="aav-thinking-card-meta">
                    <span class="aav-thinking-date"><?php echo get_the_date('F Y'); ?></span>
                    <span class="aav-thinking-readtime"><?php echo $reading_time; ?> min read</span>
                </div>
                <a href="<?php the_permalink(); ?>" class="aav-thinking-card-link">Read Insight</a>
            </div>
        </article>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('article_catalogue', 'render_article_catalogue');

/**
 * Add noindex meta tag to unlisted pages
 * Prevents search engine indexing for privacy policy and other sensitive pages
 *
 * IMPORTANT: Replace XXXX with actual page ID after WordPress page creation
 * Example: If Privacy Policy page ID is 3125, change array(XXXX) to array(3125)
 */
function aav_add_noindex_to_unlisted_pages() {
    // List of page IDs that should not be indexed
    $unlisted_page_ids = array(
        3085  // Privacy Policy page (/proofline/privacy)
    );

    if (is_page($unlisted_page_ids)) {
        echo '<meta name="robots" content="noindex, nofollow">' . "\n";
    }
}
add_action('wp_head', 'aav_add_noindex_to_unlisted_pages', 1);

/* ==========================================================================
   SEO: META TAGS, OPEN GRAPH, TWITTER CARDS
   ========================================================================== */

function aav_seo_meta_tags() {
    $site_name = 'Aavishkar.ai';
    $default_image = 'https://aavishkar.ai/wp-content/uploads/2025/05/aavishkar_logo.png';

    // Page-specific meta
    if (is_front_page()) {
        $title = 'Aavishkar AI — AI for Science | Discover New Knowledge with AI';
        $description = 'Aavishkar AI builds tools for scientific discovery — helping research teams capture, connect, and create new knowledge with AI. Founded by Astitva Chopra and Akshay Rao. Explore Proofline, our knowledge engine for R&D teams.';
        $canonical = home_url('/');
        $og_type = 'website';
    } elseif (is_page(2952)) {
        $title = 'Proofline AI — Scientific Knowledge Engine for Research Teams | Aavishkar AI';
        $description = 'Proofline is an AI-powered knowledge engine for research teams. Capture hypotheses, evidence, and decisions — discover new insights with AI. Free for Founding Labs. Built by Aavishkar AI.';
        $canonical = home_url('/proofline/');
        $og_type = 'website';
    } elseif (is_page() && get_page_uri() === 'contact-us') {
        $title = 'About & Contact | Aavishkar AI — AI for Science';
        $description = 'Meet the Aavishkar AI team — Astitva Chopra, Akshay Rao, and team building AI for science. Get in touch about Proofline, research partnerships, or careers.';
        $canonical = home_url('/contact-us/');
        $og_type = 'website';
    } elseif (is_singular('post')) {
        $title = get_the_title() . ' | Aavishkar.ai';
        $excerpt = get_the_excerpt();
        if (empty($excerpt)) {
            $excerpt = wp_trim_words(strip_tags(get_the_content()), 25, '...');
        }
        $description = wp_strip_all_tags($excerpt);
        if (strlen($description) > 160) {
            $description = substr($description, 0, 157) . '...';
        }
        $canonical = get_permalink();
        $og_type = 'article';
        if (has_post_thumbnail()) {
            $default_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
        }
    } else {
        return; // No custom meta for other pages
    }

    // Meta description
    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";

    // Canonical
    echo '<link rel="canonical" href="' . esc_url($canonical) . '">' . "\n";

    // Open Graph
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($default_image) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($canonical) . '">' . "\n";
    echo '<meta property="og:type" content="' . esc_attr($og_type) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '">' . "\n";

    // Twitter Card
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url($default_image) . '">' . "\n";
}
add_action('wp_head', 'aav_seo_meta_tags', 1);

/**
 * Remove WordPress default title tag so our custom <title> takes precedence
 */
function aav_remove_wp_title() {
    // Only remove on pages where we output a custom title
    if (is_front_page() || is_page(2952) || (is_page() && get_page_uri() === 'contact-us') || is_singular('post')) {
        remove_theme_support('title-tag');
    }
}
add_action('after_setup_theme', 'aav_remove_wp_title', 99);

/**
 * Filter document title for pages we handle
 */
function aav_custom_document_title($title) {
    if (is_front_page()) {
        return 'Aavishkar AI — AI for Science | Discover New Knowledge with AI';
    } elseif (is_page(2952)) {
        return 'Proofline AI — Scientific Knowledge Engine for Research Teams | Aavishkar AI';
    } elseif (is_page() && get_page_uri() === 'contact-us') {
        return 'About & Contact | Aavishkar AI — AI for Science';
    } elseif (is_singular('post')) {
        return get_the_title() . ' | Aavishkar.ai';
    }
    return $title;
}
add_filter('pre_get_document_title', 'aav_custom_document_title', 99);

/* ==========================================================================
   SEO: JSON-LD STRUCTURED DATA
   ========================================================================== */

function aav_structured_data() {
    if (is_front_page()) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Aavishkar.ai',
            'alternateName' => 'Aavishkar AI',
            'url' => 'https://aavishkar.ai',
            'logo' => 'https://aavishkar.ai/wp-content/uploads/2025/05/aavishkar_logo.png',
            'description' => 'Aavishkar builds AI for science — tools that help research teams capture, connect, and discover knowledge.',
            'founder' => array(
                array('@type' => 'Person', 'name' => 'Astitva Chopra'),
                array('@type' => 'Person', 'name' => 'Akshay Rao')
            ),
            'sameAs' => array(
                'https://www.linkedin.com/company/aavishkar-ai',
                'https://github.com/astitvac/AI4Science'
            )
        );
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    } elseif (is_page(2952)) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'SoftwareApplication',
            'name' => 'Proofline',
            'alternateName' => 'Proofline AI',
            'description' => 'Version control for research knowledge. Capture hypotheses, evidence, and decisions in a structured, traceable graph.',
            'applicationCategory' => 'BusinessApplication',
            'operatingSystem' => 'Web',
            'offers' => array(
                '@type' => 'Offer',
                'price' => '0',
                'priceCurrency' => 'USD',
                'description' => 'Founding Labs pilot program'
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => 'Aavishkar.ai',
                'url' => 'https://aavishkar.ai'
            )
        );
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    } elseif (is_page() && get_page_uri() === 'contact-us') {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Aavishkar.ai',
            'url' => 'https://aavishkar.ai',
            'description' => 'AI for Science — tools for research teams to capture, connect, and discover knowledge.',
            'founder' => array(
                array('@type' => 'Person', 'name' => 'Astitva Chopra'),
                array('@type' => 'Person', 'name' => 'Akshay Rao')
            ),
            'sameAs' => array(
                'https://www.linkedin.com/company/aavishkar-ai',
                'https://github.com/astitvac/AI4Science'
            )
        );
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    } elseif (is_singular('post')) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => get_the_title(),
            'datePublished' => get_the_date('c'),
            'dateModified' => get_the_modified_date('c'),
            'author' => array(
                '@type' => 'Organization',
                'name' => 'Aavishkar.ai'
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => 'Aavishkar.ai',
                'logo' => array(
                    '@type' => 'ImageObject',
                    'url' => 'https://aavishkar.ai/wp-content/uploads/2025/05/aavishkar_logo.png'
                )
            ),
            'mainEntityOfPage' => get_permalink()
        );
        if (has_post_thumbnail()) {
            $schema['image'] = get_the_post_thumbnail_url(get_the_ID(), 'large');
        }
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    }
}
add_action('wp_head', 'aav_structured_data', 2);

/* ==========================================================================
   SEO: 301 REDIRECTS FOR DELETED CONTENT
   ========================================================================== */

function aav_301_redirects() {
    if (is_admin()) {
        return;
    }

    $redirects = array(
        '/about-us/'                                  => '/contact-us/',
        '/where-is-the-data/'                         => '/',
        '/automating-literature-review-with-llms1/'   => '/',
        '/automating-literature-review-with-llms2/'   => '/',
        '/what-is-an-expert-system/'                  => '/',
        '/building-llm-agents-for-data-science/'      => '/',
        '/building-llm-agentsfor-data-science/'       => '/',
        '/repository/'                                => 'https://github.com/astitvac/AI4Science',
    );

    $request_uri = rtrim(strtok($_SERVER['REQUEST_URI'], '?'), '/') . '/';

    foreach ($redirects as $old => $new) {
        if (strcasecmp($request_uri, $old) === 0) {
            if (strpos($new, 'http') === 0) {
                $destination = $new;
            } else {
                $destination = home_url($new);
            }
            wp_redirect($destination, 301);
            exit;
        }
    }
}
add_action('template_redirect', 'aav_301_redirects', 1);

/* ==========================================================================
   SEO: ROBOTS.TXT ENHANCEMENTS
   ========================================================================== */

function aav_robots_txt($output, $public) {
    $output .= "\n";
    $output .= "Disallow: /wp-content/plugins/\n";
    $output .= "Disallow: /wp-content/themes/\n";
    $output .= "Disallow: /?page_id=*\n";
    $output .= "Disallow: /feed/\n";
    $output .= "Disallow: /*/feed/\n";
    $output .= "Disallow: /tag/*/feed/\n";
    return $output;
}
add_filter('robots_txt', 'aav_robots_txt', 10, 2);

/**
 * Noindex low-value archive pages
 */
function aav_noindex_archives() {
    if (is_date() || is_tag() || is_author() || is_feed()) {
        echo '<meta name="robots" content="noindex, follow">' . "\n";
    }
    if (is_singular('project') || is_singular('notebook')) {
        echo '<meta name="robots" content="noindex, follow">' . "\n";
    }
}
add_action('wp_head', 'aav_noindex_archives', 1);

/* ==========================================================================
   SEO: SITEMAP CLEANUP
   ========================================================================== */

/**
 * Remove low-value post types from sitemap
 */
function aav_sitemap_post_types($post_types) {
    unset($post_types['project']);
    unset($post_types['notebook']);
    return $post_types;
}
add_filter('wp_sitemaps_post_types', 'aav_sitemap_post_types');

/**
 * Remove users sitemap
 */
function aav_sitemap_remove_users($provider, $name) {
    if ($name === 'users') {
        return false;
    }
    return $provider;
}
add_filter('wp_sitemaps_add_provider', 'aav_sitemap_remove_users', 10, 2);

/**
 * Exclude specific pages from sitemap (privacy policy)
 */
function aav_sitemap_exclude_pages($args, $post_type) {
    if ($post_type === 'page') {
        $args['post__not_in'] = isset($args['post__not_in']) ? $args['post__not_in'] : array();
        $args['post__not_in'][] = 3085; // Privacy Policy
    }
    return $args;
}
add_filter('wp_sitemaps_posts_query_args', 'aav_sitemap_exclude_pages', 10, 2);

/* ==========================================================================
   PROOFLINE: UTM-AWARE EVENT BANNER
   Reads ?ref= URL param and shows a contextual welcome banner.
   Fully auto-deployed via functions.php + style.css — no Divi steps.
   Also injects the ref value as a hidden field into all CF7 forms on the page.
   ========================================================================== */

function aav_proofline_event_banner() {
    if ( ! is_page( 2952 ) ) {
        return;
    }
    ?>
    <script>
    (function() {
        var params = new URLSearchParams(window.location.search);
        var ref = params.get('ref');
        if (!ref) return;

        // Map known event slugs to display names
        var eventNames = {
            'buildtogether': 'Build Together',
            'build-together': 'Build Together'
        };

        // Use mapped name or auto-prettify the slug
        var displayName = eventNames[ref.toLowerCase()]
            || ref.replace(/[-_]/g, ' ').replace(/\b\w/g, function(c) { return c.toUpperCase(); });

        var banner = document.createElement('div');
        banner.className = 'pl-event-banner';
        banner.setAttribute('role', 'status');
        banner.innerHTML =
            '<div class="pl-event-banner-inner">' +
                '<span class="pl-event-banner-text">' +
                    'Welcome from <strong>' + displayName + '</strong> \u2014 ' +
                    'glad you\u2019re here. Explore Proofline below, or ' +
                    '<a href="#lighthouse">tell us about your team</a>.' +
                '</span>' +
                '<button class="pl-event-banner-close" aria-label="Dismiss banner">\u00d7</button>' +
            '</div>';

        // Insert at the top of the hero section
        var hero = document.querySelector('.pl-hero .et_pb_code_inner, .pl-hero .et_pb_module_inner');
        if (hero) {
            hero.insertBefore(banner, hero.firstChild);
        }

        // Dismiss handler
        banner.querySelector('.pl-event-banner-close').addEventListener('click', function() {
            banner.style.opacity = '0';
            banner.style.transform = 'translateY(-10px)';
            setTimeout(function() { banner.remove(); }, 300);
        });

        // Inject ref as hidden field into all CF7 forms on the page
        document.querySelectorAll('.wpcf7-form').forEach(function(form) {
            var hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = '_aav_event_ref';
            hidden.value = ref;
            form.appendChild(hidden);
        });
    })();
    </script>
    <?php
}
add_action( 'wp_footer', 'aav_proofline_event_banner' );

/* ==========================================================================
   DISABLE COMMENTS SITE-WIDE
   This is a marketing/product site that does not use blog comments. Spambots
   were POSTing directly to wp-comments-post.php (link-shortener payloads from
   rotating fake authors/IPs), which flooded moderation email and produced
   bounce-backs to a stale post-author address.

   This block hard-disables comments everywhere. The comments_open filter
   overrides the legacy comment_status='open' still stored on old posts in the
   database, so it also closes the back door the bots were using.
   Added: 2026-06-16
   ========================================================================== */

// 1. Force comments + pings closed on every post/page, regardless of the
//    per-post status saved in the database. This also makes
//    wp_handle_comment_submission() reject direct POSTs to wp-comments-post.php.
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open',    '__return_false', 20, 2 );

// 2. Hide any pre-existing comments from the front-end.
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

// 3. Belt-and-suspenders: hard-stop any comment that somehow reaches insertion.
add_filter( 'preprocess_comment', function ( $commentdata ) {
    wp_die(
        esc_html__( 'Comments are closed on this site.', 'aavishkar' ),
        esc_html__( 'Comments closed', 'aavishkar' ),
        array( 'response' => 403 )
    );
    return $commentdata; // unreachable, kept for clarity
}, 0 );

// 4. Remove comment/trackback support from all post types.
add_action( 'init', function () {
    foreach ( get_post_types() as $type ) {
        if ( post_type_supports( $type, 'comments' ) ) {
            remove_post_type_support( $type, 'comments' );
        }
        if ( post_type_supports( $type, 'trackbacks' ) ) {
            remove_post_type_support( $type, 'trackbacks' );
        }
    }
}, 100 );

// 5. Declutter wp-admin: drop the Comments menu, admin-bar node, and dashboard
//    widget. (The comments screen stays reachable by direct URL if ever needed.)
add_action( 'admin_menu', function () {
    remove_menu_page( 'edit-comments.php' );
} );
add_action( 'wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    if ( $wp_admin_bar ) {
        $wp_admin_bar->remove_node( 'comments' );
    }
} );
add_action( 'wp_dashboard_setup', function () {
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
} );

// 6. Disable the XML-RPC pingback methods (a spam + DDoS amplification vector).
add_filter( 'xmlrpc_methods', function ( $methods ) {
    unset( $methods['pingback.ping'], $methods['pingback.extensions.getPingbacks'] );
    return $methods;
} );

