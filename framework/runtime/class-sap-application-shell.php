<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-019.1 Application Shell
 *
 * Responsibility:
 * Coordinate the active application render context.
 *
 * The Application Shell receives the complete
 * render context from the Runtime and renders
 * the active application page.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Application_Shell
 *
 * Coordinates the active application render context.
 *
 * @since 1.0.0
 */
final class SAP_Application_Shell {

	/**
	 * Runtime render context.
	 *
	 * @var array<string, mixed>
	 */
	private array $context = [];

	/**
	 * Assign the Runtime render context.
	 *
	 * @param array<string, mixed> $context Runtime context.
	 *
	 * @return void
	 */
	public function set_context( array $context ): void {

		$this->context = $context;

	}

	/**
	 * Return the active page.
	 *
	 * @return SAP_Page_Interface|null
	 */
	private function get_page(): ?SAP_Page_Interface {

		$page = $this->context['page'] ?? null;

		if ( ! $page instanceof SAP_Page_Interface ) {
			return null;
		}

		return $page;

	}

	/**
	 * Render the active page.
	 *
	 * @return void
	 */
	public function render(): void {

		$page = $this->get_page();

		if ( $page === null ) {
			return;
		}

		$page->initialize();

		$page->render();

	}

}