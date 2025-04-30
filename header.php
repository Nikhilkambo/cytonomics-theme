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
            padding: 0;
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
            display: block !important;
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
            /* Hide top header on mobile */
            .top-header {
                display: none !important;
            }

            /* Adjust main header for mobile */
            .site-header {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                right: 0 !important;
                z-index: 1001 !important;
                background: #fff !important;
                border-radius: 0 !important;
                box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1) !important;
            }

            .header-container {
                padding: 10px 20px !important;
                border-radius: 0 !important;
            }

            /* Logo size for mobile */
            .custom-logo {
                max-height: 45px !important;
                width: auto !important;
            }

            /* Navigation and buttons */
            .main-navigation {
                display: flex !important;
                align-items: center !important;
                margin-left: auto !important;
            }

            /* Hide Get Started button on mobile */
            .get-started-button {
                display: none !important;
            }

            /* Mobile Menu Container */
            .primary-menu-container {
                display: none;
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                right: 0 !important;
                bottom: 0 !important;
                background: #FAFAFA !important;
                z-index: 99999 !important;
                overflow: hidden !important;
                height: 100vh !important;
                transition: all 0.3s ease !important;
                opacity: 0 !important;
                visibility: hidden !important;
                padding: 0 !important;
            }

            .primary-menu-container.active {
                display: block !important;
                opacity: 1 !important;
                visibility: visible !important;
            }

            /* Close Button */
            .primary-menu-close {
                position: fixed !important;
                top: 25px !important;
                right: 25px !important; /* Changed from left to right */
                width: 20px !important;
                height: 20px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                background: transparent !important;
                border: none !important;
                cursor: pointer !important;
                padding: 0 !important;
                color: #000 !important;
                z-index: 100000 !important;
                font-size: 20px !important;
            }

            /* Hide search icon in menu */
            .primary-menu-container .search-icon,
            .primary-menu-container.active .search-icon {
                display: none !important;
            }

            /* Menu Items Container */
            .primary-menu {
                padding: 80px 30px !important;
                margin: 0 !important;
                list-style: none !important;
                text-align: center !important;
                height: 100vh !important;
                display: flex !important;
                flex-direction: column !important;
                justify-content: center !important;
            }

            .primary-menu > li {
                margin: 15px 0 !important;
                border: none !important;
            }

            .primary-menu > li > a {
                display: inline-block !important;
                padding: 0 !important;
                font-size: 25px !important;
                color: #000000 !important;
                text-align: center !important;
                width: auto !important;
                position: relative !important;
                font-weight: 400 !important;
                text-decoration: none !important;
                font-family: 'Urbanist', sans-serif !important;
                line-height: 1.6 !important;
            }

            /* Sub Menu Arrows */
            .primary-menu .menu-item-has-children > a:after {
                content: '\f107' !important;
                font-family: 'FontAwesome' !important;
                margin-left: 8px !important;
                transition: transform 0.3s !important;
                display: inline-block !important;
                font-size: 16px !important;
                color: #666 !important;
            }

            /* About Us Link Color */
            .primary-menu > li > a[href*="about-us"],
            .primary-menu > li > a[href*="about"] {
                color: #00A3FF !important;
            }

            /* Remove mobile menu header */
            .mobile-menu-header {
                display: none !important;
            }

            /* Hide Get Started button on mobile menu */
            .get-started-button {
                display: none !important;
            }

            /* Adjust menu toggle icon */
            .menu-toggle-icon,
            .menu-toggle-icon::before,
            .menu-toggle-icon::after {
                width: 20px !important;
                height: 2px !important;
                background-color: #000 !important;
                display: block !important;
                position: absolute !important;
                right: 0 !important;
            }

            .menu-toggle-icon {
                top: 50% !important;
                transform: translateY(-50%) !important;
            }

            .menu-toggle-icon::before {
                content: '' !important;
                top: -6px !important;
            }

            .menu-toggle-icon::after {
                content: '' !important;
                bottom: -6px !important;
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

        /* WordPress Admin Bar Compatibility */
        .admin-bar .site-header {
            top: calc(32px + 24px) !important;
        }

        @media screen and (max-width: 782px) {
            .admin-bar .site-header {
                top: calc(46px) !important;
            }
            
            .custom-logo {
                max-height: 65px !important;
            }
        }

        .mobile-menu-header {
            display: none !important;
        }

        @media (max-width: 768px) {
            .mobile-menu-header {
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
                padding: 20px 20px 0 20px !important;
                width: 100%;
                box-sizing: border-box;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 100001;
                background: #fff;
                border: none;
            }
            .mobile-menu-header .custom-logo {
                max-height: 38px !important;
                width: auto !important;
            }
            .primary-menu-close {
                position: static !important;
                width: 32px !important;
                height: 32px !important;
                color: #000 !important;
                font-size: 28px !important;
                background: transparent !important;
                border: none !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                z-index: 100002 !important;
            }
            .primary-menu {
                padding: 70px 0 0 0 !important;
                margin: 0 !important;
                list-style: none !important;
                text-align: left !important;
                height: 100vh !important;
                display: flex !important;
                flex-direction: column !important;
                justify-content: flex-start !important;
                align-items: flex-start !important;
                background: #FAFAFA!important;
            }
            .primary-menu > li {
                margin: 0 !important;
                border: none !important;
                width: 100%;
            }
            .primary-menu > li > a {
                display: block !important;
                padding: 12px 24px !important;
                font-size: 25px !important;
                color: #000000 !important;
                text-align: left !important;
                width: 100% !important;
                font-weight: 400 !important;
                text-decoration: none !important;
                font-family: 'Urbanist', sans-serif !important;
                line-height: 1.3 !important;
                box-sizing: border-box;
                background: none !important;
            }
            .primary-menu .menu-item-has-children > a:after {
                margin-left: 8px !important;
                font-size: 15px !important;
            }
            .primary-menu > li > a[href*="about-us"],
            .primary-menu > li > a[href*="about"] {
                color: #00A3FF !important;
            }
            /* Remove any stray dots or artifacts */
            .primary-menu li:before,
            .primary-menu li:after {
                display: none !important;
                content: none !important;
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
    display: block !important;
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
        $('.search-icon').show();
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
    /* Hamburger Menu Header Row */
    .mobile-menu-header {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        padding: 0px 20px 0 20px !important;
        width: 100%;
        box-sizing: border-box;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 100001;
        background: #fff;
        border: none;
    }
    .mobile-menu-header .custom-logo {
        max-height: 65px !important;
        width: auto !important;
    }
    .primary-menu-close {
        position: static !important;
        width: 32px !important;
        height: 32px !important;
        color: #000 !important;
        font-size: 28px !important;
        background: transparent !important;
        border: none !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        z-index: 100002 !important;
    }
    .primary-menu {
        padding: 70px 0 0 0 !important;
        margin: 0 !important;
        list-style: none !important;
        text-align: left !important;
        height: 100vh !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: flex-start !important;
        align-items: flex-start !important;
        background: #fff;
        gap: 0;
    }
    .primary-menu > li {
        margin: 0 !important;
        border: none !important;
        width: 100%;
    }
    .primary-menu > li > a {
        display: block !important;
        padding: 12px 24px !important;
        font-size: 25px !important;
        color: #000000 !important;
        text-align: left !important;
        width: 100% !important;
        font-weight: 400 !important;
        text-decoration: none !important;
        font-family: 'Urbanist', sans-serif !important;
        line-height: 1.3 !important;
        box-sizing: border-box;
        background: none !important;
    }
    .primary-menu .menu-item-has-children > a:after {
        margin-left: 8px !important;
        font-size: 15px !important;
    }
    .primary-menu > li > a[href*="about-us"],
    .primary-menu > li > a[href*="about"] {
        color: #00A3FF !important;
    }
    /* Remove any stray dots or artifacts */
    .primary-menu li:before,
    .primary-menu li:after {
        display: none !important;
        content: none !important;
    }
    .menu-arrow {
        font-size: 20px !important;
    }
}

/* Ensure menu stays on top */
.primary-menu-container.active {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
    z-index: 99999 !important;
    background: #ffffff !important;
}
</style>

<script>
jQuery(document).ready(function($) {
    // Add mobile menu header with logo and close button if not present
    if ($('.mobile-menu-header').length === 0) {
        var logoHtml = $('.site-branding').html();
        $('.primary-menu-container').prepend(
            '<div class="mobile-menu-header">' +
                logoHtml +
                '<button class="primary-menu-close" aria-label="Close Menu"><i class="fas fa-times"></i></button>' +
            '</div>'
        );
    }
    // Move close button click handler to new header
    $('.primary-menu-close').off('click').on('click', function() {
        $('.primary-menu-container').removeClass('active');
        $('body').removeClass('menu-open');
        $('.search-icon').show();
    });
});
</script>

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