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