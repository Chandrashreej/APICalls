var app = angular.module('login_register_app', []);
app.controller('login_register_controller', function($scope, $http){
 $scope.closeMsg = function(){
  $scope.alertMsg = false;
 };

 $scope.login_form = true;

 $scope.showRegister = function(){
  $scope.login_form = false;
  $scope.register_form = true;
  $scope.alertMsg = false;
 };

 $scope.showLogin = function(){
  $scope.register_form = false;
  $scope.login_form = true;
  $scope.alertMsg = false;
 };

 $scope.submitRegister = function(){
  $http({
   method:"POST",
   url:"http://localhost/codeigniter/signup",
   data:$scope.registerData
  }).success(function(data){
     // debugger;
   $scope.alertMsg = true;
   if(data.error != '')
   {
    $scope.alertClass = 'alert-danger';
    $scope.alertMessage = data.error;
   }
   else
   {
    $scope.alertClass = 'alert-success';
    $scope.alertMessage = data.message;
    $scope.registerData = {};
   }
  });
 };

  $scope.submitLogin = function(){


      var GetAll = new Object();  
        GetAll.email = $scope.loginData.email
        GetAll.password = $scope.loginData.password
        $http({  
              url: "http://localhost/codeigniter/signin",
            dataType: 'json',  
            method: 'POST',  
            data: GetAll,  
            headers: {  
                "Content-Type": "application/x-www-form-urlencoded"  
            }  
         }).success(function (data) {  
          console.log(data);
          if(data.error != '')
            {
              $scope.alertMsg = true;
              $scope.alertClass = 'alert-danger';
              $scope.alertMessage = data.error;
            }
            else
            {
              location.reload();
            }
         })  
           .error(function (error) {  

           }); 
  };

});