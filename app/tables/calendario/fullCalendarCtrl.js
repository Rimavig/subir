"use strict";

angular.module('newApp')
  .controller('fullCalendarCtrl', ['$scope', 'pluginsService', function ($scope, pluginsService) {
        $scope.reload = function()
        {
        location.reload(); 
        }
        $scope.$on('$viewContentLoaded', function () {
          function runCalendar() {
              /*  Initialize the calendar  */
              var date = new Date();
              var d = date.getDate();
              var m = date.getMonth();
              var y = date.getFullYear();
              var form = '';
              var cal = ics();
              var today = new Date($.now());
              var calendar = $('#calendar').fullCalendar({
                  slotDuration: '00:30:00', /* If we want to split day time each 15minutes */
                  minTime: '06:00:00',
                  maxTime: '24:00:00',
                  locale: 'es',
                  defaultView: 'month',
                  handleWindowResize: true,
                  height: $(window).height() - 200,
                  header: {
                      left: 'prev,next today myCustomButton myCustomButton2',
                      center: 'title',
                      right: 'month,agendaWeek,agendaDay,listWeek'
                  },
                  customButtons: {
                    myCustomButton: {
                      text: 'Descargar',
                      click: function() {
                        cal.download('Eventos');
                      }
                    },
                    myCustomButton2: {
                        text: 'Imprimir',
                        click: function() {
                            window.print();
                        }
                      }
                  },
                  eventSources: [

                    // your event source
                    {
                      url: 'tables/calendario/data_funciones.php',
                      type: 'POST',
                      data: {
                        custom_param1: 'eventos',
                        custom_param2: 'activos'
                      },
                      error: function() {
                        alert('Error en cargar los eventos');
                      },
                      color: 'yellow',   // a non-ajax option
                      textColor: 'black' // a non-ajax option
                    },
                    {
                    url: 'tables/calendario/data_funcionesO.php',
                    type: 'POST',
                    data: {
                      custom_param1: 'eventos',
                      custom_param2: 'activos'
                    },
                    error: function() {
                      
                    }
                  }
                    // any other sources...
                
                  ],
                  editable: false,
                  droppable: false, // this allows things to be dropped onto the calendar !!!
                  eventLimit: false, // allow "more" link when too many events
                  selectable: true,
                eventRender: function(events, element) {
                    if(events.imageUrl){
                        $(element[0])  //imgプロパティが存在するイベントだけtitleを画像に差し替え
                        .append("<img src='" + events.imageUrl +"' width='50%' height='50%'>");
                        cal.addEvent(events.title, events.imageUrl, events.urlG, events.start, events.end);
                    }
                },
                eventClick: function(events, element) {
                    if(events.urlG){
                        $("<a>").prop({
                            target: "_blank",
                            href: events.urlG
                        })[0].click();
                    }else{
                        $('#categoria').load('./tables/calendario/editar_evento.php',{id:events.id},function() {    
                            $('.page-spinner-loader').addClass('hide');
                            $('#categoria').modal('show'); // abrir
                            $(".datepicker").datetimepicker({locale: 'es'});
                        });    
                    }
                        
                    
                },
                select: function (start, end, allDay) {
                    $('#categoria').load('./tables/calendario/evento.php',{start:start.format(),end:end.format() },function() {    
                        $('.page-spinner-loader').addClass('hide');
                        $('#categoria').modal('show'); // abrir
                        $(".datepicker").datetimepicker({locale: 'es'});
                    });
                    calendar.fullCalendar('unselect');
                }
              });

          }
          runCalendar();
        $(document).on('click', '.crear_categoria', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.page-spinner-loader').removeClass('hide');
            $('#categoria').load('./tables/calendario/crear_categoria.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#categoria').modal('show'); // abrir
            });
                
        });
        $(document).on('click', '.print_calendar', function (e) {
            html2canvas(document.getElementById("calendar")).then(function (canvas) {
            
            //for give white BG
            var context  = canvas.getContext('2d');
            context.save();
            context.globalCompositeOperation = 'destination-over';
            context.fillStyle = "rgb(255, 255, 255)";
            context.fillRect(0, 0, canvas.width, canvas.height);
            context.restore();
            
            var imgData = canvas.toDataURL('image/jpeg',1);
            
            var doc = new jsPDF("p", "mm", "a4");
            doc.addImage(imgData, 'JPEG', 10, 10,180, 297);
            download(doc.output(), "calendar.pdf", "text/pdf");
            
        });
    });
        // Save As Image
        function downloadImage(data, filename = 'untitled.jpeg') {
            var a = document.createElement('a');
            a.href = data;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
        }
        
        //Save As PDF (Using jsPDF)
        function download(strData, strFileName, strMimeType) {
            var D = document,
                A = arguments,
                a = D.createElement("a"),
                d = A[0],
                n = A[1],
                t = A[2] || "text/plain";

            //build download link:
            a.href = "data:" + strMimeType + "," + escape(strData);

            if (window.MSBlobBuilder) {
                var bb = new MSBlobBuilder();
                bb.append(strData);
                return navigator.msSaveBlob(bb, strFileName);
            } /* end if(window.MSBlobBuilder) */

            if ('download' in a) {
                a.setAttribute("download", n);
                a.innerHTML = "downloading...";
                D.body.appendChild(a);
                setTimeout(function() {
                    var e = D.createEvent("MouseEvents");
                    e.initMouseEvent("click", true, false, window, 0, 0, 0, 0, 0, false, false,
                        false, false, 0, null);
                    a.dispatchEvent(e);
                    D.body.removeChild(a);
                }, 66);
                return true;
            } /* end if('download' in a) */

            //do iframe dataURL download:
            var f = D.createElement("iframe");
            D.body.appendChild(f);
            f.src = "data:" + (A[2] ? A[2] : "application/octet-stream") + (window.btoa ? ";base64"
                : "") + "," + (window.btoa ? window.btoa : escape)(strData);
            setTimeout(function() {
                D.body.removeChild(f);
            }, 333);
            return true;
        }     
        $(document).on('click', '.editar_categoria', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).attr("id");
            $('#categoria').load('./tables/calendario/editar_categoria.php',{var1:id},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#categoria').modal('show'); // abrir
            });
                
        });
        $(document).on('click', '.crear_category', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true);
            $('.page-spinner-loader').removeClass('hide');
            var nombre=$(this).parents().find('#nombreC')[0].value;
            var color=$(this).parents().find('#colorC')[0].value;
            var band=true;
            if(nombre.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(band){
                $('#alerta').load('./tables/calendario/alerta.php', {tipo:"crear_category",nombre:nombre,color:color},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            } else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.crear_evento', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true);
            $('.page-spinner-loader').removeClass('hide');
            var nombre=$(this).parents().find('#nombreC')[0].value;
            var color=$(this).parents().find('#colorC')[0].value;
            var fechaI=$(this).parents().find('#fechaI')[0].value;
            var fechaF=$(this).parents().find('#fechaF')[0].value;
            var band=true;
            if(nombre.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(fechaF.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese fecha inicial correcta</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(fechaI.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese fecha final correcta</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(fechaI > fechaF ){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese fechas correctas</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(band){
                $('#alerta').load('./tables/calendario/alerta.php', {tipo:"crear_evento",nombre:nombre,categoria:color,fechaI:fechaI,fechaF:fechaF},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            } else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.editar_evento', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true);
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#eventoE')[0].value;
            var nombre=$(this).parents().find('#nombreC')[0].value;
            var color=$(this).parents().find('#colorC')[0].value;
            var fechaI=$(this).parents().find('#fechaI')[0].value;
            var fechaF=$(this).parents().find('#fechaF')[0].value;
            var band=true;
            if(nombre.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(fechaF.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese fecha inicial correcta</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(fechaI.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese fecha final correcta</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(fechaI > fechaF ){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese fechas correctas</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(band){
                $('#alerta').load('./tables/calendario/alerta.php', {tipo:"editar_evento",id:id,nombre:nombre,categoria:color,fechaI:fechaI,fechaF:fechaF},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            } else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.editar_category', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true);
            $('.page-spinner-loader').removeClass('hide');
            var nombre=$(this).parents().find('#nombreC')[0].value;
            var color=$(this).parents().find('#colorC')[0].value;
            var id=$(this).parents().find('#idCategoriaE')[0].value;
            var band=true;
            if(nombre.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(band){
                $('#alerta').load('./tables/calendario/alerta.php', {tipo:"editar_category",nombre:nombre,color:color,id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            } else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.eliminar_evento', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true);
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#eventoE')[0].value;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/calendario/alerta.php', {tipo:"eliminar_evento",id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }  
        });
      });
      $scope.$on('$destroy', function () {
        let editor = window['CKEDITOR'];
        for(var name in editor.instances)
        {
            if (editor.instances[name]) {
                editor.instances[name].destroy(true);
            }
        } 
        var tables = $.fn.dataTable.fnTables(true);
        $(tables).each(function () {
            $(this).dataTable().fnDestroy();
        });
        $(document).off('click','.crear_categoria');
        $(document).off('click','.editar_categoria');
        $(document).off('click','.crear_category');
        $(document).off('click','.crear_evento');
        $(document).off('click','.editar_evento');
        $(document).off('click','.editar_category');
        $(document).off('click','.eliminar_evento');
      });

  }]);
