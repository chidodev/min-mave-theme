<?php

/* Template Name: Popular names */

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
                            <h1 class="main-article__title main-article__title--violet">Populære drengenavne</h1>
                            <div class="main-article__info d-flex flex-column d-lg-block clearfix">
                                Længe før den lille ny er kommet til verden, starter overvejelserne. Hvad skal I kalde jeres lille søn?

                                På Min-Mave kan du se en liste over alle drengenavne, både de allermest populære drengenavne og de mere unikke. Du kan også bruge de mange søgemuligheder til f.eks. at finde drengenavne, der starter eller slutter med et bestemt bogstav, eller drengenavne der har en bestemt længde.

                                Hvis din søn allerede har fået sit navn, kan du ved hjælp af tabellen i højre side se, hvilken placering din søns navn har fået i listen over populære drengenavne år for år. Du kan også se, hvilke berømtheder dit barn deler navn med og meget mere.

                                God fornøjelse
                            </div>
                        </div>
                        <div class="popular-name__letters">
                            <div class="popular-name__letters-title">
                                Vælg navnets startbogstav
                            </div>
                            <div class="popular-name__letters-list d-md-flex">
                                <div class="d-flex flex-wrap flex-lg-nowrap">
                                    <a href="#">A</a><a href="#">A</a><a class="active" href="#">A</a><a href="#">A</a><a
                                            href="#">A</a><a href="#">A</a><a href="#">A</a><a href="#">A</a><a
                                            href="#">A</a><a href="#">A</a><a href="#">A</a><a href="#">A</a><a
                                            href="#">A</a><a href="#">A</a><a href="#">A</a><a href="#">A</a><a
                                            href="#">A</a><a href="#">A</a>
                                </div>
                                <div class="d-flex flex-wrap flex-lg-nowrap">
                                    <a href="#">B</a><a href="#">B</a><a href="#">B</a><a href="#">B</a><a
                                            href="#">B</a><a href="#">B</a><a href="#">B</a><a href="#">B</a><a
                                            href="#">B</a><a href="#">B</a><a href="#">B</a>
                                </div>
                            </div>
                        </div>
                        <div class="popular-name__table">
                            <div class="custom-item-container ">
                                <div class="popular-name__table-title widget-title d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/male-icon.svg" alt="Male">
                                        <span>Tilmeld dig nyhedsbrevet</span>
                                    </div>
                                    <div class="widget-filters">
                                        <a href="#">Navn</a>
                                        <a href="#" class="reverse">Popularitet</a>
                                        <a href="#">Rating</a>
                                    </div>
                                </div>
                                <div class="popular-name__table-body widget-body">
                                    <div class="widget-filters justify-content-between">
                                        <a href="#">Navn</a>
                                        <a href="#" class="reverse">Popularitet</a>
                                        <a href="#">Rating</a>
                                    </div>
                                    <div class="popular-name__table-item">
                                        <div class="popular-name__table-count">1.</div>
                                        <img class="popular-name__table-trend" src="<?php echo get_template_directory_uri(); ?>/assets/img/increase.svg" alt="">
                                        <div class="popular-name__table-name">William</div>
                                        <div class="popular-name__table-rate">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                                        </div>
                                        <div class="popular-name__table-check">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/name-check.svg" alt="Check">
                                        </div>
                                        <a href="#" class="popular-name__table-link">
                                            <span>MERE</span>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="7.811" height="14.121" viewBox="0 0 7.811 14.121">
                                                <g id="nav-arrow-down" transform="translate(-7.939 19.061) rotate(-90)">
                                                    <g id="Сгруппировать_10" data-name="Сгруппировать 10" transform="translate(6 9)">
                                                        <path id="Контур_4" data-name="Контур 4" d="M6,9l6,6,6-6" transform="translate(-6 -9)" fill="none" stroke="#634282" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                    </g>
                                                </g>
                                            </svg>

                                        </a>
                                    </div>
                                    <div class="popular-name__table-item">
                                        <div class="popular-name__table-count">2.</div>
                                        <img class="popular-name__table-trend" src="<?php echo get_template_directory_uri(); ?>/assets/img/decrease.svg" alt="">
                                        <div class="popular-name__table-name">Bartholomeu</div>
                                        <div class="popular-name__table-rate">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                                        </div>
                                        <div class="popular-name__table-check">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/name-check.svg" alt="Check">
                                        </div>
                                        <a href="#" class="popular-name__table-link">
                                            <span>MERE</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7.811" height="14.121" viewBox="0 0 7.811 14.121">
                                                <g id="nav-arrow-down" transform="translate(-7.939 19.061) rotate(-90)">
                                                    <g id="Сгруппировать_10" data-name="Сгруппировать 10" transform="translate(6 9)">
                                                        <path id="Контур_4" data-name="Контур 4" d="M6,9l6,6,6-6" transform="translate(-6 -9)" fill="none" stroke="#634282" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="popular-name__table-item">
                                        <div class="popular-name__table-count">3.</div>
                                        <img class="popular-name__table-trend" src="<?php echo get_template_directory_uri(); ?>/assets/img/decrease.svg" alt="">
                                        <div class="popular-name__table-name">John</div>
                                        <div class="popular-name__table-rate">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                                        </div>
                                        <div class="popular-name__table-check">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/name-check.svg" alt="Check">
                                        </div>
                                        <a href="#" class="popular-name__table-link">
                                            <span>MERE</span>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="7.811" height="14.121" viewBox="0 0 7.811 14.121">
                                                <g id="nav-arrow-down" transform="translate(-7.939 19.061) rotate(-90)">
                                                    <g id="Сгруппировать_10" data-name="Сгруппировать 10" transform="translate(6 9)">
                                                        <path id="Контур_4" data-name="Контур 4" d="M6,9l6,6,6-6" transform="translate(-6 -9)" fill="none" stroke="#634282" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                    </g>
                                                </g>
                                            </svg>

                                        </a>
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

<?php get_footer(); ?>

