<?php
if( have_rows('page_component')) {
	$loop = 1;
    while ( have_rows('page_component') ) {
        the_row();
        $layout = get_row_layout();
        switch ( $layout ) {
            case $layout:
                include(locate_template('template-part/components/_'.$layout.'.php'));
            break;
        }
    }
}
?>
