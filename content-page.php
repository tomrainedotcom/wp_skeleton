<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-header">
        <h2 class="entry-title"><?php the_title(); ?></h2>
    </div>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</article>