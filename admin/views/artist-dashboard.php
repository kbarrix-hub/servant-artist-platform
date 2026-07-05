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

	<h2><?php esc_html_e( 'Artist Portal', 'servant-artist-platform' ); ?></h2>

	<p>
		<?php esc_html_e( 'Welcome to the new Artist Portal.', 'servant-artist-platform' ); ?>
	</p>

	<p>
		<?php
		esc_html_e(
			'This dashboard will become the central location for managing artists, songs, releases, contracts, media, royalties, bookings, and communications.',
			'servant-artist-platform'
		);
		?>
	</p>

	<hr>

	<p>

		<strong><?php esc_html_e( 'Version', 'servant-artist-platform' ); ?></strong>

		1.0.0

	</p>

</div>