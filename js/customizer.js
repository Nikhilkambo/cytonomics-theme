/* global wp, jQuery */

(function($) {
    'use strict';

    // Site title and description.
    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title a').text(to);
        });
    });

    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });

    // Logo size
    wp.customize('cytonomics_logo_size', function(value) {
        value.bind(function(to) {
            $('.custom-logo').css({
                'width': to + 'px',
                'height': 'auto'
            });
        });
    });

    // Primary color
    wp.customize('cytonomics_primary_color', function(value) {
        value.bind(function(to) {
            document.documentElement.style.setProperty('--primary-color', to);
            
            // Update specific elements
            $('.primary-color-bg').css('background-color', to);
            $('.primary-color-text').css('color', to);
            $('a:not(.button)').css('color', to);
        });
    });

    // Secondary color
    wp.customize('cytonomics_secondary_color', function(value) {
        value.bind(function(to) {
            document.documentElement.style.setProperty('--secondary-color', to);
            
            // Update specific elements
            $('.secondary-color-bg').css('background-color', to);
            $('.secondary-color-text').css('color', to);
            $('.button.secondary').css('background-color', to);
        });
    });

    // Accent color
    wp.customize('cytonomics_accent_color', function(value) {
        value.bind(function(to) {
            document.documentElement.style.setProperty('--accent-color', to);
            
            // Update specific elements
            $('.accent-color-bg').css('background-color', to);
            $('.accent-color-text').css('color', to);
            $('.button.accent').css('background-color', to);
        });
    });

})(jQuery); 