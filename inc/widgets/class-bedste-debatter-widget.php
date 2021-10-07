<?php
// Creating the widget
class Bedste_debatter_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'bedste_debatter_widget',

// Widget name will appear in UI
            __('Bedste debatter Widget', 'bedste_debatter_domain'),

// Widget description
            array( 'description' => __( '', 'wpb_widget_domain' ), )
        );
    }

// Creating widget front-end
// Creating widget front-end

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
wp_reset_query();
            $args = array(
                'numberposts' => 5,
                'post_status' => 'publish',
                'post_type' => 'topic',
					'meta_query'     => array( array(
						'key'  => '_bbp_last_active_time',
						'type' => 'DATETIME'
					) ),

					// Ordering
					'orderby' => 'meta_value',
					'order'   => 'DESC',

					// Performance
					'ignore_sticky_posts'    => true,
					'no_found_rows'          => true,
					'update_post_term_cache' => false,
					'update_post_meta_cache' => false
            );

        $posts = new WP_Query($args);

// This is where you run the code and display the output
        $output = '<div class="custom-item-container best-debates">
        <div class="best-debates__title widget-title d-flex">
            <img src="'.get_template_directory_uri().'/assets/img/heart.svg" alt="">
            <span>'. $title .'</span>
        </div>
        <div class="best-debates__body d-flex flex-column">';
        while ( $posts->have_posts() ) {
            $posts->the_post();
            $bbp_voice_count = get_post_meta(get_the_ID(), 'bbp_voting_score');
            $output .= '
            <div class="best-debates__item d-flex align-items-center">
                <div class="best-debates__rate d-flex">
                    <img src="' . get_template_directory_uri() . '/assets/img/heart-full.svg" alt="">
                    <span class="">' . $bbp_voice_count[0] . '</span>
                </div>
                
                <div class="best-debates__description">
                <a href="' . get_permalink(get_the_ID()) . '">
                    ' . get_the_title() . '
                </a>
                </div>
                
            </div>';
//        endforeach;
        }
        $output .= '
            <a href="/debat" class="custom-btn outline best-debates__more align-self-center">Se flere debatter</a>
        </div>
    </div>';
        echo $output;

wp_reset_postdata();

        //echo $args['after_widget'];

    }

// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Populære drengenavne', 'wpb_widget_domain' );
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
//    public function get_all_posts()
//    {
//        $args = array(
//            'numberposts' => 3,
//            'post_status' => 'publish',
//            'post_type' => 'topic',
//            'orderby' => 'meta_value_num',
//            'meta_key'  => '_bbp_voice_count',
//        );
//
//        $posts = get_posts($args);
//        return $posts;
//    }
// Class wpb_widget ends here

}


// Register and load the widget
function wpb_load_bedste_debatter_widget() {
    register_widget( 'bedste_debatter_widget' );
}
add_action( 'widgets_init', 'wpb_load_bedste_debatter_widget' );