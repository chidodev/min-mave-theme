<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <div class="main-block">
        <div class="container">

            <?php get_template_part( 'banners/top', 'banner' ); ?>
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>


            <div class="row align-items-start">

                <div class="d-none d-xl-block col-2"><?php get_template_part( 'banners/left', 'skyscraper' ); ?></div>


                <div class="col d-flex flex-column flex-lg-row">
                    <div class="content">
                        <div class="d-flex">
                            <div class="single custom-item-container">
                                <div class="article__preview">

                                    <h4 class="article__title">
                                        <?php the_title(); ?>
                                    </h4>

                                    <div class="article__description">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <?php get_sidebar() ?>
                </div>
                <div class="d-none d-xl-block col-2 text-right"><?php get_template_part( 'banners/right', 'skyscraper' ); ?></div>
            </div>
        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>
