<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-061.3.1
 * Harmony Renderer
 *
 * Responsible for rendering Harmony website modules.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Harmony_Renderer {

	/**
	 * Render a collection of Harmony modules.
	 *
	 * @param array<int, object> $modules Harmony modules.
	 *
	 * @return void
	 */
	public function render_modules( array $modules ): void {

		foreach ( $modules as $module ) {

			if ( is_object( $module ) && method_exists( $module, 'render' ) ) {
				$module->render();
			}

		}

	}

}