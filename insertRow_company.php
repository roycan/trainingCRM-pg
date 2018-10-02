<script>
/*

*	File:			insertRow_company.php
*	By:			Roy Canseco
*	Date:			26 Sep 2018	
*
*	This script inserts records to the company table of alphaCRM
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




	// sql insert into table
	$sql = "INSERT INTO t_companies (preName, Name, regType, StreetA, 
					StreetB, StreetC, City, Region, Postcode, Country) 
				VALUES ('The' ,  'Pie Company' , '' , '89 Gravy Road' , '' , '' ,
						'Pastryville' , 'NSW' , '1297' , 'Australia'),
					('The' , 'Roy Company' , '' , '' , '' , '' , '' , 'Metro Manila',
					'' , 'Philippines') ,
					('' , 'TMIT World' , 'Limited' , '44 Lily Close' , '' , '' , 
					'Bicester' , 'Oxfordshire' , 'OX26 3EJ' , 'UK') 
					;";

	if (pg_query($conn , $sql)) {
	    echo "<br> Data for Table t_company inserted successfully";
	} else {
	    echo "<br> Error inserting to table: " . pg_last_error($conn);
	}



	



pg_close($conn);
?>
