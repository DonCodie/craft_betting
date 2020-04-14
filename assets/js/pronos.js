/*
 FILTRES DES PAGES PRONOS

 Boutons filtres :
   - 1 : On supprime la classe active existante
   - 2 : On ajoute la classe active sur le filtre cliqué

 Affichage des pronos en fonction des filtres :
   - 3 : on cherche le contenu de la classe active des filtres
   - 4 : on ajoute/supprime à la div de l'affichage la classe active en fonction du contenu de @3
 */

let $filter = $('.container__sports-center-filter');
let $filterActiveClass = 'container__sports-center-filter-active';
let $pronos = $('.container__sports-center-pronos');
let pronoAll = '.container__sports-center-prono-all';
let pronoAToday = '.container__sports-center-prono-today';
let pronoTomorrow = '.container__sports-center-prono-tomorrow';

$filter.on('click', function () {
    // @1
    $(this).parent()
        .find($('.container__sports-center-filter-active'))
        .removeClass($filterActiveClass);
    // @2
    $(this).addClass($filterActiveClass);
    // @3
    let $text = $(this).parent().find($('.container__sports-center-filter-active')).text();
    // @4
    if ($text === 'tous') {
        $pronos.find(pronoAll).css('display', 'block');
        $pronos.find(pronoAToday).css('display', 'none');
        $pronos.find(pronoTomorrow).css('display', 'none');
    } else if ($text === 'aujourd\'hui') {
        $pronos.find(pronoAToday).css('display', 'block');
        $pronos.find(pronoAll).css('display', 'none');
        $pronos.find(pronoTomorrow).css('display', 'none');
    } else if ($text === 'demain') {
        $pronos.find(pronoTomorrow).css('display', 'block');
        $pronos.find(pronoAll).css('display', 'none');
        $pronos.find(pronoAToday).css('display', 'none');
    }

});