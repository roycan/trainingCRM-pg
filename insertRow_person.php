<script>
/*

*	File:			insertRow_person.php
*	By:			Roy Canseco
*	Date:			2 Oct 2018	
*
*	This script insert data to the person table of alphaCRM
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





{	// sql insert into table
	$sql = "INSERT INTO t_persons ( Salutation, FirstName, LastName, 
				CompanyID)  
			VALUES ('Mr.' , 'Bill' , 'Bloggs' , NULL),
				('Mrs.' , 'Wilhelmina' , 'Bloggs' , '1' ),
				('Mrs.' , 'Hermione' , 'Hermit' , '300' ),
				('Mr.' , 'Roy Vincent' , 'Canseco' , '3' )
				;";

	if (pg_query($conn , $sql)) {
	    echo "<br> Data for Table t_persons inserted successfully";
	} else {
	    echo "<br> Error inserting to table: " . pg_last_error($conn);
	}
	
}




pg_close($conn);
?>

