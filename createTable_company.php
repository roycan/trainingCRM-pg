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
$sql = "CREATE TABLE t_companies (
	ID SERIAL NOT NULL  PRIMARY KEY, 
	preName VARCHAR(50) ,
	Name VARCHAR(250) NOT NULL,
	regType VARCHAR(50) NULL,
	reg_date TIMESTAMP DEFAULT NOW(),
	StreetA VARCHAR(150) NULL, 
	StreetB VARCHAR(150) NULL ,
	StreetC VARCHAR(150) NULL , 
	City VARCHAR(150) NULL ,
	Region VARCHAR(150) NULL,
	Postcode VARCHAR(50) NULL ,
	Country VARCHAR (250) NOT NULL
);";


	if (pg_query($conn, $sql) ) {
	    echo "<br> Table t_companies created successfully";
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




