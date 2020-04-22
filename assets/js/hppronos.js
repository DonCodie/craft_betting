/*
 FILTRES DES PAGES PRONOS
 */


/* Effets sur le hover et click sur le triangle
    1 - title on mouseover
    2 - ouverture/fermeture div text analyse
*/

let $triangle = $('.hppronos__prono__content-triangle');

// @1
$triangle.mouseover(function () {
    $(this).attr('title', 'Cliquer pour lire l\'analyse');
});

$triangle.click(function () {
    // @2
    $('.hppronos__prono__content-analysis').toggle();
    $('.hppronos__prono__content-loto').toggle();
    $('.hppronos__prono__content-bet').toggle();
});