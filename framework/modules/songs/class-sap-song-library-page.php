<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-048.1 Song Library Page
 *
 * Responsibility:
 * Display the Song Library.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Song_Library_Page
 *
 * Song Library page.
 *
 * @since 1.0.0
 */
final class SAP_Song_Library_Page extends SAP_Abstract_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->title = 'Song Library';
		$this->slug  = 'song-library';

		$this->layout = new SAP_Artist_Layout();

	}

	/**
	 * Initialize the page.
	 *
	 * @return void
	 */
	public function initialize(): void {

		$this->layout->register_section(
			new SAP_Song_Library_Section()
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