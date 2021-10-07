<?php
// Creating the widget
class Graviditetsmails_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'graviditetsmails_widget',

// Widget name will appear in UI
            __('Graviditetsmails Widget', 'graviditetsmails_widget_domain'),

// Widget description
            array( 'description' => __( '', 'wpb_widget_domain' ), )
        );
    }

// Creating widget front-end

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) ) {}

// This is where you run the code and display the output
        echo '


<div class="custom-item-container mail-block">
        <div class="mail-block__title widget-title d-flex">
            <img src="'.get_template_directory_uri().'/assets/img/calendar.svg" alt="Calendar">
            <span>'. $title .'</span>
        </div>
        <div class="mail-block__body">
            <div class="mail-block__head d-flex align-items-center">
                                    <span>
                                        Få Min-Maves daglige mail om din og babys udvikling under graviditeten
                                    </span>
                <!-- <span class="mail-block__question text-center">?</span> -->
            </div>
            <form method="post" class="validate" action="'.esc_url( admin_url('admin-post.php') ).'">
                   
                <input type="hidden" name="action" value="graviditetsmails_form">
                <div class="mail-block__form-label">
                    Indtast terminsdato
                </div>
                <div class="mail-block__form-selectors d-flex justify-content-between">
                    <div class="custom-select-block">
                        <span class="custom-select-block__value">Dag</span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14.546" height="8.173" viewBox="0 0 14.546 8.173">
                                <g id="nav-arrow-down" transform="translate(-4.727 -7.727)">
                                    <g transform="translate(6 9)">
                                        <path data-name="Контур 4" d="M6,9l6,6,6-6" transform="translate(-6 -9)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <div class="custom-dropdown">
                            <input type="hidden" name="day" required>
                            <div class="d-flex flex-column mail-block__days"></div>
                        </div>
                    </div>
                    <div class="custom-select-block">
                        <input type="hidden">
                        <span class="custom-select-block__value">Måned</span>
                        <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14.546" height="8.173" viewBox="0 0 14.546 8.173">
                                                    <g id="nav-arrow-down" transform="translate(-4.727 -7.727)">
                                                        <g transform="translate(6 9)">
                                                            <path data-name="Контур 4" d="M6,9l6,6,6-6" transform="translate(-6 -9)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </span>
                        <div class="custom-dropdown">
                            <input type="hidden" name="month" required>
                            <div class="d-flex flex-column mail-block__monthes"></div>
                        </div>
                    </div>
                </div>
                <div class="custom-input sidebar__form-input">
                    <label for="email-input">E-mail</label>';
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            echo'<input id="email-input" type="text" name="email" class="" value="'.$current_user->user_email.'">';
        } else {
            echo'<input id="email-input" type="text" name="email" class="">';
        }

             echo '
                </div>
                <div class="mail-block__form-checkbox custom-checkbox-block d-flex align-items-start">
                    <label for="pragnancy-mail">
                        <input type="checkbox" id="pragnancy-mail" name="agree">
                        <span class="checkmark"></span>
                        Ja tak, tilmeld mig Min-Maves nyhedsbrev med de bedste debatter, blogindlæg og gode tilbud fra vores samarbejdspartnere
                    </label>
                </div>'; ?>

                <div class="d-flex justify-content-center captcha">
                    <?php echo do_shortcode('[bws_google_captcha]'); ?>
                </div>
        <?php
        echo '
        <button class="mail-block__form-submit custom-btn">
                    Tilmeld
                </button>
            </form>
        </div>
    </div>

    ';

if (!wp_is_mobile()) {
    echo '<div class="sidebar__banner">
                <div id="cncpt-dsk_rec1"></div>
            </div>';
}



        echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Graviditetsmails', 'wpb_widget_domain' );
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

// Class wpb_widget ends here
}


// Register and load the widget
function wpb_load_graviditetsmails_widget() {
    register_widget( 'graviditetsmails_widget' );
}
add_action( 'widgets_init', 'wpb_load_graviditetsmails_widget' );
