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
    $_SESSION['email'] = $email;
    header('Location: profile.php');
  
}

else
{
    // skickar tillb till loginsidan
  $_SESSION['messages'] = array(array('status' => 'red', 'text' => 'Ogiltigt login.'));
  header('Location: index.php');

  
}


