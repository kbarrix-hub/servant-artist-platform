<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-005 Module Manager
 *
 * Responsibility:
 * Register, initialize, and manage framework modules.
 *
 * The Module Manager coordinates the SAP module
 * lifecycle. It does not create modules or contain
 * module business logic.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Module_Manager
 *
 * Coordinates the lifecycle of SAP framework modules.
 *
 * @since 1.0.0
 */
final class SAP_Module_Manager {

	/**
	 * Core framework services.
	 *
	 * @var SAP_Core_Services
	 */
	private SAP_Core_Services $services;

	/**
	 * Registered framework modules.
	 *
	 * @var array<int, SAP_Module_Interface>
	 */
	private array $modules = [];

	/**
	 * Create the Module Manager.
	 *
	 * @param SAP_Core_Services $services Core framework services.
	 */
	public function __construct(
		SAP_Core_Services $services
	) {

		$this->services = $services;

	}

	/**
	 * Register a framework module.
	 *
	 * @param SAP_Module_Interface $module Framework module.
	 *
	 * @return void
	 */
	public function register(
		SAP_Module_Interface $module
	): void {

		$this->modules[] = $module;

	}

	/**
	 * Start the Module Manager.
	 *
	 * Executes the SAP module lifecycle.
	 *
	 * @return void
	 */
	public function run(): void {

		$this->register_navigation();

		$this->initialize_modules();

		$this->dispatch_ready_event();

	}

	/**
	 * Register navigation providers.
	 *
	 * Modules implementing the navigation provider
	 * interface are automatically registered with
	 * the Navigation Manager.
	 *
	 * @return void
	 */
	private function register_navigation(): void {

		$navigation = $this->services->navigation();

		foreach ( $this->modules as $module ) {

			if ( ! $module instanceof SAP_Navigation_Provider_Interface ) {
				continue;
			}

			$navigation->register_provider(
				$module
			);

		}

	}

	/**
	 * Initialize registered framework modules.
	 *
	 * Executes each module lifecycle.
	 *
	 * @return void
	 */
	private function initialize_modules(): void {

		foreach ( $this->modules as $module ) {

			$module->register();

			$module->boot();

			$module->assets();

		}

	}

	/**
	 * Dispatch the framework ready event.
	 *
	 * Reserved for future framework events.
	 *
	 * @return void
	 */
	private function dispatch_ready_event(): void {

		// Future milestone.

	}

}