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
 * Harmony Renderer
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

		return '';

	}

}