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
$title = get_field( 'title', 'options' );
$description = get_field( 'description', 'options' );
echo '<div class="main-content">
	<section class="error-404">
		<div class="container py-30">';
		if( $title ){
			echo '<h1>'.$title.'</h1>';
		}else{
			echo'<h1 class="page-title">';
				echo '<span>'. __( 'Oops! That page can&rsquo;t be found.','wpstarter') .'</span>';
			echo '</h1>';
		}
		if( $description ){
			echo '<div class="description">'.$description.'</div>';
		}else{
			echo '<div class="description">';
				echo '<p>'.__('The Page You Requested Cannot Be Found. The Page You Are Looking For Might Have Been Removed, Had Its Name Changed, Or Is Temporarily Unavailable.','wpstarter').'</p>';
				echo'</br>';
				echo '<h5>'.__('Please try the following:','wpstarter').'</h5>';
				echo '<ul>';
					echo '<li>'.__('If you typed the page address in the Address bar, make sure that it is spelled correctly.','wpstarter').'</li>';
					echo '<li>'.__('Open the ','wpstarter').'<a href="'.get_home_url().'">'.__('Home Page</a> and look for links to the information you want.','wpstarter').'</li>';
					echo '<li>'.__('Use the navigation bar on the left or top to find the link you are looking for.','wpstarter').'</li>
				</ul>';
				echo '<a href="'.get_home_url().'" class="btn mt-15">'.__('Back To Home','wpstarter').'</a>';
			echo '</div>';
		}
	echo '</div>
	</section>
</div>';
get_footer();