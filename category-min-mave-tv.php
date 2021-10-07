<?php get_header(); ?>

<div class="main-block">
    <div class="container">

        <?php get_template_part( 'banners/top', 'banner' ); ?>
        <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

        <div class="row align-items-start">

            <div class="d-none d-xl-block col-2"><?php get_template_part( 'banners/left', 'skyscraper' ); ?></div>


            <div class="col d-flex flex-column flex-lg-row">
                <div class="content">
                    <div class="tv-list">
                        <h3 class="tv-list__title"><?php if (is_category()) echo get_queried_object()->name; ?></h3>
                        <div class="tv-list__container">

                            <?php
                            $count = 1;
                            while (have_posts()) : the_post();

                                if ($count <= 9) {
                                    echo '
                                        <a class="tv-list__item custom-item-container" href="' . get_the_permalink() . '">
                                            <div class="tv-list__item-thumbnail">
                                                <img src="' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '" alt="' . get_the_title() . '">
                                            </div>
                                            <div class="tv-list__item-info">
                                                <p class="tv-list__item-title">
                                                    ' . get_the_title() . '
                                                </p>
                                                <p class="tv-list__author">
                                                     ' . get_the_author() . '
                                                </p>
                                            </div>
                                        </a>';
                                }
                                if ($count == 9) {
                                    echo ' 
                                        </div>
                                    </div>
            
                                    <div class="last-articles">
                                        <div class="last-articles__title">
                                            Artikler - Min-Mave TV
                                        </div>
                                        <div class="last-articles__list">';
                                }
                                if ($count > 9) {
                                    echo '
                                    <div class="last-articles__item custom-item-container d-flex">
                                        <div class="last-articles__thumbnail">
                                            <img src="' . get_the_post_thumbnail_url(get_the_ID(), 'medium') . '" alt="" >
                                        </div>
                                        <div class="last-articles__info d-flex flex-column">
                                            <div class="d-flex flex-column">
                                                    <span class="last-articles__head">
                                                    ' . get_the_title() . '
                                                    </span>
                                                <span class="last-articles__description">
                                                        ' . get_the_excerpt() . '
                                                    </span>
                                            </div>
                                            <a href="' . get_the_permalink() . '" class="article__link align-self-end">Læs mere</a>
                                        </div>
                                    </div>';
                                }
                                $count++;
                            endwhile;
                            ?>


                        </div>
                        <?php
                        echo '<div class="pagination d-flex justify-content-center align-items-center">';
                        echo paginate_links(
                            array(
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
                    </div>
                </div>
            </div>
            <?php
            if (wp_is_mobile()) {
                echo '<div class="sidebar__banner">
                        <div id="cncpt-outstream"></div>
                    </div>';
            }
            ?>

            <?php get_sidebar() ?>
        </div>

        <div class="d-none d-xl-block col-2 text-right"><?php get_template_part( 'banners/right', 'skyscraper' ); ?></div>
    </div>
</div>
</div>


<?php get_footer(); ?>
