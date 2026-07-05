<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-008 Abstract Module
 *
 * Responsibility:
 * Provide the common functionality shared by all
 * SAP framework modules.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Abstract_Module
 *
 * Base class shared by every SAP framework module.
 *
 * @since 1.0.0
 */
abstract class SAP_Abstract_Module implements SAP_Module_Interface {

	/**
	 * Core framework services.
	 *
	 * @var SAP_Core_Services
	 */
	protected SAP_Core_Services $services;

	/**
	 * Create a new SAP module.
	 *
	 * @param SAP_Core_Services $services Core framework services.
	 */
	public function __construct(
		SAP_Core_Services $services
	) {

		$this->services = $services;

	}

	/**
	 * Register the module.
	 *
	 * Default implementation.
	 *
	 * @return void
	 */
	public function register(): void {}

	/**
	 * Boot the module.
	 *
	 * Default implementation.
	 *
	 * @return void
	 */
	public function boot(): void {}

	/**
	 * Register module assets.
	 *
	 * Default implementation.
	 *
	 * @return void
	 */
	public function assets(): void {}

}