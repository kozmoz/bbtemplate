<?php
/*
Template Name: News pagina
*/
?>
<?php get_header(); ?>

<div class="hero-image" style="background-image:url('<?php the_field('header_image') ?>')">
    <div class="content">
        <h1><?php the_title(); ?></h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="zoekveld-container">
                <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform" class="zoekveld"
                      oninput="validateSearch()">
                    <div class="search"></div>
                    <input class="tekst" type="text" name="s" placeholder="Zoek in nieuws"/>
                    <input class="btn search-go" type="submit" alt="Search" value="Zoek"/>
                    <input type="hidden" name="post_type" value="nieuws"/> <!-- // hidden 'products' value -->
                </form>
                <script>
                function validateSearch() {
                    var input = $('.tekst').val();
                    if (input.length < 2) {
                        $('.btn.search-go').prop('disabled', true);
                    } else {
                        $('.btn.search-go').prop('disabled', false);
                    }
                    return false;
                }
                </script>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="news-highlight">
            <?php
            $args = array('post_status' => "publish", 'post_type' => "nieuws", 'orderby' => "date", 'posts_per_page' => 1);
            $lastposts = get_posts($args);
            foreach ($lastposts as $post) : setup_postdata($post); ?>

                <div class="col-xs-12 col-sm-8">
                    <div class="news-item-previeuw">
                        <h3><?php the_title(); ?></h3>
                        <p class="post-publish-date">Gepubliceerd op <?php the_time( 'j F, Y' ); ?>.</p>
                        <p><?php the_field('nieuws_tekst'); ?></p>
                        <a class="btn" href="<?php the_permalink(); ?>">lees verder</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="news-item-image"
                         style="background-image:url('<?php the_field('nieuws_afbeelding'); ?>')">
                    </div>
                </div>


            <?php endforeach; ?>

        </div>
    </div>
    <div class="row">
        <div class="news-container">

            <?php
            $args = array(
                'post_type' => 'nieuws',
                'post_status' => "publish",
                'orderby' => "date",
                'posts_per_page' => 8
            );
            $nieuws = new WP_Query($args);
            if ($nieuws->have_posts()) {
                while ($nieuws->have_posts()) {
                    $nieuws->the_post();
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="news-item" style="background:url('<?php the_field('nieuws_afbeelding'); ?>')">
                            <div class="news-item-title">
                                <h3><?php the_title(); ?></h3>
                            </div>
                            <a href="<?php the_permalink(); ?>">
                                <button>Lees verder</button>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo 'er zijn geen nieuws berichten !';
            }
            ?>

        </div>

    </div>

</div>

<div class="container">
    <div class="btn-container">
        <button data-page="1" class="btn ajax_load_more_news" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
            Laad meer
            <div class="loader"></div>
        </button>
    </div>
</div>


<?php get_footer(); ?>


