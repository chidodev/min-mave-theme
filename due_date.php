<?php

/* Template Name: Due Date Calculator */

get_header(); ?>
<div class="main-block single">
    <div class="container">

        <div class="row align-items-start">
            <div class="d-none d-xl-block col-2"><?php get_template_part( 'banners/left', 'skyscraper' ); ?></div>
            <div class="col d-flex flex-column flex-lg-row">
                <div class="content">
                    <div class="ovulation-calc">
                        <div class="ovulation-calc__title ovulation-calc__title--due-date">
                            Terminsberegner – beregn din termin
                        </div>
                        <div class="ovulation-calc__content">
                            <p>
                                Med terminsberegneren kan du beregne din termin og finde ud af, hvor langt du er i din graviditet.
                                Din terminsdato er den dag, dit barn kan forventes at blive født – altså dit barns allerførste fødselsdag.
                            </p>
                        </div>

<!--                        Calculation Error-->
                        <div class="ovulation-calc__error d-none">
                            Vi kan ikke beregne den forventede ægløsningsdag baseret på den angivne dato. Kontroller dine indtastninger for fejl, og prøv igen.
                        </div>
                        <div class="ovulation-calc__form">
<!--                            <div class="ovulation-calc__form-title">-->
<!--                                Ægløsning lommeregner-->
<!--                            </div>-->
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
                                                    <input type="hidden" name="days_one">
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
                                            <div class="ovulation-calc__days range-slider__wrapper">
                                                <div class="ovulation-calc__input-title">
                                                    Antal dage fra ægløsning til menstruation: <span class="ovulation-calc__input-selected range-slider__amount"></span>
                                                    <input type="hidden" name="days_two">
                                                </div>
                                                <div class="calc-range d-flex justify-content-between">
                                                    <span class="ovulation-calc__days-text">1</span>
                                                    <div class="range-slider align-self-center">
                                                        <div class="ui-slider-handle"></div>
                                                    </div>
                                                    <span class="ovulation-calc__days-text">40</span>
                                                </div>
                                                <div class="ovulation-calc__info">
                                                    (Vælg 14 dage, hvis du ikke ved det)
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
                                                <div class="ovulation-calc__results-dates d-flex justify-content-between flex-wrap">
                                                    <div class="ovulation-calc__results-date-item">
                                                    <span class="ovulation-calc__results-date-info">
                                                        Din ægløsning fandt sted mellem:
                                                    </span>
                                                        <div class="ovulation-calc__input-title" id="fertilization">
                                                            21. Juni 2021
                                                        </div>
                                                    </div>
                                                    <div class="ovulation-calc__results-date-item">
                                                    <span class="ovulation-calc__results-date-info">
                                                        Fosteret er mest sårbar
                                                    </span>
                                                        <div class="ovulation-calc__input-title" id="fetus_most_vulnerable">
                                                            29. Aug 2021
                                                        </div>                                                      
                                                    </div>
                                                    <div class="ovulation-calc__results-date-item">
                                                    <span class="ovulation-calc__results-date-info">
                                                        Risikoen for spontan abort falder
                                                    </span>
                                                        <div class="ovulation-calc__input-title" id="risk">
                                                            29. Aug 2021
                                                        </div>   
                                                    </div>
                                                    <div class="ovulation-calc__results-date-item">
                                                    <span class="ovulation-calc__results-date-info">
                                                        Du er nu i uge:
                                                    </span>
                                                        <div class="ovulation-calc__input-title" id="yuo_are_now">
                                                            21. Juni 2021
                                                        </div>    
                                                    </div>
                                                    <div class="ovulation-calc__results-date-item">
                                                    <span class="ovulation-calc__results-date-info">
                                                        Du kan begynde at mærke liv
                                                    </span>
                                                        <div class="ovulation-calc__input-title" id="may_start">
                                                            29. Aug 2021
                                                        </div>
                                                    </div>
                                                    <div class="ovulation-calc__results-date-item">
                                                    <span class="ovulation-calc__results-date-info" >
                                                        Din barsel starter omkring
                                                    </span>
                                                        <div class="ovulation-calc__input-title" id="maternity_starts_around">
                                                            21. Juni 2021
                                                        </div>    
                                                    </div>
                                                    <div class="ovulation-calc__results-date-item">
                                                    <span class="ovulation-calc__results-date-info">
                                                        Din forventede terminsdag
                                                    </span>
                                                        <div class="ovulation-calc__input-title" id="expected_term">
                                                            29. Aug 2021
                                                        </div>
                                                    </div>
