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
      $scope.$on('$viewContentLoaded', function () {
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
                    $('#cont1').load('./dashboard/principal.php', {var1:ev.mapObject.title});
                    
                }
              }]

        });
        console.log("dasd");
          chartFinanceService.init();
          dashboardService.init();
          pluginsService.init();
          dashboardService.setHeights()
          if ($('.widget-weather').length) {
              widgetWeather();
          }
          handleTodoList();

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
