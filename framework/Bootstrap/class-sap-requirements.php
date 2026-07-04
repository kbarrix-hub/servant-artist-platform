<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-000 Requirements
 *
 * Responsibility:
 * Verify the hosting environment before the framework
 * is allowed to start.
 *
 * This file contains bootstrap validation functions.
 * It does not contain framework business logic.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Verify the hosting environment.
 *
 * This function serves as the bootstrap requirements
 * pipeline for the SAP Framework.
 */
function sap_requirements_check(): void {

	sap_requirements_php();

	sap_requirements_wordpress();
}

/**
 * Verify the PHP version.
 *
 * Ensures the server is running a supported PHP version
 * before the SAP Framework continues loading.
 */
function sap_requirements_php(): void {

	$minimum_version = '8.1';

	if ( version_compare( PHP_VERSION, $minimum_version, '<' ) ) {

		wp_die(
			sprintf(
				'Servant Artist Platform requires PHP %s or higher. Current version: %s.',
				$minimum_version,
				PHP_VERSION
			)
		);
	}
}

/**
 * Verify the WordPress version.
 *
 * Ensures the installed WordPress version meets the
 * minimum requirement before the SAP Framework loads.
 */
function sap_requirements_wordpress(): void {

	$minimum_version = '6.5';

	global $wp_version;

	if ( version_compare( $wp_version, $minimum_version, '<' ) ) {

		wp_die(
			sprintf(
				'Servant Artist Platform requires WordPress %s or higher. Current version: %s.',
				$minimum_version,
				$wp_version
			)
		);
	}
}

