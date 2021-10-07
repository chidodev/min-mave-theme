<?php
require_once get_template_directory() . '/inc/custom_login_page.php';


add_theme_support('menus');
add_theme_support('post-thumbnails');

add_action('after_setup_theme', 'theme_register_nav_menu');
function theme_register_nav_menu()
{
    //    register_nav_menu( 'main', 'Main Menu' );
}

add_action('wp_enqueue_scripts', 'my_scripts_method');
function my_scripts_method()
{
    wp_enqueue_script('jquery-migrate-1', "https://code.jquery.com/jquery-migrate-1.4.0.min.js", array(), '1.4.0', true);
    wp_deregister_script('remodal');
    wp_register_script('remodal', get_template_directory_uri() . '/assets/js/remodal.min.js', array('jquery'));
    wp_enqueue_script('remodal');

    wp_deregister_script(
        'wp-color-picker'
    );

    //    wp_deregister_script( 'jquery' );
    //    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js');
    //    wp_enqueue_script('jquery');
}

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
    require_once get_template_directory() . '/inc/class-true-nav-menu.php';
    require_once get_template_directory() . '/inc/class-mobile-nav-menu.php';
    require_once get_template_directory() . '/inc/class-walker-forum-reply.php';
}
add_action('after_setup_theme', 'register_navwalker');

function register_widgets()
{
    require_once get_template_directory() . '/inc/widgets/class-graviditetsmails-widget.php';
    require_once get_template_directory() . '/inc/widgets/class-nyeste-blogindlg-widget.php';
    require_once get_template_directory() . '/inc/widgets/class-bedste-debatter-widget.php';
    require_once get_template_directory() . '/inc/widgets/class-popular-name-widget.php';
    require_once get_template_directory() . '/inc/widgets/class-newsletter-widget.php';
    require_once get_template_directory() . '/inc/widgets/class-popular-posts-widget.php';
}
add_action('after_setup_theme', 'register_widgets');

function register_breabcrumbs()
{
    require_once get_template_directory() . '/inc/breabcrumbs.php';
    require_once get_template_directory() . '/inc/class-wp-query-multisite.php';
}
add_action('after_setup_theme', 'register_breabcrumbs');

function register_my_menus()
{
    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'BTCRS'),
        'footer' => __('Footer Navigation', 'BTCRS'),
        'dynamic' => __('Dynamic Navigation', 'BTCRS'),
    ));
}
add_action('init', 'register_my_menus');


function hwl_home_pagesize($query)
{
    if (is_category('min-mave-tv')) {
        $query->query_vars['posts_per_page'] = 12;
        return;
    }
}
add_action('pre_get_posts', 'hwl_home_pagesize', 1);

