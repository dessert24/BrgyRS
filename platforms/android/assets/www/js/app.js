// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', ['ionic'])

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

   .state('main', {
      url: '/main',
      templateUrl: 'templates/main.html'
    })

    .state('signin', {
      url: '/sign-in',
      templateUrl: 'templates/sign-in.html',
      controller: 'SignInCtrl'
    })

    .state('forgotpassword', {
      url: '/forgot-password',
      templateUrl: 'templates/forgot-password.html'
    })

     // .state('signup', {
      // url: '/signup',
      // templateUrl: 'templates/sign-up.html',
      // controller: 'SignUpCtrl'
    // })
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
          controller: 'HomeTabCtrl'
        }
      }
    })
    .state('tabs.facts', {
      url: '/facts',
      views: {
        'home-tab': {
          templateUrl: 'templates/facts.html',
          controller: 'PopupCtrl'
        }
      }
    })
    .state('tabs.facts2', {
      url: '/facts2',
      views: {
        'home-tab': {
          templateUrl: 'templates/facts2.html',
          controller: 'facts2'
        }
      }
    })
    .state('tabs.facts3', {
      url: '/facts3',
      views: {
        'home-tab': {
          templateUrl: 'templates/facts3.html',
          controller: 'facts3'
        }
      }
    })
    .state('tabs.facts4', {
      url: '/facts4',
      views: {
        'home-tab': {
          templateUrl: 'templates/facts4.html',
          controller: 'facts4'
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


   $urlRouterProvider.otherwise('/main');

})

.controller('SignInCtrl', function($scope, $state) {
  
  $scope.signIn = function(user) {
    console.log('Sign-In', user);
    $state.go('tabs.home');
  };
  
})

.controller('HomeTabCtrl', function($scope) {
  console.log('HomeTabCtrl');
})


.controller('PopupCtrl',function($scope, $ionicPopup, $timeout) {

   $scope.showAlert = function() {
     var alertPopup = $ionicPopup.alert({
       title: 'Submit',
       template: 'Registration save'
     });
    
   };
})

.controller('facts2',function($scope, $ionicPopup, $timeout) {

   $scope.facts2Alert = function() {
     var alertPopup = $ionicPopup.alert({
       title: 'Submit',
       template: 'Registration save'
     });
    
   };
})


.controller('facts3',function($scope, $ionicPopup, $timeout) {

   $scope.facts3Alert = function() {
     var alertPopup = $ionicPopup.alert({
       title: 'Submit',
       template: 'Registration save'
     });
    
   };
})

.controller('facts4',function($scope, $ionicPopup, $timeout) {

   $scope.facts4Alert = function() {
     var alertPopup = $ionicPopup.alert({
       title: 'Submit',
       template: 'Registration save'
     });
    
   };
})