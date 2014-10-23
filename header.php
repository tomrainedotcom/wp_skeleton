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
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
    <header>
        <div class="container">
            <hgroup class="row">
                <h1 id="site-name" class="col-xs-10 col-md-12 text-center">
            <?php if( isset($theme_options['site_logo']) && $theme_options['site_logo'] != NULL ){ ?>
                    <a href="<?php bloginfo( 'url' ) ?>"><img src="<?php echo $theme_options['site_logo']; ?>" /></a>
            <?php } else { ?>
                    <a href="<?php bloginfo( 'url' ) ?>"><?php bloginfo( 'name' );//change this to an image if you need ?></a>
            <?php } ?>
                </h1>
                <div id="nav-toggle" class="col-xs-2 text-right">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/nav-toggle.png" />
                </div>
            </hgroup>
            <nav class="row">
                <?php 
                    //displaying menu defined in the functions.php file for more info on displaying menus visit http://codex.wordpress.org/Function_Reference/wp_nav_menu
                    wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu list-inline list-unstyled', 'container_id' => 'main-menu', 'container_class' => 'col-sm-12' ) ); 
                ?>
            </nav>
        </div>
    </header>
    <div id="page" class="container">
        <div id="main" class="row">