function register_my_widgets()
{
    register_sidebar(array(
        'name' => 'Right sidebar',
        'id' => 'right-sidebar',
        'description' => 'These widgets will be shown in the right column of the site',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
    register_sidebar(array(
        'name' => 'Right sidebar mails form',
        'id' => 'right-sidebar-mails-form',
        'description' => 'These widgets will be shown in the right column of the site',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
}
add_action('widgets_init', 'register_my_widgets');

function login_redirect($redirect_to, $request, $user)
{
    return home_url('/');
}
add_filter('login_redirect', 'login_redirect', 10, 3);

add_filter('show_admin_bar', '__return_false');

if (!is_admin()) wp_deregister_script('jquery');

function wp_get_menu_array($current_menu = 'Main Menu')
{

    $menu_array = wp_get_nav_menu_items($current_menu);

    $menu = array();

    function populate_children($menu_array, $menu_item)
    {
        $children = array();
        if (!empty($menu_array)) {
            foreach ($menu_array as $k => $m) {
                if ($m->menu_item_parent == $menu_item->ID) {
                    $children[$m->ID] = array();
                    $children[$m->ID]['ID'] = $m->ID;
                    $children[$m->ID]['title'] = $m->title;
                    $children[$m->ID]['url'] = $m->url;
                    unset($menu_array[$k]);
                    $children[$m->ID]['children'] = populate_children($menu_array, $m);
                }
            }
        };
        return $children;
    }

    foreach ($menu_array as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID'] = $m->ID;
            $menu[$m->ID]['title'] = $m->title;
            $menu[$m->ID]['url'] = $m->url;
            $menu[$m->ID]['children'] = populate_children($menu_array, $m);
        }
    }

    return $menu;
}

function create_menu_from_array($menu)
{
    $output = '<ul class="navigation__menu d-flex flex-column">';
    foreach ($menu as $item) {
        $output .= '<li class="navigation__item-mobile">
                    <a href="' . $item['url'] . '" class="navigation__link">
                        ' . $item['title'] . '
                    </a>';
        if ($item['children']) {
            $output .= '<span class="navigation__submenu-mobile">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.414" height="22.828" viewBox="0 0 12.414 22.828">
                                        <g id="nav-arrow-down" transform="translate(1.414 21.414) rotate(-90)">
                                            <g id="">
                                                <path  d="M0,0,10,10,20,0" fill="none" stroke="#634282" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                    <div class="navigation__submenu">
                        <div class="header__mobile-menu-close d-lg-none">
                            <img src="' . get_template_directory_uri() . '/assets/img/close-burger-icon.svg" alt="Close">
                        </div>
                        <div class="navigation__submenu__close d-lg-none">
                            Back
                        </div>
                        <ul>';
            $output .= '<li>
                                    <div class="navigation__submenu-links d-flex flex-column">';
            foreach ($item['children'] as $subitem) {
                if ($subitem['title'] != '[Row]') {
                    $output .= '<a href="' . $subitem['url'] . '">
                                        ' . $subitem['title'] . '
                                    </a>';
                }
                foreach ($subitem['children'] as $subsubitem) {
                    if ($subsubitem['title'] == '[Column]') {


                        foreach ($subsubitem['children'] as $subsubsubitem) {
                            if ($subsubsubitem['title'] == '[Custom]') {
                                $item_custom =  get_post_meta($subsubsubitem['ID'], '_ubermenu_settings');

                                $output .= '<p class="navigation__submenu-title d-inline-block">' . wp_strip_all_tags($item_custom[0]['custom_content']) . '</p>';
                            } else {
                                $output .= '<a href="' . $subsubsubitem['url'] . '">
                                                ' . $subsubsubitem['title'] . '
                                            </a>';
                            }
                        }
                    } else {
                        if ($subsubitem['title'] == '[Custom]') {
                            $output .= '<p class="navigation__submenu-title d-inline-block">' . $subsubitem['title'] . '</p>';
                        } else {
                            $output .= '<a href="' . $subsubitem['url'] . '">
                                                ' . $subsubitem['title'] . '
                                            </a>';
                        }
                    }
                }
                $output .= '</div>';

                $output .= '</li>';
            }
            $output .= '</ul>';
        }
        $output .= '</li>';
    }
    $output .= '</ul>';

    $output .= '</li>';

    $output .= '</ul>';

    return $output;
}
function bbp_edit_profile_link()
{

    $current_user = wp_get_current_user();
    $user = $current_user->user_login;
    return '/users/' . $user . '/edit';
}

function bbp_profile_link()
{

    $current_user = wp_get_current_user();
    $user = $current_user->user_login;
    return '/users/' . $user . '';
}
if (function_exists('acf_add_options_page')) {

    acf_add_options_page();
}

function change_admin_links($r)
{
    if (empty($r['links']) && (current_user_can('editor') || current_user_can('administrator'))) {
        $r['links'] = apply_filters('rw_reply_admin_links', array(
            'edit'  => bbp_get_reply_edit_link($r),
            'move'  => bbp_get_reply_move_link($r),
            'split' => bbp_get_topic_split_link($r),
            'trash' => bbp_get_reply_trash_link($r),
            'spam'  => bbp_get_reply_spam_link($r),
            //            'reply' => bbp_get_reply_to_link   ( $r )
        ), $r['id']);
    } else {
        $r['links'] = apply_filters('rw_reply_admin_links', array(
            'reply' => bbp_get_reply_to_link($r)
        ), $r['id']);
    }
    return $r['links'];
}
add_filter('bbp_reply_admin_links', 'change_admin_links');


function bbp_get_user_favorites_custom($args = array())
{
    $r = array(
        "meta_query" => array(
            "key" => "_bbp_favorite",
            "value" => 1,
            "compare" => "NUMERIC"
        )
    );
    $query = bbp_has_topics($r);

    // Filter & return
    return apply_filters('bbp_get_user_favorites', $query, 0, $r, $args);
}

function check_user_role($role, $user_id = null)
{
    if (isset($_REQUEST['user_id']))
        $user_id = $_REQUEST['user_id'];
    // Checks if the value is a number
    if (is_numeric($user_id))
        $user = get_userdata($user_id);
    else
        $user = wp_get_current_user();
    if (empty($user))
        return false;
    return in_array($role, (array) $user->roles);
}

// Add email template
add_filter('mailtpl/customizer_template', function () {
    return get_stylesheet_directory() . "/email_templates/default.php";
});


add_filter('wp_new_user_notification_email', 'custom_wp_new_user_notification_email', 10, 3);

function custom_wp_new_user_notification_email($wp_new_user_notification_email, $user, $blogname)
{
    $key = get_password_reset_key($user);
    $message = '		<tr>
			<td class="mail__title" style="color: #634282; font-size: 16px; font-weight: 600;">
				<p style="margin: 0; margin-top: 30px;">Tak, fordi du kom med i Min-Mave-samfunde</p>
			</td>
		</tr>
		<tr>
			<td class="mail__description" style="color: #634282; font-size: 12px;">
				<p style="margin: 0; margin-top: 15px;">Klik på knappen nedenfor for at aktivere din konto</p>
			</td>
		</tr>
		<tr>
			<td>
				<a href="' . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user->user_login), 'login') . '" class="mail__button" style="background-color: #E861A0; border-radius: 25px; color: #ffffff; display: block; font-size: 12px; font-weight: 600; height: 40px; line-height: 40px; margin: 35px auto 0; text-align: center; text-decoration: none; width: 155px;">Aktivere</a>
			</td>
		</tr>' . "\r\n\r\n";

    $wp_new_user_notification_email['message'] = $message;

    //    $wp_new_user_notification_email['headers'] = 'From: MyName<example@domain.ext>'; // this just changes the sender name and email to whatever you want (instead of the default WordPress <wordpress@domain.ext>

    return $wp_new_user_notification_email;
}

function add_children()
{

    $id = $_POST['child_id'];
    if ($id != 0) {
        $new_title = mb_convert_case($_POST['childname'], MB_CASE_TITLE, "UTF-8");
        $har_ikke = array($_POST['harikke']);
        $kon =  array($_POST['gender']);
        $hidden =  array($_POST["hidden"]);
        $mails =  array($_POST["mails"]);

        $dob_str = $_POST['date'];
        $date = DateTime::createFromFormat('m/d/Y', $dob_str);
        $date = $date->format('Ymd');

        // Saving image

        if (!empty($_FILES['profilbillede']['name'])) {

            $file = $_FILES['profilbillede'];
            $profilbillede = upload_user_file($file);
            update_field('profilbillede', $profilbillede, $id);
        }

        $post_update = array(
            'ID'         => $id,
            'post_title' => $new_title
        );
        wp_update_post($post_update);

        update_field('navn', $new_title, $id);
        update_field('har_ikke', $har_ikke, $id);
        update_field('termin_fodselsdato', $date, $id);
        update_field('kon', $kon, $id);
        update_field('jeg_vil', $hidden, $id);
        update_field('skjul_dette', $mails, $id);
    } else {
        $new_title = mb_convert_case($_POST['childname'], MB_CASE_TITLE, "UTF-8");

        $post = array(
            'post_type'     => 'children',
            'post_title' => $new_title,
            'post_author'   => get_current_user_id(),
            'post_status'   => 'publish'
        );
        $id = wp_insert_post($post);

        $har_ikke = array($_POST['harikke']);
        $kon =  array($_POST['gender']);
        $hidden =  array($_POST["hidden"]);
        $mails =  array($_POST["mails"]);

        $dob_str = ($_POST['date']) ? $_POST['date'] : date();
        $date = DateTime::createFromFormat('m/d/Y', $dob_str);
        $date = $date->format('Ymd');

        if (!empty($_FILES['profilbillede']['name'])) {
            $file = $_FILES['profilbillede'];
            $profilbillede = upload_user_file($file);
            update_field('profilbillede', $profilbillede, $id);
        }

        update_field('navn', $new_title, $id);
        update_field('har_ikke', $har_ikke, $id);
        update_field('termin_fodselsdato', $date, $id);
        update_field('kon', $kon, $id);
        update_field('jeg_vil', $hidden, $id);
        update_field('skjul_dette', $mails, $id);
    }

    wp_redirect('/mine-children', 302);
    die("Server received '{$_POST['name']}' from your browser.");
}

function upload_user_file($file = array())
{

    require_once(ABSPATH . 'wp-admin/includes/admin.php');

    $file_return = wp_handle_upload($file, array('test_form' => false));
    if (isset($file_return['error']) || isset($file_return['upload_error_handler'])) {
        return false;
    } else {

        $filename = $file_return['file'];

        $attachment = array(
            'post_mime_type' => $file_return['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content' => '',
            'post_status' => 'inherit',
            'guid' => $file_return['url']
        );

        $attachment_id = wp_insert_attachment($attachment,  $file_return['file']);


        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attachment_data = wp_generate_attachment_metadata($attachment_id, $filename);
        wp_update_attachment_metadata($attachment_id, $attachment_data);
        //        var_dump($attachment_data ); die();
        if (0 < intval($attachment_id)) {
            return $attachment_id;
        }
    }

    return false;
}


function get_image_attach_id($filename)
{

    // Get the path to the upload directory.
    // If it was uploaded to WP, wp_upload_dir() does the job
    $wp_upload_dir = wp_upload_dir();
    $full_path = $filename;

    // Check the type of file. We'll use this as the 'post_mime_type'.
    $filetype = wp_check_filetype(basename($full_path), null);

    // Prepare an array of post data for the attachment.
    $attachment = array(
        'guid'           => $wp_upload_dir['url'] . '/' . basename($full_path),
        'post_mime_type' => $filetype['type'],
        'post_title'     => preg_replace('/\.[^.]+$/', '', basename($full_path)),
        'post_content'   => '',
        'post_status'    => 'inherit'
    );

    // Insert the attachment.
    $attach_id = wp_insert_attachment($attachment, $full_path);

    return $attach_id;
}

add_action('admin_post_add_children', 'add_children');
add_action('admin_post_nopriv_add_children', 'add_children'); // this is for non logged users

function remove_child()
{

    $id = $_POST['child_id'];

    if (get_current_user_id() == get_post_field('post_author', $id)) {
        wp_delete_post($id, true);
    }
    wp_redirect('/mine-children', 302);
}

add_action('admin_post_remove_child', 'remove_child');
add_action('admin_post_nopriv_remove_child', 'remove_child');

function add_admin_bar_div()
{
    echo '<div id="wpadminbar" style="display:none;"></div>';
}
add_action('wp_footer', 'add_admin_bar_div', 15);

add_action('bbp_new_reply', 'selena_network_bbp_notify_subscribers_callback', 11, 5);
//add_action ('selena_network_bbp_notify_subscribers_cron', 'selena_network_bbp_notify_subscribers_callback', 10, 5);
add_action('bbp_new_topic', 'add_to_debat_widget');

function add_to_debat_widget($topic_id = 0)
{

    global $wpdb;

    $wpdb->insert('wp_240_debat_widget', array(
        'post_id' => $topic_id,
    ));
} // add_to_debat_widget()


function selena_network_bbp_notify_subscribers(
    $reply_id = 0,
    $topic_id = 0,
    $forum_id = 0,
    $anonymous_data = false,
    $reply_author = 0
) {
    wp_schedule_single_event(
        time(),
        'selena_network_bbp_notify_subscribers_cron',
        array(
            $reply_id,
            $topic_id,
            $forum_id,
            $anonymous_data,
            $reply_author
        )
    );

    return true;
}

function selena_network_bbp_notify_subscribers_callback(
    $reply_id,
    $topic_id,
    $forum_id,
    $anonymous_data,
    $reply_author
) {
    // Bail if subscriptions are turned off
    if (!bbp_is_subscriptions_active()) {
        return false;
    }

    $reply_id = bbp_get_reply_id($reply_id);
    $topic_id = bbp_get_topic_id($topic_id);
    $forum_id = bbp_get_forum_id($forum_id);

    // Bail if topic is not published
    if (!bbp_is_topic_published($topic_id)) {
        return false;
    }

    // Bail if reply is not published
    if (!bbp_is_reply_published($reply_id)) {
        return false;
    }

    // User Subscribers
    $user_ids = bbp_get_topic_subscribers($topic_id, true);
    if (empty($user_ids)) {
        return false;
    }

    // Poster name
    $reply_author_name = bbp_get_reply_author_display_name($reply_id);

    // Remove filters from reply content and topic title to prevent content
    // from being encoded with HTML entities, wrapped in paragraph tags, etc...
    remove_all_filters('bbp_get_reply_content');
    remove_all_filters('bbp_get_topic_title');


    // Strip tags from text and setup mail data
    $topic_title   = strip_tags(bbp_get_topic_title($topic_id));
    $reply_url     = bbp_get_reply_url($reply_id);

    if (strpos($reply_url, '/page/')) {
        $reply_url = str_replace('/page/', '?paged=', $reply_url);
    }

    // Loop through users
    foreach ((array) $user_ids as $user_id) {

        // Don't send notifications to the person who made the post
        if (!empty($reply_author) && (int) $user_id === (int) $reply_author) {
            continue;
        }
        $post = array(
            'post_type'     => 'notifications',
            'post_title' => $topic_title,
            'post_author'   => $user_id,
            'post_status'   => 'publish'
        );
        $id = wp_insert_post($post);

        update_field('message', 'Du har en ny besvarelse ' . $topic_title . '', $id);
        update_field('link', $reply_url, $id);
        update_field('is_read', '0', $id);
    }

    return true;
}

// define the bbp_new_reply callback
function action_bbp_new_reply($reply_id, $topic_id, $forum_id, $anonymous_data, $reply_author, $false, $reply_to)
{
    global $wpdb;

    $wpdb->insert('wp_240_debat_widget', array(
        'post_id' => $topic_id,
    ));
};

// add the action
add_action('bbp_new_reply', 'action_bbp_new_reply', 10, 7);

add_action('init', 'do_rewrite');
function do_rewrite()
{
    // Правило перезаписи
    add_rewrite_rule('^(navne)/([^/]*)/([^/]*)/([^/]*)/([^/]*)/([^/]*)/?', 'index.php?pagename=$matches[1]&object=$matches[2]&parametrs=$matches[3]&parametrs4=$matches[4]&parametrs5=$matches[5]&parametrs6=$matches[6]', 'top');
    add_rewrite_rule('^(navne)/([^/]*)/([^/]*)/([^/]*)/([^/]*)/?', 'index.php?pagename=$matches[1]&object=$matches[2]&parametrs=$matches[3]&parametrs4=$matches[4]&parametrs5=$matches[5]', 'top');
    add_rewrite_rule('^(navne)/([^/]*)/([^/]*)/([^/]*)/?', 'index.php?pagename=$matches[1]&object=$matches[2]&parametrs=$matches[3]&parametrs4=$matches[4]', 'top');
    add_rewrite_rule('^(navne)/([^/]*)/([^/]*)/?', 'index.php?pagename=$matches[1]&object=$matches[2]&parametrs=$matches[3]', 'top');
    add_rewrite_rule('^(navne)/([^/]*)/?', 'index.php?pagename=$matches[1]&object=$matches[2]', 'top');

    add_filter('query_vars', function ($vars) {
        $vars[] = 'object';
        $vars[] = 'parametrs';
        $vars[] = 'parametrs4';
        $vars[] = 'parametrs5';
        $vars[] = 'parametrs6';
        return $vars;
    });
}

add_filter('pre_post', 'force_balance_tags');

function bbp_enable_visual_editor($args = array())
{
    $args['tinymce'] = true;
    return $args;
}
add_filter('bbp_after_get_the_content_parse_args', 'bbp_enable_visual_editor');



function famous_date()
{
    $months = array(
        "1" => 'Januar',
        "2" => 'Februar',
        "3" => 'Marts',
        "4" => 'April',
        "5" => 'Maj',
        "6" => 'Juni',
        "7" => 'Juli',
        "8" => 'August',
        "9" => 'September',
        "10" => 'Oktober',
        "11" => 'November',
        "12" => 'December'
    );
    $date = $_POST['date'];
    $array = explode('/', $date);
    wp_redirect('/navne/kendte/' . $array[1] . '/' . $months[$array[0]]);
}

add_action('admin_post_famous_date', 'famous_date');
add_action('admin_post_nopriv_famous_date', 'famous_date');


function alle_kendte_search()
{


    if (isset($_POST['kendt'])) {
        $params['name'] = $_POST['kendt'];
    }
    if (isset($_POST['professions'])) {
        $params['professions'] = '';
        $params['professions'] .= implode(',', $_POST['professions']);
    }

    $_SESSION['kendt_params'] = $params;
    wp_redirect('/navne/alle-kendte/1');
}

add_action('admin_post_alle_kendte_search', 'alle_kendte_search');
add_action('admin_post_nopriv_alle_kendte_search', 'alle_kendte_search');

function register_my_session()
{
    if (!session_id()) {
        session_start();
    }
}

add_action('init', 'register_my_session');

function generate_unique_username($username)
{

    $username = sanitize_title($username);

    static $i;
    if (null === $i) {
        $i = 1;
    } else {
        $i++;
    }
    if (!username_exists($username)) {
        return $username;
    }
    $new_username = sprintf('%s-%s', $username, $i);
    if (!username_exists($new_username)) {
        return $new_username;
    } else {
        return call_user_func(__FUNCTION__, $username);
    }
}

function graviditetsmails_form()
{
    if (is_user_logged_in()) {
        $current_user = get_current_user_id();
    } else {
        if ($user = get_user_by('email', $_POST['email'])) {
            $current_user = $user->ID;
        } else {
            $user_data = array(
                'user_login' => generate_unique_username(strtok(sanitize_user($_POST['email']), '@')),
                'user_email' => $_POST['email'],
                'user_pass' => wp_generate_password(),
                'first_name' => generate_unique_username(strtok(sanitize_user($_POST['email']), '@')),
                'last_name' => generate_unique_username(strtok(sanitize_user($_POST['email']), '@')),
                'nickname' => $_POST['email'],
                'display_name' => generate_unique_username(strtok(sanitize_user($_POST['email']), '@'))
            );
            $current_user = wp_insert_user($user_data);
            wp_new_user_notification($current_user, null, 'both');
        }
    }
    $months = array(
        "1" => 'Januar',
        "2" => 'Februar',
        "3" => 'Marts',
        "4" => 'April',
        "5" => 'Maj',
        "6" => 'Juni',
        "7" => 'Juli',
        "8" => 'August',
        "9" => 'September',
        "10" => 'Oktober',
        "11" => 'November',
        "12" => 'December'
    );

    $new_title = 'Ikke navngivet';

    $post = array(
        'post_type' => 'children',
        'post_title' => $new_title,
        'post_author' => $current_user,
        'post_status' => 'publish'
    );
    $id = wp_insert_post($post);

    $month = $_POST['month'] ?? date('m');
    $day = $_POST['day'] ?? date('d');

    if (strtotime(date('d-m-Y')) <= strtotime($day . '-' . $month . '-' . date('Y'))) {
        $dob_str = $month . '/' . $day . '/' . date('Y', strtotime('-1 year'));
    } else {
        $dob_str = $month . '/' . $day . '/' . date('Y');
    }

    $date = DateTime::createFromFormat('m/d/Y', $dob_str);

    $DeliveryDate = $date->format('Y-m-d');
    $date_acf = $date->format('Ymd');
    update_field('navn', $new_title, $id);
    update_field('termin_fodselsdato', $date_acf, $id);

    $curl = curl_init();

    $now = time();
    $your_date = $date->modify('- 14 days')->getTimestamp(); // strtotime(strtotime($date),'-14 days' );
    $datediff = $now - $your_date;

    $delivery = round($datediff / (60 * 60 * 24));

    $request = [
        'SubscriberName' => $new_title,
        'SubscriberEmail' => $_POST['email'],
        'Mode' => 0,
        'DeliveryDate' => $DeliveryDate,
        'LastMenstruationDate' => date('Y-m-d', strtotime($DeliveryDate . ' -280 days')),
        'Ovulation' => 14,
        'Aspiration' => 13
    ];
    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://graviditetsmail-min-mave.dk/api/PregnancyApi.aspx",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query($request),

    ));
    $response = curl_exec($curl);

    curl_close($curl);
    wp_redirect('/termin.htm', 302);
}

add_action('admin_post_graviditetsmails_form', 'graviditetsmails_form');
add_action('admin_post_nopriv_graviditetsmails_form', 'graviditetsmails_form');

function babymails_form()
{
    if (is_user_logged_in()) {
        $current_user = get_current_user_id();
    } else {
        if ($user = get_user_by('email', $_POST['email'])) {
            $current_user = $user->ID;
        } else {
            $user_data = array(
                'user_login' => generate_unique_username(strtok(sanitize_user($_POST['email']), '@')),
                'user_email' => $_POST['email'],
                'user_pass' => wp_generate_password(),
                'first_name' => generate_unique_username(strtok(sanitize_user($_POST['email']), '@')),
                'last_name' => generate_unique_username(strtok(sanitize_user($_POST['email']), '@')),
                'nickname' => $_POST['email'],
                'display_name' => generate_unique_username(strtok(sanitize_user($_POST['email']), '@'))
            );
            $current_user = wp_insert_user($user_data);
        }
    }
    $months = array(
        "1" => 'Januar',
        "2" => 'Februar',
        "3" => 'Marts',
        "4" => 'April',
        "5" => 'Maj',
        "6" => 'Juni',
        "7" => 'Juli',
        "8" => 'August',
        "9" => 'September',
        "10" => 'Oktober',
        "11" => 'November',
        "12" => 'December'
    );
    $date = DateTime::createFromFormat('m/d/Y', $_POST['date']);

    $new_title = 'Ikke navngivet, ';

    $post = array(
        'post_type' => 'children',
        'post_title' => $new_title,
        'post_author' => $current_user,
        'post_status' => 'publish'
    );
    $id = wp_insert_post($post);

    $bithday = $date->format('Y-m-d');

    $date = $date->format('Ymd');

    update_field('navn', $new_title, $id);
    update_field('termin_fodselsdato', $date, $id);

    $curl = curl_init();

    $request = [
        'ChildName' => $new_title,
        'Email' => $_POST['email'],
        'Mode' => 0,
        'ChildSex' => 1,
        'ChildBirthdate' => $bithday,

    ];

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://graviditetsmail-min-mave.dk/api/ChildApi.aspx",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query($request),

    ));
    $response = curl_exec($curl);
    curl_close($curl);
    wp_redirect('/termin.htm', 302);
}

