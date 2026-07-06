<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Application Shell
 *
 * Master layout used by all SAP admin pages.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="sap-shell">

	<?php require __DIR__ . '/header.php'; ?>

	<?php require __DIR__ . '/sidebar.php'; ?>

	<main class="sap-shell-content">

		<div class="sap-workspace">

			<div class="sap-page">

				<?php

				/**
				 * ------------------------------------------------------------
				 * SAP-017 Rendering Bridge
				 * ------------------------------------------------------------
				 *
				 * Render a framework page when available.
				 * Otherwise fall back to the legacy view.
				 */

				if (
					isset( $framework_page ) &&
					$framework_page instanceof SAP_Page_Interface
				) {

					$framework_page->initialize();

					$framework_page->render();

				} elseif (
					isset( $current_view ) &&
					is_string( $current_view ) &&
					file_exists( $current_view )
				) {

					require $current_view;

				}

				?>

			</div>

		</div>

	</main>

	<?php require __DIR__ . '/footer.php'; ?>

</div>