<?php
/*
Template Name: Bestuur pagina
*/
?>
<?php get_header(); ?>

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
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="table">
                <div class="table-row head">
                    <div class="table-cel">naam</div>
                    <div class="table-cel">functie</div>
                    <div class="table-cel">nummer</div>
                    <div class="table-cel">email</div>
                </div>

                <?php
                if( have_rows('bestuursleden') ):
                    while ( have_rows('bestuursleden') ) : the_row();?>
                        <div class="table-row">
                            <div class="table-cel"><?php the_sub_field('naam') ?></div>
                            <div class="table-cel"><?php the_sub_field('functie') ?></div>
                            <div class="table-cel"><a href="tel:<?php the_sub_field('nummer') ?>"><?php the_sub_field('nummer') ?></a></div>
                            <div class="table-cel"><a <a href="mailto:<?php the_sub_field('email') ?>"><?php the_sub_field('email') ?></a></a></div>
                        </div>
                    <?php endwhile;
                endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
