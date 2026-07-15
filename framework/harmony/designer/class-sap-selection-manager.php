<?php
/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Harmony Engine
 * Selection Manager
 *
 * Manages module selection within the Harmony designer.
 *
 * @package ServantArtistPlatform
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Harmony Selection Manager.
 */
class SAP_Selection_Manager {

	/**
	 * Harmony state.
	 *
	 * @var SAP_Harmony_State
	 */
	protected SAP_Harmony_State $state;

	/**
	 * Constructor.
	 *
	 * @param SAP_Harmony_State $state Harmony state.
	 */
	public function __construct( SAP_Harmony_State $state ) {

		$this->state = $state;

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

		$this->state->select(
			$id,
			$module,
			$type
		);

	}

	/**
	 * Clear the current selection.
	 *
	 * @return void
	 */
	public function clear(): void {

		$this->state->clear_selection();

	}

	/**
	 * Determine whether anything is selected.
	 *
	 * @return bool
	 */
	public function has_selection(): bool {

		return $this->state->has_selection();

	}

	/**
	 * Return the current selection.
	 *
	 * @return array<string, mixed>
	 */
	public function selected(): array {

		return $this->state->selected();

	}

}