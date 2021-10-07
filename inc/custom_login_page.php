<?php

add_action('login_head', 'custom_login_page_css');

function custom_login_page_css() {
echo ' <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@400;500;600;700&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="'.get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="'.get_template_directory_uri().'/assets/styles/slick.css">
<link rel="stylesheet" href="'.get_template_directory_uri().'/style.css?v=9">';
}

add_action('login_header', 'custom_login_page_header');
function custom_login_page_header() {
echo ' <div class="login__page d-flex">
    <div class="container">
        <div class="header__logo text-center text-lg-left">
            <a href="/">
                <img src="'.get_template_directory_uri().'/assets/img/head-logo.png" alt="Logo">
            </a>
            <p class="header__disclaimer">
                Danmarks største site for gravide
                og småbørnsforældre
            </p>
        </div>
        <div class="login-block">
            <div class="login__form">';
            }
            add_action('login_footer', 'custom_login_page_footer');
            function custom_login_page_footer() {
            echo '                 </div><div class="d-none d-xl-flex flex-column login-advices">
                <div class="d-flex login-advices__item">
                    <img class="advice-img" src="'.get_template_directory_uri().'/assets/img/pregnant.svg">
                    <div class="d-flex flex-column advice-block">
                        <span class="text-left advice-label">Graviditet</span>
                        <span class="advice-text">På Min-mave lærer du alt om graviditet og tip til, hvordan du plejer dit barns helbred</span>
                    </div>
                </div>
                <div class="d-flex login-advices__item">
                    <img class="advice-img" src="'.get_template_directory_uri().'/assets/img/babyandpregnant.svg">
                    <div class="d-flex flex-column advice-block">
                        <span class="text-left advice-label">Graviditet</span>
                        <span class="advice-text">På Min-mave lærer du alt om graviditet og tip til, hvordan du plejer dit barns helbred</span>
                    </div>
                </div>
                <div class="d-flex login-advices__item">
                    <img class="advice-img" src="'.get_template_directory_uri().'/assets/img/baby.svg">
                    <div class="d-flex flex-column advice-block">
                        <span class="text-left advice-label">Graviditet</span>
                        <span class="advice-text">På Min-mave lærer du alt om graviditet og tip til, hvordan du plejer dit barns helbred</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
}