<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-054.1 Page Action Bar
 *
 * Responsibility:
 * Render reusable page-level action buttons for
 * framework pages.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Page_Action_Bar
 *
 * Reusable page action bar component.
 *
 * @since 1.0.0
 */
final class SAP_Page_Action_Bar extends SAP_Abstract_Component {

	/**
	 * Constructor.
	 *
	 * @param array<int, array<string, string>> $actions Page actions.
	 */
	public function __construct( array $actions = [] ) {

		$this->id   = 'sap-page-action-bar';
		$this->data = $actions;

	}

	/**
	 * Render the Page Action Bar.
	 *
	 * @return void
	 */
	public function render(): void {

		if ( empty( $this->data ) ) {
			return;
		}

		?>

		<div class="sap-page-action-bar">

			<?php foreach ( $this->data as $action ) : ?>

				<a
					href="<?php echo esc_url( $action['url'] ?? '#' ); ?>"
					class="<?php echo esc_attr( $action['class'] ?? 'button' ); ?>"
				>
					<?php echo esc_html( $action['label'] ?? '' ); ?>
				</a>

			<?php endforeach; ?>

		</div>

		<?php

	}

}