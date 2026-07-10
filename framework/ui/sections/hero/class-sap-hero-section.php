<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-039.1
 * Artist Dashboard Hero Section
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Hero_Section extends SAP_Abstract_Section implements SAP_Section_Definition {

	/**
	 * Return the Builder definition.
	 *
	 * @return array<string,mixed>
	 */
	public function get_definition(): array {

		return [
			'id'    => 'hero',
			'title' => 'Hero Section',

			'fields' => [

				[
					'id'    => 'headline',
					'label' => 'Headline',
					'type'  => 'text',
				],

				[
					'id'    => 'subheadline',
					'label' => 'Subheadline',
					'type'  => 'textarea',
				],

				[
					'id'    => 'button_text',
					'label' => 'Button Text',
					'type'  => 'text',
				],

				[
					'id'    => 'button_url',
					'label' => 'Button URL',
					'type'  => 'url',
				],

				[
					'id'    => 'background_image',
					'label' => 'Background Image',
					'type'  => 'media',
				],

			],
		];

	}

	/**
	 * Render the Hero section.
	 *
	 * @return void
	 */
	public function render(): void {

	$dashboard = $this->get_context()['dashboard'] ?? [
	     'songs'    => 0,
	     'releases' => 0,
	     'events'   => 0,
	     'messages' => 0,
     ];

		?>

		<section class="sap-welcome">

		<h2>Welcome back, Kenny 👋</h2>

		<p>
			Manage your artists, music, releases,
			bookings, and ministry from one place.
		</p>

		<div class="sap-hero-actions">

			<a
	             class="sap-btn sap-btn-primary"
	             href="<?php echo esc_url( admin_url( 'admin.php?page=sap-artist-portal&sap_page=new-song' ) ); ?>"
            >
	             Upload Song
            </a>

			<a
	             class="sap-btn sap-btn-secondary"
	             href="<?php echo esc_url( admin_url( 'admin.php?page=sap-artist-portal&sap_page=song-library' ) ); ?>"
            >
	             New Release
            </a>

			<a
	             class="sap-btn sap-btn-secondary"
	             href="<?php echo esc_url( admin_url( 'admin.php?page=sap-artist-portal&sap_page=artist-profile' ) ); ?>"
            >
	             View Profile
            </a>

		</div>

	</section>

	<div class="sap-dashboard">

		<div class="sap-card">

			<h3>Songs</h3>

			<p><?php echo esc_html( (string) $dashboard['songs'] ); ?></p>

			<span>Total songs in your catalog</span>

		</div>

		<div class="sap-card">

			<h3>Releases</h3>

			<p><?php echo esc_html( (string) $dashboard['releases'] ); ?></p>

			<span>Published releases</span>

		</div>

		<div class="sap-card">

			<h3>Events</h3>

			<p><?php echo esc_html( (string) $dashboard['events'] ); ?></p>

			<span>Upcoming events</span>

		</div>

		<div class="sap-card">

			<h3>Messages</h3>

			<p><?php echo esc_html( (string) $dashboard['messages'] ); ?></p>

			<span>Unread conversations</span>

		</div>

	</div>

	<div class="sap-dashboard-panels">

		<div class="sap-panel">

			<h2>Recent Activity</h2>

			<ul>

				<li>🎵 Uploaded "Good Dirt"</li>

				<li>💿 New release created</li>

				<li>👤 Artist profile updated</li>

				<li>📅 Booking request received</li>

			</ul>

		</div>

		<div class="sap-panel">

			<h2>Upcoming Events</h2>

			<ul>

				<li>July 12 — Mia Waddell</li>

				<li>July 18 — Studio Session</li>

				<li>August 2 — Live Performance</li>

				<li>August 15 — Album Release</li>

			</ul>

		</div>
		
	</div>

	<?php

		

	}

}