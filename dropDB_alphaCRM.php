<?php

{	// Create connection
   $host        = "host=localhost ";
   $port        = "port = 5432";
   $creds 		 = "user=postgres password=pass";




	$conn = pg_connect("$host $port $creds ");
	
	// Check connection
	if ( !($conn) ) {
	    die("<br>  Connection failed " );
	} else {
		echo "<br>  Connected successfully";
	}
	
}

	

	// sql to drop a database
	$sql = "DROP DATABASE alphacrm;";
	
	if ( pg_query($conn, $sql) ) {
	    echo "<br> Database alphacrm dropped successfully";
	} else {
	    echo "<br> Error dropping database: ".pg_last_error($conn);
	}








pg_close($conn);
?>
