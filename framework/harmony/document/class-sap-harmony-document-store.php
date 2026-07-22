<?php
declare(strict_types=1);

/**
 * Harmony Document Store.
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Harmony_Document_Store {



	/**
	 * Constructor.
	 *
	 *
	 */
	public function __construct() {

    }

	/**
	 * Load the document.
	 *
	 * @return SAP_Harmony_Document
	 */
	public function load(): SAP_Harmony_Document {

    $data = get_option(
        'sap_harmony_document',
        []
    );

    if ( empty( $data ) ) {

        return new SAP_Harmony_Document(
            new SAP_Harmony_Collection()
        );

    }

    return SAP_Harmony_Document::from_array(
        $data
    );

    }

	/**
	 * Save the document.
	 *
	 * @param SAP_Harmony_Document $document Document.
	 *
	 * @return void
	 */
	public function save(
    SAP_Harmony_Document $document
): void {

        update_option(
            'sap_harmony_document',
            $document->to_array()
        );

    }

}