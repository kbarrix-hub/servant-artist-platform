<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-031.2
 * Profile Section
 *
 * Artist Profile section implementation.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Profile_Section
 *
 * Artist Profile section.
 *
 * @since 1.0.0
 */
final class SAP_Profile_Section extends SAP_Abstract_Section {

	/**
	 * Render the Profile section.
	 *
	 * @return void
	 */
	public function render(): void {

		echo '
		<section class="sap-profile">
			<h1>Artist Profile</h1>
		</section>';

	}

}