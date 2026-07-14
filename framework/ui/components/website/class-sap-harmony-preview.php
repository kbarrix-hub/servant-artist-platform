<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-058.1
 * Harmony Live Preview Component
 *
 * Responsibility:
 * Render a miniature Harmony Collection homepage inside
 * the Website Designer preview panel.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Harmony_Preview
 *
 * Harmony Collection website preview.
 *
 * @since 1.0.0
 */
final class SAP_Harmony_Preview extends SAP_Abstract_Component {

	/**
	 * Render the Harmony website preview.
	 *
	 * @return void
	 */
	public function render(): void {

		?>

		<div class="sap-harmony-site-preview">

			<header class="sap-harmony-preview-header">

				<div class="sap-harmony-preview-brand">
					🌸 Harmony
				</div>

				<nav class="sap-harmony-preview-navigation">
					<span>Home</span>
					<span>Music</span>
					<span>Videos</span>
					<span>Events</span>
					<span>About</span>
					<span>Contact</span>
				</nav>

			</header>

			<section class="sap-harmony-preview-hero">

				<span class="sap-harmony-preview-eyebrow">
					Official Artist Website
				</span>

				<h4>Artist Name</h4>

				<p>
					Music created with purpose, faith, and heart.
				</p>

				<div class="sap-harmony-preview-buttons">

					<span class="sap-harmony-preview-button is-primary">
						Listen Now
					</span>

					<span class="sap-harmony-preview-button">
						Upcoming Events
					</span>

				</div>

			</section>

			<section class="sap-harmony-preview-content">

				<div class="sap-harmony-preview-block">

					<span class="sap-harmony-preview-label">
						Featured Music
					</span>

					<div class="sap-harmony-preview-song">

						<div class="sap-harmony-preview-artwork">
							♪
						</div>

						<div>
							<strong>Featured Song</strong>
							<small>Latest Release</small>
						</div>

						<span class="sap-harmony-preview-play">
							▶
						</span>

					</div>

				</div>

				<div class="sap-harmony-preview-block">

					<span class="sap-harmony-preview-label">
						About the Artist
					</span>

					<p>
						Artist biography and story will appear here.
					</p>

				</div>

				<div class="sap-harmony-preview-block">

					<span class="sap-harmony-preview-label">
						Upcoming Events
					</span>

					<div class="sap-harmony-preview-event">
						<span>Coming Soon</span>
						<strong>New events will appear here.</strong>
					</div>

				</div>

			</section>

			<footer class="sap-harmony-preview-footer">
				Powered by Servant Artist Platform
			</footer>

		</div>

		<?php

	}

}