<?php

ob_start();
require_once 'connection.php';

// ---- CHECK USER -----

//om någon försöker komma åt sidor som endast är tillåtna online
function offlineUser() {

	if (!isset($_SESSION['user'])) {
    $_SESSION['messages'] = array(
        array('status'=>'red', 'text'=>'Du är inte inloggad.'),
    );
    header('Location: startPage.php');
    die;
	}
}

//rättar till länken som skickar den inloggade till sin profilsida
function UserPageURL(){
	
	if (isset($_GET["username"]) === false) {
    header("Location: profile.php?username=".$_SESSION["user"]["firstName"]."");
    die();
	}
}

//om felmeddelande uppstår
function lookForMessage() {
	
	if (isset($_SESSION['messages'])) 
		{
	    	foreach ($_SESSION['messages'] as $msg) {
	        	echo '<p style="color:'.$msg['status'].'">'.$msg['text'].'</p>';
	    	}
	    unset($_SESSION['messages']);

		}
}

//om man redan är inloggad 
function alredyOnline(){
	
	if (isset($_SESSION['email'])) 
	{
    	echo '<p>Du är redan inloggad, gå till din <a href="profile.php">profil</a>.</p>';
    	die;
	}
}

//hämtar information om användaren som används till profilen
function getUserInfo($username){

 $query = "SELECT * FROM Users WHERE firstName = '$username'";
    $result = mysqli_query(getConnection(), $query);

    $row = mysqli_fetch_assoc($result); 
        return $row;

}



// ---- PREFERENCES -----

//för att kunna ändra sina inställnignar
function saveChanges (){
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
				
			$FirstName = filter_var($_POST['FirstName'], FILTER_SANITIZE_SPECIAL_CHARS);
				
			$LastName = filter_var($_POST['LastName'], FILTER_SANITIZE_SPECIAL_CHARS);

			$Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL); 
				
			$PassWord = filter_var($_POST['PassWord'], FILTER_SANITIZE_SPECIAL_CHARS); 

			$Username = filter_var($_POST['Username'], FILTER_SANITIZE_SPECIAL_CHARS); 


		$sql = "UPDATE Users SET firstName='$FirstName', lastName='$LastName', email='$Email', passWord='$PassWord', Username='$Username' WHERE ID='".$_SESSION['user']['ID']."'";

		if (mysqli_query(getConnection(), $sql)) {
    		echo "Record updated successfully";

    		$_SESSION['user']['firstName'] = $FirstName;
    		$_SESSION['user']['lastName'] = $LastName;
    		$_SESSION['user']['email'] = $Email;
    		$_SESSION['user']['passWord'] = $PassWord;
    		$_SESSION['user']['Username'] = $Username;
    		header('Location: preferences.php');
			} 

		else {
    	echo "Error updating record: " . mysqli_error(getConnection());
		}

		mysqli_close(getConnection());

		}
}


// ---- FORMS -----	

//validation för medlemsformet 	
function validateForm($FirstName, $LastName, $Email, $PassWord) {
	$validation = true;

	if ($FirstName == "" || $LastName == "") 
	{	
		echo "<p class='felkod'>Fyll i både Namn och Efternamn!</p>";
		$validation = false;
			
	}	

	if (strlen($PassWord) <= 4) 
	{
		echo "<p class='felkod'>Lösenordet måste vara minst 5 tecken långt!</p>";
		$validation = false;

	}
		
	if ($Email == "") 
	{
		if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) 
		{
			echo "<p class='felkod'>Ej korrekt email!</p>";
			$validation = false;
		}
	}

	return $validation;	
}

//formet för att bli medlem
function NewMember() {
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
				
			$FirstName = filter_var($_POST['FirstName'], FILTER_SANITIZE_SPECIAL_CHARS);
				
			$LastName = filter_var($_POST['LastName'], FILTER_SANITIZE_SPECIAL_CHARS);

			$Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL); 
				
			$PassWord = filter_var($_POST['PassWord'], FILTER_SANITIZE_SPECIAL_CHARS); 

			$UserName = filter_var($_POST['UserName'], FILTER_SANITIZE_SPECIAL_CHARS); 

			
				
					
				if (validateForm($FirstName, $LastName, $Email, $PassWord) == true)
					{

						$query = "SELECT Username FROM Users WHERE Username='$UserName'";
						$doesFieldExist = false;

						$result = mysqli_query(getConnection(), $query);
								
							if ($result && mysqli_num_rows($result) != 0) 
							{
						    	$doesFieldExist = true;
						    	echo "User alredy in database";
							}
								
							else
							{
								$sql = "INSERT INTO Users (firstName, lastName, email, passWord, UserName) VALUES ('$FirstName', '$LastName', '$Email', '$PassWord', '$UserName')";
											
									if (mysqli_query(getConnection(), $sql)) 
										{
											echo "Du är nu medlem hos oss!";
										}		
							}
						


					}	
		}
}

