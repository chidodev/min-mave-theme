<?php
/* Template Name: Search page */

get_header('no-content');
$search_type = $_GET['type'];
//http://min-mave.local/?s=123&type=article
switch ($search_type):
    case 'article':
        $artcile = 1;
        $debat = 0;
        $other = 0;
        $pagination = 1;

        break;
    case 'debat':
        $artcile = 0;
        $debat = 1;
        $other = 0;
        $pagination = 1;

        break;
    case 'other':
        $artcile = 0;
        $debat = 0;
        $other = 1;
        $pagination = 1;

        break;
    default:
        $artcile = 1;
        $debat = 1;
        $other = 1;
        $pagination = 0;
endswitch;
?>
<body class="circle-background-searchpage">
<div class="container">
    <div class="search-result">
        <div class="search-block">
            <div class="search-close">
                <a class="search-close-btn" href="/"></a>
            </div>
            <div class="text-center">
                <div class="search__value clear-value">
                    <form role="search" method="get" class="searchform" action="<?php echo get_site_url(); ?>">
                        <input class="custom-input search" name="s" type="text" value="<?php the_search_query(); ?>" placeholder="Something">
                        <img class="navigation__search-close" src="<?php echo get_template_directory_uri();?>/assets/img/close-search-web.png" alt="#">
                    </form>

                </div>
            </div>
        </div>
        <div>
            <div class="text-left">
                <p class="search__description">Sogeresulater for "<?php the_search_query(); ?>" </p>
            </div>
        </div>


        <?php
            if ($artcile == 1) :
                $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

                $query = new WP_Query( array(
                'posts_per_page' => 9,
                'post_type' => 'post',
                's' => get_search_query(),
                'category__not_in' => array( 34 ),
                'paged'          => $paged,

            ) );
            $count = $query->found_posts;
        ?>

        <div class="article-block">
            <div class="text-left">
                <p class="search__result-count">Artikler (<?php echo $count ?>)</p>
            </div>
            <div class="slick-article-slider articles">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                    <div class="article__item">
                        <div class="article-container d-flex flex-column justify-content-between">
                            <div class="article__preview custom-item-container">
                                <div class="article__image">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                </div>
                                <h4 class="article__title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                            </div>
                            <div class="col-md-12 text-right">
                                <p class="search__result-article-date"><?php the_date('d.m.Y'); ?></p>
                            </div>
                        </div>

                    </div>
                <?php endwhile; ?>
            </div>
            <?php
            if ($count > 8 ) :
            if (($pagination == 0)&&($artcile == 1)) { ?>
            <div class="recent-debates__more text-center">
                <a href="/?s=<?php the_search_query(); ?>&type=article" class="custom-btn outline d-inline-block">Vis mare</a>
            </div>
            <?php } else {
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
                    );
                echo '</div>';

            }
        endif;    ?>
        </div>
        <?php endif; ?>
        <?php
        if ($debat == 1) :
            $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

            $query1 = new WP_Query( array(
            'posts_per_page' => 8,
            'post_type' => array('topic'),
            's' => get_search_query(),
            'paged'          => $paged,

        ) );
        $count = $query1->found_posts;
        ?>

        <div class="forum-block">
            <div class="text-left">
                <p class="search__result-count">Debatter (<?php echo $count; ?>)</p>
            </div>
            <div class="recent-debates__table">
                <div class="recent-debates__table-head">
                    <span>Emne</span>
                    <span>Indlæg</span>
                    <span>Seneste aktivitet</span>
                </div>
                <div class="recent-debates__table-content">
                    <div class="tab-block show" id="all-debates">
                        <?php
                        if ($query1->have_posts()):
                        while ( $query1->have_posts() ) : $query1->the_post();
                            $one = get_the_ID();
                        ?>
                        <div class="recent-debates__item">
                            <div class="recent-debates__test d-flex flex-column align-items-start">
                                <a class="recent-debates__single-title"
                                   href="<?php bbp_topic_permalink($one); ?>"><?php bbp_topic_title($one); ?></a>
                                <?php if ( is_singular( 'reply' ) ) { ?>
                                    <a href="<?php  echo bbp_get_forum_permalink(bbp_get_topic_forum_id(bbp_get_reply_topic_id($one))) ?>" class="debate-tag custom-btn "><?php echo bbp_get_forum_title(bbp_get_topic_forum_id(bbp_get_reply_topic_id($one))) ?></a>
                                <?php  } else { ?>
                                    <a href="<?php  echo bbp_get_forum_permalink(bbp_get_topic_forum_id($one)) ?>" class="debate-tag custom-btn "><?php echo bbp_get_forum_title(bbp_get_topic_forum_id($one)) ?></a>
                                <?php }?>
                            </div>
                            <div class="recent-debates__messages">
                                <span><?php bbp_show_lead_topic($one) ? bbp_topic_reply_count($one) +1 : bbp_topic_post_count($one) +1; ?></span>
                                <span class="recent-debates__label-mobile d-lg-none d-inline">indlæg</span>
                            </div>
                            <div class="user-block d-flex align-items-center">
                                <?php bbp_author_link(array('post_id' => bbp_get_topic_last_active_id($one), 'size' => 35, 'type' => 'avatar')); ?>

                                <div class="user-block__info d-flex flex-md-column justify-content-between">
            <span class="user-block__date">

                        <?php bbp_topic_freshness_link($one); ?>

            </span>
                                    <span class="user-block__name">
                <?php bbp_author_link(array('post_id' => bbp_get_topic_last_active_id($one), 'type' => 'name')); ?>
            </span>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;
                        else : ?>
                        <p class="bbp-user-section--no-items"><?php esc_html_e( 'Oh, bother! No topics were found here.', 'bbpress' ); ?></p>
                        <?php
                        endif;
                        ?>


                    </div>
                </div>
                <?php
                if ($count > 8 ) :
                if (($pagination == 0)&&($debat == 1)) { ?>
                <div class="recent-debates__more text-center">
                    <a href="/?s=<?php the_search_query(); ?>&type=debat" class="custom-btn outline d-inline-block">Vis mare</a>
                </div>
                <?php } else {
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
                );
