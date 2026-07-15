<?php
/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Harmony Engine
 * Designer
 *
 * Coordinates the visual page designer.
 *
 * @package ServantArtistPlatform
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Harmony Designer.
 */
class SAP_Harmony_Designer {

	/**
	 * Harmony renderer.
	 *
	 * @var SAP_Harmony_Renderer
	 */
	protected SAP_Harmony_Renderer $renderer;

	/**
	 * Harmony selection manager.
	 *
	 * @var SAP_Selection_Manager
	 */
	protected SAP_Selection_Manager $selection;

	/**
	 * Constructor.
	 *
	 * @param SAP_Harmony_Renderer  $renderer  Harmony renderer.
	 * @param SAP_Selection_Manager $selection Harmony selection manager.
	 */
	public function __construct(
		SAP_Harmony_Renderer $renderer,
		SAP_Selection_Manager $selection
	) {

		$this->renderer  = $renderer;
		$this->selection = $selection;

	}

	/**
	 * Select a module.
	 *
	 * @param string $id     Module ID.
	 * @param string $module Module name.
	 * @param string $type   Module type.
	 * @return void
	 */
	public function select_module(
		string $id,
		string $module,
		string $type
	): void {

		$this->selection->select(
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
	public function clear_selection(): void {

		$this->selection->clear();

	}

	/**
	 * Return the current selection.
	 *
	 * @return array<string, mixed>
	 */
	public function selected(): array {

		return $this->selection->selected();

	}

	/**
	 * Determine whether a selection exists.
	 *
	 * @return bool
	 */
	public function has_selection(): bool {

		return $this->selection->has_selection();

	}

	/**
	 * Render the designer.
	 *
	 * @return string
	 */
	public function render(): string {

		return $this->renderer->render();

	}

}