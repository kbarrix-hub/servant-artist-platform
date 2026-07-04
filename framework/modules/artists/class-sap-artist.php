<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Domain Model:
 * SAP-101 Artist
 *
 * Responsibility:
 * Represents an Artist within the Servant Artist Platform.
 *
 * This class is a pure domain entity. It contains no
 * WordPress, database, REST, or UI logic.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Artist
 *
 * Represents an Artist in the SAP domain.
 *
 * @since 1.0.0
 */
final class SAP_Artist {

	/**
	 * Database ID.
	 *
	 * @var int|null
	 */
	private ?int $id = null;

	/**
	 * Platform UUID.
	 *
	 * @var string
	 */
	private string $uuid;

	/**
	 * Display name.
	 *
	 * @var string
	 */
	private string $display_name;

	/**
	 * Legal name.
	 *
	 * @var string
	 */
	private string $legal_name;

	/**
	 * Stage name.
	 *
	 * @var string
	 */
	private string $stage_name;

	/**
	 * Contact email.
	 *
	 * @var string
	 */
	private string $email;

	/**
	 * Artist biography.
	 *
	 * @var string
	 */
	private string $biography = '';

	/**
	 * Website URL.
	 *
	 * @var string
	 */
	private string $website = '';

	/**
	 * Artist status.
	 *
	 * @var string
	 */
	private string $status = 'draft';

	/**
	 * Verification status.
	 *
	 * @var bool
	 */
	private bool $verified = false;

	/**
	 * Created timestamp.
	 *
	 * @var \DateTimeImmutable
	 */
	private \DateTimeImmutable $created_at;

	/**
	 * Updated timestamp.
	 *
	 * @var \DateTimeImmutable
	 */
	private \DateTimeImmutable $updated_at;

	/**
	 * Constructor.
	 *
	 * @param string $display_name Display name.
	 * @param string $legal_name   Legal name.
	 * @param string $stage_name   Stage name.
	 * @param string $email        Contact email.
	 */
	public function __construct(
		string $display_name,
		string $legal_name,
		string $stage_name,
		string $email
	) {

		$this->uuid         = uniqid( 'artist_', true );
		$this->display_name = trim( $display_name );
		$this->legal_name   = trim( $legal_name );
		$this->stage_name   = trim( $stage_name );
		$this->email        = trim( $email );

		$now = new \DateTimeImmutable();

		$this->created_at = $now;
		$this->updated_at = $now;
	}

	/**
	 * Get database ID.
	 *
	 * @return int|null
	 */
	public function get_id(): ?int {

		return $this->id;
	}

	/**
	 * Set database ID.
	 *
	 * @param int $id Database ID.
	 *
	 * @return void
	 */
	public function set_id( int $id ): void {

		$this->id = $id;
	}

	/**
	 * Get UUID.
	 *
	 * @return string
	 */
	public function get_uuid(): string {

		return $this->uuid;
	}

	/**
	 * Get display name.
	 *
	 * @return string
	 */
	public function get_display_name(): string {

		return $this->display_name;
	}

	/**
	 * Set display name.
	 *
	 * @param string $display_name Display name.
	 *
	 * @return void
	 */
	public function set_display_name( string $display_name ): void {

		$this->display_name = trim( $display_name );

		$this->touch();
	}

	/**
	 * Get legal name.
	 *
	 * @return string
	 */
	public function get_legal_name(): string {

		return $this->legal_name;
	}

	/**
	 * Set legal name.
	 *
	 * @param string $legal_name Legal name.
	 *
	 * @return void
	 */
	public function set_legal_name( string $legal_name ): void {

		$this->legal_name = trim( $legal_name );

		$this->touch();
	}

	/**
	 * Get stage name.
	 *
	 * @return string
	 */
	public function get_stage_name(): string {

		return $this->stage_name;
	}

	/**
	 * Set stage name.
	 *
	 * @param string $stage_name Stage name.
	 *
	 * @return void
	 */
	public function set_stage_name( string $stage_name ): void {

		$this->stage_name = trim( $stage_name );

		$this->touch();
	}

	/**
	 * Get email.
	 *
	 * @return string
	 */
	public function get_email(): string {

		return $this->email;
	}

	/**
	 * Set email.
	 *
	 * @param string $email Email address.
	 *
	 * @return void
	 */
	public function set_email( string $email ): void {

		$this->email = trim( $email );

		$this->touch();
	}

	/**
	 * Get biography.
	 *
	 * @return string
	 */
	public function get_biography(): string {

		return $this->biography;
	}

	/**
	 * Set biography.
	 *
	 * @param string $biography Biography.
	 *
	 * @return void
	 */
	public function set_biography( string $biography ): void {

		$this->biography = trim( $biography );

		$this->touch();
	}

	/**
	 * Get website.
	 *
	 * @return string
	 */
	public function get_website(): string {

		return $this->website;
	}

	/**
	 * Set website.
	 *
	 * @param string $website Website URL.
	 *
	 * @return void
	 */
	public function set_website( string $website ): void {

		$this->website = trim( $website );

		$this->touch();
	}

	/**
	 * Get status.
	 *
	 * @return string
	 */
	public function get_status(): string {

		return $this->status;
	}

	/**
	 * Set status.
	 *
	 * @param string $status Artist status.
	 *
	 * @return void
	 */
	public function set_status( string $status ): void {

		$this->status = trim( $status );

		$this->touch();
	}

	/**
	 * Determine whether the artist is verified.
	 *
	 * @return bool
	 */
	public function is_verified(): bool {

		return $this->verified;
	}

	/**
	 * Set verification status.
	 *
	 * @param bool $verified Verification status.
	 *
	 * @return void
	 */
	public function set_verified( bool $verified ): void {

		$this->verified = $verified;

		$this->touch();
	}

	/**
	 * Get creation timestamp.
	 *
	 * @return \DateTimeImmutable
	 */
	public function get_created_at(): \DateTimeImmutable {

		return $this->created_at;
	}

	/**
	 * Get last updated timestamp.
	 *
	 * @return \DateTimeImmutable
	 */
	public function get_updated_at(): \DateTimeImmutable {

		return $this->updated_at;
	}

	/**
	 * Update the modified timestamp.
	 *
	 * @return void
	 */
	private function touch(): void {

		$this->updated_at = new \DateTimeImmutable();
	}

}