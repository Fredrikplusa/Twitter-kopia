<?php 
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>OH#LOOK</title>
    
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    
    <!-- Ajax -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <!-- Script -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/loginValidation.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/hideInlog.js"></script>
  </head>

	<nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
              <a href="http://localhost:8888/twitter-kopia/startPage.php"><img class="navbar-brandIMG" alt="Brand" src="img/icon.png" height="60" width="200" /></a>
            <a class="navbar-brand" href="#"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav navbar-right">
            <button type="button" class="btn btn-info btn-sm navbar-btn" onclick="window.location.href='startPage.php'">Back to homepage!</button>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
  </nav>
 



  <div class="container background">
    <div class="row">
      <div class="col-md-4 MemberForm">
        <form action="newMember.php" method="POST">
          <h2 class="signupTitel">Sign up!</h2>
          
          <div class="form-group">

           <div class="form-group3">
            <label class="newMemberLable" for="Psw">Användarnamn:</label>
            <input type="text" class="form-control" name="UserName"  placeholder="LISAcool!" value="" /><br>
          </div>

            <label  class="newMemberLable" for="Namn">Namn:</label>
            <input type="text" class="form-control" name="FirstName" placeholder="Lisa" value="<?php echo isset($_POST['FirstName']) ? $_POST['FirstName'] : '' ?>" /><br>
          </div>
          
          <div class="form-group">
            <label class="newMemberLable" for="Efternamn">Efternamn:</label>
            <input type="text" class="form-control" name="LastName" placeholder="Andersson" value="<?php echo isset($_POST['LastName']) ? $_POST['LastName'] : '' ?>" /><br>
          </div>
          
          <div class="form-group">
            <label class="newMemberLable" for="Email">Email:</label>
            <input type="text" class="form-control" name="Email" placeholder="name.lastname@host.com" value="" /><br>
     	    </div>

          <div class="form-group3">
            <label class="newMemberLable" for="Psw">Lösenord:</label>
            <input type="password" class="form-control" name="PassWord"  placeholder="*****" value="" /><br>
          </div>
         
          <button name ="addNewMember" type="submit" class="btn btn-block btn-sm navbar-btn addNewMemberButton">Bli medlem</button>
        </form>      
      </div>
    </div>
  </div>

	<?php NewMember(); ?>

  </body>
</html>



			
		
			
 				