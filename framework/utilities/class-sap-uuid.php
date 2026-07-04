<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-010 UUID Utility
 *
 * Responsibility:
 * Generate universally unique identifiers for
 * SAP framework entities.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_UUID
 *
 * Provides UUID generation services for the
 * Servant Artist Platform.
 *
 * @since 1.0.0
 */
final class SAP_UUID {

	/**
	 * Prevent instantiation.
	 */
	private function __construct() {}

	/**
	 * Generate a unique identifier.
	 *
	 * @param string $prefix Optional identifier prefix.
	 *
	 * @return string
	 */
	public static function generate(
		string $prefix = ''
	): string {

		try {

			$bytes = random_bytes( 16 );

		} catch ( Exception $exception ) {

			return uniqid( $prefix, true );
		}

		$hex = bin2hex( $bytes );

		$uuid = sprintf(
			'%s-%s-%s-%s-%s',
			substr( $hex, 0, 8 ),
			substr( $hex, 8, 4 ),
			substr( $hex, 12, 4 ),
			substr( $hex, 16, 4 ),
			substr( $hex, 20, 12 )
		);

		return $prefix . $uuid;
	}

}