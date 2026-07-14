<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-060.1
 * Website Page
 *
 * @package ServantArtistPlatform
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Website_Page extends SAP_Abstract_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->title  = 'Website';
		$this->slug   = 'website';
		$this->layout = new SAP_Artist_Layout();

	}

	/**
	 * Initialize the page.
	 *
	 * @return void
	 */
	public function initialize(): void {

	    SAP_Asset_Manager::instance()->enqueue_style(
		    'harmony-designer'
	    );

	    $this->layout->register_section(
		    new SAP_Website_Designer_Section()
		);

	}

	/**
	 * Render the page.
	 *
	 * @return void
	 */
	public function render(): void {

		$this->layout->set_context(
			$this->get_context()
		);

		$this->layout->render();

	}

}