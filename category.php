<?php
    /*
        This template displays the list of posts contained within a given category
    */
    get_header(); //wordpress function to include the header.php for info visit http://codex.wordpress.org/Function_Reference/get_header
?>
<div id="primary">
        <div id="content" role="main">
            <?php
                //start the post loop
                while( have_posts() ): the_post();
                    get_template_part('content');
                //end the post loop
                endwhile;
            ?>
        </div><!-- #content -->
    </div><!-- #primary -->
    <?php get_sidebar() //worpress function to include the sidebar.php for more info visit http://codex.wordpress.org/Function_Reference/get_sidebar ?>
<?php get_footer(); //wordpress function to include the footer.php for more into visit http://codex.wordpress.org/Function_Reference/get_footer ?>