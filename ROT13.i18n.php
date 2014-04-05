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
    'encrypt' => 'Encrypt',
    'encrypt-notallowed' => 'You are not allowed to encrypt.',
    'rot13-desc' => 'Adds parser functions that display content as ROT13- or otherwise substitution cipher-encrypted, except for users with a specified right',
    'rot13-wrong-strlen' => 'The encyrption key that was provided has {{PLURAL:$1|one character|$1 characters}}; it was supposed to be $2 {{PLURAL:$2|characters}}.',
    'rot13-odd-number' => 'Parameter <code>$wgROT13Strlen</code> is set to "$1"; it is supposed to be an even number.'
);

/** German (Deutsch)
* @author Kghbln
*/
$messages['de'] = array(
    'encrypt' => 'Verschlüsselung',
    'encrypt-notallowed' => 'Du bist nicht berechtigt eine Verschlüsselung durchzuführen.',
    'rot13-desc' => 'Ermöglicht die Verschlüsselung der Seiteninhalte mit dem ROT13-Verfahren, so dass sie nur noch mit besonderer Berechtigung eingesehen werden können',
    'rot13-wrong-strlen' => 'Der zur Verschlüsselung angegebene Schlüssel hat eine Länge von {{PLURAL:$1|einem Zeichen|$1 Zeichen}}. Die Länge muss indes $2 {{PLURAL:$2|Zeichen}} betragen.',
    'rot13-odd-number' => 'Der Konfigurationsparameter <code>$wgROT13Strlen</code> wurde mit „$1“ festgelegt, muss aber einer geraden Zahl entsprechen.'
);

/** German (formal address) (Deutsch (Sie-Form))
* @author Kghbln
*/
$messages['de-formal'] = array(
    'encrypt-notallowed' => 'Sie sind nicht berechtigt eine Verschlüsselung durchzuführen.'
);

$magicWords = array();

/** English
* @author Nathan Larson (Leucosticte)
*/
$magicWords['en'] = array(
   'rot13' => array( 0, 'rot13' ),
   'cipher' => array( 0, 'cipher' ),
);
