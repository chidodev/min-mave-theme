  <div class="main-article">
                            <h1 class="main-article__title main-article__title--violet">Navnekarrusel</h1>
                            <div class="main-article__info d-flex flex-column d-lg-block clearfix">
                                Er I i tvivl om, hvad jeres lille ny baby skal hedde? Med vores navnekarrusel kan I angive parametre, såsom køn og begyndelsesbogstav, og navnekarrusellen kommer så med forskellige navneforslag til jer.<br><br>

                                Hvis I ønsker, at babys navn skal have en bestemt minimums eller maksimums længde, måske så det passer bedre sammen med babys søskendes navne, er det også muligt at angive nogle mere avancerede parametre, så I kan få nogle navneforslag, der matcher præcis jeres ønsker.<br><br>

                                Med navnekarrusellen kan I for alvor få ”rystet posen” og få forslag, I måske slet ikke havde overvejet – og I kan naturligvis prøve igen og igen, lige indtil det helt rigtige navn til netop jeres baby dukker op.
                            </div>
                        </div>
                      <div class="d-flex justify-content-between align-items-center name-carousel__name-suggest">
                        <span>Prøv lykken - Få 10 tilfældige navneforslag</span>
                        <a href="javascript:window.location.href=window.location.href" class="custom-btn outline">Klik for 10 nye navne</a>
                      </div>
                        <?php
                        $parametrs = get_query_var('parametrs');
                        if ($parametrs == 'dreng') {
                            $link = get_field('navne_api_url','option').'/api/name/random?gender=drengenavne';
                        } elseif($parametrs == 'pige') {
                            $link = get_field('navne_api_url','option').'/api/name/random?gender=pigenavne';
                        }else{
                            $link = get_field('navne_api_url','option').'/api/name/random';
                        }

                        $json = file_get_contents($link);
                        $obj = json_decode($json, true);?>

                      <div class="name-carousel__table">
                            <div class="custom-item-container d-flex flex-column">
                              <div class="name-carousel__table-title widget-title d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                  <span>10 navneforslag</span>
                                </div>
                                <div class="widget-filters tabs-container">
                                    <a href="/navne/navnekarrusel/dreng" <?php echo strripos($parametrs,'dreng')?'class="reverse"':''; ?>>Drengenavne</a>
                                    <a href="/navne/navnekarrusel/pige" <?php echo strripos($parametrs,'pige')?'class="reverse"':''; ?>>Pigenavne</a>
                                    <a href="/navne/navnekarrusel/enhver" <?php echo ((strripos($parametrs,'dreng')== false)&&(strripos($parametrs,'pige')== false)) ?'class="reverse"':''; ?>>Enhver</a>
                                </div>
                              </div>
                              <div class="name-carousel__table-body widget-body">
                                <div class="widget-filters justify-content-between tabs-container mt-2">
                                    <a href="/navne/navnekarrusel/dreng" <?php echo strripos($parametrs,'dreng')?'class="reverse"':''; ?>>Drengenavne</a>
                                    <a href="/navne/navnekarrusel/pige" <?php echo strripos($parametrs,'pige')?'class="reverse"':''; ?>>Pigenavne</a>
                                    <a href="/navne/navnekarrusel/enhver" <?php echo ((strripos($parametrs,'dreng')== false)&&(strripos($parametrs,'pige')== false)) ?'class="reverse"':''; ?>>Enhver</a>

                                </div>
                                  <?php foreach($obj as $key => $value) : ?>
                                      <div class="names-calendar__table-item">
                                          <div class="names-calendar__table-count"><?php echo ($key+1); ?></div>
                                          <div class="names-calendar__table-name"><?php echo $value['name']; ?></div>
                                          <div class="names-calendar__table-rate">
                                              <?php $raiting = floatval(($value['ratings']['RatingAverage'] != null)?$value['ratings']['RatingAverage']:0);
                                               $star = 1;
                                               while ($star<= 5) :
                                               if ($star <= $raiting) : ?>
                                                  <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                                               <?php else : ?>
                                                   <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                                                  <?php
                                               endif;
                                                  $star++ ;
                                              endwhile;?>

                                          </div>
                                          <div class="names-calendar__table-check d-flex justify-content-between">
                                              <?php if ($value['genders'][0]['name'] == 'drengenavne') : ?>
                                                  <img class="fe" src="<?php echo get_template_directory_uri();?>/assets/img/male-icon-alt.svg" alt="Check">
                                              <?php elseif ($value['genders'][0]['name'] == 'pigenavne') : ?>
                                                  <img class="fe" src="<?php echo get_template_directory_uri();?>/assets/img/female-icon.svg" alt="Check">
                                              <?php endif; ?>

                                              <?php if ($value['approved'] == 1) : ?>
                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/name-check.svg" alt="Check" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
                                              <?php endif; ?>
                                          </div>
                                          <a href="/navne/<?php echo $value['slug']; ?>" class="names-calendar__table-link">
                                              <span class="mr-1">FLERE INFORMATIONER</span>

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