<?php
session_start();


require_once 'functions.php';
require_once 'connection.php';


    $email = $_POST['email'];
    $pass = $_POST['pwd'];   
   	


$data = checkUser($email, $pass);


if (is_array($data))
{
    // logga in
    $_SESSION['user']= $data;
    header('Location: profile.php');
  
}

else
{
    // skickar tillb till loginsidan
  $_SESSION['messages'] = array(array('status' => 'red', 'text' => 'Fel användarnamn eller lösenord.'));
  header('Location: startPage.php');

  
}


