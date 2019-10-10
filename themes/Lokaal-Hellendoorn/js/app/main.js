$(document).ready(function () {
   doStuff(); 
});

function doStuff() {

    $('.fractie-info').click(function () {


        var fractieLidContainer = $(this).closest('.fractie-lid-container');

        $('.fractie-lid-container').not(fractieLidContainer).removeClass('open');

        fractieLidContainer.toggleClass('open');

        buttonText();

    });

    function buttonText() {

        var containerNotOpen = $('.fractie-lid-container').not('.fractie-lid-container.open');
        var button = containerNotOpen.find('.btn');
        button.text('lees verder');

        var containerOpen = $('.fractie-lid-container.open');
        containerOpen.find('.btn').text('verberg');
    }


    $("#subscribe").prop('disabled', true);
    $(".btn.search-go").prop('disabled', true);


    $('.menu-toggle').click(function(){
        $('header').toggleClass('open');
        $('.bar').toggleClass('open');
        $('.menu-toggle').toggleClass('open');
        $('body').toggleClass('no-scroll');
    });

    $('.owl-carousel').owlCarousel({
    	animateOut: 'fadeOut',
    	animateIn:'fadeIn',
    	items:5,
	    loop:true,
	    autoplay:true,
	    autoplayTimeout:3000,
	    margin: 0,
        autoplayHoverPause:true,
        nav: true,
        navText : ["<div class='left'></div>","<div class='right'></div>"],
        dots: false,
        responsive:{
        0:{
            items:1,
            dots: true,
            nav: true
        },
        600:{
            items:3,
        },
        1000:{
            items:5,
        }
    }   
	});

    $('.main-nav a').hover(function () {
        $('header').toggleClass('hover');
    });
}

/**
 * "Load More" button on the news page.
 */
$('.ajax_load_more_news:not(.loading)').click(function () {

    var that = $(this);
    var page = that.data('page');
    var newPage = page+1;
    var ajaxurl = that.data('url');

    that.addClass('loading');

    $.ajax({

        url : ajaxurl,
        type : 'post',
        data : {
            page : page,
            action : 'ajax_load_more_news',
        },
        error: function ( response ) {
            console.log(response);
        },
        success : function ( response ) {

            setTimeout(function () {

                if ( response.length != 0 ) {
                    that.data('page', newPage);
                    $('.post-list').append(response);
                    that.removeClass('loading');

                } else {

                    that.removeClass('loading');
                    that.html("alle nieuws berichten zijn geladen");
                    that.addClass('done');
                }

            },1000);
        }
    });
});
