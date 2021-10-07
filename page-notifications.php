<?php acf_form_head(); ?>
<?php
/* Template Name: Notifications page */


get_header(); ?>



    <div class="main-block">
        <div class="container">

            <?php get_template_part( 'banners/top', 'banner' ); ?>
            <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>

            <div class="row align-items-start">

                <div class="d-none d-xl-block col-2"><?php get_template_part( 'banners/left', 'skyscraper' ); ?></div>

                <div class="col d-flex flex-column flex-lg-row">
                    <div class="content">
                        <h3 class="main-article__title"><?php the_title(); ?></h3>
                        <?php
                        $current_user = wp_get_current_user();

                        $query = new WP_Query(array(
                            'post_type' => array('notifications'),
                            'author' => $current_user->id,
                            'posts_per_page' => '15',
                            'paged' => get_query_var('paged') ?: 1

                        ));
                        ?>
                        <div class="custom-item-container notifications-widget__content d-flex flex-column align-items-center">
                            <div class="notifications-widget__list">

                                <?php
                                if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                $unread = (get_field('is_read') == 0)?'unread':'';
                            echo '<a href="'.get_field('link').'">
                                <div class="notifications-widget__item '.$unread.'">
                                    <div class="notifications-widget__item-meta d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                                        <div class="notifications-widget__item-title text-left">
                                            '.get_the_title().'
                                        </div>
                                        <div class="notifications-widget__item-date">
                                            '.get_the_date('d.m.Y').'
                                        </div>
                                    </div>
                                    <div class="notifications-widget__item-content text-left">
                                        '.get_field('message').'
                                    </div>
                                </div>
                            </a>';
                                    update_field('is_read', '1', get_the_ID());
                            endwhile;
                            else :
                                echo '

                                <div class="notifications-widget__no-data text-center">
                                    Du har ingen notifikationer
                                </div>';
                            endif;
                            echo '
                        </div>';

                                ?>
                            </div>
                            <?php

                            echo '<div class="pagination d-flex justify-content-center align-items-center">';
                            echo paginate_links(
                                array(
                                    'base' => '/all-notifications%_%',
                                    'format'    =>'?paged=%#%',
                                    'current' => max( 1, get_query_var( 'paged' ) ),
                                    'total'     => $query->max_num_pages,
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
                            );
                            echo '</div>';

                            ?>

                    </div>
                    <?php get_sidebar() ?>
                </div>

                <div class="d-none d-xl-block col-2 text-right"><?php get_template_part( 'banners/right', 'skyscraper' ); ?></div>
            </div>
        </div>
    </div>


<?php get_footer(); ?>