<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-057.4
 * Harmony Website Designer Dashboard
 *
 * @package ServantArtistPlatform
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Website_Designer_Section extends SAP_Abstract_Section {

	/**
	 * Render the Harmony Website Designer dashboard.
	 *
	 * @return void
	 */
	public function render(): void {

		?>

		<section class="sap-section sap-harmony-designer">

			<div class="sap-card">

				<h2 class="sap-card-title">
					🌸 Harmony Website Designer
				</h2>

				<p class="sap-card-subtitle">
					Welcome to the new Harmony Engine.
				</p>

				<div class="sap-harmony-dashboard">

					<div class="sap-card">

						<h3>Harmony Engine Foundation</h3>

						<p>
							The new Harmony Engine has been successfully initialized.
						</p>

						<p>
							This workspace will become the home of the visual designer,
							module library, live canvas, inspector, templates,
							themes, collections, click-to-select, and drag-and-drop.
						</p>

						<div class="notice notice-info inline">

							<p>

								<strong>SAP-063A</strong><br>

								Harmony Engine Foundation installed successfully.

							</p>

						</div>

					</div>

				</div>

				<hr>

				<div class="sap-harmony-actions">

					<button class="button button-primary">
						Publish Website
					</button>

					<button class="button">
						Preview Website
					</button>

					<button class="button">
						Harmony Settings
					</button>

					<button class="button">
						Website Settings
					</button>

				</div>

			</div>

		</section>

		<?php

	}

}