<?php

declare(strict_types=1);

/**
 * Portal Builder Page
 *
 * @package ServantArtistPlatform
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Portal_Builder_Page implements SAP_Page_Interface {

	/**
	 * Builder controller.
	 *
	 * @var SAP_Portal_Builder_Controller
	 */
	private SAP_Portal_Builder_Controller $builder;

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->builder = new SAP_Portal_Builder_Controller();

	}

	/**
	 * Initialize the page.
	 *
	 * @return void
	 */
	public function initialize(): void {}

	/**
	 * Render the page.
	 *
	 * @return void
	 */
	public function render(): void {

		$sections = $this->builder->get_sections();

		require dirname( __DIR__, 3 ) .
			'/portal/views/builder.php';

	}

	/**
	 * Return page title.
	 *
	 * @return string
	 */
	public function get_title(): string {

		return 'Portal Builder';

	}

	/**
	 * Return page slug.
	 *
	 * @return string
	 */
	public function get_slug(): string {

		return 'portal-builder';

	}

	/**
	 * Builder page has no layout.
	 *
	 * @return object|null
	 */
	public function get_layout(): ?object {

		return null;

	}

}