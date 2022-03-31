<?php

/**
 * Plugin Name:       My CRUD Plugin
 * Plugin URI:        #
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Dhrubo
 * Author URI:        #
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        #
 * Text Domain:       crud-plugin
 * Domain Path:       /languages
 */

defined('ABSPATH')||die();

final class Crud_Plugin{

    const version = '1.0.0';
    /**
     * Class Constructor
     */
    private function __construct(){
        $this->define_constants();
        register_activation_hook(__FILE__, [$this, 'activate']);
        add_action('plugins_loaded', [$this, 'init_plugin']);
    }

    /**
     * Initializing a singleton instance
     * @return curd_plugin
     */
    public static function init(){
        static $instance = false;

        if(!$instance){
            $instance=new self();
        }

        return $instance;
    }

    /**
     * Define required plugin
     */
    public function define_constants(){
        define('CP_VERSION', self::version);
        define('CP_FILE', __FILE__);
        define('CP_PATH', __DIR__);
        define('CP_URL', plugins_url('', CP_FILE));
        define('CP_ASSETS', CP_URL.'/assets');
    }

    public function activate(){
        include_once CP_PATH.'/includes/Installer.php';
        $installer = new Installer();
        $installer->run();
    }

    /**
     *Initialize the plugin
     */
    public function init_plugin(){
        include_once 'includes/Initializer.php';
        new Initializer();
    }
}

function crud_plugin(){
    return Crud_Plugin::init();


}

crud_plugin();