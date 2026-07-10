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
     * Current framework page.
     *
     * @var SAP_Page_Interface|null
     */
    private ?SAP_Page_Interface $current_page = null;

	/**
	 * Runtime state.
	 *
	 * @var array<string, mixed>
	 */
	private array $runtime_state = [];

	/**
	 * Application Shell.
	 *
	 * @var SAP_Application_Shell
	 */
	private SAP_Application_Shell $shell;

	/**
	 * Constructor.
	 *
	 * @param SAP_Core_Services $core_services Framework services.
	 */
	public function __construct( SAP_Core_Services $core_services ) {

		$this->core_services = $core_services;
		$this->router        = $core_services->router();
		$this->shell = new SAP_Application_Shell();

	}

	/**
	 * Initialize the application runtime.
	 *
	 * @return void
	 */
	public function initialize(): void {

		$this->resolve_route();
		$this->resolve_module();
		$this->resolve_page();

		$this->runtime_state = [
	         'route'     => $this->current_route,
	         'module'    => $this->current_module,
	         'page'      => $this->current_page,
	         'user'      => $this->core_services->user(),
	         'dashboard' => $this->core_services
		         ->dashboard()
		         ->get_dashboard(),
	         'request'   => $_REQUEST,
	         'is_admin'  => is_admin(),
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
     * Process incoming framework requests.
     *
     * @return void
     */
    private function process_requests(): void {

	     $this->core_services
		     ->song_form_handler()
		     ->handle();

    }
	
	/**
     * Start the application.
     *
     * Execute the framework.
     *
     * @return void
     */
    private function start(): void {

	/*
	 * Register all framework modules.
	 *
	 * Module registration populates the Navigation
	 * Manager and Page Manager before the Runtime
	 * resolves the active request.
	 */
	$this->get_module_manager()->run();

	/*
	 * Refresh the Runtime state now that the
	 * framework registry has been populated.
	 */
	$this->initialize();

	/*
	 * Render the resolved framework page.
	 */
	$this->shell->set_context(
		$this->get_render_context()
	);

	$this->shell->render();

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
     * Resolve the active framework page.
     *
     * @return void
     */
    private function resolve_page(): void {

	     $page_slug = 'artist-home';

	     if ( isset( $_GET['sap_page'] ) ) {
		     $page_slug = sanitize_key(
			     wp_unslash( $_GET['sap_page'] )
		);
	}

	$this->current_page = $this->core_services
		->pages()
		->get_page( $page_slug );
    
	}

	/**
	 * Build the Application Shell render context.
	 *
	 * Runtime owns the complete rendering state for
	 * the current request.
	 *
	 * @return array<string, mixed>
	 */
	private function get_render_context(): array {

		return [  

			 'route'            => $this->runtime_state['route'],
	         'module'           => $this->runtime_state['module'],
	         'page'             => $this->runtime_state['page'],
	         'user'             => $this->runtime_state['user'],
	         'dashboard'        => $this->runtime_state['dashboard'],
	         'navigation_items' => $this->core_services
		         ->navigation()
		         ->get_navigation_items()
		];

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
     * Return the current framework page.
     *
     * @return SAP_Page_Interface|null
     */
    public function get_current_page(): ?SAP_Page_Interface {

	     return $this->current_page;

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