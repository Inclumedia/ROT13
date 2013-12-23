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
    'rot13-desc' => 'Adds parser functions that display content as ROT13- or otherwise substitution cipher-encrypted, except for users with a specified right',
    'rot13-wrong-strlen' => 'The encyrption key that was provided has $1 characters; it was supposed to be $2 characters.',
    'rot13-odd-number' => '$wgROT13Strlen is set to $1; it is supposed to be an even number.'
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
   'cipher' => array( 0, 'cipher' ),
);
