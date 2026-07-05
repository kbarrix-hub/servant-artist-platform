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
 * Provides the common functionality shared by all
 * SAP framework modules.
 *
 * @since 1.0.0
 */
abstract class SAP_Abstract_Module implements SAP_Module_Interface {

	/**
	 * Framework Services container.
	 *
	 * @var SAP_Framework_Services
	 */
	protected SAP_Framework_Services $framework;

	/**
	 * Create a new SAP module.
	 *
	 * @param SAP_Framework_Services $framework Framework services container.
	 */
	public function __construct( SAP_Framework_Services $framework ) {

		$this->framework = $framework;
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