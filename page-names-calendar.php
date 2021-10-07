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
                      <div class="d-flex justify-content-between align-items-center names-calendar__name-suggest">
                        <span>Prøv lykken - Få 10 tilfældige navneforslag</span>
                        <a href="#" class="custom-btn outline">Foreslå navne</a>
                      </div>
                        <?php
                        $month = date('m');
                        $link = get_field('navne_api_url','option').'/api/nameday?month=1';
                        $json = file_get_contents($link);
                        $obj = json_decode($json);?>
                      <div class="names-calendar__table tabs">
                            <div class="custom-item-container d-flex flex-column">
                              <div class="names-calendar__table-title widget-title d-flex justify-content-start align-items-center">
                                <div class="d-flex">
                                  <span>Foreslå navne</span>
                                </div>
                                <div class="custom-select-block names-calendar-select-block">
                                  <input type="hidden">
                                  <span class="custom-select-block__value">Måned</span>
                                  <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                      <g id="Group_483" data-name="Group 483" transform="translate(206 40) rotate(180)">
                                        <g id="nav-arrow-down" transform="translate(189.051 21.525)">
                                          <g id="Group_10" data-name="Group 10" transform="translate(6 9)">
                                            <path id="Path_4" data-name="Path 4" d="M6,9l2.949,2.949L11.9,9" transform="translate(-6 -9)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path>
                                          </g>
                                        </g>
                                        <g id="Ellipse_72" data-name="Ellipse 72" transform="translate(190 24)" fill="none" stroke="#e861a0" stroke-width="1">
                                          <circle cx="8" cy="8" r="8" stroke="none"></circle>
                                          <circle cx="8" cy="8" r="7.5" fill="none"></circle>
                                        </g>
                                      </g>
                                    </svg>
                                  </span>
                                  <div class="custom-dropdown">
                                    <input type="hidden" name="month">
                                    <div class="d-flex custom-dropdown__items">
                                      <a href="" class="custom-dropdown__item selected">Januar</a>
                                      <a href="" class="custom-dropdown__item">Februar</a>
                                      <a href="" class="custom-dropdown__item">Marts</a>
                                      <a href="" class="custom-dropdown__item">April</a>
                                      <a href="" class="custom-dropdown__item">Maj</a>
                                      <a href="" class="custom-dropdown__item">Juni</a>
                                      <a href="" class="custom-dropdown__item">Juli</a>
                                      <a href="" class="custom-dropdown__item">August</a>
                                      <a href="" class="custom-dropdown__item">September</a>
                                      <a href="" class="custom-dropdown__item">Oktober</a>
                                      <a href="" class="custom-dropdown__item">November</a>
                                      <a href="" class="custom-dropdown__item">December</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                                <div class="recent-debates__tabs names-tabs d-flex align-items-center tabs-container">
                                    <span class="active tab-item" data-tab="drengenavne">Drengenavne</span>
                                    <span class="tab-item" data-tab="pigenavne">Pigenavne</span>
                                    <span class="tab-item" data-tab="enhver">Enhver</span>
                                </div>
                              <div class="names-calendar__table-body widget-body">
                                  <div class="tab-block show" id="drengenavne">
                                      <?php foreach($obj as $value) : ?>
                                        <div class="names-calendar__table-item">
                                            <div class="names-calendar__table-count"><?php echo $value->day. ' ' .date('D'); ?> </div>
                                            <a href="" class="names-calendar__table-name"><?php echo $value->name; ?></a>
                                            <div class="names-calendar__table-rate">
                                                <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                                                <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                                                <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                                                <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                                                <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                                            </div>
                                          <div class="names-calendar__table-check d-flex justify-content-between">
                                              <?php if ($value['genders'][0]['name'] == 'drengenavne') : ?>
                                                  <img class="fe" src="<?php echo get_template_directory_uri();?>/assets/img/male-icon-alt.svg" alt="Check">
                                              <?php elseif ($value['genders'][0]['name'] == 'pigenavne') : ?>
                                                  <img class="fe" src="<?php echo get_template_directory_uri();?>/assets/img/female-icon.svg" alt="Check">
                                              <?php endif; ?>

                                              <?php if ($value['approved'] == 1) : ?>
                                                  <img src="<?php echo get_template_directory_uri();?>/assets/img/name-check.svg" alt="Check">
                                              <?php endif; ?>                                            </div>
                                            <a href="#" class="names-calendar__table-link">
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
                                      <?php endforeach; ?>
                                  </div>
                                  <div class="tab-block" id="pigenavne">
                                      <p class="bbp-user-section--no-items text-center mt-3 mb-3">Ingen navne fundet</p>
                                  </div>
                                  <div class="tab-block" id="enhver">
                                      <p class="bbp-user-section--no-items text-center mt-3 mb-3">Ingen navne fundet</p>
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

