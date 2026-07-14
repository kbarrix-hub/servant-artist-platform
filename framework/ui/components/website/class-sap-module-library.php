<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-062.4
 * Harmony Module Library
 *
 * Displays the available Harmony website modules.
 *
 * @package ServantArtistPlatform
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Harmony Module Library.
 */
final class SAP_Module_Library extends SAP_Abstract_Component {

	/**
	 * Render the Harmony module library.
	 *
	 * @return void
	 */
	public function render(): void {

		$modules = [
			[
				'icon'        => '🏆',
				'title'       => 'Hero',
				'description' => 'Large banner and headline.',
			],
			[
				'icon'        => '👤',
				'title'       => 'Biography',
				'description' => 'Artist story and information.',
			],
			[
				'icon'        => '🎵',
				'title'       => 'Music',
				'description' => 'Songs and streaming platforms.',
			],
			[
				'icon'        => '🎬',
				'title'       => 'Videos',
				'description' => 'Music videos and media.',
			],
			[
				'icon'        => '📅',
				'title'       => 'Events',
				'description' => 'Upcoming performances.',
			],
			[
				'icon'        => '🖼',
				'title'       => 'Gallery',
				'description' => 'Photos and image galleries.',
			],
			[
				'icon'        => '✉',
				'title'       => 'Contact',
				'description' => 'Contact information and forms.',
			],
			[
				'icon'        => '🦶',
				'title'       => 'Footer',
				'description' => 'Footer links and copyright.',
			],
		];

		?>

		<div class="sap-module-library">

			<h3>Harmony Modules</h3>

			<div class="sap-harmony-module-list">

				<?php foreach ( $modules as $module ) : ?>

					<div class="sap-harmony-module-card">

						<div class="sap-harmony-module-icon">
							<?php echo esc_html( $module['icon'] ); ?>
						</div>

						<div class="sap-harmony-module-content">

							<h4>
								<?php echo esc_html( $module['title'] ); ?>
							</h4>

							<p>
								<?php echo esc_html( $module['description'] ); ?>
							</p>

						</div>

					</div>

				<?php endforeach; ?>

			</div>

		</div>

		<?php

	}

}