<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-073.1
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

		?>

		<section class="sap-section sap-harmony-designer">

			<div class="sap-card">

				<h2 class="sap-card-title">
					🌸 Harmony Website Designer
				</h2>

				<p class="sap-card-subtitle">
					Welcome to the new Harmony Engine.
				</p>

				<div class="sap-harmony-layout">

				<!-- ==========================================
					 Module Library
				========================================== -->

				<aside class="sap-harmony-library">

    <h3>Modules</h3>

    <?php

    $grouped = [];

    foreach ( $designer->get_registered_modules() as $module ) {

        $category = strtolower( $module['category'] ?? 'other' );

        // Hide internal Harmony engine modules.
        if ( 'internal' === $category ) {
            continue;
        }

        $grouped[ $category ][] = $module;

    }

    ?>

    <?php foreach ( $grouped as $category => $modules ) : ?>
        <h4 class="sap-harmony-module-group">

            <?php echo esc_html( strtoupper( $category ) ); ?>

        </h4>

        <?php foreach ( $modules as $module ) : ?>

            <button
                class="sap-harmony-module-card"
                type="button"
                data-module="<?php echo esc_attr( $module['type'] ); ?>">

                <div class="sap-harmony-module-icon">
                    <?php echo esc_html( $module['icon'] ); ?>
                </div>

                <div class="sap-harmony-module-content">

                    <strong>
                        <?php echo esc_html( $module['name'] ); ?>
                    </strong>

                    <span>
                        <?php echo esc_html( $module['description'] ); ?>
                    </span>

                </div>

            </button>

        <?php endforeach; ?>

    <?php endforeach; ?>

</aside>

					<!-- ==========================================
					     Canvas
					========================================== -->

					<div class="sap-harmony-workspace">

						<?php echo wp_kses_post( $designer->render() ); ?>

					</div>

					<!-- ==========================================
					     Inspector
					========================================== -->

					<aside class="sap-card sap-harmony-inspector">

						<h3>Harmony Inspector</h3>

						<div id="sap-harmony-inspector-content">

                              <p>Select a module to edit its properties.</p>

                        </div>

					</aside>

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