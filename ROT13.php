<?php
/**
 * ROT13 MediaWiki extension.
 *
 * This extension adds a parser function that displays content as
 * ROT13-encrypted, except for users with a specified right.
 *
 * Written by Leucosticte
 * http://www.mediawiki.org/wiki/User:Leucosticte
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @ingroup Extensions
 */

# Alert the user that this is not a valid entry point to MediaWiki if the user tries to access the
# extension file directly.
if( !defined('MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension. It is not a valid entry point' );
}

$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,
	'name' => 'ROT13',
	'author' => 'Nathan Larson',
	'url' => 'https://www.mediawiki.org/wiki/Extension:ROT13',
	'descriptionmsg' => 'rot13-desc',
	'version' => '1.0.1',
);

$wgHooks['ParserFirstCallInit'][] = 'ROT13Setup';
$wgHooks['ParserBeforeStrip'][] = 'ROT13onParserBeforeStrip';
$wgROT13Right = 'block';
$wgExtensionMessagesFiles['ROT13'] = __DIR__ . '/ROT13.i18n.php';

function ROT13Setup( &$parser ) {
	$parser->setFunctionHook( 'rot13', 'ROT13RenderParserFunction' );
}

function ROT13onParserBeforeStrip( &$parser, &$text, &$strip_state ) {
	global $wgROT13Right;
	if( strpos ( $text, '__ROT13__' ) ) {
		$parser->disableCache();
		$rights = $parser->getUser()->getRights();
		$text = str_replace( '__ROT13__', '', $text );
		if( !in_array ( $wgROT13Right, $rights ) ) {
			$text = str_rot13 ( $text );
		}
	}
}

function ROT13RenderParserFunction ( $parser, $param1 = '', $param2 = '' ) {
	$parser->disableCache();
	$output = $param2;
	$rights = $parser->getUser()->getRights();
	if ( !in_array ( $param1, $rights ) ) {
		$output = str_rot13 ( $param2 );
	}
	return $output;
}
