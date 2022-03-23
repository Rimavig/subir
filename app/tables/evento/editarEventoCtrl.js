'use strict';

angular.module('newApp')
  .controller('editarEventoCtrl',['$scope','pluginsService', function ($scope ,pluginsService) {
    var oTable;
    var oTable1;
    $(document).ready(function () {
        $( $('.summernote')).summernote({
            height: 300,
            airMode: $(this).data('airmode') ? $(this).data('airmode') : false,
            airPopover: [
                ["style", ["style"]],
                ['color', ['color']],
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']]
            ],
            toolbar: [
               
              ]
        });
        $(".datepicker").datetimepicker({
            locale: 'es'
          });

        oTable =$("#table-editable1").dataTable({ "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }});

        oTable1 =$("#table-editable2").dataTable({ "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }, 
            "ordering": false,
            "autoWidth": false,
            "aoColumnDefs": [
                { "sWidth": "10%", "className": "text-center", "aTargets": 0 },
                { "sWidth": "5%", "className":  "text-center", "aTargets": [ 1, 2, 3, 4,5]  }
            ]});
      });
     
    $scope.$on('$viewContentLoaded', function () {
        //tabla funciones
        $(document).on('click', '.myBtn', function (e) {
            e.preventDefault();
            $("#modal-responsive3").modal();
        });
        
 
    
        function editableTable() {
            //cancela cambio
            function restoreRow(oTable, nRow) {
                
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }
                oTable.fnDraw();
            }
            //editar fila
            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[0].innerHTML = ' <input type="text" name="datetimepicker" class="form-control input-sm datepicker" placeholder="Choose a date..." required>';
                jqTds[1].innerHTML = ' <div data-toggle="modal" data-target="#modal-responsive3"><button class="">' + aData[1] + '</button> </div>';
                jqTds[2].innerHTML = '<button class="btn btn-dark m-t-5" data-toggle="modal" data-target="#modal-bootstrap-timepicker">Show in modal</button>';
                jqTds[3].innerHTML = '  <input type="text" name="datetimepicker" class="datetimepicker form-control" placeholder="Choose a date...">';
                jqTds[4].innerHTML = '<input type="text" class="form-control small" value="' + aData[4] + '">';
                jqTds[5].innerHTML = '<div class="text-right"><a class="edit btn btn-sm btn-success"  href="javascript:;">Save</a> <a class="cancelar btn btn-sm btn-danger" href="javascript:;">Cancelar</a></div>';
            }
            //guarda cambio
            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                console.log(nRow);

                oTable.fnUpdate("", nRow, 0, false);
                oTable.fnUpdate(' <input type="text" class="form-control input-sm datepicker" placeholder="Choose a date..." value="' + jqInputs[0].value + '" required>', nRow, 1, false);
                oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> </label>', nRow, 2, false);
                oTable.fnUpdate('<div class="text-right"><a class="guardar btn btn-sm btn-blue"  href="javascript:;" ><i class="fa fa-save"></i></a>  <a class="delete btn btn-sm btn-danger"  href="javascript:;" ><i class="icons-office-52"></i></a></div>', nRow, 3, false);
                oTable.fnDraw();
                $(".datepicker").datetimepicker({
                    locale: 'es'
                  });
            }
              jQuery('#table-edit_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
              jQuery('#table-edit_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

              var nEditing = null;
              var nRow1=null;
              
            //boton crear
            $(document).on('click', '.crear', function (e) {
                e.preventDefault();
                oTable=$("#table-editable1").dataTable();
                var aiNew = oTable.fnAddData([
                    '',
                     '<input type="text"  class="form-control input-sm datepicker" placeholder="Choose a date..." required>',
                    '<label class="switch switch-green"> <input type="checkbox" class="switch-input"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> </label>',
                    '<div class="text-right"><a class="guardar btn btn-sm btn-blue"  href="javascript:;" ><i class="fa fa-save"></i></a>  <a class="delete btn btn-sm btn-danger"  href="javascript:;" ><i class="icons-office-52"></i></a></div>']);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                $(".datepicker").datetimepicker({
                    locale: 'es'
                  });
               // nEditing = nRow;
            });
            //boton editar
              $(document).on('click', '.edit', function (e) {
                e.preventDefault();
                oTable=$("#table-editable1").dataTable();
                  /* Get the row as a parent of the link that was clicked on */
                  var nRow = $(this).parents('tr')[0];
                   nRow1= nRow;
                
                  if (nEditing !== null && nEditing != nRow) {
                      restoreRow(oTable, nEditing);
                      editRow(oTable, nRow);
                      nEditing = nRow;
                  } else if (nEditing == nRow && this.innerHTML == "Save") {
                      /* This row is being edited and should be saved */
                      saveRow(oTable, nEditing);
                      nEditing = null;
                      // alert("Updated! Do not forget to do some ajax to sync with backend :)");
                  } else {
                      /* No row currently being edited */
                      editRow(oTable, nRow);
                      nEditing = nRow;
                  }
            });
            //boton guardar cuando creas
            $(document).on('click', '.add', function (e) {
                e.preventDefault();
                oTable=$("#table-editable1").dataTable();
                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];
                console.log(nRow);
                saveRow(oTable, nRow);
                nEditing = null;
                  
            });
            
            //boton cancelar
            $(document).on('click', '.cancelar', function (e) {
                e.preventDefault();
                oTable=$("#table-editable1").dataTable();
                if ($(this).attr("data-crear") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });
            //boton eliminar
            $(document).on('click', '.delete', function (e) {
                e.preventDefault();
                oTable=$("#table-editable1").dataTable();
                console.log("editar");
                if (confirm("Estas seguro de eliminar?") == false) {
                    return;
                }
                var nRow = $(this).parents('tr')[0];
                console.log(oTable);
                console.log(nRow);
                oTable.fnDeleteRow(nRow);
                e.stopPropagation();
            });
            //boton cancela la creación
            $(document).on('click', '.cancelar1', function (e) {
                e.preventDefault();
                oTable=$("#table-editable1").dataTable();
                var nRow = $(this).parents('tr')[0];
                console.log(nRow);

                oTable.fnDeleteRow(nRow);
                
            });
             
          };

          //tabla precios
        function editableTable1() {
            //cancela cambio
            function restoreRow1(oTable1, nRow1) {
                
                var aData = oTable.fnGetData(nRow1);
                var jqTds = $('>td', nRow1);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable1.fnUpdate(aData[i], nRow1, i, false);
                }
                oTable1.fnDraw();
            }
              var nEditing = null;
              
            //boton crear
            $(document).on('click', '.crear1', function (e) {
                e.preventDefault()
                var aiNew = oTable1.fnAddData([
                    '<input type="text" name="nombrePlatea" id="nombrePlatea" class="form-control prueba" placeholder="Nombre Platea" minlength="3" required>',
                    '<input class="form-control input-sm prueba" type="number" min="0" name="precio" id="precio" placeholder="" required>',
                    '<input class="form-control input-sm prueba" type="number" name="aforo" id="aforo"  min="0"  placeholder="" required>',
                    '<input class="form-control input-sm prueba" type="number" name="venta" id="venta" min="0"  placeholder="" required>',
                    '<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="estado"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> </label>',
                    '<div class="text-right"><a class="guardar1 btn btn-sm btn-blue"  href="javascript:;" ><i class="fa fa-save"></i></a>  <a class="delete1 btn btn-sm btn-danger"  href="javascript:;" ><i class="icons-office-52"></i></a></div>']);
                var nRow = oTable1.fnGetNodes(aiNew[0]);
                $(".datepicker").datetimepicker({
                    locale: 'es'
                  });
               // nEditing = nRow;
            });
            //boton editar
              $(document).on('click', '.edit1', function (e) {
                e.preventDefault();
                  /* Get the row as a parent of the link that was clicked on */
                  var nRow1 = $(this).parents('tr')[0];
                  if (nEditing !== null && nEditing != nRow) {
                      restoreRow1(oTable1, nEditing);
                      editRow1(oTable1, nRow1);
                      nEditing = nRow1;
                  } else if (nEditing == nRow1 && this.innerHTML == "Save") {
                      /* This row is being edited and should be saved */
                      saveRow1(oTable1, nEditing);
                      nEditing = null;
                      // alert("Updated! Do not forget to do some ajax to sync with backend :)");
                  } else {      
                      /* No row currently being edited */
                      editRow1(oTable1, nRow1);
                      nEditing = nRow1;
                  }
            });
            //boton guardar cuando creas
            $(document).on('click', '.add1', function (e) {
                e.preventDefault();
                /* Get the row as a parent of the link that was clicked on */
                var nRow1 = $(this).parents('tr')[0];

                saveRow1(oTable1, nRow1);
                nEditing = null;
                  
            });
            
            //boton cancelar
            $(document).on('click', '.cancelar1', function (e) {
                e.preventDefault();
                if ($(this).attr("data-crear") == "new") {
                    var nRow1 = $(this).parents('tr')[0];
                    oTable1.fnDeleteRow(nRow1);
                } else {
                    restoreRow1(oTable1, nEditing);
                    nEditing = null;
                }
            });
            //boton eliminar
            $(document).on('click', '.delete1', function (e) {
                e.preventDefault();
                console.log("editar");
                if (confirm("Estas seguro de eliminar?") == false) {
                    return;
                }
                var nRow1 = $(this).parents('tr')[0];
                oTable1.fnDeleteRow(nRow1);
            });
            //boton cancela la creación
            $(document).on('click', '.cancelar2', function (e) {
                e.preventDefault();
                var nRow1 = $(this).parents('tr')[0];
                oTable1.fnDeleteRow(nRow1);
            });
 
            $(document).on('change','.switch-input' ,function(e) {
                $('#estreno2').attr('disabled', false);
                $('#preestreno2').attr('disabled', false);
                e.preventDefault();
                if(this.id=="preestreno") {
                    if(this.checked) {
                        $(this).parents('tr').find('#preestreno1').show();
                        $(this).parents('tr').find('#preestreno2').show();
                    }else {
                        $(this).parents('tr').find('#preestreno1').hide();
                        $(this).parents('tr').find('#preestreno2').hide();
                    }
                }
                if(this.id=="estreno") {
                    if(this.checked) {
                        $(this).parents('tr').find('#estreno1').show();
                        $(this).parents('tr').find('#estreno2').show();
                    }else {
                        $(this).parents('tr').find('#estreno1').hide();
                        $(this).parents('tr').find('#estreno2').hide();
                    }
                }
            });
        
        };  
          editableTable();  
          editableTable1();
    });

    $scope.$on('$destroy', function () {
        $('table').each(function () {
            if ($.fn.dataTable.isDataTable($(this))) {
                $(this).dataTable({
                    "bDestroy": true
                }).fnDestroy();
            }
        });
        $(document).off('click','.edit');
        $(document).off('click','.add');
        $(document).off('click','.crear');
        $(document).off('click','.delete');
        $(document).off('click','.cancelar');
        $(document).off('click','.edit1');
        $(document).off('click','.add1');
        $(document).off('click','.crear1');
        $(document).off('click','.delete1');
        $(document).off('click','.cancelar1');
        $(document).off('click','.cancelar2');
    });
}]);
