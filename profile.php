<?php

session_start();

// Kontrollera om besökaren är inloggad. 
// Är de inte det så skicka dem till login-formuläret.
if (!isset($_SESSION['email'])) {
    $_SESSION['messages'] = array(
        array('status'=>'red', 'text'=>'OMG skärp dig.'),
    );
    header('Location: index.php');
    die;
}

// När vi försäkrat oss om att användaren är inloggad kan vi fortsätta.

?>
<h1>Välkommen <?= $_SESSION['email'] ?></h1>
<p><a href="logout.php">Logga ut</a></p>
