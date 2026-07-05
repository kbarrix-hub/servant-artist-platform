<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Application Shell
 * Header
 *
 * SAP-113.2
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

?>

<header class="sap-header">

	<!-- ======================================================
	     Brand
	======================================================= -->

	<div class="sap-header-left">

		<div class="sap-brand">

			<div class="sap-brand-logo">

				SAP

			</div>

			<div class="sap-brand-text">

				<h1>Servant Artist Platform</h1>

				<span>Helping Artists Fulfill Their Calling</span>

			</div>

		</div>

	</div>

	<!-- ======================================================
	     Global Search
	======================================================= -->

	<div class="sap-header-center">

		<div class="sap-search">

			<span class="sap-search-icon">🔍</span>

			<input
				type="search"
				class="sap-search-input"
				placeholder="Search artists, events, songs..."
				autocomplete="off"
			/>

		</div>

	</div>

	<!-- ======================================================
	     Header Actions
	======================================================= -->

	<div class="sap-header-right">

		<button class="sap-header-button" type="button" title="Notifications">

			🔔

		</button>

		<button class="sap-header-button" type="button" title="Settings">

			⚙

		</button>

		<div class="sap-user-menu">

			<div class="sap-avatar">

				KB

			</div>

			<div class="sap-user-details">

				<span class="sap-user-name">

					Kenny

				</span>

				<span class="sap-user-role">

					Administrator

				</span>

			</div>

		</div>

	</div>

</header>