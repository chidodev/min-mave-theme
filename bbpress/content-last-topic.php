<?php

/**
 * Last Topic Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<div class="bbpress-wrapper">


    <?php if ( bbp_has_topics() ) : ?>

        <?php bbp_get_template_part( 'loop',       'topics'    ); ?>


    <?php else : ?>

        <?php bbp_get_template_part( 'feedback',   'no-topics' ); ?>

    <?php endif; ?>


</div>
