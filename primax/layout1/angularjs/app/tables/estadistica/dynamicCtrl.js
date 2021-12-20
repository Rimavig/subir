'use strict';

angular.module('newApp')
  .controller('dynamicCtrl',function (chartFinanceService,$scope) {

    $scope.$on('$viewContentLoaded', function () {
      chartFinanceService.init();
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
      
  });
  
