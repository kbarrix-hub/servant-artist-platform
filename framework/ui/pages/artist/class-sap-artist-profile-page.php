<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-031.1 Artist Profile Page
 *
 * Responsibility:
 * Represents the Artist Profile page.
 *
 * The page coordinates the Artist Layout and
 * assembles the sections required to render
 * the Artist Profile.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Artist_Profile_Page
 *
 * Artist Profile page implementation.
 *
 * @since 1.0.0
 */
final class SAP_Artist_Profile_Page implements SAP_Page_Interface {

	/**
	 * Artist Layout.
	 *
	 * @var SAP_Artist_Layout
	 */
	private SAP_Artist_Layout $layout;

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->layout = new SAP_Artist_Layout();

	}

	/**
	 * Initialize the page.
	 *
	 * @return void
	 */
	public function initialize(): void {

		$this->layout->register_section(
			new SAP_Profile_Section()
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

	/**
	 * Return the page title.
	 *
	 * @return string
	 */
	public function get_title(): string {

		return 'Artist Profile';

	}

	/**
	 * Return the page slug.
	 *
	 * @return string
	 */
	public function get_slug(): string {

		return 'artist-profile';

	}

	/**
	 * Return the assigned layout.
	 *
	 * @return SAP_Artist_Layout
	 */
	public function get_layout(): ?object {

		return $this->layout;

	}

}