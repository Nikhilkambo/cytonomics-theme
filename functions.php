<?php
/**
 * Cytonomics Theme Functions
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Define theme version and colors
define('CYTONOMICS_VERSION', '1.0.0');
define('CYTONOMICS_PRIMARY_COLOR', '#00A3FF');    // Blue
define('CYTONOMICS_SECONDARY_COLOR', '#FF3366');  // Pink
define('CYTONOMICS_ACCENT_COLOR', '#FFA500');     // Orange
define('CYTONOMICS_DARK_COLOR', '#0A1628');      // Dark Blue
define('CYTONOMICS_LIGHT_COLOR', '#F8FAFC');     // Light Gray

// Define dependency versions
define('CYTONOMICS_FONTAWESOME_VERSION', '6.0.0');
define('CYTONOMICS_SLICK_VERSION', '1.8.1');
define('CYTONOMICS_GOOGLE_FONTS_VERSION', '1');

// Include Walker_Nav_Menu_Edit if not already included
if (!class_exists('Walker_Nav_Menu_Edit')) {
    require_once ABSPATH . 'wp-admin/includes/nav-menu.php';
}

/**
 * Set up theme defaults and register support for various WordPress features.
 */
function cytonomics_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Add support for responsive embeds.
    add_theme_support('responsive-embeds');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for editor styles.
    add_theme_support('editor-styles');

    // Add support for custom line height.
    add_theme_support('custom-line-height');

    // Add support for experimental link color control.
    add_theme_support('experimental-link-color');

    // Add support for custom units.
    add_theme_support('custom-units');

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for Block Styles.
    add_theme_support('wp-block-styles');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Register nav menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'cytonomics'),
        'footer'  => __('Footer Menu', 'cytonomics'),
    ));

    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ));

    // Add support for custom header
    add_theme_support('custom-header', array(
        'default-image'          => '',
        'default-text-color'     => CYTONOMICS_DARK_COLOR,
        'width'                  => 1920,
        'height'                 => 400,
        'flex-height'           => true,
        'wp-head-callback'       => 'cytonomics_header_style',
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for custom color palette
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => esc_html__('Primary Blue', 'cytonomics'),
            'slug'  => 'primary',
            'color' => CYTONOMICS_PRIMARY_COLOR,
        ),
        array(
            'name'  => esc_html__('Secondary Pink', 'cytonomics'),
            'slug'  => 'secondary',
            'color' => CYTONOMICS_SECONDARY_COLOR,
        ),
        array(
            'name'  => esc_html__('Accent Orange', 'cytonomics'),
            'slug'  => 'accent',
            'color' => CYTONOMICS_ACCENT_COLOR,
        ),
        array(
            'name'  => esc_html__('Dark Blue', 'cytonomics'),
            'slug'  => 'dark',
            'color' => CYTONOMICS_DARK_COLOR,
        ),
        array(
            'name'  => esc_html__('Light Gray', 'cytonomics'),
            'slug'  => 'light',
            'color' => CYTONOMICS_LIGHT_COLOR,
        ),
    ));

    // Add support for custom font sizes
    add_theme_support('editor-font-sizes', array(
        array(
            'name' => esc_html__('Small', 'cytonomics'),
            'size' => 14,
            'slug' => 'small'
        ),
        array(
            'name' => esc_html__('Regular', 'cytonomics'),
            'size' => 16,
            'slug' => 'regular'
        ),
        array(
            'name' => esc_html__('Large', 'cytonomics'),
            'size' => 24,
            'slug' => 'large'
        ),
        array(
            'name' => esc_html__('Huge', 'cytonomics'),
            'size' => 36,
            'slug' => 'huge'
        )
    ));
}
add_action('after_setup_theme', 'cytonomics_setup');

/**
 * Set the content width in pixels
 */
function cytonomics_content_width() {
    $GLOBALS['content_width'] = apply_filters('cytonomics_content_width', 1200);
}
add_action('after_setup_theme', 'cytonomics_content_width', 0);

