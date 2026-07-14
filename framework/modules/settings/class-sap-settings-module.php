<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-009 Settings Module
 *
 * Responsibility:
 * Register and manage framework settings.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Settings_Module
 *
 * Registers and manages framework settings.
 *
 * @since 1.0.0
 */
final class SAP_Settings_Module extends SAP_Abstract_Module implements SAP_Navigation_Provider_Interface, SAP_Page_Provider_Interface {

	/**
	 * Module identifier.
	 *
	 * @var string
	 */
	protected string $id = 'settings';

	/**
	 * Module display name.
	 *
	 * @var string
	 */
	protected string $name = 'Settings';

	/**
	 * Register the module.
	 *
	 * @return void
	 */
	public function register(): void {

		// Future settings hooks.

	}

	/**
	 * Boot the module.
	 *
	 * @return void
	 */
	public function boot(): void {

		// Future initialization.

	}

	/**
	 * Register module assets.
	 *
	 * @return void
	 */
	public function assets(): void {

		// Future assets.

	}

	/**
	 * Return the module's primary page.
	 *
	 * @return SAP_Page_Interface
	 */
	public function get_page(): SAP_Page_Interface {

		return new SAP_Settings_Page();

	}

	/**
	 * Return the framework pages provided by this module.
	 *
	 * @return array<int, SAP_Page_Interface>
	 */
	public function get_pages(): array {

		return [
			new SAP_Settings_Page(),
		];

	}

	/**
	 * Return the navigation items provided by this module.
	 *
	 * @since 1.0.0
	 *
	 * @return array<int, array<string, mixed>>
	 */
	public function get_navigation_items(): array {

		return [
			[
				'slug'  => 'settings',
				'title' => 'Settings',
				'icon'  => 'settings',
				'order' => 900,
				'url' => admin_url( 'admin.php?page=sap-artist-portal&sap_page=settings' ),
			],
		];

	}

}