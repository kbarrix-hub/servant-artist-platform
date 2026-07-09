<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-016.5 Artist Home Page
 *
 * Responsibility:
 * Represents the Artist Portal homepage.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Artist_Home_Page
 *
 * Artist homepage implementation.
 *
 * @since 1.0.0
 */
final class SAP_Artist_Home_Page extends SAP_Abstract_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->title  = 'Artist Home';
		$this->slug   = 'artist-home';
		$this->layout = new SAP_Artist_Layout();

	}

	/**
	 * Initialize the page.
	 *
	 * @return void
	 */
	public function initialize(): void {

		$this->layout->register_section(
			new SAP_Hero_Section()
		);

	}

	/**
	 * Render the page.
	 *
	 * @return void
	 */
	public function render(): void {

		$this->layout->render();

	}

}