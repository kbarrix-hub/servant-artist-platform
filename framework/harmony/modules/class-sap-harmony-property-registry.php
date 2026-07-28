<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Harmony Engine
 * Property Registry
 *
 * Defines editable properties for Harmony modules.
 *
 * @package ServantArtistPlatform
 */

defined( 'ABSPATH' ) || exit;

/**
 * Harmony Property Registry.
 */
final class SAP_Harmony_Property_Registry {

    /**
     * Registered property definitions.
     *
     * @var array<string,array<int,array<string,mixed>>>
     */
    private array $properties = [];

    /**
     * Constructor.
     */
    public function __construct() {

        $this->register_defaults();

    }

    /**
     * Register the default module properties.
     *
     * @return void
     */
    private function register_defaults(): void {

        $this->properties['heading'] = [

            [
                'name'    => 'title',
                'label'   => 'Heading',
                'type'    => 'text',
                'default' => '',
            ],

            [
                'name'    => 'level',
                'label'   => 'Heading Level',
                'type'    => 'select',
                'default' => 'h2',
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
            ],

            [
                'name'    => 'alignment',
                'label'   => 'Alignment',
                'type'    => 'select',
                'default' => 'left',
                'options' => [
                    'left'   => 'Left',
                    'center' => 'Center',
                    'right'  => 'Right',
                ],
            ],

        ];

    }

    /**
     * Return property definitions for a module.
     *
     * @param string $type Module type.
     *
     * @return array<int,array<string,mixed>>
     */
    public function get_properties(
        string $type
    ): array {

        return $this->properties[ $type ] ?? [];

    }

}