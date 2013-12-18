<?php
/**
 * Internationalisation for ROT13
 *
 * @file
 * @ingroup Extensions
 */
$messages = array();

/** English
 * @author Nathan Larson (Leucosticte)
 */
$messages['en'] = array(
    'rot13-desc' => 'Adds a ROT13 parser function that displays content as ROT13-encrypted, except for users with a specified right'
);

/** German (Deutsch)
* @author Kghbln
*/
$messages['de'] = array(
    'rot13-desc' => 'Ermöglicht die Verschlüsselung der Seiteninhalte mit dem ROT13-Verfahren, so dass sie nur noch mit besonderer Berechtigung eingesehen werden können'
);

$magicWords = array();

/** English
 * @author Nathan Larson (Leucosticte)
 */
$magicWords['en'] = array(
   'rot13' => array( 0, 'rot13' ),
);
