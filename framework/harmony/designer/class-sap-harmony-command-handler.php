<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Harmony Engine
 * Command Handler
 *
 * Routes editor commands to the Harmony Designer.
 *
 * @package ServantArtistPlatform
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Harmony_Command_Handler {

	/**
	 * Harmony designer.
	 *
	 * @var SAP_Harmony_Designer
	 */
	private SAP_Harmony_Designer $designer;

	/**
	 * Constructor.
	 *
	 * @param SAP_Harmony_Designer $designer Harmony designer.
	 */
	public function __construct(
		SAP_Harmony_Designer $designer
	) {

		$this->designer = $designer;

	}

	/**
	 * Execute a Harmony command.
	 *
	 * @param string               $command Command name.
	 * @param array<string, mixed> $payload Command payload.
	 *
	 * @return mixed
	 */
	public function handle(
        string $command,
        array $payload = []
    ) {

        switch ( strtoupper( $command ) ) {

			case 'PING':
				return 'pong';

			case 'ADD_MODULE':

				$this->designer->add_module(
					(string) ( $payload['type'] ?? 'text' )
				);

				return [
					'success'  => true,
					'selected' => $this->designer->selected(),
					'canvas'   => $this->designer->render_canvas(),
				];

			case 'NEW_DOCUMENT':

				$this->designer->new_document();

				return [
					'success'  => true,
					'selected' => $this->designer->selected(),
					'canvas'   => $this->designer->render_canvas(),
				];

			case 'DELETE_MODULE':

                $this->designer->delete_module(
                    (string) ( $payload['id'] ?? '' )
                );

                return [
                    'success'  => true,
                    'selected' => $this->designer->selected(),
                    'canvas'   => $this->designer->render_canvas(),
                ];

			case 'SELECT_MODULE':

				$this->designer->select_module(
					(string) ( $payload['id'] ?? '' ),
					(string) ( $payload['name'] ?? '' ),
					(string) ( $payload['type'] ?? '' )
				);

				return [
					'success'  => true,
					'selected' => $this->designer->selected(),
					'canvas'   => $this->designer->render_canvas(),
				];

			default:

				return [
					'success' => false,
					'message' => sprintf(
						'Unknown Harmony command: %s',
						$command
					),
				];

		}

	}

}