<?php
/*
Template Name: Over ons pagina
*/
?>
<?php get_header(); ?>

    <div class="hero-image" style="background-image:url('<?php the_field('header_afbeelding') ?>')">
        <div class="content">
            <h1> <?php the_title();?></h1>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2>Historie Lokaal Hellendoorn</h2>
            </div>
        </div>
        <div class="top-content">
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <img src="<?php the_field('over_afbeelding');?>" alt="news image">
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?php the_field('over_tekst');?>
                </div>
            </div>
        </div>
        <div class="bottom-content">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?php the_field('over_tekst2');?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <img src="<?php the_field('over_afbeelding2');?>" alt="news image">
                </div>
            </div>
        </div>

    </div>

<?php get_footer(); ?>