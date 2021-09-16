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
        .when('/estadistica-bomba', {
            templateUrl: 'tables/estadistica/bomba.php',
            controller: 'dynamicCtrl'
        })
        .when('/estadistica-compresor', {
            templateUrl: 'tables/estadistica/compresor.php',
            controller: 'dynamicCtrl'
        })
        .when('/estadistica-generador', {
            templateUrl: 'tables/estadistica/generador.php',
            controller: 'dynamicCtrl'
        })
        .when('/estadistica-rci', {
            templateUrl: 'tables/estadistica/rci.php',
            controller: 'dynamicCtrl'
        })
        .when('/estadistica-tanque', {
            templateUrl: 'tables/estadistica/tanque.php',
            controller: 'dynamicCtrl'
        })
        //tables historial
        .when('/historial-bomba', {
            templateUrl: 'tables/historial/bomba.php',
            controller: 'dynamicCtrl'
        })
        .when('/historial-compresor', {
            templateUrl: 'tables/historial/compresor.php',
            controller: 'dynamicCtrl'
        })
        .when('/historial-generador', {
            templateUrl: 'tables/historial/generador.php',
            controller: 'dynamicCtrl'
        })
        .when('/historial-rci', {
            templateUrl: 'tables/historial/rci.php',
            controller: 'dynamicCtrl'
        })
        .when('/historial-tanque', {
            templateUrl: 'tables/historial/tanque.php',
            controller: 'dynamicCtrl'
        })
        .when('/historial-alertas', {
            templateUrl: 'tables/historial/alertas.php',
            controller: 'dynamicCtrl'
        })
        .when('/historial-avisos', {
            templateUrl: 'tables/historial/avisos.php',
            controller: 'dynamicCtrl'
        })
        .when('/historial-fallas', {
            templateUrl: 'tables/historial/fallas.php',
            controller: 'dynamicCtrl'
        })
        //otras tablas
        .when('/dinamica', {
            templateUrl: 'tables/dynamic/dynamic.html',
            controller: 'dynamicCtrl1'
        })
        .when('/tables-filter', {
            templateUrl: 'tables/filter/filter.html',
            controller: 'filterCtrl'
        })
        .when('/editable', {
            templateUrl: 'tables/editable/editable.html',
            controller: 'editableCtrl'
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
        .otherwise({
            redirectTo: '/'
        });
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
                    }, 5000);   
                });
            }
        };
    }
])