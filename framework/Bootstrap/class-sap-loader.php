<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-001 Loader
 *
 * Responsibility:
 * Bootstrap the Servant Artist Platform framework by
 * loading the core services, creating the module
 * manager, registering framework modules, and starting
 * the framework lifecycle.
 *
 * The Loader is the application's bootstrapper.
 * It contains no business logic.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Loader
 *
 * Coordinates startup of the Servant Artist Platform.
 *
 * @since 1.0.0
 */
final class SAP_Loader {

	/**
	 * Singleton instance.
	 *
	 * @var SAP_Loader|null
	 */
	private static ?SAP_Loader $instance = null;

	/**
	 * Framework Registry.
	 *
	 * @var SAP_Registry
	 */
	private SAP_Registry $registry;

	/**
	 * Framework Event Dispatcher.
	 *
	 * @var SAP_Event_Dispatcher
	 */
	private SAP_Event_Dispatcher $events;

	/**
	 * Framework Asset Manager.
	 *
	 * @var SAP_Asset_Manager
	 */
	private SAP_Asset_Manager $assets;

	/**
	 * Core Framework Services.
	 *
	 * @var SAP_Core_Services
	 */
	private SAP_Core_Services $services;

	/**
	 * Framework Module Manager.
	 *
	 * @var SAP_Module_Manager
	 */
	private SAP_Module_Manager $modules;

	/**
	 * Application Runtime.
	 *
	 * @var SAP_Runtime
	 */
	private SAP_Runtime $runtime;

	/**
	 * Prevent direct instantiation.
	 */
	private function __construct() {}

	/**
	 * Prevent cloning.
	 */
	private function __clone() {}

	/**
	 * Prevent unserialization.
	 *
	 * @throws \Exception Always.
	 */
	public function __wakeup(): void {

		throw new \Exception(
			'Cannot unserialize singleton ' . __CLASS__
		);

	}

	/**
	 * Returns the singleton Loader instance.
	 *
	 * @return SAP_Loader
	 */
	public static function instance(): SAP_Loader {

		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;

	}

	/**
	 * Boot the Servant Artist Platform framework.
	 *
	 * Executes the complete framework startup sequence.
	 *
	* Startup Order:
	 *
	 * 1. Registry
	 * 2. Event Dispatcher
	 * 3. Asset Manager
	 * 4. Module Classes
	 * 5. Core Services
	 * 6. Module Manager
	 * 7. Application Runtime
	 * 8. Register Modules
	 * 9. Start Framework
	 *
	 * @return void
	 */
	public function run(): void {

		$this->load_registry();

		$this->load_event_dispatcher();

		$this->load_asset_manager();

		$this->load_module_classes();

		$this->create_services();

		$this->create_module_manager();

		$this->create_runtime();

		$this->register_modules();

		$this->start_framework();

	}

	/**
	 * Load the SAP Registry.
	 *
	 * Initializes the Registry service responsible for
	 * storing and providing access to framework objects.
	 *
	 * @return void
	 */
	private function load_registry(): void {

		require_once dirname( __DIR__ ) . '/core/class-sap-registry.php';

		$this->registry = SAP_Registry::instance();

	}

	/**
	 * Load the SAP Event Dispatcher.
	 *
	 * Initializes the Event Dispatcher responsible for
	 * communication between framework components.
	 *
	 * @return void
	 */
	private function load_event_dispatcher(): void {

		require_once dirname( __DIR__ ) . '/core/class-sap-event-dispatcher.php';

		$this->events = SAP_Event_Dispatcher::instance();

	}

	/**
	 * Load the SAP Asset Manager.
	 *
	 * Initializes the Asset Manager responsible for
	 * registering and loading framework assets.
	 *
	 * @return void
	 */
	 private function load_asset_manager(): void {

		require_once dirname( __DIR__ ) . '/core/class-sap-asset-manager.php';

		$this->assets = SAP_Asset_Manager::instance();

		$this->assets->run();

	}

