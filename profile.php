<?php

session_start();
require_once 'functions.php';

offlineUser();

UserPageURL();

$user = getUserInfo($_GET["username"]);
?>

<meta charset="utf-8">
<h1>Välkommen <?= $user['firstName'] ?></h1>
<p><a href="logout.php">Logga ut</a></p>
<p><a href="index.php">Startsida</a></p>
<p><a href="preferences.php">Mina inställningar</a></p>


<img src="<?=$user['ProfilePicture']?>" height="200" width="200"/>
<p><?=$user['firstName'] ." ". $user['lastName']?></p>
<p><?=$user['Username']?></p>

<div class="row">
	<div class="col-6">
		<div id="container"  class="container"><br>
			<h4 class="">Skriv en tweet!</h4>
		
			<form action="<? $user["firstName"]?>" method="POST">
				<textarea maxlength="200" name="TextArea"><?php if(isset($_POST['TextArea'])) {echo $_POST['TextArea'];}?></textarea>

				<input type="submit"  value="SKICKA">

			</form> 
		</div>
	</div>
	<?php newTweet(); ?> 




<div class="col-6">
		<div class="Kommentarer">
			<h2 class="">Mina Tweets</h2>
			
			<?php profileTweets(); ?> 

		</div>
</div>	