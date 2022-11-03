<?php

$newsImage = get_field('nieuws_afbeelding');

// If there's content, it means the new Gutenberg editor is used.
ob_start();
the_content();
$content = trim(ob_get_clean());

// Try to find the first image in the contents.
if (!$newsImage && $content) {
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*?>/i', $content, $matches);
    if ($output) {
        $image_url = $matches[1][0];
        if ($image_url) {
            $newsImage = ['url' => $image_url];
        }
    }
}

?>
<?php get_header(); ?>

    <div class="hero-image home" style="background-image:url('<?php echo $newsImage ? $newsImage['url'] : ''; ?>')">
        <div class="content">
            <h1> <?php the_title(); ?></h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php if (!$content && $newsImage) { ?>
                <div class="col-xs-12 col-sm-6">
                    <img src="<?php echo $newsImage['url']; ?>" alt="Nieuws afbeelding">
                </div>
            <?php } ?>

            <div class="col-xs-12 col-md-auto">
                <p class="post-publish-date-single">Gepubliceerd op <?php the_time('j F, Y'); ?>.</p>

                <?php the_field('nieuws_tekst'); ?>

                <?php echo $content; ?>
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