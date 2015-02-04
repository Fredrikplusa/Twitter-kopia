<?php
	
require_once 'connection.php';

function checkUser($email, $pass) {                                 

    $connect = getConnection();
    $query = "SELECT email, passWord FROM Users WHERE email = '$email' AND passWord = '$pass'";
    $result = mysqli_query($connect, $query);

    $row = mysqli_fetch_assoc($result); //(funkar som en while-loop, typ är det true returna)
        return $row;
}	
	
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
		
	if ($Email != "") 
	{
		if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) 
		{
			echo "<p class='felkod'>Ej korrekt email!</p>";
			$validation = false;
		}

	

	}

	return $validation;	
}

function NewMember() {
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
				
			$FirstName = filter_var($_POST['FirstName'], FILTER_SANITIZE_SPECIAL_CHARS);
				
			$LastName = filter_var($_POST['LastName'], FILTER_SANITIZE_SPECIAL_CHARS);

			$Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL); 
				
			$PassWord = filter_var($_POST['PassWord'], FILTER_SANITIZE_SPECIAL_CHARS); 
				
					
				if (validateForm($FirstName, $LastName, $Email, $PassWord) == true)
					{
						$sql = "INSERT INTO Users (firstName, lastName, email, passWord) VALUES ('$FirstName', '$LastName', '$Email', '$PassWord')";
							
							if (mysqli_query(getConnection(), $sql)) 
							{
								echo "Du är nu medlem hos oss!";
							}		
					}	
		}	
}

function lookForMessage() {
	
	if (isset($_SESSION['messages'])) 
		{
	    	foreach ($_SESSION['messages'] as $msg) {
	        	echo '<p style="color:'.$msg['status'].'">'.$msg['text'].'</p>';
	    	}
	    unset($_SESSION['messages']);

		}
}

function alredyOnline(){
	
	if (isset($_SESSION['email'])) 
	{
    	echo '<p>Du är redan inloggad, gå till din <a href="profile.php">profil</a>.</p>';
    	die;
	}
}


