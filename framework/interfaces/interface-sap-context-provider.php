<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-047.1 Context Provider Interface
 *
 * Responsibility:
 * Allow framework modules to contribute data to the
 * Runtime render context.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Interface SAP_Context_Provider_Interface
 *
 * Implemented by modules that contribute
 * runtime render context.
 *
 * @since 1.0.0
 */
interface SAP_Context_Provider_Interface {

	/**
	 * Return context contributed by the module.
	 *
	 * @return array<string, mixed>
	 */
	public function get_context(): array;

}