<?php
/*
 * Plugin Name: Admins only Jetpack
 * Description: Hides the Jetpack menu for all non-admin users
 * Author:      Andrija Naglic
 * Version:     1.2.0
 * Author URI:  https://upwork.com/fl/andrija
 * License:     GPL2+
 */

function jp_rm_menu() {
	if( class_exists( 'Jetpack' ) && ! current_user_can( 'manage_options' ) ) {
	
		remove_menu_page( 'jetpack' );
	}
}
add_action( 'admin_init', 'jp_rm_menu' ); 

function jp_rm_icon() {
	if( class_exists( 'Jetpack' ) && ! current_user_can( 'manage_options' ) ) {
	
		echo PHP_EOL . '
            <style type="text/css" media="screen">
                #wp-admin-bar-notes { display: none; }
                #jetpack_summary_widget { display: none; }
                .a8c-faux-inline-help { display: none; }
            </style>
        ' . PHP_EOL;
	}
}
add_action( 'admin_head', 'jp_rm_icon' );

