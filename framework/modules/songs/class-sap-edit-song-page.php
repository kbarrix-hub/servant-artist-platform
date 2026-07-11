<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-053.1 Edit Song Page
 *
 * Responsibility:
 * Display the Edit Song page.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Edit_Song_Page
 *
 * Edit Song page implementation.
 *
 * @since 1.0.0
 */
final class SAP_Edit_Song_Page extends SAP_Abstract_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->title  = 'Edit Song';
		$this->slug   = 'edit-song';
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