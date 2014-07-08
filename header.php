<!doctype html>
<html lang="en">
<head>
    <?php 
        wp_head(); 
        $theme_options = get_option('ndd_theme_options');
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, user-scalable=no, initial-scale=1">
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
</head>
<body <?php body_class(); ?>>
    <div id="page" class="container">
        <header>
            <hgroup class="row">
                <h1 id="site-name" class="col-md-6">
            <?php if( isset($theme_options['site_logo']) && $theme_options['site_logo'] != NULL ){ ?>
                    <a href="<?php bloginfo( 'url' ) ?>"><img src="<?php echo $theme_options['site_logo']; ?>" /></a></h1>
            <?php } else { ?>
                    <a href="<?php bloginfo( 'url' ) ?>"><?php bloginfo( 'name' );//change this to an image if you need ?></a>
            <?php } ?>
                </h1>
                <div id="site-description" class="col-md-6 text-right"><?php bloginfo( 'description' ); ?></div>
            </hgroup>
            <nav class="row">
                <?php 
                    //displaying menu defined in the functions.php file for more info on displaying menus visit http://codex.wordpress.org/Function_Reference/wp_nav_menu
                    wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu list-inline list-unstyled', 'container_id' => 'main-menu', 'container_class' => 'col-sm-12' ) ); 
                ?>
            </nav>
        </header>
        <div id="main" class="row">