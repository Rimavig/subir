'use strict';

angular.module('newApp')
  .controller('slidersCtrl', ['$scope', 'pluginsService', function ($scope, pluginsService) {
      $('.progress .progress-bar').progressbar();
      $scope.$on('$viewContentLoaded', function () {
        $('#tciudadela tbody').on( 'click', 'tr', function () {
          $(this).addClass('selected').siblings().removeClass('selected');
				  var value=$(this).find('td:eq(0)').text();
          $('.page-spinner-loader').removeClass('hide');
          $('.cont1').load('./forms/sliders/tanques.php', {var1:value});
         // $('.cont2').load('./forms/sliders/alarmas.php', {var1:value});
          setTimeout(function() {
            $('.page-spinner-loader').addClass('hide');
          }, 4000);
       
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
