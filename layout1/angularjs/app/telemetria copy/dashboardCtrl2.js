'use strict';

/**
 * @ngdoc function
 * @name newappApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the newappApp
 */
angular.module('newApp')
  .controller('dashboardCtrl1', ['$scope','chartFinanceService', 'dashboardService', 'pluginsService', function ($scope, chartFinanceService, dashboardService, pluginsService) {
    var oTable,oTable1;
        $scope.$on('$viewContentLoaded', function () {
            oTable =$("#table-editable1").DataTable({ "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }, 
                "select":true,
                "bDestroy": true
                });
            $('#estaciones tbody').on( 'click', 'tr', function () {
                var value=$(this).find('td:eq(0)').text();
                console.log(value);
                $('.page-spinner-loader').removeClass('hide');
                $('#cont3').load('./estado_equipos/equipos_total.php', {var1:value},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
                
            } );
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
