<?php
// Creating the widget
class Popular_name_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'popular_name_widget',

// Widget name will appear in UI
            __('Populære drengenavne', 'bedste_debatter_domain'),

// Widget description
            array( 'description' => __( '', 'wpb_widget_domain' ), )
        );
    }
// Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
        echo $args['before_widget'];

        $male = get_option('best_male', 0);
        $male_time = get_option('best_male_time', 0);
        if (($male_time < (time() + 60 * 24*30))&&($male)) {
            $male = json_decode($male, true);
        } else {

            $link_male = get_field('navne_api_url','option').'/api/name/popular?gender=drengenavne&perPage=3&page=1';
            $json = file_get_contents($link_male);
            $male = json_decode($json, true);
            update_option('best_male', json_encode($male));
            update_option('best_male_time', time());
        }

        if (wp_is_mobile()) {
            echo '<div class="sidebar__banner">
                    <div id="cncpt-mob3"></div>
                </div>';
        }

// This is where you run the code and display the output
            echo '<div class="custom-item-container best-names">
        <div class="best-names__title widget-title boys">
            <img src="'.get_template_directory_uri().'/assets/img/male-icon.svg" alt="">
            <span>Populære drengenavne</span>
        </div>
        <div class="best-names__body">';
        foreach($male as $key => $value) :
            if (!isset($value['totalNumberOfItems'])) :

            echo '
            <div class="best-names__item">
                <span>'.($key+1).'</span>';
                if ($value['arrow'] == 'Up')
                    echo '<img src="'.get_template_directory_uri().'/assets/img/increase.svg" alt="">';
                elseif ($value['arrow'] == 'Down')
                    echo '<img src="'.get_template_directory_uri().'/assets/img/decrease.svg" alt="">';
                else
                    echo '<img src="'.get_template_directory_uri().'/assets/img/equal.svg" alt="">';
                echo '
                <div class="best-names__name">
                    <a href="/navne/'.$value['slug'].'">'.$value['name'].'</a>
                </div>
                <div class="best-names__rate">';
                    $raiting = ($value['ratings']['RatingAverage'] != null)?$value['ratings']['RatingAverage']:0;
                        $star = 1;
                        while ($star<= 5) :
                            if ($star <= $raiting) : ?>
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                            <?php
                            endif;
                            $star++ ;
                        endwhile;
            echo '
                </div>
            </div>';
            endif;
            endforeach;
        $female = get_option('best_female', 0);
        $female_time = get_option('best_female_time', 0);
        if (($female_time < (time() + 60 * 24*30))&&($female)) {
            $female = json_decode($female, true);
        } else {

            $link_female = get_field('navne_api_url','option').'/api/name/popular?gender=pigenavne&perPage=3&page=1';
            $json = file_get_contents($link_female);
            $female = json_decode($json, true);
            update_option('best_female', json_encode($female));
            update_option('best_female_time', time());
        }
            echo '
            
        </div>
    </div>
    <div class="custom-item-container best-names">
        <div class="best-names__title widget-title girls">
            <img src="'.get_template_directory_uri().'/assets/img/female.svg" alt="">
            <span>Populære pigenavne</span>
        </div>
        <div class="best-names__body">';
        foreach($female as $key => $value) :
            if (!isset($value['totalNumberOfItems'])) :

            echo '
            <div class="best-names__item">
                <span>'.($key+1).'</span>';
                if ($value['arrow'] == 'Up')
                    echo '<img src="'.get_template_directory_uri().'/assets/img/increase.svg" alt="">';
                elseif ($value['arrow'] == 'Down')
                    echo '<img src="'.get_template_directory_uri().'/assets/img/decrease.svg" alt="">';
                else
                    echo '<img src="'.get_template_directory_uri().'/assets/img/equal.svg" alt="">';
                echo '                
                <div class="best-names__name">
                    <a href="/navne/'.$value['slug'].'">'.$value['name'].'</a>
                </div>
                <div class="best-names__rate">';
                    $raiting = ($value['ratings']['RatingAverage'] != null)?$value['ratings']['RatingAverage']:0;
                        $star = 1;
                        while ($star<= 5) :
                            if ($star <= $raiting) : ?>
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/star-full.svg" alt="">
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/star-outline.svg" alt="">
                            <?php
                            endif;
                            $star++ ;
                        endwhile;
            echo '
                </div>
            </div>';
            endif;
            endforeach;

            echo '
        </div>
    </div>';
        echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Nyeste blogindlæg', 'wpb_widget_domain' );
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
function wpb_load_popular_name_widget() {
    register_widget( 'popular_name_widget' );
}
add_action( 'widgets_init', 'wpb_load_popular_name_widget' );