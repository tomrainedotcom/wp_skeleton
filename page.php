<?php
/*
 * Description: Basic page layout with sidebar
 */
get_header(); //wordpress function to include the header.php for info visit http://codex.wordpress.org/Function_Reference/get_header
?>
<div id="primary">
    <div id="content" role="main">
        <?php
            //start the post loop
            while( have_posts() ): the_post();
                /*
                 *  we are using the standard template part for this page. To use another one simply 
                 * create a file 'content-new_part.php' then change 'page' to 'new_part' here
                 */
                get_template_part('content', 'page');
            //end the post loop
            endwhile;
        ?>
    </div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar() //worpress function to include the sidebar.php for more info visit http://codex.wordpress.org/Function_Reference/get_sidebar ?>
<?php get_footer(); //wordpress function to include the footer.php for more into visit http://codex.wordpress.org/Function_Reference/get_footer ?>