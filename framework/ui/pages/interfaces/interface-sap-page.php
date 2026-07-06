<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-016.4 Page Interface
 *
 * Responsibility:
 * Define the contract implemented by every SAP UI
 * Page.
 *
 * Pages coordinate Layouts and represent complete
 * application views.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Interface SAP_Page_Interface
 *
 * Defines the contract for all SAP UI Pages.
 *
 * @since 1.0.0
 */
interface SAP_Page_Interface {

	/**
	 * Initialize the Page.
	 *
	 * @return void
	 */
	public function initialize(): void;

	/**
	 * Render the Page.
	 *
	 * @return void
	 */
	public function render(): void;

	/**
	 * Return the Page title.
	 *
	 * @return string
	 */
	public function get_title(): string;

	/**
	 * Return the Page slug.
	 *
	 * @return string
	 */
	public function get_slug(): string;

	/**
	 * Return the Layout assigned to the Page.
	 *
	 * @return object|null
	 */
	public function get_layout();

}