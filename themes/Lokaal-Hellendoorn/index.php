<?php
/*
Template Name: Homepagina
*/
?>
<?php get_header(); ?>

<div class="hero-image home" style="background-image:url('<?php the_field('header_image') ?>')">
    <div class="content">

        <img src="<?php bloginfo('template_directory'); ?>/images/beeldmerk.png" alt="Lokaal Hellendoorn">
        <h1>Lokaal Hellendoorn</h1>
    </div>
</div>
<div id="home">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="content-container">
                    <?php the_field('page_text')?>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="carousel-title">
                    <h3>Plaatsen in de gemeente Hellendoorn</h3>
                </div>
            </div>
        </div>
    </div>
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

<?php get_footer(); ?>


