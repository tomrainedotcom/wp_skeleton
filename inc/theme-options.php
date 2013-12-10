<?php
    add_action( 'customize_register', 'ndd_customizer_register' );
    function ndd_customizer_register($wp_customize){
        /*
         * General Settings Section
         */
        //new section for changing genetal things
        $wp_customize->add_section('ndd_general_settings', array(
            'title' => __('General Settings'),
            'priority' => 5
        ));
        
        //new settings for the colour scheme section
        $wp_customize->add_setting('ndd_theme_options[post_title_color]', array(
            'default' => '#000000',
            'capability' => 'edit_theme_options',
            'type' => 'option',
        ));
        //adding a control for the colour scheme setting
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_title_color', array(
            'label' => __('Post Title Colour', 'ndd'),
            'section' => 'ndd_general_settings',
            'settings' => 'ndd_theme_options[post_title_color]',
        ) ) );
        
        //add a background colour setting
        $wp_customize->add_setting('ndd_theme_options[background_color]', array(
            'default' => '#FFFFFF',
            'sectoin' => 'ndd_general_settings',
            'type' => 'option'
        ));
        //add a background colour setting control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
            'label' => __('Body Background Colour', 'ndd'),
            'section' => 'ndd_general_settings',
            'settings' => 'ndd_theme_options[background_color]',
        ) ) );
        
        //add setting for post content colour
        $wp_customize->add_setting('ndd_theme_options[post_content_color]', array(
            'default' => '#000000',
            'capability' => 'edit_theme_options',
            'type' => 'option',
            'transport' => 'postMessage'
        ));
        //add a post content colour picker controller
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_content_color', array(
            'label' => __('Post Content Colour', 'ndd'),
            'section' => 'ndd_general_settings',
            'settings' => 'ndd_theme_options[post_content_color]',
        ) ) );
        
        //add setting for page font family
        $wp_customize->add_setting('ndd_theme_options[body_font_family]', array(
           'label' => __('Font Family', 'ndd'),
            'capability' => 'edit_theme_options',
            'type' => 'option',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control( 'body_font_family', array(
            'settings' => 'ndd_theme_options[body_font_family]',
            'label'   => 'Font Family:',
            'section' => 'ndd_general_settings',
            'type'    => 'select',
            'choices'    => array(
                'Georgia, serif' => 'Georgia',
                '"Palatino Linotype", "Book Antiqua", Palatino, serif' => 'Palatino',
                'Times New Roman' => 'Times New Roman',
                'Arial' => 'Arial',
                'Helvetica' => 'Helvetica',
                '"Comic Sans MS", cursive, sans-serif' => 'Comic Sans',
                'Impact, Charcoal, sans-serif' => "Impact",
                '"Lucida Sans Unicode", "Lucida Grande", sans-serif' => 'Lucida',
                'Tahoma, Geneva, sans-serif' => 'Tahoma',
                '"Trebuchet MS", Helvetica, sans-serif' => 'Trebuchet',
                'Verdana, Geneva, sans-serif' => 'Verdana',
                '"Courier New", Courier, monospace' => 'Courier New',
                '"Lucida Console", Monaco, monospace' => 'Lucida Console'
            ) ) );
        $wp_customize->add_setting('ndd_theme_options[body_font_size]', array(
            'label' => __('Font Size', 'ndd'),
            'capability' => 'edit_theme_options',
            'type' => 'option',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control('body_font_size', array(
            'settings' => 'ndd_theme_options[body_font_size]',
            'label'   => 'Font Family:',
            'section' => 'ndd_general_settings',
            'type'    => 'select',
            'choices'    => array(
                '10px' => '10px',
                '11px' => '11px',
                '12px' => '12px',
                '14px' => '14px',
                '16px' => '16px'
            ) ) );
        /*
         * Site Title & Tagline Section
         */
        //add a setting to the Title and Tag section to add a logo
        $wp_customize->add_setting('ndd_theme_options[site_logo]', array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'type' => 'option',
        ));
        //add a image upload control for site logo
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'site_logo', array(
            'label'    => __('Site / Company Logo', 'themename'),
            'section'  => 'title_tagline',
            'settings' => 'ndd_theme_options[site_logo]',
        )));
        
        /*
         * Navigation Section
         */
        //add a setting for menu link colour
        $wp_customize->add_setting('ndd_theme_options[main_nav_link_color]', array(
            'default' => '#000000',
            'sectoin' => 'nav',
            'type' => 'option'
        ));
        //add a colour picker for the menu links
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_nav_link_color', array(
            'label' => __('Main Menu Link Colour', 'ndd'),
            'section' => 'nav',
            'settings' => 'ndd_theme_options[main_nav_link_color]',
        ) ) );
        
        
        //making the preview change in real time for default WP settings
        $wp_customize->get_setting('blogname')->transport='postMessage';
        $wp_customize->get_setting('blogdescription')->transport='postMessage';
        $wp_customize->get_setting('header_textcolor')->transport='postMessage';
        $wp_customize->get_setting('ndd_theme_options[post_title_color]')->transport='postMessage';
        $wp_customize->get_setting('ndd_theme_options[main_nav_link_color]')->transport='postMessage';

        //adding action to add some script to the footer
        if( $wp_customize->is_preview() && ! is_admin() ){
            add_action('wp_footer', 'ndd_customize_preview', 21);
        }
    }
    //function to add javascript to make preview change in real time
    function ndd_customize_preview(){
    ?>
        <script type="text/javascript">
            //function to change the preview to anything that the user has changed
            ( function( $ ){
                //change the value of the site title
                wp.customize('blogname',function( value ) {
                    value.bind(function(to) {
                        $('#site-name a').html(to);
                    });
                });
                //the the value of the site description
                wp.customize('blogdescription',function( value ) {
                    value.bind(function(to) {
                        $('#site-description').html(to);
                    });
                });
                //change the colour of the text in the header
                wp.customize( 'header_textcolor', function( value ) {
                    value.bind( function( to ) {
                        $('#site-name a, #site-description').css('color', to ? to : '' );
                    });
                });
                //change the color of all post titles
                wp.customize( 'ndd_theme_options[post_title_color]', function( value ) {
                    value.bind( function( to ) {
                        $('.entry-title').css('color', to ? to : '' );
                    });
                });
                //change the colour of the menu links
                wp.customize( 'ndd_theme_options[main_nav_link_color]', function( value ) {
                    value.bind( function( to ) {
                        $('#main-menu li a').css('color', to ? to : '' );
                    });
                });
                wp.customize( 'ndd_theme_options[post_content_color]', function( value ) {
                    value.bind( function( to ) {
                        $('.entry-content').css('color', to ? to : '' );
                    });
                });
                wp.customize( 'ndd_theme_options[body_font_family]', function( value ) {
                    value.bind( function( to ) {
                        $('body').css('font-family', to ? to : '' );
                    });
                });
                wp.customize( 'ndd_theme_options[body_font_size]', function( value ) {
                    value.bind( function( to ) {
                        $('body').css('font-size', to ? to : '' );
                    });
                });
            })(jQuery);
            
        </script>        
    <?php
    }
?>