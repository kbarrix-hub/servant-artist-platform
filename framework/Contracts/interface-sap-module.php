<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-007 Module Interface
 *
 * Responsibility:
 * Define the minimum lifecycle required by every
 * SAP framework module.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Interface SAP_Module_Interface
 *
 * Defines the minimum lifecycle for all SAP modules.
 *
 * @since 1.0.0
 */
interface SAP_Module_Interface {

	/**
	 * Register the module.
	 *
	 * Registers WordPress integrations required by
	 * the module.
	 */
	public function register(): void;

	/**
	 * Boot the module.
	 *
	 * Initializes the module after registration.
	 */
	public function boot(): void;

	/**
	 * Register module assets.
	 *
	 * Registers styles, scripts, and other assets
	 * owned by the module.
	 */
	public function assets(): void;

}