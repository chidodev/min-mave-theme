    <div class="main-article">
        <h1 class="main-article__title main-article__title--violet">Danske navnedage</h1>
        <div class="main-article__info d-flex flex-column d-lg-block clearfix">
            Næsten alle årets 365 dage har en navnedag i Danmark og stort set alle  navne tager udgangspunkt i helgennavne. Før reformationen i 1536 havde den  katolske kirke en kalender, hvor det var anført, hvilke dage, navnedage, man  skulle mindes bestemte helgener. <br><br>

            En helgen er en person, som af det kristne trossamfund regnes for at være særligt hellig og som umiddelbart efter sin død kom i himmelen og fik del i den evige salighed. Helgener æres som trosmæssige forbilleder, hvis liv det er værd at efterleve.<br><br>

            I gamle dage i Danmark fejrede man navnedag, som vi i dag fejrer fødselsdag. Navnedag fejres stadig i de katolske lande, men også i vore nabolande Norge, Sverige og Finland <br><br>

            I skudår – 2012, 2016, 2020 osv. - har den 24. februar ingen dansk navnedag. De danske navne Mattias, Victorinus, Inger, Leander og Øllegaard flyttes derfor en dag frem til henholdsvis 25., 26., 27., 28. og 29. februar.
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center names-calendar__name-suggest">
<!--        <span>Prøv lykken - Få 10 tilfældige navneforslag</span>-->
<!--        <a href="#" class="custom-btn outline">Foreslå navne</a>-->
    </div>
    <?php
    $months = array (
        "1" => 'januar',
        "2" => 'februar',
        "3" => 'marts',
        "4" => 'april',
        "5" => 'maj',
        "6" =>'juni',
        "7" =>'juli',
        "8"=>'august',
        "9"=>'september',
        "10"=> 'oktober',
        "11" => 'november',
        "12" =>'december'
    );
    $parametrs = get_query_var('parametrs');
    $month = array_search($parametrs,$months);

    if (empty ($month)) {
        $month = date('m');
    }
    $dateObj   = DateTime::createFromFormat('!m', $month);
    $month_name = $dateObj->format('M');
//    var_dump($month_name);
    $link = get_field('navne_api_url','option').'/api/nameday?month='.$month;
    $json = file_get_contents($link);
    $obj = json_decode($json,true);?>
    <div class="names-calendar__table tabs">
        <div class="custom-item-container d-flex flex-column">
            <div class="names-calendar__table-title widget-title d-flex justify-content-start align-items-center">
                <div class="d-flex">
                    <span>Navnedage</span>
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
                            <a href="/navne/navnedag/januar" class="custom-dropdown__item <?php echo ($month == 1)?'selected':'';?>">Januar</a>
                            <a href="/navne/navnedag/februar" class="custom-dropdown__item <?php echo ($month == 2)?'selected':'';?>">Februar</a>
                            <a href="/navne/navnedag/marts" class="custom-dropdown__item <?php echo ($month == 3)?'selected':'';?>">Marts</a>
                            <a href="/navne/navnedag/april" class="custom-dropdown__item <?php echo ($month == 4)?'selected':'';?>">April</a>
                            <a href="/navne/navnedag/maj" class="custom-dropdown__item <?php echo ($month == 5)?'selected':'';?>">Maj</a>
                            <a href="/navne/navnedag/juni" class="custom-dropdown__item <?php echo ($month == 6)?'selected':'';?>">Juni</a>
                            <a href="/navne/navnedag/juli" class="custom-dropdown__item <?php echo ($month == 7)?'selected':'';?>">Juli</a>
                            <a href="/navne/navnedag/august" class="custom-dropdown__item <?php echo ($month == 8)?'selected':'';?>">August</a>
                            <a href="/navne/navnedag/september" class="custom-dropdown__item <?php echo ($month == 9)?'selected':'';?>">September</a>
                            <a href="/navne/navnedag/oktober" class="custom-dropdown__item <?php echo ($month == 10)?'selected':'';?>">Oktober</a>
                            <a href="/navne/navnedag/november" class="custom-dropdown__item <?php echo ($month == 11)?'selected':'';?>">November</a>
                            <a href="/navne/navnedag/december" class="custom-dropdown__item <?php echo ($month == 12)?'selected':'';?>">December</a>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="recent-debates__tabs names-tabs d-flex align-items-center tabs-container">-->
<!--                <span class="active tab-item" data-tab="drengenavne">Drengenavne</span>-->
<!--                <span class="tab-item" data-tab="pigenavne">Pigenavne</span>-->
<!--                <span class="tab-item" data-tab="enhver">Enhver</span>-->
<!--            </div>-->
            <div class="names-calendar__table-body widget-body">
                <div class="tab-block show" id="drengenavne">
                    <?php foreach($obj as $value) : ?>
                        <div class="names-calendar__table-item">
                            <div class="names-calendar__table-count"><?php echo $value['day'].' '.$month_name; ?> </div>
                            <?php if ($value['core_name'] == null) :?>
                            <a class="names-calendar__table-name"><?php echo $value['name']; ?></a>
                            <?php else : ?>
                            <a href="/navne/<?php echo $value['core_name']['slug']; ?>" class="names-calendar__table-name"><?php echo $value['name']; ?></a>
                            <div class="names-calendar__table-rate">
                                <?php $raiting = ($value['core_name']['ratings']['RatingAverage'] != null)?$value['core_name']['ratings']['RatingAverage']:0;
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
                                <?php if ($value['gender'][0]['name'] == 'drengenavne') : ?>
                                    <img class="fe" src="<?php echo get_template_directory_uri();?>/assets/img/male-icon-alt.svg" alt="Check">
                                <?php elseif ($value['gender'][0]['name'] == 'pigenavne') : ?>
                                    <img class="fe" src="<?php echo get_template_directory_uri();?>/assets/img/female-icon.svg" alt="Check">
                                <?php endif; ?>

                                <?php if ($value['core_name']['approved'] == 1) : ?>
                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/name-check.svg" alt="Check">
                                <?php endif; ?>
                            </div>
                            <a href="/navne/<?php echo $value['core_name']['slug']; ?>" class="names-calendar__table-link">
                                <span class="mr-1">MERE</span>

                                <svg xmlns="http://www.w3.org/2000/svg" width="7.811" height="14.121" viewBox="0 0 7.811 14.121">
                                    <g id="nav-arrow-down" transform="translate(-7.939 19.061) rotate(-90)">
                                        <g id="Сгруппировать_10" data-name="Сгруппировать 10" transform="translate(6 9)">
                                            <path id="Контур_4" data-name="Контур 4" d="M6,9l6,6,6-6" transform="translate(-6 -9)" fill="none" stroke="#634282" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                        </g>
                                    </g>
                                </svg>

                            </a>
                            <?php endif; ?>
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