<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-030 Profile
 *
 * Responsibility:
 * Represent a SAP user profile independent
 * of the underlying authentication provider.
 *
 * Initially the profile is backed by
 * WordPress user data.
 *
 * Later it will be backed by the
 * SAP Profile database.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Profile
 *
 * Represents a user profile inside SAP.
 *
 * @since 1.0.0
 */
final class SAP_Profile {

	/**
	 * Framework User Service.
	 *
	 * @var SAP_User_Service
	 */
	private SAP_User_Service $user;

	/**
	 * Constructor.
	 *
	 * @param SAP_User_Service $user User service.
	 */
	public function __construct(
		SAP_User_Service $user
	) {

		$this->user = $user;

	}

	/**
	 * Display Name.
	 *
	 * @return string
	 */
	public function display_name(): string {

		return $this->user->display_name();

	}

	/**
	 * Avatar.
	 *
	 * Future:
	 *
	 * SAP Upload
	 * ↓
	 * WordPress Avatar
	 * ↓
	 * Initials
	 *
	 * @return string
	 */
	public function avatar(): string {

		return $this->user->avatar();

	}

	/**
	 * Initials.
	 *
	 * @return string
	 */
	public function initials(): string {

		return $this->user->initials();

	}

	/**
	 * Organization.
	 *
	 * @return string
	 */
	public function organization(): string {

		return $this->user->organization();

	}

	/**
	 * Title.
	 *
	 * @return string
	 */
	public function title(): string {

		return $this->user->title();

	}

}