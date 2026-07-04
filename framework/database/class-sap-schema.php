<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-302 Schema
 *
 * Responsibility:
 * Provides database schema definitions for the
 * Servant Artist Platform.
 *
 * This class contains only schema definitions.
 * It does not install or update the database.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Schema
 *
 * Provides SQL schema definitions.
 *
 * @since 1.0.0
 */
final class SAP_Schema {

	/**
	 * Database schema version.
	 */
	public const VERSION = '1.0.0';

	/**
	 * Return all schema definitions.
	 *
	 * @return array<string>
	 */
	public static function all(): array {

		return array(
			self::artists(),
		);
	}

	/**
	 * Artists table schema.
	 *
	 * @return string
	 */
	public static function artists(): string {

		global $wpdb;

		$table   = $wpdb->prefix . 'sap_artists';
		$charset = $wpdb->get_charset_collate();

		return "
		CREATE TABLE {$table} (
			id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
			uuid CHAR(36) NOT NULL,
			artist_type VARCHAR(50) NOT NULL,
			stage_name VARCHAR(255) NOT NULL,
			legal_name VARCHAR(255) NOT NULL,
			display_name VARCHAR(255) NOT NULL,
			slug VARCHAR(255) NOT NULL,
			email VARCHAR(255) DEFAULT '',
			phone VARCHAR(50) DEFAULT '',
			website VARCHAR(255) DEFAULT '',
			short_bio TEXT,
			bio LONGTEXT,
			profile_image_id BIGINT UNSIGNED DEFAULT NULL,
			banner_image_id BIGINT UNSIGNED DEFAULT NULL,
			status VARCHAR(50) NOT NULL DEFAULT 'draft',
			verified TINYINT(1) NOT NULL DEFAULT 0,
			featured TINYINT(1) NOT NULL DEFAULT 0,
			created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
			updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (id),
			UNIQUE KEY uuid (uuid),
			UNIQUE KEY slug (slug),
			KEY status (status),
			KEY artist_type (artist_type)
		) {$charset};
		";
	}

}