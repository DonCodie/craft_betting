const $dataLabels = jQuery.parseJSON($('#dataLabels').val());
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

var ctx = document.getElementById('chart').getContext('2d');
var chart = new Chart(ctx, {
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