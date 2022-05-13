'use strict';

angular.module('newApp')
  .controller('facturacionCtrl', ['$scope', function ($scope) {
    var oTable;
    var oTable1;
    $(document).ready(function () {
        $('table').each(function () {
            if ($.fn.dataTable.isDataTable($(this))) {
                oTable =$(this).dataTable();
            }
        });
        oTable1 =$("#table-editable").dataTable({ "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }, 
            "bPaginate" : false,
            "destroy":true,
            "searching": false,
            "ordering": false,
            "autoWidth": true,
            "aoColumnDefs": [
                { "sWidth": "3%", "className": "text-center", "aTargets": 0 },
                { "sWidth": "30%", "className": "text-center", "aTargets": 1 },
                { "sWidth": "10%", "className": "text-center", "aTargets": 3 },
                { "sWidth": "5%", "className":  "text-center", "aTargets": [ 2, 4, 5, 6,7,8,9,10,11]  }
        ]});
    });
    $scope.$on('$viewContentLoaded', function () {
        
        
        $(document).on('click', '.editar1', function (e) {
            e.preventDefault();
            var estado=$(this).parents('tr').find('#fila0')[0];
            document.getElementById('nombre').value = estado.innerHTML;
        });
        $(document).on('click', '.abrir', function (e) {
            e.preventDefault();
            $('#modal-responsive').modal('hide');
        });
        //boton cancela la creación

    });

      $scope.$on('$destroy', function () {
        $('table').each(function () {
            if ($.fn.dataTable.isDataTable($(this))) {
                $(this).dataTable({
                    "bDestroy": true
                }).fnDestroy();
            }
        });
        $(document).off('click','.editar');
        $(document).off('click','.estado');
        $(document).off('click','.delete');
      });
  }]);
