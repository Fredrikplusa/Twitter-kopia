<?php

session_start();
require_once 'functions.php';

offlineUser();

if(isset($_FILES["upload"]))

{
	$file  = $_FILES["upload"]["tmp_name"];
	$name  = $_FILES["upload"]["name"];
	$error = $_FILES["upload"]["error"];


	if ($error == 0)
	{
		move_uploaded_file($file, "uploads/$name");
		print "Okey?";
	}

}

?>
<meta charset="utf-8">

<a href="profile.php">PROFIL <-- </a>

 <div class="container background">
    <div class="row">
      <div class="col-md-4 MemberForm">
        <form action="preferences.php" method="POST">
          <h2 class="signupTitel">Ändra dina inställningar</h2>
          
          <div class="form-group">
            <label  class="newMemberLable" for="Namn">Namn:</label>
            <input type="text" class="form-control" name="FirstName" placeholder="Lisa" value="<?= $_SESSION['user']['firstName'] ?>"/><br>
          </div>
          
          <div class="form-group">
            <label class="newMemberLable" for="Efternamn">Efternamn:</label>
            <input type="text" class="form-control" name="LastName" placeholder="Andersson" value="<?= $_SESSION['user']['lastName'] ?>" /><br>
          </div>

           <div class="form-group">
            <label  class="newMemberLable" for="Namn">Användarnamn:</label>
            <input type="text" class="form-control" name="Username" placeholder="Lisa12" value="<?= $_SESSION['user']['Username'] ?>"/><br>
          </div>
          
          <div class="form-group">
            <label class="newMemberLable" for="Email">Email:</label>
            <input type="text" class="form-control" name="Email" placeholder="name.lastname@host.com" value="<?= $_SESSION['user']['email'] ?>" /><br>
     	    </div>

          <div class="form-group3">
            <label class="newMemberLable" for="Psw">Lösenord:</label>
            <input type="password" class="form-control" name="PassWord"  placeholder="*****" value="<?= $_SESSION['user']['passWord'] ?>" /><br>
          </div>
         
          <button name ="saveChangesbutton" type="submit" class="">Spara ändringar</button>
        </form>      
      </div>
    </div>
  </div>
  <?php saveChanges(); ?>


<form action="upload.php" method="post" enctype="multipart/form-data">
    <img src="<?=$_SESSION['user']['ProfilePicture']?>" name="ProfilPIC" height="200" width="200"/>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>





</body>
</html>



	