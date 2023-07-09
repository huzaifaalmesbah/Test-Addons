<?php
namespace TestAddons\Admin;

class Menu {
     function __construct() {
        add_action( 'admin_menu', [$this, 'admin_menu'], );
    }
    public function admin_menu() {
        add_menu_page( __('Test Addons', 'test-addons'), __('Test Addons','test-addons'), 'manage_options', 'test-addons', [ $this, 'test_page' ], 'dashicons-arrow-down-alt' );
        
    }

    public function test_page() {
        echo 'hello';
        
    }
}


/**
 * The Menu handler class
 */
// class Menu {

//     /**
//      * Initialize the class
//      */
//     function __construct() {
//         add_action( 'admin_menu', [ $this, 'admin_menu' ] );
//     }

//     /**
//      * Register admin menu
//      *
//      * @return void
//      */
//     public function admin_menu() {
//         add_menu_page( __( 'weDevs Academy', 'wedevs-academy' ), __( 'Academy', 'wedevs-academy' ), 'manage_options', 'wedevs-academy', [ $this, 'plugin_page' ], 'dashicons-welcome-learn-more' );
//     }

//     /**
//      * Render the plugin page
//      *
//      * @return void
//      */
//     public function plugin_page() {
//         echo 'Hello World';
//     }
// }