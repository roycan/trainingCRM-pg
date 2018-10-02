<script>
/*

*	File:			deleteRow_company.php
*	By:			Roy Canseco
*	Date:			26 Sep 2018	
*
*	This script*
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





	
	
{	// sql to delete a record
	$sql = "DELETE FROM t_companies WHERE id=1";
			
	if (pg_query($conn , $sql)) {
	    echo "<br>  Corresponding record(s) from table t_companies deleted successfully";
	} else {
	    echo "<br> Error deleting record: " . pg_last_error($conn);
	}

}





pg_close($conn);
?>

