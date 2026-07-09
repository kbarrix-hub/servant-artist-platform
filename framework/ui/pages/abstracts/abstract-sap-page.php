<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-044.1 Abstract Page
 *
 * Responsibility:
 * Provide the common functionality shared by all
 * SAP framework pages.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Abstract_Page
 *
 * Base implementation for all SAP Pages.
 *
 * @since 1.0.0
 */
abstract class SAP_Abstract_Page implements SAP_Page_Interface {

	/**
	 * Page title.
	 *
	 * @var string
	 */
	protected string $title = '';

	/**
	 * Page slug.
	 *
	 * @var string
	 */
	protected string $slug = '';

	/**
	 * Assigned layout.
	 *
	 * @var object|null
	 */
	protected $layout = null;

	/**
	 * Runtime render context.
	 *
	 * @var array<string,mixed>
	 */
	protected array $context = [];

	/**
	 * Assign the Runtime context.
	 *
	 * @param array<string,mixed> $context Runtime context.
	 *
	 * @return void
	 */
	public function set_context( array $context ): void {

		$this->context = $context;

	}

	/**
	 * Return the Runtime context.
	 *
	 * @return array<string,mixed>
	 */
	protected function get_context(): array {

		return $this->context;

	}

	/**
	 * Initialize the page.
	 *
	 * @return void
	 */
	public function initialize(): void {}

	/**
	 * Return the page title.
	 *
	 * @return string
	 */
	public function get_title(): string {

		return $this->title;

	}

	/**
	 * Return the page slug.
	 *
	 * @return string
	 */
	public function get_slug(): string {

		return $this->slug;

	}

	/**
	 * Return the page layout.
	 *
	 * @return object|null
	 */
	public function get_layout() {

		return $this->layout;

	}

}