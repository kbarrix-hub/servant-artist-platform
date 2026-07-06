<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-016.6 Application Shell
 *
 * Responsibility:
 * Coordinate the active application page.
 *
 * The Application Shell is responsible for
 * selecting and rendering the current Page.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Application_Shell
 *
 * Coordinates the active application page.
 *
 * @since 1.0.0
 */
final class SAP_Application_Shell {

	/**
	 * Active Page.
	 *
	 * @var SAP_Page_Interface|null
	 */
	private ?SAP_Page_Interface $page = null;

	/**
	 * Assign the active page.
	 *
	 * @param SAP_Page_Interface $page Page instance.
	 *
	 * @return void
	 */
	public function set_page(
		SAP_Page_Interface $page
	): void {

		$this->page = $page;

	}

	/**
	 * Render the active page.
	 *
	 * @return void
	 */
	public function render(): void {

		if ( $this->page === null ) {
			return;
		}

		$this->page->initialize();

		$this->page->render();

	}

}