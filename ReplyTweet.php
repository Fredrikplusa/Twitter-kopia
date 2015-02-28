<? 
session_start();
require_once 'functions.php';

offlineUser();

$id = getTweetInfo($_GET["tweetID"]);

	if (isset($_GET["tweetID"]) === false) {
    header("Location: replyTweet.php?tweetID=".$id["ID"]."");
    die();
}

?>	

<p><a href="logout.php">Logga ut</a></p>
<p><a href="index.php">Startsida</a></p>
<p><a href="profile.php">Mina sida</a></p>

<? TweetsID(); ?> </br> </br>

KOMMENTERA </br>
<form action="<? $id["ID"]?>" method="POST">

				<textarea maxlength="200" name="TextArea"><?php if(isset($_POST['TextArea'])) {echo $_POST['TextArea'];}?></textarea>

				<input type="submit"  value="SKICKA">

			</form> 
<? ReplyTweet(); ?>

KOMMENTARER </br>

<? ShowAnswers(); ?>
