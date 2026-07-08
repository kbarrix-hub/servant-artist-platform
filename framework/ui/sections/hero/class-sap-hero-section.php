<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-016.3
 * Hero Section
 *
 * First UI section implementation.
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

		echo '
		<section class="sap-hero">
			<h1>Hero Section</h1>
		</section>';

	}

}