/**
 * Cytonomics Admin Menu JavaScript
 */
(function($) {
    'use strict';

    // Initialize when document is ready
    $(document).ready(function() {
        // Add a notice if no templates are found
        if ($('.field-mega-menu-template select option').length <= 1) {
            $('.field-mega-menu-template').append(
                '<div class="notice notice-warning inline" style="margin-top: 10px;">' +
                '<p>No Elementor templates found. Please create a template in Elementor → Templates → Add New.</p>' +
                '</div>'
            );
        }

        // Add a link to create a new template
        $('.field-mega-menu-template').append(
            '<p class="description" style="margin-top: 10px;">' +
            '<a href="' + elementorAdminConfig.admin_url + 'edit.php?post_type=elementor_library" target="_blank">' +
            'Create a new template</a>' +
            '</p>'
        );

        // Add a refresh button to reload templates
        $('.field-mega-menu-template').append(
            '<p class="description" style="margin-top: 10px;">' +
            '<a href="#" class="refresh-templates">Refresh templates list</a>' +
            '</p>'
        );

        // Handle refresh button click
        $('.refresh-templates').on('click', function(e) {
            e.preventDefault();
            
            // Show loading indicator
            $(this).text('Loading...');
            
            // Reload the page
            location.reload();
        });
    });

})(jQuery); 