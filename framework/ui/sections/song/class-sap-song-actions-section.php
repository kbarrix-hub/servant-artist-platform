<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-046.5 Song Actions Section
 *
 * Responsibility:
 * Display the primary Song Manager actions.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Song_Actions_Section
 *
 * Song dashboard quick actions.
 *
 * @since 1.0.0
 */
final class SAP_Song_Actions_Section extends SAP_Abstract_Section {

	/**
	 * Render the section.
	 *
	 * @return void
	 */
	public function render(): void {
		?>

		<section class="sap-section">

			<h2 class="sap-section-title">
				Quick Actions
			</h2>

			<div class="sap-button-group">

				<button class="button button-primary">
					New Song
				</button>

				<button class="button">
					Import Songs
				</button>

				<button class="button">
					Song Library
				</button>

			</div>

		</section>

		<?php
	}

}