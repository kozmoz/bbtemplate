

$('#contactForm').validate({
    ignore: '.ignore',
    rules: {
        field1: {
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
        },
        hoax: {
            required: true
        }
    },
    messages: {

        field1: {
            required: 'Vul je voornaam in',
            minlength: 'Vul een voornaam in met minimaal 2 letters'
        },
        lastname: {
            required: 'Vul je achternaam',
            minlength: 'Vul een achternaam in met minimaal 2 letters'
        },
        email: {
            required: 'Vul je e-mailadres in',
            email: 'Vul een geldig e-mailadres in'
        },
        message: {
            required: 'Stuur een bericht',
            minlength: 'Vul een vraag in met minimaal 2 letters'
        },
        hoax: {
            required: 'Het is verplicht om deze vraag te bevestigen',
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
                $(form).html('<div class="succes-message"><h2>Gelukt!</h2><p>Bedankt voor uw bericht, we hebben deze in goede orde ontvangen. Wij zullen zo spoedig mogelijk contact met u opnemen.</p></div>');
            } else {
                alert('Unfortunately, something went wrong because of a technical error.');
            }
        });
    }
});