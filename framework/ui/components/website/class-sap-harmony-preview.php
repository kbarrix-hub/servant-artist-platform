<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-061.1
 * Harmony Canvas Component
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Harmony_Preview
 *
 * Renders the Harmony Website Designer canvas.
 *
 * @since 1.0.0
 */
final class SAP_Harmony_Preview extends SAP_Abstract_Component {

	/**
	 * Render the Harmony website canvas.
	 *
	 * @return void
	 */
	public function render(): void {

		?>

		<div class="sap-harmony-canvas">

			<div class="sap-harmony-canvas-page">

				<div class="sap-harmony-canvas-title">
					🏠 Home Page
				</div>

				<div class="sap-harmony-module">
					<h3>Hero Module</h3>

					<p>
						Artist hero banner, call-to-action buttons, and featured image.
					</p>
				</div>

				<div class="sap-harmony-module">
					<h3>Biography Module</h3>

					<p>
						Artist biography and story will appear here.
					</p>
				</div>

				<div class="sap-harmony-module">
					<h3>Featured Music Module</h3>

					<p>
						Songs, albums, and music player.
					</p>
				</div>

				<div class="sap-harmony-module">
					<h3>Footer Module</h3>

					<p>
						Social links, copyright, and contact information.
					</p>
				</div>

			</div>

		</div>

		<?php

	}

}