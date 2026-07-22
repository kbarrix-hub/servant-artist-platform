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

						<button
	                        class="sap-harmony-module-card"
	                        type="button"
	                        data-module="hero"
                        >

	                        <div class="sap-harmony-module-icon">
		                        🟣
	                        </div>

	                    <div class="sap-harmony-module-content">

		                    <strong>Hero</strong>

		                    <span>Page Header</span>

	                    </div>

                       </button>

                        <button
	                         class="sap-harmony-module-card"
	                         type="button"
	                         data-module="text"
                       >

	                    <div class="sap-harmony-module-icon">
		                    📄
	                    </div>

	                    <div class="sap-harmony-module-content">

		                    <strong>Text</strong>

		                    <span>Rich Content</span>

	                    </div>

                    </button>

                        <button
	                        class="sap-harmony-module-card"
	                        type="button"
	                        data-module="image"
                        >

	                    <div class="sap-harmony-module-icon">
		                   🖼
	                    </div>

	                    <div class="sap-harmony-module-content">

		                    <strong>Image</strong>

		                    <span>Responsive Image</span>

	                    </div>

                    </button>

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