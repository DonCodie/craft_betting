/*
 FILTRES DES PAGES PRONOS
 */

$(document).ready(function () {
    $('html, body').animate({
        scrollTop: $('#container__sports-center-anchor').offset().top
    }, 1000);
});


/* Effets sur le hover et click sur le triangle
    1 - title on mouseover
    2 - ouverture/fermeture div text analyse
    3 - changement de couleur du triangle au clic
*/

let $triangle = $('.container__sports-center-prono-triangle');

// @1
$triangle.mouseover(function () {
    $(this).attr('title', 'Cliquer pour lire l\'analyse');
});

$triangle.click(function () {
    $borderLeft = $(this).css('border-left');
    // @2
    $(this).parents('.container__sports-center-prono')
        .find('.container__sports-center-prono-analysis, .container__sports-center-prono-loto, .container__sports-center-prono-bet')
        .toggle();
    // @3
    if ($borderLeft === '20px solid rgb(90, 205, 130)') {
        $(this).css('border-left', '20px solid rgb(255, 1, 1)');
    } else if ($borderLeft === '20px solid rgb(255, 1, 1)') {
        $(this).css('border-left', '20px solid rgb(90, 205, 130)');
    }
});
