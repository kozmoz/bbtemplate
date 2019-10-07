<?php

/**
 * Template Name: Bestuur pagina
 */

get_header();

?>

<div class="hero-image" style="background-image:url('<?php the_field('header_image') ?>')">
    <div class="content">
        <h1><?php the_title();?></h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Bestuursleden</h2>
        </div>
    </div>
</div>
<div class="container bestuur">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Functie</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if( have_rows('bestuursleden') ):
                    while ( have_rows('bestuursleden') ) : the_row();?>
                        <tr>
                            <td><?php the_sub_field('naam') ?></td>
                            <td><?php the_sub_field('functie') ?></div>
                        </tr>
                    <?php endwhile;
                endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php get_footer(); ?>
