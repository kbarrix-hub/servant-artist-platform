<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Application Shell
 * Sidebar
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

?>

<aside class="sap-sidebar">

	<nav class="sap-sidebar-nav">

		<ul class="sap-sidebar-menu">

			<li class="sap-sidebar-heading">

				Application

			</li>

			<?php foreach ( $navigation_items as $item ) : ?>

				<li class="sap-sidebar-item">

					<a
						class="sap-sidebar-link<?php echo ! empty( $item['active'] ) ? ' is-active' : ''; ?>"
						href="<?php echo esc_url( $item['url'] ); ?>"
					>

						<span class="sap-sidebar-icon">

							<?php
							/**
							 * Temporary icon placeholder.
							 *
							 * SAP-114 will replace this with the
							 * Lucide Icon Renderer.
							 */
							echo esc_html(
								strtoupper(
									substr(
										(string) $item['icon'],
										0,
										2
									)
								)
							);
							?>

						</span>

						<span class="sap-sidebar-title">

							<?php echo esc_html( (string) $item['title'] ); ?>

						</span>

					</a>

				</li>

			<?php endforeach; ?>

		</ul>

	</nav>

</aside>