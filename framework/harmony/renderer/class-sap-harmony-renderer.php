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
     * Harmony document.
     *
     * @var SAP_Harmony_Document
     */
    private SAP_Harmony_Document $document;

	/**
	 * Constructor.
	 *
	 * @param SAP_Harmony_State      $state      Harmony state.
	 * @param SAP_Harmony_Document $document Harmony document.
	 */
	public function __construct(
	    SAP_Harmony_State $state,
	    SAP_Harmony_Document $document
    ) {

	    $this->state    = $state;
	    $this->document = $document;

    }
 
	/**
     * Replace the current Harmony document.
     *
     * @param SAP_Harmony_Document $document Harmony document.
     *
     * @return void
     */
    public function set_document(
	    SAP_Harmony_Document $document
    ): void {

	    $this->document = $document;

    }

	/**
	 * Render the Harmony canvas.
	 *
	 * @return string
	 */
	public function render(): string {

		$selection = $this->state->selected();

        $modules = $this->document
	        ->collection()
	        ->get_modules();
            error_log(
    'SAP: Renderer module count = ' . count( $modules )
);

		ob_start();

		foreach ( $modules as $module ) {

            // Only render root modules.
            if (
                isset( $module['parent'] ) &&
                null !== $module['parent']
            ) {
                continue;
            }

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

		switch ( $module['type'] ) {

            case 'section':

                $classes .= ' sap-harmony-section';

                if ( ! empty( $module['layout'] ) ) {

                    $classes .= ' layout-' . sanitize_html_class(
                    (string) $module['layout']
                );

            }

            break;

        case 'row':
            $classes .= ' sap-harmony-row';
            break;

        case 'column':

    $classes .= ' sap-harmony-column';

    $width = $module['width'] ?? 'auto';

    $allowed_widths = [
        'auto',
        '25',
        '33',
        '50',
        '66',
        '75',
        '100',
    ];

    if ( ! in_array( $width, $allowed_widths, true ) ) {
        $width = 'auto';
    }

    if ( 'auto' !== $width ) {

        $classes .= ' sap-column-width-' .
            sanitize_html_class( $width );

    }

    break;

        }

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
            data-module-type="<?php echo esc_attr( $module['type'] ); ?>">

        <?php

if (
    isset( $selection['id'] ) &&
    $selection['id'] === $module['id']
) {

?>

<div class="sap-harmony-context-toolbar">

    <button
        type="button"
        class="button"
        data-action="edit">

        ✏ Edit

    </button>

    <button
        type="button"
        class="button"
        data-action="duplicate">

        ⧉ Duplicate

    </button>

    <button
        type="button"
        class="button"
        data-action="delete">

        🗑 Delete

    </button>

</div>

<?php

}

?>    

			<?php

if ( 'heading' === $module['type'] ) {

    $level = $module['level'] ?? 'h2';

    $allowed = [
        'h1',
        'h2',
        'h3',
        'h4',
        'h5',
        'h6',
    ];

    if ( ! in_array( $level, $allowed, true ) ) {
        $level = 'h2';
    }

    $alignment = $module['alignment'] ?? 'left';

    printf(
        '<%1$s style="text-align:%2$s;">%3$s</%1$s>',
        esc_attr( $level ),
        esc_attr( $alignment ),
        esc_html( $module['title'] )
    );

} else {

    ?>

    <h2><?php echo esc_html( $module['title'] ); ?></h2>

    <p><?php echo esc_html( $module['content'] ); ?></p>

    <?php

}

?>

            <?php

            if ( $this->is_container( $module ) ) {

                ?>

                <div class="sap-harmony-children">

                    <?php

                    $children = $this->document
                        ->collection()
                        ->get_children( $module['id'] );

    /*
     * Empty column placeholder.
     */
    if (
        'column' === $module['type'] &&
         empty( $children )
    ) {

        ?>

        <div
            class="sap-harmony-empty-column"
            data-column-id="<?php echo esc_attr( $module['id'] ); ?>">

            <div class="sap-harmony-empty-icon">+</div>

            <div class="sap-harmony-empty-title">
            Add Module
            </div>

            <div class="sap-harmony-empty-text">
                Click or drag a module here
            </div>

        </div>

        <?php

    } else {

        foreach ( $children as $child ) {

            $this->render_module(
                $child,
                $selection
            );

        }

    }

                    ?>

                </div>

                <?php

            }

            ?>

        </div>

        <?php

    }

	/**
     * Determine whether a module is a container.
     *
     * @param array<string,mixed> $module Module data.
     *
     * @return bool
     */
    private function is_container(
    array $module
): bool {

    return in_array(
        strtolower(
            (string) $module['type']
        ),
        [
            'website',
            'section',
            'row',
            'column',
        ],
        true
    );

}

}