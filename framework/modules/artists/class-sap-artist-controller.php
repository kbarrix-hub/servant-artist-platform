<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Module:
 * SAP-107 Artist Controller
 *
 * Responsibility:
 * Coordinate incoming Artist requests and delegate
 * business operations to the Artist Manager.
 *
 * The Controller contains no business logic or
 * persistence logic.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Artist_Controller
 *
 * Coordinates Artist requests.
 *
 * @since 1.0.0
 */
final class SAP_Artist_Controller {

	/**
	 * Artist Manager.
	 *
	 * @var SAP_Artist_Manager_Interface
	 */
	private SAP_Artist_Manager_Interface $manager;

	/**
	 * Artist Permissions.
	 *
	 * @var SAP_Artist_Permissions
	 */
	private SAP_Artist_Permissions $permissions;

	/**
	 * Constructor.
	 *
	 * @param SAP_Artist_Manager_Interface $manager     Artist manager.
	 * @param SAP_Artist_Permissions       $permissions Artist permissions.
	 */
	public function __construct(
		SAP_Artist_Manager_Interface $manager,
		SAP_Artist_Permissions $permissions
	) {

		$this->manager     = $manager;
		$this->permissions = $permissions;
	}

	/**
	 * Handle Artist creation.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function create(
		SAP_Artist $artist
	): bool {

		if ( ! $this->permissions->can_create() ) {
			return false;
		}

		return $this->manager->create( $artist );
	}

	/**
	 * Handle Artist update.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function update(
		SAP_Artist $artist
	): bool {

		if ( ! $this->permissions->can_edit( $artist ) ) {
			return false;
		}

		return $this->manager->update( $artist );
	}

	/**
	 * Handle Artist deletion.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function delete(
		SAP_Artist $artist
	): bool {

		if ( ! $this->permissions->can_delete( $artist ) ) {
			return false;
		}

		return $this->manager->delete(
			$artist->get_id() ?? 0
		);
	}

	/**
	 * Handle Artist publishing.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function publish(
		SAP_Artist $artist
	): bool {

		if ( ! $this->permissions->can_publish( $artist ) ) {
			return false;
		}

		return $this->manager->publish(
			$artist->get_id() ?? 0
		);
	}

	/**
	 * Handle Artist verification.
	 *
	 * @param SAP_Artist $artist Artist entity.
	 *
	 * @return bool
	 */
	public function verify(
		SAP_Artist $artist
	): bool {

		if ( ! $this->permissions->can_verify( $artist ) ) {
			return false;
		}

		return $this->manager->verify(
			$artist->get_id() ?? 0
		);
	}

}