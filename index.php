<?php
session_start();
require_once 'functions.php';
offlineUser();

?>
<html>
<meta charset="utf-8">
<p><a href="logout.php">Logga ut</a></p> <p><a href="profile.php">Mina Sidor</a></p></html>

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
	

<? ShowAllTweets();?>
