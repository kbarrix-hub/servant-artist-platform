<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-061.3.3
 * Abstract Harmony Module
 *
 * Base class for all Harmony website modules.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Abstract Harmony Module.
 */
abstract class SAP_Abstract_Harmony_Module implements SAP_Harmony_Module {

	/**
	 * Module title.
	 *
	 * @var string
	 */
	protected string $title = '';

	/**
	 * Get the module title.
	 *
	 * @return string
	 */
	public function get_title(): string {

		return $this->title;

	}

	/**
	 * Render the module.
	 *
	 * @return void
	 */
	abstract public function render(): void;

}