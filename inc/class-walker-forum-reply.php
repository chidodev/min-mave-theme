<?php

class BBP_Walker_Forum_Reply extends Walker
{

    /**
     * @see Walker::$tree_type
     *
     * @since 2.4.0 bbPress (r4944)
     *
     * @var string
     */
    public $tree_type = 'reply';

    /**
     * @see Walker::$db_fields
     *
     * @since 2.4.0 bbPress (r4944)
     *
     * @var array
     */
    public $db_fields = array(
        'parent' => 'reply_to',
        'id' => 'ID'
    );

    /**
     * Confirm the tree_type
     *
     * @since 2.6.0 bbPress (r5389)
     */
    public function __construct()
    {
        $this->tree_type = bbp_get_reply_post_type();
    }

    /**
     * @param string $output Passed by reference. Used to append additional content
     * @param int $depth Depth of reply
     * @param array $args Uses 'style' argument for type of HTML list
     * @since 2.4.0 bbPress (r4944)
     *
     * @see Walker::start_lvl()
     *
     */
    public function start_lvl(&$output = '', $depth = 0, $args = array())
    {
        bbpress()->reply_query->reply_depth = (int)$depth + 1;

        switch ($args['style']) {
            case 'div':
                break;
            case 'ol':
                $output .= "<ol class='bbp-threaded-replies'>\n";
                break;
            case 'ul':
            default:
                $output .= "<ul class='bbp-threaded-replies'>\n";
                break;
        }
    }

    /**
     * @param string $output Passed by reference. Used to append additional content
     * @param int $depth Depth of reply
     * @param array $args Will only append content if style argument value is 'ol' or 'ul'
     * @since 2.4.0 bbPress (r4944)
     *
     * @see Walker::end_lvl()
     *
     */
    public function end_lvl(&$output = '', $depth = 0, $args = array())
    {
        bbpress()->reply_query->reply_depth = (int)$depth + 1;

        switch ($args['style']) {
            case 'div':
                break;
            case 'ol':
                $output .= "</ol>\n";
                break;
            case 'ul':
            default:
                $output .= "</ul>\n";
                break;
        }
    }

    /**
     * @since 2.4.0 bbPress (r4944)
     */
    public function display_element($element = false, &$children_elements = array(), $max_depth = 0, $depth = 0, $args = array(), &$output = '')
    {

        if (empty($element)) {
            return;
        }

// Get element's id
        $id_field = $this->db_fields['id'];
        $id = $element->$id_field;

// Display element
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);

// If we're at the max depth and the current element still has children, loop over those
// and display them at this level to prevent them being orphaned to the end of the list.
        if (($max_depth <= (int)$depth + 1) && isset($children_elements[$id])) {
            foreach ($children_elements[$id] as $child) {
                $this->display_element($child, $children_elements, $max_depth, $depth, $args, $output);
            }
            unset($children_elements[$id]);
        }
    }

    /**
     * @see Walker:start_el()
     *
     * @since 2.4.0 bbPress (r4944)
     */
    public function start_el(&$output, $object, $depth = 0, $args = array(), $current_object_id = 0)
    {
        static $column = 1;

// Set up reply
        $depth++;
        bbpress()->reply_query->reply_depth = (int)$depth;
        bbpress()->reply_query->post = $object;
        bbpress()->current_reply_id = $object->ID;

// Check for a callback and use it if specified
        if (!empty($args['callback'])) {
            ob_start();
            call_user_func($args['callback'], $object, $args, $depth);
            $output .= ob_get_clean();
            return;
        }

// Style for div or list element
        if (!empty($args['style']) && ('div' === $args['style'])) {
            $output .= "<div>\n";
        } else {
            $output .= "<li>\n";
        }

        if (($depth > 0)&&($column == 1)) {
            $column++;
            $output .= bbp_buffer_template_part('loop', 'single-reply-first', false);
        } else {
            $column++;
            $output .= bbp_buffer_template_part('loop', 'single-reply', false);
        }


    }

    /**
     * @since 2.4.0 bbPress (r4944)
     */
    public function end_el(&$output = '', $object = false, $depth = 0, $args = array())
    {

        // Check for a callback and use it if specified
        if (!empty($args['end-callback'])) {
            ob_start();
            call_user_func($args['end-callback'], $object, $args, $depth);
            $output .= ob_get_clean();
            return;
        }

        // Style for div or list element
        if (!empty($args['style']) && ('div' === $args['style'])) {
            $output .= "</div>\n";
        } else {
            $output .= "</li>\n";
        }
    }
}