<?php
/*
 Plugin Name: BEA - ACF Reusable field groups
 Version: 1.0.5
 Plugin URI: http://www.beapi.fr
 Description: Expend the way of using the mvpdesign/acf-reusable-field-group plugin by adding a fake option page that permit to reuse field groups everywhere and especially in ACF flexible & repeater fields.
 Author: BE API Technical team
 Author URI: http://www.beapi.fr
 Domain Path: languages
 Text Domain: bea-acf-rfg
 Depends: Advanced Custom Fields PRO, Advanced Custom Fields: Reusable Field Group
 ----

 Copyright 2016 BE API Technical team (human@beapi.fr)

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Plugin constants
define( 'BEA_ACF_RFG_VERSION', '1.0.5' );
define( 'BEA_ACF_RFG_MIN_PHP_VERSION', '5.4' );

// Plugin URL and PATH
define( 'BEA_ACF_RFG_URL', plugin_dir_url( __FILE__ ) );
define( 'BEA_ACF_RFG_DIR', plugin_dir_path( __FILE__ ) );

// Check PHP min version
if ( version_compare( PHP_VERSION, BEA_ACF_RFG_MIN_PHP_VERSION, '<' ) ) {
	require_once( BEA_ACF_RFG_DIR . 'compat.php' );

	// possibly display a notice, trigger error
	add_action( 'admin_init', array( 'BEA\ACF_RFG\Compatibility', 'admin_init' ) );

	// stop execution of this file
	return;
}

/**
 * Autoload all the things \o/
 */
require_once BEA_ACF_RFG_DIR . 'autoload.php';

add_action( 'plugins_loaded', 'init_bea_acf_rfg_plugin' );
/**
 * Init the plugin
 */
function init_bea_acf_rfg_plugin() {
	\BEA\ACF_RFG\Main::get_instance();
}
