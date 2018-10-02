<?php

{	// Create connection
   $host        = "host=localhost ";
   $port        = "port = 5432";
   $creds 		 = "user=postgres password=pass";
   $dbname		 = "dbname = alphacrm";




	$conn = pg_connect("$host $port $creds $dbname");
	
	// Check connection
	if ( !($conn) ) {
	    die("<br>  Connection failed " );
	} else {
		echo "<br>  Connected successfully";
	}
	
}

	

	// sql to drop a table
	$sql = "DROP TABLE t_persons;";
	
	if ( pg_query($conn, $sql) ) {
	    echo "<br> Table t_persons dropped successfully";
	} else {
	    echo "<br> Error dropping table: ".pg_last_error($conn);
	}







pg_close($conn);
?>
