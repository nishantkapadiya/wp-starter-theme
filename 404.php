<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */
if (!defined('ABSPATH') || !function_exists('add_filter')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}
get_header();
echo '<div class="main-content">
	<section class="body-content container py-30">
		<h1>404 Page</h1>
	</section>
</div>';
get_footer();
