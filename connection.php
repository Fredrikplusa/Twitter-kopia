<?php 
    define("DB_HOST", "cpsrv03.misshosting.com");
    define("DB_USER", "qvteyflu_admin");
    define("DB_PASSWORD", "admin123");
    define("DB_DATABASE", "qvteyflu_Twitter");

    function getConnection() {
	    
    	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    	
    		if (mysqli_connect_errno() > 0)
			{ echo mysqli_connect_errno(). " : ". mysqli_connect_error();
			  die ();

			}
		return $connection;	
    }

