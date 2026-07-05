<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-012B Navigation Manager
 *
 * Responsibility:
 * Register navigation providers, collect navigation
 * items, validate them, sort them, and expose a
 * normalized navigation array to the Application Shell.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Navigation_Manager
 *
 * Manages navigation items provided by SAP modules.
 *
 * @since 1.0.0
 */
final class SAP_Navigation_Manager {

	/**
	 * Registered navigation providers.
	 *
	 * @var SAP_Navigation_Provider_Interface[]
	 */
	private array $providers = [];

	/**
	 * Register a navigation provider.
	 *
	 * Duplicate providers are ignored.
	 *
	 * @since 1.0.0
	 *
	 * @param SAP_Navigation_Provider_Interface $provider Navigation provider.
	 *
	 * @return void
	 */
	public function register_provider(
		SAP_Navigation_Provider_Interface $provider
	): void {

		foreach ( $this->providers as $registered ) {

			if ( $registered === $provider ) {
				return;
			}
		}

		$this->providers[] = $provider;
	}

	/**
	 * Return all navigation items.
	 *
	 * Items are merged from every registered provider
	 * and sorted by menu order.
	 *
	 * @since 1.0.0
	 *
	 * @return array<int,array<string,mixed>>
	 */
	public function get_navigation_items(): array {

		$items = [];

		foreach ( $this->providers as $provider ) {

			foreach ( $provider->get_navigation_items() as $item ) {

				if ( ! $this->is_valid_item( $item ) ) {
					continue;
				}

				$items[] = $item;
			}
		}

		usort(
			$items,
			static function ( array $a, array $b ): int {

				return ( $a['order'] ?? 999 ) <=> ( $b['order'] ?? 999 );
			}
		);

		return $items;
	}

	/**
	 * Validate a navigation item.
	 *
	 * @since 1.0.0
	 *
	 * @param array<string,mixed> $item Navigation item.
	 *
	 * @return bool
	 */
	private function is_valid_item(
		array $item
	): bool {

		$required = [
			'slug',
			'title',
			'icon',
			'order',
			'url',
		];

		foreach ( $required as $key ) {

			if ( ! array_key_exists( $key, $item ) ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Return registered providers.
	 *
	 * Primarily useful for debugging and testing.
	 *
	 * @since 1.0.0
	 *
	 * @return SAP_Navigation_Provider_Interface[]
	 */
	public function get_providers(): array {

		return $this->providers;
	}
}