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
                <div class="col-xs-12">

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

                            ob_start();
                            the_content();
                            $contents = ob_get_clean();

                            // Add the page title as h2 title if contents has no title.
                            if (strpos($contents, '<h2>') === false) {
                                the_title('<h2>', '</h2><!-- .entry-header -->');
                            }

                            // Add "table"-class to table element.
                            $contents = str_replace('<table>', '<table class="table">', $contents);

                            echo $contents;

                        endwhile;

                    else :

                        // If no content, include the "No posts found" template.
                        get_template_part('content', 'none');

                    endif;

                    ?>
                </div>
            </div>
        </div>

        <p>&nbsp;</p>

        <?php

        /**
         * Show the carousel on the front page.
         */

        ?>
        <?php if (is_front_page()) : ?>

            <div class="carousel-title">
                <h3>Plaatsen in de gemeente Hellendoorn</h3>
            </div>

            <div class="owl-carousel owl-theme">

                <a href="/daarle">
                    <div class="item daarle">
                        <div class="place-name ">
                            <h4>Daarle</h4>
                        </div>
                    </div>
                </a>

                <a href="/daarlerveen">
                    <div class="item daarlerveen">
                        <div class="place-name ">
                            <h4>Daarlerveen</h4>
                        </div>
                    </div>
                </a>

                <a href="/haarle">
                    <div class="item haarle">
                        <div class="place-name ">
                            <h4>Haarle</h4>
                        </div>
                    </div>
                </a>

                <a href="/hellendoorn">
                    <div class="item hellendoorn">
                        <div class="place-name ">
                            <h4>Hellendoorn</h4>
                        </div>
                    </div>
                </a>

                <a href="/hulsen">
                    <div class="item hulsen">
                        <div class="place-name ">
                            <h4>Hulsen</h4>
                        </div>
                    </div>
                </a>

                <a href="/marle">
                    <div class="item marle">
                        <div class="place-name ">
                            <h4>Marle</h4>
                        </div>
                    </div>
                </a>

                <a href="/nijverdal">
                    <div class="item nijverdal">
                        <div class="place-name ">
                            <h4>Nijverdal</h4>
                        </div>
                    </div>
                </a>
                <a href="/egede">
                    <div class="item egede">
                        <div class="place-name ">
                            <h4>Egede,<br>
                                Hancate,<br>
                                Eelen <br>
                                en Rhaan
                            </h4>
                        </div>
                    </div>
                </a>

            </div>
        <?php endif; ?>


        <?php
        /**
         * Contact form.
         */

        ob_start();
        the_title();
        $title = ob_get_clean();

        ?>
        <?php if (strtolower($title) === "lid worden" || strtolower($title) === "contact"
            || strtolower($title) === "windturbines") : ?>

        <style>
            #hoax-error {
                margin-top: -1.5em;
            }
        </style>

            <div class="container">
                <form id="contactForm" action="<?php bloginfo('template_directory'); ?>/contacthandler.php">

                    <input type="hidden" name="title" value="<?php echo htmlspecialchars($title) ?>" />

                    <div class="form-group row">
                        <div class="col-xs-12">

                            <input id="field1" name="field1" class="form-control" type="text">
                            <label for="field1" class="col-xs-12 col-sm-6 col-form-label">Naam</label>

                        </div>
                    </div>
                    <?php if (strtolower($title) === "windturbines") { ?>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <input id="address" name="address" class="form-control" type="text">
                                <label for="address" class="col-xs-12 col-form-label">Adres</label>

                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <input id="email" name="email" class="form-control" type="text">
                            <label for="email" class="col-xs-12 col-form-label">E-mail</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <input id="phonenumber" name="phonenumber" class="form-control" type="text">
                            <label for="phonenumber" class="col-xs-12 col-form-label">Telefoonnummer
                                (optioneel)</label>

                        </div>
                    </div>

                    <?php if (strtolower($title) !== "windturbines") { ?>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <textarea id="message" name="message" class="form-control" type="text"></textarea>
                            <label for="message" class="col-xs-12 col-form-label">Bericht</label>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="form-group row" style="display:none">
                        <div class="col-xs-12">
                            <input id="name" name="name" class="form-control" type="text">
                            <label for="name" class="col-xs-12 col-form-label">Name</label>

                        </div>
                    </div>

                    <?php if (strtolower($title) === "windturbines") { ?>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <div class="checkbox">
                                    <label style="position: static">
                                        <input type="checkbox" id="newsletter" name="newsletter" value="true"/>
                                        Ja, ik ontvang graag twee keer per jaar de Lokaal Hellendoorn nieuwsbrief
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <div class="checkbox">
                                    <label style="position: static" style="margin-bottom: -100px">
                                        <input id="hoax" name="hoax" value="haha" type="checkbox" />
                                        Hierbij verklaar ik dat ik op dit moment geen coronaklachten heb
                                        (hoesten, verkoudheidsklachten, verhoging of koorts, benauwdheid,
                                        rek- en/of smaakverlies) en dat ik niet naar de thema-avond kom mocht
                                        ik deze klachten alsnog krijgen.
                                    </label>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="button-container" style="<?php echo (strtolower($title) === "windturbines") ? "padding-top: 0" : "" ?>">
                        <button type="submit" class="btn">Verstuur</button>
                    </div>
                </form>
            </div>

        <?php endif; ?>

    </section>


<?php get_footer(); ?>