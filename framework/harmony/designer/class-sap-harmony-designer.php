<?php
declare(strict_types=1);

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

defined( 'ABSPATH' ) || exit;

/**
 * Harmony Designer.
 */
final class SAP_Harmony_Designer {

	/**
	 * Harmony renderer.
	 *
	 * @var SAP_Harmony_Renderer
	 */
	private SAP_Harmony_Renderer $renderer;

	/**
	 * Harmony collection.
	 *
	 * @var SAP_Harmony_Collection
	 */
	private SAP_Harmony_Collection $collection;

	/**
	 * Harmony selection manager.
	 *
	 * @var SAP_Selection_Manager
	 */
	private SAP_Selection_Manager $selection;

	/**
	 * Constructor.
	 *
	 * @param SAP_Harmony_Renderer   $renderer   Harmony renderer.
	 * @param SAP_Harmony_Collection $collection Harmony collection.
	 * @param SAP_Selection_Manager  $selection  Harmony selection manager.
	 */
	public function __construct(
		SAP_Harmony_Renderer $renderer,
		SAP_Harmony_Collection $collection,
		SAP_Selection_Manager $selection
	) {

		$this->renderer   = $renderer;
		$this->collection = $collection;
		$this->selection  = $selection;

	}

	/**
	 * Add a Harmony module.
	 *
	 * @param string $type Module type.
	 *
	 * @return array<string,string>
	 */
	public function add_module( string $type ): array {

		$module = SAP_Harmony_Module_Factory::create( $type );

		$this->collection->add_module( $module );

		$this->selection->select(
			$module['id'],
			$module['name'],
			$module['type']
		);

		return $module;

	}

	/**
	 * Select a module.
	 *
	 * @param string $id     Module ID.
	 * @param string $module Module name.
	 * @param string $type   Module type.
	 *
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
	 * @return array<string,mixed>
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

	ob_start();
	?>

	<div class="sap-harmony-workspace">

		<div class="sap-harmony-toolbar">

			<button
				type="button"
				class="button button-primary sap-add-module">

				+ Add Module

			</button>

			<div class="sap-module-menu">

				<button
					type="button"
					data-module="hero">

					🟣 Hero

				</button>

				<button
					type="button"
					data-module="text">

					📄 Text

				</button>

				<button
					type="button"
					data-module="image">

					🖼 Image

				</button>

			</div>

		</div>

		<?php echo $this->renderer->render(); ?>

	</div>

	<?php

	return (string) ob_get_clean();

}

}