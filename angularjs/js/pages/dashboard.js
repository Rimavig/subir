angular.module('newApp').factory('dashboardService', function() {

    var dashboard = {};
    dashboard.init = function() {

        /**** FINANCIAL CHARTS: HIGHSTOCK ****/
        
        var data1 = [];
        var data2 = [];
        var data3 = [];
        var data4 = [];
        var data5 = [];
        var data6 = [];

        $.ajax({
            type: 'POST',
            url: "./dashboard/salas.php",
            dataType: 'json',
            async: false, //This is deprecated in the latest version of jquery must use now callbacks
            success: function(d){
                data1=d["data1"]; //will alert ok
                data2=d["data2"]; //will alert ok
                data3=d["data3"]; //will alert ok
                data4=d["data4"]; //will alert ok
                data5=d["data5"]; //will alert ok
                data6=d["data6"]; //will alert ok
            }
          });

        var dataG = [];
        $.ajax({
            type: 'POST',
            url: "./dashboard/salasG.php",
            dataType: 'json',
            async: false, //This is deprecated in the latest version of jquery must use now callbacks
            success: function(d){
                dataG=d; //will alert ok
            }
        });
        var data2T = [];
        var data3T = [];
        var data4T = [];
        var data5T = [];
        var data6T = [];
        var dataTG = [];
        var data1T = [];
        $.ajax({
            type: 'POST',
            url: "./dashboard/tickets.php",
            dataType: 'json',
            async: false, //This is deprecated in the latest version of jquery must use now callbacks
            success: function(d){
                data1T=d["data1"]; //will alert ok
                data2T=d["data2"]; //will alert ok
                data3T=d["data3"]; //will alert ok
                data4T=d["data4"]; //will alert ok
                data5T=d["data5"]; //will alert ok
                data6T=d["data6"]; //will alert ok
            }
          });
        $.ajax({
            type: 'POST',
            url: "./dashboard/ticketsG.php",
            dataType: 'json',
            async: false, //This is deprecated in the latest version of jquery must use now callbacks
            success: function(d){
                dataTG=d; //will alert ok
            }
        });
        function stockCharts(tabName) {
            console.log(tabName);
            if(tabName==="Tercera"){
                tabName2="terceraS";
                tipo=1;
            }
            if(tabName==="Lobby"){
                tabName2="lobby";
                tipo=2;
            }
            if(tabName==="Exteriores"){
                tabName2="exteriores";
                tipo=3;
            }
            if(tabName==="Principal"){
                tabName2="salaP";
                tipo=0;
            }
            if(tabName==="Digital"){
                tabName2="digital";
                tipo=4;
            }
            if(tabName==="Zaruma"){
                tabName2="zaruma";
                tipo=5;
            }
            if(tabName==="bar-chart"){
                tabName2="bar-chart";
                tipo=5;
            }
            var itemsT = Array(data1T, data2T, data3T, data4T, data5T, data6T);
            var randomDataT = itemsT[tipo];
            var items = Array(data1, data2, data3, data4, data5, data6);
            var randomData = items[tipo];
            var custom_colors = ['#C9625F', '#18A689', '#90ed7d', '#f7a35c', '#8085e9', '#f15c80', '#8085e8', '#91e8e1'];
            var custom_color = custom_colors[tipo];
            
            // Create the chart
            const chart3=Highcharts.StockChart('stock-' + tabName2, {
            //Highcharts.stockChart('stock-' + tabName2, {
           // $('#stock-' + tabName2).highcharts('StockChart', {
                chart: {
                    type: 'column',
                    height: 286,
                    borderColor: '#DE0E13'
                },
                
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: true
                },
                rangeSelector: {
                    inputEnabled: true,
                    allButtonsEnabled: true,
                    buttons: [{
                        type: 'month',
                        count: 3,
                        text: 'Day',
                        dataGrouping: {
                            forced: true,
                            units: [['day', [1]]]
                        }
                    }, {
                        type: 'year',
                        count: 1,
                        text: 'Week',
                        dataGrouping: {
                            forced: true,
                            units: [['week', [1]]]
                        }
                    }, {
                        type: 'all',
                        text: 'Month',
                        dataGrouping: {
                            forced: true,
                            units: [['month', [1]]]
                        }
                    }],
                    buttonTheme: {
                        width: 60
                    },
                    selected: 2
                },
                colors: [custom_color],
                scrollbar: {
                    enabled: true
                },
                time: {
                    useUTC: false
                },
                navigator: {
                    height: 20,
                    enabled: true
                },
                xAxis:  [{
                    type: 'datetime',
                    lineColor: '#EFEFEF',
                    tickColor: '#EFEFEF',
                }],
                yAxis: [{
                    opposite: false,
                    labels: {
                        align: 'right'
                    },
                    tickInterval: 1,
                    resize: {
                        enabled: true
                    },
                    height: '50%'
                },{
                    opposite: false,
                    labels: {
                        align: 'right'
                    },
                    startOnTick: false,
                    endOnTick: false,  
                    tickInterval: 10,
                    top: '50%',
                    height: '50%',
                    offset: 0,
                    lineWidth: 2
                    
                }],
                
                series: [{
                    name: "Dolares Vendido:",
                    data: randomData,
                    type: 'column',
                    tooltip: {
                        valueDecimals: 2
                    },
                    },{
                        name: "Tickets Vendidos:",
                        data: randomDataT,
                        type: 'column',
                        tooltip: {
                            valueDecimals: 2
                        },
                        yAxis: 1
                        }
                ]
            });
        }
        setTimeout(function() {
           stockCharts("Principal");
            $('.stock1 .nav-tabs a').click(function() {
                stockCharts($('.title', this).text());
            });
        }, 2);
        Highcharts.StockChart('bar-chart', {
            //Highcharts.stockChart('stock-' + tabName2, {
           // $('#stock-' + tabName2).highcharts('StockChart', {
                chart: {
                    type: 'column',
                    height: 286,
                    borderColor: '#DE0E13'
                },
                title: {
                    text: 'VENTAS GLOBAL',
                    style: {
                        fontSize: '15px',
                        fontfamily: 'Metropolis',
                        fontWeight: 'bold'
                    }
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: true
                },
                rangeSelector: {
                    inputEnabled: true,
                    allButtonsEnabled: true,
                    buttons: [{
                        type: 'month',
                        count: 3,
                        text: 'Day',
                        dataGrouping: {
                            forced: true,
                            units: [['day', [1]]]
                        }
                    }, {
                        type: 'year',
                        count: 1,
                        text: 'Week',
                        dataGrouping: {
                            forced: true,
                            units: [['week', [1]]]
                        }
                    }, {
                        type: 'all',
                        text: 'Month',
                        dataGrouping: {
                            forced: true,
                            units: [['month', [1]]]
                        }
                    }],
                    buttonTheme: {
                        width: 60
                    },
                    selected: 2
                },
                scrollbar: {
                    enabled: true
                },
                time: {
                    useUTC: false
                },
                navigator: {
                    height: 20,
                    enabled: true
                },
                xAxis:  [{
                    type: 'datetime',
                    lineColor: '#EFEFEF',
                    tickColor: '#EFEFEF',
                }],
                yAxis: [{
                    opposite: false,
                    labels: {
                        align: 'right'
                    },
                    tickInterval: 1,
                    resize: {
                        enabled: true
                    },
                    height: '50%'
                },{
                    opposite: false,
                    labels: {
                        align: 'right'
                    },
                    startOnTick: false,
                    endOnTick: false,  
                    tickInterval: 10,
                    top: '50%',
                    height: '50%',
                    offset: 0,
                    lineWidth: 2
                    
                }],
                
                series: [{
                    name: "Dolares Vendido:",
                    data: dataG,
                    type: 'column',
                    tooltip: {
                        valueDecimals: 2
                    },
                    },{
                    name: "Tickets Vendidos:",
                    data: dataTG,
                    type: 'column',
                    tooltip: {
                        valueDecimals: 2
                    },
                    yAxis: 1
                    }
                ]
        });
        setTimeout(function() {
            window.dispatchEvent(new Event('resize'));
        }, 1000);
        /* Progress Bar  Widget */
        if ($('.widget-progress-bar').length) {
            setTimeout(function() {
                $('.widget-progress-bar .stat1').progressbar();
            }, 900);
            setTimeout(function() {
                $('.widget-progress-bar .stat2').progressbar();
            }, 1200);
            setTimeout(function() {
                $('.widget-progress-bar .stat3').progressbar();
            }, 1500);
            setTimeout(function() {
                $('.widget-progress-bar .stat4').progressbar();
            }, 1800);
        };
    };



    dashboard.setHeights = function() {
        var widgetMapHeight = $('.widget-map').height();
        var pstatHeadHeight = $('.panel-stat-chart').parent().find('.panel-header').height() + 12;
        var pstatBodyHeight = $('.panel-stat-chart').parent().find('.panel-body').height() + 15;
        var pstatheight = widgetMapHeight - pstatHeadHeight - pstatBodyHeight + 30;
        $('.panel-stat-chart').css('height', pstatheight);
        var clockHeight = $('.jquery-clock ').height();
        var widgetProgressHeight = $('.widget-progress-bar').height();
        $('.widget-progress-bar').css('margin-top', widgetMapHeight - clockHeight - widgetProgressHeight - 3);
    }

    return dashboard;

});