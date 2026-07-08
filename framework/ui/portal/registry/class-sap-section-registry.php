<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-036.2
 * Section Registry
 *
 * Responsibility:
 * Register and provide editable portal sections.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Section_Registry
 */
final class SAP_Section_Registry {

	/**
	 * Registered sections.
	 *
	 * @var array<int, SAP_Section_Definition>
	 */
	private array $sections = [];

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->register_defaults();

	}

	/**
	 * Register the default portal sections.
	 *
	 * @return void
	 */
	private function register_defaults(): void {

		$this->sections[] = new SAP_Hero_Section();

	}

	/**
	 * Return all registered sections.
	 *
	 * @return array<int, SAP_Section_Definition>
	 */
	public function all(): array {

		return $this->sections;

	}

}