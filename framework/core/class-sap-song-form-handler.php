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

		if ( 'delete_song' === $action ) {

			$this->handle_delete_song();

			return;

		}

		if (
			'create_song' !== $action &&
			'update_song' !== $action
		) {
			return;
		}

		check_admin_referer( 'sap_save_song' );

		$audio_attachment_id = $this->handle_audio_upload();

		$data = [
			'song_title' => sanitize_text_field(
				wp_unslash( $_POST['song_title'] ?? '' )
			),
			'artist_name' => sanitize_text_field(
				wp_unslash( $_POST['artist_name'] ?? '' )
			),
			'song_key' => sanitize_text_field(
				wp_unslash( $_POST['song_key'] ?? '' )
			),
			'song_bpm' => absint(
				$_POST['song_bpm'] ?? 0
			),
			'song_status' => sanitize_key(
				wp_unslash( $_POST['song_status'] ?? 'draft' )
			),
			'audio_attachment_id' => $audio_attachment_id,
		];

		if ( 'create_song' === $action ) {

			$result = $this->song_service->create_song(
				$data
			);

			if ( empty( $result['success'] ) ) {
				return;
			}

			$_GET['sap_page'] = 'song-library';

			$_REQUEST['sap_page'] = 'song-library';

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

	/**
	 * Handle an uploaded song audio file.
	 *
	 * @return int
	 */
	private function handle_audio_upload(): int {

		if (
			! isset( $_FILES['song_audio'] ) ||
			empty( $_FILES['song_audio']['name'] )
		) {
			return 0;
		}

		require_once ABSPATH . 'wp-admin/includes/file.php';

		require_once ABSPATH . 'wp-admin/includes/media.php';

		require_once ABSPATH . 'wp-admin/includes/image.php';

		$attachment_id = media_handle_upload(
			'song_audio',
			0
		);

		if ( is_wp_error( $attachment_id ) ) {
			return 0;
		}

		return (int) $attachment_id;

	}

	/**
	 * Handle a Delete Song request.
	 *
	 * @return void
	 */
	private function handle_delete_song(): void {

		check_admin_referer( 'sap_delete_song' );

		$song_id = absint(
			$_POST['song_id'] ?? 0
		);

		if ( $song_id <= 0 ) {
			return;
		}

		$result = $this->song_service->delete_song(
			$song_id
		);

		if ( empty( $result['success'] ) ) {
			return;
		}

		$_GET['sap_page'] = 'song-library';

		$_REQUEST['sap_page'] = 'song-library';

	}

}