<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-304 Installer
 *
 * Responsibility:
 * Coordinate installation of the Servant Artist
 * Platform.
 *
 * The Installer orchestrates installation of all
 * framework components required during plugin
 * activation.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Installer
 *
 * Coordinates framework installation.
 *
 * @since 1.0.0
 */
final class SAP_Installer {

	/**
	 * Prevent instantiation.
	 */
	private function __construct() {}

	/**
	 * Execute framework installation.
	 *
	 * @return void
	 */
	public static function install(): void {

		self::load_dependencies();

		self::install_database();

		self::install_defaults();
	}

	/**
	 * Load installer dependencies.
	 *
	 * @return void
	 */
	private static function load_dependencies(): void {

		require_once dirname( __DIR__ ) . '/database/class-sap-schema.php';

		require_once dirname( __DIR__ ) . '/database/class-sap-database-installer.php';
	}

	/**
	 * Install the SAP database.
	 *
	 * @return void
	 */
	private static function install_database(): void {

		SAP_Database_Installer::install();
	}

	/**
	 * Install framework defaults.
	 *
	 * Reserved for future milestones.
	 *
	 * @return void
	 */
	private static function install_defaults(): void {

		// Future:
		// Default settings.
		// Default capabilities.
		// Default roles.
		// Seed data.
	}

}