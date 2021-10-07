<?php
  /*
   * Show sites current user is a member with
   * 
   */

/** Sets up the WordPress Environment. */
require_once(ABSPATH . 'wp-load.php');

add_action( 'wp_head', 'wp_no_robots' );

require_once(ABSPATH . 'wp-blog-header.php');

add_action( 'wp_head', 'wpmu_signup_stylesheet' );

get_header( );

?>


    <div class="login__page d-flex">
        <div class="container">
            <div class="header__logo text-center text-lg-left">
                <a href="/">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/head-logo.png" alt="Logo">
                </a>            <p class="header__disclaimer">
                    Danmarks største site for gravide
                    og småbørnsforældre
                </p>
            </div>
            <div class="login-block">
                <form class="login__form validate registration-notice" method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>">
                    <?php
                    $user = get_user_by( 'id', $user_id );
                    $existing_user_email = $user->user_email;
                    $user_blogs = get_blogs_of_user( $user_id );
                    $user_blogs_sorted = array();
                    foreach ( $user_blogs AS $user_blog ) {
                        $user_blogs_sorted[ $user_blog->blogname ] = $user_blog->siteurl;
                    }

                    // A real quick way to do a case-insensitive sort of an array keyed by strings:
                    uksort($user_blogs_sorted , "strnatcasecmp");

                    printf( '<h2>' . __( 'Hey %1$s, ').'</h2>
                    <p>'. __('Denne mail er allerede koblet på en eksisterende bruger').'</p>
                    <p>'. __('Har du glemt din adgangskode?' ) . '</p>',
                        '<strong>' . $existing_user_email . '</strong>'
                    );

                    foreach ( $user_blogs AS $user_blog ) {

                        // find the login page for each site in the loop
                        switch_to_blog( $user_blog->userblog_id );
                        $current_login_url = wp_login_url( );
                        restore_current_blog( );

                        $sitename = $user_blog->blogname;
                        ?>
                        <p class="text-center">
                            <a class="custom-btn" href="/login" >Log ind here</a>
                        </p>
                        <?php
                    }
                    ?>
                </form>
                <div class="d-none d-xl-flex flex-column login-advices align-self-center">
                    <div class="d-flex login-advices__item">
                        <img class="advice-img" src="<?php echo get_template_directory_uri();?>/assets/img/pregnant.svg">
                        <div class="d-flex flex-column advice-block">
                            <span class="text-left advice-label">Graviditet</span>
                            <span class="advice-text">På Min-mave lærer du alt om graviditet og tip til, hvordan du plejer dit barns helbred</span>
                        </div>
                    </div>
                    <div class="d-flex login-advices__item">
                        <img class="advice-img" src="<?php echo get_template_directory_uri();?>/assets/img/babyandpregnant.svg">
                        <div class="d-flex flex-column advice-block">
                            <span class="text-left advice-label">Graviditet</span>
                            <span class="advice-text">På Min-mave lærer du alt om graviditet og tip til, hvordan du plejer dit barns helbred</span>
                        </div>
                    </div>
                    <div class="d-flex login-advices__item">
                        <img class="advice-img" src="<?php echo get_template_directory_uri();?>/assets/img/baby.svg">
                        <div class="d-flex flex-column advice-block">
                            <span class="text-left advice-label">Graviditet</span>
                            <span class="advice-text">På Min-mave lærer du alt om graviditet og tip til, hvordan du plejer dit barns helbred</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php  get_footer( );