add_action('admin_post_babymails_form', 'babymails_form');
add_action('admin_post_nopriv_babymails_form', 'babymails_form');

function popular_name_search()
{
    $params = array();
    if (isset($_POST['nameLength']) && ($_POST['nameLength'] != 0)) {
        $params['nameLength'] = $_POST['nameLength'];
    }
    if (isset($_POST['numberVowels']) && ($_POST['numberVowels'] != 0)) {
        $params['numberVowels'] = $_POST['numberVowels'];
    }
    if (isset($_POST['numberConsonant']) && ($_POST['numberConsonant'] != 0)) {
        $params['numberConsonant'] = $_POST['numberConsonant'];
    }
    if (isset($_POST['gender'])) {
        $params['gender'] = '';
        //        foreach ($_POST['gender'] as $one) :
        $params['gender'] .= implode(',', $_POST['gender']);
        //        endforeach;
    }
    if (isset($_POST['nameBeginning'])) {
        $params['nameBeginning'] = $_POST['nameBeginning'];
    }
    if (isset($_POST['nameEnding'])) {
        $params['nameEnding'] = $_POST['nameEnding'];
    }
    if ((isset($_POST['nameContaining']) && (strlen($_POST['nameContaining']) > 0))) {
        $params['nameContaining'] = $_POST['nameContaining'];
    }
    if ((isset($_POST['nameLengthRange']) && (strlen($_POST['nameContaining']) > 0))) {
        $params['nameLengthRange'] = $_POST['nameLengthRange'];
    }
    if (isset($_POST['rating'])) {
        $params['rating'] = '';
        foreach ($_POST['rating'] as $one) :
            $params['rating'] .= $one . ',';
        endforeach;
    }
    if (isset($_POST['compoundNames'])) {
        $params['compoundNames'] = '';
        foreach ($_POST['compoundNames'] as $one) :
            $params['compoundNames'] .= $one . ',';
        endforeach;
    }

    if (isset($_POST['specialCharacters'])) {
        $params['specialCharacters'] = '1';
    }
    if (isset($_POST['origin'])) {
        $params['origin'] = '';
        foreach ($_POST['origin'] as $one) :
            $params['origin'] .= $one . ',';
        endforeach;
    }

    $_SESSION['search_params'] = $params;
    wp_redirect('/navne/liste/1');
}

