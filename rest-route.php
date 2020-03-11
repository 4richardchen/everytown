<?php
// 
if ( ! defined( 'WPINC' ) ) {
    die;
}

class RestApiRoutes {
    protected $namespace = '/et/v1';

    public function __construct() {

        //
        add_action( 'rest_api_init', function () {
            register_rest_route( $this->namespace, '/contact-us', array(
                'methods' => 'POST',
                'callback' => array($this, 'handle_contact_form'),
            ));

        });

    }

    public function handle_contact_form(WP_REST_Request $request) {

        // logic for creating a new contact form submission
        $new_post_args = array(
            'post_type' => 'contact',
            'post_status' => 'publish',
            'comment_status' => 'closed',
            'ping_status' => 'closed',
            'meta_input' => array(
                'name' => $request->get_param('sender_name'),
                'email' => $request->get_param('sender_email'),
                //directions don't ask to store sender_message
             ),
        );
        $new_post_id = wp_insert_post($new_post_args);
        return array('post_id' => $new_post_id );
    }

    
}

new RestApiRoutes();

?>