<script>
/*

*	File:			createDB_alphaCRM.php
*	By:			Roy Canseco
*	Date:			26 Sep 2018	
*
*	This script creates the database for AlphaCRM
*
*=====================================
*/
</script>


<?php

{	// Create connection
   $host        = "host=localhost";
   $port        = "port = 5432";
   $creds 		 = "user=postgres password=pass";

	
	$conn = pg_connect("$host $port $creds");
	
	// Check connection
	if ( pg_connection_status($conn) ) {
	    die("<br>  Connection failed: " . pg_last_error($conn) );
	} else {
		echo "<br>  Connected successfully";
		}
	}


	$dbname = "alphaCRM";
	
	
	// Create database
	
	$sql = "CREATE DATABASE $dbname ;";
	
	
	if (pg_query($conn , $sql) ) {
	    echo "<br> Database $dbname created successfully";
	} else {
	    echo "<br> Error creating database $dbname . <br>".pg_last_error($conn) ;
	}
	




pg_close($conn);
?>