/**
 * Enqueue scripts and styles
 */
function cytonomics_scripts() {
    // Google Fonts
    wp_enqueue_style('cytonomics-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), CYTONOMICS_GOOGLE_FONTS_VERSION);

    // Theme stylesheet
    wp_enqueue_style('cytonomics-style', get_stylesheet_uri(), array(), CYTONOMICS_VERSION);

    // FontAwesome
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), CYTONOMICS_FONTAWESOME_VERSION);

    // Slick Slider CSS - Use CDN instead of local files
    wp_enqueue_style('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), CYTONOMICS_SLICK_VERSION);
    wp_enqueue_style('slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), CYTONOMICS_SLICK_VERSION);

    // jQuery (from WordPress core)
    wp_enqueue_script('jquery');

    // Slick Slider JS - Use CDN instead of local files
    wp_enqueue_script('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), CYTONOMICS_SLICK_VERSION, true);

    // Theme JavaScript
    wp_enqueue_script('cytonomics-navigation', get_template_directory_uri() . '/js/navigation.js', array(), CYTONOMICS_VERSION, true);
    
    // Mega Menu JavaScript
    wp_enqueue_script('cytonomics-mega-menu', get_template_directory_uri() . '/js/mega-menu.js', array('jquery'), time(), true);
    
    // Add inline script to check if mega menu is initialized
    wp_add_inline_script('cytonomics-mega-menu', '
        console.log("Mega Menu Script Loaded");
        jQuery(document).ready(function($) {
            console.log("Mega Menu Ready");
            console.log("Menu Items with Template:", $(".menu-item a[data-mega-template-id]").length);
        });
    ');
    
    // Localize script
    wp_localize_script(
        'cytonomics-mega-menu',
        'cytonomicsMegaMenu',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('cytonomics-mega-menu-nonce'),
            'debug' => true
        )
    );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'cytonomics_scripts');

// Generate custom CSS variables
function cytonomics_get_custom_css() {
    $css = '
        :root {
            --primary-color: ' . CYTONOMICS_PRIMARY_COLOR . ';
            --secondary-color: ' . CYTONOMICS_SECONDARY_COLOR . ';
            --accent-color: ' . CYTONOMICS_ACCENT_COLOR . ';
            --dark-color: ' . CYTONOMICS_DARK_COLOR . ';
            --light-color: ' . CYTONOMICS_LIGHT_COLOR . ';
            --text-color: ' . CYTONOMICS_DARK_COLOR . ';
            --background-color: #ffffff;
            --font-family: "Inter", sans-serif;
        }
    ';
    return $css;
}

// Register widget areas
function cytonomics_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'cytonomics'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'cytonomics'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area', 'cytonomics'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add footer widgets here.', 'cytonomics'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'cytonomics'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add footer widgets here.', 'cytonomics'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'cytonomics_widgets_init');

// Custom excerpt length
function cytonomics_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'cytonomics_excerpt_length');

// Custom excerpt "read more" string
function cytonomics_excerpt_more($more) {
    return '&hellip; <a class="read-more" href="' . get_permalink() . '">' . __('Read More', 'cytonomics') . '</a>';
}
add_filter('excerpt_more', 'cytonomics_excerpt_more');

// Add custom image sizes
function cytonomics_image_sizes() {
    add_image_size('cytonomics-featured', 1200, 800, true);
    add_image_size('cytonomics-thumbnail', 300, 200, true);
}
add_action('after_setup_theme', 'cytonomics_image_sizes');

// Add theme options page
function cytonomics_theme_options() {
    add_theme_page(
        __('Theme Options', 'cytonomics'),
        __('Theme Options', 'cytonomics'),
        'edit_theme_options',
        'cytonomics-options',
        'cytonomics_theme_options_page'
    );
}
add_action('admin_menu', 'cytonomics_theme_options');

// Theme options page callback
function cytonomics_theme_options_page() {
    // Add theme options page content here
}

// Add support for WooCommerce
function cytonomics_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'cytonomics_woocommerce_support');

