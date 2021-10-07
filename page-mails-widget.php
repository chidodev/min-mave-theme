<?php
/* Template Name: mails widget page */
get_header(); ?>
<div class="main-block">
    <div class="container">
        <?php get_template_part( 'banners/top', 'banner' ); ?>
        <div class="row align-items-start">
            <div class="d-none d-xl-block col-2"><?php get_template_part( 'banners/left', 'skyscraper' ); ?></div>
            <div class="col d-flex flex-column flex-lg-row">
                <div class="content">

                    <div class="mails">
                        <div class="mails__double-blocs">
                            <div class="custom-item-container mail-block pregnant-mails">
                                <div class="mail-block__title widget-title d-flex">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/calendar.svg"
                                         alt="Calendar">
                                    <span>Graviditetsmails</span>
                                </div>
                                <div class="mail-block__body">
                                    <div class="mail-block__head d-flex align-items-center">
                                    <span>
                                        Få Min-Maves daglige mail om din og babys udvikling under graviditeten
                                    </span>
                                    </div>
                                    <form method="post" class="validate" action="<?php echo esc_url( admin_url('admin-post.php') );?>"
                                          id="clickfolgmingraviditetwidgetform" class="mail-block__form validate">
                                        <input type="hidden" name="action" value="graviditetsmails_form">

                                        <div class="mail-block__form-label">
                                            Indtast terminsdato
                                        </div>
                                        <div class="mail-block__form-selectors d-flex justify-content-between">
                                            <div class="custom-select-block mails-select-block">
                                                <input type="hidden" name="day" required>
                                                <span class="custom-select-block__value">Dag</span>
                                                <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14.546" height="8.173"
                                                     viewBox="0 0 14.546 8.173">
                                                    <g id="nav-arrow-down" transform="translate(-4.727 -7.727)">
                                                        <g transform="translate(6 9)">
                                                            <path data-name="Контур 4" d="M6,9l6,6,6-6" transform="translate(-6 -9)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </span>
                        <div class="custom-dropdown" style="display: none;">
                          <input type="hidden" name="day">
                          <div class="d-flex flex-column mail-block__days"></div>
                        </div>
                      </div>
                      <div class="custom-select-block mails-select-block">
                        <input type="hidden">
                        <span class="custom-select-block__value">Måned</span>
                        <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14.546" height="8.173" viewBox="0 0 14.546 8.173">
                                                    <g id="nav-arrow-down" transform="translate(-4.727 -7.727)">
                                                        <g transform="translate(6 9)">
                                                            <path data-name="Контур 4" d="M6,9l6,6,6-6" transform="translate(-6 -9)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </span>
                        <div class="custom-dropdown">
                          <input type="hidden" name="month">
                          <div class="d-flex flex-column mail-block__monthes"></div>
                        </div>
                      </div>

                    </div>
                    <div class="custom-input sidebar__form-input mails__form-input">
                      <label for="email-input-gravitis" class="">E-mail</label>
                      <input id="email-input-gravitis" name="email" type="text" class="">
                    </div>
                    <div class="mail-block__form-checkbox custom-checkbox-block d-flex align-items-start">
                      <label for="baby-mail">
                        <input type="checkbox" id="baby-mail" name="agree">
                        <span class="checkmark"></span>
                        Ja tak, tilmeld mig Min-Maves nyhedsbrev med de bedste debatter, blogindlæg og gode tilbud fra vores samarbejdspartnere
                      </label>
                    </div>
                    <div class="d-flex justify-content-center captcha">
                        <?php echo do_shortcode('[bws_google_captcha]'); ?>
                    </div>
                    <button class="mail-block__form-submit custom-btn">
                      Tilmeld
                    </button>
                  </form>
                </div>
              </div>
              <div class="custom-item-container mail-block baby-mails mt-3">
                <div class="mail-block__title widget-title d-flex">
                  <img src="<?php echo get_template_directory_uri();?>/assets/img/baby-white.svg" alt="Calendar">
                  <span>Baby mails</span>
                </div>
                <div class="mail-block__body">
                  <div class="mail-block__head d-flex align-items-center">
                                    <span>
                                        Få Min-Maves daglige mail om din og babys udvikling under graviditeten
                                    </span>
                  </div>
                    <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') );?>" class="mail-block__form validate">
                        <input type="hidden" name="action" value="babymails_form">

                        <div class="mail-block__form-label">
                      Indtast terminsdato
                    </div>
                    <div class="calendar-input ovulation-calc__calendar-input calendar-input custom-select-block">
                      <div class="d-flex align-items-center">
                                                        <span class="ovulation-calc__calendar-icon d-flex">
                                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/black-calendar.svg" alt="Calendar">
                                                        </span>
                        <span class="calendar-value">
                                                            Vælg dato
                                                        </span>
                        <input type="hidden" name="date">
                      </div>
                      <div class="custom-dropdown" style="display: none;">
                      <div class="calendar future-available">
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
                    <div class="custom-input sidebar__form-input mails__form-input">
                      <label for="email-input-baby" class="">E-mail</label>
                      <input id="email-input-baby" type="text" name="email" class="">
                    </div>
                    <div class="mail-block__form-checkbox custom-checkbox-block d-flex align-items-start">
                      <label for="pragnancy-mail">
                        <input type="checkbox" id="pragnancy-mail" name="agree">
                        <span class="checkmark"></span>
                        Ja tak, tilmeld mig Min-Maves nyhedsbrev med de bedste debatter, blogindlæg og gode tilbud fra vores samarbejdspartnere
                      </label>
                    </div>
                    <div class="d-flex justify-content-center captcha">
                        <?php echo do_shortcode('[bws_google_captcha]'); ?>
                    </div>
                    <button class="mail-block__form-submit custom-btn">
                      Tilmeld
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="custom-item-container news-subscription mails__news-subscription">
              <div class="news-subscription__title widget-title d-flex">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/mail.svg" alt="mail">
                <span>Tilmeld dig nyhedsbrevet</span>
              </div>
              <div class="news-subscription__body">
                <p class="news-subscription__description">
                  Ja tak, tilmeld mig Min-Mave.dks ugentlige Nyhedsbrev.
                </p>
                <p class="news-subscription__details">
                  Jeg tilmelder mig også Blognyhedsbrevet samt Særnyhedsbrev, der begge udsendes i ny og næ. Nyhedsbrevet omhandler bl.a. graviditet, familieliv, relevante og nye artikler, samfundsdebatter og konkurrencer.
                </p>
              <p class="news-subscription__details">
                  Vi behandler dine personlige oplysninger som beskrevet i vores persondatapolitik, som kan læses <a href="/artikel/presse-kontakt/privatliv-og-cookies/cookiepolitik-og-privatlivspolitik.html">her</a>.
              </p>

              <form action="https://min-mave.us2.list-manage.com/subscribe/post?u=5e7bad7daff844dd11b855851&amp;id=82adc155da" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="d-sm-flex flex-sm-wrap justify-content-sm-center align-items-center news-subscription__form validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                      <input type="hidden" name="action" value="subscribe" />
                      <input type="hidden" name="lists" value="25" />

                      <div class="custom-input sidebar__form-input mc-field-group">
                          <label for="mce-FNAME">Fornavn</label>
                          <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                      </div>

                      <div class="mails__subsription-input custom-input sidebar__form-input">

                          <div class="custom-input sidebar__form-input mc-field-group">
                              <label for="mce-EMAIL">E-mail</label>
                              <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                          </div>

                          <button class="custom-btn news-subscription__submit clear" type="submit" name="subscribe" id="mc-embedded-subscribe">
                              Tilmeld
                          </button>
                      </div>
                      <!-- <div class="d-flex justify-content-center captcha">
                          <?php echo do_shortcode('[bws_google_captcha]'); ?>
                      </div> -->
                    </div>
                </form>
              </div>
            </div>
          </div>
          <script type='text/javascript'>
        (function($) {
            window.fnames = new Array();
            window.ftypes = new Array();
            fnames[1]='FNAME';
            ftypes[1]='text';
            fnames[0]='EMAIL';
            ftypes[0]='email';
        }(jQuery));
                
            </script>
                
        <!--End mc_embed_signup-->
        </div>
          <?php get_sidebar('mails') ?>
      </div>

      <div class="d-none d-xl-block col-2 text-right"><?php get_template_part( 'banners/right', 'skyscraper' ); ?></div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
