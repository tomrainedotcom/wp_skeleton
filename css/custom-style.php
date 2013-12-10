<?php
    //if there are any settings put in place through the frontend customizer
    //the stylesheet will be updated
    $theme_options = get_option('ndd_theme_options');
?>
<!--<pre><?php //print_r($theme_options); ?></pre>-->
<style type="text/css">
    body{
        background-color: <?php echo ($theme_options['background_color'] !=  NULL) ? $theme_options['background_color'] : ''; ?>;
        font-family: <?php echo ($theme_options['body_font_family'] !=  NULL) ? $theme_options['body_font_family'] : ''; ?>;
        font-size: <?php echo ($theme_options['body_font_size'] !=  NULL) ? $theme_options['body_font_size'] : ''; ?>;
    }
    
    /*
        Navigation
    */
    #main-menu ul li a{
        color: <?php echo ($theme_options['main_nav_link_color'] != NULL)? $theme_options['main_nav_link_color'] : ''; ?>;
    }
    
    /*
        Content
    */
    .entry-title{
        color: <?php echo ($theme_options['post_title_color'] != NULL)? $theme_options['post_title_color'] : ''; ?>;
    }
    .entry-content{
        color: <?php echo ($theme_options['post_content_color'] != NULL)? $theme_options['post_content_color'] : ''; ?>;
    }
</style>
