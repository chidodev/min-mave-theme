<?php
// Creating the widget
class Popular_posts_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'popular_posts_widget',

// Widget name will appear in UI
            __('Populære artikler', 'bedste_debatter_domain'),

// Widget description
            array( 'description' => __( '', 'wpb_widget_domain' ), )
        );
    }
// Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( is_singular('post') ) {

            echo '
        <div class="custom-item-container best-debates">
        <div class="best-debates__title widget-title d-flex">
            <img src="'.get_template_directory_uri().'//assets/img/heart.svg" alt="">
            <span>Populære artikler</span>
        </div>
        <div class="active-debates-widget__list d-flex flex-column py-2">';

            $posts = new WP_Query(
                array(
                    'posts_per_page' => 5,
                    'meta_key' => 'post_views_count',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'ignore_sticky_posts' => 1
                )
            );
            while ($posts->have_posts()) {
                $posts->the_post();
                echo '
                    <div class="active-debates-widget__item d-flex justify-content-between align-items-center py-2">
                
                <div class="popular-articles__info mr-3">
                    <div class="popular-articles__title">
                      <a href="' . get_permalink() . '">
                        ' . get_the_title() . '
                        </a>
                    </div>
                    <div class="popular-articles__date">
                        ' . get_the_date('j F Y') . '
                    </div>
                </div>
                <a href="' . get_permalink() . '">
                    <img src="'.get_template_directory_uri().'/assets/img/arrow-right-violet.svg" alt="">
                </a>
            </div>';

            }

            echo '

        </div>
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
            $title = __( 'Populære artikler', 'wpb_widget_domain' );
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
function wpb_load_popular_posts_widget() {
    register_widget( 'popular_posts_widget' );
}
add_action( 'widgets_init', 'wpb_load_popular_posts_widget' );