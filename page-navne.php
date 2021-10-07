<?php
/* Template Name: Navne Template */

get_header(); ?>
<div class="main-block">
    <div class="container">

        <?php get_template_part('banners/top-banner'); ?>
        <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>


        <div class="row align-items-start">

            <div class="d-none d-xl-block col-2"><?php get_template_part('banners/left-skyscraper');  ?></div>

            <div class="col d-flex flex-column flex-lg-row">
                <div class="content">

                    <?php
                    $object = get_query_var('object');
                    if ((substr($object, strlen($object) - strlen('-navne')) == '-navne')
                        && ($object != 'mest-populaere-baby-navne') && ($object != 'populaere-navne')
                    ) {
                        $object = 'betydning';
                    }
                    $parametrs = get_query_var('parametrs');
                    switch ($object) {
                        case 'navnekarrusel':
                            $title = 'Navnekarrusel';
                            get_template_part('navne/page', 'carousel');
                            break;
                        case 'navnedag':
                            get_template_part('navne/page', 'calendar');
                            break;
                        case 'mest-populaere-baby-navne':
                        case 'populaere-navne':
                        case 'pigenavne':
                        case 'drengenavne':
                            get_template_part('navne/page', 'popular');
                            break;
                        case 'alle-kendte':
                            get_template_part('navne/page', 'alle-kendte');
                            break;
                        case 'kendte':
                            get_template_part('navne/page', 'famous');
                            break;
                        case 'betydning':
                            get_template_part('navne/page', 'nation');
                            break;
                        case 'liste':
                            get_template_part('navne/page', 'liste');
                            break;
                        case '':
                            get_template_part('navne/page', 'navne');
                            break;
                        default:
                            get_template_part('navne/page', 'meaning');
                            break;
                    }
                    ?>
                    <div class="main-article" style="margin-top:30px;">
                        <div class="main-article__info d-flex flex-column d-lg-block clearfix"> 


                    <?php
                    $the_slug = get_query_var('object');

                    $args = array(
                        'name'        => $the_slug,
                        'post_type'   => 'names',
                        'post_status' => 'publish',
                        'numberposts' => 1
                    );
                    $seo_post = get_posts($args)[0];

                    if ($seo_post) {
                        echo apply_filters('the_content', $seo_post->post_content);
                    }

                    ?>           
                                 </div>
                    </div>

                </div>
                <?php get_sidebar('names') ?>
            </div>
            <div class="d-none d-xl-block col-2 text-right"><?php get_template_part('banners/right-skyscraper'); ?></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>