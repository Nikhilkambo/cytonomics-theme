/**
 * Cytonomics Mega Menu JavaScript
 * Handles the display and interaction of mega menus
 */
(function($) {
    'use strict';

    // Check if jQuery is loaded
    if (typeof jQuery === 'undefined') {
        return;
    }

    // Initialize when document is ready
    $(document).ready(function() {
        // Variables
        var activeMenu = null;
        var hoverTimeout = null;
        var MEGA_MENU_DELAY = 50;
        var MEGA_MENU_TOP = 120;
        var MEGA_MENU_HEIGHT = 'calc(100vh - ' + MEGA_MENU_TOP + 'px)';
        var MEGA_MENU_STYLES = {
            position: 'fixed',
            top: MEGA_MENU_TOP + 'px',
            left: '0',
            width: '100%',
            height: MEGA_MENU_HEIGHT,
            background: 'rgb(250, 250, 250)',
            zIndex: '98',
            overflowY: 'auto'
        };
        
        // Hide all mega menus by default
        $('.mega-menu-template-container').hide();
        
        /**
         * Show mega menu
         * @param {string} templateId - The ID of the template to show
         */
        function showMegaMenu(templateId) {
            if (activeMenu === templateId) return;
            
            var $container = $('#mega-menu-' + templateId);
            if ($container.length) {
                // Hide any other open menus
                $('.mega-menu-template-container').hide();
                
                // Show this menu
                $container.show().css(MEGA_MENU_STYLES);
                
                // Ensure content is properly aligned
                $container.find('.mega-menu-content').css({
                    width: '100%',
                    maxWidth: '1200px',
                    margin: '0 auto',
                    padding: '20px',
                    position: 'relative',
                    zIndex: '1'
                });
                
                // Ensure Elementor content is properly aligned
                $container.find('.elementor').css({
                    width: '100%',
                    position: 'relative',
                    zIndex: '1'
                });
                
                $container.find('.e-con-inner').css({
                    width: '100%',
                    maxWidth: '1200px',
                    margin: '0 auto',
                    padding: '0 20px',
                    position: 'relative',
                    zIndex: '1'
                });
                
                // Add class to body
                $('body').addClass('mega-menu-active');
                activeMenu = templateId;
            }
        }
        
        /**
         * Hide mega menu
         */
        function hideMegaMenu() {
            if (activeMenu) {
                $('#mega-menu-' + activeMenu).hide();
                // Remove class from body
                $('body').removeClass('mega-menu-active');
                activeMenu = null;
            }
        }
        
        // Handle menu item hover
        $('.menu-item a[data-mega-template-id]').hover(
            function() {
                var templateId = $(this).data('mega-template-id');
                clearTimeout(hoverTimeout);
                hoverTimeout = setTimeout(function() {
                    showMegaMenu(templateId);
                }, MEGA_MENU_DELAY);
            },
            function() {
                clearTimeout(hoverTimeout);
                hoverTimeout = setTimeout(function() {
                    hideMegaMenu();
                }, MEGA_MENU_DELAY);
            }
        );
        
        // Handle mega menu container hover
        $('.mega-menu-template-container').hover(
            function() {
                clearTimeout(hoverTimeout);
            },
            function() {
                clearTimeout(hoverTimeout);
                hoverTimeout = setTimeout(function() {
                    hideMegaMenu();
                }, MEGA_MENU_DELAY);
            }
        );
        
        // Close on click outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.mega-menu-template-container, .menu-item a[data-mega-template-id]').length) {
                hideMegaMenu();
            }
        });
    });

})(jQuery); 