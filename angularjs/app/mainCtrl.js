angular.module('newApp').controller('mainCtrl',
    ['$scope', 'applicationService', 'quickViewService', 'builderService', 'pluginsService', '$location',
        function ($scope, applicationService, quickViewService, builderService, pluginsService, $location) {
            $(document).ready(function () {
                applicationService.init();
                quickViewService.init();
                builderService.init();
                pluginsService.init();
                Dropzone.autoDiscover = false;

                function sessionTimeout() {
        
                    var $countdown;
        
                    $('body').append('<div class="modal fade" id="session-timeout" tabindex="-1" role="dialog" aria-hidden="true">' +
                    '<div class="modal-dialog">' +
                        '<div class="modal-content">' +
                            '<div class="modal-header bg-primary">' +
                                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>' +
                                '<h4 class="modal-title">Tu sesión se  <strong>bloqueará</strong></h4>' +
                            '</div>' +
                            '<div class="modal-body">' +
                                '<p>La sesión sera bloqueada en <span id="idle-timeout-counter" class="w-700"></span> segundos.</p>' +
                                '<p>Desea tener la sesión abierta?</p>' +
                            '</div>' +
                            '<div class="modal-footer">' +
                            '<button id="idle-timeout-dialog-keepalive" type="button" class="btn btn-primary btn-embossed" data-dismiss="modal">Cancelar</button>'+
                            '</div>' +
                        '</div>' +
                    '</div>' +
                  '</div>');
        
        
                    /* Start the idle timer plugin */
                    $.idleTimeout('#session-timeout', '.modal-content button:last', {
                        idleAfter: 3600, // 5 seconds before a dialog appear (very short for demo purpose)
                        timeout: 30000, // 30 seconds to timeout
                        pollingInterval: 5, // 5 seconds
                        keepAliveURL: '../../../assets/global/plugins/idle-timeout/keepalive.php',
                        serverResponseEquals: 'OK',
                        onTimeout: function () {
                            //if ($location.path() === '/user-sessionTimeout') {//remove this condition to apply timout for all the pages 
                                window.location = "lockscreen.php";
                            //}
                        },
                        onIdle: onIdle,
                        onCountdown: function (counter) {
                            /* We update the counter */
                            if ($countdown)
                                $countdown.html(counter);
                        }
                    });
        
                };
        
                var onIdle = function () {
        
                    $('#session-timeout').modal('show');
                    $countdown = $('#idle-timeout-counter');
        
                    $('#idle-timeout-dialog-keepalive').on('click', function () {
                        $('#session-timeout').modal('hide');
          
                    });
        
                    $('#idle-timeout-dialog-logout').on('click', function () {
                        $('#session-timeout').modal('hide');
                        $.idleTimeout.options.onTimeout.call(this);
                       
                    });
                }
                sessionTimeout();
        
        
                $('body').append('<div class="modal fade" id="session-timeout" tabindex="-1" role="dialog" aria-hidden="true">' +
                                       '<div class="modal-dialog">' +
                                           '<div class="modal-content">' +
                                               '<div class="modal-header bg-primary">' +
                                                   '<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>' +
                                                   '<h4 class="modal-title">Tu sesión se  <strong>bloqueará</strong></h4>' +
                                               '</div>' +
                                               '<div class="modal-body">' +
                                                   '<p>La sesión sera bloqueada en <span id="idle-timeout-counter" class="w-700"></span> segundos.</p>' +
                                                   '<p>Desea tener la sesión abierta?</p>' +
                                               '</div>' +
                                               '<div class="modal-footer">' +
                                               '<button id="idle-timeout-dialog-keepalive" type="button" class="btn btn-primary btn-embossed" data-dismiss="modal">Cancelar</button>'+
                                               '</div>' +
                                           '</div>' +
                                       '</div>' +
                                     '</div>');
            });
            
            $scope.$on('$viewContentLoaded', function () {
                pluginsService.init();
                applicationService.customScroll();
                applicationService.handlePanelAction();
                $('.nav.nav-sidebar .nav-active').removeClass('nav-active active');
                $('.nav.nav-sidebar .active:not(.nav-parent)').closest('.nav-parent').addClass('nav-active active');

                if($location.$$path == '/' || $location.$$path == '/layout-api'){
                    $('.nav.nav-sidebar .nav-parent').removeClass('nav-active active');
                    $('.nav.nav-sidebar .nav-parent .children').removeClass('nav-active active');
                    if ($('body').hasClass('sidebar-collapsed') && !$('body').hasClass('sidebar-hover')) return;
                    if ($('body').hasClass('submenu-hover')) return;
                    $('.nav.nav-sidebar .nav-parent .children').slideUp(200);
                    $('.nav-sidebar .arrow').removeClass('active');
                }
                if($location.$$path == '/'){
                    $('body').addClass('dashboard');
                }
                else{
                    $('body').removeClass('dashboard');
                }

            });

            $scope.isActive = function (viewLocation) {
                return viewLocation === $location.path();
            };
            
            $scope.$on('$destroy', function () {
                $(document).unbind("idle.idleTimer");
                delete onIdle;
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
