<?php
?>
<?php get_header(); ?>

    <!-- Dirty fix for weird styling. -->
    <style>
    img {
        width: 100%;
        height: auto;
    }
    </style>

<div class="hero-image home" style="background-image:url('<?php the_field('nieuws_afbeelding') ?>')">
    <div class="content">
        <h1> <?php the_title();?></h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
          <img src="<?php the_field('nieuws_afbeelding');?>" alt="news image">
        </div>
        <div class="col-xs-12 col-sm-6">
            <p class="post-publish-date-single">Gepubliceerd op <?php the_time( 'j F, Y' ); ?>.</p>

            <?php the_field('nieuws_tekst');?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="button-container">
                <a class="btn" href="/nieuws">ga terug</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>