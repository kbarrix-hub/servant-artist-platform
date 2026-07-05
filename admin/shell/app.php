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

/*
 * The Router is now available to the
 * Application Shell through SAP_View.
 *
 * Future milestones will use the Router
 * to determine which module view should
 * be rendered inside the workspace.
 */

?>

<div class="sap-shell">

	<?php
	/**
	 * Render the shared application header.
	 */
	require __DIR__ . '/header.php';
	?>

	<?php
	/**
	 * Render the shared application sidebar.
	 */
	require __DIR__ . '/sidebar.php';
	?>

	<main class="sap-shell-content">

		<div class="sap-workspace">

			<div class="sap-page">

				<?php

				/*
				 * Current implementation:
				 * Render the requested view.
				 *
				 * Future implementation:
				 * The Router will determine the
				 * active module view before this
				 * template is rendered.
				 */

				require $current_view;

				?>

			</div>

		</div>

	</main>

	<?php
	/**
	 * Render the shared application footer.
	 */
	require __DIR__ . '/footer.php';
	?>

</div>