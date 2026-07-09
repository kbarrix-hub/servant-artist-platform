<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-050.1 New Song Page
 *
 * Responsibility:
 * Display the New Song editor.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_New_Song_Page
 *
 * Displays the New Song editor.
 *
 * @since 1.0.0
 */
final class SAP_New_Song_Page extends SAP_Abstract_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->title  = 'New Song';
		$this->slug   = 'new-song';
		$this->layout = new SAP_Artist_Layout();

	}

	/**
	 * Initialize the page.
	 *
	 * @return void
	 */
	public function initialize(): void {

		$this->layout->register_section(
			new SAP_New_Song_Section()
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