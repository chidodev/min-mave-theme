<?php

/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<div class="recent-debates__item">
  <div class="recent-debates__test d-flex flex-column justify-content-between">
    <?php if ( bbp_is_user_home() ) : ?>

            <?php if ( bbp_is_favorites() ) : ?>

                <span class="bbp-row-actions order-2 mt-1">

					<?php do_action( 'bbp_theme_before_topic_favorites_action' ); ?>

                    <?php bbp_topic_favorite_link( array( 'before' => '', 'favorite' => '+', 'favorited' => 'Unfavorite' ) ); ?>

                    <?php do_action( 'bbp_theme_after_topic_favorites_action' ); ?>

				</span>

            <?php elseif ( bbp_is_subscriptions() ) : ?>

                <span class="bbp-row-actions order-2 mt-1">

					<?php do_action( 'bbp_theme_before_topic_subscription_action' ); ?>

                    <?php bbp_topic_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => 'Unsubscribe' ) ); ?>

                    <?php do_action( 'bbp_theme_after_topic_subscription_action' ); ?>

				</span>

            <?php endif; ?>

        <?php endif; ?>

      <div class="d-flex align-items-start flex-column">
        <?php do_action( 'bbp_theme_before_topic_title' ); ?>
        <a class="recent-debates__single-title" href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a>
        <?php
        if (is_front_page()) :
            echo '<a href="' . bbp_get_forum_permalink( bbp_get_topic_forum_id() ) . '" class="debate-tag">' . bbp_get_forum_title( bbp_get_topic_forum_id() ) . '</a>';
        endif;
        ?>
        <span class="user-block__date">
                		<?php do_action( 'bbp_theme_before_topic_freshness_link' ); ?>

                		<?php bbp_topic_freshness_link(); ?>

                		<?php do_action( 'bbp_theme_after_topic_freshness_link' ); ?>
            </span>
      </div>

    </div>
    <div class="recent-debates__messages">
        <span><?php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?></span>
        <span class="recent-debates__label-mobile d-lg-none d-inline">indlæg</span>
    </div>
    <div class="user-block d-flex">
        <?php do_action('bbp_theme_before_topic_freshness_author'); ?>
        <?php bbp_author_link(array('post_id' => bbp_get_topic_last_active_id(), 'size' => 35, 'type' => 'avatar')); ?>
        <?php do_action('bbp_theme_after_topic_freshness_author'); ?>

        <div class="user-block__info d-flex flex-column justify-content-between">
            <span class="user-block__name">
                <?php bbp_author_link(array('post_id' => bbp_get_topic_last_active_id(), 'type' => 'name')); ?>
            </span>
        </div>
    </div>
</div>

