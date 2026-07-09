<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-046.2 Song Hero Section
 *
 * Responsibility:
 * Displays the Song Manager welcome section.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Song_Hero_Section
 *
 * Song dashboard hero section.
 *
 * @since 1.0.0
 */
final class SAP_Song_Hero_Section extends SAP_Abstract_Section {

	/**
	 * Render the section.
	 *
	 * @return void
	 */
	public function render(): void {
		?>
		<section class="sap-song-hero">

			<h2>Songs</h2>

			<p>Welcome to the Song Manager.</p>

		</section>
		<?php
	}

}