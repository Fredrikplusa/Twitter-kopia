<?php 
	 

require_once 'functions.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8";
  </head>

  <body>

 
    <form action="newMember.php" method="POST">
 				
 			<h2>Bli medlem</h2>
 				
 			 <label for="Namn">Namn:</label><input type="text" name="FirstName" placeholder="Lisa" value="" /><br>
 			 <label for="Efternamn">Efternamn:</label><input type="text" name="LastName" placeholder="Andersson" value="" /><br>
 			 <label for="Email">Email:</label> <input type="text" name="Email" placeholder="name.lastname@host.com" value="" /><br>
 			 <label for="Psw">Lösenord:</label><input type="password" name="PassWord" value="" /><br>
 			
 			
 			<input name ="addNewMember" type="submit"  value="Bli medlem">

	</form> 
	
	<?php NewMember(); ?>
			
 
  </body>
</html>



			
		
			
 				