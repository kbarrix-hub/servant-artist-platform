<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-061.6.1
 * Harmony Module Library
 *
 * Displays the available Harmony website modules.
 *
 * @package ServantArtistPlatform
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Harmony Module Library.
 */
final class SAP_Module_Library extends SAP_Abstract_Component {

	/**
	 * Render the module library.
	 *
	 * @return void
	 */
	public function render(): void {

		?>

		<div class="sap-module-library">

			<h3>Harmony Modules</h3>

			<ul>

				<li>🏆 Hero</li>

				<li>👤 Biography</li>

				<li>🎵 Music</li>

				<li>🎬 Videos</li>

				<li>📅 Events</li>

				<li>🖼 Gallery</li>

				<li>✉ Contact</li>

				<li>🦶 Footer</li>

			</ul>

		</div>

		<?php

	}

}