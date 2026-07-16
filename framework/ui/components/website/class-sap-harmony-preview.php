<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-072.1
 * Harmony Preview Component
 *
 * @package ServantArtistPlatform
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

		$collection = new SAP_Harmony_Collection();

		$collection->add_module(
			new SAP_Hero_Module()
		);

		$collection->add_module(
			new SAP_Biography_Module()
		);

		?>

		<div class="sap-harmony-canvas">

			<div class="sap-harmony-toolbar">

				<button
					type="button"
					class="button button-primary sap-add-module">

					+ Add Module

				</button>

			<div class="sap-module-menu">

	            <button type="button">
		            🟣 Hero
	            </button>

	            <button type="button">
		            📄 Text
	            </button>

	            <button type="button">
		            🖼 Image
	            </button>

            </div>

			</div>

			<div class="sap-harmony-canvas-page">

				<div class="sap-harmony-canvas-title">
					🏠 Home Page
				</div>

				<?php
				$renderer->render_modules(
					$collection->get_modules()
				);
				?>

			</div>

		</div>

		<?php

	}

}