<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-061.3.5
 * Harmony Preview Component
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Harmony Preview.
 */
final class SAP_Harmony_Preview extends SAP_Abstract_Component {

	/**
	 * Render the Harmony website canvas.
	 *
	 * @return void
	 */
	public function render(): void {

		$renderer = new SAP_Harmony_Renderer();

		$modules = [
			new SAP_Hero_Module(),
		];

		?>

		<div class="sap-harmony-canvas">

			<div class="sap-harmony-canvas-page">

				<div class="sap-harmony-canvas-title">
					🏠 Home Page
				</div>

				<?php
				$renderer->render_modules( $modules );
				?>

			</div>

		</div>

		<?php

	}

}