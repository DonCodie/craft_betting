require ('../js/slick/slick.min');

$(document).ready(function () {
    $('.rss__sport-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        nextArrow: '<div class="rss__arrow-div"><button class="rss__arrow rss__arrow-next"></button></div>',
        prevArrow: '<div class="rss__arrow-div"><button class="rss__arrow rss__arrow-previous"></button></div>'
    });
});