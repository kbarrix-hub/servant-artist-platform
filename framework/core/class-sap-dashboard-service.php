<?php

declare(strict_types=1);

defined( 'ABSPATH' ) || exit;

/**
 * Dashboard Service.
 *
 * Provides dashboard statistics for the
 * Application Shell.
 */
final class SAP_Dashboard_Service {

	/**
	 * Return dashboard statistics.
	 *
	 * @return array<string,int>
	 */
	public function get_dashboard(): array {

		return [

			'songs'    => 12,

			'releases' => 2,

			'events'   => 3,

			'messages' => 5,

		];

	}

}