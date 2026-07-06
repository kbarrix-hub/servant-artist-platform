<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Artist Portal Dashboard View
 *
 * Responsibility:
 * Render the Artist Portal dashboard.
 *
 * Presentation only.
 * No business logic belongs in this file.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

?>

<<div class="sap-app">
	
	<section class="sap-welcome">

		<h2><?php esc_html_e( 'Welcome Back, Kenny', 'servant-artist-platform' ); ?></h2>

		<p>

			<?php
			esc_html_e(
				'Manage your artists, songs, releases, media, and communications from one central dashboard.',
				'servant-artist-platform'
			);
			?>

		</p>

	</section>

	<section>

		<h2><?php esc_html_e( 'Dashboard', 'servant-artist-platform' ); ?></h2>

		<div class="sap-dashboard">

			<div class="sap-card">

				<h3>👥 <?php esc_html_e( 'Artists', 'servant-artist-platform' ); ?></h3>

				<p>0</p>

				<span><?php esc_html_e( 'Active Artists', 'servant-artist-platform' ); ?></span>

			</div>

			<div class="sap-card">

				<h3>🎵 <?php esc_html_e( 'Songs', 'servant-artist-platform' ); ?></h3>

				<p>0</p>

				<span><?php esc_html_e( 'Song Library', 'servant-artist-platform' ); ?></span>

			</div>

			<div class="sap-card">

				<h3>💿 <?php esc_html_e( 'Releases', 'servant-artist-platform' ); ?></h3>

				<p>0</p>

				<span><?php esc_html_e( 'Published Releases', 'servant-artist-platform' ); ?></span>

			</div>

			<div class="sap-card">

				<h3>💬 <?php esc_html_e( 'Messages', 'servant-artist-platform' ); ?></h3>

				<p>0</p>

				<span><?php esc_html_e( 'Unread Messages', 'servant-artist-platform' ); ?></span>

			</div>

		</div>

	</section>

	<div class="sap-dashboard-panels">

		<section class="sap-panel">

			<h2><?php esc_html_e( 'Quick Actions', 'servant-artist-platform' ); ?></h2>

			<ul>

				<li>➕ <?php esc_html_e( 'Add Artist', 'servant-artist-platform' ); ?></li>

				<li>🎵 <?php esc_html_e( 'Upload Song', 'servant-artist-platform' ); ?></li>

				<li>💿 <?php esc_html_e( 'Create Release', 'servant-artist-platform' ); ?></li>

				<li>📁 <?php esc_html_e( 'Media Library', 'servant-artist-platform' ); ?></li>

			</ul>

		</section>

		<section class="sap-panel">

			<h2><?php esc_html_e( 'Recent Activity', 'servant-artist-platform' ); ?></h2>

			<ul>

				<li>✅ <?php esc_html_e( 'Artist Portal initialized.', 'servant-artist-platform' ); ?></li>

				<li>✅ <?php esc_html_e( 'Framework online.', 'servant-artist-platform' ); ?></li>

				<li>✅ <?php esc_html_e( 'Asset pipeline verified.', 'servant-artist-platform' ); ?></li>

			</ul>

		</section>

	</div>

</div>