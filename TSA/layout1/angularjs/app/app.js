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
        .when('/usuarios', {
            templateUrl: 'usuarios/usuarios.php',
            controller: 'usuariosCtrl'
        })
        .when('/usuarios-visitantes', {
            templateUrl: 'usuarios/usuarios-visitantes.php',
            controller: 'usuariosCtrl'
        })
        .when('/aprobacion-usuario', {
            templateUrl: 'usuarios/aprobacion-usuario.php',
            controller: 'usuariosCtrl'
        })
        .when('/ingreso-usuarios', {
            templateUrl: 'reportes/ingreso-usuarios.php',
            controller: 'reportesCtrl'
        })
        .when('/invitaciones-normales', {
            templateUrl: 'reportes/invitacion-normal.php',
            controller: 'reportesCtrl'
        })
        .when('/invitaciones-recurrentes', {
            templateUrl: 'reportes/invitacion-recurrente.php',
            controller: 'reportesCtrl'
        })
        .when('/visitantes-recurrentes', {
            templateUrl: 'reportes/ingreso-visitantes.php',
            controller: 'reportesCtrl'
        })
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