<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-061.3.4
 * Harmony Hero Module
 *
 * First Harmony website module.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Harmony Hero Module.
 */
final class SAP_Hero_Module extends SAP_Abstract_Harmony_Module {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->title = 'Hero';

	}

	/**
	 * Render the Hero module.
	 *
	 * @return void
	 */
	public function render(): void {

		?>

		<section class="sap-harmony-module">

			<h3><?php echo esc_html( $this->get_title() ); ?> Module</h3>

			<p>
				Artist hero banner, featured image,
				headline, and primary call-to-action buttons.
			</p>

		</section>

		<?php

	}

}