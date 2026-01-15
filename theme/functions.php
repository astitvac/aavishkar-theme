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