// Basic Elementor Support
function cytonomics_elementor_support() {
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'cytonomics_elementor_support');

/**
 * Mega Menu Integration
 */

// Custom Walker for Menu Items Edit
class Cytonomics_Walker_Nav_Menu_Edit extends Walker_Nav_Menu_Edit {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $item_output = '';
        parent::start_el($item_output, $item, $depth, $args, $id);
        
        // Find the closing </div>
        $position = strrpos($item_output, '</div>');
        
        if ($position !== false) {
            // Get custom fields HTML
            ob_start();
            
            $template_id = get_post_meta($item->ID, '_menu_item_mega_template', true);
            $templates = cytonomics_get_elementor_templates();
            ?>
            <div class="field-mega-menu-template description-wide">
                <h4><?php _e('Mega Menu Template', 'cytonomics'); ?></h4>
            <p class="description">
                    <label for="edit-menu-item-mega-template-<?php echo esc_attr($item->ID); ?>">
                    <?php _e('Select Template', 'cytonomics'); ?><br />
                        <select id="edit-menu-item-mega-template-<?php echo esc_attr($item->ID); ?>" 
                            class="widefat edit-menu-item-mega-template" 
                                name="menu-item-mega-template[<?php echo esc_attr($item->ID); ?>]">
                        <option value=""><?php _e('None', 'cytonomics'); ?></option>
                            <?php 
                            if (!empty($templates)) {
                                foreach ($templates as $id => $title) : ?>
                            <option value="<?php echo esc_attr($id); ?>" <?php selected($template_id, $id); ?>>
                                <?php echo esc_html($title); ?>
                            </option>
                                <?php endforeach;
                            }
                            ?>
                    </select>
                </label>
            </p>
                <?php if (empty($templates)) : ?>
                    <p class="description" style="color: #d63638;">
                        <?php _e('No templates found. Please create a template in Elementor → Templates first.', 'cytonomics'); ?>
                    </p>
                <?php endif; ?>
            <p class="description">
                    <a href="<?php echo esc_url(admin_url('edit.php?post_type=elementor_library')); ?>" target="_blank">
                        <?php _e('Create or manage templates', 'cytonomics'); ?>
                    </a>
            </p>
        </div>
        <?php
            $custom_fields = ob_get_clean();
            
            // Insert the custom fields HTML before the closing </div>
            $item_output = substr_replace($item_output, $custom_fields, $position, 0);
        }
        
        $output .= $item_output;
    }
}

/**
 * Initialize mega menu functionality
 */
function cytonomics_init_mega_menu() {
    if (is_admin()) {
        // Set custom walker for menu edit screen
        add_filter('wp_edit_nav_menu_walker', function() {
            return 'Cytonomics_Walker_Nav_Menu_Edit';
        }, 99);
        
        // Save mega menu template selection
        add_action('wp_update_nav_menu_item', 'cytonomics_save_menu_item_template', 10, 2);
        
        // Add admin styles
        add_action('admin_enqueue_scripts', function($hook) {
            if ($hook !== 'nav-menus.php') {
                return;
            }
            wp_enqueue_style(
                'cytonomics-admin-menu',
                get_template_directory_uri() . '/css/admin-menu.css',
                array(),
                CYTONOMICS_VERSION
            );
        });
    } else {
        // Frontend functionality
    add_filter('nav_menu_css_class', function($classes, $item) {
        $template_id = get_post_meta($item->ID, '_menu_item_mega_template', true);
        if (!empty($template_id)) {
            $classes[] = 'has-mega-template';
        }
        return $classes;
    }, 10, 2);

    add_filter('nav_menu_link_attributes', function($atts, $item) {
        $template_id = get_post_meta($item->ID, '_menu_item_mega_template', true);
        if (!empty($template_id)) {
            $atts['data-mega-template'] = $template_id;
        }
        return $atts;
    }, 10, 2);
}
}
add_action('init', 'cytonomics_init_mega_menu');

