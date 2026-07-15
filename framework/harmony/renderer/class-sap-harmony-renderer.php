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

		ob_start();
		?>

		<?php
		$this->render_module(
			'hero_001',
			'Hero',
			'section',
			'Hero Module',
			'This is the first Harmony module rendered by the Harmony Engine.',
			$selection
		);

		$this->render_module(
			'bio_001',
			'Biography',
			'section',
			'Biography Module',
			'This module represents the artist biography section.',
			$selection
		);
		?>

		<?php

		return ob_get_clean();

	}

	/**
	 * Render a Harmony module.
	 *
	 * @param string $id          Module ID.
	 * @param string $name        Module name.
	 * @param string $type        Module type.
	 * @param string $title       Display title.
	 * @param string $content     Module content.
	 * @param array  $selection   Current selection.
	 *
	 * @return void
	 */
	protected function render_module(
		string $id,
		string $name,
		string $type,
		string $title,
		string $content,
		array $selection
	): void {

		$classes = 'sap-harmony-module';

		if ( isset( $selection['id'] ) && $selection['id'] === $id ) {
			$classes .= ' is-selected';
		}
		?>

		<div
			class="<?php echo esc_attr( $classes ); ?>"
			data-module-id="<?php echo esc_attr( $id ); ?>"
			data-module-name="<?php echo esc_attr( $name ); ?>"
			data-module-type="<?php echo esc_attr( $type ); ?>">

			<h2><?php echo esc_html( $title ); ?></h2>

			<p><?php echo esc_html( $content ); ?></p>

		</div>

		<?php
	}

}