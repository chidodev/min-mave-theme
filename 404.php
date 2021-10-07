<?php get_header('no-content'); ?>
<?php
//$id= ;
global $wp;
global $wpdb;

$url = explode('/', $wp->request);
if ($url[0] == 'debat') {
    $end = end($url);
    $end = substr($end, 0, -4);
    $newtable = $wpdb->get_results( "SELECT `ID` FROM `wp_240_posts` WHERE post_name = '$end' AND `post_type` = 'topic' " );
    if ($newtable[0]->ID != null) {
        wp_redirect(get_permalink($newtable[0]->ID));
        exit;
    }
}

?>
<body>
<div class="error-404">
    <div class="container">
        <div class="text-center error-block d-flex align-items-center justify-content-center">
            <div class="error-message">
                <p class="error-big-text">Fejl 404</p>
                <p class="error-small-text">Siden blev ikke fundet</p>
                <a href="/" class="custom-btn header__name text-center error-btn">
                    Vende tilbage til startsiden
                </a>
            </div>
        </div>
    </div>
</div>
<?php get_footer('no-content'); ?>
