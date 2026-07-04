<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-000 Bootstrap
 *
 * Responsibility:
 * Prepare the SAP Framework environment and launch the
 * framework startup sequence.
 *
 * Bootstrap is responsible for preparing the framework environment.
 * It does not contain business logic.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Bootstrap
 *
 * Prepares the framework environment before transferring
 * control to the SAP Loader.
 *
 * @since 1.0.0
 */
final class SAP_Bootstrap {

    /**
	 * Singleton instance.
	 *
	 * @var SAP_Bootstrap|null
	 */
	private static ?SAP_Bootstrap $instance = null;

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
	 * Returns the singleton Bootstrap instance.
	 *
	 * Creates the Bootstrap object on first request and
	 * returns the existing instance thereafter.
	 *
	 * @return SAP_Bootstrap
	 */
	public static function instance(): SAP_Bootstrap {

		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Starts the Servant Artist Platform Framework.
	 *
	 * Bootstrap is responsible for preparing the framework
	 * environment before transferring control to the Loader.
	 */
	public function run(): void {

		$this->load_requirements();

		$this->load_constants();

		$this->load_functions();

		$this->load_loader();
	}

   /**
    * Load framework requirements.
    *
    * Loads the framework requirements file and executes
    * the environment validation pipeline.
    */
    private function load_requirements(): void {

	    require_once __DIR__ . '/class-sap-requirements.php';

	    sap_requirements_check();
	}


	/**
	 * Load framework constants.
	 */
	private function load_constants(): void {
		// Section 4
	}

	/**
	 * Load bootstrap helper functions.
	 */
	private function load_functions(): void {
		// Section 4
	}

	/**
     * Load the SAP Loader.
     */
    private function load_loader(): void {

	require_once __DIR__ . '/class-sap-loader.php';

	$loader = SAP_Loader::instance();

	$loader->run();
    }

}
      