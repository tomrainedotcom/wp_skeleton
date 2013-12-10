<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-header">
        <h2 class="entry-title"><?php the_title(); ?></h2>
    </div>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <div class="entry-meta">
        <span class="entry-time">Posted on <?php the_date(); ?></span>
        <p>Poster by <?php the_author(); ?> in  <?php the_category(', ', false); ?></p>
    </div>
</article>