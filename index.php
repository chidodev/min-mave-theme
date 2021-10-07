<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="main-block">
        <div class="container">

            <?php get_template_part( 'banners/top', 'banner' ); ?>
            <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>


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
                                    <div class="user-block d-flex">
                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/user-img.jpg" alt="">
                                        <div class="user-block__info d-flex flex-md-column justify-content-between">
                                        <span class="user-block__date">
                                            I dag, 10:00
                                        </span>
                                            <span class="user-block__name">
                                            User name
                                        </span>
                                        </div>
                                    </div>
                                    <!--                            <img src="--><?php //echo the_post_thumbnail_url( 'full' );?><!--" alt="">-->

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
