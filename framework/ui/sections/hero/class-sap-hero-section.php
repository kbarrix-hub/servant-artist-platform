<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-016.3
 * Hero Section
 *
 * First UI section implementation.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Hero_Section extends SAP_Abstract_Section {

	/**
	 * Render the Hero section.
	 *
	 * @return void
	 */
	public function render(): void {

		echo '
		<section class="sap-hero">
			<h1>Hero Section</h1>
		</section>';

	}

}