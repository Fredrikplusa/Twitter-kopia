<?php
session_start();
require_once 'functions.php';
offlineUser();

?>
<html>
<meta charset="utf-8">
<p><a href="logout.php">Logga ut</a></p> <p><a href="profile.php">Mina Sidor</a></p></html>

<? ShowAllTweets();?>
