<?php
/* Template Name: Artikel page */
get_header(); ?>

<div class="main-block">
    <div class="container">

        <?php get_template_part( 'banners/top', 'banner' ); ?>
        <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>

        <div class="row align-items-start">

            <div class="d-none d-xl-block col-2"><?php get_template_part( 'banners/left', 'skyscraper' ); ?></div>

            <div class="col d-flex flex-column flex-lg-row">
                <div class="content">
                    <div class="main-article">
                        <h3 class="main-article__title"><?php the_title(); ?></h3>
                        <div class="main-article__info d-flex flex-column d-lg-block clearfix">

                        </div>
                    </div>
                    <div class="articles">
                        <div class="last-articles__list">
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                            query_posts( array(
                                'posts_per_page' => 10,
                                'category__not_in' => 1,
                                'paged' => $paged,
                                'ignore_sticky_posts' => 1
                            )); ?>

                            <?php if( have_posts() ): while ( have_posts() ) : the_post();
                                echo '
                            <div class="last-articles__item custom-item-container d-flex">
                                <div class="last-articles__thumbnail">
                                    <a href="'.get_the_permalink().'"><img src="'.get_the_post_thumbnail_url().'" alt="'.get_the_title().'" ></a>
                                </div>
                                <div class="last-articles__info d-flex flex-column">
                                    <div class="d-flex flex-column">
                                            <span class="last-articles__head">
                                            <a href="'.get_the_permalink().'">'.get_the_title().'
                                            </span>
                                        <span class="last-articles__description">
                                                '.get_the_excerpt().'
                                            </span>
                                    </div>
                                    <a href="'.get_the_permalink().'" class="article__link align-self-end">Læs mere</a>
                                </div>
                            </div>';
                            endwhile; ?>

                            <?php else : ?>

                                <p><?php __('No News'); ?></p>

                            <?php endif; ?>



                            <?php

                            echo'
                        </div>';
                            echo '<div class="pagination d-flex justify-content-center align-items-center">';
                            echo paginate_links(
                                array(

                                    'current'   => $paged,

                                    'prev_next' => true,
                                    'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="7.811" height="14.121" viewBox="0 0 7.811 14.121" style="transform: rotate(180deg)">
  <g id="arrow_right" data-name="arrow right" transform="translate(1.061 1.061)">
    <g id="nav-arrow-down" transform="translate(0 12) rotate(-90)">
      <g id="Сгруппировать_10" data-name="Сгруппировать 10" transform="translate(0 0)">
        <path id="Контур_4" data-name="Контур 4" d="M0,0,6,6l6-6" fill="none" stroke="#e861a0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
      </g>
    </g>
  </g>
</svg>',
                                    'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="7.811" height="14.121" viewBox="0 0 7.811 14.121">
  <g id="arrow_right" data-name="arrow right" transform="translate(1.061 1.061)">
    <g id="nav-arrow-down" transform="translate(0 12) rotate(-90)">
      <g id="Сгруппировать_10" data-name="Сгруппировать 10" transform="translate(0 0)">
        <path id="Контур_4" data-name="Контур 4" d="M0,0,6,6l6-6" fill="none" stroke="#e861a0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
      </g>
    </g>
  </g>
</svg>',
                                )
                            ); ?>
                        </div>                        </div>
                    </div>
                        <?php get_sidebar() ?>
                    </div>

                    <div class="d-none d-xl-block col-2 text-right"><?php get_template_part( 'banners/right', 'skyscraper' ); ?></div>
                </div>
            </div>
        </div>

<?php get_footer(); ?>
