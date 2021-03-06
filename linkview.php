<?php
/*
Plugin Name: Link View 
Plugin URI: http://wordpress.org/extend/plugins/link-view/
Description: Display a link-list or link-slider in a post or page by using a shortcode.
Version: 0.3.0
Author: Michael Burtscher
Author URI: http://wordpress.org/extend/plugins/link-view/
License: GPLv2

A plugin for the blogging MySQL/PHP-based WordPress.
Copyright 2012 Michael Burtscher

This program is free software; you can redistribute it and/or
modify it under the terms of the GNUs General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You can view a copy of the HTML version of the GNU General Public
License at http://www.gnu.org/copyleft/gpl.html
*/

// general definitions
define( 'LV_URL', plugin_dir_url( __FILE__ ) );


// ADD ACTIONS AND SHORTCODES:
// for admin and frontpage:
add_action( 'widgets_init', 'on_lv_widgets' );
// for admin page only:
if ( is_admin() ) {
   add_action( 'admin_menu', 'on_lv_admin' ); // add admin pages in admin menu
}
// for frontpage only:
else {
   add_shortcode( 'linkview', 'on_lv_sc_linkview' ); // add shortcode [linkview]
}

function on_lv_widgets() {
	require_once( 'php/linkview_widget.php' );
	return register_widget( 'linkview_widget' );
}

function on_lv_admin() {
	require_once( 'php/admin.php' );
	add_submenu_page( 'link-manager.php', 'Link View', 'Link View', 'edit_posts', 'lv_admin_main', array( lv_admin, 'show_main' ) );
}

function on_lv_sc_linkview( $atts ) {
	require_once( 'php/sc_linkview.php' );
	return sc_linkview::show_html( $atts );
}
?>
