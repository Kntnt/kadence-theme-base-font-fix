<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kadence Theme Base Font Fix
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Adds italic variant to Kadence Theme's the base font if it is loaded from Google Fonts.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */

add_filter( 'kadence_theme_google_fonts_array', function ( $google_fonts ) {
	$base_font = Kadence\kadence()->option( 'base_font' );
	$base_font =& $google_fonts[ $base_font['family'] ];
	$new_variants = [];
	foreach ( $base_font['fontvariants'] as $variant ) {
		$variant = rtrim( $variant, 'i' );
		$new_variants[] = $variant;
		$new_variants[] = "{$variant}i";
	}
	$base_font['fontvariants'] = $new_variants;
	return $google_fonts;
}, 1 );
