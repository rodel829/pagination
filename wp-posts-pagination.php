<?php
/**
 * Widget Name: WP Post Pagination
 * Widget ID: wp-posts-pagination
 * Author: Eteam.dk
 * Author URI: http://eteam.dk
 */

class Wp_Post_Pagination_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'wp-posts-pagination',
			esc_html__( 'WP Post Pagination', 'kickass' ),
			array(
				'description' => esc_html__( 'WP Post Pagination.', 'kickass' )
			),
			array(),
			array(
			'count_num' => array(
				'type' 	=> 'text',
				'label' => esc_html__( 'Home many pagination', 'kickass' ),
				),
			),
			THEME_NAME_WIDGET_FOLDER_URI
		);
	}

	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'wp-posts-pagination-style',
					THEME_NAME_WIDGET_FOLDER_URI . basename( dirname( __FILE__ ) ) . '/css/style.css',
					array(),
					KICKASS_VERSION
				),
				array(
					'wp-posts-pagination-fonts',
					THEME_NAME_WIDGET_FOLDER_URI . basename( dirname( __FILE__ ) ) . '/fonts/fonts.css',
					array(),
					KICKASS_VERSION
				),
			)
		);

		$this->register_frontend_scripts(
			array(
				array(
					'wp-posts-pagination-script',
					THEME_NAME_WIDGET_FOLDER_URI . basename( dirname( __FILE__ ) ) . 'js/script.js',
					array( 'jquery' ),
					KICKASS_VERSION
				)
			)
		);
	}
}
siteorigin_widget_register( 'wp-posts-pagination', __FILE__, 'Wp_Post_Pagination_Widget' );
