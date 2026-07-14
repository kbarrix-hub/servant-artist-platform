<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-056.1 Artist Profile Biography Section
 *
 * Responsibility:
 * Render the artist biography.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Profile_Bio_Section
 *
 * Artist biography section.
 *
 * @since 1.0.0
 */
final class SAP_Profile_Bio_Section extends SAP_Abstract_Section {

	/**
	 * Render the section.
	 *
	 * @return void
	 */
	public function render(): void {

		$context = $this->get_context();

		$profile = $context['profile'] ?? [];

		$biography = $profile['biography'] ?? '';

		?>

		<section class="sap-section sap-profile-bio">

			<div class="sap-card">

				<h2 class="sap-card-title">
					Biography
				</h2>

				<div class="sap-card-content">

					<?php if ( ! empty( $biography ) ) : ?>

						<p>
							<?php echo esc_html( $biography ); ?>
						</p>

					<?php else : ?>

						<p class="sap-empty-state">
							No biography has been added yet.
						</p>

					<?php endif; ?>

				</div>

			</div>

		</section>

		<?php

	}

}