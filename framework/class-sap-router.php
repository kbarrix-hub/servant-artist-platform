<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-014 Framework Router
 *
 * Responsibility:
 * Register, resolve, and dispatch SAP application
 * routes.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Router {

	/**
	 * Registered routes.
	 *
	 * @var array<string, callable>
	 */
	private array $routes = [];

	/**
	 * Register a route.
	 *
	 * @param string   $route    Route slug.
	 * @param callable $callback Route callback.
	 *
	 * @return void
	 */
	public function register_route(
		string $route,
		callable $callback
	): void {

		$this->routes[ $route ] = $callback;

	}

	/**
	 * Determine whether a route exists.
	 *
	 * @param string $route Route slug.
	 *
	 * @return bool
	 */
	public function has_route(
		string $route
	): bool {

		return isset( $this->routes[ $route ] );

	}

	/**
	 * Return all registered routes.
	 *
	 * @return array<string, callable>
	 */
	public function get_routes(): array {

		return $this->routes;

	}

	/**
	 * Resolve the current route.
	 *
	 * @return string
	 */
	public function resolve_route(): string {

		$route = filter_input(
			INPUT_GET,
			'route',
			FILTER_SANITIZE_FULL_SPECIAL_CHARS
		);

		if ( empty( $route ) ) {
			return 'dashboard';
		}

		return strtolower(
			trim( (string) $route )
		);

	}

	/**
	 * Dispatch the current route.
	 *
	 * @return void
	 */
	public function dispatch(): void {

		$route = $this->resolve_route();

		if ( ! $this->has_route( $route ) ) {

			$this->render_not_found();

			return;

		}

		call_user_func(
			$this->routes[ $route ]
		);

	}

	/**
	 * Render a default framework 404.
	 *
	 * @return void
	 */
	private function render_not_found(): void {

		echo '<div class="sap-not-found">';
		echo '<h1>404</h1>';
		echo '<p>The requested SAP page could not be found.</p>';
		echo '</div>';

	}

}