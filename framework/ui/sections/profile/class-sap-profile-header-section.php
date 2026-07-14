<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-055.1 Artist Profile Header Section
 *
 * Responsibility:
 * Render the Artist Profile header and
 * quick actions.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Profile_Header_Section
 *
 * Artist Profile header.
 *
 * @since 1.0.0
 */
final class SAP_Profile_Header_Section extends SAP_Abstract_Section {

	/**
	 * Render the section.
	 *
	 * @return void
	 */
	public function render(): void {

		$context = $this->get_context();

		$profile = $context['profile'] ?? [];

		?>

		<section class="sap-section sap-profile-header">

			<div class="sap-profile-header-card">

				<div class="sap-profile-avatar">

					<?php echo esc_html( $profile['initials'] ?? '👤' ); ?>

				</div>

				<div class="sap-profile-details">

					<h2 class="sap-profile-name">

						<?php echo esc_html( $profile['display_name'] ?? 'Artist Name' ); ?>

					</h2>

					<p class="sap-profile-meta">

						<?php
						echo esc_html(
							$profile['title'] ?? 'Artist'
						);

						if ( ! empty( $profile['organization'] ) ) {
							echo ' • ' . esc_html( $profile['organization'] );
						}
						?>

					</p>

				</div>

				<div class="sap-profile-actions">

					<?php

					$action_bar = new SAP_Page_Action_Bar(
						[
							[
								'label' => 'Edit Artist',
								'url'   => '#',
								'class' => 'button button-primary',
							],
							[
								'label' => 'Songs',
								'url'   => '#',
								'class' => 'button',
							],
							[
								'label' => 'Media',
								'url'   => '#',
								'class' => 'button',
							],
						]
					);

					$action_bar->render();

					?>

				</div>

			</div>

		</section>

		<?php

	}

}