/**
 * Save menu item template
 */
function cytonomics_save_menu_item_template($menu_id, $menu_item_db_id) {
    if (isset($_POST['menu-item-mega-template'][$menu_item_db_id])) {
        $template_id = sanitize_text_field($_POST['menu-item-mega-template'][$menu_item_db_id]);
        update_post_meta($menu_item_db_id, '_menu_item_mega_template', $template_id);
    } else {
        delete_post_meta($menu_item_db_id, '_menu_item_mega_template');
    }
}

/**
 * Get Elementor templates
 */
function cytonomics_get_elementor_templates() {
    $templates = array();
    $args = array(
        'post_type' => 'elementor_library',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $templates[get_the_ID()] = get_the_title();
        }
    }
    
    wp_reset_postdata();
    
    return $templates;
}

/**
 * Custom header style callback
 */
function cytonomics_header_style() {
    $header_text_color = get_header_textcolor();
    $header_image = get_header_image();

    // If we get this far, we have custom styles.
    ?>
    <style type="text/css">
        <?php if (!display_header_text()) : ?>
            .site-title,
            .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }
        <?php else : ?>
            .site-title a,
            .site-description {
                color: #<?php echo esc_attr($header_text_color); ?>;
            }
        <?php endif; ?>

        <?php if ($header_image) : ?>
            .site-header {
                background-image: url(<?php echo esc_url($header_image); ?>);
                background-size: cover;
                background-position: center;
            }
        <?php endif; ?>

        .custom-logo {
            max-height: 100px;
            width: auto;
        }

        .site-header {
            background-color: var(--light-color);
        }
    </style>
    <?php
}

// Include required files
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

/**
 * Add shortcode for mega menu
 * Usage: [cytonomics_mega_menu menu="primary" container_class="custom-class"]
 */
function cytonomics_mega_menu_shortcode($atts) {
    $atts = shortcode_atts(array(
        'menu' => 'primary',
        'container_class' => 'cytonomics-mega-menu-container',
        'menu_class' => 'cytonomics-mega-menu',
        'depth' => 0,
        'fallback_cb' => false,
    ), $atts, 'cytonomics_mega_menu');

    // Check if Elementor Pro is active
    if (!class_exists('ElementorPro\Modules\MegaMenu\Module')) {
        return '<p>' . esc_html__('Elementor Pro is required for mega menu functionality.', 'cytonomics') . '</p>';
    }

    // Set up the menu arguments
    $args = array(
        'theme_location' => $atts['menu'],
        'container' => 'div',
        'container_class' => $atts['container_class'],
        'menu_class' => $atts['menu_class'],
        'depth' => $atts['depth'],
        'fallback_cb' => $atts['fallback_cb'],
        'walker' => \Elementor\Modules\MegaMenu\WpWalker::get_instance(),
    );

    // Start output buffering
    ob_start();
    
    // Output the menu
    wp_nav_menu($args);
    
    // Get the menu HTML
    $menu_html = ob_get_clean();
    
    return $menu_html;
}
add_shortcode('cytonomics_mega_menu', 'cytonomics_mega_menu_shortcode');

/**
 * Add shortcode for regular menu (non-mega)
 * Usage: [cytonomics_menu menu="footer" container_class="custom-class"]
 */
function cytonomics_menu_shortcode($atts) {
    $atts = shortcode_atts(array(
        'menu' => 'footer',
        'container_class' => 'cytonomics-menu-container',
        'menu_class' => 'cytonomics-menu',
        'depth' => 0,
        'fallback_cb' => false,
    ), $atts, 'cytonomics_menu');

    // Set up the menu arguments
    $args = array(
        'theme_location' => $atts['menu'],
        'container' => 'div',
        'container_class' => $atts['container_class'],
        'menu_class' => $atts['menu_class'],
        'depth' => $atts['depth'],
        'fallback_cb' => $atts['fallback_cb'],
    );

    // Start output buffering
    ob_start();
    
    // Output the menu
    wp_nav_menu($args);
    
    // Get the menu HTML
    $menu_html = ob_get_clean();
    
    return $menu_html;
}
add_shortcode('cytonomics_menu', 'cytonomics_menu_shortcode');

