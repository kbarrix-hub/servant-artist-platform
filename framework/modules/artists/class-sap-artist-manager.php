<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Module:
 * SAP-105 Artist Manager
 *
 * Responsibility:
 * Coordinates Artist business operations.
 *
 * The Manager contains business rules and delegates
 * persistence to the Artist Repository.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Artist_Manager
 *
 * Coordinates Artist business operations.
 *
 * @since 1.0.0
 */
final class SAP_Artist_Manager implements SAP_Artist_Manager_Interface {

	/**
	 * Artist repository.
	 *
	 * @var SAP_Artist_Repository_Interface
	 */
	private SAP_Artist_Repository_Interface $repository;

	/**
	 * Event dispatcher.
	 *
	 * @var SAP_Event_Dispatcher
	 */
	private SAP_Event_Dispatcher $events;

	/**
	 * Constructor.
	 *
	 * @param SAP_Artist_Repository_Interface $repository Artist repository.
	 * @param SAP_Event_Dispatcher            $events     Event dispatcher.
	 */
	public function __construct(
		SAP_Artist_Repository_Interface $repository,
		SAP_Event_Dispatcher $events
	) {

		$this->repository = $repository;
		$this->events     = $events;
	}

	/**
	 * Create a new artist.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function create(
		SAP_Artist $artist
	): bool {

		$result = $this->repository->save( $artist );

		if ( $result ) {
			// Dispatch artist created event in a future milestone.
		}

		return $result;
	}

	/**
	 * Update an existing artist.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function update(
		SAP_Artist $artist
	): bool {

		$result = $this->repository->update( $artist );

		if ( $result ) {
			// Dispatch artist updated event in a future milestone.
		}

		return $result;
	}

	/**
	 * Delete an artist.
	 *
	 * @param int $id Artist ID.
	 *
	 * @return bool
	 */
	public function delete(
		int $id
	): bool {

		$result = $this->repository->delete( $id );

		if ( $result ) {
			// Dispatch artist deleted event in a future milestone.
		}

		return $result;
	}

	/**
	 * Publish an artist.
	 *
	 * @param int $id Artist ID.
	 *
	 * @return bool
	 */
	public function publish(
		int $id
	): bool {

		// Business logic coming in a future milestone.

		return true;
	}

	/**
	 * Suspend an artist.
	 *
	 * @param int $id Artist ID.
	 *
	 * @return bool
	 */
	public function suspend(
		int $id
	): bool {

		// Business logic coming in a future milestone.

		return true;
	}

	/**
	 * Archive an artist.
	 *
	 * @param int $id Artist ID.
	 *
	 * @return bool
	 */
	public function archive(
		int $id
	): bool {

		// Business logic coming in a future milestone.

		return true;
	}

	/**
	 * Verify an artist.
	 *
	 * @param int $id Artist ID.
	 *
	 * @return bool
	 */
	public function verify(
		int $id
	): bool {

		// Business logic coming in a future milestone.

		return true;
	}

	/**
	 * Restore an archived artist.
	 *
	 * @param int $id Artist ID.
	 *
	 * @return bool
	 */
	public function restore(
		int $id
	): bool {

		// Business logic coming in a future milestone.

		return true;
	}

}