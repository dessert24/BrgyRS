// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
var starter = angular.module('starter', ['ionic','starter.controllers','toaster'])

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if(window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });
})


.config(function($stateProvider, $urlRouterProvider) {

  $stateProvider

 .state('signin', {
      url: '/sign-in',
      templateUrl: 'templates/sign-in.html',
      controller: 'SignInCtrl'
    })


   .state('signup', {
      url: '/sign-up',
      templateUrl: 'templates/sign-up.html',
      controller: 'SignUpCtrl'
    })

    .state('Logout', {
      url: '/logout',
      templateUrl: 'templates/sign-in.html',
            })
    

    .state('tabs', {
      url: '/tab',
      abstract: true,
      templateUrl: 'templates/tabs.html'
    })

    .state('tabs.home', {
      url: '/home',
      views: {
        'home-tab': {
          templateUrl: 'templates/home.html',
          // controller: 'HomeTabCtrl'
        }
      }
    })

    .state('tabs.barangay_clearance', {
      url: '/barangay_clearance',
      views: {
        'home-tab': {
          templateUrl: 'templates/barangay_clearance.html',
          controller: 'PopupCtrl'
        }
      }
    })

    .state('tabs.business_clearance', {
      url: '/business_clearance',
      views: {
        'home-tab': {
          templateUrl: 'templates/business_clearance.html',
          controller: 'business_clearance'
        }
      }
    })

    .state('tabs.brgy_permit', {
      url: '/brgy_permit',
      views: {
        'home-tab': {
          templateUrl: 'templates/brgy_permit.html',
          controller: 'brgy_permit'
        }
      }
    })
    .state('tabs.complaints', {
      url: '/complaints',
      views: {
        'home-tab': {
          templateUrl: 'templates/complaints.html',
          controller: 'complaints'
        }
      }
    })
    .state('tabs.about', {
      url: '/about',
      views: {
        'about-tab': {
          templateUrl: 'templates/about.html'
        }
      }
    })
    .state('tabs.navstack', {
      url: '/navstack',
      views: {
        'about-tab': {
          templateUrl: 'templates/nav-stack.html'
        }
      }
    })
    .state('tabs.contact', {
      url: '/contact',
      views: {
        'contact-tab': {
          templateUrl: 'templates/contact.html'
        }
      }
    });


   $urlRouterProvider.otherwise('/sign-in');

})



 
 
// .run(function ($rootScope, $location, Data) {
        // $rootScope.$on("$routeChangeStart", function (event, next, current) {
            // $rootScope.authenticated = false;
            // Data.get('session').then(function (results) {
                // if (results.uid) {
                    // $rootScope.authenticated = true;
                    // $rootScope.uid = results.uid;
                    // $rootScope.username = results.username;
                    // $rootScope.email = results.email;
                // } else {
                    // var nextUrl = next.$$route.originalPath;
                    // if (nextUrl == '/signup' || nextUrl == '/login') {
// 
                    // } else {
                        // $location.path("/login");
                    // }
                // }
            // });
        // });
    // });
