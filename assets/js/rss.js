require ('../js/slick/slick.min');

$(document).ready(function () {
    $('.rss').slick({
        infinite: true,
        slidesToShow: 7,
        slidesToScroll: 7,
        nextArrow: '<div class="rss__arrow-div"><button class="rss__arrow rss__arrow-next"></button></div>',
        prevArrow: '<div class="rss__arrow-div"><button class="rss__arrow rss__arrow-previous"></button></div>'
    });
});