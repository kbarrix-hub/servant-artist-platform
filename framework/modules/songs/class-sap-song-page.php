<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-046.1 Song Page
 *
 * Responsibility:
 * Represents the Song Manager homepage.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Song_Page
 *
 * Song Manager homepage implementation.
 *
 * @since 1.0.0
 */
final class SAP_Song_Page extends SAP_Abstract_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->title  = 'Songs';
		$this->slug   = 'songs';
		$this->layout = new SAP_Artist_Layout();

	}

	/**
	 * Initialize the page.
	 *
	 * @return void
	 */
	public function initialize(): void {

		$this->layout->register_section(
	        new SAP_Song_Hero_Section()
		);

	}

	/**
	 * Render the page.
	 *
	 * @return void
	 */
	public function render(): void {

		$this->layout->set_context(
			$this->get_context()
		);

		$this->layout->render();

	}

}