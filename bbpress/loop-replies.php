<?php

/**
 * Replies Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_replies_loop' ); ?>

<ul id="topic-<?php bbp_topic_id(); ?>-replies" class="forums bbp-replies">

	<li class="bbp-body">

		<?php if ( bbp_thread_replies() ) : ?>
            <?php $args = array(
                'walker'       => new BBP_Walker_Forum_Reply(),
                'max_depth'    => bbp_thread_replies_depth(),
                'style'        => 'ul',
                'callback'     => null,
                'end_callback' => null,
                'page'         => 1,
                'per_page'     => -1
            )
	?>
			<?php bbp_list_replies($args); ?>

		<?php else : ?>
            <?php $first_item = 1;?>
			<?php while ( bbp_replies() ) : bbp_the_reply(); ?>
                <?php if ($first_item == 1) : ?>
                    <?php $first_item = 0; ?>
				<?php bbp_get_template_part( 'loop', 'single-reply-first' ); ?>

            <div class="replies">
                <?php else : ?>

				    <?php bbp_get_template_part( 'loop', 'single-reply' ); ?>

                <?php endif; ?>

			<?php endwhile; ?>
            <?php

            if (bbp_get_topic_id() > 2792430) { ; ?>
<div class="bbp-pagination">
	<div class="bbp-pagination-count"><?php  ?></div>
	<div class="bbp-pagination-links">
        <?php
        echo paginate_links(
            array(
                'base' => get_the_permalink().'/?paged=%#%',
                'format'    =>'%#%',
                //'current' => $_GET['paged'],
                'total'     => bbp_get_topic_reply_count(bbp_get_topic_id())/15 + 1,
                'prev_next' => true,

            )
        ); ?>

    </div>
</div>
            <?php
            } else {
                bbp_get_template_part( 'pagination', 'replies' );
            }

            // bbp_get_template_part( 'pagination', 'replies' ); ?>
            </div>
		<?php endif; ?>

	</li><!-- .bbp-body -->
    
</ul><!-- #topic-<?php bbp_topic_id(); ?>-replies -->
<?php
if (!wp_is_mobile()) {
    echo '<div id="cncpt-dsk_rec2"></div>';
}
?>
<?php do_action( 'bbp_template_after_replies_loop' );
