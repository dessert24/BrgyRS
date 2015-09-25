angular.module('starter.controllers', [])

.controller('SignInCtrl', function($scope, $state) {
  
  $scope.signIn = function(user) {
    console.log('sign-In', user);
    $state.go('tabs.home');
  };
  
})

.controller('SignUpCtrl', function($scope, $state, $ionicPopup, $timeout) {
  
  $scope.signUp = function(user) {

      var alertPopup = $ionicPopup.alert({
     title: 'Register',
     template: 'Account Created',
     
   });
    $state.go('main');
  };

})

.controller('HomeTabCtrl', function($scope) {
  console.log('HomeTabCtrl');
})


.controller('PopupCtrl',function($scope, $ionicPopup, $timeout) {


$scope.showAlert = function() {
   var alertPopup = $ionicPopup.alert({
     title: 'Register',
     template: 'Save'
   });

 };


   
$scope.preferences = [
    { name: "Male", value: 1},
    { name: "Female", value: 2}
  ];
  
  $scope.model = {};
  $scope.model.prefGender = $scope.preferences[1];
  
   $scope.check = function() {
     $scope.selected = $scope.model.prefGender;
  }
   
     $scope.set = function() {
    $scope.model.prefGender = $scope.preferences[0];
      
  }

})

.controller('facts2',function($scope, $ionicPopup, $timeout) {

   $scope.facts2Alert = function() {
     var alertPopup = $ionicPopup.alert({
       title: 'Submit',
       template: 'Registration save'
     });
    
   };

   $scope.preferences = [
    { name: "Male", value: 1},
    { name: "Female", value: 2}
  ];
  
  $scope.model = {};
  $scope.model.prefGender = $scope.preferences[1];
  
   $scope.check = function() {
     $scope.selected = $scope.model.prefGender;
  }
   
     $scope.set = function() {
    $scope.model.prefGender = $scope.preferences[0];
      
  }

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
       template: 'Complaint save'
     });
    
   };
})
