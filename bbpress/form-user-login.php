<?php

/**
 * User Login Form
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
            </a>
            <p class="header__disclaimer">
                Danmarks største site for gravide
                og småbørnsforældre
            </p>
        </div>
        <div class="login-block">
            <form class="login__form validate" method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>">
                <h4 class="login__form-title">Log ind</h4>
                <div class="login__inputs-block">
                    <div class="d-flex align-items-center justify-content-between login-row bbp-username">
                        <span class="d-none d-md-block form-label login-label">Brugernavn eller e-mail</span>
                        <div class="custom-input">
                            <label for="login-input" class="filled">Brugernavn eller e-mail</label>
                            <input id="login-input" autocomplete="nofill" name="log" value="<?php bbp_sanitize_val( 'user_login', 'text' ); ?>" class="required login-form-input" type="text">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between login-row bbp-password">
                        <span class="d-none d-md-block form-label">Adgangskode</span>
                        <div class="custom-input">
                            <label for="password" class="filled">Adgangskode</label>
                            <input id="password" autocomplete="nofill" name="pwd" value="<?php bbp_sanitize_val( 'user_pass', 'password' ); ?>" class="required login-form-input" type="password">
                        </div>
                    </div>
                </div>
                    <input type="checkbox" name="rememberme" value="forever" checked="checked" <?php checked( bbp_get_sanitize_val( 'rememberme', 'checkbox' ) ); ?> id="rememberme" style="display: none;" />

                <div class="text-left forgot-password-link">
                    <a href="/lost-password">Glemt din adgangskode?</a>
                </div>
                <?php do_action( 'login_form' ); ?>
                <div class="d-flex text-center flex-column-reverse flex-md-row text-md-left align-items-center submit-login-row ">
                    <span class="register__login-link">Ny bruger?&nbsp<a href="/local-signup" class="registration-link">Bliv medlem her</a></span>
                    <button type="submit" name="user-submit" class="custom-btn header__name text-center submit-btn">Log ind</button>
                    <?php bbp_user_login_fields(); ?>
                </div>
            </form>
            <div class="d-none d-xl-flex flex-column login-advices">
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