	/**
     * Load framework class definitions.
     *
     * Loads all framework interfaces, abstract classes,
     * managers, services, and module definitions before
     * the framework begins execution.
     *
     * @return void
     */
     private function load_module_classes(): void {

	/*
	 * Framework Interfaces.
	 */
	require_once dirname( __DIR__ ) . '/modules/interface-sap-module.php';

	require_once dirname( __DIR__ ) . '/interfaces/interface-sap-navigation-provider.php';

	require_once dirname( __DIR__ ) . '/interfaces/interface-sap-page-provider.php';

	/*
	 * Platform Navigation Manager.
	 *
	 * Currently resides in the plugin root.
	 * SAP-014 will relocate it into the framework.
	 */
	require_once dirname( dirname( __DIR__ ) ) . '/class-sap-navigation-manager.php';

	/*
	 * Framework Abstracts.
	 */
	require_once dirname( __DIR__ ) . '/abstracts/abstract-sap-module.php';

	/*
	 * Framework Router.
	 */
	require_once dirname( __DIR__ ) . '/core/class-sap-router.php';

	/*
	 * Framework Runtime.
	 */
	require_once dirname( __DIR__ ) . '/runtime/class-sap-runtime.php';

	/*
	 * Application Shell.
	 */
	require_once dirname( __DIR__ ) . '/runtime/class-sap-application-shell.php';

	/*
	 * UI Framework - Sections.
	 */
	require_once dirname( __DIR__ ) . '/ui/sections/interfaces/interface-sap-section.php';

	require_once dirname( __DIR__ ) . '/ui/sections/abstracts/abstract-sap-section.php';

	/*
	 * UI Framework - Components.
	 */
	require_once dirname( __DIR__ ) . '/ui/components/interfaces/interface-sap-component.php';

	require_once dirname( __DIR__ ) . '/ui/components/abstracts/abstract-sap-component.php';

	/*
	 * UI Pages.
	 */
	require_once dirname( __DIR__ ) . '/ui/pages/interfaces/interface-sap-page.php';

	require_once dirname( __DIR__ ) . '/ui/pages/artist/class-sap-artist-home-page.php';

	require_once dirname( __DIR__ ) . '/ui/pages/artist/class-sap-artist-profile-page.php';

	/*
	 * UI Layouts.
	 */
	require_once dirname( __DIR__ ) . '/ui/layouts/artist/class-sap-artist-layout.php';

	/*
     * UI Icons.
     */
    require_once dirname( __DIR__ ) . '/ui/icons/class-sap-icon-manager.php';

	/*
	 * UI Sections.
	 */
	require_once dirname( __DIR__ ) . '/ui/sections/hero/class-sap-hero-section.php';

	require_once dirname( __DIR__ ) . '/ui/sections/profile/class-sap-profile-section.php';

    /*
     * Framework Managers.
     */
    require_once dirname( __DIR__ ) . '/managers/class-sap-page-manager.php';

	/*
     * Core Services.
     */
    require_once dirname( __DIR__ ) . '/core/class-sap-profile.php';

    require_once dirname( __DIR__ ) . '/core/class-sap-user-service.php';

    require_once dirname( __DIR__ ) . '/core/class-sap-core-services.php';

	/*
	 * Framework Module Manager.
	 */
	require_once dirname( __DIR__ ) . '/managers/class-sap-module-manager.php';

	/*
	 * Framework Modules.
	 */
	require_once dirname( __DIR__ ) . '/modules/settings/class-sap-settings-module.php';

	require_once dirname( __DIR__ ) . '/modules/artists/class-sap-artists-module.php';

	}

	/**
	 * Create the Core Services container.
	 *
	 * Builds the central dependency container used
	 * throughout the Servant Artist Platform.
	 *
	 * @return void
	 */
	private function create_services(): void {

		$this->services = new SAP_Core_Services(
			$this->registry,
			$this->events,
			$this->assets
		);

	}

	/**
	 * Create the Module Manager.
	 *
	 * Instantiates the Module Manager and injects
	 * the Core Services container.
	 *
	 * @return void
	 */
	private function create_module_manager(): void {

		$this->modules = new SAP_Module_Manager(
			$this->services
		);

	}

	/**
	 * Create the Application Runtime.
	 *
	 * Instantiates the Runtime, registers it with
	 * the Core Services container, and initializes
	 * the application lifecycle.
	 *
	 * @return void
	 */
	private function create_runtime(): void {

		$this->runtime = new SAP_Runtime(
			$this->services
		);

		$this->services->register_runtime(
			$this->runtime
		);


	}

	/**
	 * Register framework modules.
	 *
	 * Registers every framework module that should
	 * participate in the application lifecycle.
	 *
	 * @return void
	 */
	private function register_modules(): void {

		$this->modules->register(
			new SAP_Settings_Module(
				$this->services
			)
		);

		$this->modules->register(
			new SAP_Artists_Module(
				$this->services
			)
		);

		/*
		 * Future modules register here.
		 *
		 * Example:
		 *
		 * $this->modules->register(
		 *     new SAP_Application_Shell_Module(
		 *         $this->services
		 *     )
		 * );
		 */

	}

	/**
	 * Start the Servant Artist Platform.
	 *
	 * Begins execution of all registered modules.
	 *
	 * @return void
	 */
	private function start_framework(): void {

		$this->modules->run();

	}

}

