<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-012 View Renderer
 *
 * Responsibility:
 * Render SAP admin views inside the shared
 * Application Shell.
 *
 * The View Renderer coordinates presentation.
 * It does not contain business logic.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_View
 *
 * Responsible for rendering framework views.
 *
 * @since 1.0.0
 */
final class SAP_View {

	/**
	 * Prevent instantiation.
	 */
	private function __construct() {}

	/**
	 * Render a framework view.
	 *
	 * @param string            $view     View filename.
	 * @param SAP_Core_Services $services Framework services.
	 *
	 * @return void
	 */
	public static function render(
		string $view,
		SAP_Core_Services $services
	): void {

		/*
		 * Resolve the requested view.
		 */
		$current_view = SAP_PLUGIN_DIR . 'admin/views/' . $view . '.php';

		/*
		 * Retrieve navigation items.
		 */
		$navigation_items = $services
			->navigation()
			->get_navigation_items();

		/*
		 * Retrieve registered application routes.
		 *
		 * This will be consumed by the Application
		 * Shell in a future SAP milestone.
		 */
		$routes = $services
			->router()
			->get_routes();

		/*
		 * Future shell data.
		 */
		$current_user = wp_get_current_user();

		$page_title = '';

		$notifications = [];

		/*
		 * Render the application shell.
		 */
		require SAP_PLUGIN_DIR . 'admin/shell/app.php';

	}

}