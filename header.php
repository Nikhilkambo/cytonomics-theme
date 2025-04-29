<?php
/**
 * The header for our theme
 *
 * @package Cytonomics
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- Add Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&family=Urbanist:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Add FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <?php wp_head(); ?>
    <style>
        /* Reset menu positioning */
        .main-navigation {
            position: relative !important;
        }

        .primary-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .primary-menu > li {
            position: relative !important;
        }

        /* Mega Menu Container */
        .mega-menu-container {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: #ffffff;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            padding: 32px;
            width: 100%;
            max-width: 1200px;
            z-index: 1000;
            margin-top: 15px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        /* Show mega menu on hover */
        .menu-item-has-mega-menu:hover .mega-menu-container {
            opacity: 1;
            visibility: visible;
            margin-top: 0;
        }

        /* Mega Menu Grid Layout */
        .mega-menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
        }

        /* Mega Menu Items */
        .mega-menu-item {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.06);
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .mega-menu-item:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
            transform: translateY(-2px);
        }

        .mega-menu-item-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 8px;
        }

        .mega-menu-item-icon svg {
            width: 32px;
            height: 32px;
            color: #FF3366;
        }

        .mega-menu-item-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .mega-menu-item-title {
            font-size: 20px;
            font-weight: 600;
            color: #1A1A1A;
            margin: 0;
            font-family: var(--font-primary);
        }

        .mega-menu-item-description {
            font-size: 14px;
            color: #666666;
            line-height: 1.5;
            margin: 0;
            font-family: var(--font-primary);
        }

        .mega-menu-button {
            display: inline-block;
            padding: 8px 0;
            color: #FF3366;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-top: auto;
            width: fit-content;
        }

        .mega-menu-button:hover {
            color: #E6004C;
            transform: translateX(4px);
        }

        /* Menu Item Hover Effect */
        .menu-item-has-mega-menu > a {
            position: relative;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .menu-item-has-mega-menu > a:after {
            content: '\f107';
            font-family: 'FontAwesome';
            font-size: 12px;
            transition: transform 0.3s ease;
        }

        .menu-item-has-mega-menu:hover > a {
            color: #FF3366;
        }

        .menu-item-has-mega-menu:hover > a:after {
            transform: rotate(180deg);
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            .mega-menu-container {
                position: static;
                transform: none;
                width: 100%;
                max-width: none;
                padding: 16px;
                box-shadow: none;
                border-radius: 0;
                margin: 0;
                background: #f8f9fa;
            }

            .mega-menu-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .mega-menu-item {
                padding: 16px;
                border-radius: 8px;
            }

            .mega-menu-item:hover {
                transform: none;
                box-shadow: none;
            }
        }

        /* Close button for mobile */
        .mega-menu-close {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 24px;
            height: 24px;
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #666;
            background: #f0f0f0;
            border-radius: 50%;
        }

        @media (max-width: 768px) {
            .mega-menu-close {
                display: flex;
            }
        }

        /* Regular Submenu Styles */
        .primary-menu .sub-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #ffffff;
            min-width: 220px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            z-index: 1000;
        }

        .primary-menu > li:hover > .sub-menu {
            display: block;
        }

        .primary-menu .sub-menu li {
            padding: 0;
        }

        .primary-menu .sub-menu a {
            padding: 0.75rem 1.5rem;
            color: #1A1A1A;
            display: block;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .primary-menu .sub-menu a:hover {
            background: rgba(0, 163, 255, 0.05);
            color: #00A3FF;
        }

        /* Dropdown arrows */
        .primary-menu .menu-item-has-children > a:after {
            content: '\f107';
            font-family: 'FontAwesome';
            margin-left: 0.5rem;
            font-size: 0.8em;
            transition: transform 0.3s ease;
        }

        .primary-menu .menu-item-has-children:hover > a:after {
            transform: rotate(180deg);
        }

        .primary-menu .sub-menu .menu-item-has-children > a:after {
            content: '\f105';
            float: right;
            transform: none;
        }

        /* Multi-level submenu */
        .primary-menu .sub-menu .sub-menu {
            top: 0;
            left: 100%;
            margin-top: 0;
            margin-left: 1px;
        }

        /* Mobile Submenu Styles */
        @media (max-width: 768px) {
            .primary-menu .sub-menu {
                position: static;
                background: rgba(0, 0, 0, 0.02);
                box-shadow: none;
                padding: 0;
                opacity: 1;
                visibility: visible;
                transform: none;
                width: 100%;
                display: none;
            }

            .primary-menu .menu-item-has-children > a:after {
                float: right;
                margin-top: 0.5rem;
            }

            .primary-menu .sub-menu li a {
                padding: 0.75rem 2rem;
            }

            .primary-menu .sub-menu .sub-menu li a {
                padding-left: 3rem;
            }

            .primary-menu .menu-item-has-children:hover > .sub-menu {
                display: block;
            }
        }

        /* Mega Menu specific overrides */
        .menu-item-has-mega-menu .sub-menu {
            display: none !important;
        }

        .menu-item-has-mega-menu:hover .mega-menu-container {
            display: block;
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .mega-menu-container {
            position: absolute;
            top: 100%;
            left: 0;
            background: #ffffff;
            min-width: 800px;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        /* Ensure proper spacing between menu items */
        .primary-menu > li {
            margin: 0;
            padding: 1rem 0;
        }

        /* Fix for mega menu positioning */
        .menu-item-has-mega-menu {
            position: static;
        }

        .menu-item-has-mega-menu .mega-menu-container {
            left: 50%;
            transform: translateX(-50%) translateY(10px);
        }

        .menu-item-has-mega-menu:hover .mega-menu-container {
            transform: translateX(-50%) translateY(0);
        }

        /* Header Styles */
        .site-header {
            position: fixed !important;
            top: 24px !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 1001 !important;
            background-color: var(--light-color) !important;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05) !important;
            transform: translateY(0) !important;
            transition: transform 0.3s ease !important;
            padding: 0 !important;
            border-bottom-left-radius: 10px !important;
            border-bottom-right-radius: 10px !important;
        }

        .top-header {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 1002 !important;
            transform: translateY(0) !important;
            transition: transform 0.3s ease !important;
            padding: 2px 0 !important;
        }

        /* Add padding to body to prevent content from hiding behind fixed header */
        body {
            padding-top: 80px; /* Adjust this value based on your header height */
        }

        /* Ensure main content has proper z-index */
        .site-content {
            padding-top: calc(24px + 80px) !important;
            position: relative !important;
            z-index: 1 !important;
        }

        /* Ensure Elementor content doesn't overlap */
        .elementor-section-wrap {
            position: relative;
            z-index: 1;
        }

        /* Mega Menu Styles */
        .mega-menu-container {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1001;
        }

        .menu-item-has-mega-menu:hover .mega-menu-container {
            display: block;
        }

        /* Mobile Menu Styles */
        @media (max-width: 768px) {
            .site-header {
                position: fixed;
                width: 100%;
                border-bottom-left-radius: 0 !important;
                border-bottom-right-radius: 0 !important;
            }

            .main-navigation {
                left: 0;
                right: 0;
                background: #fff;
                z-index: 1000;
            }

            .menu-toggle {
                display: block;
            }

            .site-content {
                padding-top: 50px !important;
            }

            .header-container {
                border-bottom-left-radius: 0 !important;
                border-bottom-right-radius: 0 !important;
            }
        }

        /* Logo Styles */
        .custom-logo {
            max-height: 65px !important;
            width: auto !important;
            transition: all 0.3s ease !important;
        }

        .site-branding {
            display: flex;
            align-items: center;
        }

        /* Adjust header height to accommodate larger logo */
        .header-container {
            padding: 8px 7.5rem !important;
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            border-bottom-left-radius: 10px !important;
            border-bottom-right-radius: 10px !important;
            max-width: 100% !important;
            margin: 0 auto !important;
        }

        /* Adjust content padding for new header height */
        .site-content {
            padding-top: calc(24px + 80px) !important;
        }

        /* WordPress Admin Bar Compatibility */
        .admin-bar .site-header {
            top: calc(32px + 24px) !important;
        }

        @media screen and (max-width: 782px) {
            .admin-bar .site-header {
                top: calc(46px + 24px) !important;
            }
            
            .custom-logo {
                max-height: 65px !important;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary">
        <?php esc_html_e('Skip to content', 'cytonomics'); ?>
    </a>

    <!-- Top Header -->
    <?php 
    // Get customizer settings
    $top_header_text = get_theme_mod('top_header_text', 'Get 10% Off on Your First Genetic Test with Code: WELCOME');
    $facebook_url = get_theme_mod('facebook_url');
    $twitter_url = get_theme_mod('twitter_url');
    $instagram_url = get_theme_mod('instagram_url');
    $youtube_url = get_theme_mod('youtube_url');
    $top_header_bg_color = get_theme_mod('top_header_bg_color', '#00A3FF');
    $top_header_text_color = get_theme_mod('top_header_text_color', '#ffffff');

    // Show top header if any content exists
    if ($top_header_text || $facebook_url || $twitter_url || $instagram_url || $youtube_url) : ?>
    <div class="top-header" style="background-color: <?php echo esc_attr($top_header_bg_color); ?>; color: <?php echo esc_attr($top_header_text_color); ?>;">
        <div class="container">
            <div class="top-header-content">
                <div class="social-links">
                    <?php if ($facebook_url) : ?>
                        <a href="<?php echo esc_url($facebook_url); ?>" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($twitter_url) : ?>
                        <a href="<?php echo esc_url($twitter_url); ?>" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($instagram_url) : ?>
                        <a href="<?php echo esc_url($instagram_url); ?>" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($youtube_url) : ?>
                        <a href="<?php echo esc_url($youtube_url); ?>" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="promotion-text">
                    <?php echo esc_html($top_header_text); ?>
                </div>
                <div class="spacer"></div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Main Header -->
    <header id="masthead" class="site-header">
        <div class="header-container">
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                <?php endif; ?>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <?php
                if (class_exists('Cytonomics_Mega_Menu_Walker')) {
                    wp_nav_menu(array(
                        'theme_location'  => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container_class' => 'primary-menu-container',
                        'menu_class'     => 'primary-menu',
                        'walker'         => new Cytonomics_Mega_Menu_Walker(),
                        'fallback_cb'    => false
                    ));
                } else {
                    wp_nav_menu(array(
                        'theme_location'  => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container_class' => 'primary-menu-container',
                        'menu_class'     => 'primary-menu',
                        'fallback_cb'    => false
                    ));
                }
                ?>
                <!--here add search icon-->
                <div class="search-icon">
                    <i class="fas fa-search"></i>
                </div>
                <div class="nav-buttons">
                    <a href="#" class="nav-button get-started-button">Get Started</a>
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="menu-toggle-icon"></span>
                    </button>
                </div>
            </nav>
        </div>
    </header>

    <div id="content" class="site-content">

<style>
/* Reset and Base Styles */
:root {
    --primary-color: #00A3FF;
    --secondary-color: #FF3366;
    --dark-color: #1A1A1A;
    --light-color: #ffffff;
    --font-primary: 'Urbanist', sans-serif;
    --font-heading: 'Teko', sans-serif;
}

body {
    margin: 0;
    padding: 0;
    font-family: var(--font-primary);
}

.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
    width: 100%;
}

/* Top Header Styles */
.top-header {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    z-index: 1002 !important;
    transform: translateY(0) !important;
    transition: transform 0.3s ease !important;
    padding: 2px 0 !important;
}

.top-header-content {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: center;
    gap: 2rem;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
}

.social-links {
    display: flex !important;
    gap: 1rem !important;
    align-items: center !important;
}

.social-links a {
    color: var(--light-color) !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 28px !important;
    height: 28px !important;
    border-radius: 50% !important;
    background-color: rgba(255, 255, 255, 0.1) !important;
    border: none !important;
}

.social-links a:hover {
    background-color: rgba(255, 255, 255, 0.2) !important;
    transform: translateY(-2px) !important;
    color: var(--light-color) !important;
    text-decoration: none !important;
}

.social-links i {
    font-size: 14px !important;
    line-height: 1 !important;
}

.promotion-text {
    text-align: center;
    font-weight: 500;
    margin: 0;
    padding: 0;
}

/* Main Header Styles */
.site-header {
    position: fixed !important;
    top: 24px !important;
    left: 0 !important;
    right: 0 !important;
    z-index: 1001 !important;
    background-color: var(--light-color) !important;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05) !important;
    transform: translateY(0) !important;
    transition: transform 0.3s ease !important;
    padding: 0 !important;
    border-bottom-left-radius: 10px !important;
    border-bottom-right-radius: 10px !important;
}

.header-container {
    padding: 8px 7.5rem !important;
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    border-bottom-left-radius: 10px !important;
    border-bottom-right-radius: 10px !important;
    max-width: 100% !important;
    margin: 0 auto !important;
}

.site-branding {
    display: flex;
    align-items: center;
}

.custom-logo {
    max-height: 65px !important;
    width: auto !important;
    transition: all 0.3s ease !important;
}

/* Navigation Styles */
.main-navigation {
    display: flex;
    align-items: center;
    margin-left: auto;
}

.primary-menu-container {
    margin-right: 2rem;
}

.primary-menu {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 2rem;
}

.primary-menu > li > a {
    color: var(--dark-color);
    text-decoration: none;
    font-weight: 500;
    padding: 0.5rem 0;
    position: relative;
    transition: color 0.3s ease;
}

.primary-menu > li > a:hover {
    color:#E91E63;;
}

.nav-buttons {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.get-started-button {
    background-color: #E91E63;
    color: var(--light-color);
    padding: 0.75rem 2rem;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    white-space: nowrap;
	 border: 1px solid;
}

.get-started-button:hover {
    background-color: #fff;
    transform: translateY(-2px);
    color: #E91E63;
    border: 1px solid;
}

/* Mobile Menu Button */
.menu-toggle {
    display: none;
    background: none;
    border: none;
    padding: 10px;
    cursor: pointer;
}

.menu-toggle-icon,
.menu-toggle-icon::before,
.menu-toggle-icon::after {
    display: block;
    width: 24px;
    height: 2px;
    background-color: var(--dark-color);
    position: relative;
    transition: all 0.3s ease;
}

.menu-toggle-icon::before,
.menu-toggle-icon::after {
    content: '';
    position: absolute;
    left: 0;
}

.menu-toggle-icon::before {
    top: -8px;
}

.menu-toggle-icon::after {
    bottom: -8px;
}

/* Adjust content padding */
.site-content {
    padding-top: calc(24px + 80px) !important;
    position: relative !important;
    z-index: 1 !important;
}

/* Mobile Styles */
@media (max-width: 1440px) {
    @media (max-width: 1024px) {
        .container, .header-container {
            padding: 0 1rem;
        }

        .primary-menu {
            gap: 1rem;
        }
    }

    @media (max-width: 768px) {
        .top-header-content {
            grid-template-columns: 1fr;
            gap: 0.5rem;
            text-align: center;
        }

        .social-links {
            justify-content: center;
        }

        .promotion-text {
            font-size: 13px;
            padding: 0 10px;
        }

        .spacer {
            display: none;
        }

        .site-content {
            padding-top: 50px;
        }

        .menu-toggle {
            display: block;
        }

        .primary-menu-container {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: var(--light-color);
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .primary-menu-container.active {
            display: block;
        }

        .primary-menu {
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .primary-menu li {
            width: 100%;
            text-align: center;
        }

        .nav-buttons {
            justify-content: flex-end;
            width: 100%;
        }

        .get-started-button {
            display: none;
        }

        .header-container {
            padding: 6px 1rem !important;
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
        }

        .custom-logo {
            max-height: 65px;
        }
    }
}
</style>

<script>
jQuery(document).ready(function($) {
    // Mobile menu toggle
    $('.menu-toggle').click(function() {
        $('.primary-menu-container').toggleClass('active');
        $(this).toggleClass('active');
    });

    // Header scroll effect
    var lastScroll = 0;
    var scrollThreshold = 100;
    var headerHeight = $('.site-header').outerHeight();
    
    $(window).scroll(function() {
        var currentScroll = $(this).scrollTop();
        
        // Only hide header if scrolling down and past threshold
        if (currentScroll > lastScroll && currentScroll > scrollThreshold) {
            $('.site-header').css('transform', 'translateY(-' + headerHeight + 'px)');
            $('.top-header').css('transform', 'translateY(-100%)');
        } else {
            $('.site-header').css('transform', 'translateY(0)');
            $('.top-header').css('transform', 'translateY(0)');
        }
        
        // Add scrolled class for styling
        if (currentScroll > scrollThreshold) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }

        lastScroll = currentScroll;
    });
});
</script>

<!-- Search Overlay -->
<div class="search-overlay">
    <div class="search-overlay-content">
        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <?php wp_nonce_field('search_nonce', 'search_nonce_field'); ?>
            <div class="search-input-wrapper">
                <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'cytonomics'); ?>" value="<?php echo get_search_query(); ?>" name="s" required>
                <button type="submit" class="search-submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <button class="search-close">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

<style>
/* Search Icon Styles */
.search-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    padding: 0.5rem;
    margin-right: 1rem;
    transition: all 0.3s ease;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    z-index: 1000 !important;
}

.search-icon:hover {
    background-color: rgba(0, 0, 0, 0.05);
}

.search-icon i {
    font-size: 1.2rem;
    color: var(--dark-color);
    transition: color 0.3s ease;
}

.search-icon:hover i {
    color: var(--primary-color);
}

/* Search Overlay Styles */
.search-overlay {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100vh !important;
    background-color: rgba(255, 255, 255, 0.95) !important;
    display: none !important;
    justify-content: center !important;
    align-items: center !important;
    z-index: 99999 !important;
    opacity: 0 !important;
    transition: all 0.3s ease !important;
    backdrop-filter: blur(3px) !important;
}

.search-overlay.active {
    display: flex !important;
    opacity: 1 !important;
}

.search-overlay-content {
    width: 100% !important;
    max-width: 800px !important;
    padding: 2rem !important;
    position: relative !important;
    transform: translateY(0) !important;
    opacity: 0 !important;
    transition: all 0.3s ease !important;
    z-index: 100000 !important;
    background: white !important;
    border-radius: 12px !important;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1) !important;
}

.search-overlay.active .search-overlay-content {
    transform: translateY(0) !important;
    opacity: 1 !important;
}

/* Search Input Wrapper */
.search-input-wrapper {
    position: relative !important;
    z-index: 100001 !important;
    display: flex !important;
    align-items: center !important;
    background-color: #fff !important;
    border: 1px solid rgba(0, 0, 0, 0.1) !important;
    border-radius: 8px !important;
    overflow: hidden !important;
}

/* Search Field */
.search-field {
    flex: 1 !important;
    padding: 15px 20px !important;
    border: none !important;
    background: none !important;
    font-size: 16px !important;
    color: var(--dark-color) !important;
    width: 100% !important;
    outline: none !important;
}

/* Search Submit Button */
.search-submit {
    background: var(--primary-color) !important;
    border: none !important;
    color: #fff !important;
    padding: 15px 30px !important;
    cursor: pointer !important;
    font-size: 16px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    transition: all 0.3s ease !important;
    margin: 0 !important;
}

.search-submit:hover {
    background: #0093e9 !important;
}

/* Search Close Button */
.search-close {
    position: absolute !important;
    top: -50px !important;
    right: 0 !important;
    background: rgba(255, 255, 255, 0.1) !important;
    border: none !important;
    color: var(--dark-color) !important;
    width: 40px !important;
    height: 40px !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
    padding: 0 !important;
}

.search-close i {
    font-size: 20px !important;
}

.search-close:hover {
    background: rgba(0, 0, 0, 0.05) !important;
    transform: rotate(90deg) !important;
}

/* Mobile Styles */
@media (max-width: 768px) {
    .search-overlay {
        align-items: flex-start !important;
        padding-top: 80px !important;
    }

    .search-overlay-content {
        margin: 1rem !important;
        width: calc(100% - 2rem) !important;
    }

    .search-field {
        padding: 12px 15px !important;
        font-size: 14px !important;
    }

    .search-submit {
        padding: 12px 20px !important;
    }

    .search-close {
        top: -40px !important;
        right: 0 !important;
        width: 35px !important;
        height: 35px !important;
    }

    .search-close i {
        font-size: 18px !important;
    }
}
</style>

<script>
jQuery(document).ready(function($) {
    // Search functionality
    $('.search-icon').click(function() {
        $('.search-overlay').addClass('active');
        $('.search-field').focus();
        $('body').css('overflow', 'hidden');
    });

    $('.search-close').click(function() {
        $('.search-overlay').removeClass('active');
        $('body').css('overflow', '');
    });

    // Close search overlay on escape key
    $(document).keyup(function(e) {
        if (e.key === "Escape") {
            $('.search-overlay').removeClass('active');
            $('body').css('overflow', '');
        }
    });

    // Close search overlay when clicking outside the search content
    $('.search-overlay').click(function(e) {
        if ($(e.target).hasClass('search-overlay')) {
            $(this).removeClass('active');
            $('body').css('overflow', '');
        }
    });

    // Prevent form submission if search field is empty
    $('.search-form').submit(function(e) {
        var searchField = $(this).find('.search-field');
        if (searchField.val().trim() === '') {
            e.preventDefault();
            searchField.focus();
        }
    });

    // Mobile menu functionality
    $('.menu-toggle').click(function(e) {
        e.preventDefault();
        $('.primary-menu-container').addClass('active');
        $('body').addClass('menu-open');
        $(this).addClass('active');
    });

    $('.primary-menu-close').click(function(e) {
        e.preventDefault();
        $('.primary-menu-container').removeClass('active');
        $('body').removeClass('menu-open');
        $('.menu-toggle').removeClass('active');
    });

    // Toggle sub-menus
    $('.primary-menu .menu-item-has-children > a').click(function(e) {
        if ($(window).width() <= 768) {
            e.preventDefault();
            $(this).parent().toggleClass('active');
            $(this).siblings('.sub-menu').slideToggle(300);
        }
    });
});
</script>

<!-- WordPress Admin Bar Compatibility -->
<style>
.admin-bar .top-header {
    top: 32px !important;
}

.admin-bar .site-header {
    top: calc(32px + 24px) !important;
}

@media screen and (max-width: 782px) {
    .admin-bar .top-header {
        top: 46px !important;
    }
    
    .admin-bar .site-header {
        top: calc(46px + 24px) !important;
    }
}

/* Responsive Media Queries */
@media (max-width: 1440px) {
    .container,
    .top-header-content,
    .header-container {
        max-width: 1200px;
    }
}
</style>

<style>
/* Mobile Styles */
@media (max-width: 768px) {
    /* Hide top header on mobile */
    .top-header {
        display: none !important;
    }

    /* Fix main header position */
    .site-header {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        z-index: 1001 !important;
        width: 100% !important;
        background: #fff !important;
    }

    /* Header container adjustments */
    .header-container {
        padding: 6px 1rem !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }

    /* Logo size for mobile */
    .custom-logo {
        max-height: 65px !important;
    }

    /* Navigation and buttons */
    .main-navigation {
        display: flex !important;
        align-items: center !important;
        margin-left: auto !important;
    }

    /* Search Icon */
    .search-icon {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 40px !important;
        height: 40px !important;
        margin-right: 10px !important;
        z-index: 1002 !important;
    }

    /* Hamburger Menu Toggle */
    .menu-toggle {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 40px !important;
        height: 40px !important;
        background: none !important;
        border: none !important;
        padding: 0 !important;
        cursor: pointer !important;
        z-index: 1002 !important;
    }

    .menu-toggle-icon,
    .menu-toggle-icon::before,
    .menu-toggle-icon::after {
        display: block !important;
        width: 24px !important;
        height: 2px !important;
        background-color: #333 !important;
        position: relative !important;
        transition: all 0.3s ease !important;
    }

    .menu-toggle-icon::before,
    .menu-toggle-icon::after {
        content: '' !important;
        position: absolute !important;
        left: 0 !important;
    }

    .menu-toggle-icon::before {
        top: -8px !important;
    }

    .menu-toggle-icon::after {
        bottom: -8px !important;
    }

    /* Primary Menu Container */
    .primary-menu-container {
        display: none;
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: #ffffff !important;
        z-index: 9999 !important;
        overflow-y: auto !important;
        padding: 60px 20px 20px !important;
        height: 400px;
        transition: all 0.3s ease !important;
        opacity: 0 !important;
        visibility: hidden !important;
    }

    .primary-menu-container.active {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
    }

    /* Close Button */
    .menu-close {
        position: absolute !important;
        top: 15px !important;
        right: 15px !important;
        width: 40px !important;
        height: 40px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        background: rgba(0, 0, 0, 0.05) !important;
        border: none !important;
        border-radius: 50% !important;
        cursor: pointer !important;
        color: #333 !important;
        font-size: 28px !important;
        z-index: 10000 !important;
        transition: all 0.3s ease !important;
        transform: rotate(0deg) !important;
    }

    .menu-close:hover {
        background: rgba(0, 0, 0, 0.1) !important;
        transform: rotate(90deg) !important;
    }

    .menu-close:focus {
        outline: none !important;
    }

    /* Primary Menu */
    .primary-menu {
        display: flex !important;
        flex-direction: column !important;
        padding: 0 !important;
        margin: 0 !important;
        list-style: none !important;
        width: 100% !important;
    }

    .primary-menu > li {
        display: block !important;
        width: 100% !important;
        border-bottom: 1px solid rgba(0,0,0,0.05) !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .primary-menu > li:last-child {
        border-bottom: none !important;
    }

    /* Menu Items */
    .primary-menu > li > a {
        display: flex !important;
        align-items: center !important;
        justify-content: flex-start !important;
        padding: 15px 0 !important;
        color: #333333 !important;
        font-size: 16px !important;
        font-weight: 500 !important;
        text-decoration: none !important;
        transition: all 0.3s ease !important;
        width: 100% !important;
    }

    /* Remove Arrow for items with children */
    .primary-menu > li > a:after {
        display: none !important;
    }

    /* First menu item (HOME) color */
    .primary-menu > li:first-child > a {
        color: #00A3FF !important;
    }

    /* Sub-menus */
    .primary-menu .sub-menu {
        display: none !important;
        background: #ffffff !important;
        padding: 0 0 0 20px !important;
        margin: 0 !important;
        list-style: none !important;
        width: 100% !important;
    }

    .primary-menu .menu-item-has-children.active > .sub-menu {
        display: block !important;
    }

    .primary-menu .sub-menu li {
        display: block !important;
        width: 100% !important;
    }

    .primary-menu .sub-menu li a {
        display: block !important;
        padding: 12px 0 !important;
        font-size: 15px !important;
        color: #666666 !important;
        text-decoration: none !important;
        width: 100% !important;
    }

    /* Admin bar adjustment */
    .admin-bar .site-header {
        top: 46px !important;
    }

    /* Hide Get Started button on mobile */
    .get-started-button {
        display: none !important;
    }

    /* Navigation buttons container */
    .nav-buttons {
        display: flex !important;
        align-items: center !important;
        margin-left: 0 !important;
    }

    /* Content padding */
    .site-content {
        padding-top: 50px !important;
        margin-top: 0 !important;
    }
}

/* Additional styles */
<style>
/* Menu open state */
body.menu-open {
    overflow: hidden !important;
}

/* Active menu item styles */
.primary-menu > li.active > a {
    color: #00A3FF !important;
}

/* Active hamburger icon */
.menu-toggle.active .menu-toggle-icon {
    background-color: transparent !important;
}

.menu-toggle.active .menu-toggle-icon::before {
    transform: rotate(45deg) !important;
    top: 0 !important;
}

.menu-toggle.active .menu-toggle-icon::after {
    transform: rotate(-45deg) !important;
    bottom: 0 !important;
}

/* Fix for menu items visibility */
.primary-menu-container.active .primary-menu,
.primary-menu-container.active .primary-menu > li,
.primary-menu-container.active .primary-menu > li > a {
    display: block !important;
    visibility: visible !important;
    opacity: 1 !important;
}

/* Ensure sub-menus are visible when active */
.primary-menu .menu-item-has-children.active > .sub-menu {
    display: block !important;
    visibility: visible !important;
    opacity: 1 !important;
}
</style>


<style>
.primary-menu-close {
    display: none !important; /* Hidden by default for desktop */
}

@media (max-width: 768px) {
    .primary-menu-close {
        display: flex !important;
        position: absolute !important;
        top: 20px !important;
        left: 20px !important; /* Changed from right to left */
        width: 35px !important;
        height: 35px !important;
        background: #f5f5f5 !important;
        border: none !important;
        border-radius: 50% !important;
        align-items: center !important;
        justify-content: center !important;
        cursor: pointer !important;
        z-index: 10001 !important;
        transition: all 0.3s ease !important;
    }

    .primary-menu-close::before,
    .primary-menu-close::after {
        content: '' !important;
        position: absolute !important;
        width: 18px !important;
        height: 2px !important;
        background-color: #333 !important;
        transition: all 0.3s ease !important;
    }

    .primary-menu-close::before {
        transform: rotate(45deg) !important;
    }

    .primary-menu-close::after {
        transform: rotate(-45deg) !important;
    }

    .primary-menu-close:hover {
        background: #e5e5e5 !important;
        transform: rotate(90deg) !important;
    }

    .primary-menu-container {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        background: #ffffff !important;
        height: 400px !important;
        padding-top: 60px !important;
        z-index: 1000 !important;
        display: none;
        overflow-y: auto !important;
    }

    .primary-menu-container.active {
        display: block !important;
    }
}
</style>

<script>
jQuery(document).ready(function($) {
    // Add close button to primary menu container
    if (!$('.primary-menu-close').length) {
        $('.primary-menu-container').prepend('<button class="primary-menu-close" aria-label="Close Menu"></button>');
    }

    // Handle close button click
    $('.primary-menu-close').on('click', function() {
        $('.primary-menu-container').removeClass('active');
        $('body').removeClass('menu-open');
        $('.menu-toggle').removeClass('active');
    });

    // Close menu when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.primary-menu-container').length && 
            !$(e.target).closest('.menu-toggle').length) {
            $('.primary-menu-container').removeClass('active');
            $('body').removeClass('menu-open');
            $('.menu-toggle').removeClass('active');
        }
    });

    // Prevent menu from closing when clicking inside
    $('.primary-menu-container').on('click', function(e) {
        e.stopPropagation();
    });
});
</script>
<style>
/* Tablet View (768px - 1024px) */
@media (min-width: 769px) and (max-width: 1024px) {
    .header-container {
        padding: 8px 3rem !important;
    }

    .custom-logo {
        max-height: 65px !important;
        width: auto !important;
    }

    .main-navigation {
        margin-left: 1rem !important;
    }

    .primary-menu {
        gap: 1rem !important;
    }

    .primary-menu > li > a {
        padding: 0.5rem 0.75rem !important;
        font-size: 0.95rem !important;
    }

    .nav-buttons {
        gap: 0.75rem !important;
    }

    .get-started-button {
        padding: 0.5rem 1.25rem !important;
        font-size: 0.95rem !important;
    }

    .search-icon {
        width: 35px !important;
        height: 35px !important;
        margin-right: 0.75rem !important;
    }

    .search-icon i {
        font-size: 1.1rem !important;
    }
}

