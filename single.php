<?php get_header(); ?>
<div class="progress-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-6 offset-xl-2">

                <div class="article__title-fixed d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <a class="article__category-link" href="javascript: history.go(-1)">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nav-arrow-left.svg" alt="">
                        </a>
                        <span><?php the_title(); ?></span>
                    </div>
                    <div class="article__socials d-none d-md-flex">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook.svg"
                                 alt="facebook">
                        </a>

                        <a target="_blank" href="//www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>" >
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pinterest.svg"
                                 alt="pinterest">
                        </a>
                        <a target="_blank" href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter.svg" alt="twitter">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="progress-bar d-none d-md-block" id="progressBar"></div>
    <div class="progress-bar__empty d-none d-md-block"></div>
</div>
<?php while (have_posts()) : the_post(); ?>
    <div class="main-block">
        <div class="container">

            <?php get_template_part( 'banners/top', 'banner' ); ?>
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>


            <div class="row align-items-start">

                <div class="d-none d-xl-block col-2"><?php get_template_part( 'banners/left', 'skyscraper' ); ?></div>

                <div class="col d-flex flex-column flex-lg-row">
                    <div class="content">
                        <div class="article__subscribe custom-item-container d-md-none">
                            <div class="d-flex">
                                <div class="article__subscribe-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/article-subscribe.svg"
                                         alt="">
                                </div>
                                <div class="article__subscribe-content d-flex flex-column justify-content-between">
                                    <span class="article__subscribe-title">Få graviditetsmail</span>
                                    <span class="article__subscribe-text">Daglige mails om din babys udvikling</span>
                                </div>
                            </div>
                            <a class="custom-btn d-block text-center" href="/beregn-termin-htm">
                                Indtast termin
                            </a>
                        </div>
                        <div class="d-flex">
                            <div class="single custom-item-container">
                                <div class="article__preview">
                                    <?php
                                    if (get_field( 'is_annonce')) {
                                        echo '<div class="last-articles__label">Annonce</div>';
                                    }
                                    ?>
                                    <h1 class="article__title">
                                        <?php the_title(); ?>
                                    </h1>
                                    <div class="user-block d-flex align-items-center align-items-center">
                                        <?php
                                        echo get_avatar(get_the_author_email(), '60');
                                        ?>
                                        <div class="user-block__info d-flex flex-column justify-content-between">
                                        <span class="user-block__date d-none d-md-block">
                                            <?php echo get_the_date('j F Y, H:i'); ?>
                                        </span>
                                            <span class="user-block__name">
                                            <?php the_author(); ?>
                                        </span>
                                        </div>
                                    </div>

                                    <div class="article__description">
                                        <?php the_content(); ?>
                                        <?php $tag_list = get_the_tag_list( '', ' ' );
                                        if ( $tag_list ) {
                                            $posted_in =  '<div class="article__tags d-flex flex-wrap">%1$s</div><div class="article__tags d-flex flex-wrap">%2$s</div>';
                                        } elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
                                            $posted_in = '<div class="article__tags d-flex flex-wrap">%1$s</div>' ;
                                        } else {
                                            $posted_in = '';
                                        }
                                        // Prints the string, replacing the placeholders.
                                        printf(
                                            $posted_in,
                                            get_the_category_list( ' ' ),
                                            $tag_list,
                                            get_permalink(),
                                            the_title_attribute( 'echo=0' )
                                        );

                                        setPostViews(get_the_ID());

                                        ?>

                                    </div>
                                    <div class="social-menu__mobile">
                                        <input id="check-for-clicking" type="checkbox">
                                        <label class="main-add-button-plus" for="check-for-clicking">
                                            <div class="menu-add-button-title d-flex justify-content-center align-items-center">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/share-icon.svg" alt="">
                                            </div>
                                        </label>
                                        <label class="main-add-button-minus" for="check-for-clicking">
                                            <div class="menu-add-button-title d-flex justify-content-center align-items-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/cross.svg" alt=""></div>
                                        </label>
                                        <div class="menu-add-items">
                                            <span class="plate">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook-mobile.svg"
                                                         alt="facebook">
                                                </a>
                                            </span>
                                            <span class="plate">
                                                <a target="_blank" href="//www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>" >
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pinterest-mobile.svg"
                                                         alt="pinterest">
                                                </a>
                                            </span>
                                            <span class="plate">
                                                <a target="_blank" href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter-mobile.svg" alt="twitter">
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="cncpt-booster"></div>

                            </div>

                        </div>
                        <?php
                        if (wp_is_mobile()) {
                            echo '<div class="sidebar__banner">
                                <div id="cncpt-outstream"></div>
                            </div>';
                        }
                        ?>
                    </div>

                    <?php get_sidebar() ?>
                </div>
                <div class="d-none d-xl-block col-2 text-right"><?php get_template_part( 'banners/right', 'skyscraper' ); ?></div>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<script type=”text/javascript” src=”//assets.pinterest.com/js/pinit.js”></script>
<?php get_footer(); ?>
