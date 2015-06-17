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
			'title' => 'An Image'
		), $atts);
		
	return '
	<div class="image_fast_facts"> <img src="'. $atts['src'].'" width="'. $atts['width'].'" height="'. $atts['height'].'"></img>
		<h4>'. $atts['title'].'</h4>
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

function aggregate_posts_by_tag () {
  // First, gather all posts by a particular tag together into an array
  $posts_by_tag = array ();
					
  while ( have_posts() ) : the_post();
    $post_title = get_the_title ();
    $post_tags = get_the_tags ();
					
    $post_tag = $post_tags[0]->name;
						
    $posts_in_tag = array ();
    if (array_key_exists ($post_tag, $posts_by_tag)) {
      $posts_in_tag = $posts_by_tag[$post_tag];
    }
    //$posts_in_tag[] = $post_title;
    $posts_in_tag[] = get_post();
    $posts_by_tag[$post_tag] = $posts_in_tag;					
  endwhile;
  
  return $posts_by_tag;
}
