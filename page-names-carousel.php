<?php
/* Template Name: Names-carousel */

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
                            <h3 class="main-article__title main-article__title--violet">Populære drengenavne</h3>
                            <div class="main-article__info d-flex flex-column d-lg-block clearfix">
                                Længe før den lille ny er kommet til verden, starter overvejelserne. Hvad skal I kalde jeres lille søn?

                                På Min-Mave kan du se en liste over alle drengenavne, både de allermest populære drengenavne og de FlERE INFORMATIONER unikke. Du kan også bruge de mange søgemuligheder til f.eks. at finde drengenavne, der starter eller slutter med et bestemt bogstav, eller drengenavne der har en bestemt længde.

                                Hvis din søn allerede har fået sit navn, kan du ved hjælp af tabellen i højre side se, hvilken placering din søns navn har fået i listen over populære drengenavne år for år. Du kan også se, hvilke berømtheder dit barn deler navn med og meget FlERE INFORMATIONER.

                                God fornøjelse
                            </div>
                        </div>
                      <div class="d-flex justify-content-between align-items-center name-carousel__name-suggest">
                        <span>Prøv lykken - Få 10 tilfældige navneforslag</span>
                        <a href="#" class="custom-btn outline">Foreslå navne</a>
                      </div>
                        <?php

                        $link = get_field('navne_api_url','option').'/api/name/random';
                        $json = file_get_contents($link);
                        $obj = json_decode($json);?>

                      <div class="name-carousel__table">
                            <div class="custom-item-container d-flex flex-column">
                              <div class="name-carousel__table-title widget-title d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                  <span>Foreslå navne</span>
                                </div>
                                <div class="widget-filters">
                                  <a href="#">Navn</a>
                                  <a href="#" class="reverse">Popularitet</a>
                                  <a href="#">Rating</a>
                                </div>
                              </div>
                              <div class="name-carousel__table-body widget-body">
                                <div class="widget-filters justify-content-between">
                                  <a href="#">Navn</a>
                                  <a href="#" class="reverse">Popularitet</a>
                                  <a href="#">Rating</a>
                                </div>
                                  <?php foreach($obj as $key => $value) : ?>
                                      <div class="names-calendar__table-item">
                                          <div class="names-calendar__table-count"><?php echo ($key+1); ?></div>
                                          <div class="names-calendar__table-name"><?php echo $value->name; ?></div>
                                          <div class="names-calendar__table-rate">
                                              <?php $raiting = 3;
                                               $star = 1;
                                               while ($star >= $raiting) : ?>
                                                  <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                                                  <?php
                                                  $star++ ;
                                                  endwhile;
                                                  while ($star >= 5) : ?>
                                                      <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                                                  <?php
                                                  $star++ ;
                                              endwhile;?>

                                          </div>
                                          <div class="names-calendar__table-check d-flex justify-content-between">

                                              <img class="fe" src="<?php echo get_template_directory_uri();?>/assets/img/female-icon.svg" alt="Check">
                                              <?php if ($value->approved == 1) : ?>
                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/name-check.svg" alt="Check">
                                              <?php endif; ?>
                                          </div>
                                          <a href="/navne/<?php echo $value->slug; ?>" class="names-calendar__table-link">
                                              <span>FlERE INFORMATIONER</span>

                                              <svg xmlns="http://www.w3.org/2000/svg" width="7.811" height="14.121" viewBox="0 0 7.811 14.121">
                                                  <g id="nav-arrow-down" transform="translate(-7.939 19.061) rotate(-90)">
                                                      <g id="Сгруппировать_10" data-name="Сгруппировать 10" transform="translate(6 9)">
                                                          <path id="Контур_4" data-name="Контур 4" d="M6,9l6,6,6-6" transform="translate(-6 -9)" fill="none" stroke="#634282" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                      </g>
                                                  </g>
                                              </svg>

                                          </a>
                                      </div>
                                  <?php endforeach; ?>

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

