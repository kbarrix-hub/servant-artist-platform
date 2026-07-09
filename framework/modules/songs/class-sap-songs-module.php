<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-046.1
 * Songs Module
 *
 * Registers the Song Manager with the framework.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Songs_Module
 *
 * Song Manager module.
 *
 * @since 1.0.0
 */
final class SAP_Songs_Module extends SAP_Abstract_Module implements
	SAP_Navigation_Provider_Interface,
	SAP_Page_Provider_Interface {

	/**
	 * Register the module.
	 *
	 * @return void
	 */
	public function register(): void {}

	/**
	 * Boot the module.
	 *
	 * @return void
	 */
	public function boot(): void {}

	/**
	 * Register module assets.
	 *
	 * @return void
	 */
	public function assets(): void {}

	/**
	 * Return navigation items.
	 *
	 * @return array<int, array<string, mixed>>
	 */
	public function get_navigation_items(): array {

		return [
			[
				'slug'  => 'songs',
				'title' => 'Songs',
				'icon'  => 'music',
				'order' => 30,
				'url'   => admin_url( 'admin.php?page=sap-artist-portal&sap_page=songs' ),
			],
		];

	}

	/**
	 * Return pages provided by this module.
	 *
	 * @return array<int, SAP_Abstract_Page>
	 */
	public function get_pages(): array {

		return [
			new SAP_Song_Page( $this->services ),

			new SAP_Song_Library_Page(),

			new SAP_New_Song_Page(),
		];

	}

}