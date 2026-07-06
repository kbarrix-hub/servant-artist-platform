<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-016.2 Abstract Component
 *
 * Responsibility:
 * Provide the common functionality shared by all
 * SAP UI Components.
 *
 * Components are the smallest reusable visual
 * building blocks within the SAP UI Framework.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Abstract_Component
 *
 * Base implementation for all SAP UI Components.
 *
 * @since 1.0.0
 */
abstract class SAP_Abstract_Component implements SAP_Component_Interface {

	/**
	 * Component identifier.
	 *
	 * @var string
	 */
	protected string $id = '';

	/**
	 * CSS classes.
	 *
	 * @var array<int, string>
	 */
	protected array $classes = [];

	/**
	 * Component data.
	 *
	 * @var array<string, mixed>
	 */
	protected array $data = [];

	/**
	 * Whether the Component is visible.
	 *
	 * @var bool
	 */
	protected bool $visible = true;

	/**
	 * Initialize the Component.
	 *
	 * @return void
	 */
	public function initialize(): void {

		// Future implementation.

	}

	/**
	 * Determine whether the Component is visible.
	 *
	 * @return bool
	 */
	public function is_visible(): bool {

		return $this->visible;

	}

	/**
	 * Return the Component identifier.
	 *
	 * @return string
	 */
	public function get_id(): string {

		return $this->id;

	}

	/**
	 * Return the Component CSS classes.
	 *
	 * @return array<int, string>
	 */
	public function get_classes(): array {

		return $this->classes;

	}

	/**
	 * Return the Component data.
	 *
	 * @return array<string, mixed>
	 */
	public function get_data(): array {

		return $this->data;

	}

	/**
	 * Render the Component.
	 *
	 * Concrete Components are responsible for
	 * rendering themselves.
	 *
	 * @return void
	 */
	abstract public function render(): void;

}