add_action('admin_post_popular_name_search', 'popular_name_search');
add_action('admin_post_nopriv_popular_name_search', 'popular_name_search');

function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function my_editor_settings($settings)
{
    $settings['quicktags'] = false;
    return $settings;
}

add_filter('wp_editor_settings', 'my_editor_settings');


function add_extra_contactmethod($contactmethods)
{

    // remove unwanted
    unset($contactmethods['aim']);
    unset($contactmethods['jabber']);
    unset($contactmethods['yim']);

    return $contactmethods;
}
add_filter('user_contactmethods', 'add_extra_contactmethod');

add_filter('wp_dropdown_users', 'MySwitchUser');
function MySwitchUser($output)
{

    //global $post is available here, hence you can check for the post type here
    $users = get_users(array('login__in' => get_super_admins()));

    $output = "<select id=\"post_author_override\" name=\"post_author_override\" class=\"\">";

    //Leave the admin in the list
    //    $output .= "";
    foreach ($users as $user) {
        $sel = ($post->post_author == $user->ID) ? "selected='selected'" : '';
        $output .= '<option value="' . $user->ID . '"' . $sel . '>' . $user->user_login . '</option>';
    }
    $output .= "</select>";

    return $output;
}

//* Change BBPress Breadcrumb Seperator
function filter_bbPress_breadcrumb_separator()
{
    $sep = '<span class="breadcrumbs__separator"> <svg class="separator" xmlns="http://www.w3.org/2000/svg" width="12.227" height="12.121" viewBox="0 0 12.227 12.121">
                        <g transform="translate(0.75 1.061)">
                            <path id="Контур_18" data-name="Контур 18" d="M6,11H16.417m0,0-5-5m5,5-5,5" transform="translate(-6 -6)" fill="none" stroke="#634282" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                        </g>
                    </svg> </span>';
    return $sep;
}

