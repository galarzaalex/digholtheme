<?php

add_shortcode('fast_facts', function($atts){
	$atts = shortcode_atts(
		array(
			'name' => Name,
		), $atts);
	return '
	<div class="container_fast_facts">
	</div>;
});

