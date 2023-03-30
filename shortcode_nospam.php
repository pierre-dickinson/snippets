<?php
/**
* Création shortcode pour encodage des emails à mettre dans fonction.php
* @usage [nospam email="adresse@mail.com"]
*/

function nospam( $atts ) {
	$data = shortcode_atts( array(
	   'email' => 'adresse@email.com'
	), $atts );
	$email = antispambot($data['email']);
	return "<span class='nospam'><a href='mailto:".$email."'>".$email."</a></span>";
 }
 add_shortcode( 'nospam', 'nospam' );

?>
