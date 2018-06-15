angular.module('Ingresoft').config(['$stateProvider', '$urlRouterProvider', '$locationProvider', '$httpProvider',
  function ($stateProvider, $urlRouterProvider, $locationProvider, $httpProvider) {
    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
    $httpProvider.defaults.headers.put['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
    $httpProvider.defaults.headers.delete = {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'};
    $locationProvider.hashPrefix('');
    $urlRouterProvider.otherwise('/');
    $stateProvider
    .state('login', {
      url: '/',
      templateUrl: 'app/templates/login.html',
      controller: 'loginController',
      resolve: {
        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
            return $ocLazyLoad.load([
              {
                serie:true,
                files: [
                  'css/login.css',
                  'app/controller/controller.login.js'
                ]
              }
            ]);
          }]
      }
    })
    .state('vigilante', {
      url: '/inicio',
      templateUrl: 'app/templates/vigilante.php',
      controller: 'vigilanteController',
      resolve: {
        deps: ['$ocLazyLoad', function ($ocLazyLoad) {
            return $ocLazyLoad.load([
              {
                serie:true,
                files: [
                  'css/vigilante.css',
                  'app/controller/controller.vigilante.js'
                ]
              }
            ]);
          }]
      }
    });
  }]);
