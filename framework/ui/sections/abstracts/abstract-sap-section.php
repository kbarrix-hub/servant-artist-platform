<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-016.1 Abstract Section
 *
 * Responsibility:
 * Provide the common functionality shared by all
 * SAP UI Sections.
 *
 * Sections coordinate one or more UI Components
 * that together render a logical portion of an
 * application page.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Abstract_Section
 *
 * Base implementation for all SAP UI Sections.
 *
 * @since 1.0.0
 */
abstract class SAP_Abstract_Section implements SAP_Section_Interface {

	/**
	 * Section title.
	 *
	 * @var string
	 */
	protected string $title = '';

	/**
	 * Section slug.
	 *
	 * @var string
	 */
	protected string $slug = '';

	/**
	 * Registered UI Components.
	 *
	 * @var array<int, mixed>
	 */
	protected array $components = [];

	/**
	 * Whether the Section is visible.
	 *
	 * @var bool
	 */
	protected bool $visible = true;

	/**
	 * Initialize the Section.
	 *
	 * @return void
	 */
	public function initialize(): void {
		// Future implementation.
	}

	/**
	 * Determine whether the Section should be displayed.
	 *
	 * @return bool
	 */
	public function is_visible(): bool {

		return $this->visible;

	}

	/**
	 * Return the Section title.
	 *
	 * @return string
	 */
	public function get_title(): string {

		return $this->title;

	}

	/**
	 * Return the Section slug.
	 *
	 * @return string
	 */
	public function get_slug(): string {

		return $this->slug;

	}

	/**
	 * Return the registered Components.
	 *
	 * @return array<int, mixed>
	 */
	public function get_components(): array {

		return $this->components;

	}

	/**
	 * Render the Section.
	 *
	 * Concrete Sections must implement their own
	 * rendering behavior.
	 *
	 * @return void
	 */
	abstract public function render(): void;

}