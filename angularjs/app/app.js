'use strict';

/**
 * @ngdoc overview
 * @name newappApp
 * @description
 * # newappApp
 *
 * Main module of the application.
 */
var MakeApp = angular
  .module('newApp', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch',
    'ui.bootstrap'
  ])
  .config(function ($routeProvider) {
      $routeProvider
        .when('/', {
            templateUrl: 'dashboard/dashboard.php',
            controller: 'dashboardCtrl'
        })

        .when('/principal', {
            templateUrl: 'dashboard/principal.php',
            controller: 'dashboardCtrl'
        })
        .when('/frontend', {
            templateUrl: 'frontend/frontend.html',
            controller: 'frontendCtrl'
        })
        .when('/charts', {
            templateUrl: 'charts/charts/charts.html',
            controller: 'chartsCtrl'
        })
        .when('/financial-charts', {
            templateUrl: 'charts/financialCharts/financialCharts.html',
            controller: 'financialChartsCtrl'
        })
        .when('/ui-animations', {
            templateUrl: 'uiElements/animations/animations.html',
            controller: 'animationsCtrl'
        })
        .when('/ui-buttons', {
            templateUrl: 'uiElements/Buttons/buttons.html',
            controller: 'buttonsCtrl'
        })
        .when('/ui-components', {
            templateUrl: 'uiElements/components/components.html',
            controller: 'componentsCtrl'
        })
        .when('/ui-helperClasses', {
            templateUrl: 'uiElements/helperClasses/helperClasses.html',
            controller: 'helperClassesCtrl'
        })
        .when('/ui-icons', {
            templateUrl: 'uiElements/icons/icons.html',
            controller: 'iconsCtrl'
        })
        .when('/ui-modals', {
            templateUrl: 'uiElements/modals/modals.html',
            controller: 'modalsCtrl'
        })
        .when('/ui-nestableList', {
            templateUrl: 'uiElements/nestableList/nestableList.html',
            controller: 'nestableListCtrl'
        })
        .when('/ui-notifications', {
            templateUrl: 'uiElements/notifications/notifications.html',
            controller: 'notificationsCtrl'
        })
        .when('/ui-portlets', {
            templateUrl: 'uiElements/portlets/portlets.html',
            controller: 'portletsCtrl'
        })
        .when('/ui-tabs', {
            templateUrl: 'uiElements/Tabs/tabs.html',
            controller: 'tabsCtrl'
        })
        .when('/ui-treeView', {
            templateUrl: 'uiElements/treeView/treeView.html',
            controller: 'treeViewCtrl'
        })
        .when('/ui-typography', {
            templateUrl: 'uiElements/typography/typography.html',
            controller: 'typographyCtrl'
        })
        
          .when('/forms-elements', {
              templateUrl: 'forms/elements/elements.html',
              controller: 'elementsCtrl'
          })
             .when('/forms-validation', {
                 templateUrl: 'forms/validation/validation.html',
                 controller: 'elementsCtrl'
             })
            .when('/forms-plugins', {
                templateUrl: 'forms/plugins/plugins.html',
                controller: 'pluginsCtrl'
            })
          .when('/forms-wizard', {
              templateUrl: 'forms/wizard/wizard.html',
              controller: 'wizardCtrl'
          })
          .when('/forms-sliders', {
              templateUrl: 'forms/sliders/sliders.php',
              controller: 'slidersCtrl'
          })
          .when('/forms-sliders1', {
            templateUrl: 'forms/sliders/sliders.php',
            controller: 'slidersCtrl'
        })
          .when('/forms-editors', {
              templateUrl: 'forms/editors/editors.html',
              controller: 'editorsCtrl'
          })
            .when('/forms-input-masks', {
                templateUrl: 'forms/inputMasks/inputMasks.html',
                controller: 'inputMasksCtrl'
            })

           //medias
        .when('/medias-croping', {
            templateUrl: 'medias/croping/croping.html',
            controller: 'cropingCtrl'
        })
        .when('/medias-hover', {
            templateUrl: 'medias/hover/hover.html',
            controller: 'hoverCtrl'
        })
        .when('/medias-sortable', {
            templateUrl: 'medias/sortable/sortable.html',
            controller: 'sortableCtrl'
        })
          //pages
        .when('/pages-blank', {
            templateUrl: 'pages/blank/blank.html',
            controller: 'blankCtrl'
        })
        .when('/pages-contact', {
            templateUrl: 'pages/contact/contact.html',
            controller: 'contactCtrl'
        })
        .when('/pages-timeline', {
            templateUrl: 'pages/timeline/timeline.html',
            controller: 'timelineCtrl'
        })
            
          //extra
        .when('/extra-fullCalendar', {
            templateUrl: 'extra/fullCalendar/fullCalendar.html',
            controller: 'fullCalendarCtrl'
        })
        .when('/extra-google', {
            templateUrl: 'extra/google/google.html',
            controller: 'googleCtrl'
        })
        .when('/extra-slider', {
            templateUrl: 'extra/slider/slider.html',
            controller: 'sliderCtrl'
        })
        .when('/extra-vector', {
            templateUrl: 'extra/vector/vector.html',
            controller: 'vectorCtrl'
        })
        .when('/extra-widgets', {
            templateUrl: 'extra/widgets/widgets.html',
            controller: 'widgetsCtrl'
        })
          //tables estadistica
        
        //otras tablas
        .when('/dinamica', {
            templateUrl: 'tables/dynamic/dynamic.html',
            controller: 'dynamicCtrl1'
        })
        .when('/tables-filter', {
            templateUrl: 'tables/filter/filter.html',
            controller: 'filterCtrl'
        })
        //usuarios
        .when('/perfiles', {
            templateUrl: 'tables/usuarios/perfiles.php',
            controller: 'permisosCtrl'
        })

        .when('/usuarios', {
            templateUrl: 'tables/usuarios/usuarios.php',
            controller: 'usuariosCtrl'
        })

        .when('/usuarios-clientes', {
            templateUrl: 'tables/usuarios/usuarios-clientes.php',
            controller: 'usuariosCtrl'
        })
        .when('/usuarios-eventos', {
            templateUrl: 'tables/usuarios/usuarios-eventos.php',
            controller: 'usuariosCtrl'
        })
        //mantenimiento
         .when('/categoria', {
            
            templateUrl: 'tables/mantenimiento/categoria.php',
            controller: 'mantenimientoCtrl',
            reloadOnSearch: false
        })
        .when('/clasificacion', {
            templateUrl: 'tables/mantenimiento/clasificacion.php',
            controller: 'mantenimientoCtrl'
        })
        .when('/espectaculo', {
            templateUrl: 'tables/mantenimiento/espectaculo.php',
            controller: 'mantenimientoCtrl'
        })
        .when('/procedencia', {
            templateUrl: 'tables/mantenimiento/procedencia.php',
            controller: 'mantenimientoCtrl'
        })
        .when('/productora', {
            templateUrl: 'tables/mantenimiento/productora.php',
            controller: 'mantenimientoCtrl'
        })
        .when('/sala', {
            templateUrl: 'tables/mantenimiento/sala.php',
            controller: 'mantenimientoCtrl'
        })
        .when('/tipo-evento', {
            templateUrl: 'tables/mantenimiento/Tevento.php',
            controller: 'mantenimientoCtrl'
        })
        .when('/promocion', {
            templateUrl: 'tables/mantenimiento/promocion.php',
            controller: 'mantenimientoCtrl'
        })
        .when('/distribucion-principal', {
            templateUrl: 'tables/mantenimiento/mapa_principal.php',
            controller: 'mantenimientoCtrl'
        })
        .when('/distribucion-exterior', {
            templateUrl: 'tables/mantenimiento/mapa.php',
            controller: 'mantenimientoCtrl'
        })
        .when('/distribucion-editar', {
            templateUrl: 'tables/mantenimiento/mapa_principal_editar.php',
            controller: 'mantenimientoCtrl'
        })
        .when('/distribucion-crear', {
            templateUrl: 'tables/mantenimiento/mapa_principal_crear.php',
            controller: 'mantenimientoCtrl'
        })
        //imagenes
        .when('/imagen_sala', {
            templateUrl: 'tables/imagenes/imagen_sala.php',
            controller: 'imagenesCtrl'
        })
        .when('/imagen_distribucion', {
            templateUrl: 'tables/imagenes/imagen_distribucion.php',
            controller: 'imagenesCtrl'
        })
        .when('/imagen_banner', {
            templateUrl: 'tables/imagenes/imagen_banner.php',
            controller: 'imagenesCtrl'
        })
        .when('/imagen_logo', {
            templateUrl: 'tables/imagenes/imagen_logo.php',
            controller: 'imagenesCtrl'
        })
        
         //Eventos
         .when('/evento-destacado', {
            templateUrl: 'tables/evento/evento-destacado.php',
            controller: 'eventoCtrl'
        })
         .when('/evento-venta', {
            templateUrl: 'tables/evento/evento-venta.php',
            controller: 'eventoCtrl'
        })

        .when('/evento-eliminar', {
            templateUrl: 'tables/evento/bloqueados.php',
            controller: 'eventoCtrl'
        })

        .when('/evento-gratuito', {
            templateUrl: 'tables/evento/evento-gratuito.php',
            controller: 'eventoCtrl'
        })

        .when('/evento-informativo', {
            templateUrl: 'tables/evento/evento-informativo.php',
            controller: 'eventoCtrl'
        })

         //Procesos
         .when('/distribucion', {
            templateUrl: 'tables/procesos/bloqueos.php',
            controller: 'bloqueosCtrl'
        })
        .when('/cortesia', {
            templateUrl: 'tables/procesos/cortesia.php',
            controller: 'bloqueosCtrl'
        })
        .when('/promociones', {
            templateUrl: 'tables/procesos/evento.php',
            controller: 'promocionesCtrl'
        })
        .when('/promociones-general', {
            templateUrl: 'tables/procesos/promociones-general.php',
            controller: 'promocionesCtrl'
        })
        .when('/amigos', {
            templateUrl: 'tables/procesos/amigos.php',
            controller: 'procesosCtrl'
        })
        .when('/contactos', {
            templateUrl: 'tables/procesos/contacto.php',
            controller: 'procesosCtrl'
        })
        .when('/fundacion', {
            templateUrl: 'tables/procesos/fundacion.php',
            controller: 'procesosCtrl'
        })
        .when('/otras-promo', {
            templateUrl: 'tables/procesos/ganancia.php',
            controller: 'procesosCtrl'
        })
        //reportes 
        .when('/reporte-eventos', {
            templateUrl: 'tables/reportes/reporte.php',
            controller: 'reportesCtrl'
        })
        .when('/reporte-eventos-venta', {
            templateUrl: 'tables/reportes/evento-venta.php',
            controller: 'reportesCtrl'
        })
        .when('/reporte-eventos-gratuito', {
            templateUrl: 'tables/reportes/evento-gratuito.php',
            controller: 'reportesCtrl'
        })
        .when('/reporte-amigos-teatro', {
            templateUrl: 'tables/reportes/usuarios-clientes.php',
            controller: 'reportesCtrl'
        })
        .when('/reporte-paymentez', {
            templateUrl: 'tables/reportes/reporte_paymentez.php',
            controller: 'reportesCtrl'
        })
        .when('/reporte-pagos', {
            templateUrl: 'tables/reportes/reporte_pagos.php',
            controller: 'reportesCtrl'
        })
        //correos 
        .when('/correo-reinicio', {
            templateUrl: 'tables/correos/reinicio.php',
            controller: 'correosCtrl'
        })
        .when('/correo-bienvenido', {
            templateUrl: 'tables/correos/bienvenido.php',
            controller: 'correosCtrl'
        })
        .when('/correo-compra', {
            templateUrl: 'tables/correos/compra.php',
            controller: 'correosCtrl'
        })
        .when('/correo-donacion', {
            templateUrl: 'tables/correos/donacion.php',
            controller: 'correosCtrl'
        })
        .when('/correo-cumpleanos', {
            templateUrl: 'tables/correos/cumpleanos.php',
            controller: 'correosCtrl'
        })
        .when('/correo-regalo', {
            templateUrl: 'tables/correos/regalo.php',
            controller: 'correosCtrl'
        })
        .when('/correo-cortesia', {
            templateUrl: 'tables/correos/cortesia.php',
            controller: 'correosCtrl'
        })
        .when('/correo-eliminar', {
            templateUrl: 'tables/correos/eliminar.php',
            controller: 'correosCtrl'
        })
        .when('/correo-gratuito', {
            templateUrl: 'tables/correos/gratuito.php',
            controller: 'correosCtrl'
        })
        .when('/correo-admin', {
            templateUrl: 'tables/correos/otros.php',
            controller: 'correosCtrl'
        })
        //WEB 
        .when('/quienes_somos', {
            templateUrl: 'tables/web/teatro.php',
            controller: 'webCtrl'
        })
        .when('/alquiler', {
            templateUrl: 'tables/web/alquiler.php',
            controller: 'webCtrl'
        })
        .when('/fundacion_sanchez', {
            templateUrl: 'tables/web/fundacion.php',
            controller: 'webCtrl'
        })
        .when('/otras_web', {
            templateUrl: 'tables/web/otras.php',
            controller: 'webCtrl'
        })
        .when('/imagenes_web', {
            templateUrl: 'tables/web/imagenes.php',
            controller: 'webCtrl'
        })
        .when('/imagenes_webO', {
            templateUrl: 'tables/web/otras_imagenes.php',
            controller: 'webCtrl'
        })
        .when('/informacionAdicional', {
            templateUrl: 'tables/web/informacion.php',
            controller: 'webCtrl'
        })
        .when('/publicidadWeb', {
            templateUrl: 'tables/web/publicidad.php',
            controller: 'webCtrl'
        })
        .when('/cafe-vino', {
            templateUrl: 'tables/web/cafe.php',
            controller: 'webCtrl'
        })
        .when('/bannerPrincipal', {
            templateUrl: 'tables/web/principal.php',
            controller: 'webCtrl'
        })
        .when('/contactanos', {
            templateUrl: 'tables/web/contactanos.php',
            controller: 'webCtrl'
        })
        //Facturacion
        .when('/caja', {
            templateUrl: 'tables/facturacion/caja.php',
            controller: 'facturacionCtrl'
        })
        .when('/caja-venta', {
            templateUrl: 'tables/facturacion/caja-venta.php',
            controller: 'facturacionCtrl'
        })
        .when('/reportes-caja', {
            templateUrl: 'tables/facturacion/caja_taquilla.php',
            controller: 'facturacionCtrl'
        })
        .when('/reportes-venta', {
            templateUrl: 'tables/facturacion/reportes_venta.php',
            controller: 'facturacionCtrl'
        })
        .when('/reportes-cierres', {
            templateUrl: 'tables/facturacion/reportes-cierres.php',
            controller: 'facturacionCtrl'
        })
        .when('/generarxml', {
            templateUrl: 'tables/facturacion/generarxml.php',
            controller: 'facturacionCtrl'
        })
          //user
        .when('/user-profile', {
            templateUrl: 'user/profile/profile.html',
            controller: 'profileCtrl'
        })
        .when('/user-sessionTimeout', {
            templateUrl: 'user/sessionTimeout/sessionTimeout.html',
            controller: 'sessionTimeoutCtrl'
        })
          //layout
        .when('/layout-api', {
            templateUrl: 'layout/api.html',
            controller: 'apiCtrl'
        })
  });


// Route State Load Spinner(used on page or content load)
MakeApp.directive('ngSpinnerLoader', ['$rootScope',
    function($rootScope) {
        return {
            link: function(scope, element, attrs) {
                // by defult hide the spinner bar
                element.addClass('hide'); // hide spinner bar by default
                // display the spinner bar whenever the route changes(the content part started loading)
                $rootScope.$on('$routeChangeStart', function() {
                    element.removeClass('hide'); // show spinner bar
                });
                $rootScope.$on('$routeUpdate', function() {
                    setTimeout(function(){
                        element.addClass('hide'); // hide spinner bar
                    },500);
                    $("html, body").animate({
                        scrollTop: 0
                    }, 100);  
                });
                // hide the spinner bar on rounte change success(after the content loaded)
                $rootScope.$on('$routeChangeSuccess', function() {
                    setTimeout(function(){
                        element.addClass('hide'); // hide spinner bar
                    },500);
                    $("html, body").animate({
                        scrollTop: 0
                    }, 100);   
                });
                
            }
        };
    }
])