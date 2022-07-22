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