<!--                                                    <div class="ovulation-calc__results-date-item">-->
<!--                                                        <div class="ovulation-calc__input-title">-->
<!--                                                            21. Juni 2021-->
<!--                                                        </div>-->
<!--                                                        <span class="ovulation-calc__results-date-info">-->
<!--                                                        Din frist er-->
<!--                                                    </span>-->
<!--                                                    </div>-->
<!--                                                    <div class="ovulation-calc__results-date-item">-->
<!--                                                        <div class="ovulation-calc__input-title">-->
<!--                                                            29. Aug 2021-->
<!--                                                        </div>-->
<!--                                                        <span class="ovulation-calc__results-date-info">-->
<!--                                                        Potentiel terminsdag hvis man befrugtes i denne periode-->
<!--                                                    </span>-->
<!--                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ovulation-calc__submit">
                                        <div class="ovulation-calc__submit-btn">
                                            <button class="custom-btn" type="submit" id="calculate_duedate">Beregn</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="calc-subscription">
                                    <div class="calc-suscription__disclaimer">
                                        Skriv dig op til Min-Maves populære graviditetsmails ligesom 144.000 andre gravide. Din graviditet tilføjes automatisk skjult til din profil.
                                    </div>
                                    <form action="#">
                                        <div class="calc-suscription__form d-flex">
                                            <div class="calc-suscription__input custom-input">
                                                <label for="login-input">E-mail</label>
                                                <input type="text">
                                            </div>
                                            <button class="calc-suscription__submit custom-btn outline" type="submit">Tilmeld mig graviditetsmails</button>
                                        </div>
                                        <div class="d-flex justify-content-center captcha">
                                            <?php echo do_shortcode('[bws_google_captcha]'); ?>
                                        </div>
                                        <div class="calc-suscription__form-checkbox custom-checkbox-block d-flex align-items-start">
                                            <label for="pragnancy-mail">
                                                <input type="checkbox" id="pragnancy-mail" name="agree">
                                                <span class="checkmark"></span>
                                                Ja tak, tilmeld mig Min-Maves nyhedsbrev med de bedste debatter, blogindlæg og gode tilbud fra vores samarbejdspartnere
                                            </label>
                                        </div>
                                        <div class="calc-suscription__description">
                                            Terminsberegneren skal ses som et foreløbigt bud på, hvor langt du er i din graviditet og hvornår du har termin. Lægen eller jordemoderen vil muligvis nå frem til en anden terminsdato, ligesom en senere scanning vil fastlægge den endelige terminsdag.
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="article__description">
                            <h3>Beregn din termin</h3>
                            <p>
                                Terminsberegneren er meget præcis og derfor beder den dig om at indtaste
                            </p>
                            <ul>
                                <li>Sidste menstruationsdato</li>
                                <li>Længden på din cyklus</li>
                                <li>Antal dage fra din ægløsning til du igen får menstruation</li>
                            </ul>
                            <p>
                                Hvis du kan huske, hvordan dine sidste perioder forløb, så kan du bruge Min-Maves <a
                                        href="#link-to-ovul-calc">ægløsningsberegner</a> til at udregne dine nøjagtige tal.
                            </p>
                            <h3>
                                Sådan udregnes termin
                            </h3>
                            <p>
                                Terminsberegneren udregner din termin ud fra statistiske data på, hvor lang tid der i gennemsnittet går, fra en kvinde har sin første menstruation og til hun føder sit barn. Det er samme metode som din læge benytter, når du kommer til dit første lægebesøg efter en positiv graviditetstest.
                            </p>
                            <p>
                                De statistiske tal er så nøjagtige, at de tager højde for, at kvinders cyklus er meget forskellige. Det er derfor, du skal indtaste menstruationsdag, længden på din cyklus og antal dage fra ægløsning til menstruation i terminsberegneren.
                            </p>
                            <h3>Nakkefoldsscanningen – Personlig terminsdato</h3>
                            <p>Da alle børn er forskellige og udvikler sig forskelligt, så får du en ny og mere nøjagtig terminsdato, når du kommer til nakkefoldsscanning omkring uge 11-13.
                                Til nakkefoldsscanningen måles fosterets længde, og derudfra kan jordemoderen beregne mere præcist, hvor hurtigt dit barn vokser og dermed hvornår du har din terminsdato
                            </p>
                            <h3>Du har termin når…</h3>
                            <p>
                                5% af alle gravide føder på deres terminsdato. Det betyder altså at der er langt større chance for at du føder i dagene før eller efter din termin, end på selve dagen.
                                Man siger, at et barn er født til tiden, hvis det er født fra 3 uger inden terminsdatoen og indtil 2 uger efter terminsdatoen.
                            </p>
                            <h3>Graviditetsberegning</h3>
                            <p>
                                En kvinde er gravid i gennemsnitligt 9 måneder, der tæller fra første menstruationsdag og 40 uger frem.
                            </p>
                            <p>
                                Graviditetsberegningen begynder med 1. dag i cyklus (0+0) og slutter med 39+6.
                            </p>
                            <p>
                                • Det forreste tal fortæller hvor mange uger af din graviditet du har fuldført.
                            </p>
                            <p>
                                • Det bagerste tal fortæller hvor mange dage du har fuldført.
                            </p>
                            <p>
                                Du er altså fx 39 uger henne og i 40. uge på samme tid.
                            </p>
                            <p>
                                Man bruger menstruationen som målestok for første dag i graviditeten, da det er nemmere at holde styr på hvornår man bløder, end hvornår man bliver befrugtet.
                            </p>
                            <p>
                                Hvis din menstruation er meget uregelmæssig, vil lægen tilbyde dig en tidlig ultralydsscanning, så din terminsdato kan bestemmes.
                            </p>
                            <h3>
                                Få Min-Maves graviditetsmails
                            </h3>
                            <p>
                                Når du har brugt vores terminsberegner og har udregnet din termin, får du tilbudt at modtage vores gravid uge for uge mails med information om din graviditet.
                            </p>
                            <p>
                                Vores mails følger din graviditet med daglig information om, hvordan din baby udvikler sig inde i maven, tips til graviditeten, hyggelige ideer og gode grin. Min-Maves graviditetsmails er utrolig populære og læses dagligt af 30% af alle gravide i Danmark.
                            </p>
                            <p>
                                Når du tilmelder dig vores graviditetsmails opretter vi samtidig en gratis profil til dig, så du kan ændre terminsdato når du har været til nakkefoldsscanning.
                            </p>
                            <h3>
                                Min-Maves terminsgrupper
                            </h3>
                            <p>
                                Her kan du stille kloge og dumme spørgsmål, grine over hormoner, få et klap på skulderen og et kærligt råd med på vejen.
                            </p>
                            <p>
                                En terminsgruppe på Min-Mave består af 300 af dine nye bedste venner, og de er guld værd under graviditet og barsel.
                            </p>
                            <p>
                                Se hvad de snakker om lige nu – klik her
                            </p>
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
