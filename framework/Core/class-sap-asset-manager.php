<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-003 Asset Manager
 *
 * Responsibility:
 * Register and enqueue framework assets.
 *
 * The Asset Manager coordinates loading of framework
 * stylesheets, scripts, and other shared assets.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Asset_Manager
 *
 * Coordinates registration and loading of framework assets.
 *
 * @since 1.0.0
 */
final class SAP_Asset_Manager {

	/**
	 * Singleton instance.
	 *
	 * @var SAP_Asset_Manager|null
	 */
	private static ?SAP_Asset_Manager $instance = null;

	/**
	 * Registered framework assets.
	 *
	 * @var array<string, array<string, mixed>>
	 */
	private array $assets = [];

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
	 * Returns the singleton Asset Manager instance.
	 *
	 * Creates the Asset Manager object on first request
	 * and returns the existing instance thereafter.
	 *
	 * @return SAP_Asset_Manager
	 */
	public static function instance(): SAP_Asset_Manager {

		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

    	/**
	 * Starts the Asset Manager.
	 *
	 * Registers the framework asset catalog.
	 *
	 * @return void
	 */
	public function run(): void {

		$this->register_styles();

		$this->register_scripts();

	}
 
    /**
	 * Register framework styles.
	 *
	 * Builds the internal catalog of framework styles
	 * available for loading.
	 *
	 * @return void
	 */
	private function register_styles(): void {

		$this->assets['styles'] = [

	'application-shell' => [
		'handle'  => 'sap-application-shell',
		'src'     => SAP_PLUGIN_URL . 'admin/shell/application-shell.css',
		'deps'    => [],
		'version' => SAP_VERSION,
		'media'   => 'all',
	],

	'header' => [
		'handle'  => 'sap-header',
		'src'     => SAP_PLUGIN_URL . 'admin/shell/header.css',
		'deps'    => [ 'sap-application-shell' ],
		'version' => SAP_VERSION,
		'media'   => 'all',
	],

	'sidebar' => [
		'handle'  => 'sap-sidebar',
		'src'     => SAP_PLUGIN_URL . 'admin/shell/sidebar.css',
		'deps'    => [ 'sap-application-shell' ],
		'version' => SAP_VERSION,
		'media'   => 'all',
	],

	'artist-dashboard' => [
		'handle'  => 'sap-artist-dashboard',
		'src'     => SAP_PLUGIN_URL . 'assets/css/admin/artist-dashboard.css',
		'deps'    => [ 'sap-application-shell' ],
		'version' => SAP_VERSION,
		'media'   => 'all',
	],

];

}

	/**
	 * Register framework scripts.
	 *
	 * Builds the internal catalog of framework scripts
	 * available for loading.
	 *
	 * @return void
	 */
	private function register_scripts(): void {

		// Section 7

	}

		/**
	 * Enqueue a registered style.
	 *
	 * @param string $asset Asset identifier.
	 *
	 * @return void
	 */
	public function enqueue_style( string $asset ): void {

		if ( ! isset( $this->assets['styles'][ $asset ] ) ) {
			return;
		}

		$style = $this->assets['styles'][ $asset ];

		wp_enqueue_style(
			$style['handle'],
			$style['src'],
			$style['deps'],
			$style['version'],
			$style['media']
		);

	}

    /**
	 * Enqueue framework styles.
	 *
	 * Loads registered framework styles into WordPress
	 * when requested.
	 */
	private function enqueue_styles(): void {

		// Section 8
	}

    /**
	 * Enqueue framework scripts.
	 *
	 * Loads registered framework scripts into WordPress
	 * when requested.
	 */
	private function enqueue_scripts(): void {

		// Section 9
	}

}