/* Mobile View (below 768px) */
@media (max-width: 768px) {
    .header-container {
        padding: 6px 1rem !important;
    }

    .custom-logo {
        max-height: 65px !important;
    }

    .main-navigation {
        margin-left: 0.5rem !important;
    }

    .search-icon {
        width: 32px !important;
        height: 32px !important;
        margin-right: 0.5rem !important;
    }

    .search-icon i {
        font-size: 1rem !important;
    }
}
</style>

<!-- Elementor Editor Compatibility -->
<style>
/* Fix header position in Elementor editor */
body.elementor-editor-active .site-header {
    position: relative !important;
    top: 0 !important;
    z-index: 99 !important;
}

body.elementor-editor-active .top-header {
    position: relative !important;
    top: 0 !important;
    z-index: 100 !important;
}

body.elementor-editor-active .site-content {
    padding-top: 0 !important;
    margin-top: 0 !important;
}

/* Ensure proper z-index in Elementor editor */
body.elementor-editor-active .elementor-section-wrap {
    position: relative !important;
    z-index: 1 !important;
}

/* Maintain header styles in Elementor editor */
body.elementor-editor-active .header-container {
    padding: 8px 4.5rem !important;
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
}

/* Tablet View (768px - 1024px) */
@media (min-width: 769px) and (max-width: 1024px) {
    body.elementor-editor-active .header-container {
        padding: 8px 3rem !important;
    }
}

/* Mobile View (below 768px) */
@media (max-width: 768px) {
    body.elementor-editor-active .header-container {
        padding: 6px 1rem !important;
    }
}
</style>
    </div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html> 