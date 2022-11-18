<?php 

namespace Wpartstudio\ElegantAuthorBio\Admin\Menu;

class Menu{

    public function __construct()
    {
        add_action('admin_menu', [$this, 'admin_menu']);

        add_action('init', [$this, 'register_menu']);
        
    }

    public function admin_menu(){
        add_menu_page( "Author Bio Plugin By WP art Studio", "Elgant Author Bio", "manage_options", "eab", [$this, 'eab_page'], 'dash-icon-paint' );
    }

    // plugin admin page content
    public function eab_page(){
        echo "Hello ki khobor";
    }


    public function register_menu(){
        register_nav_menus(array(
            'eab-side-menu' => 'EAB Sidebar menu'
        ));
    }
    

}


