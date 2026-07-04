<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Module:
 * SAP-104 Artist Manager Interface
 *
 * Responsibility:
 * Defines the business operations available
 * for Artist management.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Interface SAP_Artist_Manager_Interface
 *
 * Defines the business contract for Artist
 * management services.
 *
 * @since 1.0.0
 */
interface SAP_Artist_Manager_Interface {

	/**
	 * Create a new artist.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function create(
		SAP_Artist $artist
	): bool;

	/**
	 * Update an existing artist.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function update(
		SAP_Artist $artist
	): bool;

	/**
	 * Delete an artist.
	 *
	 * @param int $id Artist ID.
	 *
	 * @return bool
	 */
	public function delete(
		int $id
	): bool;

	/**
	 * Publish an artist.
	 *
	 * @param int $id Artist ID.
	 *
	 * @return bool
	 */
	public function publish(
		int $id
	): bool;

	/**
	 * Suspend an artist.
	 *
	 * @param int $id Artist ID.
	 *
	 * @return bool
	 */
	public function suspend(
		int $id
	): bool;

	/**
	 * Archive an artist.
	 *
	 * @param int $id Artist ID.
	 *
	 * @return bool
	 */
	public function archive(
		int $id
	): bool;

	/**
	 * Verify an artist.
	 *
	 * @param int $id Artist ID.
	 *
	 * @return bool
	 */
	public function verify(
		int $id
	): bool;

	/**
	 * Restore an archived artist.
	 *
	 * @param int $id Artist ID.
	 *
	 * @return bool
	 */
	public function restore(
		int $id
	): bool;

}