<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-032.4 Page Provider Interface
 *
 * Responsibility:
 * Defines the contract for framework modules that
 * provide one or more application pages.
 *
 * Modules implementing this interface expose their
 * framework pages to the Page Manager for
 * registration and resolution.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Interface SAP_Page_Provider_Interface
 *
 * Defines the contract for modules that provide
 * framework pages.
 *
 * @since 1.0.0
 */
interface SAP_Page_Provider_Interface {

	/**
	 * Return the framework pages provided by the module.
	 *
	 * @return array<int, SAP_Page_Interface>
	 */
	public function get_pages(): array;

}