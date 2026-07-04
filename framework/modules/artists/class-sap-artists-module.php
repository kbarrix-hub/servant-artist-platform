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
 * Discover, register, initialize, and manage framework modules.
 *
 * The Module Manager coordinates the SAP module lifecycle.
 * It does not contain module business logic.
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
	 * Framework Services container.
	 *
	 * @var SAP_Framework_Services
	 */
	private SAP_Framework_Services $framework;

	/**
	 * Registered framework modules.
	 *
	 * @var array<int, SAP_Module_Interface>
	 */
	private array $modules = [];

	/**
	 * Set the Framework Services container.
	 *
	 * @param SAP_Framework_Services $framework Framework services.
	 *
	 * @return void
	 */
	public function set_framework(
		SAP_Framework_Services $framework
	): void {

		$this->framework = $framework;
	}

	/**
	 * Starts the Module Manager.
	 *
	 * Coordinates the complete SAP module lifecycle.
	 *
	 * @return void
	 */
	public function run(): void {

		$this->discover_modules();

		$this->register_modules();

		$this->initialize_modules();

		$this->dispatch_ready_event();
	}

	/**
	 * Discover available SAP modules.
	 *
	 * Locates all framework modules available for
	 * registration.
	 *
	 * @return void
	 */
	private function discover_modules(): void {

		// Future module discovery.
	}

	/**
	 * Register discovered SAP modules.
	 *
	 * Creates all framework module instances.
	 *
	 * @return void
	 */
	private function register_modules(): void {

		$this->modules[] = new SAP_Settings_Module(
			$this->framework
		);

		$this->modules[] = new SAP_Artists_Module(
			$this->framework
		);
	}

	/**
	 * Initialize registered SAP modules.
	 *
	 * Executes the module lifecycle by registering
	 * and booting each module.
	 *
	 * @return void
	 */
	private function initialize_modules(): void {

		foreach ( $this->modules as $module ) {

			$module->register();

			$module->boot();
		}
	}

	/**
	 * Dispatch the modules ready event.
	 *
	 * Notifies the framework that all SAP modules
	 * have completed initialization.
	 *
	 * @return void
	 */
	private function dispatch_ready_event(): void {

		// Framework ready event will be dispatched
		// in a future milestone.
	}

}