<?php
/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Harmony Engine
 * State Manager
 *
 * Central state container for the Harmony visual designer.
 *
 * @package ServantArtistPlatform
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Harmony State
 */
class SAP_Harmony_State {

	/**
	 * State values.
	 *
	 * @var array<string, mixed>
	 */
	protected array $state = [];

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->state = [
			'selected_module' => null,
			'hover_module'    => null,
			'dragging'        => false,
			'clipboard'       => null,
			'zoom'            => 100,
			'viewport'        => 'desktop',
		];

	}

	/**
	 * Get a state value.
	 *
	 * @param string $key State key.
	 * @return mixed
	 */
	public function get( string $key ) {

		return $this->state[ $key ] ?? null;

	}

	/**
	 * Set a state value.
	 *
	 * @param string $key   State key.
	 * @param mixed  $value State value.
	 * @return void
	 */
	public function set( string $key, $value ): void {

		$this->state[ $key ] = $value;

	}

	/**
	 * Return the complete state.
	 *
	 * @return array<string, mixed>
	 */
	public function all(): array {

		return $this->state;

	}

}