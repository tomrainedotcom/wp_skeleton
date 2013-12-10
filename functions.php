<?php
    include dirname(__FILE__).'/inc/theme-options.php';
    add_action('init', 'ndd_init');
    
    function ndd_init(){
        //put all things in here that need to be setup before anything gets displayed e.g. menu registration, sidebars, post content types etc.
        
        //registering the Primary Menu for more information on registering menus visit http://codex.wordpress.org/Template_Tags/register_nav_menu
        register_nav_menu( 'primary', 'Primary Menu' );
        register_nav_menu( 'footer', 'Footer Menu' );
        
        //registering the main sidebar for more info on registering sidebars visit http://codex.wordpress.org/Function_Reference/register_sidebar
        register_sidebar(array(
            'name'          => __( 'Main Sidebar' ),
            'id'            => 'main-sidebar',
            'description'   => 'This is the main sidebar displayed site wide',
            'class'         => '',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>'
        ));
    }
    
    add_action( 'wp_enqueue_scripts', 'ndd_enqueue_scripts');
    
    function ndd_enqueue_scripts(){
        //add any scripts used in the site for more info on how to do this visit http://codex.wordpress.org/Function_Reference/wp_enqueue_script
        wp_enqueue_script( 'jquery' );
    }
    
    add_action( 'wp_enqueue_scripts', 'ndd_enqueue_styles' );
    
    function ndd_enqueue_styles(){
        //add any stylesheets used in the site for more info on how to do this visit http://codex.wordpress.org/Function_Reference/wp_enqueue_style
        wp_enqueue_style('stylesheet', get_template_directory_uri().'/style.css');
        //wp_enqueue_style('custom-styles', get_template_directory().'/css/custom-style.php');
    }
?>