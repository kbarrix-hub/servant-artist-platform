<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Harmony Engine
 * Module Collection
 *
 * @package ServantArtistPlatform
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Harmony_Collection {

	/**
	 * Harmony modules.
	 *
	 * @var array<int, array<string, string>>
	 */
	private array $modules = [];

	/**
	 * Constructor.
	 */
	public function __construct() {

    $this->modules = [];

	}
	
	/**
	 * Return all Harmony modules.
	 *
	 * @return array<int, array<string, string>>
	 */
	public function get_modules(): array {

		return $this->modules;

	}

	/**
	 * Return a single Harmony module.
	 *
	 * @param string $id Module ID.
	 *
	 * @return array<string, string>|null
	 */
	public function get_module( string $id ): ?array {

		foreach ( $this->modules as $module ) {

			if ( $module['id'] === $id ) {
				return $module;
			}

		}

		return null;

	}

	/**
	 * Determine whether a module exists.
	 *
	 * @param string $id Module ID.
	 *
	 * @return bool
	 */
	public function has_module( string $id ): bool {

		foreach ( $this->modules as $module ) {

			if ( $module['id'] === $id ) {
				return true;
			}

		}

		return false;

	}

	/**
	 * Add a Harmony module.
	 *
	 * @param array<string, string> $module Module data.
	 *
	 * @return void
	 */
	public function add_module( array $module ): void {

		$this->modules[] = $module;

	}

	/**
	 * Remove a Harmony module.
	 *
	 * @param string $id Module ID.
	 *
	 * @return void
	 */
	public function remove_module( string $id ): void {

		$this->modules = array_values(
			array_filter(
				$this->modules,
				static fn ( array $module ): bool => $module['id'] !== $id
			)
		);

	}

    /**
	 * Update a Harmony module.
	 *
	 * @param string               $id      Module ID.
	 * @param array<string,string> $changes Updated module values.
	 *
	 * @return void
	 */
	public function update_module(
		string $id,
		array $changes
	): void {

		foreach ( $this->modules as $index => $module ) {

			if ( $module['id'] !== $id ) {
				continue;
			}

			$this->modules[ $index ] = array_merge(
				$module,
				$changes
			);

			return;

		}

	}
	/**
     * Move a Harmony module relative to another module.
     *
     * @param string $source_id Source module ID.
     * @param string $target_id Target module ID.
     * @param string $position  before|after
     *
     * @return bool
    */
    public function move_module(
	string $source_id,
	string $target_id,
	string $position = 'before'
    ): bool {

	if ( $source_id === $target_id ) {
		return false;
	}

	$source_index = null;
	$target_index = null;

	foreach ( $this->modules as $index => $module ) {

		if ( $module['id'] === $source_id ) {
			$source_index = $index;
		}

		if ( $module['id'] === $target_id ) {
			$target_index = $index;
		}

	}

	if ( null === $source_index || null === $target_index ) {
		return false;
	}

	$module = $this->modules[ $source_index ];

	array_splice( $this->modules, $source_index, 1 );

	if ( $source_index < $target_index ) {
		$target_index--;
	}

	if ( 'after' === $position ) {
		$target_index++;
	}

	array_splice(
		$this->modules,
		$target_index,
		0,
		[ $module ]
	);

	return true;

}

}