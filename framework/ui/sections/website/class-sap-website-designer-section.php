<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-057.4
 * Harmony Website Designer Dashboard
 *
 * @package ServantArtistPlatform
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Website_Designer_Section extends SAP_Abstract_Section {

	/**
	 * Render the Harmony Website Designer dashboard.
	 *
	 * @return void
	 */
	public function render(): void {

		$services = $this->context['services'];

        $designer = $services->harmony_designer();

		$designer->select_module(
			'hero_001',
			'Hero',
			'section'
		);

		$selection = $designer->selected();

		?>

		<section class="sap-section sap-harmony-designer">

			<div class="sap-card">

				<h2 class="sap-card-title">
					🌸 Harmony Website Designer
				</h2>

				<p class="sap-card-subtitle">
					Welcome to the new Harmony Engine.
				</p>

				<div class="sap-harmony-dashboard">

					<div class="sap-card">

						<h3>Harmony Engine Foundation</h3>

						<p>
							The new Harmony Engine has been successfully initialized.
						</p>

						<hr>

						<h3>Current Harmony Selection</h3>

						<p><strong>ID:</strong> <?php echo esc_html( $selection['id'] ); ?></p>

						<p><strong>Module:</strong> <?php echo esc_html( $selection['module'] ); ?></p>

						<p><strong>Type:</strong> <?php echo esc_html( $selection['type'] ); ?></p>

					</div>

				</div>

				<hr>

				<div class="sap-harmony-actions">

					<button class="button button-primary">
						Publish Website
					</button>

					<button class="button">
						Preview Website
					</button>

					<button class="button">
						Harmony Settings
					</button>

					<button class="button">
						Website Settings
					</button>

				</div>

			</div>

		</section>

		<?php

	}

}