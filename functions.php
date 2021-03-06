<?php
    require_once dirname(__FILE__).'/inc/class-tgm-plugin-activation.php';
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
        register_sidebar(array(
            'name'          => __( 'Footer Area 1' ),
            'id'            => 'footer-1',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        ));
        register_sidebar(array(
            'name'          => __( 'Footer Area 2' ),
            'id'            => 'footer-2',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        ));
        register_sidebar(array(
            'name'          => __( 'Footer Area 3' ),
            'id'            => 'footer-3',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        ));
        register_sidebar(array(
            'name'          => __( 'Footer Area 4' ),
            'id'            => 'footer-4',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        ));
    }
    
    add_action( 'wp_enqueue_scripts', 'ndd_enqueue_scripts');
    
    function ndd_enqueue_scripts(){
        //add any scripts used in the site for more info on how to do this visit http://codex.wordpress.org/Function_Reference/wp_enqueue_script
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'fitVids', get_template_directory_uri().'/js/jquery.fitvids.js', array( 'jquery' ) );
        wp_enqueue_script( 'theme_script', get_template_directory_uri().'/js/theme-script.js', array( 'fitVids', 'fancybox' ) );
        wp_enqueue_script( 'fancybox', get_template_directory_uri().'/js/jquery.fancybox.js', array( 'jquery' ) );
    }
    
    add_action( 'wp_enqueue_scripts', 'ndd_enqueue_styles' );
    
    function ndd_enqueue_styles(){
        //add any stylesheets used in the site for more info on how to do this visit http://codex.wordpress.org/Function_Reference/wp_enqueue_style
        wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
        wp_enqueue_style( 'stylesheet', get_template_directory_uri().'/style.css', array( 'bootstrap', 'fancybox' ) );
        //wp_enqueue_style('custom-styles', get_template_directory().'/css/custom-style.php');
        wp_enqueue_style( 'fancybox', get_template_directory_uri().'/css/jquery.fancybox.css' );
    }
    
    add_action( 'tgmpa_register', 'ndd_register_plugins' );
    
    function ndd_register_plugins(){
        $plugins = array(
            //Advanced Custom Fields
            array(
                'name'               => 'Advanced Custom Fields', // The plugin name.
                'slug'               => 'advanced-custom-fields', // The plugin slug (typically the folder name).
                'source'             => get_template_directory_uri() . '/plugins/advanced-custom-fields.zip', // The plugin source.
                'required'           => true, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),
            //Advanced Custom Fields Repeater Field
            array(
                'name'               => 'Advanced Custom Fields Repeater Field', // The plugin name.
                'slug'               => 'acf-repeater', // The plugin slug (typically the folder name).
                'source'             => get_template_directory_uri() . '/plugins/acf-repeater.zip', // The plugin source.
                'required'           => true, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),
            //Contact Form 7
            array(
                'name'               => 'Contact Form 7', // The plugin name.
                'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
                'source'             => get_template_directory_uri() . '/plugins/contact-form-7.zip', // The plugin source.
                'required'           => true, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),
            //Contact Form 7 Honeypot Field
            array(
                'name'               => 'Contact Form 7 Honeypot', // The plugin name.
                'slug'               => 'contact-form-7-honeypot', // The plugin slug (typically the folder name).
                'source'             => get_template_directory_uri() . '/plugins/contact-form-7-honeypot.1.6.zip', // The plugin source.
                'required'           => true, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),
            //Intuitive Custom Post Order
            array(
                'name'               => 'Intuitive Custom Post Order', // The plugin name.
                'slug'               => 'intuitive-custom-post-order', // The plugin slug (typically the folder name).
                'source'             => get_template_directory_uri() . '/plugins/intuitive-custom-post-order.zip', // The plugin source.
                'required'           => false, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),
            
            //Post Type Archive Links
            array(
                'name'               => 'Post Type Archive Links', // The plugin name.
                'slug'               => 'post-type-archive-links', // The plugin slug (typically the folder name).
                'source'             => get_template_directory_uri() . '/plugins/post-type-archive-links.1.2.zip', // The plugin source.
                'required'           => false, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),
            
            //Taxonomy Terms Order
            array(
                'name'               => 'Taxonomy Terms Order', // The plugin name.
                'slug'               => 'taxonomy-terms-order', // The plugin slug (typically the folder name).
                'source'             => get_template_directory_uri() . '/plugins/taxonomy-terms-order.zip', // The plugin source.
                'required'           => false, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),
            
            //Image Widget
            array(
                'name'               => 'Image Widget', // The plugin name.
                'slug'               => 'image-widget', // The plugin slug (typically the folder name).
                'source'             => get_template_directory_uri() . '/plugins/image-widget.4.1.zip', // The plugin source.
                'required'           => false, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),
            //Simple Social Icons
            array(
                'name'               => 'Simple Social Icons', // The plugin name.
                'slug'               => 'simple-social-icons', // The plugin slug (typically the folder name).
                'source'             => get_template_directory_uri() . '/plugins/simple-social-icons.1.0.6.zip', // The plugin source.
                'required'           => false, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),
            //All In One WP Security and Firewall
            array(
                'name'               => 'All In One WP Security and Firewall', // The plugin name.
                'slug'               => 'all-in-one-wp-security-and-firewall', // The plugin slug (typically the folder name).
                'source'             => get_template_directory_uri() . '/plugins/all-in-one-wp-security-and-firewall.zip', // The plugin source.
                'required'           => false, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),
            //BWP Google XML Sitemaps
            array(
                'name'               => 'BWP Google XML Sitemaps', // The plugin name.
                'slug'               => 'bwp-google-xml-sitemaps', // The plugin slug (typically the folder name).
                'source'             => get_template_directory_uri() . '/plugins/bwp-google-xml-sitemaps.zip', // The plugin source.
                'required'           => false, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),
            //Google Ananlytics Dashboard for WP
            array(
                'name'               => 'Google Ananlytics Dashboard for WP', // The plugin name.
                'slug'               => 'google-analytics-dashboard-for-wp', // The plugin slug (typically the folder name).
                'source'             => get_template_directory_uri() . '/plugins/google-analytics-dashboard-for-wp.zip', // The plugin source.
                'required'           => false, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),
            //SEO Ultimate
            array(
                'name'               => 'SEO Ultimate', // The plugin name.
                'slug'               => 'seo-ultimate', // The plugin slug (typically the folder name).
                'source'             => get_template_directory_uri() . '/plugins/seo-ultimate.zip', // The plugin source.
                'required'           => false, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),
        );
        tgmpa( $plugins );
    }
?>