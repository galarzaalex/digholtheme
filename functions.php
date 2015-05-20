<?php

function child_scripts_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css', array() );
}
add_action( 'wp_enqueue_scripts', 'child_scripts_styles' );

function fast_facts($atts, $content = null) {
	return '<a href="'.$to.'">'. do_shortcode($content) .'</a>';
}
add_shortcode('fast_facts', function($atts){
	$atts = shortcode_atts(
		array(
			'name' => Name,
		), $atts);
		print_r($atts);
	return '
	<div class="container fast facts"> <img src="http://www.chicagonow.com/steve-dales-pet-world/files/2011/09/Happy-cat.jpg"
	</div>';
});