<?php
// Creating the widget
class Nyeste_blogindlg_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'nyeste_blogindlg_widget',

// Widget name will appear in UI
            __('Nyeste blogindlæg Widget', 'nyeste_blogindlg_widget_domain'),

// Widget description
            array( 'description' => __( '', 'wpb_widget_domain' ), )
        );
    }


    public function widget( $args, $instance ) {

        $before_widget = $args['before_widget'];
        $before_title = $args['before_title'];
        $title = apply_filters('widget_title', $instance['title']);
        $after_title = $args['after_title'];
        $after_widget = $args['after_widget'];

        /* get all blogs with category Livsstilsblogs*/
        $blogs = get_sites(array('site__not_in' => array('1', '240'), 'deleted' => 0));
        $blogids = array();
        foreach ($blogs as $blog) {
            $blogids[] = $blog->blog_id;
        }
        if (wp_is_mobile()) {
            echo '<div class="sidebar__banner">
                    <div id="cncpt-mob2"></div>
                </div>';
        }

//// This is where you run the code and display the output
        $output = '<div class="custom-item-container blog-list">
        <div class="blog-list__title widget-title d-flex">
            <img src="'.get_template_directory_uri().'/assets/img/calendar.svg" alt="Calendar">
            <span>'. $title .'</span>
        </div>
        <div class="blog-list__body d-flex flex-column align-items-center">';
//            foreach ($blogs as $blog) {
//            $site_category = get_blog_option($blog, 'site_category');



//        if (count($livsstils_sites) > 0) {
        $recent_posts = $this->get_all_posts($blogids);

        foreach ($recent_posts as $index => $post) :

            $output .= '
        <div class="blog-list__item d-flex flex-column flex-md-row">
                        <div class="blog-list__item-thumbnail">
                            <img src="' . $post->image_url[0]  . '" srcset="'. $post->srcset .'"  alt="">
                        </div>
                        <div class="blog-list__item-info">
                            <span class="blog-list__item-title"><a href="'.$post->network_url.'">'  . $post->post_title . '</a></span>
                            <span class="blog-list__item-description">
        '.$post->blogname.'
                                                </span>
                            <span class="blog-list__item-date">
        '.substr($post->post_date, 0,10).'
                                                </span>
                        </div>
                    </div>';

        endforeach;
//            }
        $site_url = get_site_url(1);
        $output .= '<a href="'.$site_url.'" class="custom-btn outline blog-list__more">Se flere blogs</a>
        </div>
    ';
        echo $args['before_widget'];
        echo $output;
        echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Bedste debatter', 'wpb_widget_domain' );
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

    public function get_all_posts($blog_ids)
    {
        $limit = 3;
//        $cached = get_option('cached_widgets');

        if (($recent_posts = get_site_transient('minmave_network_livstilsblog3')) === false) {
            foreach ($blog_ids as $blog_id) {
//                wp_cache_flush();
                switch_to_blog($blog_id);

                $args = array(
                    'numberposts' => 1,
                    'post_status' => 'publish',
                    'post_type' => 'post'
                );

                $posts = get_posts($args);

                foreach ($posts as $post) {
                    $post->network_url = get_blog_option($blog_id, 'siteurl') . '/';
                    $post->permalink = get_permalink($post->ID);
                    $post->thumbnail_id = get_post_thumbnail_id($post->ID);
                    $post->srcset = wp_get_attachment_image_srcset( $post->thumbnail_id, 'full');
                    //$post->post_excerpt = get_the_excerpt($post->ID);
                    $post->image_url = wp_get_attachment_image_src($post->thumbnail_id,'medium');
                    $post->author_name = get_the_author_meta('display_name', $post->post_author);
                    $post->blogname = get_blog_option($blog_id, 'blogname');
                    $post->avatar = get_avatar($blog_id);
                    $all_posts[$post->post_date] = $post;
                }


                restore_current_blog();
            }

            krsort($all_posts);

            $recent_posts = array_slice($all_posts, 0, $limit, true);
            wp_reset_postdata();
        }

        set_site_transient( 'minmave_network_livstilsblog3', $recent_posts, 0 );

        return $recent_posts;
    }

// Class wpb_widget ends here
}



// Register and load the widget
function wpb_load_widget_nyeste_blogindlg() {
    register_widget( 'nyeste_blogindlg_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget_nyeste_blogindlg' );