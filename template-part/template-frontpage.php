<?php
/**
 * Template Name: Front Page
 */

get_header();

echo '
    <!-- banner area part -->
        <section class="hero-section py-30">
            <div class="container">
                <h1>Hero banner goes here</h1>
            </div>
        </section>
        <!-- content area part -->
        <div class="main-content">
            <section class="body-content py-30">
                <div class="container">
                    <h2>About Webstandard</h2>
                </div>
            </section>
        </div>
';
echo '<!-- content area part -->';
echo '<div class="main-content">';
    include(locate_template('template-part/components.php'));
echo '</div>';
get_footer();
