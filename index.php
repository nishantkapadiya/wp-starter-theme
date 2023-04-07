<?php
/**
 * The main template file
 */
if (!defined('ABSPATH') || !function_exists('add_filter')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}
get_header();
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
