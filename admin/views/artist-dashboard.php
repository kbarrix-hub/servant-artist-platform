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
 * This file contains presentation only.
 * No business logic should exist here.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="wrap">

	<h1><?php esc_html_e( 'Servant Artist Platform', 'servant-artist-platform' ); ?></h1>

	<p>
		<?php esc_html_e(
			'Welcome to the Artist Portal. Manage your artists, music, releases, media, and communications from one central dashboard.',
			'servant-artist-platform'
		); ?>
	</p>

	<hr>

	<h2><?php esc_html_e( 'Dashboard', 'servant-artist-platform' ); ?></h2>

	<div class="sap-dashboard">

		<div class="sap-card">
			<h3><?php esc_html_e( 'Artists', 'servant-artist-platform' ); ?></h3>
			<p><strong>0</strong></p>
		</div>

		<div class="sap-card">
			<h3><?php esc_html_e( 'Songs', 'servant-artist-platform' ); ?></h3>
			<p><strong>0</strong></p>
		</div>

		<div class="sap-card">
			<h3><?php esc_html_e( 'Releases', 'servant-artist-platform' ); ?></h3>
			<p><strong>0</strong></p>
		</div>

		<div class="sap-card">
			<h3><?php esc_html_e( 'Messages', 'servant-artist-platform' ); ?></h3>
			<p><strong>0</strong></p>
		</div>

	</div>

	<hr>

	<h2><?php esc_html_e( 'Quick Actions', 'servant-artist-platform' ); ?></h2>

	<ul>

		<li><?php esc_html_e( 'Add Artist', 'servant-artist-platform' ); ?></li>

		<li><?php esc_html_e( 'Upload Song', 'servant-artist-platform' ); ?></li>

		<li><?php esc_html_e( 'Create Release', 'servant-artist-platform' ); ?></li>

		<li><?php esc_html_e( 'Media Library', 'servant-artist-platform' ); ?></li>

	</ul>

	<hr>

	<h2><?php esc_html_e( 'Recent Activity', 'servant-artist-platform' ); ?></h2>

	<p>

		<?php esc_html_e(
			'No recent activity.',
			'servant-artist-platform'
		); ?>

	</p>

	<hr>

	<p>

		<strong><?php esc_html_e( 'Version', 'servant-artist-platform' ); ?></strong>

		1.0.0

	</p>

</div>