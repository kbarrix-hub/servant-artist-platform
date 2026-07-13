<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-050.2 New Song Section
 *
 * Responsibility:
 * Display the Song editor.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_New_Song_Section
 *
 * Song editor.
 *
 * @since 1.0.0
 */
final class SAP_New_Song_Section extends SAP_Abstract_Section {

	/**
	 * Render the section.
	 *
	 * @return void
	 */
	public function render(): void {

		$context = $this->get_context();
		$song    = $context['song'] ?? [];

		$is_edit = ! empty( $song );

		$title       = $song['song_title'] ?? '';
		$artist_name = $song['artist_name'] ?? '';
		$song_key    = $song['song_key'] ?? '';
		$song_bpm    = $song['song_bpm'] ?? '';
		$song_status = $song['song_status'] ?? 'draft';
		?>

		<section class="sap-section">

			<h2 class="sap-section-title">
				<?php echo esc_html( $is_edit ? 'Edit Song' : 'New Song' ); ?>
			</h2>

			<p class="description">
				<?php
				echo esc_html(
					$is_edit
						? 'Edit the selected song in your catalog.'
						: 'Create a new song in your catalog.'
				);
				?>
			</p>

			<form method="post" enctype="multipart/form-data">

				<input
	                 type="hidden"
	                 name="sap_action"
	                 value="<?php echo esc_attr( $is_edit ? 'update_song' : 'create_song' ); ?>"
                />

                <?php if ( $is_edit ) : ?>

	                <input
		                 type="hidden"
		                 name="song_id"
		                 value="<?php echo esc_attr( (string) $song['id'] ); ?>"
	                />

                <?php endif; ?>

                <?php wp_nonce_field( 'sap_save_song' ); ?>

				<table class="form-table">

					<tr>
						<th><label for="song_title">Song Title</label></th>
						<td>
							<input
								type="text"
								id="song_title"
								name="song_title"
								class="regular-text"
								value="<?php echo esc_attr( $title ); ?>"
							/>
						</td>
					</tr>

					<tr>
						<th>
							<label for="song_audio">
								Audio File
							</label>
						</th>

						<td>
							<input
								type="file"
								id="song_audio"
								name="song_audio"
								accept="audio/*"
							/>

							<p class="description">
								Upload the audio file for this song.
							</p>
						</td>
					</tr>

					<tr>
						<th><label for="artist_name">Artist</label></th>
						<td>
							<input
								type="text"
								id="artist_name"
								name="artist_name"
								class="regular-text"
								value="<?php echo esc_attr( $artist_name ); ?>"
							/>
						</td>
					</tr>

					<tr>
						<th><label for="song_key">Key</label></th>
						<td>
							<input
								type="text"
								id="song_key"
								name="song_key"
								class="small-text"
								value="<?php echo esc_attr( $song_key ); ?>"
							/>
						</td>
					</tr>

					<tr>
						<th><label for="song_bpm">BPM</label></th>
						<td>
							<input
								type="number"
								id="song_bpm"
								name="song_bpm"
								class="small-text"
								value="<?php echo esc_attr( (string) $song_bpm ); ?>"
							/>
						</td>
					</tr>

					<tr>
						<th><label for="song_status">Status</label></th>
						<td>
							<select id="song_status" name="song_status">
								<option value="draft" <?php selected( $song_status, 'draft' ); ?>>Draft</option>
								<option value="active" <?php selected( $song_status, 'active' ); ?>>Active</option>
								<option value="published" <?php selected( $song_status, 'published' ); ?>>Published</option>
							</select>
						</td>
					</tr>

				</table>

				<p>

					<button
						type="submit"
						class="button button-primary"
					>
						<?php echo esc_html( $is_edit ? 'Update Song' : 'Save Song' ); ?>
					</button>

				</p>

			</form>

		</section>

		<?php

	}

}