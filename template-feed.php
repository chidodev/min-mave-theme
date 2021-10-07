<?php
/**
 * Template Name: Custom Feed Template
 * Description: Customized feed for min-mave
 *
 */
header('Content-Type: text/xml; charset='.get_option('blog_charset'), true);
while ( have_posts() ) : the_post();
    the_content();
endwhile;
