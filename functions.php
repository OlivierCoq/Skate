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


/*Navigation Menus:*/
register_nav_menus(array(
    'primary'   => __('Primary Menu'), 
    'footer'    => __('Footer Menu'),
));



/**
 *My PHP script for sending the lead's information:
 */
function send_email() {   
    
        //WordPress doesn't automatically allow html emails, so I need to add filter:
    function wpdocs_set_html_mail_content_type() {
        return 'text/html';
    };

    add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
        
        if (         //Regex for validation
                //isset($_POST['first'], $_POST['last']) &&
                strlen($_POST['first']) > 2 &&
                strlen($_POST['last']) > 2 &&
                strlen($_POST['zip']) == 5 &&
				preg_match('/^[a-zA-Z\s]+$/', $_POST['first']) &&
				preg_match('/^[a-zA-Z\s]+$/', $_POST['last']) &&
				preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD', $_POST['email']) &&
                strlen($_POST['phone'] <= 15)
            ) {
            
            
            $first = $_POST['first'];
            $last = $_POST['last'];
            $zip = $_POST['zip'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $skating = $_POST['lessCheck'];
            
            
            $to = "coq.olivier36@gmail.com"; 
				
            $subject = "Junior Skater Sign-up Form";
            $headers = "From: Skate!\r\n"; 
            $headers = "Reply-To: $email\r\n"; 
            $headers .= "BCC: coq.olivier36@gmail.com";  
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset='utf-8'\r\n";    

				
            $message = "<html><body>";
            $message .= "<table rules='all' style='border: 1px solid #fdfdfd; width: 100%; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.45);' cellpadding='10'>";
                
            $message .= "<tr style='background-color: #5bb85d;'><td></td><td style='background-color: #3c7b3d;'></td></tr>";
            $message .= "<tr><td><strong>First Name: </strong></td> <td>" . $first . "</td></tr>";
            $message .= "<tr><td><strong>Last Name: </strong></td> <td>" . $last . "</td></tr>";
            $message .= "<tr><td><strong>Zip Code: </strong></td> <td>" . $zip . "</td></tr>";
            $message .= "<tr><td><strong>Phone: </strong></td> <td>" . $phone . "</td></tr>";
            $message .= "<tr><td><strong>Email: </strong></td> <td>" . $email . "</td></tr>";
            $message .= "<tr><td><strong>Skating Lessons: </strong></td> <td>" . $skating . "</td></tr>";
                        
            $message .= "</table>";   
            $message .= "</body><html>"; 

            wp_mail($to, $subject, $message, $headers);
            
                //Remove to avoid conflicts
            remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
   } else {
            return false;    
        };
          
    wp_die();
};
    //Include WordPress's native AJAX controllers, since WordPress loves to control everything.
add_action('wp_ajax_send_email', 'send_email');
add_action('wp_ajax_nopriv_send_email', 'send_email'); 