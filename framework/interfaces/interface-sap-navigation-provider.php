<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-012A Navigation Provider Interface
 *
 * Responsibility:
 * Defines the contract for modules that contribute
 * navigation items to the SAP Application Shell.
 *
 * Modules implementing this interface may register one
 * or more navigation entries. The Navigation Manager
 * aggregates these entries to build the application
 * sidebar dynamically.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Interface SAP_Navigation_Provider_Interface
 *
 * Implement this interface on any module that should
 * expose navigation items within the SAP Application Shell.
 *
 * @since 1.0.0
 */
interface SAP_Navigation_Provider_Interface {

	/**
	 * Return the navigation items provided by the module.
	 *
	 * Each item must contain:
	 *
	 * - slug   Unique identifier
	 * - title  Display label
	 * - icon   Icon identifier (Lucide name)
	 * - order  Sort order
	 * - url    Destination URL
	 *
	 * Example:
	 *
	 * <code>
	 * [
	 *     [
	 *         'slug'  => 'artists',
	 *         'title' => 'Artists',
	 *         'icon'  => 'users',
	 *         'order' => 20,
	 *         'url'   => admin_url( 'admin.php?page=sap-artists' ),
	 *     ],
	 * ]
	 * </code>
	 *
	 * @return array<int, array<string, mixed>>
	 */
	public function get_navigation_items(): array;
}