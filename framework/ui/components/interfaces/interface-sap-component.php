<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-016.2 Component Interface
 *
 * Responsibility:
 * Define the contract implemented by every SAP UI
 * Component.
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
 * Interface SAP_Component_Interface
 *
 * Defines the contract for all SAP UI Components.
 *
 * @since 1.0.0
 */
interface SAP_Component_Interface {

	/**
	 * Initialize the Component.
	 *
	 * @return void
	 */
	public function initialize(): void;

	/**
	 * Render the Component.
	 *
	 * @return void
	 */
	public function render(): void;

	/**
	 * Determine whether the Component is visible.
	 *
	 * @return bool
	 */
	public function is_visible(): bool;

	/**
	 * Return the Component identifier.
	 *
	 * @return string
	 */
	public function get_id(): string;

	/**
	 * Return the Component CSS classes.
	 *
	 * @return array<int, string>
	 */
	public function get_classes(): array;

	/**
	 * Return the Component data.
	 *
	 * @return array<string, mixed>
	 */
	public function get_data(): array;

}