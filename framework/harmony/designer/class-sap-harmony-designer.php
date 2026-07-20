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

	private SAP_Harmony_Renderer $renderer;

	private SAP_Harmony_Collection $collection;

	private SAP_Selection_Manager $selection;

	public function __construct(
		SAP_Harmony_Renderer $renderer,
		SAP_Harmony_Collection $collection,
		SAP_Selection_Manager $selection
	) {

		$this->renderer   = $renderer;
		$this->collection = $collection;
		$this->selection  = $selection;

	}

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

	public function clear_selection(): void {

		$this->selection->clear();

	}

	public function selected(): array {

		return $this->selection->selected();

	}

	public function has_selection(): bool {

		return $this->selection->has_selection();

	}

	public function render(): string {

		ob_start();
		?>

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

		<div class="sap-harmony-canvas">

			<div class="sap-harmony-live-canvas">

				<?php echo $this->renderer->render(); ?>

			</div>

		</div>

		<?php

		return (string) ob_get_clean();

	}

}