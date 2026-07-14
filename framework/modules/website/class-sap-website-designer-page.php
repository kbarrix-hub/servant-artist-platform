<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-057.2 Website Designer Page
 *
 * Responsibility:
 * Coordinates the Website Designer.
 *
 * @package ServantArtistPlatform
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Website_Designer_Page implements SAP_Page_Interface {

	/**
	 * Artist Layout.
	 *
	 * @var SAP_Artist_Layout
	 */
	private SAP_Artist_Layout $layout;

	/**
	 * Runtime render context.
	 *
	 * @var array<string,mixed>
	 */
	private array $context = [];

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->layout = new SAP_Artist_Layout();

	}

	/**
	 * Initialize the page.
	 *
	 * @return void
	 */
	public function initialize(): void {

		$this->layout->register_section(
			new SAP_Website_Designer_Section()
		);

	}

	/**
	 * Assign runtime context.
	 *
	 * @param array<string,mixed> $context Runtime context.
	 *
	 * @return void
	 */
	public function set_context( array $context ): void {

		$this->context = $context;

		$this->layout->set_context( $context );

	}

	/**
	 * Render the page.
	 *
	 * @return void
	 */
	public function render(): void {

		$this->layout->render();

	}

	/**
	 * Return page title.
	 *
	 * @return string
	 */
	public function get_title(): string {

		return 'Website Designer';

	}

	/**
	 * Return page slug.
	 *
	 * @return string
	 */
	public function get_slug(): string {

		return 'website-designer';

	}

	/**
	 * Return layout.
	 *
	 * @return SAP_Artist_Layout
	 */
	public function get_layout(): ?object {

		return $this->layout;

	}

}
