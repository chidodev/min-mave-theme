<?php
/* Template Name: Home page */
get_header(); ?>
<div class="main-block">
    <div class="container">
        <?php get_template_part( 'banners/top', 'banner' ); ?>
        <div class="row align-items-start">
            <div class="d-none d-xl-block col-2"><?php get_template_part( 'banners/left', 'skyscraper' ); ?></div>
            <div class="col d-flex flex-column flex-lg-row">
                <div class="content">
                    <?php the_content(); ?>




                </div>
                <?php get_sidebar() ?>
            </div>
            <div class="d-none d-xl-block col-2 text-right"><?php get_template_part( 'banners/right', 'skyscraper' ); ?></div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
