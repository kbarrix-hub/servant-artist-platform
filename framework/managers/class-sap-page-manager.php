<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform Framework
 * ============================================================
 *
 * Framework Component:
 * SAP-032.1 Page Manager
 *
 * Responsibility:
 * Register, store, and resolve framework pages.
 *
 * The Page Manager serves as the central registry
 * for all SAP framework pages. It is responsible
 * for registering pages, preventing duplicate page
 * slugs, and resolving pages by their unique slug.
 *
 * The Page Manager contains no rendering,
 * routing, or module business logic.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Page_Manager
 *
 * Coordinates framework page registration.
 *
 * @since 1.0.0
 */
final class SAP_Page_Manager {

	/**
	 * Registered framework pages.
	 *
	 * Indexed by page slug.
	 *
	 * @var array<string, SAP_Page_Interface>
	 */
	private array $pages = [];

	/**
	 * Register a framework page.
	 *
	 * Duplicate page slugs are ignored.
	 *
	 * @param SAP_Page_Interface $page Framework page.
	 *
	 * @return void
	 */
	public function register(
		SAP_Page_Interface $page
	): void {

		$slug = $page->get_slug();

		if ( $this->has( $slug ) ) {
			return;
		}

		$this->pages[ $slug ] = $page;

	}

	/**
	 * Determine whether a page exists.
	 *
	 * @param string $slug Page slug.
	 *
	 * @return bool
	 */
	public function has(
		string $slug
	): bool {

		return isset( $this->pages[ $slug ] );

	}

	/**
	 * Return a registered page.
	 *
	 * @param string $slug Page slug.
	 *
	 * @return SAP_Page_Interface|null
	 */
	public function get(
		string $slug
	): ?SAP_Page_Interface {

		return $this->pages[ $slug ] ?? null;

	}

	/**
	 * Return all registered pages.
	 *
	 * @return array<string, SAP_Page_Interface>
	 */
	public function get_all(): array {

		return $this->pages;

	}

}