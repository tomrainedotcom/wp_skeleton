<?php
    /*
     *  This template displays the list of posts on the home page if no front page has been.
     *  If a front page has been set then this template displays the list of posts on the home page.
     *  If there is no archive.php or no category.php file set then this template will be used to display the list of posts assciated with the given archive or category 
    */
    get_header(); //wordpress function to include the header.php for info visit http://codex.wordpress.org/Function_Reference/get_header
?>

    
<div id="primary" class="col-md-8"><?php //use the id primary for the area that will contain the main content ?>
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
                    //check to see if we are on the home page, or an archive page.
                    if(is_archive() || is_home()){
                        get_template_part('content', 'excerpt');
                    } else {
                        //this could potentially be a search result or a page if there is no page template
                        get_template_part('content');
                    }
                    /*
                     * is_archive() returns true if the given query has a list of archive posts. For more info visit http://codex.wordpress.org/Function_Reference/is_archive
                     * is_home() returns true if the current page is the home page, not to be mistaken for the front page. For more info visit http://codex.wordpress.org/Function_Reference/is_home
                     * get_template_part() uses the given strings and uses the associated template, i.e. 'content', 'excerpt' would use the content-excerpt.php file. For more info visit http://codex.wordpress.org/Function_Reference/get_template_part
                     */
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