<script>
/*

*	File:			newField_email.php
*	By:			Roy Canseco
*	Date:			30 Sep 2018	
*
*	This script alters the tPerson table to an email field
*
*=====================================
*/
</script>


<?php

{	// Create connection
	   $host        = "host=localhost ";
	   $port        = "port = 5432";
	   $creds 		 = "user=postgres password=pass";
	   $dbname 		 = "dbname = alphacrm";
	
	
	
		$conn = pg_connect("$host $port $creds $dbname");
		
		// Check connection
		if ( !($conn) ) {
		    die("<br>  Connection failed " );
		} else {
			echo "<br>  Connected successfully";
		}
	
}




{	// alter table to add field    
	$sql = "ALTER TABLE tPerson ADD email VARCHAR(50);  ";
	
	if (pg_query($conn, $sql) == TRUE) {
	    echo "<br> Table tPerson altered successfully";
	} else {
	    echo "<br> Error updating record: " . pg_last_error($conn);
	}


}






pg_close($conn);
?>