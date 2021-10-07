<?php

/**
 * Forums Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

?>

<div class="recent-debates__item">
    <div class="recent-debates__test d-flex flex-column align-items-start">
        <a class="recent-debates__single-title" href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a>
        <!--        <a href="#" class="custom-btn recent-debates__tag">Graviditetstest</a>-->
    </div>
    <div class="recent-debates__messages">
        <span><?php bbp_forum_reply_count(); ?></span>
        <span class="recent-debates__label-mobile d-lg-none d-inline">indlæg</span>
    </div>
    <div class="user-block d-flex">
        <?php bbp_author_link(array('post_id' => bbp_get_forum_last_active_id(), 'type' => 'avatar', 'size' => 35)); ?>
        <div class="user-block__info d-flex flex-md-column justify-content-between">
            <span class="user-block__date">
                <?php bbp_forum_freshness_link(); ?>
            </span>
            <span class="user-block__name">
                <?php bbp_author_link(array('post_id' => bbp_get_forum_last_active_id(), 'type' => 'name')); ?>
            </span>
        </div>
    </div>
</div>
