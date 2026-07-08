<?php

declare(strict_types=1);

defined( 'ABSPATH' ) || exit;

/**
 * Portal Builder View
 *
 * @var array<int,SAP_Section_Definition> $sections
 */
?>

<div class="sap-builder">

	<h1>Portal Builder</h1>

	<?php foreach ( $sections as $section ) : ?>

		<?php $definition = $section->get_definition(); ?>

		<div class="sap-builder-section">

			<h2><?php echo esc_html( $definition['title'] ); ?></h2>

			<?php foreach ( $definition['fields'] as $field ) : ?>

				<p>

					<label>

						<?php echo esc_html( $field['label'] ); ?>

					</label>

					<br>

					<input
						type="text"
						name="<?php echo esc_attr( $field['id'] ); ?>"
						value=""
					>

				</p>

			<?php endforeach; ?>

		</div>

	<?php endforeach; ?>

</div>