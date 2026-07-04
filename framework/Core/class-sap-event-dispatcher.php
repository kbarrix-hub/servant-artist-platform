<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-004 Event Dispatcher
 *
 * Responsibility:
 * Coordinate communication between framework components.
 *
 * The Event Dispatcher allows framework components to
 * communicate through events without direct dependencies.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Event_Dispatcher
 *
 * Coordinates framework event registration and dispatching.
 *
 * @since 1.0.0
 */
final class SAP_Event_Dispatcher {

	/**
	 * Singleton instance.
	 *
	 * @var SAP_Event_Dispatcher|null
	 */
	private static ?SAP_Event_Dispatcher $instance = null;

	/**
	 * Registered event listeners.
	 *
	 * @var array<string, array<int, callable>>
	 */
	private array $listeners = [];

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
	 * Returns the singleton Event Dispatcher instance.
	 *
	 * Creates the Event Dispatcher object on first
	 * request and returns the existing instance thereafter.
	 *
	 * @return SAP_Event_Dispatcher
	 */
	public static function instance(): SAP_Event_Dispatcher {

		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

    /**
	 * Register an event listener.
	 *
	 * Adds a listener that will be executed whenever
	 * the specified event is dispatched.
	 *
	 * @param string   $event    Event name.
	 * @param callable $listener Event listener.
	 */
	public function listen(
		string $event,
		callable $listener
	): void {

		$this->listeners[ $event ][] = $listener;
	}

    /**
	 * Dispatch an event.
	 *
	 * Executes all listeners registered for the
	 * specified event.
	 *
	 * @param string $event Event name.
	 * @param mixed  ...$args Optional event arguments.
	 */
	public function dispatch(
		string $event,
		mixed ...$args
	): void {

		if ( ! isset( $this->listeners[ $event ] ) ) {
			return;
		}

		foreach ( $this->listeners[ $event ] as $listener ) {
			$listener( ...$args );
		}
	}

    /**
	 * Determine whether an event has listeners.
	 *
	 * Checks if the specified event has one or more
	 * registered listeners.
	 *
	 * @param string $event Event name.
	 * @return bool
	 */
	public function has(
		string $event
	): bool {

		return isset( $this->listeners[ $event ] );
	}

}