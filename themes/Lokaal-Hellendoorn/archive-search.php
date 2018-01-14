<?php
/* Template Name: Custom Search */
?>

<?php get_header(); ?>

<div class="hero-image searchResults">
    <div class="content">
        <h1>Zoekresultaten voor: <br />
            <?php echo htmlspecialchars($s, ENT_NOQUOTES, 'UTF-8'); ?> </h1>
    </div>
</div>


<div class="container">
    <div class="row">

        <div class="news-container" >


            <?php

            if ( have_posts() ) :
                while ( have_posts() ) : the_post();?>
            <div class = "col-xs-12 col-sm-6 col-md-4" >
                <div class = "news-item" style="background:url('<?php the_field('nieuws_afbeelding');?>')">
                    <div class="news-item-title">
                        <h3><?php the_title();?></h3>
                    </div>
                    <a href="<?php the_permalink();?>"><button>Lees verder</button></a>
                </div>
            </div>
                    <?php
                        endwhile;
                    else :
                        echo ( '<div class="container">' );
                        echo ( '<div class="row">' );
                        echo ( '<div class="col-xs-12">' );
                        echo ( '<h2>Helaas, er zijn geen resultaten</h2>' );
                        echo ( '</div>' );
                        echo ( '</div>' );
                        echo ( '</div>' );
                    endif;
                    ?>

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
