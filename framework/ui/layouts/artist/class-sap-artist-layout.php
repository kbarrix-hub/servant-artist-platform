<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-016.3 Artist Layout
 *
 * Responsibility:
 * Coordinate the UI Sections that compose the
 * Artist Portal experience.
 *
 * The Layout is responsible for orchestrating
 * Sections. It does not contain presentation
 * logic or business logic.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Artist_Layout
 *
 * Coordinates the Artist Portal layout.
 *
 * @since 1.0.0
 */
final class SAP_Artist_Layout {

	/**
	 * Registered Sections.
	 *
	 * @var array<int, SAP_Section_Interface>
	 */
	private array $sections = [];

	/**
	 * Register a Section with the Layout.
	 *
	 * @param SAP_Section_Interface $section Section instance.
	 *
	 * @return void
	 */
	public function register_section(
		SAP_Section_Interface $section
	): void {

		$this->sections[] = $section;

	}

	/**
	 * Render the Layout.
	 *
	 * Executes each registered Section.
	 *
	 * @return void
	 */
	public function render(): void {

		foreach ( $this->sections as $section ) {

			if ( $section->is_visible() ) {
				$section->render();
			}

		}

	}

}