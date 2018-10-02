<script>
/*

*	File:			newTableField.php
*	By:			Roy Canseco
*	Date:			27 Sep 2018	
*
*	This script alters the tPerson table to a Tel field
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





{	// Alter a table    
	$sql = "ALTER TABLE  t_persons ADD email VARCHAR(20);  ";
	
	if ( pg_query($conn, $sql) == true ) {
	    echo "<br> Table t_persons altered successfully";
	} else {
	    echo "<br> Error updating record: " . pg_last_error($conn);
	}
		
	/*
	ALTER TABLE tPerson DROP Tel ;
		
	// ALTER TABLE table_name DROP COLUMN column_name;
	// ALTER TABLE table_name ADD column_name datatype;
	// ALTER TABLE table_name MODIFY COLUMN column_name datatype;
	// ALTER TABLE table_name ALTER COLUMN column_name TYPE datatype;
	// ALTER TABLE table_name MODIFY column_name datatype NOT NULL;
	*/

}


pg_close($conn);
?>