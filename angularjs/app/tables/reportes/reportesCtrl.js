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
                            "title": $(this).data('table-name') || "Reporte funciones",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Reporte funciones",
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
        $(document).on('click', '.editarTicket', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            $('.page-spinner-loader').removeClass('hide');
            
            $('#funcionesR').load('./tables/reportes/tab_funciones_ticket.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('.editarEvento').addClass('hide');
                $('.funcionesR').removeClass('hide');
                if ($("#table-editable3").hasClass('no-descargar')) {
                    esconder=[];
                } else{
                    esconder=[
                        {
                            "extend": 'excelHtml5',
                            "title": $(this).data('table-name') || "Reporte funciones",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Reporte funciones",
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
                    "ajax": "tables/reportes/tab_funciones_ticket_data.php?var1="+estado.innerHTML,
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
        $(document).on('click', '.editarTotalSala', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr')[0].children[0].innerHTML;
            $('.page-spinner-loader').removeClass('hide');
            
            $('#ticketsR').load('./tables/reportes/tab_tickets_sala.php', {var1:estado},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('.editarEvento').addClass('hide');
                $('.ticketsR').removeClass('hide');
                if ($("#table-editable2").hasClass('no-descargar')) {
                    esconder=[];
                } else{
                    esconder=[
                        {
                            "extend": 'excelHtml5',
                            "title": $(this).data('table-name') || "Reporte funciones",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Reporte funciones",
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
                    "ajax": "tables/reportes/tab_tickets_sala_data.php?var1="+estado,
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
                        },
                        {  
                            "targets": [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14 ],
                            "className": "text-center"
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
                            "title": $(this).data('table-name') || "Reporte de Registro",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Reporte de Registro",
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
                            "title": $(this).data('table-name') || "Reporte de Amigos Teatro",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Reporte de Amigos Teatro",
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
                            "title": $(this).data('table-name') || "Reporte tickets",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Reporte tickets",
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
                    "destroy":true,
                    "dom": "<'row'<'col-xs-6 col-sm-4 col-md-6 tabla-estilo 'l><'col-xs-6 col-sm-5 col-md-5 tabla-estilo'f><'col-xs-6 col-sm-5 col-md-6 tabla-estilo1'B>r>t<'row'<'col-xs-12 col-sm-6 col-md-6 tabla-estilo'i><'spcol-md-6an6'p>>",
                    "buttons" :esconder,
                    "aoColumnDefs": [
                        {
                            "targets": [ 0,1 ],
                                "className": "hide_column"
                            },
                            
                        { "sWidth": "70px", "className": "text-center", "aTargets": [ 2,3,4,6,7,8,9,10,11,12]},
                        { "sWidth": "200px", "className": "text-center", "aTargets": [ 5]}
                    ]
                });
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarFuncionTicket', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
           
            $('.page-spinner-loader').removeClass('hide');
            $('#ticketsR').load('./tables/reportes/tab_tickets_ticket.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('.funcionesR').addClass('hide');
                $('.ticketsR').removeClass('hide');
                if ($("#table-editable2").hasClass('no-descargar')) {
                    esconder=[];
                } else{
                    esconder=[
                        {
                            "extend": 'excelHtml5',
                            "title": $(this).data('table-name') || "Reporte tickets",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Reporte tickets",
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
                    "ajax": "tables/reportes/tab_tickets_ticket_data.php?var1="+estado.innerHTML,
                    "ordering": true,
                    "autoWidth": false,
                    "destroy":true,
                    "dom": "<'row'<'col-xs-6 col-sm-4 col-md-6 tabla-estilo 'l><'col-xs-6 col-sm-5 col-md-5 tabla-estilo'f><'col-xs-6 col-sm-5 col-md-6 tabla-estilo1'B>r>t<'row'<'col-xs-12 col-sm-6 col-md-6 tabla-estilo'i><'spcol-md-6an6'p>>",
                    "buttons" :esconder,
                    "aoColumnDefs": [
                        {
                            "targets": [ 0,1 ],
                                "className": "hide_column"
                            },
                            
                        { "sWidth": "100px", "className": "text-center", "aTargets": [ 2,3,4,6,7,8,9,10]},
                        { "sWidth": "150px", "className": "text-center", "aTargets": [ 5]}
                    ]
                });
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
                            "title": $(this).data('table-name') || "Reporte Tickets Gratuitos",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Reporte Tickets Gratuitos",
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
                    "destroy":true,
                    "dom": "<'row'<'col-xs-6 col-sm-4 col-md-6 tabla-estilo 'l><'col-xs-6 col-sm-5 col-md-5 tabla-estilo'f><'col-xs-6 col-sm-5 col-md-6 tabla-estilo1'B>r>t<'row'<'col-xs-12 col-sm-6 col-md-6 tabla-estilo'i><'spcol-md-6an6'p>>",
                    "buttons" :esconder,
                    "aoColumnDefs": [
                        {
                            "targets": [ 0 ],
                                "className": "hide_column"
                            },
                            
                        { "sWidth": "60px", "className": "text-center", "aTargets": [ 1,2,3,5,6,9,10,11]},
                        { "sWidth": "40px", "className": "text-center", "aTargets": [ 7,8]},
                        { "sWidth": "120px", "className": "text-center", "aTargets": [ 12]},
                        { "sWidth": "200px", "className": "text-center", "aTargets": [ 4]}
                    ]
                });
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
                            "title": $(this).data('table-name') || "Reporte Tickets Asientos",
                            "className": 'btn btn-default'
                        },
                        {
                            "extend": 'pdfHtml5',
                            "title": $(this).data('table-name') || "Reporte Tickets Asientos",
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
        $(document).on('click', '.editarR', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var var1=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            $('.page-spinner-loader').removeClass('hide');
            $('#Cevento').load('./tables/reportes/editar_correo.php',{var1:var1},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cevento').modal('show'); // abrir
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

        $(document).on('click', '.editar_correoR', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#idCorreo')[0].value;
            var correo=$(this).parents().find('#correo')[0].value;
            $('.page-spinner-loader').removeClass('hide');
            $('#alerta').load('./tables/reportes/alerta.php', {tipo:"editar_correoR",  id:id,correo:correo},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
        });
        $(document).on('click', '.buscarRP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var fechaI=$(this).parents().find('#fechaI')[0].value;
            var fechaF=$(this).parents().find('#fechaF')[0].value;
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var table = $('#table-editable').DataTable();
            var data="";
            if ($('#table-editable').hasClass('paymentez_data')) {
                data="tables/reportes/reporte_paymentez_data.php?var1="+fechaI+"&var2="+fechaF ;
            }else if ($('#table-editable').hasClass('paymentez_pago_data')) {
                data="tables/reportes/reporte_pagos_data.php?var1="+fechaI+"&var2="+fechaF ;
            }
            table.ajax.url(data).load();
            setTimeout(function(){
                $('.page-spinner-loader').addClass('hide');
                $('.buscarRP').prop("disabled",false); 
            },2000);
        });
        $(document).on('click', '.buscarCP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var fechaI=$(this).parents().find('#fechaI')[0].value;
            var fechaF=$(this).parents().find('#fechaF')[0].value;
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var table = $('#table-editable').DataTable();
            var data="";
            if ($('#table-editable').hasClass('cumpleanos_data')) {
                data="tables/reportes/reporte_cumpleanos_data.php?var1="+fechaI+"&var2="+fechaF ;
            }else if ($('#table-editable').hasClass('regalo_data')) {
                data="tables/reportes/reporte_regalo_data.php?var1="+fechaI+"&var2="+fechaF ;
            }else if ($('#table-editable').hasClass('completo_data')) {
                data="tables/reportes/reporte_completo_data.php?var1="+fechaI+"&var2="+fechaF ;
            }
            table.ajax.url(data).load();
            setTimeout(function(){
                $('.page-spinner-loader').addClass('hide');
                $('.buscarCP').prop("disabled",false); 
            },2000);
        });
        $(document).on('click', '.buscarRP2', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var fechaI=$(this).parents().find('#fechaI')[0].value;
            var fechaF=$(this).parents().find('#fechaF')[0].value;
            var sala=$(this).parents().find('#FCid')[0].value;
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var table = $('#table-editable2').DataTable();
            var data="";
            data="tables/reportes/tab_tickets_sala_data.php?var1="+sala+"&var2="+fechaI+"&var3="+fechaF ;
            table.ajax.url(data).load();
            setTimeout(function(){
                $('.page-spinner-loader').addClass('hide');
                $('.buscarRP2').prop("disabled",false); 
            },2000);
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
        $(document).off('click','.buscarCP');
        $(document).off('click','.buscarRP');
        $(document).off('click','.buscarRP2');
        $(document).off('click','.editar_correoR');
        $(document).off('click','.correoR');
        $(document).off('click','.editar');
        $(document).off('click','.editarTicket');
        $(document).off('click','.editarTotalSala');
        $(document).off('click','.editarG');
        $(document).off('click','.editarA');
        $(document).off('click','.editarR');
        $(document).off('click','.verR');
        $(document).off('click','.editarFuncion');
        $(document).off('click','.editarFuncionTicket');
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
