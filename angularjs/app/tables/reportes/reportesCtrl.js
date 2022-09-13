'use strict';

angular.module('newApp')
  .controller('reportesCtrl', ['$scope','pluginsService', function ($scope,pluginsService) {
    var oTable;
    $scope.reload = function()
    {
    location.reload(); 

    }
    $scope.$on('$viewContentLoaded', function () {

        //PERFIL CATEGORIA   
        //boton principal
        $(document).on('click', '.editar', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            $('.page-spinner-loader').removeClass('hide');
            
            $('#funcionesR').load('./tables/reportes/tab_funciones.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('.editarEvento').addClass('hide');
                $('.funcionesR').removeClass('hide');
                if ($("#table-editable3").hasClass('no-descargar')) {
                    esconder=[];
                } else{
                    esconder=[
                        {
                            "extend": 'excelHtml5',
                            "title": $(this).data('table-name') || "Your custom name",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Your custom name",
                            "className": 'btn btn-default'
                        },
                        {
                            text: '<i class="fa fa-refresh"></i>',
                            "className": 'btn btn-default',
                            action: function () {
                                var table = $('#table-editable3').DataTable();
                                table.ajax.reload();
                            }
                        }                                       
                    ]
                }
                $("#table-editable3").dataTable({ "language": {
                    
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }, 
                    "ajax": "tables/reportes/tab_funciones_data.php?var1="+estado.innerHTML,
                    "ordering": false,
                    "autoWidth": false,
                    "scrollX": false,
                    "destroy":true,
                    "dom": "<'row'<'col-xs-6 col-sm-4 col-md-6 tabla-estilo 'l><'col-xs-6 col-sm-5 col-md-5 tabla-estilo'f><'col-xs-6 col-sm-5 col-md-6 tabla-estilo1'B>r>t<'row'<'col-xs-12 col-sm-6 col-md-6 tabla-estilo'i><'spcol-md-6an6'p>>",
                    "buttons" :esconder,
                    "aoColumnDefs": [
                        {
                            "targets": [ 0 ],
                             "className": "hide_column"
                        }
                    ]});
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarG', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#funcionesR').load('./tables/reportes/tab_registro.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('.editarEvento').addClass('hide');
                $('.funcionesR').removeClass('hide');
                if ($("#table-editable3").hasClass('no-descargar')) {
                    esconder=[];
                } else{
                    esconder=[
                        {
                            "extend": 'excelHtml5',
                            "title": $(this).data('table-name') || "Your custom name",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Your custom name",
                            "className": 'btn btn-default'
                        },
                        {
                            text: '<i class="fa fa-refresh"></i>',
                            "className": 'btn btn-default',
                            action: function () {
                                var table = $('#table-editable3').DataTable();
                                table.ajax.reload();
                            }
                        }                                       
                    ]
                }
                $("#table-editable3").dataTable({ "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }, 
                    "ajax": "tables/reportes/tab_registro_data.php?var1="+estado.innerHTML,
                    "ordering": false,
                    "autoWidth": false,
                    "scrollX": false,
                    "destroy":true,
                    "dom": "<'row'<'col-xs-6 col-sm-4 col-md-6 tabla-estilo 'l><'col-xs-6 col-sm-5 col-md-5 tabla-estilo'f><'col-xs-6 col-sm-5 col-md-6 tabla-estilo1'B>r>t<'row'<'col-xs-12 col-sm-6 col-md-6 tabla-estilo'i><'spcol-md-6an6'p>>",
                    "buttons" :esconder,
                    "aoColumnDefs": [
                        {
                            "targets": [ 0 ],
                             "className": "hide_column"
                        }
                    ]});
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarA', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#funcionesR').load('./tables/reportes/tab_amigos.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('.editarEvento').addClass('hide');
                $('.funcionesR').removeClass('hide');
                if ($("#table-editable3").hasClass('no-descargar')) {
                    esconder=[];
                } else{
                    esconder=[
                        {
                            "extend": 'excelHtml5',
                            "title": $(this).data('table-name') || "Your custom name",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Your custom name",
                            "className": 'btn btn-default'
                        },
                        {
                            text: '<i class="fa fa-refresh"></i>',
                            "className": 'btn btn-default',
                            action: function () {
                                var table = $('#table-editable3').DataTable();
                                table.ajax.reload();
                            }
                        }                                       
                    ]
                }
                $("#table-editable3").dataTable({ "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }, 
                    "ajax": "tables/reportes/tab_amigos_data.php?var1="+estado.innerHTML,
                    "ordering": true,
                    "autoWidth": false,
                    "scrollX": false,
                    "destroy":true,
                    "order": [[ 5, "desc" ]],
                    "dom": "<'row'<'col-xs-6 col-sm-4 col-md-6 tabla-estilo 'l><'col-xs-6 col-sm-5 col-md-5 tabla-estilo'f><'col-xs-6 col-sm-5 col-md-6 tabla-estilo1'B>r>t<'row'<'col-xs-12 col-sm-6 col-md-6 tabla-estilo'i><'spcol-md-6an6'p>>",
                    "buttons" :esconder,
                    "aoColumnDefs": [
                        {
                            "targets": [ 0 ],
                             "className": "hide_column"
                        }
                    ]});
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarFuncion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
           
            $('.page-spinner-loader').removeClass('hide');
            $('#ticketsR').load('./tables/reportes/tab_tickets.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('.funcionesR').addClass('hide');
                $('.ticketsR').removeClass('hide');
                if ($("#table-editable2").hasClass('no-descargar')) {
                    esconder=[];
                } else{
                    esconder=[
                        {
                            "extend": 'excelHtml5',
                            "title": $(this).data('table-name') || "Your custom name",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Your custom name",
                            "className": 'btn btn-default'
                        },
                        {
                            text: '<i class="fa fa-refresh"></i>',
                            "className": 'btn btn-default',
                            action: function () {
                                var table = $('#table-editable2').DataTable();
                                table.ajax.reload();
                            }
                        }                                       
                    ]
                }
                $("#table-editable2").dataTable({ "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }, 
                    "ajax": "tables/reportes/tab_tickets_data.php?var1="+estado.innerHTML,
                    "ordering": true,
                    "autoWidth": false,
                    "scrollX": false,
                    "destroy":true,
                    "dom": "<'row'<'col-xs-6 col-sm-4 col-md-6 tabla-estilo 'l><'col-xs-6 col-sm-5 col-md-5 tabla-estilo'f><'col-xs-6 col-sm-5 col-md-6 tabla-estilo1'B>r>t<'row'<'col-xs-12 col-sm-6 col-md-6 tabla-estilo'i><'spcol-md-6an6'p>>",
                    "buttons" :esconder,
                    "aoColumnDefs": [
                        {
                            "targets": [ 0,1 ],
                             "className": "hide_column"
                        }
                    ]});
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarRegistro', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#ticketsR').load('./tables/reportes/tab_ticketsR.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('.funcionesR').addClass('hide');
                $('.ticketsR').removeClass('hide');
                if ($("#table-editable2").hasClass('no-descargar')) {
                    esconder=[];
                } else{
                    esconder=[
                        {
                            "extend": 'excelHtml5',
                            "title": $(this).data('table-name') || "Your custom name",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Your custom name",
                            "className": 'btn btn-default'
                        },
                        {
                            text: '<i class="fa fa-refresh"></i>',
                            "className": 'btn btn-default',
                            action: function () {
                                var table = $('#table-editable2').DataTable();
                                table.ajax.reload();
                            }
                        }                                       
                    ]
                }
                $("#table-editable2").dataTable({ "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }, 
                    "ajax": "tables/reportes/tab_ticketsR_data.php?var1="+estado.innerHTML,
                    "ordering": true,
                    "autoWidth": false,
                    "scrollX": false,
                    "destroy":true,
                    "dom": "<'row'<'col-xs-6 col-sm-4 col-md-6 tabla-estilo 'l><'col-xs-6 col-sm-5 col-md-5 tabla-estilo'f><'col-xs-6 col-sm-5 col-md-6 tabla-estilo1'B>r>t<'row'<'col-xs-12 col-sm-6 col-md-6 tabla-estilo'i><'spcol-md-6an6'p>>",
                    "buttons" :esconder,
                    "aoColumnDefs": [
                        {
                            "targets": [ 0 ],
                             "className": "hide_column"
                        }
                    ]});
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarTA', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('.infoCompraMV').load('./tables/reportes/tab_tickets_asiento.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('.ticketsR').addClass('hide');
                $('.infoCompraMV').removeClass('hide');   
                $('.taquillaMV').addClass('hide');
                $('.taquillaG').addClass('hide');
                if ($("#table-editable4").hasClass('no-descargar')) {
                    esconder=[];
                } else{
                    esconder=[
                        {
                            "extend": 'excelHtml5',
                            "title": $(this).data('table-name') || "Your custom name",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Your custom name",
                            "className": 'btn btn-default'
                        },
                        {
                            text: '<i class="fa fa-refresh"></i>',
                            "className": 'btn btn-default',
                            action: function () {
                                var table = $('#table-editable4').DataTable();
                                table.ajax.reload();
                            }
                        }                                       
                    ]
                }
                $("#table-editable4").dataTable({ "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }, 
                    "ajax": "tables/reportes/tab_tickets_asiento_data.php?var1="+estado.innerHTML,
                    "ordering": true,
                    "autoWidth": false,
                    "scrollX": false,
                    "destroy":true,
                    "dom": "<'row'<'col-xs-6 col-sm-4 col-md-6 tabla-estilo 'l><'col-xs-6 col-sm-5 col-md-5 tabla-estilo'f><'col-xs-6 col-sm-5 col-md-6 tabla-estilo1'B>r>t<'row'<'col-xs-12 col-sm-6 col-md-6 tabla-estilo'i><'spcol-md-6an6'p>>",
                    "buttons" :esconder,
                    "aoColumnDefs": [
                        {
                            "targets": [ 0 ],
                             "className": "hide_column"
                        }
                    ]});
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarVC', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[1];
            console.log($(this).parents('tr').find('.hide_column'))
            $('.page-spinner-loader').removeClass('hide');
            $('.infoCompraMV').load('./tables/facturacion/info_compra.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('.ticketsR').addClass('hide');
                $('.infoCompraMV').removeClass('hide');   
                $('.taquillaMV').addClass('hide');
                $('.taquillaG').addClass('hide');
            });
            $(this).prop("disabled",false);
        });
        //boton principal
        $(document).on('click', '.cancelarFuncion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.editarEvento').removeClass('hide');   
            $('.funcionesR').addClass('hide');
            $('.ticketsR').addClass('hide');
            $('.infoCompraMV').addClass('hide');   
            $('.page-spinner-loader').addClass('hide');
            $('.tabEventos').addClass('hide');
            var table = $('#table-editable').DataTable();
            table.ajax.reload();
        });
        $(document).on('click', '.cancelarTicket', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.editarEvento').addClass('hide');   
            $('.funcionesR').removeClass('hide');
            $('.ticketsR').addClass('hide');
            $('.infoCompraMV').addClass('hide');   
            $('.page-spinner-loader').addClass('hide');
            $('.tabEventos').addClass('hide');
            var table = $('#table-editable3').DataTable();
            table.ajax.reload();
        });
        $(document).on('click', '.atrasRCompra', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.editarEvento').addClass('hide');   
            $('.funcionesR').addClass('hide');
            $('.ticketsR').removeClass('hide');
            $('.infoCompraMV').addClass('hide');   
            $('.page-spinner-loader').addClass('hide');
            $('.tabEventos').addClass('hide');
            var table = $('#table-editable2').DataTable();
            table.ajax.reload();
        });
        $(document).on('click', '.salirRCompra', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.editarEvento').removeClass('hide');   
            $('.funcionesR').addClass('hide');
            $('.ticketsR').addClass('hide');
            $('.infoCompraMV').addClass('hide');   
            $('.page-spinner-loader').addClass('hide');
            $('.tabEventos').addClass('hide');
            var table = $('#table-editable').DataTable();
            table.ajax.reload();
        });
        $(document).on('click', '.estadoR', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            console.log(id);
            var estado=$(this).parents('tr').find('#box')[0];
            var nRow = $(this).parents('tr')[0];          
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/reportes/alerta.php', {tipo:"estado", estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                      // estado.checked = false;
                       //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                      //  oTable.fnDraw();
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/reportes/alerta.php', {tipo:"estado", estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');    
                    });
                    
                }
            }
            
        });
        //boton eliminar
        $(document).on('click', '.deleteR', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/reportes/alerta.php', {tipo:"estado", estado:"B", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
        });

        $(document).on('click', '.verPromo', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var id_promo="1";
            var id_tipoPromo=$(this).parents('tr')[0].children[1].innerHTML;
            var tipo2=$(this).parents('tr')[0].children[5].innerHTML;
            var id=$(this).parents('tr')[0].children[2].innerHTML;
            console.log($(this).parents('tr')[0]);

            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Cpromocion').load('./tables/facturacion/editar_promocion.php',{id:id, id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cpromocion').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
    
        });
        $(document).on('click', '.verR', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var image = document.getElementById('imagen1');
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            image.src = "https://teatrosanchezaguilar.org/plantilla/qr/qrcodeG"+id+".png";
            $('#verMapa').modal('show'); // abrir
        });
        $(document).on('click', '.correoR', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            $('.page-spinner-loader').removeClass('hide');
            $('#alerta').load('./tables/reportes/alerta.php', {tipo:"correoR", id:id},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
            
    
        });
    });

    $scope.$on('$destroy', function () {
        $('#table-editable').DataTable().clear().destroy();
        $('#table-editable3').DataTable().clear().destroy();
        $('#table-editable2').DataTable().clear().destroy();
        $('#table-editable4').DataTable().clear().destroy();
        $('#table-editable').DataTable().clear().destroy();
        var tables = $.fn.dataTable.fnTables(true);
        $(tables).each(function () {
            $(this).dataTable().fnDestroy();
        });
        $(document).off('click','.correoR');
        $(document).off('click','.editar');
        $(document).off('click','.editarG');
        $(document).off('click','.editarA');
        $(document).off('click','.editarFuncion');
        $(document).off('click','.editarRegistro');
        $(document).off('click','.editarTA');
        $(document).off('click','.editarVC');
        $(document).off('click','.cancelarFuncion');
        $(document).off('click','.cancelarTicket');
        $(document).off('click','.atrasRCompra');
        $(document).off('click','.salirRCompra');
        $(document).off('click','.estadoR');
        $(document).off('click','.deleteR');
        $(document).off('click','.verPromo');
       
      });
  }]);
