'use strict';

angular.module('newApp')
  .controller('permisosCtrl', ['$scope','pluginsService', function ($scope,pluginsService) {
    var oTable;
    $(document).ready(function () {
        $('table').each(function () {
            if ($.fn.dataTable.isDataTable($(this))) {
                oTable =$(this).dataTable();
            }
        });

        function seleccionar(padre,tipo) {
            

            $(document).on('ifUnchecked','#exportar'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#crear'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#editar'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');

                $(this).parents().find('#informacion'+tipo).iCheck('uncheck');
                $(this).parents().find('#descripcion'+tipo).iCheck('uncheck');
                $(this).parents().find('#multimedia'+tipo).iCheck('uncheck');
                $(this).parents().find('#funciones'+tipo).iCheck('uncheck');
                $(this).parents().find('#precios'+tipo).iCheck('uncheck');
                $(this).parents().find('.esconder'+tipo).addClass('hide');
            });
            $(document).on('ifChecked','#editar'+tipo ,function(e) {
                $(this).parents().find('.esconder'+tipo).removeClass('hide');
            });
            $(document).on('ifUnchecked','#eliminar'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#estado'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#reset'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#bloquear'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#cortesia'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#informacion'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#descripcion'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#multimedia'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#funciones'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#precios'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifChecked',padre ,function(e) {
                $(this).parents().find('#exportar'+tipo).iCheck('check');
                $(this).parents().find('#crear'+tipo).iCheck('check');
                $(this).parents().find('#editar'+tipo).iCheck('check');
                $(this).parents().find('#eliminar'+tipo).iCheck('check');
                $(this).parents().find('#estado'+tipo).iCheck('check');
                $(this).parents().find('#reset'+tipo).iCheck('check');
                $(this).parents().find('#bloquear'+tipo).iCheck('check');
                $(this).parents().find('#cortesia'+tipo).iCheck('check');
                $(this).parents().find('#informacion'+tipo).iCheck('check');
                $(this).parents().find('#descripcion'+tipo).iCheck('check');
                $(this).parents().find('#multimedia'+tipo).iCheck('check');
                $(this).parents().find('#funciones'+tipo).iCheck('check');
                $(this).parents().find('#precios'+tipo).iCheck('check');
                $(this).parents().find('.esconder'+tipo).removeClass('hide');
            });
        }
        
        // ELIMINA EL PRINCIPAL DE CADA MODULO 
        //MODULO PERMISOS 
        seleccionar('#Tperfiles','P');
        seleccionar('#usuariosUAD','UAD');
        seleccionar('#usuariosUCL','UCL');
        seleccionar('#usuariosUEV','UEV');
        //MODULO MANTENIMIENTO
        seleccionar('#Tcategoria','MC');
        seleccionar('#Tclasificacion','MCL');
        seleccionar('#Tespectaculo','ME');
        seleccionar('#Tprocedencia','MP');
        seleccionar('#TtipoEvento','MTE');
        seleccionar('#Tproductora','MPR');
        seleccionar('#Tpromocion','MPM');
        seleccionar('#TdistribucionP','MDP');
        seleccionar('#TdistribucionE','MDE');
        seleccionar('#Tsala','MSL');
        //MODULO IMAGENES
        seleccionar('#TimagenSala','IS');
        seleccionar('#TimagenDistribucion','ID');
        seleccionar('#TimagenBanner','IB');
        seleccionar('#Tlogo','IL');
         //MODULO EVENTOS
         seleccionar('#Tventa','EV');
         seleccionar('#Tgratuito','EG');
         seleccionar('#Tinformativo','EI');
         seleccionar('#Tbloqueos','EB');
         //MODULO PROCESOS
         seleccionar('#TditribucionSala','PS');
         seleccionar('#TeliminarCortesia','CT');
         seleccionar('#TprocesosPromocion','PP');
         seleccionar('#TprocesosPromocionG','PPG');
    });
   
    setTimeout(function(){
        handleiCheck();
    },200);
    
    $scope.$on('$viewContentLoaded', function () {
       
        $(document).on('change','.web',function(e) {
            $(this).parents().find('#todos').prop("checked", false);
        });
        $(document).on('change','.app' ,function(e) {
            $(this).parents().find('#todos').prop("checked", false);
        });
        $(document).on('change','.taquilla' ,function(e) {
            $(this).parents().find('#todos').prop("checked", false);
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
        $(document).off('click','.crear');
        $(document).off('click','.editar_usuario');
        $(document).off('click','.crear_usuario');
        $(document).off('click','.estado');
        $(document).off('click','.clave');
        $(document).off('click','.delete');
        $(document).off('click','.editarC');
        $(document).off('click','.crearC');
        $(document).off('click','.editar_usuarioC');
        $(document).off('click','.crear_usuarioC');
        $(document).off('click','.estadoC');
        $(document).off('click','.deleteC');
        $(document).off('click','.claveC');
        $(document).off('click','.editarE');
        $(document).off('click','.crearE');
        $(document).off('click','.editar_usuarioE');
        $(document).off('click','.crear_usuarioE');
        $(document).off('click','.estadoE');
        $(document).off('click','.deleteE');
        $(document).off('click','.claveE');

      });
  }]);
