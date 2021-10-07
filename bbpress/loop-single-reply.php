<?php

/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<div id="post-<?php bbp_reply_id(); ?>" class="bbp-reply-header">
  <div class="bbp-meta d-flex justify-content-between flex-wrap">
    <!--		<span class="bbp-reply-post-date">--><?php //bbp_reply_post_date(); ?><!--</span>-->

    <?php if ( bbp_is_single_user_replies() ) : ?>

      <span class="bbp-header">
				<?php esc_html_e( 'in reply to: ', 'bbpress' ); ?>
				<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a>
			</span>

    <?php endif; ?>

    <!--		<a href="--><?php //bbp_reply_url(); ?><!--" class="bbp-reply-permalink">#--><?php //bbp_reply_id(); ?><!--</a>-->

    <?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>

<!--    --><?php //bbp_reply_admin_links(); ?>

    <?php do_action( 'bbp_theme_after_reply_admin_links' ); ?>

  </div><!-- .bbp-meta -->
</div><!-- #post-<?php bbp_reply_id(); ?> -->

<div class="custom-item-container">
  <div  <?php bbp_reply_class(); ?>>
    <div class="forums-list__topic d-flex flex-column flex-md-row">
      <div class="user-block d-flex flex-md-column justify-content-between justify-content-md-start">
        <div class="d-flex flex-md-column align-items-center">
          <div class="user-block__avatar">
            <?php
            echo bbp_reply_author_link(array('type' => 'avatar', 'size'=>'70'));
            ?>
          </div>
          <div class="user-block__info d-flex flex-column justify-content-between">
                    <span class="user-block__name text-md-center">
                        <?php bbp_reply_author_link( array( 'type' => 'name', 'show_role' => false ) ); ?>
                        <?php //the_author(); ?>
                    </span>
          </div>
        </div>
        <div class="user-block__likes d-flex align-items-center justify-content-md-center">
          <div class="bbp-reply-author">
            <!---->
            <?php do_action( 'bbp_theme_before_reply_author_details' ); ?>
            <!---->
            <!--            --><?php //bbp_reply_author_link( array( 'show_role' => true ) ); ?>
            <!---->
            <!--            --><?php //if ( current_user_can( 'moderate', bbp_get_reply_id() ) ) : ?>
            <!---->
            <?php do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>
            <!---->
            <!--                <div class="bbp-reply-ip">--><?php //bbp_author_ip( bbp_get_reply_id() ); ?><!--</div>-->
            <!---->
            <?php do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>
            <!---->
            <!--            --><?php //endif; ?>
            <!---->
            <?php do_action( 'bbp_theme_after_reply_author_details' ); ?>
            <!---->
          </div> <!-- .bbp-reply-author-->
        </div>
      </div>
      <div class="forums-list__description d-flex flex-column justify-content-between">
        <div>
                    <span class="user-block__date d-block">
                        <?php echo bbp_reply_post_date('j F Y, H:i'); ?>
                    </span>
          <div class="reply-text">
              <p><?php bbp_reply_content(); ?></p>
          </div>
        </div>
        <div class="text-right d-flex justify-content-end align-items-center">
          <a href="#" post-id="<?php bbp_reply_id(); ?>" class="report-post-link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/warn.svg" alt="warning">
          </a>
          <?php echo bbp_get_reply_to_link(); ?>
        </div>
      </div>
    </div>

  </div><!-- .reply -->
</div>
