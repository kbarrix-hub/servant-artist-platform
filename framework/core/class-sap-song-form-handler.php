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

		if (
			! isset( $_SERVER['REQUEST_METHOD'] ) ||
			'POST' !== $_SERVER['REQUEST_METHOD']
		) {
			return;
		}

		if ( ! isset( $_POST['sap_action'] ) ) {
			return;
		}

		$action = sanitize_key(
			wp_unslash( $_POST['sap_action'] )
		);

		if (
			'create_song' !== $action &&
			'update_song' !== $action
		) {
			return;
		}

		check_admin_referer( 'sap_save_song' );

		$data = [
			'song_title'  => sanitize_text_field(
				wp_unslash( $_POST['song_title'] ?? '' )
			),
			'artist_name' => sanitize_text_field(
				wp_unslash( $_POST['artist_name'] ?? '' )
			),
			'song_key'    => sanitize_text_field(
				wp_unslash( $_POST['song_key'] ?? '' )
			),
			'song_bpm'    => absint(
				$_POST['song_bpm'] ?? 0
			),
			'song_status' => sanitize_key(
				wp_unslash( $_POST['song_status'] ?? 'draft' )
			),
		];

		if ( 'create_song' === $action ) {

			$this->song_service->create_song( $data );

			return;

		}

		$song_id = absint(
			$_POST['song_id'] ?? 0
		);

		if ( $song_id <= 0 ) {
			return;
		}

		$this->song_service->update_song(
			$song_id,
			$data
		);

	}

}