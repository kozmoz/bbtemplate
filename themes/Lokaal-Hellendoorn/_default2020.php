<?php
/*
Template Name: Default 2020 template
*/

// Enable debugging.
define('WP_DEBUG', true);

?>
<?php get_header(); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col">

                    <?php

                    if (have_posts()) :


                        // Start the Loop.
                        while (have_posts()) : the_post();

                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            // $format = get_post_format();
                            // get_template_part('content', empty($format) ? 'page' : $format);

                            the_content();

                        endwhile;

                    else :

                        the_post();

                        // If no content, include the "No posts found" template.
                        get_template_part('content', 'none');

                    endif;

                    ?>
                </div>
            </div>
        </div>

        <p>&nbsp;</p>

    </section>


<?php get_footer(); ?>