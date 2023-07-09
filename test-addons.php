<?php
/**
 * Plugin Name: Test Addons
 * Plugin URI:  https://huzaifa.im
 * Author:      Huzaifa Al Mesbah
 * Author URI:  https://huzaifa.im
 * Description: This Test Addons
 * Version:     0.1.0
 * License:     GPL-2.0+
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: test-addons
*/

if (!defined('ABSPATH')){
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

final class Test_Addons {
     /**
     * Plugin version
     *
     * @var string
     */
    const version = '0.1.0';

    

    /**
     * Class construcotr
     */
    private function __construct() {
        $this->define_constants();
        
        register_activation_hook( __FILE__, [ $this, 'activate' ] );
        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }
    /**
     * Initializes Instance 
     *
     * @return \Test_Addons
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }
        /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'TEST_ADDONS_VERSION', self::version );
        define( 'TEST_ADDONS_FILE', __FILE__ );
        define( 'TEST_ADDONS_PATH', __DIR__ );
        define( 'TEST_ADDONS_URL', plugins_url( '', TEST_ADDONS_FILE ) );
        define( 'TEST_ADDONS_ASSETS', TEST_ADDONS_URL . '/assets' );
    }
    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {
        new TestAddons\Widgets();

        if ( is_admin() ) {
            new TestAddons\Admin();
        } else {
            new TestAddons\Frontend();
        }

    }
    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installed = get_option( 'test_addons_installed' );

        if ( ! $installed ) {
            update_option( 'test_addons_installed', time() );
        }

        update_option( 'test_addons_version', TEST_ADDONS_VERSION );
    }
}
/**
 * Initializes the main plugin
 *
 * @return \Test_Addons
 */
function test_addons() {
    return Test_Addons::init();
}

// kick of the plugins

test_addons();