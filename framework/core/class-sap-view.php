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
 * Render legacy SAP admin views inside the
 * shared Application Shell.
 *
 * The View Renderer coordinates presentation
 * for legacy modules only.
 *
 * Framework pages are rendered by the
 * Application Runtime and Application Shell.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_View
 *
 * Responsible for rendering legacy framework views.
 *
 * @since 1.0.0
 */
final class SAP_View {

	/**
	 * Prevent instantiation.
	 */
	private function __construct() {}

	/**
	 * Render a legacy framework view.
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
		 * Resolve the requested legacy view.
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
		 */
		$routes = $services
			->router()
			->get_routes();

		/*
		 * Shared shell data.
		 */
		$current_user = wp_get_current_user();

		$page_title = '';

		$current_page = sanitize_key(
			(string) ( $_GET['page'] ?? '' )
		);

		foreach ( $navigation_items as $index => $item ) {

			$is_active = false;

			if (
				isset( $item['url'], $item['title'] ) &&
				false !== strpos(
					(string) $item['url'],
					'page=' . $current_page
				)
			) {

				$page_title = (string) $item['title'];
				$is_active  = true;

			}

			$navigation_items[ $index ]['active'] = $is_active;

		}

		$notifications = [];

		/*
		 * Render the legacy application shell.
		 */
		require SAP_PLUGIN_DIR . 'admin/shell/app.php';

	}

}