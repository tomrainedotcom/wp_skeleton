<!doctype html>
<html lang="en">
<head>
    <?php 
        wp_head(); 
        $theme_options = get_option('ndd_theme_options');
    ?>
    <meta charset="UTF-8">
    <title><?php bloginfo( 'name' )?><?php wp_title(' | ', 'left', false); ?></title>
    <!--[if lt IE 9]>
    <script language="javascript" type="text/javascript">
        document.createElement('header');
        document.createElement('hgroup');
        document.createElement('nav');
        document.createElement('article');
        document.createElement('section');
        document.createElement('footer');
        document.createElement('aside');
    </script>
    <![endif]-->
    <?php include(get_template_directory().'/css/custom-style.php'); ?>
</head>
<body <?php body_class(); ?>>
    <div id="page">
        <header>
            <hgroup>
                <h1 id="site-name">
            <?php if( isset($theme_options['site_logo']) && $theme_options['site_logo'] != NULL ){ ?>
                    <a href="<?php bloginfo( 'url' ) ?>"><img src="<?php echo $theme_options['site_logo']; ?>" /></a></h1>
            <?php } else { ?>
                    <a href="<?php bloginfo( 'url' ) ?>"><?php bloginfo( 'name' );//change this to an image if you need ?></a>
            <?php } ?>
                </h1>
                <div id="site-description"><?php bloginfo( 'description' ); ?></div>
            </hgroup>
            <nav>
                <?php 
                    //displaying menu defined in the functions.php file for more info on displaying menus visit http://codex.wordpress.org/Function_Reference/wp_nav_menu
                    wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container_id' => 'main-menu' ) ); 
                ?>
            </nav>
        </header>
        <div id="main">