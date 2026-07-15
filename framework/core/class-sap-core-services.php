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
     * Framework User Service.
     *
     * @var SAP_User_Service
     */
    private SAP_User_Service $user;

	/**
     * Framework Profile.
     *
     * @var SAP_Profile
     */
    private SAP_Profile $profile;

	/**
	 * Framework Dashboard Service.
	 *
	 * @var SAP_Dashboard_Service
	 */
	private SAP_Dashboard_Service $dashboard;

	/**
     * Framework Song Service.
     *
     * @var SAP_Song_Service
     */
    private SAP_Song_Service $songs;

	/**
	 * Framework Song Form Handler.
	 *
	 * @var SAP_Song_Form_Handler
	 */
	private SAP_Song_Form_Handler $song_form_handler;

	/**
     * Harmony State.
     *
     * @var SAP_Harmony_State
     */
    private SAP_Harmony_State $harmony_state;

    /**
     * Harmony Renderer.
     *
     * @var SAP_Harmony_Renderer
     */
    private SAP_Harmony_Renderer $harmony_renderer;

	/**
	 * Harmony Selection Manager.
	 *
	 * @var SAP_Selection_Manager
	 */
	private SAP_Selection_Manager $selection_manager;

    /**
     * Harmony Designer.
     *
     * @var SAP_Harmony_Designer
     */
    private SAP_Harmony_Designer $harmony_designer;

	/**
	 * Framework Page Manager.
	 *
	 * @var SAP_Page_Manager
	 */
	private SAP_Page_Manager $pages;

     /**
     * Framework Module Manager.
     *
     * Registered after construction by the Loader.
     *
     * @var SAP_Module_Manager|null
     */
    private ?SAP_Module_Manager $module_manager = null;

	/**
	 * Application Runtime.
	 *
	 * Registered after construction by the Loader.
	 *
	 * @var SAP_Runtime|null
	 */
	private ?SAP_Runtime $runtime = null;

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
        $this->router     = new SAP_Router();
        $this->user       = new SAP_User_Service();
		$this->profile = new SAP_Profile(
            $this->user
            );
        $this->dashboard  = new SAP_Dashboard_Service();
        $this->songs      = new SAP_Song_Service();
		$this->song_form_handler = new SAP_Song_Form_Handler(
	        $this->songs
        );

        $this->harmony_state = new SAP_Harmony_State();

        $this->harmony_renderer = new SAP_Harmony_Renderer(
	    $this->harmony_state
        );

        $this->selection_manager = new SAP_Selection_Manager(
	        $this->harmony_state
        );

        $this->harmony_designer = new SAP_Harmony_Designer(
	        $this->harmony_renderer,
	        $this->selection_manager
        );
		
        $this->pages = new SAP_Page_Manager();

	}

	/**
	 * Return the Dashboard Service.
	 *
	 * @return SAP_Dashboard_Service
	 */
	public function dashboard(): SAP_Dashboard_Service {

		return $this->dashboard;

	}

	/**
     * Return the Song Service.
     *
     * @return SAP_Song_Service
     */
    public function songs(): SAP_Song_Service {

	     return $this->songs;

    }

	/**
	 * Return the Song Form Handler.
	 *
	 * @return SAP_Song_Form_Handler
	 */
	public function song_form_handler(): SAP_Song_Form_Handler {

		return $this->song_form_handler;

	}

		/**
	 * Return the Harmony State.
	 *
	 * @return SAP_Harmony_State
	 */
	public function harmony_state(): SAP_Harmony_State {

		return $this->harmony_state;

	}

	/**
	 * Return the Harmony Renderer.
	 *
	 * @return SAP_Harmony_Renderer
	 */
	public function harmony_renderer(): SAP_Harmony_Renderer {

		return $this->harmony_renderer;

	}

	/**
	 * Return the Harmony Selection Manager.
	 *
	 * @return SAP_Selection_Manager
	 */
	public function selection_manager(): SAP_Selection_Manager {

		return $this->selection_manager;

	}

	/**
	 * Return the Harmony Designer.
	 *
	 * @return SAP_Harmony_Designer
	 */
	public function harmony_designer(): SAP_Harmony_Designer {

		return $this->harmony_designer;

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

	/**
	 * Return the User Service.
	 *
	 * @return SAP_User_Service
	 */
	public function user(): SAP_User_Service {

    return $this->user;

    }

	/**
     * Return the Profile.
     *
     * @return SAP_Profile
     */
    public function profile(): SAP_Profile {

	return $this->profile;

    }

	/**
	 * Return the Page Manager.
	 *
	 * @return SAP_Page_Manager
	 */
	public function pages(): SAP_Page_Manager {

		return $this->pages;

	}

	/**
	 * Register the Module Manager.
	 *
	 * @param SAP_Module_Manager $module_manager Module Manager.
	 *
	 * @return void
	 */
	public function register_module_manager(
		SAP_Module_Manager $module_manager
	): void {

		$this->module_manager = $module_manager;

	}

	/**
	 * Return the Module Manager.
	 *
	 * @return SAP_Module_Manager
	 */
	public function module_manager(): SAP_Module_Manager {

		return $this->module_manager;

	}

	/**
	 * Register the Application Runtime.
	 *
	 * @param SAP_Runtime $runtime Application Runtime.
	 *
	 * @return void
	 */
	public function register_runtime(
		SAP_Runtime $runtime
	): void {

		$this->runtime = $runtime;

	}

	/**
	 * Return the Application Runtime.
	 *
	 * @return SAP_Runtime
	 */
	public function runtime(): SAP_Runtime {

		return $this->runtime;

	}

}