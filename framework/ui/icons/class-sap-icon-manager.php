<?php

declare(strict_types=1);

/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * SAP-028.2
 * Icon Manager
 *
 * Responsibility:
 * Render safe SVG icons for the SAP Application Shell.
 *
 * @package ServantArtistPlatform
 * @since   1.0.0
 * ============================================================
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class SAP_Icon_Manager
 *
 * Provides centralized SVG icon rendering for SAP UI components.
 *
 * @since 1.0.0
 */
final class SAP_Icon_Manager {

	/**
	 * Render an SVG icon.
	 *
	 * @since 1.0.0
	 *
	 * @param string $icon Icon name.
	 *
	 * @return string
	 */
	public static function render(
		string $icon
	): string {

		$icon = sanitize_key( $icon );

		$icons = self::icons();

		if ( ! array_key_exists( $icon, $icons ) ) {
			$icon = 'default';
		}

		return $icons[ $icon ];
	}

	/**
	 * Return registered SVG icons.
	 *
	 * Icons use currentColor so CSS controls hover and active states.
	 *
	 * @since 1.0.0
	 *
	 * @return array<string,string>
	 */
	private static function icons(): array {

		return [
			'default' => self::svg(
				'<circle cx="12" cy="12" r="9" />'
			),

			'dashboard' => self::svg(
				'<rect x="3" y="3" width="7" height="7" rx="1.5" />
				<rect x="14" y="3" width="7" height="7" rx="1.5" />
				<rect x="3" y="14" width="7" height="7" rx="1.5" />
				<rect x="14" y="14" width="7" height="7" rx="1.5" />'
			),

			'artists' => self::svg(
				'<path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z" />
				<path d="M4 21a8 8 0 0 1 16 0" />'
			),

			'music' => self::svg(
				'<path d="M9 18V5l11-2v13" />
				<circle cx="6" cy="18" r="3" />
				<circle cx="17" cy="16" r="3" />'
			),

			'calendar' => self::svg(
				'<rect x="3" y="5" width="18" height="16" rx="2" />
				<path d="M16 3v4" />
				<path d="M8 3v4" />
				<path d="M3 11h18" />'
			),

			'media' => self::svg(
				'<rect x="3" y="5" width="18" height="14" rx="2" />
				<path d="m10 9 5 3-5 3Z" />'
			),

			'settings' => self::svg(
				'<circle cx="12" cy="12" r="3" />
				<path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.6V21a2 2 0 1 1-4 0v-.1a1.7 1.7 0 0 0-1-1.6 1.7 1.7 0 0 0-1.9.3l-.1.1A2 2 0 1 1 4.2 17l.1-.1a1.7 1.7 0 0 0 .3-1.9 1.7 1.7 0 0 0-1.6-1H3a2 2 0 1 1 0-4h.1a1.7 1.7 0 0 0 1.6-1 1.7 1.7 0 0 0-.3-1.9l-.1-.1A2 2 0 1 1 7 4.2l.1.1a1.7 1.7 0 0 0 1.9.3 1.7 1.7 0 0 0 1-1.6V3a2 2 0 1 1 4 0v.1a1.7 1.7 0 0 0 1 1.6 1.7 1.7 0 0 0 1.9-.3l.1-.1A2 2 0 1 1 19.8 7l-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 1.6 1h.1a2 2 0 1 1 0 4H21a1.7 1.7 0 0 0-1.6 1Z" />'
			),
		];
	}

	/**
	 * Wrap SVG paths in a standard SVG element.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content SVG inner markup.
	 *
	 * @return string
	 */
	private static function svg(
		string $content
	): string {

		return sprintf(
			'<svg class="sap-icon" width="20" height="20" viewBox="0 0 24 24" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">%s</svg>',
			$content
		);
	}
}