var starter = angular.module('starter.controllers', [])

starter.controller('SignInCtrl', function ($scope, $rootScope, $state, $location, $http, $ionicPopup, Data) {
    $scope.login = {};
    $scope.doLogin = function (customer) {
        Data.post('login', {
            customer: customer
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {

               var alertPopup = $ionicPopup.alert({
     title: 'Barangay Registration',
     template: 'Welcome',
     
    });
                $state.go('tabs.home');
            }
        });
    };

  

});





starter.controller('SignUpCtrl', function ($scope, $state, $ionicPopup, $timeout, $rootScope, $stateParams, $location, $http, Data) {
    $scope.signup = {};

  $scope.signup = {name:'', email:'',password:''};

    $scope.signUp = function (customer) {
        Data.post('signUp', {
            customer: customer
        }).then(function (results) {
            Data.toast(results);
            
            if (results.status == "success") {
            $state.go('tabs.home');

                var alertPopup = $ionicPopup.alert({
      title: 'Register',
      template: 'Account Created',
     
   });
                   
            }
        });
    };


});

// .controller('HomeTabCtrl', function($scope) {
  // console.log('HomeTabCtrl');
// })


starter.controller('PopupCtrl',function($scope, $ionicPopup, $timeout, $http, $state) {

 $scope.todos = [];
  $scope.form_barangay_clearance = {};
  
  $http.get('http://localhost/BRS/www/myApi/todos').then(function(response) { console.log(response); $scope.todos = response.data;}, function(response) { console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });

   $scope.barangay_clearance_add = function(){
    if($scope.form_barangay_clearance.id){
      $scope.form_barangay_clearance = {};
    }
    else{
      $http.post('http://localhost/BRS/www/myApi/todos', $scope.form_barangay_clearance).
        then(function(response) {
          console.log(response);
          $scope.form_barangay_clearance.id = response.data.id;
          $scope.todos.push($scope.form_barangay_clearance);
          $scope.form_barangay_clearance = {};
        }, function(response) {
          console.log(response);

// POP-UP**********************
           var alertPopup = $ionicPopup.alert({
       title: 'Submit',
       template: 'Registration save'
     });
// ****************************
           $state.go('signin');
        });
      
      
    }


  }



   

});

// Barangay Business Clearance
starter.controller('business_clearance',function($scope, $ionicPopup, $timeout, $http, $state) {

   
  $scope.todos = [];
  $scope.formData = {};
  
  $http.get('http://localhost/BRS/www/myApi/todos').then(function(response) { console.log(response); $scope.todos = response.data;}, function(response) { console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });

   $scope.addTask = function(){
    if($scope.formData.id){
      $scope.formData = {};
    }
    else{
      $http.post('http://localhost/BRS/www/myApi/todos', $scope.formData).
        then(function(response) {
          console.log(response);
          $scope.formData.id = response.data.id;
          $scope.todos.push($scope.formData);
          $scope.formData = {};
        }, function(response) {
          console.log(response);

// POP-UP**********************
           var alertPopup = $ionicPopup.alert({
       title: 'Submit',
       template: 'Registration save'
     });
// ****************************
           $state.go('signin');
        });
      
      
    }


  }

});


starter.controller('brgy_permit',function($scope, $ionicPopup, $timeout) {

   $scope.facts3Alert = function() {
     var alertPopup = $ionicPopup.alert({
       title: 'Submit',
       template: 'Registration save'
     });
    
   };
});

starter.controller('complaints',function($scope, $ionicPopup, $timeout) {

   $scope.facts4Alert = function() {
     var alertPopup = $ionicPopup.alert({
       title: 'Submit',
       template: 'Complaint save'
     });
    
   };
});

