<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-061.3.2
 * Harmony Module Interface
 *
 * Contract implemented by all Harmony website modules.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Interface SAP_Harmony_Module
 *
 * Every Harmony website module must implement this interface.
 */
interface SAP_Harmony_Module {

	/**
	 * Render the Harmony module.
	 *
	 * @return void
	 */
	public function render(): void;

}