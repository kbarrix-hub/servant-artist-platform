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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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
 
 /*
|--------------------------------------------------------------------------
| Framework Bootstrap
|--------------------------------------------------------------------------
|
| The plugin entry point delegates framework startup to the Bootstrap
| layer. From this point forward, Bootstrap assumes responsibility for
| preparing the environment and launching the SAP Framework.
|
*/

require_once __DIR__ . '/framework/Bootstrap/class-sap-bootstrap.php';

$bootstrap = SAP_Bootstrap::instance();

$bootstrap->run();