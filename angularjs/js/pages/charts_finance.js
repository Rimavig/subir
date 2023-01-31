angular.module('newApp').factory('chartFinanceService', function () {

    var init = function () {

        $.getJSON('https://demo-live-data.highcharts.com/aapl-v.json', function (data) {
        /**** Real Time Chart: HighStock ****/
        $('#realtime-chart').highcharts('StockChart', {
            chart: {
                height: 300,
                backgroundColor: 'transparent',
            },
            rangeSelector : {
                inputEnabled: false,
                selected : 1
            },
            credits: {
                enabled: false
            },
            
            scrollbar: {
                enabled: false
            },
            colors: ['rgba(49, 157, 181,0.5)'],
            xAxis: {
                lineColor: '#e1e1e1',
                tickColor: '#EFEFEF'
            },
            yAxis: {
                gridLineColor: '#e1e1e1',
            },
            navigator: {
                outlineColor: '#E4E4E4',
            },
            series: [{
                type: 'column',
                name: 'Real Time Data',
                data: data,
                id : 'dataseries',
                tooltip : {
                    valueDecimals: 4
                }
            }]
        });
        $('#realtime-chart1').highcharts('StockChart', {
            chart: {
                height: 300,
                backgroundColor: 'transparent',
            },
            rangeSelector : {
                inputEnabled: true
            },
            scrollbar: {
                enabled: true
            },
            colors: ['rgba(49, 157, 181,0.5)'],
            xAxis: {
                lineColor: '#e1e1e1',
                tickColor: '#EFEFEF'
            },
            yAxis: {
                gridLineColor: '#e1e1e1',
            },
            navigator: {
                outlineColor: '#E4E4E4',
            },
            series: [{
                type: 'column',
                name: 'Real Time Data1',
                data: data,
                id : 'dataseries1',
                tooltip : {
                    valueDecimals: 2
                },
                dataGrouping: {
                    units: [[
                        'week', // unit name
                        [1] // allowed multiples
                    ], [
                        'month',
                        [1, 2, 3, 4, 6]
                    ]]
                }
            }]
        });

    });
    };



    return {
        init:init
    }


});