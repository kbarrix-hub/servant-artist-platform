<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Framework Component:
 * SAP-046.6 Song Service
 *
 * Responsibility:
 * Provide Song Manager business data.
 *
 * The Song Service acts as the central access point
 * for song-related information used throughout the
 * Servant Artist Platform.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Song_Service
 *
 * Provides song-related business services.
 *
 * @since 1.0.0
 */
final class SAP_Song_Service {

	/**
	 * Return the total number of songs.
	 *
	 * @return int
	 */
	public function get_song_count(): int {

		return 0;

	}

	/**
	 * Return the number of published songs.
	 *
	 * @return int
	 */
	public function get_published_count(): int {

		return 0;

	}

	/**
	 * Return the number of draft songs.
	 *
	 * @return int
	 */
	public function get_draft_count(): int {

		return 0;

	}

	/**
	 * Return the total number of unique writers.
	 *
	 * @return int
	 */
	public function get_writer_count(): int {

		return 0;

	}

	/**
	 * Return the most recent songs.
	 *
	 * @return array<int, array<string, mixed>>
	 */
	public function get_recent_songs(): array {

		global $wpdb;

		$table = $wpdb->prefix . 'sap_songs';

		$results = $wpdb->get_results(
			"
			SELECT
				id,
				song_title,
				artist_name,
				song_key,
				song_bpm,
				song_status
			FROM {$table}
			ORDER BY created_at DESC
			",
			ARRAY_A
		);

		if ( ! is_array( $results ) ) {
			return [];
		}

		return $results;

	}

	/**
	 * Return one song by ID.
	 *
	 * @param int $song_id Song ID.
	 * @return array<string, mixed>
	 */
	public function get_song( int $song_id ): array {

		global $wpdb;

		if ( $song_id <= 0 ) {
			return [];
		}

		$table = $wpdb->prefix . 'sap_songs';

		$song = $wpdb->get_row(
			$wpdb->prepare(
				"
				SELECT
					id,
					uuid,
					song_title,
					artist_name,
					song_key,
					song_bpm,
					song_status,
					created_at,
					updated_at
				FROM {$table}
				WHERE id = %d
				LIMIT 1
				",
				$song_id
			),
			ARRAY_A
		);

		if ( ! is_array( $song ) ) {
			return [];
		}

		return $song;

	}
    
	/**
	 * Update an existing song.
	 *
	 * @param int                  $song_id Song ID.
	 * @param array<string, mixed> $data    Song data.
	 * @return array<string, mixed>
	 */
	public function update_song(
		int $song_id,
		array $data
	): array {

		global $wpdb;

		if ( $song_id <= 0 ) {
			return [
				'success' => false,
				'song_id' => 0,
				'message' => 'Invalid song ID.',
			];
		}

		$table = $wpdb->prefix . 'sap_songs';

		$result = $wpdb->update(
			$table,
			[
				'song_title'  => $data['song_title'],
				'artist_name' => $data['artist_name'],
				'song_key'    => $data['song_key'],
				'song_bpm'    => $data['song_bpm'],
				'song_status' => $data['song_status'],
			],
			[
				'id' => $song_id,
			],
			[
				'%s',
				'%s',
				'%s',
				'%d',
				'%s',
			],
			[
				'%d',
			]
		);

		if ( false === $result ) {
			return [
				'success' => false,
				'song_id' => $song_id,
				'message' => 'Unable to update song.',
			];
		}

		return [
			'success' => true,
			'song_id' => $song_id,
			'message' => 'Song updated successfully.',
		];

	}
	
	/**
	 * Create a new song.
	 *
	 * @param array<string, mixed> $data Song data.
	 * @return array<string, mixed>
	 */
	public function create_song( array $data ): array {

		global $wpdb;

		$table = $wpdb->prefix . 'sap_songs';

		$uuid = wp_generate_uuid4();

		$result = $wpdb->insert(
			$table,
			[
				'uuid'        => $uuid,
				'song_title'  => $data['song_title'],
				'artist_name' => $data['artist_name'],
				'song_key'    => $data['song_key'],
				'song_bpm'    => $data['song_bpm'],
				'song_status' => $data['song_status'],
			],
			[
				'%s',
				'%s',
				'%s',
				'%s',
				'%d',
				'%s',
			]
		);

		if ( false === $result ) {

			return [
				'success' => false,
				'song_id' => 0,
				'message' => 'Unable to save song.',
			];

		}

		return [
			'success' => true,
			'song_id' => (int) $wpdb->insert_id,
			'message' => 'Song saved successfully.',
		];

	}

}