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
 * Display the New Song editor.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_New_Song_Section
 *
 * New Song editor.
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
		?>

		<section class="sap-section">

			<h2 class="sap-section-title">
				New Song
			</h2>

			<p class="description">
				Create a new song in your catalog.
			</p>

			<form method="post">

				<table class="form-table">

					<tr>
						<th><label for="song_title">Song Title</label></th>
						<td>
							<input
								type="text"
								id="song_title"
								name="song_title"
								class="regular-text"
							/>
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
							/>
						</td>
					</tr>

					<tr>
						<th><label for="song_status">Status</label></th>
						<td>
							<select id="song_status" name="song_status">
								<option value="draft">Draft</option>
								<option value="active">Active</option>
								<option value="published">Published</option>
							</select>
						</td>
					</tr>

				</table>

				<p>

					<button
						type="submit"
						class="button button-primary"
					>
						Save Song
					</button>

				</p>

			</form>

		</section>

		<?php
	}

}