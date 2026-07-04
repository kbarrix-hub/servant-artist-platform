<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-303 Database Installer
 *
 * Responsibility:
 * Install and update the Servant Artist Platform
 * database schema.
 *
 * Executes schema definitions provided by
 * SAP_Schema.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Database_Installer
 *
 * Installs and upgrades the SAP database.
 *
 * @since 1.0.0
 */
final class SAP_Database_Installer {

	/**
	 * Database version option name.
	 */
	private const OPTION_NAME = 'sap_database_version';

	/**
	 * Install or upgrade the database.
	 *
	 * @return void
	 */
	public static function install(): void {

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		foreach ( SAP_Schema::all() as $schema ) {

			dbDelta( $schema );
		}

		update_option(
			self::OPTION_NAME,
			SAP_Schema::VERSION
		);
	}

	/**
	 * Get the installed database version.
	 *
	 * @return string
	 */
	public static function installed_version(): string {

		return (string) get_option(
			self::OPTION_NAME,
			''
		);
	}

	/**
	 * Determine whether a database upgrade
	 * is required.
	 *
	 * @return bool
	 */
	public static function requires_upgrade(): bool {

		return version_compare(
			self::installed_version(),
			SAP_Schema::VERSION,
			'<'
		);
	}

}