//Kollar så att inloggningsuppgifterna stämmer 
function checkUser($email, $pass) {

    $query = "SELECT * FROM Users WHERE email = '$email' AND passWord = '$pass'";
    $result = mysqli_query(getConnection(), $query);

    $row = mysqli_fetch_assoc($result); 
        return $row;
}



// ---- TWEETS -----

//hämtar information om Tweets 
function getTweetInfo($tweetID){


 $query = "SELECT * FROM Tweets WHERE ID = '$tweetID'";
    $result = mysqli_query(getConnection(), $query);

    $row = mysqli_fetch_assoc($result); 
        return $row;


}


//för att lägga till en ny tweet
function newTweet() {

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
	$TextArea = [];
	$TextArea = filter_var($_POST['TextArea'], FILTER_SANITIZE_SPECIAL_CHARS); 

		$sql = "INSERT INTO Tweets (TextArea, user_id) 
		VALUES ('$TextArea', '{$_SESSION['user']['ID']}')";

	if (mysqli_query(getConnection(), $sql)) 
	{
		echo "<p class='Postat'>Ditt inlägg har postat!</p>";
		$TextArea = $_POST["TextArea"] = null;
		
	}  
	else {
		echo "<p class='Postat'>Något gick fel!</p>";
	}
	}
}	

//Tweets som syns på ens profilsida
function profileTweets() {

	$user = getUserInfo($_GET["username"]);
	$sql = mysqli_query(getConnection(), "SELECT ID, TextArea, user_id FROM Tweets WHERE  user_id='{$user['ID']}' ORDER BY ID DESC");
				
	while ($row = mysqli_fetch_assoc($sql))  
	{
				
  	 	echo "<img src='{$user['ProfilePicture']}' height='50' width='50'/>" . $user['firstName'] . $user['lastName'] . " " . $row['TextArea'] . " " . '<a href="replyTweet.php?tweetID='.$row["ID"].'">Kommentera</a>' . "</br>" ;

		}

		

  	mysqli_close(getConnection()); 

 }

//Hämta ett Tweets ID 
function TweetsID() {

	$id = getTweetInfo($_GET["tweetID"]);
	$sql = mysqli_query(getConnection(), "SELECT u.ProfilePicture, u.firstname, u.lastname, u.username, t.TextArea FROM users as u inner join tweets AS t on t.user_id=u.id WHERE t.id='{$id['ID']}'");
				
	while ($row = mysqli_fetch_assoc($sql))  
	{
				
  	 	echo "<img src='".$row['ProfilePicture']."' height='50' width='50'/>" ." ".$row['firstname']. " " . $row['lastname'] .  " "  . $row['username'] .  " "  . $row['TextArea'];

		}

		

  	mysqli_close(getConnection()); 

 }

//Hämta ut svar till rätt Tweets ID
function ShowAnswers(){

	$id = getTweetInfo($_GET["tweetID"]);
	$sql = mysqli_query(getConnection(), "SELECT u.ProfilePicture, u.firstname, u.lastname, u.username, rt.TextArea FROM users as u inner join reply_tweets AS rt on rt.user_id=u.id inner join tweets as t on t.id=rt.reply_id WHERE rt.reply_id ='{$id['ID']}' ");
	while ($row = mysqli_fetch_assoc($sql))  
	{
				
  	 	echo "	<img src='".$row['ProfilePicture']."' height='50' width='50'/>" ." ".$row['firstname']. " " . $row['lastname'] .  " "  . $row['username'] .  " "  . $row['TextArea'] ."</br>";
  	 	  	 
		}

  	mysqli_close(getConnection()); 

 } 


//Alla tweets på sidan. Ordnas efter nyast inlagd. Syns på index.php. 
function ShowAllTweets() {

	$sql = mysqli_query(getConnection(), "SELECT t.ID, u.ProfilePicture, u.firstName, u.lastName, u.username, t.TextArea FROM users as u inner join tweets AS t on t.user_id=u.id ORDER BY t.ID DESC");

				
	while ($row = mysqli_fetch_assoc($sql))  
	{
				
  	 	echo "<img src=".$row['ProfilePicture']." height='50' width='50'/>" . " " . "<a href=profile.php?username=".$row["firstName"].">".$row['firstName']. " " .$row['lastName']."</a>" . " " .$row['TextArea'] . " " . '<a href="replyTweet.php?tweetID='.$row["ID"].'">Kommentera</a>' . "</br>";
  	 	  	 

  	 
		}

  	mysqli_close(getConnection()); 

 } 


