<div class="sidebar d-flex flex-column align-items-center">

    <?php
    $years = '<div class="custom-item-container blog-list years-list-widget">
            <div class="blog-list__title years-list-widget__title widget-title d-flex">
                <img src="/wp-content/themes/min-mave-theme/assets/img/calendar.svg" alt="Calendar">
                <span>Populære drengenavne - vælg år</span>
            </div>
            <div class="blog-list__body years-list-widget__body">';
    $year = 2018;
    $object = get_query_var('object');
    if ($object == 'drengenavne') {
        $gender = 'dreng';
    } elseif ($object == 'pigenavne') {
        $gender = 'pige';
    }
    while ($year>=1985) {
        $years .= '<a class="custom-btn outline" href="/navne/mest-populaere-baby-navne/'.$gender.'/'.$year.'/">'.$year.'</a>';
        $year--;
    }


    $years .= '</div>
        </div>';

    $search_form = '<div class="custom-item-container blog-list years-list-widget">
        <div class="blog-list__title years-list-widget__title widget-title d-flex">
            <img src="/wp-content/themes/min-mave-theme/assets/img/calendar.svg" alt="Calendar">
            <span>Søg i alle navne</span>
        </div>
        <div class="blog-list__body">
            <div class="names-widget-filter">
                <div class="names-widget-filter__title">
                    Vis kun:
                </div>
                 <form method="post" action="'.esc_url( admin_url('admin-post.php') ).'">
                   
                   <input type="hidden" name="action" value="popular_name_search">
                    <div class="names-widget-filter__checkboxes d-flex justify-content-between">
                        <div>
                            <div class="names-widget-filter__title">
                                Køn:
                            </div>
                            <div class="names-widget-filter__list">
                                <div class="custom-checkbox-block d-flex align-items-start">
                                    <label>
                                        <input type="checkbox" name="gender[]" value="drengenavne">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">drengenavne</div>
                                    </label>
                                </div>
                                <div class="custom-checkbox-block d-flex align-items-start">
                                    <label>
                                        <input type="checkbox" name="gender[]" value="pigenavne">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">pigenavne</div>
                                    </label>
                                </div>
                                <div class="custom-checkbox-block d-flex align-items-start">
                                    <label>
                                        <input type="checkbox" name="gender[]" value="unisex_name">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">unisex-navne</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="names-widget-filter__title">
                                Godkendte navne:
                            </div>
                            <div class="names-widget-filter__list">
                                <div class="custom-checkbox-block d-flex align-items-start">
                                    <label>
                                        <input type="checkbox" name="approved[]" value="1">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">Godkendte</div>
                                    </label>
                                </div>
                                <div class="custom-checkbox-block d-flex align-items-start">
                                    <label>
                                        <input type="checkbox" name="approved[]" value="0">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">Ikke-godkendte</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="names-widget-filter__inputs">
                        <div>
                            <div class="names-widget-filter__title">
                                Navne der begynder med
                            </div>
                            <div class="custom-input">
                                <label></label>
                                <input type="text" name="nameBeginning">
                            </div>
                        </div>
                        <div>
                            <div class="names-widget-filter__title">
                                Navne der slutter på
                            </div>
                            <div class="custom-input">
                                <label></label>
                                <input type="text" name="nameEnding">
                            </div>
                        </div>
                        <div>
                            <div class="names-widget-filter__title">
                                Navne som indeholder
                            </div>
                            <div class="custom-input">
                                <label></label>
                                <input type="text" name="nameContaining">
                            </div>
                        </div>
                    </div>
                    <button class="custom-btn">Søg</button>
                    <div class="advanced-block">
                        <span class="names-widget-filter__advanced">Avancerede indstillinger</span>
                        <div class="names-widget-filter__advanced-block">
                            <div class="names-widget-filter__list">
                                <div class="ovulation-calc__days range-slider__wrapper">
                                    <div class="ovulation-calc__input-title">
                                        Navnets længde: <span class="ovulation-calc__input-selected range-slider__amount"></span>
                                        <input type="hidden" name="nameLength">
                                    </div>
                                    <div class="calc-range d-flex justify-content-between">
                                        <span class="ovulation-calc__days-text">0</span>
                                        <div class="range-slider align-self-center" data-min="0" data-max="20">
                                            <div class="ui-slider-handle"></div>
                                        </div>
                                        <span class="ovulation-calc__days-text">20</span>
                                    </div>
                                </div>
                                <div class="ovulation-calc__days range-slider__wrapper">
                                    <div class="ovulation-calc__input-title">
                                        Konsonanter: <span class="ovulation-calc__input-selected range-slider__amount"></span>
                                        <input type="hidden" name="numberConsonant">
                                    </div>
                                    <div class="calc-range d-flex justify-content-between">
                                        <span class="ovulation-calc__days-text">0</span>
                                        <div class="range-slider align-self-center" data-min="0" data-max="20">
                                            <div class="ui-slider-handle"></div>
                                        </div>
                                        <span class="ovulation-calc__days-text">20</span>
                                    </div>
                                </div>
                                <div class="ovulation-calc__days range-slider__wrapper">
                                    <div class="ovulation-calc__input-title">
                                        Vokaler: <span class="ovulation-calc__input-selected range-slider__amount"></span>
                                        <input type="hidden" name="numberVowels">
                                    </div>
                                    <div class="calc-range d-flex justify-content-between">
                                        <span class="ovulation-calc__days-text">0</span>
                                        <div class="range-slider align-self-center" data-min="0" data-max="20">
                                            <div class="ui-slider-handle"></div>
                                        </div>
                                        <span class="ovulation-calc__days-text">20</span>
                                    </div>
                                </div>
                                <div class="custom-checkbox-block d-flex align-items-start mt-4">
                                    <label>
                                        <input type="checkbox" name="specialCharacters" value="1">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">Må indholde æ, ø og å</div>
                                    </label>
                                </div>
                            </div>
                            <div class="names-widget-filter__title mb-0">
                                Oprindelse:
                            </div>
                            <div class="advanced-block">
                                <div class="names-widget-filter__title">
                                    <div class="names-widget-filter__advanced mt-0">
                                        Skandinaviske Navne:
                                    </div>
                                    <div class="names-widget-filter__advanced-block">
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="danske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Danske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="finske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Finske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" name="islandske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Islandske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="name="norske-navnee">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Norske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="name="oldnordiske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Oldnordiske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="name="skandinaviske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Skandinaviske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="name="svenske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Svenske navne</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="advanced-block">
                                <div class="names-widget-filter__title">
                                    <div class="names-widget-filter__advanced mt-0">
                                        Europæiske Navne:
                                    </div>
                                    <div class="names-widget-filter__advanced-block">
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="albanske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Albanske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="armenske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Armenske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="baskiske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Baskiske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="engelske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Engelske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="franske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Franske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="germanske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Germanske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="graeske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Græske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="gaeliske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Gæliske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="hollandske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Hollandske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="irske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Irske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="italienske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Italienske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="korniske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Korniske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="kroatiske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Kroatiske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="latinske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Latinske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="litauiske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Litauiske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="polske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Polske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="portugisiske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Portugisiske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="roma-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Roma navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="russiske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Russiske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="schweiziske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Schweiziske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="skotske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Skotske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="slaviske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Slaviske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="slovenske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Slovenske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="spanske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Spanske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="tyske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Tyske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="ukrainske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Ukrainske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="ungarske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Ungarske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="walisiske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Walisiske navne</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="advanced-block">
                                <div class="names-widget-filter__title">
                                    <div class="names-widget-filter__advanced mt-0">
                                        Verdens navne:
                                    </div>
                                    <div class="names-widget-filter__advanced-block">
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="afrikanske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Afrikanske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="arabiske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Arabiske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="aramaeiske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Aramæiske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="assyriske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Assyriske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="babelske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Babelske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="esperanto-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Esperanto navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="hawaiianske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Hawaiianske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="hebraeiske-navnee">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Hebræiske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="hindi-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Hindi navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="indianske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Indianske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="japanske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Japanske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="jiddische-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Jiddische navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="keltiske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Keltiske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="kendte-personers-boerns-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Kendte personers børns navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="kendte-personers-boerns-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Kendte personers navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="kinesiske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Kinesiske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="koreanske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Koreanske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="nahuatl-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Nahuatl navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="persiske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Persiske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="thailandske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Thailandske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="tyrkiske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Tyrkiske navne</div>
                                            </label>
                                        </div>
                                        <div class="custom-checkbox-block d-flex align-items-start">
                                            <label>
                                                <input type="checkbox" name="origin[]" value="vietnamesiske-navne">
                                                <span class="checkmark"></span>
                                                <div class="names-widget-filter__label">Vietnamesiske navne</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="names-widget-filter__list">
                                <div class="custom-checkbox-block d-flex align-items-start">
                                    <label>
                                        <input type="checkbox" name="compoundNames" value="1">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">sammensatte navne</div>
                                    </label>
                                </div>
                                <div class="custom-checkbox-block d-flex align-items-start">
                                    <label>
                                        <input type="checkbox" name="compoundNames" value="0">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">ikke-sammensatte navne</div>
                                    </label>
                                </div>
                            </div>
                            <div class="names-widget-filter__title">
                                Sjældne navne:
                            </div>
                            <div class="names-widget-filter__list">
                                <div class="custom-checkbox-block d-flex align-items-start">
                                    <label>
                                        <input type="checkbox" name="rareNames" value="1">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">Vis</div>
                                    </label>
                                </div>
                            </div>
                            <div class="names-widget-filter__title">
                                Rating:
                            </div>
                            <div class="names-widget-filter__list d-flex justify-content-between">
                                <div class="custom-checkbox-block d-flex align-items-start">
                                    <label>
                                        <input type="checkbox" name="rating[]" value="1">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">1</div>
                                    </label>
                                </div>
                                <div class="custom-checkbox-block d-flex align-items-start">
                                    <label>
                                        <input type="checkbox" name="rating[]" value="2">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">2</div>
                                    </label>
                                </div>
                                <div class="custom-checkbox-block d-flex align-items-start">
                                    <label>
                                        <input type="checkbox" name="rating[]" value="3">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">3</div>
                                    </label>
                                </div>
                                <div class="custom-checkbox-block d-flex align-items-start">
                                    <label>
                                        <input type="checkbox" name="rating[]" value="4">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">4</div>
                                    </label>
                                </div>
                                <div class="custom-checkbox-block d-flex align-items-start">
                                    <label>
                                        <input type="checkbox" name="rating[]" value="5">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">5</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>';


    $search_famous = '<div class="custom-item-container blog-list years-list-widget">
        <div class="blog-list__title years-list-widget__title widget-title d-flex">
            <img src="/wp-content/themes/min-mave-theme/assets/img/calendar.svg" alt="Calendar">
            <span>Søg kendte</span>
        </div>
        <div class="blog-list__body">
            <div class="names-widget-filter">
                <form method="post" action="'.esc_url( admin_url('admin-post.php') ).'">
                   <input type="hidden" name="action" value="alle_kendte_search">
                    <div class="names-widget-filter__inputs mt-1">
                        <div class="custom-input">
                            <label for="find">Find en kendt </label>
                            <input type="text" id="find" name="kendt">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="custom-btn">
                            Søg kendte
                        </button>
                    </div>
                    <div class="advanced-block">
                        <span class="names-widget-filter__advanced">Avancerede indstillinger</span>
                        <div class="names-widget-filter__advanced-block">
                            <div class="names-widget-filter__title">
                                Beskæftigelse:
                            </div>
                            <div class="names-widget-filter__list">';

    $link = get_field('navne_api_url','option').'/api/profession';
    $json = file_get_contents($link);
    $obj = json_decode($json, true);

    foreach($obj as $key => $value) :
        $search_famous .= '
                                <div class="custom-checkbox-block d-flex align-items-start">
                                    <label>
                                        <input type="checkbox" name="professions[]" value="'.$value['plural'].'">
                                        <span class="checkmark"></span>
                                        <div class="names-widget-filter__label">'.$value['plural'].'</div>
                                    </label>
                                </div>';
    endforeach;

    $search_famous .= '
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>';
    $month_calendar = '<div class="custom-item-container month-filter">
            <div class="news-subscription__title widget-title d-flex">
                <img src="http://min-mave.local/wp-content/themes/min-mave-theme/assets/img/mail.svg"
                     alt="">
                <span>Søg i alle danske navnedage</span>
            </div>
            <div class="blog-list__body month-filter__body">
                    <a class="custom-btn outline" href="/navne/navnedag/januar">januar</a>
                    <a class="custom-btn outline" href="/navne/navnedag/februar">februar</a>
                    <a class="custom-btn outline" href="/navne/navnedag/marts">marts</a>
                    <a class="custom-btn outline" href="/navne/navnedag/april">april</a>
                    <a class="custom-btn outline" href="/navne/navnedag/maj">maj</a>
                    <a class="custom-btn outline" href="/navne/navnedag/juni">juni</a>
                    <a class="custom-btn outline" href="/navne/navnedag/juli">juli</a>
                    <a class="custom-btn outline" href="/navne/navnedag/august">august</a>
                    <a class="custom-btn outline" href="/navne/navnedag/september">september</a>
                    <a class="custom-btn outline" href="/navne/navnedag/oktober">oktober</a>
                    <a class="custom-btn outline" href="/navne/navnedag/november">november</a>
                    <a class="custom-btn outline" href="/navne/navnedag/december">december</a>
                </div>
            </div>';

    $link = get_field('navne_api_url','option').'/api/famouspeople?date='.date('d').'-'.date('m').'&perPage=5&page=1';
    $json = file_get_contents($link);
    $obj = json_decode($json, true);
    $famous_per_day = '<div class="custom-item-container mail-block">
        <div class="mail-block__title widget-title d-flex">
            <img src="/wp-content/themes/min-mave-theme/assets/img/calendar.svg" alt="Calendar">
            <span>Tillykke med fødselsdagen</span>
        </div>
        <div class="famous-names__widget-body">
            <div>';
    foreach($obj as $key => $value) :
        if (!isset($value['totalNumberOfItems'])) :
            $famous_per_day .= '
                    <div class="famous-names__widget-item align-items-center">
                        <div class="famous-names__widget-flag"><img class="country-flag" src="'.$value['country']['CountryFlagImage'].'" alt="#"></div>
                        <div>
                            <div class="famous-names__widget-name"><a href="'.$value['externalurl'].'">'.$value['name'].'</a></div>
                            <div class="famous-names__widget-type d-inline-block">'.$value['occupations'][0]['name'].'</div>
                        </div>
                    </div>';
        endif;
    endforeach;
    $famous_per_day .= '
            </div>
            <div class="famous-names__widget-info">
                <div class="famous-names__widget-link text-center">
                    <a href="/alle-kendte/1">
                        Se alle kendte
                    </a>
                </div>
                <div class="famous-names__widget-text">
                    <div class="famous-names__widget-calendar-title">
                        Indtast fødselsdag
                    </div>
                    <div class="famous-names__widget-calendar-description">
                        Se hvem der har fødselsdag samme dag som dig eller dit barn
                    </div>
                </div>
            </div>
            <form method="post" action="'.esc_url( admin_url('admin-post.php') ).'">
                <input type="hidden" name="action" value="famous_date">
                <div class="ovulation-calc__calendar-input custom-select-block">
                    <div class="d-flex align-items-center">
                                                        <span class="ovulation-calc__calendar-icon d-flex">
                                                            <img src="'.get_template_directory_uri().'/assets/img/black-calendar.svg" alt="">
                                                        </span>
                        <span class="calendar-value">
                                                            Vælg dato
                                                        </span>
                        <input type="hidden" name="date">
                    </div>
                    <div class="custom-dropdown">
                        <div class="calendar future-available" data-use-current-date="true">
                            <div class="group calendar__header">
                                <p class="left pointer minusmonth">&laquo;</p>
                                <p class="left monthname center pointer"></p>
                                <p class="right pointer addmonth">&raquo;</p>
                            </div>
                            <ul class="group">
                                <li>Mo</li>
                                <li>Tu</li>
                                <li>We</li>
                                <li>Th</li>
                                <li>Fr</li>
                                <li>Sa</li>
                                <li>Su</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <button class="famous-names__widget-submit custom-btn mt-2">Søg kendte</button>
            </form>
        </div>
    </div>';
    $object = get_query_var('object');
    $parametrs = get_query_var('parametrs');
    switch ($object) {
        case 'navnekarrusel':
            $title = 'Navnekarrusel';
            echo $search_form;
            break;
        case 'navnedag':
            echo $month_calendar;
            break;
        case 'pigenavne':
        case 'drengenavne':
            echo $years.$search_form;
            break;
        case 'alle-kendte':
        case 'kendte':
            echo $search_famous.$famous_per_day;
            break;
        default:
            echo $search_form;
            break;
    }
    ?>

    <div class="custom-item-container blog-list years-list-widget">
        <div class="blog-list__title years-list-widget__title widget-title d-flex">
            <img src="/wp-content/themes/min-mave-theme/assets/img/heart.svg" alt="heart">
            <span>Aktivitet i debatten</span>
        </div>
        <div class="blog-list__body active-debates-widget__body tabs">
            <div class="active-debates-widget__list">
                <?php
                wp_reset_query();
                $args = array(
                    'posts_per_page' => 5,
                    'post_parent' => 34953,
                    'post_status' => 'publish',
                    'post_type' => 'topic',
                    'orderby' => 'post_date'
                );

                $posts = new WP_Query($args);
                while ( $posts->have_posts() ) {
                    $posts->the_post();
                    ?>

                    <div class="active-debates-widget__item">
                        <div class="active-debates-widget__item-title">
                            <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                        </div>
                        <div class="active-debates-widget__item-description">
                            <?php echo get_the_date('H:i'); ?> i Hvad skal baby hedde?
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a href="/debat/gravid/skal-baby-hedde" class="custom-btn outline">Gå til debatten</a>
        </div>
    </div>
    <?php
    //    if ( function_exists('dynamic_sidebar') )
    //        dynamic_sidebar('right-sidebar');
    ?>


</div>
