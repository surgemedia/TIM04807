<?php namespace BEA\ACF_RFG;

/**
 * The purpose of the main class is to init all the plugin base code like :
 *  - Taxonomies
 *  - Post types
 *  - Shortcodes
 *  - Posts to posts relations etc.
 *  - Loading the text domain
 *
 * Class Main
 *
 * @package BEA\ACF_RFG
 */
class Main {
	/**
	 * Use the trait
	 */
	use Singleton;

	protected function init() {
		add_action( 'init', array( $this, 'register_option_page' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
	}

	/**
	 * Create a fake option page to register fields
	 * This "hack" is used in instance to reuse fields in flexible/repeater
	 *
	 * @author: Florian TIAR, Maxime CULEA
	 */
	public function register_option_page() {
		if( ! function_exists( 'acf_add_options_page' ) ) {
			return;
		}

		$page = array(
			'page_title'  => 'ACF Reusable Option Page',
			'menu_title'  => 'Fake Option Page for Reusable Fields',
			'menu_slug'   => 'bea-reusable-field-option',
			'capability'  => 'manage_options',
			'parent_slug' => 'edit.php?post_type=acf-field-group',
			'redirect'    => true,
			'post_id'     => 'options',
			'autoload'    => false,
		);
		acf_add_options_page( $page );
	}

	/**
	 * Load admin assets
	 *
	 * @author Maxime Culea
	 */
	function enqueue_admin_assets() {
		if( apply_filters( 'bea-acf-rfg-enable-style', true ) ){
			wp_enqueue_style( 'bea-acf-rfg-admin-style', BEA_ACF_RFG_URL . 'assets/admin.css' );
		}
	}
}