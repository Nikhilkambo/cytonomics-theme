<?php
/**
 * The template for displaying the footer
 *
 * @package Cytonomics
 */
?>

    </div><!-- #content -->

    <!-- Add Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Add Teachers Font -->
    <link href="https://fonts.googleapis.com/css2?family=Teachers:wght@400;500;600;700&display=swap" rel="stylesheet">

    <footer id="colophon" class="site-footer">
        <div class="footer-background"></div>
        <div class="footer-content">
            <div class="footer-grid">
                <div class="footer-column">
                    <?php 
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    if (has_custom_logo()) : ?>
                        <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="footer-logo">
                    <?php else : ?>
                        <h2 class="site-title"><?php bloginfo('name'); ?></h2>
                    <?php endif; ?>
                    <p class="footer-description">
                        Advancing genomic science through cutting-edge research and comprehensive genetic testing services.
                    </p>
                    <div class="footer-social">
                        <?php if (get_theme_mod('facebook_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" target="_blank" class="social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('twitter_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('twitter_url')); ?>" target="_blank" class="social-icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('instagram_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('instagram_url')); ?>" target="_blank" class="social-icon">
                                <i class="fab fa-instagram"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('youtube_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('youtube_url')); ?>" target="_blank" class="social-icon">
                                <i class="fab fa-youtube"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="/services">Our Services</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/research">Research</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3 class="footer-title">Contact Us</h3>
                    <div class="footer-contact">
                        <p><i class="fas fa-map-marker-alt"></i> 123 Genomics Way, Science Park</p>
                        <p><i class="fas fa-phone"></i> (555) 123-4567</p>
                        <p><i class="fas fa-envelope"></i> info@cytonomics.com</p>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3 class="footer-title">Newsletter</h3>
                    <div class="footer-newsletter">
                        <form action="#" method="post">
                            <input type="email" placeholder="Enter your email" required>
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php echo esc_html(get_bloginfo('name')); ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<style>
.site-footer {
    position: relative;
    background-color: <?php echo esc_attr(get_theme_mod('footer_bg_color', '#1A1A1A')); ?>;
    color: <?php echo esc_attr(get_theme_mod('footer_text_color', '#B3B3B3')); ?>;
    padding: 60px 0 30px;
    overflow: hidden;
}

.footer-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url('<?php echo esc_url(get_theme_mod('footer_background_image', get_template_directory_uri() . '/assets/images/dna-background.png')); ?>');
    background-size: cover;
    background-position: center;
    opacity: <?php echo esc_attr(get_theme_mod('footer_bg_opacity', '0.1')); ?>;
    z-index: 1;
}

.footer-content {
    position: relative;
    z-index: 2;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    margin-bottom: 40px;
}

.footer-column {
    display: flex;
    flex-direction: column;
}

.footer-logo {
    max-width: <?php echo esc_attr(get_theme_mod('footer_logo_size', '200')); ?>px;
    margin-bottom: 20px;
}

.footer-description {
    color: <?php echo esc_attr(get_theme_mod('footer_text_color', '#B3B3B3')); ?>;
    line-height: 1.6;
    margin-bottom: 20px;
}

/* Social Media Icons */
.footer-social {
    display: flex;
    gap: 15px;
    margin-top: 20px;
}

.social-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    color: #fff;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-icon:hover {
    background: <?php echo esc_attr(get_theme_mod('footer_link_color', '#E01A64')); ?>;
    transform: translateY(-3px);
    color: #fff;
}

.social-icon i {
    font-size: 16px;
}

.footer-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
    color: #fff;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links a {
    color: <?php echo esc_attr(get_theme_mod('footer_text_color', '#B3B3B3')); ?>;
    text-decoration: none;
    transition: color 0.3s ease;
    display: flex;
    align-items: center;
}

.footer-links a:hover {
    color: <?php echo esc_attr(get_theme_mod('footer_link_color', '#E01A64')); ?>;
}

.footer-contact {
    color: <?php echo esc_attr(get_theme_mod('footer_text_color', '#B3B3B3')); ?>;
}

.footer-contact p {
    margin-bottom: 12px;
    display: flex;
    align-items: center;
}

.footer-contact i {
    margin-right: 10px;
    color: <?php echo esc_attr(get_theme_mod('footer_link_color', '#E01A64')); ?>;
    width: 16px;
}

.footer-newsletter form {
    display: flex;
    gap: 0px;
}

.footer-newsletter input[type="email"] {
    flex: 1;
    padding: 10px;
    border: none;
    background: #fff;
    color: #000;
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
    font-family: 'Teachers', sans-serif;
    font-weight: 500;
    font-size: 15px;
    line-height: 1.5;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.footer-newsletter input[type="email"]::placeholder {
    font-family: 'Teachers', sans-serif;
    font-weight: 500;
    font-size: 16px;
    line-height: 1.5;
    letter-spacing: 0.5px;
    color: #666666;
}

.footer-newsletter input[type="email"]:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(224, 26, 100, 0.2);
}

.footer-newsletter button {
    padding: 10px 15px;
    background: <?php echo esc_attr(get_theme_mod('footer_link_color', '#E01A64')); ?>;
    color: #fff;
    border: none;
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
    font-family: 'Teachers', sans-serif;
    font-weight: 600;
    font-size: 15px;
    line-height: 1.5;
    letter-spacing: 0.5px;
}

.footer-newsletter button:hover {
    background: #FF1493;
}

.footer-bottom {
    text-align: center;
    padding-top: 30px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.footer-bottom p {
    color: <?php echo esc_attr(get_theme_mod('footer_text_color', '#B3B3B3')); ?>;
    font-size: 14px;
}

@media (max-width: 768px) {
    .footer-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .footer-newsletter input[type="email"] {
        padding: 12px;
        font-size: 14px;
    }
    
    .footer-newsletter input[type="email"]::placeholder {
        font-size: 14px;
    }
    
    .footer-newsletter button {
        padding: 8px 12px;
        font-size: 14px;
    }
    
    .social-icon {
        width: 32px;
        height: 32px;
    }
}
</style>

</body>
</html> 