add_filter('bbp_breadcrumb_separator', 'filter_bbPress_breadcrumb_separator');

add_action('init', 'stats_cookie');
function stats_cookie()
{
    if ((!isset($_COOKIE['visit_time'])) || ($_COOKIE['visit_time'] < 5)) {
        $current = $_COOKIE['visit_time'] + 1;
        setcookie('visit_time', $current, time() + 60 + 60 * 24 * 7, COOKIEPATH, COOKIE_DOMAIN);
    }
}

//custom 2021 Fooz Agency Changes

add_filter('bbp_kses_allowed_tags', 'custom_filters_bbpress', 10000);

function custom_filters_bbpress($list)
{
    $list['img']['data-mce-src'] = true;
    $list['img']['alt'] = true;
    $list['img']['data-mce-selected'] = true;

    return $list;
}

function filter_canonical_for_names($canonical)
{
    if (is_page(34696)) {
        global $wp;

        return home_url($wp->request);
    }
}

add_filter('wpseo_canonical', 'filter_canonical_for_names');

add_filter('bbp_get_reply_content', 'my_plugin_custom_bbp_function');
function my_plugin_custom_bbp_function($content)
{
    return html_entity_decode($content);
}

add_action('init', 'register_names_seo_description');

function register_names_seo_description()
{ {
        $labels = array(
            'name' => _x('Names', 'Post Type General Name'),
            'singular_name' => _x('Name', 'Post Type Singular Name'),
        );


        $args = array(
            'label' => __('Names Descriptions'),
            'description' => __('Names Descriptions'),
            'labels' => $labels,
            'supports' => array('title', 'editor'),
            'hierarchical' => false,
            'public' => false,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'can_export' => true,
            'has_archive' => false,
            'show_in_rest' => true,
            'capability_type' => 'post',
            'menu_icon' => 'dashicons-admin-site',
        );

        // Registering your Custom Post Type
        register_post_type('names', $args);
    }
}

