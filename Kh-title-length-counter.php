<?php
/*
Plugin Name:  Title Length Counter
Plugin URI:   https: //github.com/Khatybov/WP-Title-Length-Counter
Author:       Igor Khatybov
Version:      1.0
Text Domain:  kh-title-length-counter
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
Description: A very simple plugin that: - Counts the number of characters of a post title;  - Adds the number to the end of the title;   - Does nothing if the title is empty;     - Does nothing if the current page is in the admin area
 */

// disable direct file access
if (!defined('ABSPATH')) {

    exit;

}

// check if the current screen belongs to the admin area
if (!is_admin()) {

    // the function itself, which handles the title
    // $title - the post title (wow...)
    function kh_title_length_counter($title)
    {
        // Get the title length
        $length = strlen($title);

        // Format result if the title is not empty
        // Do nothing if the title is empty
        $length = $length ? " ($length)" : "";

        // return the result
        return $title . $length;
    }

    // call the function when about to show the title
    add_filter("the_title", "kh_title_length_counter");
}
