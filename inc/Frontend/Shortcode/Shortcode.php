<?php 

namespace Wpartstudio\ElegantAuthorBio\Frontend\Shortcode;

class Shortcode {

    public function __construct()
    {
        add_shortcode('eab', [$this, 'eab_shortcode_output']);

        
    }

   

}