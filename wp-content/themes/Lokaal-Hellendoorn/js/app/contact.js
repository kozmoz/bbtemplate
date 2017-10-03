

$('#contactForm').validate({
    ignore: '.ignore',
    rules: {
        name: {
            required: true,
            minlength: 2
        },
        lastname: {
            required: true,
            minlength: 2
        },
        email: {
            required: true,
            email: true
        },
        message: {
            required: true,
            minlength: 2
        }
    },
    messages: {

        name: {
            required: 'Vul je voornaam in',
            minlength: 'Vul een voornaam in met minimaal 2 karakters'
        },
        lastname: {
            required: 'Vul je achternaam',
            minlength: 'Vul een achternaam in met minimaal 2 karakters'
        },
        email: {
            required: 'Vul je e-mailadres in',
            email: 'Vul een geldig e-mailadres in',
        },
        message: {
            required: 'Stuur een bericht',
            minlength: 'Vul een vraag in met minimaal 2 karakters'
        }

    },
    submitHandler: function(form) {
        $.ajax( {
            url: $(form).attr('action'),
            type: 'POST',
            data: new FormData(form),
            processData: false,
            contentType: false,
            beforeSend: function() {
                $(form).find('input, button').attr('disabled', true);
            }
        }).done(function(result) {
            if(result.result == 'ok') {
                $(form).html('<div class="succes-message"><h2>Gelukt!</h2><p>Bedankt voor je bericht, we hebben deze in goede orde ontvangen. We zullen zo spoedig mogelijk contact met je opnemen.</p></div>');
            } else {
                alert('Unfortunately, something went wrong because of a technical error.');
            }
        });
    }
});