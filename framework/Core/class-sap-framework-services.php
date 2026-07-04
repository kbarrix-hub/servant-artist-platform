<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-002 Framework Services
 *
 * Responsibility:
 * Provide a single immutable container for all core
 * SAP framework services.
 *
 * This class groups the core framework services into
 * a single object for dependency injection throughout
 * the Servant Artist Platform.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Framework_Services
 *
 * Immutable container for the core SAP framework services.
 *
 * @since 1.0.0
 */
final readonly class SAP_Framework_Services {

	/**
	 * Create the Framework Services container.
	 *
	 * @param SAP_Registry         $registry Framework Registry.
	 * @param SAP_Event_Dispatcher $events   Event Dispatcher.
	 * @param SAP_Asset_Manager    $assets   Asset Manager.
	 * @param SAP_Module_Manager   $modules  Module Manager.
	 */
	public function __construct(
		private SAP_Registry $registry,
		private SAP_Event_Dispatcher $events,
		private SAP_Asset_Manager $assets,
		private SAP_Module_Manager $modules,
	) {}

    /**
     * Get the Framework Registry.
     *
     * @return SAP_Registry
     */
     public function registry(): SAP_Registry {

	    return $this->registry;
    }

    /**
     * Get the Event Dispatcher.
     *
     * @return SAP_Event_Dispatcher
     */
     public function events(): SAP_Event_Dispatcher {

	     return $this->events;
    }

    /**
     * Get the Asset Manager.
     *
     * @return SAP_Asset_Manager
     */
     public function assets(): SAP_Asset_Manager {

	     return $this->assets;
    }

    /**
     * Get the Module Manager.
     *
     * @return SAP_Module_Manager
     */
     public function modules(): SAP_Module_Manager {

	 return $this->modules;
    }

}