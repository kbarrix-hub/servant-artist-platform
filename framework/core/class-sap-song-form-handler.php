<?php

declare(strict_types=1);

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Song_Form_Handler
 *
 * Handles Song Manager form submissions.
 */
final class SAP_Song_Form_Handler {

	/**
	 * Song Service.
	 *
	 * @var SAP_Song_Service
	 */
	private SAP_Song_Service $song_service;

	/**
	 * Constructor.
	 *
	 * @param SAP_Song_Service $song_service Song service.
	 */
	public function __construct(
		SAP_Song_Service $song_service
	) {

		$this->song_service = $song_service;

	}

	/**
	 * Handle incoming requests.
	 *
	 * @return void
	 */
	public function handle(): void {

		// Implementation added in SAP-051.3.

	}

}