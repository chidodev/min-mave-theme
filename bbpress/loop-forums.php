<?php

/**
 * Forums Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

do_action('bbp_template_before_forums_loop'); ?>

    <div class="recent-debates custom-item-container" id="forums-list-<?php bbp_forum_id(); ?>">
        <div class="recent-debates__title widget-title d-flex justify-content-between align-items-center">
            <span>Seneste aktivitet i debatten</span>
            <div class="d-none d-lg-block align-self-center">
                <a href="/start-ny-debat" class="recent-debates__add-new custom-btn outline">
                    <span>+</span>
                    <span>Start ny debat</span>
                </a>
            </div>
        </div>
        <div class="recent-debates__table">
            <div class="d-block d-lg-none">
                <a href="/start-ny-debat" class="d-block text-center custom-btn outline recent-debates__add-new">
                    <span>+</span>
                    <span>Start ny debat</span>
                </a>
            </div>
            <div class="recent-debates__table-head">
                <span>Emne</span>
                <span>Indlæg</span>
                <span>Seneste aktivitet</span>
            </div>
            <div class="recent-debates__table-content">
                <div class="tab-block show" id="all-debates">
                    <?php while (bbp_forums()) : bbp_the_forum(); ?>

                        <?php bbp_get_template_part('loop', 'single-forum'); ?>

                    <?php endwhile; ?>


                </div>
            </div>
            <?php bbp_get_template_part( 'pagination', 'topics'    ); ?>
            <?php
            if (!wp_is_mobile()) {
                echo '<div id="cncpt-dsk_rec2"></div>';
            } else {
                echo '<div id="cncpt-outstream"></div>';

            }
            ?>
        </div>
    </div>

<?php do_action('bbp_template_after_forums_loop');
