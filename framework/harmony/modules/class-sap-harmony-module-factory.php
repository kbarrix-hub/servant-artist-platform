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

			case 'hero':
				return [
					'id'      => $id,
					'name'    => 'Hero',
					'type'    => 'section',
					'title'   => 'New Hero',
					'content' => 'Hero content...',
				];

			case 'text':
				return [
					'id'      => $id,
					'name'    => 'Text',
					'type'    => 'content',
					'title'   => 'Text Block',
					'content' => 'Enter text...',
				];

			case 'image':
				return [
					'id'      => $id,
					'name'    => 'Image',
					'type'    => 'media',
					'title'   => 'Image',
					'content' => '',
				];

			default:
				return [
					'id'      => $id,
					'name'    => ucfirst( $type ),
					'type'    => 'module',
					'title'   => ucfirst( $type ),
					'content' => '',
				];

		}

	}

}