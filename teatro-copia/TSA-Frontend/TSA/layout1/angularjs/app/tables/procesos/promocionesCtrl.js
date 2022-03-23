'use strict';

angular.module('newApp')
  .controller('promocionesCtrl', ['$scope','pluginsService', function ($scope ,pluginsService) {
    var oTable;
    $(document).ready(function () {
        $('table').each(function () {
            if ($.fn.dataTable.isDataTable($(this))) {
                oTable =$(this).dataTable();
            }
        });
    });
    $scope.$on('$viewContentLoaded', function () {
        
        //boton eliminar
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            oTable=$("#table-editable").dataTable();
            if (confirm("Estas seguro de eliminar?") == false) {
                return;
            }
            var nRow = $(this).parents('tr')[0];
            oTable.fnDeleteRow(nRow);
        });
        $(document).on('click', '.editar1', function (e) {
            e.preventDefault();
            var estado=$(this).parents('tr').find('#fila0')[0];
            document.getElementById('nombre').value = estado.innerHTML;
        });
        //boton cancela la creación
        $(document).on('click', '.estado', function (e) {
            e.preventDefault();
            
            var estado=$(this).parents('tr').find('#box')[0];
            var nRow = $(this).parents('tr')[0];
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    return;
                }else{
                    estado.checked = false;
                    oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" > <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                    oTable.fnDraw();
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    return;
                }else{
                    estado.checked = true;
                    oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" checked> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">On</span> </label>', nRow, 6, false);
                    oTable.fnDraw();
                }
            }
        });
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
