<?php

declare(strict_types=1);

/**
 * Plugin Name: Servant Artist Platform
 * Plugin URI:  https://servantartistplatform.com
 * Description: Enterprise framework for artists, ministries, churches, organizations, and creators.
 * Version:     1.0.0-dev
 * Requires PHP: 8.1
 * Requires at least: 6.5
 * Author:      Kenny Barrix
 * Author URI:  https://servantrecords.com
 * License:     Proprietary
 * Text Domain: servant-artist-platform
 */

defined( 'ABSPATH' ) || exit;

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-000 Plugin Entry Point
 *
 * Responsibility:
 * Introduce WordPress to the SAP Framework.
 *
 * This file intentionally contains no framework logic.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

/**
 * Framework constants.
 */

if ( ! defined( 'SAP_VERSION' ) ) {
	define( 'SAP_VERSION', '1.0.0-dev' );
}

if ( ! defined( 'SAP_PLUGIN_DIR' ) ) {
	define( 'SAP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'SAP_PLUGIN_URL' ) ) {
	define( 'SAP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

/*
|--------------------------------------------------------------------------
| Framework Bootstrap
|--------------------------------------------------------------------------
|
| The plugin entry point delegates framework startup to the Bootstrap
| layer. Bootstrap assumes responsibility for both installation and
| runtime initialization.
|
*/

require_once __DIR__ . '/framework/bootstrap/class-sap-bootstrap.php';

/**
 * Register plugin activation.
 */
register_activation_hook(
	__FILE__,
	array(
		'SAP_Bootstrap',
		'activate',
	)
);

/**
 * Start the framework.
 */
SAP_Bootstrap::instance()->run();