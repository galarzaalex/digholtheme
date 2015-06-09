<?php
/**
 * The template for displaying Archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Catch Themes
 * @subpackage Catch Responsive
 * @since Catch Responsive 1.0 
 */

get_header(); ?>
<?
function sort_function ($post1, $post2) {
	$pltitle = $post1->post_title;
	$p2title = $post2->post_title;
	
	return strcmp ($pltitle, $p2title);
}
?>
	<section id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						single_cat_title( '', true );					
					?>
				</h1>
				
			</header><!-- .page-header -->

			<?php 
			$posts_by_tag = aggregate_posts_by_tag ();
			$i = 0;
			$accordion = "[accordion openfirst='true']";
			ksort($posts_by_tag);
				foreach (array_keys($posts_by_tag) as $tag) {
					$accordion .= "[accordion-item title='$tag']";
			
			$posts = $posts_by_tag[$tag];
				uasort($posts, "sort_function");	
				foreach ($posts as $a_post) {
					$ID = $a_post->ID;
					if ( has_post_thumbnail ($ID) ) {
  						$thumbnail = get_the_post_thumbnail($ID);
  					}
  					else {
  						$thumbnail = "<div class='category-listing-no-thumbnail'>No image available</div>";
  					}
  					$accordion .= 
							"<a href='" . get_permalink( $ID ) . "'>" .
  							"<div class='category-item-container'>" .
      						$thumbnail .
    							"<div class='category-item-title'>$a_post->post_title</div>" .
    						"</div>" .
						  "</a>";
				}
					
				$accordion .= "[/accordion-item]";
							
				$i++;
			}
			
			$accordion .= "[/accordion]";
			echo do_shortcode ($accordion);
			?>
			
			<?php catchresponsive_content_nav( 'nav-below' ); ?>
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
