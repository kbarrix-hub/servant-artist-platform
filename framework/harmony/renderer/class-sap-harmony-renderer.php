<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Harmony Engine
 * Renderer
 *
 * Responsible for rendering Harmony layouts.
 *
 * @package ServantArtistPlatform
 */

defined( 'ABSPATH' ) || exit;

/**
 * Harmony Renderer.
 */
final class SAP_Harmony_Renderer {

	/**
	 * Harmony state.
	 *
	 * @var SAP_Harmony_State
	 */
	private SAP_Harmony_State $state;

	/**
	 * Harmony collection.
	 *
	 * @var SAP_Harmony_Collection
	 */
	private SAP_Harmony_Collection $collection;

	/**
	 * Constructor.
	 *
	 * @param SAP_Harmony_State      $state      Harmony state.
	 * @param SAP_Harmony_Collection $collection Harmony collection.
	 */
	public function __construct(
		SAP_Harmony_State $state,
		SAP_Harmony_Collection $collection
	) {

		$this->state      = $state;
		$this->collection = $collection;

	}

	/**
	 * Render the Harmony canvas.
	 *
	 * @return string
	 */
	public function render(): string {

		$selection = $this->state->selected();
		$modules   = $this->collection->get_modules();

		ob_start();

		foreach ( $modules as $module ) {

			$this->render_module(
				$module,
				$selection
			);

		}

		return (string) ob_get_clean();

	}

	/**
	 * Render a single Harmony module.
	 *
	 * @param array<string,string> $module    Module data.
	 * @param array<string,mixed>  $selection Current selection.
	 *
	 * @return void
	 */
	private function render_module(
		array $module,
		array $selection
	): void {

		$classes = 'sap-harmony-module';

		if (
			isset( $selection['id'] ) &&
			$selection['id'] === $module['id']
		) {
			$classes .= ' is-selected';
		}

		?>

		<div
			class="<?php echo esc_attr( $classes ); ?>"
			data-module-id="<?php echo esc_attr( $module['id'] ); ?>"
			data-module-name="<?php echo esc_attr( $module['name'] ); ?>"
			data-module-type="<?php echo esc_attr( $module['type'] ); ?>"
			draggable="true">

			<h2><?php echo esc_html( $module['title'] ); ?></h2>

			<p><?php echo esc_html( $module['content'] ); ?></p>

		</div>

		<?php

	}

}