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

<? TweetsID(); ?> </br> </br>
KOMMENTARER </br>

<? ShowAnswers(); ?>
