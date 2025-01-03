<?php
/**
* Load the custom functions.
*/

if ( !defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}
/**
 * Upload SVG file permission
 */
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

/**
 * Add excerpt support to pages
 */
add_action('init', 'wp_admin_excerpt_init');

function wp_admin_excerpt_init() {
    add_post_type_support( 'page', 'excerpt' );
}

/**
 * Add quick-collapse feature to ACF Flexible Content fields
 */
add_action('acf/input/admin_head', function() { ?>
    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                var collapseButtonClass = 'collapse-all';

                // Add a clickable link to the label line of flexible content fields
                $('.acf-field-flexible-content > .acf-label')
                    .append('<a class=" button ' + collapseButtonClass + '" style="position: absolute; top: 0; right: 0; cursor: pointer;">Collapse All</a>');

                // Simulate a click on each flexible content item's "collapse" button when clicking the new link
                $('.' + collapseButtonClass).on('click', function() {
                    $('.acf-flexible-content .layout:not(.-collapsed) .acf-fc-layout-controls .-collapse').click();
                });
            });
        })(jQuery);
    </script> <?php
});
add_action('admin_head', 'acf_collapse_css');

function acf_collapse_css() {
echo '<style>
	.acf-field-flexible-content .acf-label {
		padding-bottom: 10px;
	}
	</style>';
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function custom_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Block', 'wpstarter' ),
			'id'            => 'footer-block',
			'description'   => esc_html__( 'Add widgets here to appear menu in your footer.', 'wpstarter' ),
			'before_widget' => '<div id="%1$s" class="mb-sm-30 mb-0">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="sidebar-title">',
			'after_title'   => '</div>',
		)
	);
}
add_action( 'widgets_init', 'custom_widgets_init' );

/**
 * Change the WordPress login page logo to the one set in the backend.
 *
 * The logo is fetched from the "brand_logo" field in the options page.
 *
 * @since 1.0.0
 */
function my_login_logo() {
	$admin_logo = get_field ( "brand_logo","option");
	if ( !empty( $admin_logo ) ) {
		echo '<style type="text/css">
			#login h1 a,
			.login h1 a {
				width: 50%;
				background-image: url('.$admin_logo['url'].');
				background-size: contain;
				background-repeat: no-repeat;
				background-position: bottom center;
			}
		</style>';
	}
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );


/**
 * Return the site URL for the login logo URL.
 *
 * @param string $url The current login logo URL.
 *
 * @return string The site URL.
 */
function custom_loginlogo_url( $url ) {
	return site_url();
}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );

/**
 * Changes the WordPress admin bar logo to the site icon.
 *
 * The WordPress admin bar logo is replaced with the site icon set in the
 * Customizer. The site icon is used as the background image for the logo.
 */
function wpb_custom_logo() {
	if ( get_site_icon_url() != '' ) {
		echo '<style type="text/css">
			#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
				background-image: url(' . get_site_icon_url() . ') !important;
				background-position: 0 0;
				background-size: contain;
				color:rgba(0, 0, 0, 0);
			}
			#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
				background-position: 0 0;
			}
			#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item {
				pointer-events: none;
			}
			#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-sub-wrapper {
				display: none;
			}
		</style>';
	}
}
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');


/**
 * Adds a custom menu page to the WordPress admin area.
 *
 * The menu page is only visible to users with the 'manage_options' capability.
 * The menu page is added at the top level of the menu, and is given a menu
 * slug of 'logo_based_menu'.
 *
 * @since 1.0.0
 */
function register_my_custom_menu_page() {
    add_menu_page( 'Custom Menu Page Title', 'Custom Menu Page', 'manage_options', 'logo_based_menu', '', '', 1);
}
add_action( 'admin_menu', 'register_my_custom_menu_page' );


/**
 * Adds custom CSS to the WordPress admin area to replace the logo in the menu with the site icon.
 *
 * The site icon is retrieved using the `get_field` function from Advanced Custom Fields.
 *
 * The CSS replaces the logo in the menu with the site icon, and removes the menu text.
 *
 * @since 1.0.0
 */
function admin_logo_style() {
	$dash_logo = get_field ( "brand_logo","option" );
	if ( !empty( $dash_logo ) ) {
		echo '<style>
			#toplevel_page_logo_based_menu {
				background: url('.$dash_logo['url'].') no-repeat center/contain;
				margin:10px 0 !important;
                pointer-events:none;
			}
			#toplevel_page_logo_based_menu > a,
            #toplevel_page_logo_based_menu > a > div.wp-menu-image,
            #toplevel_page_logo_based_menu .wp-menu-name {display: none;}
		</style>';
	}
}
add_action('admin_enqueue_scripts', 'admin_logo_style');