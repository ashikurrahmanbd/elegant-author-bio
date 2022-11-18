<?php 

namespace Wpartstudio\ElegantAuthorBio\Frontend;



class Frontend{
    public function __construct()
    {
        new Shortcode\Shortcode();

        // instansiated the Authorbio class
        new Widgets\Authorbio();

    }
}