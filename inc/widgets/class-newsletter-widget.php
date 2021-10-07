<?php
// Creating the widget
class Newsletter_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'newsletter_widget',

// Widget name will appear in UI
            __('Tilmeld dig nyhedsbrevet', 'bedste_debatter_domain'),

// Widget description
            array( 'description' => __( '', 'wpb_widget_domain' ), )
        );
    }
// Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
//        if ( ! empty( $title ) )
//
// This is where you run the code and display the output
    //     echo '<div class="custom-item-container news-subscription">
    //     <div class="news-subscription__title widget-title d-flex">
    //         <img src="'.get_template_directory_uri().'/assets/img/mail.svg" alt="">
    //         <span>'. $title .'</span>
    //     </div>
    //     <div class="news-subscription__body">
    //         <p class="news-subscription__description">
    //             Ja tak, tilmeld mig Min-Mave.dks ugentlige Nyhedsbrev.
    //         </p>
    //         <p class="news-subscription__details">
    //             Jeg tilmelder mig også Blognyhedsbrevet samt Særnyhedsbrev, der begge udsendes i ny og næ. Nyhedsbrevet omhandler bl.a. graviditet, familieliv, relevante og nye artikler, samfundsdebatter og konkurrencer.
    //             Vi behandler dine personlige oplysninger som beskrevet i vores persondatapolitik, som kan læses <a href="/artikel/presse-kontakt/privatliv-og-cookies/cookiepolitik-og-privatlivspolitik.html">her</a>.
    //         </p>
    //         <form action="https://min-mave-aps1.clients.ubivox.com/handlers/post/" class="news-subscription__form validate"  method="post">
    //             <input type="hidden" name="action" value="subscribe" />
    //             <input type="hidden" name="lists" value="25" />
    //             <div class="custom-input sidebar__form-input">
    //                 <label for="data_Fornavn_id">Fornavn</label>
    //                 <input name="data_Fornavn" type="text" id="data_Fornavn_id">
    //             </div>
    //             <div class="custom-input sidebar__form-input">
    //                 <label for="email_address_id">E-mail</label>
    //                 <input name="email_address" type="text" id="email_address_id">
    //             </div>
    //             ';
    //     echo do_shortcode('[bws_google_captcha]');


    //     echo '
    //     <button class="custom-btn news-subscription__submit" type="submit">
    //                 Tilmelde
    //             </button>
    //         </form>
    //     </div>
    // </div>
    // '; ?>

        <!-- Begin Mailchimp Signup Form -->
        <!-- <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
            /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
               We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style> -->
        <div id="mc_embed_signup" class="custom-item-container news-subscription">
            <div class="news-subscription__title widget-title d-flex">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/mail.svg" alt="">
                <span><?php echo $title ?></span>
            </div>
            <div class="news-subscription__body">
                <p class="news-subscription__description">
                    Ja tak, tilmeld mig Min-Mave.dks ugentlige Nyhedsbrev.
                </p>
                <p class="news-subscription__details">
                    Jeg tilmelder mig også Blognyhedsbrevet samt Særnyhedsbrev, der begge udsendes i ny og næ. Nyhedsbrevet omhandler bl.a. graviditet, familieliv, relevante og nye artikler, samfundsdebatter og konkurrencer.
                    Vi behandler dine personlige oplysninger som beskrevet i vores persondatapolitik, som kan læses <a href="/artikel/presse-kontakt/privatliv-og-cookies/cookiepolitik-og-privatlivspolitik.html">her</a>.
                </p>
                <form action="https://min-mave.us2.list-manage.com/subscribe/post?u=5e7bad7daff844dd11b855851&amp;id=82adc155da" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="news-subscription__form validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                        <!-- <h2>Subscribe</h2> -->
                        <!-- <div class="indicates-required"><span class="asterisk">*</span> indicates required</div> -->
                        <div class="custom-input sidebar__form-input mc-field-group">
                            <label for="mce-FNAME">Fornavn </label>
                            <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                        </div>
                        <div class="custom-input sidebar__form-input mc-field-group">
                            <label for="mce-EMAIL">Email Address
                            </label>
                            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                        </div>
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <!-- <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div> -->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5e7bad7daff844dd11b855851_82adc155da" tabindex="-1" value=""></div>
                        <button class="custom-btn news-subscription__submit clear" type="submit" name="subscribe" id="mc-embedded-subscribe">
                            Tilmeld
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script> -->
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

        <?php

        echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Tilmeld dig nyhedsbrevet', 'wpb_widget_domain' );
        }
// Widget admin form
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }



}


// Register and load the widget
function wpb_load_newsletter_widget() {
    register_widget( 'newsletter_widget' );
}
add_action( 'widgets_init', 'wpb_load_newsletter_widget' );