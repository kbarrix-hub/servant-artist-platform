<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-056.4 Artist Information Section
 *
 * Responsibility:
 * Display artist profile information.
 *
 * @package ServantArtistPlatform
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Artist Information Section.
 */
final class SAP_Profile_Info_Section extends SAP_Abstract_Section {

	/**
	 * Render the section.
	 *
	 * @return void
	 */
	public function render(): void {

		$context = $this->get_context();

		$profile = $context['profile'] ?? [];

		?>

		<section class="sap-section sap-profile-info">

			<div class="sap-card">

				<h2 class="sap-card-title">
					Artist Information
				</h2>

				<table class="widefat striped">

					<tbody>

						<tr>

							<th>Display Name</th>

							<td>
								<?php echo esc_html( $profile['display_name'] ?? '—' ); ?>
							</td>

						</tr>

						<tr>

							<th>Initials</th>

							<td>
								<?php echo esc_html( $profile['initials'] ?? '—' ); ?>
							</td>

						</tr>

						<tr>

							<th>Title</th>

							<td>
								<?php echo esc_html( $profile['title'] ?? '—' ); ?>
							</td>

						</tr>

						<tr>

							<th>Organization</th>

							<td>
								<?php echo esc_html( $profile['organization'] ?? '—' ); ?>
							</td>

						</tr>

					</tbody>

				</table>

			</div>

		</section>

		<?php

	}

}