<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-015.1 Application Runtime
 *
 * Responsibility:
 * Coordinate the application lifecycle by managing the
 * current request, resolving framework services, and
 * maintaining the runtime state.
 *
 * The Runtime serves as the central orchestration layer
 * between the Core Services, Router, Module Manager,
 * and Application Shell.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Runtime
 *
 * Coordinates the execution of the Servant Artist Platform.
 *
 * @since 1.0.0
 */
final class SAP_Runtime {

	/**
	 * Framework service container.
	 *
	 * @var SAP_Core_Services
	 */
	private SAP_Core_Services $core_services;

	/**
	 * Framework Router.
	 *
	 * @var SAP_Router
	 */
	private SAP_Router $router;

	/**
	 * Current route.
	 *
	 * @var string
	 */
	private string $current_route = '';

	/**
	 * Current module.
	 *
	 * @var string
	 */
	private string $current_module = '';

	/**
	 * Runtime state.
	 *
	 * @var array<string, mixed>
	 */
	private array $runtime_state = [];

	/**
	 * Constructor.
	 *
	 * @param SAP_Core_Services $core_services Framework services.
	 */
	public function __construct( SAP_Core_Services $core_services ) {

		$this->core_services = $core_services;
		$this->router        = $core_services->router();

	}

	/**
	 * Initialize the application runtime.
	 *
	 * @return void
	 */
	public function initialize(): void {

		$this->resolve_route();
		$this->resolve_module();

		$this->runtime_state = [
			'route'  => $this->current_route,
			'module' => $this->current_module,
		];

	}

	/**
	 * Run the application runtime.
	 *
	 * Executes the complete application lifecycle.
	 *
	 * @return void
	 */
	public function run(): void {

		$this->boot();

		$this->initialize();

		$this->start();

		$this->shutdown();

	}

	/**
	 * Boot the application runtime.
	 *
	 * Prepare the framework before execution.
	 *
	 * @return void
	 */
	private function boot(): void {

		// Future implementation.

	}

	/**
	 * Start the application.
	 *
	 * Execute the framework.
	 *
	 * @return void
	 */
	private function start(): void {

		$this->get_module_manager()->run();

	}

	/**
	 * Shutdown the application runtime.
	 *
	 * Perform framework cleanup.
	 *
	 * @return void
	 */
	private function shutdown(): void {

		// Future implementation.

	}

	/**
	 * Resolve the active route.
	 *
	 * @return void
	 */
	private function resolve_route(): void {

		$this->current_route = '';

	}

	/**
	 * Resolve the active module.
	 *
	 * @return void
	 */
	private function resolve_module(): void {

		$this->current_module = '';

	}

	/**
	 * Return the Router.
	 *
	 * @return SAP_Router
	 */
	public function get_router(): SAP_Router {

		return $this->router;

	}

	/**
	 * Return the Module Manager.
	 *
	 * @return SAP_Module_Manager
	 */
	public function get_module_manager(): SAP_Module_Manager {

		return $this->core_services->module_manager();

	}

	/**
	 * Return the current route.
	 *
	 * @return string
	 */
	public function get_current_route(): string {

		return $this->current_route;

	}

	/**
	 * Return the current module.
	 *
	 * @return string
	 */
	public function get_current_module(): string {

		return $this->current_module;

	}

	/**
	 * Return the runtime state.
	 *
	 * @return array<string, mixed>
	 */
	public function get_runtime_state(): array {

		return $this->runtime_state;

	}

}