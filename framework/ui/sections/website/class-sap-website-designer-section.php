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
					Design and manage your artist website using the Harmony Collection.
				</p>

				<div class="sap-harmony-dashboard">

					<!-- Website Pages -->
					<div class="sap-harmony-panel">

						<h3>Website Pages</h3>

						<ul class="sap-harmony-list">
							<li>🏠 Home</li>
							<li>🎵 Music</li>
							<li>🎬 Videos</li>
							<li>📅 Events</li>
							<li>👤 About</li>
							<li>✉ Contact</li>
						</ul>

					</div>

					<!-- Live Preview -->
					<div class="sap-harmony-panel sap-harmony-preview">

						<h3>Website Preview</h3>

						<div class="sap-preview-window">

							<?php

	                        $preview = new SAP_Harmony_Preview();
	                        $preview->render();

	                        ?>
							
						</div>

					</div>

					<!-- Module Library -->
					<div class="sap-designer-sidebar">

	                    <?php

	                    $library = new SAP_Module_Library();

	                    $library->render();

	                    ?>

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