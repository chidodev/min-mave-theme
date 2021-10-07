<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Test Remove // <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/styles/slick.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css?v=9">


    <!--    <link rel="stylesheet" href="--><?php //echo get_template_directory_uri();
                                            ?>
    <!--/assets/styles/disease.css">-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="header__mobile-menu d-lg-none d-flex flex-column justify-content-between">
        <div class="header__mobile-menu-close">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/close-burger-icon.svg" alt="Close">
        </div>
        <div class="header__mobile-menu-container">
            <div class="d-flex flex-column">
                <?php
                $arg = array(
                    'theme_location'  => 'primary',
                    'menu'            => 'Primary Navigation',
                    'container'       => 'ul',
                    'container_class' => 'navigation__menu-wrapper',
                    'container_id'    => '',
                    'menu_class'      => 'header__menu d-flex flex-column',
                );
                wp_nav_menu($arg);
                ?>
                <?php
                $arg = array(
                    'menu'            => 'Dynamic Navigation',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'navigation__menu d-flex flex-column',
                    'walker' => new True_Walker_Mobile_Nav_Menu(),

                );
                $a = wp_get_menu_array('dynamic-navigation');
                echo create_menu_from_array($a);
                ?>

            </div>
        </div>
        <div class="header__mobile-menu-buttons d-flex flex-column">
            <?php if (!is_user_logged_in()) {
                echo ' <a href="/login" class="custom-btn outline text-center">
                            Log Ind
                        </a>
                        <a href="/local-signup/" class="custom-btn text-center">
                            Opret Bruger
                        </a>';
            } ?>

        </div>
    </div>
    <header class="header">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <div class="header__logo d-lg-flex align-items-center">
                        <div class="header__logo-image">
                            <a href="/">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/head-logo.png" alt="Min Mave Logo">
                            </a>
                        </div>
                        <p class="header__disclaimer d-lg-block d-none">
                            Danmarks største site for gravide
                            og småbørnsforældre
                        </p>
                    </div>
                </div>
                <div class="<?php echo is_user_logged_in() ? 'col-6 col-sm-5 col-md-4' : 'col-4 col-sm-3 col-md-2' ?> col-lg-4 d-flex justify-content-between d-lg-none header__mobile-tools align-items-center">
                    <div class="header__mobile-search custom-select-block">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.svg" alt="">
                        <div class="custom-dropdown">
                            <div class="custom-input mobile-search">
                                <form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_site_url(); ?>">
                                    <label for="search-input">Søg…</label>
                                    <input id="search-input" name="s" type="text">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <?php if (is_user_logged_in()) {
                            $current_user = wp_get_current_user();
                            $query = new WP_Query(array(
                                'posts_per_page' => '-1',
                                'post_type' => array('notifications'),
                                'author' => $current_user->id,
                                'meta_key'    => 'is_read',
                                'meta_value' => '0',
                                'meta_compare_key' => '='

                            ));
                            $messages = do_shortcode('[bbpm-unread-count]');
                            echo '<div class="profile-account custom-select-block">
                                <div class="profile-account__avatar">
                                    ' . get_avatar($current_user->ID, 48) . '
                                </div>
                                <div class="custom-dropdown">
                                    <div class="custom-item-container profile-account__links d-flex flex-column align-items-center">
                                        <div class="profile-account__main-info align-self-stretch">
                                            <div class="profile-account__main-photo">
                                                <a href="' . bbp_profile_link() . '">' . get_avatar($current_user->ID, 92) . '</a>
                                            </div>
                                            <a href="' . bbp_edit_profile_link() . '" class="profile-account__user-settings d-flex align-items-center justify-content-center">
                                                <img src="' . get_template_directory_uri() . '/assets/img/pencil.svg" alt="Pencil">
                                            </a>
                                        </div>  
                                        <div class="profile-account__user-page-list text-left">
                                            <div class="profile-account__user-page my-profile">
                                                <a href="' . bbp_profile_link() . '">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23.5" height="23.5" viewBox="0 0 23.5 23.5">
                                                      <g id="profile-circled" transform="translate(-1.25 -1.25)">
                                                        <g id="Сгруппировать_29" data-name="Сгруппировать 29" transform="translate(2 2)">
                                                          <path id="Контур_22" data-name="Контур 22" d="M4.5,19.981a11,11,0,0,0,17,0m-17,0a11,11,0,1,1,17,0m-17,0S6.95,16.85,13,16.85s8.5,3.131,8.5,3.131" transform="translate(-2 -2)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                          <path id="Контур_23" data-name="Контур 23" d="M12,12A3,3,0,1,0,9,9,3,3,0,0,0,12,12Z" transform="translate(-1 -1.429)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                        </g>
                                                      </g>
                                                    </svg>
                                                    <span>Min profil</span>
                                                </a>
                                            </div>
                                            <div class="profile-account__user-page notifications">
                                                <a class="marked active" href="/all-notifications">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.134" height="22" viewBox="0 0 20.134 22">
                                                      <g transform="translate(1.885 1)">
                                                        <path id="Контур_29" d="M15,20a3,3,0,0,1-6,0" transform="translate(-3.818 -3)" fill="none" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"/>
                                                        <path id="Контур_30" d="M17.545,11.737V7.263A6.275,6.275,0,0,0,11.182,1,6.275,6.275,0,0,0,4.818,7.263v4.474A12.245,12.245,0,0,1,3,18H19.364A12.245,12.245,0,0,1,17.545,11.737Z" transform="translate(-3 -1)" fill="none" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"/>
                                                      </g>
                                                    </svg>
                                                    <span>Notifikationer</span>
                                                </a>
                                                <span class="d-flex justify-content-center align-items-center">' . $query->post_count . '</span>
                                            </div>
                                            <div class="profile-account__user-page messages">
                                                <a href="' . do_shortcode('[bbpm-messages-link]') . '" class="marked">
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="28.353" height="20.447" viewBox="0 0 28.353 20.447">
                                                      <g id="mail" transform="translate(-6 1)">
                                                        <g id="Сгруппировать_46" data-name="Сгруппировать 46" transform="translate(7)">
                                                          <path d="M7,9l6.588,4.612L20.176,9" transform="translate(-0.412 -3.729)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                          <path d="M2,20.812V7.635A2.635,2.635,0,0,1,4.635,5H25.717a2.635,2.635,0,0,1,2.635,2.635V20.812a2.635,2.635,0,0,1-2.635,2.635H4.635A2.635,2.635,0,0,1,2,20.812Z" transform="translate(-2 -5)" fill="none" stroke-width="2"/>
                                                        </g>
                                                      </g>
                                                    </svg>
                                                    <span>Beskeder</span>
                                                </a>
                                                <span class="d-flex justify-content-center align-items-center">' . do_shortcode('[bbpm-unread-count]') . '</span>
                                            </div>
                                            <div class="profile-account__user-page my-born">
                                                <a href="/mine-children">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20">
                                                      <g transform="translate(-2 -2)">
                                                        <path d="M13,2v8h8A8,8,0,0,0,13,2Zm6.32,13.89A7.948,7.948,0,0,0,21,11H6.44L5.49,9H2v2H4.22s1.89,4.07,2.12,4.42A3.5,3.5,0,1,0,11.46,19h2.08a3.5,3.5,0,1,0,5.78-3.11ZM8,20a1.5,1.5,0,1,1,1.5-1.5A1.5,1.5,0,0,1,8,20Zm9,0a1.5,1.5,0,1,1,1.5-1.5A1.5,1.5,0,0,1,17,20Z"/>
                                                      </g>
                                                    </svg>

                                                    <span>Mine børn</span>
                                                </a>
                                            </div>
                                            <div class="profile-account__user-page settings">
                                                <a href="' . bbp_edit_profile_link() . '">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.499" height="21.5" viewBox="0 0 21.499 21.5">
                                                      <g id="settings" transform="translate(-1.25 -1.25)">
                                                        <g id="Group_31" data-name="Group 31">
                                                          <path id="Path_25" data-name="Path 25" d="M12,15a3,3,0,1,0-3-3A3,3,0,0,0,12,15Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                          <path id="Path_26" data-name="Path 26" d="M21.79,10.763l-2.168-.368-1.1-2.65.358-.5L19.8,5.959a.259.259,0,0,0-.029-.339L18.39,4.237a.252.252,0,0,0-.334-.03l-1.79,1.276L13.559,4.37l-.1-.608L13.2,2.219A.26.26,0,0,0,12.936,2H10.982a.261.261,0,0,0-.26.222L10.35,4.4,7.7,5.516,5.923,4.232a.26.26,0,0,0-.335.034L4.2,5.648a.263.263,0,0,0-.03.339l1.283,1.8-1.08,2.657-.611.1-1.543.26a.26.26,0,0,0-.219.26v1.955a.261.261,0,0,0,.222.26l2.18.371L5.515,16.3l-.364.506-.912,1.267a.26.26,0,0,0,.03.34L5.652,19.8a.252.252,0,0,0,.334.03l1.8-1.285L10.4,19.612l.1.61.26,1.559a.26.26,0,0,0,.26.219h1.958a.26.26,0,0,0,.26-.221l.367-2.166,2.651-1.1.5.36,1.289.92a.26.26,0,0,0,.333-.032l1.384-1.383a.263.263,0,0,0,.029-.339l-1.276-1.792,1.1-2.651.608-.1,1.558-.26a.26.26,0,0,0,.22-.26v-1.97a.244.244,0,0,0-.21-.244Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                        </g>
                                                      </g>
                                                    </svg>

                                                    <span>Indstillinger</span>
                                                </a>
                                            </div>
                                            <div class="profile-account__user-page logout">
                                                <a href="' . wp_logout_url('/') . '">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.366" height="21.5" viewBox="0 0 17.366 21.5">
                                                      <g id="log-out" transform="translate(-4.25 -2.25)">
                                                        <g transform="translate(5 3)">
                                                          <path d="M12,12h7m0,0-3,3m3-3L16,9" transform="translate(-3.444 -2)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                          <path d="M20.556,6.333V5.222A2.222,2.222,0,0,0,18.333,3H7.222A2.222,2.222,0,0,0,5,5.222V20.778A2.222,2.222,0,0,0,7.222,23H18.333a2.222,2.222,0,0,0,2.222-2.222V19.667" transform="translate(-5 -3)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                        </g>
                                                      </g>
                                                    </svg>
                                                    <span>Log ud</span>
                                                </a>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                        } ?>
                    </div>
                    <div class="header__mobile-menu-button">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/burger-icon.svg" alt="">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 d-lg-block d-none">
                    <?php
                    $arg = array(
                        'theme_location'  => 'primary',
                        'menu'            => 'Primary Navigation',
                        'container'       => 'ul',
                        'container_class' => 'navigation__menu-wrapper',
                        'container_id'    => '',
                        'menu_class'      => 'header__menu d-flex justify-content-between',
                    );
                    wp_nav_menu($arg);
                    ?>
                </div>
                <div class="col-xl-3 text-right d-lg-block d-none align-items-center justify-content-end">
                    <?php if (is_user_logged_in()) {
                        $current_user = wp_get_current_user();
                        $query = new WP_Query(array(
                            'posts_per_page' => '-1',
                            'post_type' => array('notifications'),
                            'author' => $current_user->id,
                            'meta_key'    => 'is_read',
                            'meta_value' => '0',
                            'meta_compare_key' => '='

                        ));

                        echo '<div class="header__profile-block d-flex align-items-center justify-content-end">
                            <div class="notifications-widget custom-select-block">
                            <div class="mx-auto"><img src="' . get_template_directory_uri() . '/assets/img/bell.svg" alt="">
                                <span class="d-flex justify-content-center align-items-center">' . $query->post_count . '</span>
                            </div>
                            <div class="custom-dropdown">
                                <div class="custom-item-container notifications-widget__content d-flex flex-column align-items-center">';
                        if ($query->have_posts()) {

                            echo '
                                    <div class="notifications-widget__list">';



                            $count = 0;
                            while ($query->have_posts()) : $query->the_post();
                                if ($count > 2) break;
                                echo '<a href="' . get_field('link') . '">
                                        <div class="notifications-widget__item unread">
                                            <div class="notifications-widget__item-meta d-flex justify-content-between align-items-center">
                                                <div class="notifications-widget__item-title text-left">
                                                   ' . get_the_title() . '
                                                </div>
                                                <div class="notifications-widget__item-date">
                                                    ' . get_the_date('d.m.Y') . '
                                                </div>
                                            </div>
                                            <div class="notifications-widget__item-content text-left">
                                                ' . get_field('message') . '
                                            </div>
                                        </div>
                                        </a>';
                                $count++;
                            endwhile;

                            echo '
                                    </div>';

                            if ($query->post_count > 3) :
                                echo '
                                    <div class="notifications-widget__more">
                                        ' . ($query->post_count - 3) . ' mere
                                    </div>';
                            endif;
                        } else {
                            echo '
                        
                                    <div class="notifications-widget__no-data text-center">
                                        Du har ingen notifikationer
                                    </div>';
                        }
                        wp_reset_query();
                        echo '
                                    <a href="/all-notifications" class="notifications-widget__show-all custom-btn outline">
                                        Alle notifikationer
                                    </a>
                                </div>
                            </div>
                        </div>
                            <a class="profile-widget" href="' . do_shortcode('[bbpm-messages-link]') . '">
                                <img src="' . get_template_directory_uri() . '/assets/img/letter.svg" alt="">
                                <span class="d-flex justify-content-center align-items-center">' . do_shortcode('[bbpm-unread-count] ') . '</span>
                            </a>
                            <div class="profile-account custom-select-block">
                                <div class="profile-account__avatar">
                                    ' . get_avatar($current_user->ID, 48) . '
                                </div>
                                <div class="custom-dropdown">
                                    <div class="custom-item-container profile-account__links d-flex flex-column align-items-center">
                                        <div class="profile-account__main-info align-self-stretch">
                                            <div class="profile-account__main-photo">
                                                <a href="' . bbp_profile_link() . '">' . get_avatar($current_user->ID, 92) . '</a>
                                            </div>
                                            <a href="' . bbp_edit_profile_link() . '" class="profile-account__user-settings d-flex align-items-center justify-content-center">
                                                <img src="' . get_template_directory_uri() . '/assets/img/pencil.svg" alt="Pencil">
                                            </a>
                                        </div>  
                                        <div class="profile-account__user-page-list text-left">
                                            <div class="profile-account__user-page my-profile">
                                                <a href="' . bbp_profile_link() . '">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23.5" height="23.5" viewBox="0 0 23.5 23.5">
                                                      <g id="profile-circled" transform="translate(-1.25 -1.25)">
                                                        <g id="Сгруппировать_29" data-name="Сгруппировать 29" transform="translate(2 2)">
                                                          <path id="Контур_22" data-name="Контур 22" d="M4.5,19.981a11,11,0,0,0,17,0m-17,0a11,11,0,1,1,17,0m-17,0S6.95,16.85,13,16.85s8.5,3.131,8.5,3.131" transform="translate(-2 -2)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                          <path id="Контур_23" data-name="Контур 23" d="M12,12A3,3,0,1,0,9,9,3,3,0,0,0,12,12Z" transform="translate(-1 -1.429)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                        </g>
                                                      </g>
                                                    </svg>
                                                    <span>Min profil</span>
                                                </a>
                                            </div>
                                            
                                            <div class="profile-account__user-page my-born">
                                                <a href="/mine-children">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20">
                                                      <g transform="translate(-2 -2)">
                                                        <path d="M13,2v8h8A8,8,0,0,0,13,2Zm6.32,13.89A7.948,7.948,0,0,0,21,11H6.44L5.49,9H2v2H4.22s1.89,4.07,2.12,4.42A3.5,3.5,0,1,0,11.46,19h2.08a3.5,3.5,0,1,0,5.78-3.11ZM8,20a1.5,1.5,0,1,1,1.5-1.5A1.5,1.5,0,0,1,8,20Zm9,0a1.5,1.5,0,1,1,1.5-1.5A1.5,1.5,0,0,1,17,20Z"/>
                                                      </g>
                                                    </svg>

                                                    <span>Mine børn</span>
                                                </a>
                                            </div>
                                            <div class="profile-account__user-page settings">
                                                <a href="' . bbp_edit_profile_link() . '">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.499" height="21.5" viewBox="0 0 21.499 21.5">
                                                      <g id="settings" transform="translate(-1.25 -1.25)">
                                                        <g id="Group_31" data-name="Group 31">
                                                          <path id="Path_25" data-name="Path 25" d="M12,15a3,3,0,1,0-3-3A3,3,0,0,0,12,15Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                          <path id="Path_26" data-name="Path 26" d="M21.79,10.763l-2.168-.368-1.1-2.65.358-.5L19.8,5.959a.259.259,0,0,0-.029-.339L18.39,4.237a.252.252,0,0,0-.334-.03l-1.79,1.276L13.559,4.37l-.1-.608L13.2,2.219A.26.26,0,0,0,12.936,2H10.982a.261.261,0,0,0-.26.222L10.35,4.4,7.7,5.516,5.923,4.232a.26.26,0,0,0-.335.034L4.2,5.648a.263.263,0,0,0-.03.339l1.283,1.8-1.08,2.657-.611.1-1.543.26a.26.26,0,0,0-.219.26v1.955a.261.261,0,0,0,.222.26l2.18.371L5.515,16.3l-.364.506-.912,1.267a.26.26,0,0,0,.03.34L5.652,19.8a.252.252,0,0,0,.334.03l1.8-1.285L10.4,19.612l.1.61.26,1.559a.26.26,0,0,0,.26.219h1.958a.26.26,0,0,0,.26-.221l.367-2.166,2.651-1.1.5.36,1.289.92a.26.26,0,0,0,.333-.032l1.384-1.383a.263.263,0,0,0,.029-.339l-1.276-1.792,1.1-2.651.608-.1,1.558-.26a.26.26,0,0,0,.22-.26v-1.97a.244.244,0,0,0-.21-.244Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                        </g>
                                                      </g>
                                                    </svg>

                                                    <span>Indstillinger</span>
                                                </a>
                                            </div>
                                            <div class="profile-account__user-page logout">
                                                <a href="' . wp_logout_url('/') . '">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.366" height="21.5" viewBox="0 0 17.366 21.5">
                                                      <g id="log-out" transform="translate(-4.25 -2.25)">
                                                        <g transform="translate(5 3)">
                                                          <path d="M12,12h7m0,0-3,3m3-3L16,9" transform="translate(-3.444 -2)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                          <path d="M20.556,6.333V5.222A2.222,2.222,0,0,0,18.333,3H7.222A2.222,2.222,0,0,0,5,5.222V20.778A2.222,2.222,0,0,0,7.222,23H18.333a2.222,2.222,0,0,0,2.222-2.222V19.667" transform="translate(-5 -3)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                        </g>
                                                      </g>
                                                    </svg>
                                                    <span>Log ud</span>
                                                </a>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    } else {
                        echo '<div class="header__auth-links d-flex align-items-center justify-content-end">
                            <a href="/login" class="header__login-link">
                                Log Ind
                            </a>
                            <a href="/local-signup/" class="custom-btn header__name text-center">
                                Opret Bruger
                            </a>
                        </div>';
                    } ?>



                </div>
            </div>
        </div>
    </header>
    <section class="navigation">
        <div class="container d-lg-block d-none">
            <div class="d-flex flex-column flex-xl-row align-items-center flex-wrap">
                <?php ubermenu('main'); ?>

                <?php
                $arg = array(
                    'menu'            => 'Dynamic Navigation',
                    'container'       => 'div',
                    'container_class' => 'navigation__menu-wrapper',
                    'container_id'    => '',
                    'menu_class'      => 'navigation__menu d-flex justify-content-between',
                    'walker' => new True_Walker_Nav_Menu(),
                    'link_after' => '<span class="navigation__item-arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14.546" height="8.173" viewBox="0 0 14.546 8.173">
                                            <g id="nav-arrow-down" transform="translate(-4.727 -7.727)">
                                                <g transform="translate(6 9)">
                                                    <path data-name="Контур 4" d="M6,9l6,6,6-6" transform="translate(-6 -9)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/>
                                                </g>
                                            </g>`
                                        </svg>
                                     </span>',
                );
                //wp_nav_menu($arg);
                //                
                ?>

                <div class="navigation__search-wrapper text-right">
                    <div class="custom-input navigation__search d-inline-block">
                        <form role="search" method="get" class="searchform" action="<?php echo get_site_url(); ?>">
                            <input class="search" name="s" type="text" placeholder="Søg…">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>