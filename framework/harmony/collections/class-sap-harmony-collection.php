<?php
declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Harmony Engine
 * Module Collection
 *
 * @package ServantArtistPlatform
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Harmony_Collection {

	/**
	 * Harmony modules.
	 *
	 * @var array<int, array<string, string>>
	 */
	private array $modules = [];

	/**
	 * Constructor.
	 */
	public function __construct() {

    $this->modules = [];

	}
	
	/**
	 * Return all Harmony modules.
	 *
	 * @return array<int, array<string, string>>
	 */
	public function get_modules(): array {

		return $this->modules;

	}

	/**
	 * Return a single Harmony module.
	 *
	 * @param string $id Module ID.
	 *
	 * @return array<string, string>|null
	 */
	public function get_module( string $id ): ?array {

		foreach ( $this->modules as $module ) {

			if ( $module['id'] === $id ) {
				return $module;
			}

		}

		return null;

	}

	/**
	 * Determine whether a module exists.
	 *
	 * @param string $id Module ID.
	 *
	 * @return bool
	 */
	public function has_module( string $id ): bool {

		foreach ( $this->modules as $module ) {

			if ( $module['id'] === $id ) {
				return true;
			}

		}

		return false;

	}

	/**
	 * Add a Harmony module.
	 *
	 * @param array<string, string> $module Module data.
	 *
	 * @return void
	 */
	public function add_module( array $module ): void {

    error_log('');
    error_log('========== SAP ADD ==========');
    error_log('Module : ' . ($module['type'] ?? 'unknown'));
    error_log('Parent : ' . ($module['parent'] ?? 'ROOT'));
    error_log('Count  : ' . count($this->modules));

    if ( ! empty( $module['parent'] ) ) {

    error_log(
        'Parent Exists: ' .
        (
            $this->has_module( (string) $module['parent'] )
                ? 'YES'
                : 'NO'
        )
    );

}

error_log('=============================');
error_log('');

    /*
     * If a parent has been assigned, make sure it exists.
     * Otherwise treat the module as a root-level module.
     */
    if (
        ! empty( $module['parent'] ) &&
        $this->has_module( (string) $module['parent'] )
    ) {

        $this->modules[] = $module;
        return;

    }

    $module['parent'] = null;

    $this->modules[] = $module;

}

	/**
	 * Remove a Harmony module.
	 *
	 * @param string $id Module ID.
	 *
	 * @return void
	 */
	public function remove_module( string $id ): void {

		$this->modules = array_values(
			array_filter(
				$this->modules,
				static fn ( array $module ): bool => $module['id'] !== $id
			)
		);

	}

    /**
	 * Update a Harmony module.
	 *
	 * @param string               $id      Module ID.
	 * @param array<string,string> $changes Updated module values.
	 *
	 * @return void
	 */
	public function update_module(
		string $id,
		array $changes
	): void {

		foreach ( $this->modules as $index => $module ) {

			if ( $module['id'] !== $id ) {
				continue;
			}

			$this->modules[ $index ] = array_merge(
				$module,
				$changes
			);

			return;

		}

	}

    /**
     * Return all child modules for a container.
     *
     * @param string $id Parent module ID.
     *
     * @return array<int, array<string, mixed>>
    */
    public function get_children(
        string $id
    ): array {

        $children = [];

        foreach ( $this->modules as $module ) {

            if (
                isset( $module['parent'] ) &&
                $module['parent'] === $id
            ) {
            $children[] = $module;
            }

        }

        return $children;

    }

    /**
     * Assign a parent container to a module.
     *
     * @param string      $child  Child module ID.
     * @param string|null $parent Parent module ID.
     *
     * @return void
     */
    public function set_parent(
        string $child,
        ?string $parent
    ): void {

        foreach ( $this->modules as $index => $module ) {

            if ( $module['id'] !== $child ) {
                continue;
            }

            $this->modules[ $index ]['parent'] = $parent;

            return;

        }

    }

	/**
     * Move a module into a container.
     *
     * This assigns the module's parent without affecting the
     * existing sibling ordering. Reordering inside containers
     * will be added in a later milestone.
     *
     * @param string $source_id    Module being moved.
     * @param string $container_id Container module ID.
     *
     * @return bool
     */
    public function move_into(
        string $source_id,
        string $container_id
    ): bool {

        if ( ! $this->has_module( $source_id ) ) {
            return false;
        }

        if ( ! $this->has_module( $container_id ) ) {
            return false;
        }

        if ( ! $this->is_container( $container_id ) ) {
            return false;
        }

        $this->set_parent(
            $source_id,
            $container_id
        );

		error_log(
    'SAP: Module order after move = ' .
    wp_json_encode(
        array_map(
            static fn($m) => [
                'id' => $m['id'],
                'type' => $m['type'],
                'parent' => $m['parent'] ?? null,
            ],
            $this->modules
        )
    )
);

        return true;

    }
	
	/**
     * Determine whether a Harmony module is a container.
     *
     * @param string $id Module ID.
     *
     * @return bool
     */
    public function is_container( string $id ): bool {

        $module = $this->get_module( $id );

        if ( null === $module ) {
        return false;
        }

        $containers = [
            'website',
            'section',
            'row',
            'column',
        ];

        return in_array(
            strtolower( (string) ( $module['type'] ?? '' ) ),
            $containers,
            true
        );

    }

	/**
     * Move a Harmony module relative to another module.
     *
     * @param string $source_id Source module ID.
     * @param string $target_id Target module ID.
     * @param string $position  before|after
     *
     * @return bool
    */
    public function move_module(
	string $source_id,
	string $target_id,
	string $position = 'before'
    ): bool {

	if ( $source_id === $target_id ) {
		return false;
	}

	$source_index = null;
	$target_index = null;

	foreach ( $this->modules as $index => $module ) {

		if ( $module['id'] === $source_id ) {
			$source_index = $index;
		}

		if ( $module['id'] === $target_id ) {
			$target_index = $index;
		}

	}

	if ( null === $source_index || null === $target_index ) {
		return false;
	}

	$module = $this->modules[ $source_index ];

    /*
     * Flat moves always remove the parent relationship.
     */

    array_splice( $this->modules, $source_index, 1 );

	if ( $source_index < $target_index ) {
		$target_index--;
	}

	if ( 'after' === $position ) {
		$target_index++;
	}

	array_splice(
		$this->modules,
		$target_index,
		0,
		[ $module ]
	);

	return true;

}

}