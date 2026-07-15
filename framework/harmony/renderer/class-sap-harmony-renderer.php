<?php
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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Harmony Renderer.
 */
class SAP_Harmony_Renderer {

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
	 * Render Harmony output.
	 *
	 * @return string
	 */
	public function render(): string {

		$selection = $this->state->selected();

		$is_selected = (
			$selection['id'] === 'hero_001'
		);

		$classes = 'sap-harmony-module';

		if ( $is_selected ) {
			$classes .= ' is-selected';
		}

		ob_start();
		?>

		<div
			class="<?php echo esc_attr( $classes ); ?>"
			data-module-id="hero_001"
			data-module-name="Hero"
			data-module-type="section">

			<h2>Hero Module</h2>

			<p>
				This is the first Harmony module rendered by the
				Harmony Engine.
			</p>

		</div>

		<?php

		return ob_get_clean();

	}

}