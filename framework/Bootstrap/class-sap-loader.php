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
 * Coordinate initialization of all core framework
 * components in the correct startup order.
 *
 * The Loader assembles the SAP Framework.
 * It does not contain framework business logic.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Loader
 *
 * Coordinates startup of all core SAP framework services.
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
 * Framework Asset Manager.
 *
 * @var SAP_Asset_Manager
 */
private SAP_Asset_Manager $assets;

/**
 * Framework Module Manager.
 *
 * @var SAP_Module_Manager
 */
private SAP_Module_Manager $modules;

/**
 * Framework Event Dispatcher.
 *
 * @var SAP_Event_Dispatcher
 */
private SAP_Event_Dispatcher $events;

/**
 * Framework Services container.
 *
 * @var SAP_Framework_Services
 */
private SAP_Framework_Services $framework;

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
	 * Creates the Loader object on first request and
	 * returns the existing instance thereafter.
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
	 * Starts the SAP Framework loading sequence.
	 *
	 * Coordinates initialization of all core framework
	 * services in the correct startup order.
	 */
	public function run(): void {

		$this->load_registry();

		$this->load_event_dispatcher();

		$this->load_asset_manager();

		$this->load_module_manager();

		$this->framework_ready();
	}

    /**
     * Load the SAP Registry.
     *
     * Initializes the Registry service responsible for
     * storing and providing access to core framework
     * components.
     */
    private function load_registry(): void {

	     require_once dirname( __DIR__ ) . '/Core/class-sap-registry.php';

	     $this->registry = SAP_Registry::instance();
    }

    /**
     * Load the SAP Asset Manager.
     *
     * Initializes the Asset Manager responsible for
     * registering and loading framework assets.
     */
    private function load_asset_manager(): void {

	     require_once dirname( __DIR__ ) . '/Core/class-sap-asset-manager.php';

	     $this->assets = SAP_Asset_Manager::instance();
    }

    /**
     * Load the SAP Module Manager.
     *
     * Initializes the Module Manager responsible for
     * loading and managing SAP framework modules.
     */
     private function load_module_manager(): void {

	     require_once dirname( __DIR__ ) . '/Core/class-sap-module-manager.php';

	     $this->modules = SAP_Module_Manager::instance();
    }

    /**
     * Load the SAP Event Dispatcher.
     *
     * Initializes the Event Dispatcher responsible for
     * coordinating communication between framework
     * components.
     */
     private function load_event_dispatcher(): void {

	     require_once dirname( __DIR__ ) . '/Core/class-sap-event-dispatcher.php';

	     $this->events = SAP_Event_Dispatcher::instance();
    }

    /**
	 * Finalize framework startup.
	 *
	 * Executes any final startup tasks after all core
	 * framework services have been initialized.
	 */
	private function framework_ready(): void {

	require_once dirname( __DIR__ ) . '/Core/class-sap-framework-services.php';

	$this->framework = new SAP_Framework_Services(
		$this->registry,
		$this->events,
		$this->assets,
		$this->modules
	);
    }

}