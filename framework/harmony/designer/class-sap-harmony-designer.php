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

	private SAP_Harmony_Document_Store $document_store;
	
	private SAP_Selection_Manager $selection;

	/**
	 * Current drag operation.
	 *
	 * @var array<string,mixed>
	 */
	protected array $drag = [
		'active'   => false,
		'source'   => null,
		'target'   => null,
		'position' => null,
	];

	public function __construct(
	SAP_Harmony_Renderer $renderer,
	SAP_Harmony_Document_Store $document_store,
	SAP_Selection_Manager $selection

    ) {

	$this->renderer       = $renderer;
	$this->document_store = $document_store;
	$this->selection      = $selection;

    }

	public function add_module( string $type ): array {

		$module = SAP_Harmony_Module_Factory::create( $type );

	    $document = $this->document_store->load();

        $document
            ->collection()
            ->add_module( $module );

        $this->document_store->save( $document );

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
	): array {

		$this->selection->select(
			$id,
			$module,
			$type
		);

		return $this->selection->selected();

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

	public function begin_drag( string $module_id ): void {

		$this->drag['active']   = true;
		$this->drag['source']   = $module_id;
		$this->drag['target']   = null;
		$this->drag['position'] = null;

	}

	public function update_drag_target(
		?string $module_id,
		?string $position
	): void {

		$this->drag['target']   = $module_id;
		$this->drag['position'] = $position;

	}

	public function end_drag(): void {

		$this->drag = [
			'active'   => false,
			'source'   => null,
			'target'   => null,
			'position' => null,
		];

	}

	public function get_drag_state(): array {

		return $this->drag;

	}

	/**
	 * Render only the live Harmony canvas.
	 *
	 * @return string
	 */
    public function render_canvas(): string {

	    $this->renderer->set_document(
		    $this->document_store->load()
	    );

	    return $this->renderer->render();

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

		<div class="sap-harmony-live-canvas">

			<div class="sap-harmony-overlay">

				<div
					class="sap-harmony-drop-indicator"
					id="sap-harmony-drop-indicator">
				</div>

			</div>

			<?php echo $this->render_canvas(); ?>

		</div>

		<?php

		return (string) ob_get_clean();
		

	}

}