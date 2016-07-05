<?php 

	/*
		Plugin Name: Advanced Custom Fields: Reusable Field Group Field
		Plugin URI: https://github.com/Hube2/acf-reusable-field-group-field
		Description: Reuse Field Groups in Other Field Groups
		Version: 0.3.2
		Author: John Huebner
		Author URI: https://github.com/Hube2
		License: GPLv2 or later
		License URI: http://www.gnu.org/licenses/gpl-2.0.html
	*/
	
	load_plugin_textdomain('acf-reusable-field-group-field', false, dirname(plugin_basename(__FILE__)).'/lang/'); 
	
	// 2. Include field type for ACF5
	// $version = 5 and can be ignored until ACF6 exists
	function include_field_types_reusable_field_group_field($version) {
		//echo 'here'; die;
		include_once('acf-reusable-field-group-field-v5.php');
	}
	add_action('acf/include_field_types', 'include_field_types_reusable_field_group_field');	
	
	// 3. Include field type for ACF4
	/*
	function register_fields_reusable_field_group_field() {
		include_once('acf-reusable_field_group_field-v4.php');
	}
	add_action('acf/register_fields', 'register_fields_reusable_field_group_field');
	*/	
	
?>
