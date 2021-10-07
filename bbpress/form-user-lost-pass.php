<?php

/**
 * User Lost Password Form
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

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


            <form class="login__form forgot-password validate" method="post" action="<?php bbp_wp_login_action( array( 'action' => 'lostpassword', 'context' => 'login_post' ) ); ?>">
                <h4 class="login__form-title">Nulstil din adgangskode</h4>

                <div class="login__inputs-block">
                    <?php do_action( 'bbp_template_before_register_fields' ); ?>
                    <div class="d-flex align-items-center justify-content-between login-row">
                        <span class="d-none d-md-block form-label login-label">Din e-mail</span>
                        <div class="custom-input">
                            <label for="login-input">Din e-mail</label>
                            <input id="login-input" name="user_login" value="" class="required login-form-input" type="text">
                        </div>
                    </div>
                </div>

                <?php do_action( 'login_form', 'resetpass' ); ?>

                <div class="d-flex text-center flex-column-reverse flex-md-row text-md-left align-items-center submit-login-row">
                    <span class="register__login-link mt-3 mt-md-0">Allerede medlem?&nbsp<a href="/login" class="registration-link">Log ind her</a></span>
                    <button type="submit" name="user-submit" class="custom-btn text-center"><?php esc_html_e( 'Reset My Password', 'bbpress' ); ?></button>

                    <?php bbp_user_lost_pass_fields(); ?>
                </div>
                <?php if (isset( $_GET['checkemail'] )) :?>
                    <p class="register__login-link d-none d-md-block mt-3">Hvis du har indtastet det rigtige login - vil du modtage et link til at nulstille din adgangskode</p>
                <?php endif; ?>
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