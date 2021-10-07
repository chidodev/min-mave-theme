<?php
/* Template Name: Auth page */

get_header('no-content'); ?>
<body>
<?php while ( have_posts() ) : the_post(); ?>

    <div class="article__description">
        <?php the_content(); ?>
    </div>

<?php endwhile; ?>

<?php get_footer('no-content'); ?>

