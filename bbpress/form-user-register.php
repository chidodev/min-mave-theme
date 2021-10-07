<?php

/**
 * User Registration Form
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
            <form class="login__form validate" method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>">
                <h4 class="login__form-title">Opret Bruger</h4>
                <div class="login__inputs-block">
                    <?php do_action( 'bbp_template_before_register_fields' ); ?>
                    <div class="d-flex align-items-center justify-content-between login-row">
                        <span class="d-none d-md-block form-label login-label">Brugernavnl</span>
                        <div class="custom-input">
                            <label for="login-input">Brugernavnl</label>
                            <input id="login-input" name="user_login" value="<?php bbp_sanitize_val( 'user_login' ); ?>" class="required login-form-input" type="text">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between login-row">
                        <span class="d-none d-md-block form-label login-label">E-mail</span>
                        <div class="custom-input">
                            <label for="email-input">E-mail</label>
                            <input id="email-input" name="user_email" type="text" value="<?php bbp_sanitize_val( 'user_email' ); ?>" class="required login-form-input email-input" type="text">
                        </div>
                    </div>
<!--                    <div class="d-flex align-items-center justify-content-between login-row">-->
<!--                        <span class="d-none d-md-block form-label">Adgangskode</span>-->
<!--                        <div class="custom-input">-->
<!--                            <label for="password">Adgangskode</label>-->
<!--                            <input id="password" name="user_password" class="required login-form-input" type="password">-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
                <div class="register__checkboxes-block">
                    <div class="custom-checkbox-block d-flex align-items-start form-check rule-check">
                        <label>
                            <input class="required" type="checkbox" name="agree">
                            <span class="checkmark"></span>
                            <div  class="text-left form-check-label">Jeg accepterer &nbsp<a class="registration-link" href="#">betingelserne</a>&nbspfor Min-mave.dk</div>
                        </label>
                    </div>
                    <div class="custom-checkbox-block d-flex align-items-start form-check mailing-check">
                        <label>
                            <input type="checkbox">
                            <span class="checkmark"></span>
                            <div class="text-left form-check-label">Ja tak, tilmeld mig Min-Maves nyhedsbrev med de bedste debatter, blogindlæg og gode tilbud fra vores samarbejdspartnere</div>
                        </label>
                    </div>
                </div>
                <?php do_action( 'bbp_template_after_register_fields' ); ?>
                <div class="text-center registration-capcha">
                    <?php do_action( 'register_form' ); ?>
                </div>
                <?php bbp_user_register_fields(); ?>

                <div class="d-flex text-center flex-column-reverse flex-md-row text-md-left align-items-center submit-login-row">
                    <span class="register__login-link">Allerede medlem?&nbsp<a href="/login" class="registration-link">Log ind her</a></span>
                    <button type="submit" name="user-submit" class="custom-btn header__name text-center submit-btn">Opret Bruger</button>
                </div>
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
