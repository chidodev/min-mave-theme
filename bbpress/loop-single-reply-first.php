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

<div class="first-topic-reply custom-item-container">
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
          <div class="d-flex justify-content-sm-between flex-column flex-sm-row align-items-sm-center">
            <span class="user-block__date order-2 order-sm-0">
                <?php echo get_the_date('j F Y, H:i'); ?>
            </span>
              <div class="forums-list__controls mb-3 mb-sm-0 text-center text-sm-left d-flex flex-wrap justify-content-center">
                  <?php bbp_topic_subscription_link(); ?>
                  <?php bbp_topic_favorite_link(); ?>
            </div>
          </div>
          <p><?php bbp_reply_content(); ?></p>
        </div>
        <div class="text-right d-flex justify-content-end align-items-center">
          <a href="#" post-id="<?php bbp_reply_id(); ?>" class="report-post-link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/warn.svg" alt="warning">
          </a>
            <?php
            if ( ! check_user_role ('bbp_spectator') ) {
                if ( is_user_logged_in() ) {
                    echo ' <a role="button" href="#new-post" class="bbp-topic-reply-link" rel="nofollow">Reply</a>';
                } else {
                    echo ' <a role="button" href="/login" class="bbp-topic-reply-link" rel="nofollow">Reply</a>';
                }
            }
            ?>

        <?php //echo bbp_get_reply_to_link(); ?>
        </div>
      </div>
    </div>

    <!---->
    <!--        <div class="bbp-reply-content">-->
    <!---->
    <!--            --><?php //do_action( 'bbp_theme_before_reply_content' ); ?>
    <!---->
    <!--            --><?php //bbp_reply_content(); ?>
    <!---->
    <!--            --><?php //do_action( 'bbp_theme_after_reply_content' ); ?>
    <!---->
    <!--	</div> .bbp-reply-content -->
  </div><!-- .reply -->
</div>
<?php //if ( is_user_logged_in() ) { ?>


    <div class="d-flex flex-column justify-content-center add-forum-block">
        <?php
        if (!wp_is_mobile()) {
            echo '<div id="cncpt-outstream"></div>';
        } else {
            echo '<div id="cncpt-mob2"></div>';

        }
        ?>

    <div class="d-flex align-items-center flex-column add-forum-block">
        <a class="forums-list__add-new custom-btn text-center" href="#new-post">
            <span>+</span>
            <span>
                                        Deltag i debatten
                                    </span>
        </a>
    </div>

<?php //} ?>
<?php //bbp_get_template_part( 'pagination', 'replies'); ?>
