<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-016.1 Section Interface
 *
 * Responsibility:
 * Define the contract implemented by every SAP UI
 * Section.
 *
 * Sections are responsible for coordinating one or
 * more UI Components that together form a logical
 * area of a page.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Interface SAP_Section_Interface
 *
 * Defines the contract for all SAP UI Sections.
 *
 * @since 1.0.0
 */
interface SAP_Section_Interface {

	/**
	 * Initialize the Section.
	 *
	 * @return void
	 */
	public function initialize(): void;

	/**
	 * Render the Section.
	 *
	 * @return void
	 */
	public function render(): void;

	/**
	 * Determine whether the Section should be displayed.
	 *
	 * @return bool
	 */
	public function is_visible(): bool;

	/**
	 * Return the Section title.
	 *
	 * @return string
	 */
	public function get_title(): string;

	/**
	 * Return the Section slug.
	 *
	 * @return string
	 */
	public function get_slug(): string;

	/**
	 * Return the Section components.
	 *
	 * @return array
	 */
	public function get_components(): array;

}