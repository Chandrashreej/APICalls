
<?php
//to start the session
session_start();

?>
<!DOCTYPE html>

<html>

 <head>

  <title>Simple Login and Register</title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>

  <script src = "login.js"></script>
  
  <style>

  .form_style
  {

   width: 500px;

   margin: 0 auto;

  }
  </style>

 </head>

 <body>

  <br />

   <h3 align="center">Simple Login and Register</h3>

  <br />

  <div ng-app="login_register_app" ng-controller="login_register_controller" class="container form_style">

   <?php
  //if the name is set in session
   if(!isset($_SESSION["name"]))
   {
   ?>
   <div class="alert {{alertClass}} alert-dismissible" ng-show="alertMsg">
    <a href="#" class="close" ng-click="closeMsg()" aria-label="close">&times;</a>
    {{alertMessage}}
   </div>

   <div class="panel panel-default" ng-show="login_form">
      <div class="panel-heading">
      <h3 class="panel-title" align="center">Login_Page</h3>
      </div>
      <div class="panel-body">
      <form method="post" ng-submit="submitLogin()">
        <div class="form-group">
        <label>Enter Your Email</label>
        <input type="text" name="email" ng-model="loginData.email" class="form-control" />
        </div>
        <div class="form-group">
        <label>Enter Your Password</label>
        <input type="password" name="password" ng-model="loginData.password" class="form-control" />
        </div>
        <div class="form-group" align="center">
        <input type="submit" name="login" class="btn btn-primary" value="Login" />
        <br />
        <input type="button" name="register_link" class="btn btn-primary btn-link" ng-click="showRegister()" value="Register" />
        </div>
      </form>
      </div>
   </div>

   <div class="panel panel-default" ng-show="register_form">
    <div class="panel-heading">
     <h3 class="panel-title" align="center">Register_Page</h3>
    </div>
    <div class="panel-body">
     <form method="post" ng-submit="submitRegister()">
      <div class="form-group">
       <label>Enter Your Name</label>
       <input type="text" name="name" ng-model="registerData.name" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Email</label>
       <input type="text" name="email" ng-model="registerData.email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Password</label>
       <input type="password" name="password" ng-model="registerData.password" class="form-control" />
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="register" class="btn btn-primary" value="Register" />
       <br />
       <input type="button" name="login_link" class="btn btn-primary btn-link" ng-click="showLogin()" value="Login" />
      </div>
     </form>
    </div>
   </div>
   <?php
   }
   else
   {
   ?>
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Welcome to Page, You have been Loggedin</h3>
    </div>
    <div class="panel-body">
     <h1>Welcome - <?php echo $_SESSION["name"];?></h1>
     <a href="http://localhost/codeigniter/logoff">Logout</a>
    </div>
   </div>
   <?php
   }
   ?>

  </div>
 </body>
</html>

