<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Module:
 * SAP-109 Artist REST
 *
 * Responsibility:
 * Register and manage REST API endpoints
 * for the Artists module.
 *
 * The REST layer delegates all business
 * operations to the Artist Controller.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Artist_REST
 *
 * Registers Artist REST endpoints.
 *
 * @since 1.0.0
 */
final class SAP_Artist_REST {

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
	 * Register REST hooks.
	 *
	 * @return void
	 */
	public function register(): void {

		add_action(
			'rest_api_init',
			array( $this, 'register_routes' )
		);
	}

	/**
	 * Register REST routes.
	 *
	 * @return void
	 */
	public function register_routes(): void {

		register_rest_route(
			'servant-artist-platform/v1',
			'/artists',
			array(
				'methods'             => 'GET',
				'callback'            => array( $this, 'list_artists' ),
				'permission_callback' => '__return_true',
			)
		);
	}

	/**
	 * List Artists.
	 *
	 * Placeholder implementation.
	 *
	 * @param WP_REST_Request $request REST request.
	 *
	 * @return WP_REST_Response
	 */
	public function list_artists(
		WP_REST_Request $request
	): WP_REST_Response {

		unset( $request );

		return new WP_REST_Response(
			array(
				'success' => true,
				'message' => 'Artists endpoint coming soon.',
			),
			200
		);
	}

}