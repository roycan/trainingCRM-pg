<script>
/*

*	File:			updateTable_company.php
*	By:			Roy Canseco
*	Date:			26 Sep 2018	
*
*	This script updates specific values in the company table of alphaCRM
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




{	// update entries in a table
	$sql = "UPDATE t_companies SET country='United Kingdom' WHERE country='UK'";
	
	if ( pg_query($conn, $sql) == true ) {
	    echo "<br> Corresponding record(s) in table t_companies updated successfully";
	} else {
	    echo "<br> Error updating record: " . pg_last_error($conn);
	}
		
	/*
	UPDATE <tableName> SET
		fieldA = 'valueA' ,
		fieldB = 'valueB' ,
		fieldC = 'valueC' 
	WHERE 
		fieldX <operator> 'valueX'
		
		
	// operator can  = or < or >	
	*/

}




pg_close($conn);
?>
