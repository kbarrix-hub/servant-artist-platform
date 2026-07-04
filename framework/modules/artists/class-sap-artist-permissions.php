<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Module:
 * SAP-106 Artist Permissions
 *
 * Responsibility:
 * Centralize authorization logic for Artist
 * operations.
 *
 * This class provides a single source of truth
 * for Artist permissions throughout the platform.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Artist_Permissions
 *
 * Handles authorization for Artist operations.
 *
 * @since 1.0.0
 */
final class SAP_Artist_Permissions {

	/**
	 * Determine whether an Artist may be viewed.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function can_view(
		SAP_Artist $artist
	): bool {

		return true;
	}

	/**
	 * Determine whether an Artist may be created.
	 *
	 * @return bool
	 */
	public function can_create(): bool {

		return true;
	}

	/**
	 * Determine whether an Artist may be edited.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function can_edit(
		SAP_Artist $artist
	): bool {

		return true;
	}

	/**
	 * Determine whether an Artist may be deleted.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function can_delete(
		SAP_Artist $artist
	): bool {

		return true;
	}

	/**
	 * Determine whether an Artist may be published.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function can_publish(
		SAP_Artist $artist
	): bool {

		return true;
	}

	/**
	 * Determine whether an Artist may be suspended.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function can_suspend(
		SAP_Artist $artist
	): bool {

		return true;
	}

	/**
	 * Determine whether an Artist may be archived.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function can_archive(
		SAP_Artist $artist
	): bool {

		return true;
	}

	/**
	 * Determine whether an Artist may be verified.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function can_verify(
		SAP_Artist $artist
	): bool {

		return true;
	}

}