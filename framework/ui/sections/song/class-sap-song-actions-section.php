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

				<a
	                 class="button button-primary"
	                 href="<?php echo esc_url( admin_url( 'admin.php?page=sap-artist-portal&sap_page=new-song' ) ); ?>"
                >
	                 New Song
                </a>

				<button class="button">
					Import Songs
				</button>

				<a
	                 class="button"
	                 href="<?php echo esc_url( admin_url( 'admin.php?page=sap-artist-portal&sap_page=song-library' ) ); ?>"
                >
	                 Song Library
                </a>

			</div>

		</section>

		<?php
	}

}