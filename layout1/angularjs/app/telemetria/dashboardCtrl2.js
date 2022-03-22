'use strict';

/**
 * @ngdoc function
 * @name newappApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the newappApp
 */
angular.module('newApp')
  .controller('dashboardCtrl2', ['$scope','chartFinanceService', 'dashboardService', 'pluginsService', function ($scope, chartFinanceService, dashboardService, pluginsService) {
    var oTable,oTable1;
        $scope.$on('$viewContentLoaded', function () {
            oTable =$("#table-editable1").DataTable({ "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }, 
                "select":true,
                "bDestroy": true
                });
            $('#cont4').load('./telemetria/tanques.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#esconder').removeClass('esconder');
            });
            $('#tanques tbody').on( 'click', 'tr', function () {
                var value=$(this).find('td:eq(0)').text();
                console.log(value);
                $('#esconder').removeClass('esconder');
                $('.page-spinner-loader').removeClass('hide');
                $('#cont4').load('./telemetria/tanques.php', {var1:value},function() {    
                    $('.page-spinner-loader').addClass('hide');
                  
                });
                
            } );
            $(document).on('click', '.cambiar', function (e) {
               e.preventDefault();
               var estado=$(this).attr("id");
               var estado1=$(this).parents().find("#valmax"+estado).val();
               var estado2=$(this).parents().find("#valmin"+estado).val();
               var id=$(this).parents().find("#valid"+estado).val();
               var combustible=$(this).parents().find("#valtipo"+estado).val();
               console.log(id);
               $('#cont4').load('./telemetria/tanques.php', {var2:estado1,var3:estado2,id:id,comb:combustible},function() {    
                $('.page-spinner-loader').addClass('hide');
                });
            });

            if ($('.widget-weather').length) {
                widgetWeather();
            }
            handleTodoList();
           
            var request_ = new XMLHttpRequest();    
            var token_="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImNvcnBOYW1lIjoiUFJJTUFYIn19.dbiT-5Ilr5c4ApLRf7ZOA3IZT_oHqMYtMeWhe1W5-eE"    
            request_.open("GET", "http://104.154.225.61/apiRest/corp/v1/getTanquesEco");
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
                        title: {
                            text: 'TANQUE 1'
                        },
                    
                        colors: ['rgb(2, 253, 42)'],

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
                        title: {
                            text: 'TANQUE 2'
                        },
                        colors: ['rgb(2, 253, 42)'],
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
                                name: Object.keys( datax)[i]
                            });
                           
                        }else{
                            chart.addSeries({
                                data: data,
                                name: Object.keys( datax)[i]
                            });
                        }
                        
                        
                    }
                    
                }};
            var request1_ = new XMLHttpRequest();    
            request1_.open("GET", "http://104.154.225.61/apiRest/corp/v1/getTanquesSuper");
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
                            colors: ['rgb(230, 142, 5)'],
                            title: {
                                text: 'TANQUE 3'
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
                            name: Object.keys( datax)[i],
                        });
                    }
                    
                }};
            var request2_ = new XMLHttpRequest();    
            request2_.open("GET", "http://104.154.225.61/apiRest/corp/v1/getTanquesDiesel");
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
                        title: {
                            text: 'TANQUE 4'
                        },
                        colors: ['rgb(236, 255, 7)'],

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
