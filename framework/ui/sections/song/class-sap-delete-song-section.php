<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-052.4 Delete Song Section
 *
 * Responsibility:
 * Display the Delete Song confirmation interface.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Delete_Song_Section
 *
 * Delete Song confirmation section.
 *
 * @since 1.0.0
 */
final class SAP_Delete_Song_Section extends SAP_Abstract_Section {

	/**
	 * Render the section.
	 *
	 * @return void
	 */
	public function render(): void {

		$context = $this->get_context();

		$song = $context['song'] ?? [];

		if ( empty( $song ) ) {
			?>

			<section class="sap-section">

				<h2 class="sap-section-title">
					Song Not Found
				</h2>

				<p>
					The requested song could not be found.
				</p>

			</section>

			<?php
			return;
		}

		?>

		<section class="sap-section">

			<h2 class="sap-section-title">
				Delete Song
			</h2>

			<p>
				Are you sure you want to permanently delete
				<strong><?php echo esc_html( $song['song_title'] ); ?></strong>?
			</p>

			<form method="post">

				<?php wp_nonce_field( 'sap_delete_song' ); ?>

				<input
					type="hidden"
					name="sap_action"
					value="delete_song"
				/>

				<input
					type="hidden"
					name="song_id"
					value="<?php echo esc_attr( (string) $song['id'] ); ?>"
				/>

				<button
					type="submit"
					class="button button-primary"
				>
					Delete Song
				</button>

				<a
					class="button"
					href="<?php echo esc_url(
						admin_url(
							'admin.php?page=sap-artist-portal&sap_page=songs'
						)
					); ?>"
				>
					Cancel
				</a>

			</form>

		</section>

		<?php

	}

}
