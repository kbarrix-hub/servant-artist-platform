<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-061.5.1
 * Harmony Collection
 *
 * Stores the modules that make up a Harmony page.
 *
 * @package ServantArtistPlatform
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Harmony Collection.
 */
final class SAP_Harmony_Collection {

	/**
	 * Harmony modules.
	 *
	 * @var array<int, SAP_Harmony_Module>
	 */
	private array $modules = [];

	/**
	 * Add a module.
	 *
	 * @param SAP_Harmony_Module $module Module instance.
	 *
	 * @return void
	 */
	public function add_module( SAP_Harmony_Module $module ): void {

		$this->modules[] = $module;

	}

	/**
	 * Return all modules.
	 *
	 * @return array<int, SAP_Harmony_Module>
	 */
	public function get_modules(): array {

		return $this->modules;

	}

}