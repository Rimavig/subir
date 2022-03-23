'use strict';

angular.module('newApp')
  .controller('promociones_editar_Ctrl', ['$scope','pluginsService', function ($scope ,pluginsService) {
    var oTable,oTable1,oTable2,oTable3 ;   
    $(document).ready(function () { 
        $(".datepicker1").datetimepicker({
            locale: 'es'
            });

        oTable =$("#table-editable1").dataTable({ "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
                "paging":   false,
                "ordering": false,
                "info":     false,
                "searching": false
        });   
        oTable1 =$("#table-editable2").dataTable({ "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
            "paging":   false,
            "ordering": false,
            "info":     false,
            "searching": false
        });    
        oTable2 =$("#table-editable3").dataTable({ "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
            "paging":   false,
            "ordering": false,
            "info":     false,
            "searching": false
        });  
        oTable3 =$("#table-editable4").dataTable({ "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
            "paging":   false,
            "ordering": false,
            "info":     false,
            "searching": false
        });  
        $(document).on('change','.evento' ,function(e) {
            $(this).parents().find('#fcompra').hide();
            $(this).parents().find('#fpago').hide();
            $(this).parents().find('#formaPago').hide();
            $(this).parents().find('#Cpromocional').hide();

            if ( this.value=="none"){

            }else if ( this.value=="Fcompra"){
                $(this).parents().find('#fcompra').show();
            }else if ( this.value=="Fpago"){
                $(this).parents().find('#fpago').show();
            }else if ( this.value=="FormaPago"){
                $(this).parents().find('#formaPago').show();
            }else if ( this.value=="Cpromocional"){
                $(this).parents().find('#Cpromocional').show();
            }
           
        });
       
        $(document).on('change','.todos' ,function(e) {
            if(this.checked) {
                $(this).parents().find('#web').prop("checked", false);
                $(this).parents().find('#app1').prop("checked", false);
                $(this).parents().find('#taquilla').prop("checked", false);
            }
        });
        $(document).on('change','.web',function(e) {
            $(this).parents().find('#todos').prop("checked", false);
        });
        $(document).on('change','.app1' ,function(e) {
            $(this).parents().find('#todos').prop("checked", false);
        });
        $(document).on('change','.taquilla' ,function(e) {
            $(this).parents().find('#todos').prop("checked", false);
        });
    });

      $scope.$on('$viewContentLoaded', function () {

        function editableTable() {
            //boton crear
            $(document).on('click', '.crear', function (e) {
                e.preventDefault();
                var aiNew = oTable.fnAddData([
                    '',
                    '<div class="form-group prepend-icon"><input class="form-control input-sm" type="number" name="duracionE" placeholder="" min="0" required></div>',
                    '<div class="form-group prepend-icon"><input class="form-control input-sm" type="number" name="duracionE" placeholder="" min="0" required></div>',
                    '<div class="form-group prepend-icon"><input class="form-control input-sm" type="number" name="duracionE" placeholder="" min="0" required></div>',
                    '<div class="text-right"><a class="delete btn btn-sm btn-danger"  href="javascript:;" ><i class="icons-office-52"></i></a></div>']);
            });
            //boton eliminar
            $(document).on('click', '.delete', function (e) {
                e.preventDefault();
                if (confirm("Estas seguro de eliminar?") == false) {
                    return;
                }
                var nRow = $(this).parents('tr')[0];
                oTable.fnDeleteRow(nRow);
            });
        };
        function editableTable1() {
            //boton crear
            $(document).on('click', '.crear1', function (e) {
                e.preventDefault();
                oTable1.fnAddData([
                    '',
                    '<div class="form-group prepend-icon"><input class="form-control input-sm" type="number" name="duracionE" placeholder="" min="0" required></div>',
                    '<div class="form-group prepend-icon"><input class="form-control input-sm" type="number" name="duracionE" placeholder="" min="0" required></div>',
                    '<div class="text-right"><a class="delete1 btn btn-sm btn-danger"  href="javascript:;" ><i class="icons-office-52"></i></a></div>']);
            });
            //boton eliminar
            $(document).on('click', '.delete1', function (e) {
                e.preventDefault();
                if (confirm("Estas seguro de eliminar?") == false) {
                    return;
                }
                var nRow = $(this).parents('tr')[0];
                oTable1.fnDeleteRow(nRow);
            });
        };
        function editableTable2() {
            //boton crear
            $(document).on('click', '.crear2', function (e) {
                e.preventDefault();
                oTable2.fnAddData([
                    '',
                    '<select class="form-control" style="width:100%;"><option value="United States">Masculino</option><option value="United Kingdom">Femenino</option></select>',
                    '<select class="form-control" style="width:100%;"><option value="United States">Masculino</option><option value="United Kingdom">Femenino</option></select>',
                    '<div class="form-group prepend-icon"><input class="form-control input-sm" type="number" name="duracionE" placeholder="" min="0" required></div>',
                    '<div class="text-right"><a class="delete2 btn btn-sm btn-danger"  href="javascript:;" ><i class="icons-office-52"></i></a></div>']);
            });
            //boton eliminar
            $(document).on('click', '.delete2', function (e) {
                e.preventDefault();
                if (confirm("Estas seguro de eliminar?") == false) {
                    return;
                }
                var nRow = $(this).parents('tr')[0];
                oTable2.fnDeleteRow(nRow);
            });
        };
        function editableTable3() {
            //boton crear
            $(document).on('click', '.crear3', function (e) {
                e.preventDefault();
                oTable3.fnAddData([
                    '',
                    '<input type="text" name="lastname" class="form-control" placeholder="TSA" minlength="3" required>',
                    '<div class="form-group prepend-icon"><input class="form-control input-sm" type="number" name="duracionE" placeholder="" min="0" required></div>',
                    '<div class="text-right"><a class="delete3 btn btn-sm btn-danger"  href="javascript:;" ><i class="icons-office-52"></i></a></div>']);
            });
            //boton eliminar
            $(document).on('click', '.delete3', function (e) {
                e.preventDefault();
                if (confirm("Estas seguro de eliminar?") == false) {
                    return;
                }
                var nRow = $(this).parents('tr')[0];
                oTable3.fnDeleteRow(nRow);
            });
        };
          editableTable();  
          editableTable1(); 
          editableTable2(); 
          editableTable3(); 
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
        $(document).off('click','.crear');
        $(document).off('click','.delete');
        $(document).off('click','.crear1');
        $(document).off('click','.delete1');
        $(document).off('click','.crear2');
        $(document).off('click','.delete2');
        $(document).off('click','.crear3');
        $(document).off('click','.delete3');
      });
  }]);
