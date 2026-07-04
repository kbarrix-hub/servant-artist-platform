<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Module:
 * SAP-110 Artist Assets
 *
 * Responsibility:
 * Register and enqueue CSS and JavaScript assets
 * for the Artists module.
 *
 * This class contains no presentation logic,
 * business logic, or rendering.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Artist_Assets
 *
 * Registers and enqueues Artists module assets.
 *
 * @since 1.0.0
 */
final class SAP_Artist_Assets {

	/**
	 * Register WordPress asset hooks.
	 *
	 * @return void
	 */
	public function register(): void {

		add_action(
			'admin_enqueue_scripts',
			array( $this, 'enqueue_admin_assets' )
		);

		add_action(
			'wp_enqueue_scripts',
			array( $this, 'enqueue_public_assets' )
		);
	}

	/**
	 * Enqueue administration assets.
	 *
	 * @return void
	 */
	public function enqueue_admin_assets(): void {

		// Admin CSS and JavaScript will be registered
		// in a future milestone.
	}

	/**
	 * Enqueue public assets.
	 *
	 * @return void
	 */
	public function enqueue_public_assets(): void {

		// Public CSS and JavaScript will be registered
		// in a future milestone.
	}

}