<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-010 Artists Module
 *
 * Responsibility:
 * Register and manage artist functionality.
 *
 * This module serves as the foundation for all
 * artist-related features within the Servant
 * Artist Platform.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Artists_Module
 *
 * Registers and manages artist functionality.
 *
 * @since 1.0.0
 */
final class SAP_Artists_Module extends SAP_Abstract_Module implements SAP_Navigation_Provider_Interface {

	/**
	 * Module identifier.
	 *
	 * @var string
	 */
	protected string $id = 'artists';

	/**
	 * Module display name.
	 *
	 * @var string
	 */
	protected string $name = 'Artists';

	/**
	 * Register the module.
	 *
	 * Registers WordPress hooks, filters,
	 * services, and integrations.
	 *
	 * @return void
	 */
	public function register(): void {

		add_action(
			'admin_menu',
			[ $this, 'register_admin_menu' ]
		);

		add_action(
			'admin_enqueue_scripts',
			[ $this, 'enqueue_assets' ]
		);

	}

	/**
	 * Boot the module.
	 *
	 * Executes initialization logic after
	 * all modules have been registered.
	 *
	 * @return void
	 */
	public function boot(): void {

		// Future initialization will occur here.

	}

	/**
	 * Register module assets.
	 *
	 * Registers scripts and styles required
	 * by the Artists module.
	 *
	 * @return void
	 */
	public function assets(): void {

		// Future assets will be registered here.

	}

	/**
	 * Register the Artist Portal admin menu.
	 *
	 * @return void
	 */
	public function register_admin_menu(): void {

		add_menu_page(
			__( 'Artist Portal', 'servant-artist-platform' ),
			__( 'Artist Portal', 'servant-artist-platform' ),
			'manage_options',
			'sap-artist-portal',
			[ $this, 'render_dashboard' ],
			'dashicons-groups',
			30
		);

	}

	/**
	 * Enqueue Artist Portal assets.
	 *
	 * @param string $hook_suffix Current admin page hook.
	 *
	 * @return void
	 */
	public function enqueue_assets( string $hook_suffix ): void {

		if ( 'toplevel_page_sap-artist-portal' !== $hook_suffix ) {
			return;
		}

		SAP_Asset_Manager::instance()->enqueue_style(
			'artist-dashboard'
		);

	}

	/**
	 * Render the Artist Portal dashboard.
	 *
	 * @return void
	 */
	public function render_dashboard(): void {

		SAP_View::render( 'artist-dashboard' );

	}

	/**
	 * Return the navigation items provided by this module.
	 *
	 * @since 1.0.0
	 *
	 * @return array<int, array<string, mixed>>
	 */
	public function get_navigation_items(): array {

		return [
			[
				'slug'  => 'artists',
				'title' => 'Artists',
				'icon'  => 'users',
				'order' => 20,
				'url'   => admin_url( 'admin.php?page=sap-artist-portal' ),
			],
		];

	}

}