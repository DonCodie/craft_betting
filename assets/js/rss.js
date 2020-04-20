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
                    slidesToShow: 2,
                    slidesToScroll: 2
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

    $('.rss__sport-subtitle-foot').click(function () {
        // Class active
        $(this).parent('.rss__sport-subtitles').find('.rss__sport-subtitle-active')
            .removeClass('rss__sport-subtitle-active')
        $(this).addClass('rss__sport-subtitle-active');
        //
        $('.rss__sport-foot').css('display', 'block');
        $('.rss__sport-basket').css('display', 'none');
        $('.rss__sport-tennis').css('display', 'none');
    });
    $('.rss__sport-subtitle-basket').click(function () {
        // Class active
        $(this).parent('.rss__sport-subtitles').find('.rss__sport-subtitle-active')
            .removeClass('rss__sport-subtitle-active')
        $(this).addClass('rss__sport-subtitle-active');
        //
        $('.rss__sport-basket').css('display', 'block');
        $('.rss__sport-foot').css('display', 'none');
        $('.rss__sport-tennis').css('display', 'none');
    });
    $('.rss__sport-subtitle-tennis').click(function () {
        // Class active
        $(this).parent('.rss__sport-subtitles').find('.rss__sport-subtitle-active')
            .removeClass('rss__sport-subtitle-active')
        $(this).addClass('rss__sport-subtitle-active');
        //
        $('.rss__sport-tennis').css('display', 'block');
        $('.rss__sport-foot').css('display', 'none');
        $('.rss__sport-basket').css('display', 'none');
    });

    $('.rss__sport-subtitle-foot').trigger('click', function () {
        // Class active
        $(this).parent('.rss__sport-subtitles').find('.rss__sport-subtitle-active')
            .removeClass('rss__sport-subtitle-active')
        $(this).addClass('rss__sport-subtitle-active');
        //
        $('.rss__sport-foot').show;
        $('.rss__sport-basket').hide;
        $('.rss__sport-tennis').hide;
    });
});
