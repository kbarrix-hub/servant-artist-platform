<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Module:
 * SAP-108 Artist Admin
 *
 * Responsibility:
 * Register and manage the WordPress administration
 * interface for the Artists module.
 *
 * The Admin class contains no business logic.
 * All business operations are delegated to the
 * Artist Controller.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Artist_Admin
 *
 * Manages the Artist administration interface.
 *
 * @since 1.0.0
 */
final class SAP_Artist_Admin {

	/**
	 * Artist Controller.
	 *
	 * @var SAP_Artist_Controller
	 */
	private SAP_Artist_Controller $controller;

	/**
	 * Constructor.
	 *
	 * @param SAP_Artist_Controller $controller Artist controller.
	 */
	public function __construct(
		SAP_Artist_Controller $controller
	) {

		$this->controller = $controller;
	}

	/**
	 * Register WordPress admin hooks.
	 *
	 * @return void
	 */
	public function register(): void {

		add_action(
			'admin_menu',
			array( $this, 'register_menu' )
		);
	}

	/**
	 * Register the Artists administration menu.
	 *
	 * @return void
	 */
	public function register_menu(): void {

		add_menu_page(
			__( 'Artists', 'servant-artist-platform' ),
			__( 'Artists', 'servant-artist-platform' ),
			'manage_options',
			'sap-artists',
			array( $this, 'render_page' ),
			'dashicons-groups',
			30
		);
	}

	/**
	 * Render the Artists administration page.
	 *
	 * @return void
	 */
	public function render_page(): void {

		echo '<div class="wrap">';

		echo '<h1>';
		echo esc_html__( 'Artists', 'servant-artist-platform' );
		echo '</h1>';

		echo '<p>';
		echo esc_html__(
			'Artist administration interface coming soon.',
			'servant-artist-platform'
		);
		echo '</p>';

		echo '</div>';
	}

}