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
			'height' => 300,
			'title' => 'An Image',
			'value' => 'Words'
		), $atts);
		
	return '
	<div class="container_fast_facts"> <img src="'. $atts['src'].'" width="'. $atts['width'].'" height="'. $atts['height'].'"></img>
		<h4>'. $atts['title'].'</h4>
			<h5>'. $atts['value'].'</h5>
	</div>';
});

function revconcept_anchor($atts, $content=null, $code="") {
    $return = '<div class="page-anchor" id="'.$content.'">';
    $return .= '</div>';
    return $return;
}
add_shortcode('anchor' , 'revconcept_anchor' );

function content_link($atts, $content=null, $code="") {
    $return = '<div class="container_content_link" id="'.$content.'">';
    $return .= '</div>';
    return $return;
}
add_shortcode('content_link', function($atts){
	$atts = shortcode_atts(
		array(
			'title' => 'Contents',
			'link' => 'Link'
		), $atts);
		
	return '
	<div class="container_fast_facts"> <contents="'. $atts['contents'].'"></contents>
		<h4>'. $atts['link'].'</h4>
	</div>';
});