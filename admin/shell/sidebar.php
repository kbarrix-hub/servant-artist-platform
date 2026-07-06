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

	<div class="sap-sidebar-profile">

	     <div class="sap-profile-avatar">

		     <?php echo esc_html( $user->initials() ); ?>

	     </div>

	     <div class="sap-profile-details">

		     <h3 class="sap-profile-name">

			     <?php echo esc_html( $user->display_name() ); ?>

		     </h3>

		     <p class="sap-profile-role">

			     <?php echo esc_html( $user->title() ); ?>

		     </p>

		     <span class="sap-profile-company">

			     <?php echo esc_html( $user->organization() ); ?>


			</span>

		</div>

	</div>

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
	                        echo SAP_Icon_Manager::render(
		                         (string) $item['icon']
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