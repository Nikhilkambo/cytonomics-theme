<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cytonomics_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'cytonomics_pingback_header');

/**
 * Add custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cytonomics_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'cytonomics_body_classes');

/**
 * Add custom classes to navigation menus.
 *
 * @param array $classes Array of the CSS classes.
 * @return array
 */
function cytonomics_nav_menu_css_class($classes) {
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'cytonomics_nav_menu_css_class');

/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the post element.
 * @return array
 */
function cytonomics_post_classes($classes) {
    if (is_single()) {
        $classes[] = 'single-post';
    }
    return $classes;
}
add_filter('post_class', 'cytonomics_post_classes');

/**
 * Change excerpt length
 */
function cytonomics_custom_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'cytonomics_custom_excerpt_length');

/**
 * Change excerpt more string
 */
function cytonomics_custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'cytonomics_custom_excerpt_more'); 