<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Module:
 * SAP-102 Artist Repository Interface
 *
 * Responsibility:
 * Defines the contract for Artist repository
 * implementations.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Interface SAP_Artist_Repository_Interface
 *
 * Defines the persistence contract for Artist entities.
 *
 * @since 1.0.0
 */
interface SAP_Artist_Repository_Interface {

	/**
	 * Save an artist.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function save(
		SAP_Artist $artist
	): bool;

	/**
	 * Update an artist.
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
	 * Find an artist by database ID.
	 *
	 * @param int $id Artist ID.
	 *
	 * @return SAP_Artist|null
	 */
	public function find(
		int $id
	): ?SAP_Artist;

	/**
	 * Find an artist by UUID.
	 *
	 * @param string $uuid Artist UUID.
	 *
	 * @return SAP_Artist|null
	 */
	public function find_by_uuid(
		string $uuid
	): ?SAP_Artist;

	/**
	 * Return all artists.
	 *
	 * @return array<SAP_Artist>
	 */
	public function find_all(): array;

	/**
	 * Determine whether an artist exists.
	 *
	 * @param int $id Artist ID.
	 *
	 * @return bool
	 */
	public function exists(
		int $id
	): bool;

	/**
	 * Count artists.
	 *
	 * @return int
	 */
	public function count(): int;

}