<?php
if ( !defined( 'MEDIAWIKI' ) ) {
   die( 'This file is a MediaWiki extension. It is not a valid entry point' );
}

class SpecialEncrypt extends SpecialPage {
   function __construct( ) {
      parent::__construct( 'Encrypt', 'encrypt' );
   }

   public function userCanExecute( User $user ) {
      return true;
   }

   function execute( $par ) {
      $user = $this->getUser();
      if ( !$user->isAllowed( 'encrypt' ) ) {
         throw new PermissionsError( null, array( array(
            'encrypt-notallowed' ) ) );
      }
      $this->setHeaders();
      $output = $this->getOutput();
      global $wgScript, $wgROT13DefaultKey;
      $request = $this->getRequest();
      $content = $request->getVal( 'page' );
      $parVal = $request->getVal( 'par' );
      if ( $parVal ) {
         $par = $parVal;
      }
      if ( !$par || strlen( $par ) != 52 ) {
         $par = $wgROT13DefaultKey;
      }
      $this->getOutput()->addHTML(
         Xml::textarea( 'page', $content, 40, 5, array( 'form' => 'viewwikitext-form1' ) ) . ' ' .
         Html::closeElement( 'textarea' ) . "\n" .
         Html::openElement( 'form', array( 'method' => 'post', 'action' => $wgScript, 'name' => 'uluser', 'id' => 'viewwikitext-form1' ) ) .
         Xml::submitButton( $this->msg( 'htmlform-submit' )->text() ) .
         Html::hidden( 'title', $this->getPageTitle()->getPrefixedText() ) .
         Html::hidden( 'par', $par ) .
         Html::closeElement( 'form' ) . "\n"
      );
      $keys = str_split ( $par, strlen ( $par ) / 2 );
      $text = '';
      $newOutput = '';
      if ( $content ) {
         $array = str_split ( $content );
         foreach ( $array as $element ) {
                 if ( strpos ( $keys[0], strtolower ( $element ) ) !== FALSE ) {
                         $newChar = substr ( $keys[1], strpos ( $keys[0],
                                 strtolower ( $element ) ), 1 );
                         if ( ctype_upper ( $element ) ) {
                                 $newChar = strtoupper( $newChar );
                         } else {
                                 $newChar = strtolower( $newChar );
                         }
                         $newOutput .= $newChar;
                 } else {
                         $newOutput .= $element;
                 }
         }
      }
      $text = $newOutput;
      #$pageLang = $title->getPageLanguage();
      $params = array(
         'id' => 'wpTextbox1',
         'name' => 'wpTextbox1',
         'cols' => $this->getUser()->getOption( 'cols' ),
         'rows' => $this->getUser()->getOption( 'rows' ),
         'readonly' => 'readonly',
         #'lang' => $pageLang->getHtmlCode(),
         #'dir' => $pageLang->getDir(),
      );
      $output->addHTML( Html::element( 'textarea', $params, $text ) );
      return;
   }
}