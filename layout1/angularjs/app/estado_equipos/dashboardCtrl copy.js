'use strict';

/**
 * @ngdoc function
 * @name newappApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the newappApp
 */
angular.module('newApp')
  .controller('dashboardCtrl', ['$scope','chartFinanceService', 'dashboardService', 'pluginsService', function ($scope, chartFinanceService, dashboardService, pluginsService) {
    var oTable,oTable1;
        $scope.$on('$viewContentLoaded', function () {
            oTable =$("#table-editable1").DataTable({ "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }, 
                "select":true,
                "bDestroy": true
                });
            $('#cont2').load('./dashboard/estaciones.php', function() {    
                $('#esconder').removeClass('esconder');
            });
            $('#esconder1').load('./dashboard/equipos.php', function() {    
                $('#esconder1').removeClass('esconder');
            });
            $('#table-editable1 tbody').on( 'click', 'tr', function () {
                var value=$(this).find('td:eq(0)').text();
                $('.page-spinner-loader').removeClass('hide');
                $('#cont2').load('./dashboard/estaciones.php', {var1:value},function() {    
                    $('.page-spinner-loader').addClass('hide');
                    $('#esconder').removeClass('esconder');
                });
                $('#esconder1').load('./dashboard/equipos.php', {var1:value},function() {    
                    $('.page-spinner-loader').addClass('hide');
                    $('#esconder1').removeClass('esconder');
                });
            } );

            $('#estaciones tbody').on( 'click', 'tr', function () {
                var value=$(this).find('td:eq(0)').text();
                console.log(value);
                $('.page-spinner-loader').removeClass('hide');
                $('#cont3').load('./dashboard/equipos_total.php', {var1:value},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
                
            } );
            $('#tanques tbody').on( 'click', 'tr', function () {
                var value=$(this).find('td:eq(0)').text();
                console.log(value);
                $('#esconder').removeClass('esconder');
                $('.page-spinner-loader').removeClass('hide');
                $('#cont4').load('./dashboard/tanques.php', {var1:value},function() {    
                    $('.page-spinner-loader').addClass('hide');
                  
                });
                
            } );
            /**** USA Map ****/
            var map = AmCharts.makeChart("usa-map", {
                type: "map",
                theme: "dark",
                colorSteps: 10,
            
                dataProvider: {
                    "map": "ecuadorLow",
                    "areas": [{
                        "id": "EC-A",
                        "value": 5130632
                    }, {
                        "id": "EC-B",
                        "value": 626932
                    }, {
                        "id": "EC-C",
                        "value": 5130632
                    }, {
                        "id": "EC-D",
                        "value": 2673400
                    }, {
                        "id": "EC-F",
                        "value":  2673400
                }, {
                    "id": "EC-E",
                    "value": 2844658
                }, {
                    "id": "EC-G",
                    "value": 4301261
                    }, {
                        "id": "EC-H",
                        "value": 3405565
                    }, {
                        "id": "EC-I",
                        "value": 783600
                    }, {
                        "id": "EC-J",
                        "value": 15982378
                    }, {
                        "id": "EC-K",
                        "value": 8186453
                    }, {
                        "id": "EC-L",
                        "value": 1211537
                    }, {
                        "id": "EC-M",
                        "value": 1293953
                    }, {
                    "id": "EC-N",
                    "value": 1293953
                    }, {
                        "id": "EC-O",
                        "value": 6080485
                    }, {
                        "id": "EC-P",
                        "value": 6080485
                    }, {
                        "id": "EC-Q",
                        "value": 2926324
                    }, {
                        "id": "EC-R",
                        "value": 2688418
                    }, {
                        "id": "EC-S",
                        "value": 4041769
                    }, {
                        "id": "EC-T",
                        "value": 4468976
                    }, {
                        "id": "EC-U",
                        "value": 1274923
                    }, {
                        "id": "EC-V",
                        "value": 5296486
                    }, {
                        "id": "EC-X",
                        "value":  5296486
                    }, {
                        "id": "EC-Y",
                        "value": 4919479
                    }, {
                        "id": "EC-Z",
                        "value": 2844658
                    
                }, {
                    "id": "EC-SE",
                    "value": 2844658
                
                }, {
                    "id": "EC-SD",
                    "value": 2844658
                    
                
                }
                ]
                },
                
                areasSettings: {
                    "autoZoom": false,
                    "selectable": true
                },
                zoomControl: {
                    "homeButtonEnabled": true,
                    "top": 30,
                    "minZoomLevel": 0.5,
                },
                listeners: [{
                    "event": "clickMapObject",
                    "method": function(ev) {
                        console.log("something happened ", ev.mapObject.title)
                        //location.href = "#principal";
                        $('.page-spinner-loader').removeClass('hide');
                        $('#cont1').load('./dashboard/principal.php', {var1:ev.mapObject.title},function() {    
                            $('.page-spinner-loader').addClass('hide');
                            $('#esconder').addClass('esconder');
                            $('#esconder1').addClass('esconder');
                        });
                        
                    }
                }]

            });
            $(document).on('click', '.bomba1', function (e) {
                e.preventDefault();
                $(this).prop("disabled",true); 
                $('.page-spinner-loader').removeClass('hide');
                $('#bomba').load('./dashboard/bomba.php',function() {    
                    $('.page-spinner-loader').addClass('hide');
                    $('#bomba').modal('show'); // abrir
                });
                $(this).prop("disabled",false);
            });
            $(document).on('click', '.compresor1', function (e) {
                e.preventDefault();
                $(this).prop("disabled",true); 
                $('.page-spinner-loader').removeClass('hide');
                $('#compresor').load('./dashboard/compresor.php',function() {    
                    $('.page-spinner-loader').addClass('hide');
                    $('#compresor').modal('show'); // abrir
                });
                $(this).prop("disabled",false);
            });
            $(document).on('click', '.generador1', function (e) {
                e.preventDefault();
                $(this).prop("disabled",true); 
                $('.page-spinner-loader').removeClass('hide');
                $('#generador').load('./dashboard/generador.php',function() {    
                    $('.page-spinner-loader').addClass('hide');
                    $('#generador').modal('show'); // abrir
                });
                $(this).prop("disabled",false);
            });
            $(document).on('click', '.rci1', function (e) {
                e.preventDefault();
                $(this).prop("disabled",true); 
                $('.page-spinner-loader').removeClass('hide');
                $('#rci').load('./dashboard/rci.php',function() {    
                    $('.page-spinner-loader').addClass('hide');
                    $('#rci').modal('show'); // abrir
                });
                $(this).prop("disabled",false);
            });
            $(document).on('click', '.cambiar', function (e) {
               e.preventDefault();
               var estado=$(this).attr("id");
               var estado1=$(this).parents().find("#valmax"+estado).val();
               var estado2=$(this).parents().find("#valmin"+estado).val();
               var id=$(this).parents().find("#valid"+estado).val();
               var combustible=$(this).parents().find("#valtipo"+estado).val();
               console.log(id);
               $('#cont4').load('./dashboard/tanques.php', {var2:estado1,var3:estado2,id:id,comb:combustible},function() {    
                $('.page-spinner-loader').addClass('hide');
                });
            });

            if ($('.widget-weather').length) {
                widgetWeather();
            }
            handleTodoList();
           
            var request_ = new XMLHttpRequest();    
            var token_="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImNvcnBOYW1lIjoiUFJJTUFYIn19.dbiT-5Ilr5c4ApLRf7ZOA3IZT_oHqMYtMeWhe1W5-eE"    
            request_.open("GET", "http://localhost:8080/apiRest/corp/v1/getTanquesEco");
            request_.setRequestHeader("Accept", "application/json");
            request_.setRequestHeader("Authorization", "Bearer "+ token_);
            setTimeout(function() {
                request_.send();;
            }, 1000);
            var f=new Date();
            

            request_.onreadystatechange = function () {
                if (request_.readyState === 4) {
                    
                   // console.log(request_.status);
                   // console.log(request_.responseText);
                    var datax = JSON.parse(request_.responseText);
                    var tam=Object.keys( datax).length ;
                    const chart=Highcharts.StockChart('eco1', {
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
                            type: 'datetime'
                        },
                        yAxis: {
                            
                            title: {
                                text: "CAPACIDAD"
                                }
                        },
                        credits: {
                            enabled: false
                            },
                        noData: {
                        style: {
                            fontSize: "16px"
                        }
                            },
                        navigator: {
                            outlineColor: '#E4E4E4',
                        },
                      
                        });
                    const chart1=Highcharts.StockChart('eco2', {
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
                        xAxis: {
                            type: 'datetime'
                        },
                        yAxis: {
                            
                            title: {
                                text: "CAPACIDAD"
                                }
                        },
                        credits: {
                            enabled: false
                            },
                        noData: {
                        style: {
                            fontSize: "16px"
                        }
                            },
                        navigator: {
                            outlineColor: '#E4E4E4',
                        },
                        
                        });
                    for(var i=0; i < tam; i++){
                        var data = [];
                        var tam1=datax[Object.keys( datax)[i]].length ;
                        console.log(tam1);
                        for(var y=0; y < tam1; y++){
                            var data1 = [];
                            var mydate = new Date(datax[Object.keys( datax)[i]][y].fecha).getTime();
                            data1.push(mydate-18000000 );
                            data1.push(parseInt(datax[Object.keys( datax)[i]][y].capacidad));
                            data.push(data1);
                        }
                       // console.log(data);
                        if(i==1){
                            chart1.addSeries({
                                data: data,
                                type: 'column',
                                name: Object.keys( datax)[i]
                            });
                           
                        }else{
                            chart.addSeries({
                                data: data,
                                type: 'column',
                                name: Object.keys( datax)[i]
                            });
                        }
                        
                        
                    }
                    
                }};
            var request1_ = new XMLHttpRequest();    
            request1_.open("GET", "http://localhost:8080/apiRest/corp/v1/getTanquesSuper");
            request1_.setRequestHeader("Accept", "application/json");
            request1_.setRequestHeader("Authorization", "Bearer "+ token_);
            setTimeout(function() {
                request1_.send();;
            }, 1000);
            request1_.onreadystatechange = function () {
                if (request1_.readyState === 4) {
                    var datax = JSON.parse(request1_.responseText);
                    var tam=Object.keys( datax).length ;
                    const chart2=Highcharts.StockChart('super', {
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
                            colors: ['rgba(255, 0, 0, 0.91)'],

                            xAxis: {
                                type: 'datetime'
                            },
                            yAxis: {
                                
                                title: {
                                    text: "CAPACIDAD"
                                    }
                            },
                            credits: {
                                enabled: false
                                },
                            noData: {
                            style: {
                                fontSize: "16px"
                            }
                                },
                            navigator: {
                                outlineColor: '#E4E4E4',
                            },
                            
                            });
                    for(var i=0; i < tam; i++){
                        var data = [];
                        var tam1=datax[Object.keys( datax)[i]].length ;
                       // console.log(tam1);
                        for(var y=0; y < tam1; y++){
                            var data1 = [];
                            var mydate = new Date(datax[Object.keys( datax)[i]][y].fecha).getTime();
                            data1.push(mydate-18000000 );
                            data1.push(parseInt(datax[Object.keys( datax)[i]][y].capacidad));
                            data.push(data1);
                        }
                       // console.log(data);
                        chart2.addSeries({
                            data: data,
                            type: 'column',
                            name: Object.keys( datax)[i]
                        });
                    }
                    
                }};
            var request2_ = new XMLHttpRequest();    
            request2_.open("GET", "http://localhost:8080/apiRest/corp/v1/getTanquesDiesel");
            request2_.setRequestHeader("Accept", "application/json");
            request2_.setRequestHeader("Authorization", "Bearer "+ token_);
            setTimeout(function() {
                request2_.send();;
            }, 1000);
            request2_.onreadystatechange = function () {
                if (request2_.readyState === 4) {
                    var datax = JSON.parse(request2_.responseText);
                    var tam=Object.keys( datax).length ;
                    const chart3=Highcharts.StockChart('diesel', {
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
                        colors: ['rgba(80, 220, 109, 0.91)'],

                        xAxis: {
                            type: 'datetime'
                        },
                        yAxis: {
                            
                            title: {
                                text: "CAPACIDAD"
                                }
                        },
                        credits: {
                            enabled: false
                            },
                        noData: {
                        style: {
                            fontSize: "16px"
                        }
                            },
                        navigator: {
                            outlineColor: '#E4E4E4',
                        },
                        
                        });   
                    for(var i=0; i < tam; i++){
                        var data = [];
                        var tam1=datax[Object.keys( datax)[i]].length ;
                        //console.log(tam1);
                        for(var y=0; y < tam1; y++){
                            var data1 = [];
                            var mydate = new Date(datax[Object.keys( datax)[i]][y].fecha).getTime();
                            data1.push(mydate-18000000 );
                            data1.push(parseInt(datax[Object.keys( datax)[i]][y].capacidad));
                            data.push(data1);
                        }
                       // console.log(data);
                        chart3.addSeries({
                            data: data,
                            type: 'column',
                            name: Object.keys( datax)[i]
                        });
                    }
                }};    
        });

      
      $scope.$on('$destroy', function () {
        $ ('table').each(function () {
             if ($.fn.dataTable.isDataTable($(this))) {
               $(this).dataTable({
                   "bDestroy": true
               }).fnDestroy();
               $(this).DataTable().destroy;
             }
         });
     });
  }]);
