<script>
/*

*	File:			createTable_person.php
*	By:			Roy Canseco
*	Date:			2 Oct 2018	
*
*	This script creates the person table for alphaCRM
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





	// sql to create table
	$sql = "CREATE TABLE t_persons (
		id SERIAL NOT NULL PRIMARY KEY, 
		Salutation VARCHAR(20) ,	
		FirstName VARCHAR(50) ,
		LastName VARCHAR(50) NOT NULL,
		CompanyID INT NULL ,
		reg_date TIMESTAMP DEFAULT NOW()
	)";

	if (pg_query($conn, $sql) ) {
	    echo "<br> Table t_persons created successfully";
	} else {
	    echo "<br> Error creating table: " . pg_last_error($conn);
	}



/*
CREATE TABLE {<databaseName>.}<tableName>(
<fieldName> type (len) {NOT} NULL  PRIMARY KEY,
<fieldName> type (len) {NOT} NULL ,
<fieldName> type (len) {NOT} NULL ,
...
<fieldName> type (len) {NOT} NULL 
)


// {xxx} means xxx is optional

*/





pg_close($conn);
?>