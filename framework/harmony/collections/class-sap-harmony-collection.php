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
	 * Move a module to a new position.
	 *
	 * @param int $from Source index.
	 * @param int $to   Destination index.
	 *
	 * @return void
	 */
	public function move( int $from, int $to ): void {

		if (
			! isset( $this->modules[ $from ] ) ||
			! isset( $this->modules[ $to ] )
		) {
			return;
		}

		$module = $this->modules[ $from ];

		array_splice( $this->modules, $from, 1 );
		array_splice( $this->modules, $to, 0, [ $module ] );

	}

}