/**
 * Direct output of mega menu template in the frontend
 * 
 * @param string $item_output The menu item's HTML output
 * @param object $item The menu item object
 * @return string Modified menu item HTML
 */
function cytonomics_output_mega_menu_template($item_output, $item) {
    $template_id = get_post_meta($item->ID, '_menu_item_mega_template', true);
    
    if (!empty($template_id)) {
        // Get template content
        if (class_exists('\Elementor\Plugin')) {
            $content = \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($template_id);
            
            // Add data attribute to the menu item
            $item_output = str_replace('<a', '<a data-mega-template-id="' . esc_attr($template_id) . '"', $item_output);
            
            // Add arrow icon to the menu item
            $item_output = str_replace('</a>', '<span class="menu-arrow"><i class="fas fa-chevron-down"></i></span></a>', $item_output);
            
            // Add mega menu container to the body
            add_action('wp_footer', function() use ($template_id, $content) {
                echo '<div id="mega-menu-' . esc_attr($template_id) . '" class="mega-menu-template-container" style="display: none; position: fixed; top: 120px; left: 0; width: 100%; height: calc(100% - 120px); background: rgb(250, 250, 250); z-index: 98; overflow-y: auto;"><div class="mega-menu-content" style="max-width: 1200px; margin: 0 auto; padding: 20px;">' . $content . '</div></div>';
            });
        }
    }
    
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'cytonomics_output_mega_menu_template', 10, 2);

/**
 * Add no-cache headers for mega menu
 */
function cytonomics_add_no_cache_headers() {
    if (!is_admin()) {
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }
}
add_action('send_headers', 'cytonomics_add_no_cache_headers');

/**
 * Ensure mega menu works in both local and production
 */
function cytonomics_ensure_mega_menu_works() {
    if (!is_admin()) {
        // Add security headers
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('X-Content-Type-Options: nosniff');
        
        // Add cache control headers
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        
        // Add CORS headers if needed
        header('Access-Control-Allow-Origin: ' . get_site_url());
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Credentials: true');
    }
}
add_action('init', 'cytonomics_ensure_mega_menu_works', 1);

/**
 * Fix lazyloadRunObserver conflict
 */
function cytonomics_fix_lazyload_conflict() {
    if (!is_admin()) {
        wp_add_inline_script('cytonomics-mega-menu', '
            // Check if lazyloadRunObserver is already defined
            if (typeof window.lazyloadRunObserver !== "undefined") {
                // Store the original function
                var originalLazyloadRunObserver = window.lazyloadRunObserver;
                
                // Redefine the function to avoid conflicts
                window.lazyloadRunObserver = function() {
                    // Call the original function if it exists
                    if (typeof originalLazyloadRunObserver === "function") {
                        originalLazyloadRunObserver.apply(this, arguments);
                    }
                };
            }
        ');
    }
}
add_action('wp_enqueue_scripts', 'cytonomics_fix_lazyload_conflict', 30);

/**
 * Add CSS for menu arrow
 */
function cytonomics_add_menu_arrow_css() {
    if (!is_admin()) {
        wp_add_inline_style('cytonomics-style', '
            .menu-arrow {
                display: inline-block;
                margin-left: 5px;
                font-size: 12px;
                transition: transform 0.3s ease;
            }
            
            .menu-item a[data-mega-template-id]:hover .menu-arrow {
                transform: rotate(180deg);
            }
        ');
    }
}
add_action('wp_enqueue_scripts', 'cytonomics_add_menu_arrow_css', 20);



