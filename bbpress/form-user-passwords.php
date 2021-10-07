<?php

/**
 * User Password Generator
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

// Filters the display of the password fields
if ( apply_filters( 'show_password_fields', true, bbpress()->displayed_user ) ) : ?>

<div id="password" class="user-pass1-wrap">

	<fieldset class="bbp-form">
		<div class="password-input-wrapper">
            <div class="custom-input">
                <label for="pass1"><?php esc_html_e( 'Password', 'bbpress' ); ?></label>
                <input type="password" name="pass1" id="pass1" class="regular-text" value="" autocomplete="off" data-pw="<?php echo esc_attr( wp_generate_password( 24 ) ); ?>" aria-describedby="pass-strength-result" />
            </div>
		</div>

		<span class="password-button-wrapper">
			<button type="button" class="button wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="<?php esc_attr_e( 'Hide password', 'bbpress' ); ?>">
				<span class="dashicons dashicons-visibility"></span>
				<!-- <span class="text"><?php esc_html_e( 'Hide', 'bbpress' ); ?></span> -->
			</button>
		</span>

		<div style="display:none" id="pass-strength-result" aria-live="polite"></div>
	</fieldset>
</div>


<div class="password-input-wrapper">
    <div class="custom-input">
        <label for="repeat-pass"><?php esc_html_e( 'Repeat New Password', 'bbpress' ); ?></label>
        <input type="password" name="pass2" id="repeat-pass" class="regular-text" value="" autocomplete="off"  />
    </div>
    <p class="password-description"><?php esc_html_e( 'Type your new password again.', 'bbpress' ); ?></p>
</div>

<div class="pw-weak">
<!--	<label for="pw_weak">--><?php //esc_html_e( 'Confirm', 'bbpress' ); ?><!--</label>-->
<!--	<input type="checkbox" name="pw_weak" class="pw-checkbox checkbox" />-->
<!--	<p class="description indicator-hint">--><?php //echo wp_get_password_hint(); ?><!--</p>-->
</div>

<?php endif;
