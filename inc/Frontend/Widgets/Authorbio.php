<?php 

namespace Wpartstudio\ElegantAuthorBio\Frontend\Widgets;

class Authorbio {

    public function __construct()
    {
       
        add_filter('the_content', [$this, 'authorbiofunction']);
    }


    public function authorbiofunction($content){ 
        

        
        global $post;

        $author_obj = get_user_by('id', $post->post_author);
        $display_name = get_user_meta($author_obj->ID, 'display_name', true);
        $bio = get_user_meta($author_obj->ID, 'description', true);
        $twitter = get_user_meta($author_obj->ID, 'twitter', true);
        $facebook = get_user_meta($author_obj->ID, 'facebook', true);
        $linkedin = get_user_meta($author_obj->ID, 'linkedin', true);

     
        ob_start();
    ?>

        <div class="author-bio">
            <div class="image-bio">
                <div class="avatar">
                    <?php 
                       echo  get_avatar($author_obj->ID, 64)
                    ?>
                </div>
                <div class="name">
                    
                    <?php echo $display_name; ?>
                    
                </div>
            </div>
            <div class="details">
                <?php echo $bio; ?>
            </div>
            <div class="social">
                <ul>
                    <li><a href="<?php echo $twitter ?>">Twiiter</a></li>
                    <li><a href="<?php echo $facebook ?>">Facebook</a></li>
                    <li><a href="<?php echo $linkedin ?>">Linkedin</a></li>
                </ul>
            </div>
        </div>

    <?php

        $bb = ob_get_clean();
        return $content . $bb;
        

        
    }



}