<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-061.4.1
 * Harmony Biography Module
 *
 * @package ServantArtistPlatform
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Biography Module.
 */
final class SAP_Biography_Module extends SAP_Abstract_Harmony_Module {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->title = 'Biography';

	}

	/**
	 * Render module.
	 *
	 * @return void
	 */
	public function render(): void {

		?>

		<section class="sap-harmony-module">

			<h3><?php echo esc_html( $this->get_title() ); ?> Module</h3>

			<p>
				Artist biography, story, ministry,
				and personal information.
			</p>

		</section>

		<?php

	}

}