<?php
/*
Template Name: Contact pagina
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
            <h2>Stuur ons een bericht</h2>
        </div>
    </div>
</div>
<div class="container">
    <form id="contactForm" action="<?php bloginfo('template_directory'); ?>/contacthandler.php">
        <div class="form-group row">
            <div class="col-xs-12">

                <input name="name" class="form-control" type="text">
                <label for="example-text-input" class="col-xs-12 col-sm-6 col-form-label">Naam</label>

            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-12">
                <input name="email" class="form-control" type="text">
                <label for="example-text-input" class="col-xs-12 col-form-label">E-mail</label>

            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-12">
                <input name="phonenumber" class="form-control" type="text">
                <label for="example-text-input" class="col-xs-12 col-form-label">Telefoonnummer (optioneel)</label>

            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-12">
                <textarea name="message" class="form-control" type="text"></textarea>
                <label for="example-text-input" class="col-xs-12 col-form-label">Bericht</label>
            </div>
        </div>
        <div class="button-container">
            <button type="submit" class="btn">Verstuur</button>
        </div>
    </form>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Of bel ons</h2>
            <div class="phone-number">
                <img src="<?php bloginfo('template_directory'); ?>/images/phone.png" alt="telefoon"><a href="tel:‭+31548655786‬">‭(0548) 65 57 86‬</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
