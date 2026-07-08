<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-036.1
 * Portal Builder Controller
 *
 * Responsibility:
 * Coordinate Portal Builder pages and expose the
 * sections available for editing.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Portal_Builder_Controller
 */
final class SAP_Portal_Builder_Controller {

	/**
	 * Current builder page.
	 *
	 * @var string
	 */
	private string $page;

	/**
	 * Constructor.
	 *
	 * @param string $page Builder page slug.
	 */
	public function __construct( string $page = 'home' ) {

		$this->page = $page;

	}

	/**
	 * Return the page currently being edited.
	 *
	 * @return string
	 */
	public function get_page(): string {

		return $this->page;

	}

	/**
	 * Return the editable sections for the page.
	 *
	 * This is temporary until the Section Registry
	 * is introduced in SAP-036.2.
	 *
	 * @return array<int, array<string, string>>
	 */
	public function get_sections(): array {

		return [
			[
				'type'  => 'hero',
				'title' => 'Hero Section',
			],
		];

	}

}