echo '</div>';
                }
                endif;?>
            </div>
        </div>
        <?php endif;
//        if ($other == 1) :
//
//            $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
//
//            $query3 = new WP_Query( array(
//                'posts_per_page' => 9,
//                'post_type' => 'post',
//                's' => get_search_query(),
//                'category__in' => array( 34 )
//
//            ) );
//            $tv_result= array();
//            while ( $query3->have_posts() ) : $query3->the_post();
//            $tv_result []= '
//            <div class="recent-debates__item">
//                <div class="recent-debates__test d-flex flex-column align-items-start">
//                    <span class="other-categories">Min-Mave-tv</span>
//                </div>
//                <div class="d-flex recent-debates__messages">
//                    <img class="other-post-img" src="'.  get_the_post_thumbnail_url().'" alt="'.get_the_title().'">
//                    <div class="d-flex">
//
//                                    <span class="other-name">
//                                        <a href="'.get_the_permalink().'">
//                                            '.get_the_title().'
//                                        </a>
//                                    </span>
//                    </div>
//                </div>
//                <div class="user-block d-flex">
//                    <div class="user-block__info d-flex flex-column">
//                                                <span class="user-block__date">
//                                                    '.get_the_date('d.m.Y').'
//                                                </span>
//                    </div>
//                </div>
//            </div>';
//        endwhile;
//
//        $blogs = get_sites(array('site__not_in' => array('1','240'), 'deleted' => 0));
//
//        foreach ( $blogs as $blog ):
//            switch_to_blog($blog->blog_id);
//            $blog = new WP_Query( array(
//                'posts_per_page' => -1,
//                'post_type' => 'post',
//                's' => get_search_query(),
//            ) );
//            while ( $blog->have_posts() ) : $blog->the_post();
//                $tv_result []= '
//                    <div class="recent-debates__item">
//                        <div class="recent-debates__test d-flex flex-column align-items-start">
//                            <span class="other-categories">Bloggere</span>
//                        </div>
//                        <div class="d-flex recent-debates__messages align-items-center">
//                            <div class="other-post-img">
//                                <img  src="'.  get_the_post_thumbnail_url().'" alt="'.get_the_title().'">
//                            </div>
//                            <div class="d-flex">
//
//                                            <span class="other-name">
//                                                <a href="'.get_the_permalink().'">
//                                                    '.get_the_title().'
//                                                </a>
//                                            </span>
//                            </div>
//                        </div>
//                        <div class="user-block d-flex">
//                            <div class="user-block__info d-flex flex-column">
//                                                        <span class="user-block__date">
//                                                            '.get_the_date('d.m.Y').'
//                                                        </span>
//                            </div>
//                        </div>
//                    </div>';
//            endwhile;
//        endforeach;
//        restore_current_blog();
//        $count = (int)count($tv_result)
//        ?>
<!---->
<!--        <div class="other-block">-->
<!--            <div class="text-left">-->
<!--                <p class="search__result-count">Andre (--><?php //echo $count; ?><!--)</p>-->
<!--            </div>-->
<!--            <div class="recent-debates__table">-->
<!--                <div class="recent-debates__table-head">-->
<!--                    <span>Kategori</span>-->
<!--                    <span>Indhold</span>-->
<!--                    <span>Data i forfatter</span>-->
<!--                </div>-->
<!--                <div class="recent-debates__table-content">-->
<!--                    <div class="tab-block show" id="all-debates">-->
<!--                        --><?php
//                        for ($i = 8*($paged-1)+1;  $i<8*($paged-1)+9; $i++) {
//                            echo $tv_result[$i];
//                        } ?>
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--                --><?php
//                if ($count > 8 ) :
//                    if (($pagination == 0)&&($other == 1)) { ?>
<!--                        <div class="recent-debates__more text-center">-->
<!--                            <a href="/?s=--><?php //the_search_query(); ?><!--&type=other" class="custom-btn outline d-inline-block">Vis mare</a>-->
<!--                        </div>-->
<!--                    --><?php //} else {
//                        echo '<div class="pagination d-flex justify-content-center align-items-center">';
//                        switch_to_blog( 1 );
//                        $article_ws = get_field('article_ws','options');
//                        switch_to_blog($article_ws);
//                        echo paginate_links(
//                            array(
//                                'total' => $count/8+1,
//                                'prev_next' => true,
//                                'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="7.811" height="14.121" viewBox="0 0 7.811 14.121" style="transform: rotate(180deg)">
//  <g id="arrow_right" data-name="arrow right" transform="translate(1.061 1.061)">
//    <g id="nav-arrow-down" transform="translate(0 12) rotate(-90)">
//      <g id="Сгруппировать_10" data-name="Сгруппировать 10" transform="translate(0 0)">
//        <path id="Контур_4" data-name="Контур 4" d="M0,0,6,6l6-6" fill="none" stroke="#e861a0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
//      </g>
//    </g>
//  </g>
//</svg>',
//                                'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="7.811" height="14.121" viewBox="0 0 7.811 14.121">
//  <g id="arrow_right" data-name="arrow right" transform="translate(1.061 1.061)">
//    <g id="nav-arrow-down" transform="translate(0 12) rotate(-90)">
//      <g id="Сгруппировать_10" data-name="Сгруппировать 10" transform="translate(0 0)">
//        <path id="Контур_4" data-name="Контур 4" d="M0,0,6,6l6-6" fill="none" stroke="#e861a0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
//      </g>
//    </g>
//  </g>
//</svg>',
//                            )
//                        );
//                        echo '</div>';
//                    }
//                endif;?>
<!--            </div>-->
<!--        </div>-->
<!--        --><?php //endif; ?>

        <div class="row align-items-center">
            <div class="col-xl-8">
                <div class="col-xl-12 flex-md-row ">
                </div>
            </div>
        </div>
    </div>
</div>



<?php
//switch_to_blog($article_ws);
get_footer('no-content'); ?>

