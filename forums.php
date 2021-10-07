<?php get_header(); ?>
<!--<div class="progress-container">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-md-8 col-xl-6 offset-xl-2">-->
<!--                <div class="article__title-fixed d-flex justify-content-between align-items-center">-->
<!--                    <div class="d-flex align-items-center">-->
<!--                        <a class="article__category-link" href="javascript: history.go(-1)">-->
<!--                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/nav-arrow-left.svg" alt="">-->
<!--                        </a>-->
<!--                        <span>--><?php //the_title(); ?><!--</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="progress-bar d-none d-md-block" id="progressBar"></div>-->
<!--    <div class="progress-bar__empty d-none d-md-block"></div>-->
<!--</div>-->
<?php while (have_posts()) : the_post(); ?>
    <div class="main-block">
        <div class="container">

            <?php get_template_part( 'banners/top', 'banner' ); ?>
            <?php if (bbp_is_single_user()) {
            } else {
                echo '
                <div class="row">
                    <div class="col-md-8 offset-xl-2">';
                        bbp_breadcrumb();

                    echo '</div>
                </div>';

                //if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();


            }
            ?>


            <div class="row align-items-start">

                <div class="d-none d-xl-block col-2"><?php get_template_part( 'banners/left', 'skyscraper' ); ?></div>


                <div class="col d-flex flex-column flex-lg-row">
                    <div class="content">
                        <div class="forums-list">
                            <div class="d-flex justify-content-between">
                                <h1 class="article__title forums-title">
                                    <?php the_title(); ?>
                                </h1>
                                <?php bbp_is_single_forum() ? bbp_forum_subscription_link() : ''; ?>
                            </div>

                            <?php if (!in_category('min-mave-tv') && has_post_thumbnail()) { ?>
                                <img src="<?php echo the_post_thumbnail_url('full'); ?>" alt="">
                            <?php } ?>
                            <div class="article__description">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <?php if (bbp_is_single_user()) {
                            } else {
                            get_sidebar();
                            }
                            ?>
                </div>
                <div class="d-none d-xl-block col-2 text-right"><?php get_template_part( 'banners/right', 'skyscraper' ); ?></div>
            </div>

        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>
