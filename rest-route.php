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
        
        return array('post_id' => $new_post_id );
    }

    
}

new RestApiRoutes();

?>