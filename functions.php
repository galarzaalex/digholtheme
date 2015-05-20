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
			'src' => '',
			'width' => 250,
			'height' => 500,
			'title' => 'An Image'
			'value' => 'Words'
		), $atts);
		
	return '
	<div class="container_fast_facts"> <img src="'. $atts['src'].'" width="'. $atts['width'].'" height="'. $atts['height'].'"></img>
		<h4>'. $atts['title'].'</h4>
			<h5>'. $atts['value'].'</h5>
	</div>';
});

