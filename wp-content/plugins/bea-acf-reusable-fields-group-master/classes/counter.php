<?php namespace BEA\ACF_RFG;

/**
 * Class Counter
 *
 * Mainly usage is for front while using group field plugin
 * This allow to compose complex keys depending on the row and block loop
 *
 * @package BEA\ACF_RFG
 * @author  Maxime CULEA
 */
class Counter {

	static public $row = 0;
	static public $block = 0;

	/**
	 * Increment the block counter
	 *
	 * @author Maxime CULEA
	 */
	public static function increment_row() {
		self::$row ++;
	}

	/**
	 * Set the row counter to 0
	 *
	 * @author Maxime CULEA
	 */
	public static function reset_row() {
		self::$row = 0;
	}

	/**
	 * Increment the block counter
	 *
	 * @author Maxime CULEA
	 */
	public static function increment_block() {
		self::$block ++;
	}

	/**
	 * Set the block counter to 0
	 *
	 * @author Maxime CULEA
	 */
	public static function reset_block() {
		self::$block = 0;
	}

	/**
	 * Get the composed key name for group field usage when in a flexible (block) which is in a flexible (row)
	 *
	 * @param string $row_name : Default to "rows" which is the row key name
	 * @param        $block_name : The block key name
	 * @param        $group_field_name : The group field name
	 * @param        $key : : The field key name to be retrieved
	 *
	 * ex : rows_3_left_0_documents_title
	 *
	 * @return string
	 * @author Maxime CULEA
	 */
	public static function get_key( $block_name, $group_field_name, $key, $row_name = 'rows' ) {
		return implode( '_',
			[
				$row_name,
				self::$row,
				$block_name,
				self::$block,
				$group_field_name,
				$key,
			]
		);
	}

	/**
	 * Get field with the get key method
	 *
	 * @param        $block_name
	 * @param        $group_field_name
	 * @param        $key
	 * @param string $row_name
	 *
	 * @return bool
	 * @author Maxime CULEA
	 */
	public static function get_field( $block_name, $group_field_name, $key, $row_name = 'rows' ) {
		if( ! function_exists( 'get_field' ) ) {
			return false;
		}
		return get_field( self::get_key( $block_name, $group_field_name, $key, $row_name ) );
	}

	/**
	 * Generate an unique id like : {id_prefix}-{post_id}-{row}-{block}
	 * @param $id_prefix
	 * @param $post_id
	 *
	 * @return string
	 * @author Maxime CULEA
	 */
	public static function generate_unique_id( $id_prefix = 'video-player', $post_id = 0 ) {
		$id_args = [ $id_prefix ];

		/**
		 * Use given id or get the ID in the loop.
		 * If not in a loop, generate a random id between 1~1000
		 */
		if ( empty( $post_id ) ) {
			$p_id = get_the_ID();
			$post_id = empty( $p_id ) ? rand( 1, 1000 ) : $p_id;
		}
		$id_args[] = (int) $post_id;

		/**
		 * Not necessary in a row yet
		 */
		if ( ! is_null( self::$row ) ) {
			$id_args[] = self::$row + 1;
		}

		/**
		 * Not necessary in a block yet
		 */
		if ( ! is_null( self::$block ) ) {
			$id_args[] = self::$block + 1;
		}
		return implode( '-', $id_args );
	}
}