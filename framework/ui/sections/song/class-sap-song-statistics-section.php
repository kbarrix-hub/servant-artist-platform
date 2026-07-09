<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-046.3 Song Statistics Section
 *
 * Responsibility:
 * Displays Song Manager statistics.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Song_Statistics_Section
 *
 * Song statistics dashboard section.
 *
 * @since 1.0.0
 */
final class SAP_Song_Statistics_Section extends SAP_Abstract_Section {

	/**
	 * Render the section.
	 *
	 * @return void
	 */
	public function render(): void {
		?>

		<section class="sap-song-statistics">

			<h2>Statistics</h2>

			<div class="sap-stat-grid">

				<div class="sap-stat-card">
					<h3>Songs</h3>
					<p>0</p>
				</div>

				<div class="sap-stat-card">
					<h3>Published</h3>
					<p>0</p>
				</div>

				<div class="sap-stat-card">
					<h3>Drafts</h3>
					<p>0</p>
				</div>

				<div class="sap-stat-card">
					<h3>Writers</h3>
					<p>0</p>
				</div>

			</div>

		</section>

		<?php
	}

}