// add_action('wp_head', 'check_queried_object');
function check_queried_object()
{
    var_dump(get_query_var('parametrs'));
    var_dump(get_query_var('object'));
    exit();
}

add_filter('wpseo_title', 'set_navne_module_seo_title');
add_filter('wpseo_metadesc', 'set_navne_module_seo_descs');
add_filter('wpseo_robots', 'remomve_list_page_index');

function remomve_list_page_index()
{
    global $wp;
    $curr_requested = str_replace(home_url(), "", home_url($wp->request));

    if ($curr_requested == '/navne/alle-kendte/1') {
        return 'noindex, nofollow';
    }

    $object = get_query_var('object');
    $string = explode('-', $object)[0];
    if ($string == 'liste') {
        return 'noindex, nofollow';
    }
}

function is_navne_month()
{
    $months = array(
        "1" => 'januar',
        "2" => 'februar',
        "3" => 'marts',
        "4" => 'april',
        "5" => 'maj',
        "6" => 'juni',
        "7" => 'juli',
        "8" => 'august',
        "9" => 'september',
        "10" => 'oktober',
        "11" => 'november',
        "12" => 'december'
    );

    $parametrs = get_query_var('parametrs');
    $month = array_search($parametrs, $months);

    return $month;
}

function set_navne_module_seo_descs()
{
    global $post;
    if ($post->ID != 34696) {
        return false;
    }
    $object = get_query_var('object');
    $string = explode('-', $object)[0];


    if ((substr($object, strlen($object) - strlen('-navne')) == '-navne')
        && ($object != 'mest-populaere-baby-navne') && ($object != 'populaere-navne')
    ) {
        $object = 'betydning';
    }
    $parametrs = get_query_var('parametrs');
    $parametrs4 = get_query_var('parametrs4');

    switch ($object) {
        case 'navnekarrusel':
            return 'Er du i tvivl om, hvad din lille baby skal hedde? Med vores navnegenerator kan du få masser af gode forslag til både populære og unikke navne.';
            break;
        case 'navnedag':
            return 'Næsten alle årets 365 dage har en navnedag i Danmark, og her på siden kan du se alle drenge- og pigenavne der har navnedag i ' . $parametrs . ' måned.';
            break;
        case 'pigenavne':
            if ($parametrs) {
                return 'Drømmer du om at finde et drengenavn der starter med ' . $parametrs . ', men savner du inspirerende navneforslag? Se listen af populære og unikke navne her.';
            }
            break;
        case 'drengenavne':
            if ($parametrs) {
                return 'Drømmer du om at finde et pigenavn der starter med ' . $parametrs . ', men savner du inspirerende navneforslag? Se listen af populære og unikke navne her.';
            }
            break;
        case 'mest-populaere-baby-navne':
            if ($parametrs == 'dreng') {
                return 'Hvad var de mest populære drengenavne i '.$parametrs4.'? Se den fulde liste over navnenes popularitet og find inspiration til dit barns navn.';
            } else {
                return 'Hvad var de mest populære pigenavne i '.$parametrs4.'? Se den fulde liste over navnenes popularitet og find inspiration til dit barns navn.';
            }
            break;
        case 'populaere-navne':
            return false;
            break;
        case 'alle-kendte':
            return false;

            break;
        case 'kendte':
            return 'Se hvilke kendisser der hedder ' . ucfirst($parametrs) . ' ligesom dit barn, eller find inspiration til hvad dit barn skal hedde blandt nogle af tidens mest kendte personer.';
            break;
        case 'betydning':
            return 'Se den fulde liste over populære og unikke ' . ucfirst($string) . ' navne samt deres betydning, og få masser af inspirerende navneforslag til din babys navn.';
            break;
        case 'liste':
            return false;
            break;
        case '':
            return false;
            break;
        default:
            return 'Hvor mange hedder ' . ucfirst($string) . ' i Danmark og hvad betyder navnet egentlig? Find spændende navnestatistik og inspiration til din babys navn på Min-Mave.dk. ';
            break;
    }
}

