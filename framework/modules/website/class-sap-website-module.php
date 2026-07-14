<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-060.2
 * Website Module
 *
 * Registers the Website feature with the framework.
 *
 * @package ServantArtistPlatform
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Website_Module extends SAP_Abstract_Module implements SAP_Navigation_Provider_Interface, SAP_Page_Provider_Interface {

	/**
	 * Return the module slug.
	 *
	 * @return string
	 */
	public function get_slug(): string {

		return 'website';

	}

	/**
	 * Return the module name.
	 *
	 * @return string
	 */
	public function get_name(): string {

		return 'Website';

	}

	/**
	 * Return the module's primary page.
	 *
	 * @return SAP_Page_Interface
	 */
	public function get_page(): SAP_Page_Interface {

		return new SAP_Website_Page();

	}

	/**
	 * Return the framework pages provided by this module.
	 *
	 * @return array<int, SAP_Page_Interface>
	 */
	public function get_pages(): array {

		return [
			new SAP_Website_Page(),
		];

	}

	/**
	 * Return the navigation items provided by this module.
	 *
	 * @return array<int, array<string, mixed>>
	 */
	public function get_navigation_items(): array {

		return [
			[
				'slug'  => 'website',
				'title' => 'Website',
				'icon'  => 'layout',
				'order' => 40,
				'url'   => admin_url(
					'admin.php?page=sap-artist-portal&sap_page=website'
				),
			],
		];

	}

}