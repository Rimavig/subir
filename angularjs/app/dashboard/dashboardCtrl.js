'use strict';

/**
 * @ngdoc function
 * @name newappApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the newappApp
 */
 angular.module('newApp')
 .controller('dashboardCtrl', ['$scope','chartFinanceService', 'dashboardService', function ($scope, chartFinanceService, dashboardService) {

    $scope.$on('$viewContentLoaded', function () {
        $('.page-spinner-loader').removeClass('hide');
        chartFinanceService.init();
        dashboardService.init();
        $('.page-spinner-loader').addClass('hide');
        dashboardService.setHeights();
     });
     $scope.$on('$destroy', function () {
        var tables = $.fn.dataTable.fnTables(true);
        $(tables).each(function () {
            $(this).dataTable().fnDestroy();
        });
     });
 }]);

