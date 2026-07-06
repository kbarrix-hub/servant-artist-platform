<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-029 User Service
 *
 * Responsibility:
 * Provide a centralized interface for retrieving
 * user identity information used throughout the
 * Servant Artist Platform.
 *
 * WordPress provides authentication.
 * SAP provides the application identity.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_User_Service
 *
 * Provides identity information for the currently
 * authenticated SAP user.
 *
 * @since 1.0.0
 */
final class SAP_User_Service {

	/**
	 * Constructor.
	 *
	 * Intentionally empty.
	 * User information is loaded lazily.
	 */
	public function __construct() {}

	/**
	 * Return the current WordPress user.
	 *
	 * @return WP_User
	 */
	private function current_user(): WP_User {

		if ( ! function_exists( 'wp_get_current_user' ) ) {
			require_once ABSPATH . WPINC . '/pluggable.php';
		}

		return wp_get_current_user();

	}

	/**
	 * Return the current user ID.
	 *
	 * @return int
	 */
	public function id(): int {

		return (int) $this->current_user()->ID;

	}

	/**
	 * Return the display name.
	 *
	 * @return string
	 */
	public function display_name(): string {

		return (string) $this->current_user()->display_name;

	}

	/**
	 * Return the email address.
	 *
	 * @return string
	 */
	public function email(): string {

		return (string) $this->current_user()->user_email;

	}

	/**
	 * Return the primary role.
	 *
	 * @return string
	 */
	public function role(): string {

		$user = $this->current_user();

		if ( empty( $user->roles ) ) {
			return '';
		}

		return (string) $user->roles[0];

	}

	/**
	 * Return avatar URL.
	 *
	 * Future priority:
	 * 1. SAP uploaded avatar
	 * 2. WordPress avatar
	 * 3. Generated initials
	 *
	 * @return string
	 */
	public function avatar(): string {

		return get_avatar_url(
			$this->id(),
			[
				'size' => 128,
			]
		);

	}

	/**
	 * Return user initials.
	 *
	 * @return string
	 */
	public function initials(): string {

		$name = trim(
			$this->display_name()
		);

		if ( $name === '' ) {
			return '?';
		}

		$parts = preg_split(
			'/\s+/',
			$name
		);

		$initials = '';

		foreach ( $parts as $part ) {

			$initials .= strtoupper(
				substr(
					(string) $part,
					0,
					1
				)
			);

			if ( strlen( $initials ) >= 2 ) {
				break;
			}

		}

		return $initials;

	}

	/**
	 * Return organization.
	 *
	 * Placeholder until SAP Organizations exist.
	 *
	 * @return string
	 */
	public function organization(): string {

		return 'Servant Records';

	}

	/**
	 * Return user title.
	 *
	 * Placeholder until SAP Profiles exist.
	 *
	 * @return string
	 */
	public function title(): string {

		return 'Artist';

	}

}