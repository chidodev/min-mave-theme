<?php

/**
 * Single User Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<div id="bbpress-forums" class="bbpress-wrapper forum-user forum-user-info custom-item-container">

	<?php do_action( 'bbp_template_notices' ); ?>

	<?php do_action( 'bbp_template_before_user_wrapper' ); ?>
    <div class="profile__sidebar-mobile">
        <div class="d-flex align-items-center">
            <div id="bbp-user-avatar">
                <span class='vcard'>
                    <a class="url fn n" href="<?php bbp_user_profile_url(); ?>" title="<?php bbp_displayed_user_field( 'display_name' ); ?>" rel="me">
                        <?php echo get_avatar( bbp_get_displayed_user_field( 'user_email', 'raw' ), apply_filters( 'bbp_single_user_details_avatar_size', 45 ) ); ?>
                    </a>
                </span>
            </div>
            <h2 class="entry-title ml-2">@<?php bbp_displayed_user_field( 'user_nicename' ); ?></h2>
        </div>
        <div class="custom-select-block load mt-2">
            <span class="custom-select-block__value">Checking page...</span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="14.546" height="8.173" viewBox="0 0 14.546 8.173">
                    <g id="nav-arrow-down" transform="translate(-4.727 -7.727)">
                        <g transform="translate(6 9)">
                            <path data-name="Контур 4" d="M6,9l6,6,6-6" transform="translate(-6 -9)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/>
                        </g>
                    </g>
                </svg>
            </span>
            <div class="custom-dropdown">
                <input type="hidden">
                <div class="d-flex flex-column">
                    <div class="custom-dropdown__item <?php if ( bbp_is_single_user_profile() ) :?>selected<?php endif; ?>">
                        <span class="vcard bbp-user-profile-link">
                            <a class="url fn n" href="<?php bbp_user_profile_url(); ?>" title="<?php printf( esc_attr__( "%s's Profile", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>" rel="me"><?php esc_html_e( 'Profile', 'bbpress' ); ?></a>
                        </span>
                    </div>

                    <div class="custom-dropdown__item <?php if ( bbp_is_single_user_topics() ) :?>selected<?php endif; ?>">
                        <span class='bbp-user-topics-created-link'>
                            <a href="<?php bbp_user_topics_created_url(); ?>" title="<?php printf( esc_attr__( "%s's Topics Started", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Topics Started', 'bbpress' ); ?></a>
                        </span>
                    </div>

                    <div class="custom-dropdown__item <?php if ( bbp_is_single_user_replies() ) :?>selected<?php endif; ?>">
                        <span class='bbp-user-replies-created-link'>
                            <a href="<?php bbp_user_replies_created_url(); ?>" title="<?php printf( esc_attr__( "%s's Replies Created", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Replies Created', 'bbpress' ); ?></a>
                        </span>
                    </div>

                    <?php if ( bbp_is_engagements_active() ) : ?>
                        <div class="custom-dropdown__item <?php if ( bbp_is_single_user_engagements() ) :?>selected<?php endif; ?>">
                            <span class='bbp-user-engagements-created-link'>
                                <a href="<?php bbp_user_engagements_url(); ?>" title="<?php printf( esc_attr__( "%s's Engagements", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Engagements', 'bbpress' ); ?></a>
                            </span>
                        </div>
                    <?php endif; ?>

                    <?php if ( bbp_is_favorites_active() ) : ?>
                        <div class="custom-dropdown__item <?php if ( bbp_is_favorites() ) :?>selected<?php endif; ?>">
                            <span class="bbp-user-favorites-link">
                                <a href="<?php bbp_favorites_permalink(); ?>" title="<?php printf( esc_attr__( "%s's Favorites", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Favorites', 'bbpress' ); ?></a>
                            </span>
                        </div>
                    <?php endif; ?>

                    <?php if ( bbp_is_user_home() || current_user_can( 'edit_user', bbp_get_displayed_user_id() ) ) : ?>

                        <?php if ( bbp_is_subscriptions_active() ) : ?>
                            <div class="custom-dropdown__item <?php if ( bbp_is_subscriptions() ) :?>selected<?php endif; ?>">
                                <span class="bbp-user-subscriptions-link">
                                    <a href="<?php bbp_subscriptions_permalink(); ?>" title="<?php printf( esc_attr__( "%s's Subscriptions", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Subscriptions', 'bbpress' ); ?></a>
                                </span>
                            </div>
                        <?php endif; ?>

                        <div class="custom-dropdown__item <?php if ( bbp_is_single_user_edit() ) :?>selected<?php endif; ?>">
                            <span class="bbp-user-edit-link">
                                <a href="<?php bbp_user_profile_edit_url(); ?>" title="<?php printf( esc_attr__( "Edit %s's Profile", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Edit', 'bbpress' ); ?></a>
                            </span>
                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

	<div id="bbp-user-wrapper">

		<?php bbp_get_template_part( 'user', 'details' ); ?>

		<div id="bbp-user-body">
			<?php if ( bbp_is_favorites()               ) bbp_get_template_part( 'user', 'favorites'       ); ?>
			<?php if ( bbp_is_subscriptions()           ) bbp_get_template_part( 'user', 'subscriptions'   ); ?>
			<?php if ( bbp_is_single_user_engagements() ) bbp_get_template_part( 'user', 'engagements'     ); ?>
			<?php if ( bbp_is_single_user_topics()      ) bbp_get_template_part( 'user', 'topics-created'  ); ?>
			<?php if ( bbp_is_single_user_replies()     ) bbp_get_template_part( 'user', 'replies-created' ); ?>
			<?php if ( bbp_is_single_user_edit()        ) bbp_get_template_part( 'form', 'user-edit'       ); ?>
			<?php if ( bbp_is_single_user_profile()     ) bbp_get_template_part( 'user', 'profile'         ); ?>
		</div>
	</div>

	<?php do_action( 'bbp_template_after_user_wrapper' ); ?>

</div>
