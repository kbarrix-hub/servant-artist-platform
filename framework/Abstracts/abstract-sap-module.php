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
 * Framework Registry.
 *
 * @var SAP_Registry
 */
protected SAP_Registry $registry;

/**
 * Framework Event Dispatcher.
 *
 * @var SAP_Event_Dispatcher
 */
protected SAP_Event_Dispatcher $events;

/**
 * Framework Asset Manager.
 *
 * @var SAP_Asset_Manager
 */
protected SAP_Asset_Manager $assets;

/**
 * Framework Module Manager.
 *
 * @var SAP_Module_Manager
 */
protected SAP_Module_Manager $modules;

/**
 * Create a new SAP module.
 *
 * @param SAP_Framework_Services $framework Framework services container.
 */
public function __construct( SAP_Framework_Services $framework ) {

	$this->framework = $framework;

	$this->registry = $framework->registry();

	$this->events = $framework->events();

	$this->assets = $framework->assets();

	$this->modules = $framework->modules();
    }
}