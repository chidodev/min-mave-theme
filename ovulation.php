<?php

/* Template Name: Ovulation Calculator */

get_header(); ?>
<div class="main-block">
    <div class="container">
        <?php get_template_part( 'banners/top', 'banner' ); ?>
        <div class="row align-items-start">
            <div class="d-none d-xl-block col-2"><?php get_template_part( 'banners/left', 'skyscraper' ); ?></div>
            <div class="col d-flex flex-column flex-lg-row">
                <div class="content">
                    <div class="ovulation-calc">
                        <h1 class="ovulation-calc__title">
                            Ægløsningsberegner - Hvornår kan du blive gravid?
                        </h1>
                        <div class="ovulation-calc__content">
                            <p>
                                Ægløsningsberegneren består af 4 trin. For det mest korrekte resultat, bør du udfylde alle oplysninger. Springer du nogle trin over, indsætter systemet automatisk din cyklus til værende 28 dage.
                            </p>
                            <ul>
                                <li>Har du en cyklus på mindre end 21 dage eller længere end 35 dage er der høj sandsynlighed for, at du ikke har ægløsning. Kontakt evt. din praktiserende læge.</li>
                                <li>Beregneren tager udgangspunkt i at sædceller kan overleve i livmoderen i flere dage. Den beregnede frugtbarhedsperiode starter derfor et par dage tidligere end andre beregnere.</li>
                                <li>Beregneren må og kan ikke anvendes som præventionsmetode.</li>
                                <li>Beregneren viser ikke, hvornår den frugtbare periode slutter, men ægget går til grunde senest 24 timer efter ægløsning.</li>
                            </ul>
                        </div>

<!--                        Calculation Error-->
                        <div class="ovulation-calc__error d-none">
                            Vi kan ikke beregne den forventede ægløsningsdag baseret på den angivne dato. Kontroller dine indtastninger for fejl, og prøv igen.
                        </div>
                        <div class="ovulation-calc__form">
                            <div class="ovulation-calc__form-title">
                                Ægløsningsberegner
                            </div>
                            <div class="ovulation-calc__form-content">
                                <form action="#">
                                    <div class="ovulation-calc__form-body d-flex align-items-center">
                                        <div class="ovulation-calc__input-data flex-column justify-content-center">
                                            <div class="ovulation-calc__calendar">
                                                <div class="ovulation-calc__input-title">
                                                    Den første dag i din sidste menstruationsperiode
                                                </div>
                                                <div class="ovulation-calc__calendar-input custom-select-block">
                                                    <div class="d-flex align-items-center">
                                                        <span class="ovulation-calc__calendar-icon d-flex">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/black-calendar.svg" alt="">
                                                        </span>
                                                        <span class="calendar-value">
                                                            Vælg dato
                                                        </span>
                                                        <input type="hidden" name="date">
                                                    </div>
                                                    <div class="custom-dropdown">
                                                        <div class="calendar">
                                                            <div class="group calendar__header">
                                                                <p class="left pointer minusyear">&laquo;</p>
                                                                <p class="left year center pointer"></p>
                                                                <p class="right pointer addyear">&raquo;</p>
                                                            </div>
                                                            <div class="group calendar__header">
                                                                <p class="left pointer minusmonth">&laquo;</p>
                                                                <p class="left monthname center pointer"></p>
                                                                <p class="right pointer addmonth">&raquo;</p>
                                                            </div>
                                                            <ul class="group">
                                                                <li>Ma</li>
                                                                <li>Ti</li>
                                                                <li>On</li>
                                                                <li>To</li>
                                                                <li>Fr</li>
                                                                <li>Lø</li>
                                                                <li>Sø</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ovulation-calc__days range-slider__wrapper">
                                                <div class="ovulation-calc__input-title">
                                                    Antal dage i cyklus: <span class="ovulation-calc__input-selected range-slider__amount"></span>
                                                    <input type="hidden" name="days">
                                                </div>
                                                <div class="calc-range d-flex justify-content-between">
                                                    <span class="ovulation-calc__days-text">1</span>
                                                    <div class="range-slider align-self-center">
                                                        <div class="ui-slider-handle"></div>
                                                    </div>
                                                    <span class="ovulation-calc__days-text">40</span>
                                                </div>
                                                <div class="ovulation-calc__info">
                                                    (Vælg 28 dage, hvis du ikke ved det)
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ovulation-calc__data">
                                            <!--                                Default View-->

                                            <div class="ovulation-calc__placeholder text-center">
                                                <div class="ovulation-calc__results-back">Vend tilbage</div>
                                                <span>
                                                    indtast dato og antal dage,
                                                    der skal beregnes
                                                </span>
                                            </div>

                                            <!--                                Results-->

                                            <div class="ovulation-calc__results align-self-start d-none">
                                                <div class="ovulation-calc__results-back">Vend tilbage</div>
                                                <div class="ovulation-calc__results-title">
                                                    Resultater
                                                </div>
                                                <div class="ovulation-calc__results-dates d-flex justify-content-between flex-column flex-sm-row">
                                                    <div class="ovulation-calc__results-date-item">
                                                    <span class="ovulation-calc__results-date-info">
                                                        Din sidste dag i din cyklus
                                                </span>
                                                        <div class="ovulation-calc__input-title" id="best_date">
                                                            21. Juni 2021
                                                        </div>  
                                                    </div>
                                                    <div class="ovulation-calc__results-date-item">
                                                    <span class="ovulation-calc__results-date-info">
                                                    Potentiel terminsdag hvis man befrugtes i denne periode
                                                </span>
                                                        <div class="ovulation-calc__input-title" id="end_date">
                                                            29. Aug 2021
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="ovulation-calc__results-date-period" >
                                                <span class="ovulation-calc__results-date-info">
                                                Din mest frugtbare periode er mellem
                                            </span>
                                                    <div class="ovulation-calc__input-title" id="interval">
                                                        fra 02. Dec 2021 - til 05. Dec 2021
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ovulation-calc__submit">
                                        <div class="ovulation-calc__submit-btn">
                                            <button class="custom-btn" type="submit" id="calculate_ovulation">Beregn</button>
                                        </div>
                                    </div>
                                </form>
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
