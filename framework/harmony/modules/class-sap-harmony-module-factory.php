<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Harmony Engine
 * Module Factory
 *
 * Responsible for creating Harmony modules.
 *
 * @package ServantArtistPlatform
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Harmony_Module_Factory {

	/**
	 * Create a new Harmony module.
	 *
	 * @param string $type Module type.
	 *
	 * @return array<string,string>
	 */
	public static function create( string $type ): array {

		$id = strtolower( $type ) . '_' . wp_generate_uuid4();

		switch ( strtolower( $type ) ) {

            case 'section':
                return [
                    'id'       => $id,
                    'name'     => 'Section',
                    'type'     => 'section',
                    'title'    => 'Section',
                    'content'  => '',
                    'parent'   => null,
                    'children' => [],
                ];

				case 'row':
    return [
        'id'       => $id,
        'name'     => 'Row',
        'type'     => 'row',
        'title'    => 'Row',
        'content'  => '',
        'parent'   => null,
        'children' => [],
    ];

case 'column':
    return [
        'id'       => $id,
        'name'     => 'Column',
        'type'     => 'column',
        'title'    => 'Column',
        'content'  => '',
        'parent'   => null,
        'children' => [],
    ];

			case 'hero':
				return [
					'id'      => $id,
					'name'    => 'Hero',
					'type'    => 'hero',
					'title'   => 'New Hero',
					'content' => 'Hero content...',
					'parent'   => null,
                    'children' => [],
				];

			case 'text':
				return [
					'id'      => $id,
					'name'    => 'Text',
					'type'    => 'text',
					'title'   => 'Text Block',
					'content' => 'Enter text...',
					'parent'   => null,
                    'children' => [],
				];

			case 'image':
				return [
					'id'      => $id,
					'name'    => 'Image',
					'type'    => 'image',
					'title'   => 'Image',
					'content' => '',
					'parent'   => null,
                    'children' => [],
				];

			default:
				return [
					'id'      => $id,
					'name'    => ucfirst( $type ),
					'type'    => strtolower( $type ),
					'title'   => ucfirst( $type ),
					'content' => '',
					'parent'   => null,
                    'children' => [],
				];

		}

	}

}