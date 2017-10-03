<?php
/*
Template Name: Plaats pagina
*/
?>
<?php get_header(); ?>

    <div class="hero-image" style="background-image:url('<?php the_field('plaats_afbeelding') ?>')">
        <div class="content">
            <h1> <?php the_title();?></h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <img src="<?php the_field('plaats_afbeelding');?>" alt="news image">
            </div>
            <div class="col-xs-12 col-sm-6">
                <?php the_field('plaats_tekst');?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="button-container">
                    <a class="btn" href="/">ga terug</a>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>