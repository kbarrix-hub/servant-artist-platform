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

		$this->modules = [

			[
				'id'      => 'hero_001',
				'name'    => 'Hero',
				'type'    => 'section',
				'title'   => 'Hero Module',
				'content' => 'This is the first Harmony module.',
			],

			[
				'id'      => 'bio_001',
				'name'    => 'Biography',
				'type'    => 'section',
				'title'   => 'Biography Module',
				'content' => 'This module represents the artist biography.',
			],

		];

	}

	/**
	 * Return all Harmony modules.
	 *
	 * @return array<int, array<string, string>>
	 */
	public function all(): array {

		return $this->modules;

	}

	/**
	 * Find a module by ID.
	 *
	 * @param string $id Module ID.
	 *
	 * @return array<string, string>|null
	 */
	public function find( string $id ): ?array {

		foreach ( $this->modules as $module ) {

			if ( $module['id'] === $id ) {
				return $module;
			}

		}

		return null;

	}

	/**
	 * Add a Harmony module.
	 *
	 * @param array<string, string> $module Module data.
	 *
	 * @return void
	 */
	public function add( array $module ): void {

		$this->modules[] = $module;

	}

	/**
	 * Remove a Harmony module.
	 *
	 * @param string $id Module ID.
	 *
	 * @return void
	 */
	public function remove( string $id ): void {

		$this->modules = array_values(
			array_filter(
				$this->modules,
				static fn ( array $module ): bool => $module['id'] !== $id
			)
		);

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