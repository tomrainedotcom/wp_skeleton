<?php
    /*
        Template Name: One Column Page
        This template displays a page without a sidebar and takes up the full width of the page
    */
    get_header();//wordpress function to include the header.php for info visit http://codex.wordpress.org/Function_Reference/get_header
?>
<div id="primary" class="col-md-12">
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
<?php get_footer(); //wordpress function to include the footer.php for more into visit http://codex.wordpress.org/Function_Reference/get_footer ?>