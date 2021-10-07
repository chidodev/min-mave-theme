<footer class="footer">
    <div class="container">
        <div class="go-to top d-flex justify-content-center align-items-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nav-arrow-down.svg" alt="">
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="footer__logo d-flex flex-column align-items-start">
                    <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/head-logo.png" alt=""></a>
                    <span>Min-Mave.dk</span>
                </div>
                <div class="footer__menu">
                    <?php
                    $arg = array(
                        'theme_location'  => 'footer',
                        'menu'            => 'Footer Navigation',
                        'container'       => 'ul',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => '',
                    );
                    wp_nav_menu($arg);
                    ?>
                </div>
                <div class="footer__credits">
                    <span>© 2021 Min-Mave ApS</span>
                </div>
            </div>
        </div>
    </div>
</footer>


<!--<script type="application/javascript" src=https://tags.adnuntius.com/concept_cph/dGvNbMA7T.prod.js async></script>
<script type="application/javascript">
    var adsmtag = adsmtag || {};
    adsmtag.cmd = adsmtag.cmd || [];
</script>-->
<!-- Test Remove // <script defer src="<?php echo get_template_directory_uri(); ?>/assets/js/fotorama.js"></script> -->
<script defer src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.js"></script>
<script defer src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.validate.min.js"></script>
<script defer src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-ui.js"></script>
<script defer src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script defer src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js?v=11"></script>
<script defer src="<?php echo get_template_directory_uri(); ?>/assets/js/calendar.js?v=3"></script>
<!--<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="72adb5e0-b675-4d9c-9fd8-397a38ca6d2c" type="text/javascript" async>-->
<script async='async' src='https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal.min.js'></script>
 
    <?php wp_footer(); ?>
        </body>
        </html>