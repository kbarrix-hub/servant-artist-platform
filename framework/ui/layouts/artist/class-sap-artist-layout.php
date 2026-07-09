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
	 * Runtime render context.
	 *
	 * @var array<string, mixed>
	 */
	private array $context = [];

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
	 * Assign the Runtime render context.
	 *
	 * @param array<string, mixed> $context Runtime context.
	 *
	 * @return void
	 */
	public function set_context( array $context ): void {

		$this->context = $context;

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

			if ( method_exists( $section, 'set_context' ) ) {

				$section->set_context( $this->context );

			}

			if ( $section->is_visible() ) {

				$section->render();

			}

		}

	}

}