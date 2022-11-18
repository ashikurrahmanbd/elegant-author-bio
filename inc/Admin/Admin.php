<?php

namespace Wpartstudio\ElegantAuthorBio\Admin;


class Admin{

    public function __construct()
    {
        new Menu\Menu();

        

        add_filter('user_contactmethods', [$this, 'admin_user_info']);

      
    }


    // function for admin user info
    public function admin_user_info($methods){

        $methods['twitter'] = __('Twitter', 'eab');
        $methods['facebook'] = __('Facebook', 'eab');
        $methods['linkedin'] = __('Linkedin', 'eab');

        return $methods;

    }





    
}