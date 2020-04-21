require('../js/slick/slick.min');

$(document).ready(function () {
    $('.rss__sport-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        nextArrow: '<div class="rss__arrow-div"><button class="rss__arrow rss__arrow-next"></button></div>',
        prevArrow: '<div class="rss__arrow-div"><button class="rss__arrow rss__arrow-previous"></button></div>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    // Class active sur les sports et remplacement du slider
    $('.rss__sport-subtitle-foot').click(function () {
        // Class active
        $(this).parent('.rss__sport-subtitles').find('.rss__sport-subtitle-active')
            .removeClass('rss__sport-subtitle-active')
        $(this).addClass('rss__sport-subtitle-active');
        // Replace Slider
        $('.rss__sport-slider-foot').css('visibility', 'visible');
        $('.rss__sport-slider-basket').css('visibility', 'hidden');
        $('.rss__sport-slider-tennis').css('visibility', 'hidden');
    });
    $('.rss__sport-subtitle-basket').click(function () {
        // Class active
        $(this).parent('.rss__sport-subtitles').find('.rss__sport-subtitle-active')
            .removeClass('rss__sport-subtitle-active')
        $(this).addClass('rss__sport-subtitle-active');
        // Replace Slider
        $('.rss__sport-slider-basket').css('visibility', 'visible');
        $('.rss__sport-slider-foot').css('visibility', 'hidden');
        $('.rss__sport-slider-tennis').css('visibility', 'hidden');
    });
    $('.rss__sport-subtitle-tennis').click(function () {
        // Class active
        $(this).parent('.rss__sport-subtitles').find('.rss__sport-subtitle-active')
            .removeClass('rss__sport-subtitle-active')
        $(this).addClass('rss__sport-subtitle-active');
        // Replace Slider
        $('.rss__sport-slider-tennis').css('visibility', 'visible');
        $('.rss__sport-slider-foot').css('visibility', 'hidden');
        $('.rss__sport-slider-basket').css('visibility', 'hidden');
    });
});

