<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-013A Core Services
 *
 * Responsibility:
 * Construct and expose all core framework services.
 *
 * The Loader constructs the core dependencies and
 * injects them into this container. This class
 * simply stores and exposes those services.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Core_Services
 *
 * Central dependency container for the SAP Framework.
 *
 * @since 1.0.0
 */
final class SAP_Core_Services {

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
	 * Framework Navigation Manager.
	 *
	 * @var SAP_Navigation_Manager
	 */
	private SAP_Navigation_Manager $navigation;

	/**
	 * Framework Router.
	 *
	 * @var SAP_Router
	 */
	private SAP_Router $router;

	/**
	 * Create the Core Services container.
	 *
	 * @param SAP_Registry         $registry Framework Registry.
	 * @param SAP_Event_Dispatcher $events   Event Dispatcher.
	 * @param SAP_Asset_Manager    $assets   Asset Manager.
	 */
	public function __construct(
		SAP_Registry $registry,
		SAP_Event_Dispatcher $events,
		SAP_Asset_Manager $assets
	) {

		$this->registry = $registry;
		$this->events   = $events;
		$this->assets   = $assets;

		$this->navigation = new SAP_Navigation_Manager();

		$this->router = new SAP_Router();

	}

	/**
	 * Return the Registry.
	 *
	 * @return SAP_Registry
	 */
	public function registry(): SAP_Registry {

		return $this->registry;

	}

	/**
	 * Return the Event Dispatcher.
	 *
	 * @return SAP_Event_Dispatcher
	 */
	public function events(): SAP_Event_Dispatcher {

		return $this->events;

	}

	/**
	 * Return the Asset Manager.
	 *
	 * @return SAP_Asset_Manager
	 */
	public function assets(): SAP_Asset_Manager {

		return $this->assets;

	}

	/**
	 * Return the Navigation Manager.
	 *
	 * @return SAP_Navigation_Manager
	 */
	public function navigation(): SAP_Navigation_Manager {

		return $this->navigation;

	}

	/**
	 * Return the Router.
	 *
	 * @return SAP_Router
	 */
	public function router(): SAP_Router {

		return $this->router;

	}

}