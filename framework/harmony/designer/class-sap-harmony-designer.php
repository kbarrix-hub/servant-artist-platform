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
	 * Harmony state.
	 *
	 * @var SAP_Harmony_State
	 */
	protected SAP_Harmony_State $state;

	/**
	 * Harmony renderer.
	 *
	 * @var SAP_Harmony_Renderer
	 */
	protected SAP_Harmony_Renderer $renderer;

	/**
	 * Constructor.
	 *
	 * @param SAP_Harmony_State    $state    Harmony state.
	 * @param SAP_Harmony_Renderer $renderer Harmony renderer.
	 */
	public function __construct(
		SAP_Harmony_State $state,
		SAP_Harmony_Renderer $renderer
	) {

		$this->state    = $state;
		$this->renderer = $renderer;

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