<?php
/**
 * Default page tmeplate.
 */
if (!defined('ABSPATH') || !function_exists('add_filter')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}
get_header();
echo '<section class="inner-hero">';
		$post_img = get_the_post_thumbnail();
		echo '<div class="inner-hero-img img-to-bg">'.$post_img.'</div>';
		echo '<div class="container inner-hero-content text-center py-30">
			<h1 class="h1">'.get_the_title().'</h1>
		</div>
</section>';
echo '<div class="main-content">';
	$content = apply_filters('the_content', $post->post_content);
	if( $content ):
		echo '<section class="body-content py-30">
			<div class="container">';
				the_content();
			echo '</div>
		</section>';
	endif;
echo '</div>';
get_footer();