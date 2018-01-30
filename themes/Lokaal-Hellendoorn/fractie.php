<?php
/*
Template Name: Fractie pagina
*/
?>
<?php get_header(); ?>

<div class="hero-image" style="background-image:url('<?php the_field('header_image') ?>')">
    <div class="content">
        <h1><?php the_title();?></h1>
    </div>
</div>

    <div class="container">

        <?php
        $args = array(
            'post_type' => 'fractie',
            'post_status'=>"publish",
            'orderby'=>"date",
            'posts_per_page' => -1
        );
        $nieuws = new WP_Query( $args );
        if( $nieuws->have_posts() ) {
            while( $nieuws->have_posts() ) {
                $nieuws->the_post();
                ?>
                <div class="fractie-lid-container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="avatar-image" style="background-image:url('<?php the_field('profiel_foto') ?>')"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-8">
                            <div class="avatar-info">
                                <h3><?php the_title();?></h3>
                                <p class="intro"><?php the_field('intro');?></p>
                                <p><?php the_field('persoonlijk_verhaal');?></p>
                            </div>
                        </div>
                    </div>
                    <button class="btn fractie-info">lees verder</button>
                </div>

                <?php
            }
        }
        else {
            echo 'er zijn geen fractie leden !';
        }
        ?>




    </div>


<?php get_footer(); ?>
