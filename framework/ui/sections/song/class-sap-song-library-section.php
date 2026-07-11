<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-048.2 Song Library Section
 *
 * Responsibility:
 * Display the Song Library.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Song_Library_Section
 *
 * Song Library section.
 *
 * @since 1.0.0
 */
final class SAP_Song_Library_Section extends SAP_Abstract_Section {

	/**
	 * Render the section.
	 *
	 * @return void
	 */
	public function render(): void {

		 $context = $this->get_context();

         $songs = $context['songs'] ?? [];
		?>

		<section class="sap-section">

			<div class="sap-section-header">

				<h2 class="sap-section-title">
					Song Library
				</h2>

				<a
					class="button button-primary"
					href="<?php echo esc_url( admin_url( 'admin.php?page=sap-artist-portal&sap_page=new-song' ) ); ?>"
				>
					+ New Song
				</a>

			</div>

			<p class="description">
				Manage every song in your catalog from one place.
			</p>

			<p>

				<input
					type="search"
					class="regular-text"
					placeholder="Search songs..."
				/>

			</p>

			<table class="widefat striped">

				<thead>

					<tr>
						<th style="width:35%;">Title</th>
						<th>Artist</th>
						<th>Key</th>
						<th>BPM</th>
						<th>Status</th>
						<th style="width:140px;">Actions</th>
					</tr>

				</thead>

				<tbody>

				<?php if ( empty( $songs ) ) : ?>

					<tr>

						<td colspan="6" style="text-align:center;padding:40px;">

							<strong>No songs found.</strong>

							<br><br>

							Click <strong>New Song</strong> to create your first song.

						</td>

					</tr>

				<?php else : ?>

					<?php foreach ( $songs as $song ) : ?>

						<tr>

							<td><?php echo esc_html( $song['song_title'] ); ?></td>

							<td><?php echo esc_html( $song['artist_name'] ); ?></td>

							<td><?php echo esc_html( $song['song_key'] ); ?></td>

							<td><?php echo esc_html( (string) $song['song_bpm'] ); ?></td>

							<td><?php echo esc_html( ucfirst( $song['song_status'] ) ); ?></td>

							<td>

								<a
	                                 href="<?php echo esc_url(
		                                 admin_url(
			                                 'admin.php?page=sap-artist-portal&sap_page=edit-song&song_id=' .
			                                 (int) $song['id']
		                                 )
	                                 ); ?>"
                                >
	                                 Edit
                                </a>

							</td>

						</tr>

					<?php endforeach; ?>

				<?php endif; ?>

				</tbody>

			</table>

		</section>

		<?php

	}

}