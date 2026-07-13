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

		self::repair_song_schema();

		if ( ! self::song_schema_is_current() ) {
			return;
		}

		update_option(
			self::OPTION_NAME,
			SAP_Schema::VERSION
		);

	}

	/**
	 * Repair the Song Manager schema.
	 *
	 * @return void
	 */
	private static function repair_song_schema(): void {

		global $wpdb;

		$table = $wpdb->prefix . 'sap_songs';

		$column = $wpdb->get_var(
			$wpdb->prepare(
				"
				SHOW COLUMNS FROM {$table}
				LIKE %s
				",
				'audio_attachment_id'
			)
		);

		if ( 'audio_attachment_id' === $column ) {
			return;
		}

		$wpdb->query(
			"
			ALTER TABLE {$table}
			ADD audio_attachment_id BIGINT UNSIGNED DEFAULT NULL
			AFTER song_status
			"
		);

	}

	/**
	 * Determine whether the Song Manager schema is current.
	 *
	 * @return bool
	 */
	private static function song_schema_is_current(): bool {

		global $wpdb;

		$table = $wpdb->prefix . 'sap_songs';

		$column = $wpdb->get_var(
			$wpdb->prepare(
				"
				SHOW COLUMNS FROM {$table}
				LIKE %s
				",
				'audio_attachment_id'
			)
		);

		return 'audio_attachment_id' === $column;

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