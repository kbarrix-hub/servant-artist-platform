<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Harmony Engine
 * AJAX Controller
 *
 * Routes WordPress AJAX requests to the
 * Harmony Command Handler.
 *
 * @package ServantArtistPlatform
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Harmony_Ajax_Controller {

	/**
	 * Harmony Command Handler.
	 *
	 * @var SAP_Harmony_Command_Handler
	 */
	private SAP_Harmony_Command_Handler $handler;

	/**
	 * Constructor.
	 *
	 * @param SAP_Harmony_Command_Handler $handler Command handler.
	 */
	public function __construct(
		SAP_Harmony_Command_Handler $handler
	) {

		$this->handler = $handler;

		add_action(
			'wp_ajax_sap_harmony_command',
			[ $this, 'handle' ]
		);

	}

	/**
	 * Handle AJAX requests.
	 *
	 * @return void
	 */
	public function handle(): void {

		check_ajax_referer(
			'sap_harmony_nonce',
			'nonce'
		);

		$command = sanitize_text_field(
			$_POST['command'] ?? ''
		);

		$payload = $_POST['payload'] ?? [];

		$result = $this->handler->handle(
			$command,
			is_array( $payload )
				? $payload
				: []
		);

		wp_send_json_success(
			[
				'result' => $result,
			]
		);

	}

}