<?php
/**
 * Cytonomics Theme Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cytonomics_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    // Theme Options Section
    $wp_customize->add_section('cytonomics_theme_options', array(
        'title'    => __('Theme Options', 'cytonomics'),
        'priority' => 130,
    ));

    // Logo Size Control
    $wp_customize->add_setting('cytonomics_logo_size', array(
        'default'           => '300',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('cytonomics_logo_size', array(
        'label'       => __('Logo Size (px)', 'cytonomics'),
        'section'     => 'cytonomics_theme_options',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 50,
            'max'  => 500,
            'step' => 10,
        ),
    ));

    // Primary Color Control
    $wp_customize->add_setting('cytonomics_primary_color', array(
        'default'           => '#00A3FF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cytonomics_primary_color', array(
        'label'    => __('Primary Color', 'cytonomics'),
        'section'  => 'cytonomics_theme_options',
        'settings' => 'cytonomics_primary_color',
    )));

    // Top Header Section
    $wp_customize->add_section('top_header_section', array(
        'title'    => __('Top Header', 'cytonomics'),
        'priority' => 20,
    ));

    // Top Header Text
    $wp_customize->add_setting('top_header_text', array(
        'default'           => 'Get 10% Off on Your First Genetic Test with Code: WELCOME',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('top_header_text', array(
        'label'    => __('Promotion Text', 'cytonomics'),
        'section'  => 'top_header_section',
        'type'     => 'text',
    ));

    // Social Media Links
    $wp_customize->add_setting('facebook_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('facebook_url', array(
        'label'    => __('Facebook URL', 'cytonomics'),
        'section'  => 'top_header_section',
        'type'     => 'url',
    ));

    $wp_customize->add_setting('twitter_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('twitter_url', array(
        'label'    => __('X (Twitter) URL', 'cytonomics'),
        'section'  => 'top_header_section',
        'type'     => 'url',
    ));

    $wp_customize->add_setting('instagram_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('instagram_url', array(
        'label'    => __('Instagram URL', 'cytonomics'),
        'section'  => 'top_header_section',
        'type'     => 'url',
    ));

    $wp_customize->add_setting('youtube_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('youtube_url', array(
        'label'    => __('YouTube URL', 'cytonomics'),
        'section'  => 'top_header_section',
        'type'     => 'url',
    ));

    // Top Header Colors
    $wp_customize->add_setting('top_header_bg_color', array(
        'default'           => '#00A3FF',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'top_header_bg_color', array(
        'label'    => __('Background Color', 'cytonomics'),
        'section'  => 'top_header_section',
    )));

    $wp_customize->add_setting('top_header_text_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'top_header_text_color', array(
        'label'    => __('Text Color', 'cytonomics'),
        'section'  => 'top_header_section',
    )));

    // Footer Settings
    $wp_customize->add_section('footer_settings', array(
        'title'    => __('Footer Settings', 'cytonomics'),
        'priority' => 120,
    ));

    // Footer Logo Size
    $wp_customize->add_setting('footer_logo_size', array(
        'default'           => '200',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('footer_logo_size', array(
        'label'       => __('Footer Logo Size (px)', 'cytonomics'),
        'section'     => 'footer_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 100,
            'max'  => 400,
            'step' => 10,
        ),
    ));

    // Footer Background Image
    $wp_customize->add_setting('footer_background_image', array(
        'default'           => get_template_directory_uri() . '/assets/images/dna-background.png',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_background_image', array(
        'label'    => __('Footer Background Image', 'cytonomics'),
        'section'  => 'footer_settings',
        'settings' => 'footer_background_image',
    )));

    // Background Opacity
    $wp_customize->add_setting('footer_bg_opacity', array(
        'default'           => '0.1',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('footer_bg_opacity', array(
        'label'       => __('Background Image Opacity', 'cytonomics'),
        'section'     => 'footer_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 1,
            'step' => 0.1,
        ),
    ));

    // Footer Menu Title
    $wp_customize->add_setting('footer_menu_title', array(
        'default'           => 'Quick Links',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_menu_title', array(
        'label'    => __('Menu Section Title', 'cytonomics'),
        'section'  => 'footer_settings',
        'type'     => 'text',
    ));

    // Footer Colors
    $wp_customize->add_setting('footer_bg_color', array(
        'default'           => '#1A1A1A',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg_color', array(
        'label'    => __('Footer Background Color', 'cytonomics'),
        'section'  => 'footer_settings',
    )));

    $wp_customize->add_setting('footer_text_color', array(
        'default'           => '#B3B3B3',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_color', array(
        'label'    => __('Footer Text Color', 'cytonomics'),
        'section'  => 'footer_settings',
    )));

    $wp_customize->add_setting('footer_link_color', array(
        'default'           => '#FF69B4',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_link_color', array(
        'label'    => __('Footer Link Color', 'cytonomics'),
        'section'  => 'footer_settings',
    )));

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'cytonomics_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'cytonomics_customize_partial_blogdescription',
        ));
    }
}
add_action('customize_register', 'cytonomics_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cytonomics_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cytonomics_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cytonomics_customize_preview_js() {
    wp_enqueue_script('cytonomics-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), CYTONOMICS_VERSION, true);
}
add_action('customize_preview_init', 'cytonomics_customize_preview_js');

/**
 * Output the custom CSS for the top header
 */
function cytonomics_custom_header_style() {
    $bg_color = get_theme_mod('top_header_bg_color', '#00A3FF');
    $text_color = get_theme_mod('top_header_text_color', '#ffffff');
    ?>
    <style type="text/css">
        .top-header {
            background-color: <?php echo esc_attr($bg_color); ?>;
            color: <?php echo esc_attr($text_color); ?>;
        }
        .social-links a {
            color: <?php echo esc_attr($text_color); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'cytonomics_custom_header_style'); 