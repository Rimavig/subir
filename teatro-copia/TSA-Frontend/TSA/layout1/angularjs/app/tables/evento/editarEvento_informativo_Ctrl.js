'use strict';

angular.module('newApp')
  .controller('editarEvento_informativo_Ctrl',['$scope','pluginsService', function ($scope ,pluginsService) {
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

        $(document).on('click', '.formulario', function (e) {
            var element = document.getElementById("formulario1").value;
            if(element==""){
                alert("Ingrese Valor")
            }else{
               // var newElement = '<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSetN50lUObGMERtxmJWhALvxmIuVlYOUPr22QVeggNGz-zn_Q/viewform?embedded=true" width="640" height="947" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>'
                document.getElementById('formulario').innerHTML=element ; 
            }
            
        });
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
            //crear fila
            function crearRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[0].innerHTML = ' <input type="text" name="datetimepicker" class="form-control input-sm datepicker" placeholder="Choose a date112221..." required>';
                jqTds[1].innerHTML = '<label class="switch switch-green"> <input type="checkbox" class="switch-input" > <span class="switch-label" data-on="On" data-off="Off"></span><span class="switch-handle"></span> </label>';
                jqTds[2].innerHTML = '<label class="switch switch-green"> <input type="checkbox" class="switch-input" > <span class="switch-label" data-on="On" data-off="Off"></span><span class="switch-handle"></span> </label>';
                jqTds[3].innerHTML = '<label class="switch switch-green"> <input type="checkbox" class="switch-input" > <span class="switch-label" data-on="On" data-off="Off"></span><span class="switch-handle"></span> </label>';
                jqTds[4].innerHTML = '<label class="switch switch-green"> <input type="checkbox" class="switch-input" > <span class="switch-label" data-on="On" data-off="Off"></span><span class="switch-handle"></span> </label>';
                jqTds[5].innerHTML = '<div class="text-right"><a class="add  btn btn-sm btn-success"  href="javascript:;">Save</a> <a class="cancelar1 btn btn-sm btn-danger" data-crear="new"  href="javascript:;">Cancelar</a></div>';
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
                    console.log("dassad1");
                      restoreRow(oTable, nEditing);
                      editRow(oTable, nRow);
                      nEditing = nRow;
                  } else if (nEditing == nRow && this.innerHTML == "Save") {
                    console.log("dassad2");
                      /* This row is being edited and should be saved */
                      saveRow(oTable, nEditing);
                      nEditing = null;
                      // alert("Updated! Do not forget to do some ajax to sync with backend :)");
                  } else {
                    console.log("dassad3");
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
                    console.log("editardasdsa");
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
                $('.delete').unbind();
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
          editableTable();  
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
