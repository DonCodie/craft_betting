const $dataLabels = jQuery.parseJSON($('#dataLabelsCurve').val());
// Curve
const dataX = [0];
const dataY = [100];
let totalMoneybox = 100;

// let i = 0;
$.each($dataLabels, function (key, value) {
    // Odd Axe
    dataX.push(value.odd);
    // Moneybox Axe
    if (value.result.result === 'gagné') {
        totalMoneybox += value.odd * 10;
        dataY.push(totalMoneybox);
    } else {
        totalMoneybox -= 10;
        dataY.push(totalMoneybox);
    }
});

// Doughnut
var curve = document.getElementById('chart__curve').getContext('2d');
let totalWin = 0;
let totalLoose = 0;
var chartCurve = new Chart(curve, {
    type: 'line',
    data: {
        labels: dataX,
        datasets: [{
            label: 'Évolution de la cagnotte pour des mises de 10€ par pari',
            data: dataY,
            backgroundColor: ['rgba(90, 205, 130, 0.6)'],
            borderColor: ['rgba(90, 205, 130, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

$.each($dataLabels, function (key, value) {
    // totalWin & totalLoose Axe
    if (value.result.result === 'gagné') {
        totalWin += 1;
    } else {
        totalLoose += 1;
    }
});
let totalOdds = [totalWin, totalLoose];

var doughnut = document.getElementById('chart__doughnut').getContext('2d');
var chartDoughnut = new Chart(doughnut, {
    type: 'doughnut',
    data: {
        labels: [totalWin + ' gagnés', totalLoose + ' perdus'],
        datasets: [{
            label: 'Pourcentage de paris réussis',
            data: totalOdds,
            backgroundColor: ['rgba(90, 205, 130, 0.6)', 'rgba(255, 1, 1, 0.6)'],
            borderColor: ['rgba(90, 205, 130, 1)', 'rgba(255, 1, 1, 1)'],
            borderWidth: 1
        }]
    }
});

/* On click :
   1 - class active
   2 - change chart displaying
*/
$('.chart__title').click(function () {
    // @1
    $(this).parent().find('.chart__title-active').removeClass('chart__title-active');
    $(this).addClass('chart__title-active');
    // @2
    if ($(this).text() === 'cagnotte') {
        $('.chart__curve').css('display', 'block');
        $('.chart__doughnut').css('display', 'none');
        // $('.chart__bar').css('display', 'block');
    } else if ($(this).text() === '% paris réussis') {
        $('.chart__doughnut').css('display', 'block');
        $('.chart__curve').css('display', 'none');
        // $('.chart__bar').css('display', 'block');
    } else {
        // $('.chart__bar').css('display', 'block');
        // $('.chart__curve').css('display', 'none');
        // $('.chart__doughnut').css('display', 'none');
    }
});

