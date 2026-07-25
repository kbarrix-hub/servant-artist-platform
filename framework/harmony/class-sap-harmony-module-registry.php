<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Harmony Engine
 * Module Registry
 *
 * Registers the modules available to the Harmony Module Library.
 *
 * @package ServantArtistPlatform
 */

defined( 'ABSPATH' ) || exit;

/**
 * Harmony Module Registry.
 */
final class SAP_Harmony_Module_Registry {

	/**
	 * Registered modules.
	 *
	 * @var array<string,array<string,string>>
	 */
	private array $modules = [];

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->register_defaults();

	}

	/**
	 * Register the default Harmony modules.
	 *
	 * @return void
	 */
	private function register_defaults(): void {

		$this->register(
			[
				'type'        => 'hero',
				'name'        => 'Hero',
				'icon'        => '🟣',
				'description' => 'Page Header',
			]
		);

		$this->register(
			[
				'type'        => 'text',
				'name'        => 'Text',
				'icon'        => '📄',
				'description' => 'Rich Content',
			]
		);

		$this->register(
			[
				'type'        => 'image',
				'name'        => 'Image',
				'icon'        => '🖼',
				'description' => 'Responsive Image',
			]
		);

	}

	/**
	 * Register a Harmony module.
	 *
	 * @param array<string,string> $module Module definition.
	 *
	 * @return void
	 */
	public function register( array $module ): void {

		if ( empty( $module['type'] ) ) {
			return;
		}

		$this->modules[ $module['type'] ] = $module;

	}

	/**
	 * Return all registered modules.
	 *
	 * @return array<string,array<string,string>>
	 */
	public function get_modules(): array {

		return $this->modules;

	}

	/**
	 * Return a single registered module.
	 *
	 * @param string $type Module type.
	 *
	 * @return array<string,string>|null
	 */
	public function get_module( string $type ): ?array {

		return $this->modules[ $type ] ?? null;

	}

}