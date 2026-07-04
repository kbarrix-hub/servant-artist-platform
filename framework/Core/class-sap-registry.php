<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-002 Registry
 *
 * Responsibility:
 * Store and provide access to shared framework services.
 *
 * The Registry stores framework services.
 * It does not create or manage them.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Registry
 *
 * Stores and retrieves shared framework services.
 *
 * @since 1.0.0
 */
final class SAP_Registry {

	/**
	 * Singleton instance.
	 *
	 * @var SAP_Registry|null
	 */
	private static ?SAP_Registry $instance = null;

	/**
	 * Stores registered framework services.
	 *
	 * @var array<class-string, object>
	 */
	private array $services = [];

	/**
	 * Prevent direct instantiation.
	 */
	private function __construct() {}

	/**
	 * Prevent cloning.
	 */
	private function __clone() {}

	/**
	 * Prevent unserialization.
	 *
	 * @throws \Exception Always.
	 */
	public function __wakeup(): void {
		throw new \Exception(
			'Cannot unserialize singleton ' . __CLASS__
		);
	}

    /**
	 * Returns the singleton Registry instance.
	 *
	 * Creates the Registry object on first request and
	 * returns the existing instance thereafter.
	 *
	 * @return SAP_Registry
	 */
	public static function instance(): SAP_Registry {

		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

    /**
	 * Register a framework service.
	 *
	 * Stores a shared framework service in the Registry.
	 *
	 * @param class-string $service_id Unique service identifier.
	 * @param object       $service    Framework service instance.
	 */
	public function register(
		string $service_id,
		object $service
	): void {

		$this->services[ $service_id ] = $service;
	}

    /**
	 * Retrieve a registered framework service.
	 *
	 * Returns the requested framework service or null
	 * if it has not been registered.
	 *
	 * @param class-string $service_id Unique service identifier.
	 * @return object|null
	 */
	public function get(
		string $service_id
	): ?object {

		return $this->services[ $service_id ] ?? null;
	}

    	/**
	 * Determine whether a framework service exists.
	 *
	 * Checks if the requested service has been registered.
	 *
	 * @param class-string $service_id Unique service identifier.
	 * @return bool
	 */
	public function has(
		string $service_id
	): bool {

		return isset( $this->services[ $service_id ] );
	}

}