function set_navne_module_seo_title()
{
    global $post;
    if ($post->ID != 34696) {
        return false;
    }
    $object = get_query_var('object');
    $string = explode('-', $object)[0];

    if ((substr($object, strlen($object) - strlen('-navne')) == '-navne')
        && ($object != 'mest-populaere-baby-navne') && ($object != 'populaere-navne')
    ) {
        $object = 'betydning';
    }
    $parametrs = get_query_var('parametrs');
    $parametrs4 = get_query_var('parametrs4');

    switch ($object) {
        case 'navnekarrusel':
            return 'Navnegenerator til babynavne';
            break;
        case 'navnedag':
            return 'Navnedage i ' . $parametrs . ' - Min-Mave.dk';
            break;
        case 'pigenavne':
            if ($parametrs) {
                return 'Pigenavne der starter med ' . $parametrs;
            }
            break;
        case 'drengenavne':
            if ($parametrs) {
                return 'Drengenavne der starter med ' . $parametrs;
            }
            break;
        case 'mest-populaere-baby-navne':
            if ($parametrs == 'dreng') {
                return 'Mest populære drengenavne i ' . $parametrs4;
            } else {
                return 'Mest populære pigenavne i ' . $parametrs4;
            }
            break;
        case 'populaere-navne':
            return false;
            break;
        case 'alle-kendte':
            return false;

            break;
        case 'kendte':
            return 'Kendte personer der hedder  ' . ucfirst($parametrs);
            break;
        case 'betydning':
            return ucfirst($string) . ' navne: Inspiration til drenge og piger - Min-Mave.dk';
            break;
        case 'liste':
            return false;
            break;
        case '':
            return false;
            break;
        default:
            return 'Navnet ' . ucfirst($string) . ' - Betydning og popularitet';
            break;
    }
}
