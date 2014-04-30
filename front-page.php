<?php
    /*
     *  This template displayes the page that has been selected as the Home page. This ia good place to add things like featured pages or latest posts
    */
    get_header(); //wordpress function to include the header.php for info visit http://codex.wordpress.org/Function_Reference/get_header
?>

    
    <div id="primary"><?php //use the id primary for the area that will contain the main content ?>
        <div id="content" role="main"><?php //use the id content for the area that will be used as the main content area. Some browsers support roles, use main to show it is the main content area ?>
            <?php
                //start the post loop
                while( have_posts() ): the_post();
                /*
                 * have_posts() checks to see if we have any posts left in the post query. For more info visit http://codex.wordpress.org/Function_Reference/have_posts
                 * the_post() assigns $post to the post at the front of the post query. For more info visit http://codex.wordpress.org/Function_Reference/the_post
                 */
            ?>
                <?php
                        //put your code here to display more information above the main page content (things like banners and headers)
                    
                        //Use the standard template part
                        get_template_part('content');
                        
                        //put you code here to display more information below the main page content
                ?>
            <?php
                //end the post loop
                endwhile;
                wp_reset_query();//wordpress function to reset the post query, it is not necessary but its good to know. For more info visit http://codex.wordpress.org/Function_Reference/wp_reset_query
            ?>
        </div><!-- #content -->
    </div><!-- #primary -->
    <?php get_sidebar(); //worpress function to include the sidebar.php for more info visit http://codex.wordpress.org/Function_Reference/get_sidebar ?>
<?php get_footer(); //wordpress function to include the footer.php for more into visit http://codex.wordpress.org/Function_Reference/get_footer ?>