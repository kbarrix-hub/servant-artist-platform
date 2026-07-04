<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Module:
 * SAP-100 Artists Module
 *
 * Responsibility:
 * Registers and boots the Artists module.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Artists_Module
 *
 * Registers the Artists module with the SAP Framework.
 *
 * @since 1.0.0
 */
final class SAP_Artists_Module extends SAP_Abstract_Module {

	/**
	 * Register the module.
	 *
	 * @return void
	 */
	public function register(): void {}

	/**
	 * Boot the module.
	 *
	 * @return void
	 */
	public function boot(): void {

		$this->register_hooks();

		$this->register_assets();

		$this->register_admin();

		$this->register_rest_routes();

		$this->register_permissions();

		$this->register_events();

	}

	/**
	 * Register WordPress hooks.
	 *
	 * @return void
	 */
	private function register_hooks(): void {}

	/**
	 * Register assets.
	 *
	 * @return void
	 */
	private function register_assets(): void {}

	/**
	 * Register admin functionality.
	 *
	 * @return void
	 */
	private function register_admin(): void {}

	/**
	 * Register REST routes.
	 *
	 * @return void
	 */
	private function register_rest_routes(): void {}

	/**
	 * Register permissions.
	 *
	 * @return void
	 */
	private function register_permissions(): void {}

	/**
	 * Register event listeners.
	 *
	 * @return void
	 */
	private function register_events(): void {}

}