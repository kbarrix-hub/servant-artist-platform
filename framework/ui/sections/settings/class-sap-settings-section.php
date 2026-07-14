<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-059.2
 * Settings Section
 *
 * @package ServantArtistPlatform
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Settings_Section extends SAP_Abstract_Section {

	/**
	 * Render the Settings page.
	 *
	 * @return void
	 */
	public function render(): void {

		?>

		<section class="sap-section">

			<div class="sap-card">

				<h2 class="sap-card-title">
					⚙️ Settings
				</h2>

				<p class="sap-card-subtitle">
					Configure your Servant Artist Platform preferences.
				</p>

				<hr>

				<p>
					Settings modules will appear here as the platform grows.
				</p>

			</div>

		</section>

		<?php

	}

}