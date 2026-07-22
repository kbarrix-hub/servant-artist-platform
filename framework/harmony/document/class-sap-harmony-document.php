<?php
declare(strict_types=1);

/**
 * Harmony Document.
 */

defined( 'ABSPATH' ) || exit;

final class SAP_Harmony_Document {

	/**
	 * Harmony collection.
	 *
	 * @var SAP_Harmony_Collection
	 */
	private SAP_Harmony_Collection $collection;

	/**
	 * Constructor.
	 *
	 * @param SAP_Harmony_Collection $collection Collection.
	 */
	public function __construct(
		SAP_Harmony_Collection $collection
	) {

		$this->collection = $collection;

	}

	/**
	 * Return the module collection.
	 *
	 * @return SAP_Harmony_Collection
	 */
	public function collection(): SAP_Harmony_Collection {

		return $this->collection;

	}

		/**
	 * Convert the document into a serializable array.
	 *
	 * @return array<string,mixed>
	 */
	public function to_array(): array {

		return [
			'modules' => $this->collection->get_modules(),
		];

	}

	/**
	 * Create a document from stored data.
	 *
	 * @param array<string,mixed> $data Stored document.
	 *
	 * @return self
	 */
	public static function from_array(
		array $data
	): self {

		$collection = new SAP_Harmony_Collection();

		/*
		 * Replace the default modules if saved data exists.
		 */
		if ( isset( $data['modules'] ) && is_array( $data['modules'] ) ) {

			$reflection = new ReflectionClass( $collection );

			$property = $reflection->getProperty(
				'modules'
			);

			$property->setAccessible( true );

			$property->setValue(
				$collection,
				$data['modules']
			);

		}

		return new self(
			$collection
		);

	}

}