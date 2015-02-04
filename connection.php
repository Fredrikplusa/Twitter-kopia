<?php 
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "root");
    define("DB_DATABASE", "Twitter");

    function getConnection() {
	    
    	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    	
    		if (mysqli_connect_errno() > 0)
			{ echo mysqli_connect_errno(). " : ". mysqli_connect_error();
			  die ();

			}
		return $connection;	
    }

