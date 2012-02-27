<?php

// This class handles all available admin pages
class admin {

	// show the main admin page as a submenu of "Links"
	public static function show_main() {
		if (!current_user_can('edit_posts'))  {
			wp_die( __('You do not have sufficient permissions to access this page.') );
		}
		require_once('sc_linkview.php');

		$out ='
			<div class="wrap nosubsub" style="padding-bottom:15px">
			<div id="icon-link-manager" class="icon32"><br /></div><h2>Link View</h2>
			</div>
			<h4>Usage of the <code>[linkview]</code> shortcode</h4>
			<div style="padding:0 15px">
				<p>Link View works using a "shortcode". Shortcodes are snippets of pseudo code that are placed in blog posts or pages to easily render HTML output.</p>
				<p>The following is the basic form of the Link View shortcode:</p>
				<p><code>[linkview]</code></p>
				<p></p>
				<p>To facilitate customization of shortcodes, attributes are used. The <code>[linkview]</code> shortcode including the attribute called "cat_name" looks like this:</p>
				<p><code>[linkview cat_name=Sponsors]</code></p>
				<p>Below is a list of all the supported attributes with their descriptions and available options:</p>
				<style type="text/css">
					<!--
					#lvadmintable {border:1px solid #aaa;border-collapse:collapse}
					#lvadmintable th {border:1px solid #aaa;padding:3px 4px;background:#eeeeee;}
					#lvadmintable td {border:1px solid #aaa;padding:4px 5px;vertical-align: top}
					-->
				</style>
				<table id="lvadmintable">
					<tr>
						<th>Attribute name</th>
						<th>Value options</th>
						<th>Default value</th> 
						<th>Description</th>
					</tr>';

		foreach( sc_linkview::$attr as $aname => $a ) {
			$out .= '
					<tr>
						<td>'.$aname.'</td>
						<td>'.$a['val'].'</td>
						<td>'.$a['std_val'].'</td>
						<td>'.$a['desc'].'</td>
					</tr>';
		}
		$out .= '
				</table>
				<p>In this early version there are only these 2 attributes available. More attributes will be added in a later release.</p>
			</div>';
		echo $out;
	}
}
?>