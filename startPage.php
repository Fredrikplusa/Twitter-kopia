<?php
session_start(); 

require_once 'functions.php';


lookForMessage();

alredyOnline();



?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>OH#LOOK</title>
    
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <!-- Ajax -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <!-- Script -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="js/sendtonewpage.js"></script>
    <script src="js/loginValidation.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/hideInlog.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href=""><img class="navbar-brandIMG" alt="Brand" src="img/icon.png" height="60" width="200" /></a>
            <a class="navbar-brand" href="#"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <button type="button" class="btn btn-info btn-sm navbar-btn" id="newMemberButton" onclick="window.location.href='newMember.php'">Share your stories!</button>
            <button type="button" class="btn btn-info btn-sm navbar-btn" id='hideInlog' value="hide/show">Sign In!</button>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div id="LoginForm">
       <form role="form" action="login.php" method="post" name="loginform"> 
        
        <div class="row">
          <div class="col-md-12">
            <h3 class="loggainTitel">Logga in</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3 col-xs-12">
            <div class="form-group">
              <label class="inloggLable" for="email">E-mail:</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter e-mail address">
            </div>
          </div>
          
          <div class="col-md-3 col-xs-12">
            <div class="form-group2">
              <label class="inloggLable" for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
              <a class="glomtLosenord" href="">glömt ditt lösenord?</a>
            </div>
          </div>
        </div> 

        <div class="row">
          <div class="col-md-2"> 
            <button type="submit" onclick="return validateForm()" class="btn btn-block btn-sm navbar-btn LoginButton">Logga in</button> 
            <a class="bliMedlem" href="newMember.php">Bli medlem här!</a>
          </div>
        </div>    
     
      </form> 
    </div>
              
    <div class="row">
        <div class="col-xs-12"> 
          <img class="headerPIC" src="img/bild7.png"/>
        </div>
    </div>

  </body>
</html>


