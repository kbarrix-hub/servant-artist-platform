<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-036.3
 * Section Definition Interface
 *
 * Responsibility:
 * Defines the contract for editable Portal Builder
 * sections.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Interface SAP_Section_Definition
 */
interface SAP_Section_Definition {

	/**
	 * Return the Builder definition.
	 *
	 * @return array<string,mixed>
	 */
	public function get_definition(): array;

}