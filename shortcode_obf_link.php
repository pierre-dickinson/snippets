<?php
/**
* Création shortcode pour générer des liens obfusqués
@usage [obf_link texte="Voici mon texte" url="https://www.url.com" target="_blank"]
*/

function obf_link( $atts ) {
	$data = shortcode_atts( array(
	   'texte' => 'Voici mon texte',
	   'url' => 'https://www.url.com',
	   'target' => '_blank'
	), $atts );
	$encodeLink = base64_encode($data['url']);
	return "<span class='link text-underline js-obf-link' data-link=".$encodeLink." data-target=".$data['target'].">".$data['texte']."</span>";
 }
 add_shortcode( 'obf_link', 'obf_link' );

?>
