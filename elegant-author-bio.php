<?php 

/**
 * Plugin Name: Elegant Author Bio
 * Plugin URI: https://wpartstudio.com
 * Author: Ashikur Rahman
 * Author URI: https://facebook.com/ashikjoy.akash
 * Version: 1.0
 * Licence: GPL2
 * Description: Clean and Professional Author Bio comes with widgets and shortcode
 */


 // reject if try to access direct
if(!defined('ABSPATH')){
    exit;
}

// require the autolaod
require_once __DIR__ . '/vendor/autoload.php';

// Our plugin main class
final class Elegant_author_bio{


    // current plugin version
    static $version = '1.0';
   

    private function __construct()
    {
        $this->define_constants();

        register_activation_hook( __FILE__, [$this, 'active'] );

        add_action('plugins_loaded', [$this, 'init_plugin']);
    }

    // singleton method
    /**
     * @return \Elegant_author_bio class
     */
    public static function init(){

        static $instance = false;

        if(!$instance){
            $instance = new self();
        }

        return $instance;


    }

    // define constants
    public function define_constants(){
        define('Elegant_author_bio_version', [$this, self::$version]);
        define('EAB_FILE', __FILE__);
        define('EAB_PATH', __DIR__);
        define('EAB_URL', plugins_url('', EAB_FILE));
        define('EAB_ASSETS', EAB_URL.'/assets');

    }


    // init plugin after plugins_loaded hook
    public function init_plugin(){

        // all the class will be initialized here through naespace
        // load this class only for the admin
        if(is_admin()){
            new Wpartstudio\ElegantAuthorBio\Admin\Admin();
        }else{
            new Wpartstudio\ElegantAuthorBio\Frontend\Frontend();
        }
        

    }

    // active function

    public function active(){

        // getting timestamp for the first installation and activate
        $install = get_option('eab_installed');

        if(!$install){
            update_option('eab_installed', time());
        }

        update_option('elegant_author_bio_version', Elegant_author_bio_version);
    }

    

    

}


// instansiate the class through a funciton 
/**
 * @return \Elegant_author_bio 
 */
function elegant_author_bio(){
    return Elegant_author_bio::init();
}

// finally run the plugin to be executed
elegant_author_bio();

