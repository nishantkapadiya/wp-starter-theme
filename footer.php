<?php
/**
* The template for displaying the footer
*/

		echo '
		</div>
		<!-- footer part -->
        <footer class="main-footer py-30">
            <div class="container">
                <div class="h2">Footer</div>
            </div>
        </footer>
    </div>';
        echo get_field( 'add_code_in_footer', 'options' );
		wp_footer();
	echo '</body>
</html>';
