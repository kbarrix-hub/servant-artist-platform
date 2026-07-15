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
 * Harmony State.
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
			'selected_id'     => null,
			'selected_type'   => null,
			'hover_module'    => null,
			'dragging'        => false,
			'clipboard'       => null,
			'zoom'            => 100,
			'viewport'        => 'desktop',
		];

	}

	/**
	 * Select a module.
	 *
	 * @param string $id     Module ID.
	 * @param string $module Module name.
	 * @param string $type   Module type.
	 * @return void
	 */
	public function select(
		string $id,
		string $module,
		string $type
	): void {

		$this->state['selected_id']     = $id;
		$this->state['selected_module'] = $module;
		$this->state['selected_type']   = $type;

	}

	/**
	 * Clear the current selection.
	 *
	 * @return void
	 */
	public function clear_selection(): void {

		$this->state['selected_id']     = null;
		$this->state['selected_module'] = null;
		$this->state['selected_type']   = null;

	}

	/**
	 * Determine whether something is selected.
	 *
	 * @return bool
	 */
	public function has_selection(): bool {

		return $this->state['selected_id'] !== null;

	}

	/**
	 * Return the selected item.
	 *
	 * @return array<string, mixed>
	 */
	public function selected(): array {

		return [
			'id'     => $this->state['selected_id'],
			'module' => $this->state['selected_module'],
			'type'   => $this->state['selected_type'],
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