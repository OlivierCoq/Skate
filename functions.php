<?php
/**
 *
 * @package Skate-Theme
*/

/**
 * Here, I enqueue my basic .js and .css files, the way WordPress likes it to be done.
 */
function skate_theme_scripts() {
    
        //Enqueing the CSS, WordPress style!
	wp_enqueue_style( 'Skate-style', get_template_directory_uri() . '/dist/css/production.min.css', false );
    
        //Enqueue my custom script:
    wp_enqueue_script( 'Skate-js', get_template_directory_uri() . '/dist/js/production.min.js',  1.2, false );
    
        //Localize it so AJAX knows to use wp-admin/admin-ajax.php file OUTSIDE of the wp-content folder:
    wp_localize_script('Skate-js', 'theAjaxData',
     array( 'ajaxurl' => admin_url('admin-ajax.php'), )
  
    );
}
add_action( 'wp_enqueue_scripts', 'skate_theme_scripts' );