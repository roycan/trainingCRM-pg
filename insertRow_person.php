<script>
/*

*	File:			insertRow_person.php
*	By:			Roy Canseco
*	Date:			26 Sep 2018	
*
*	This script insert data to the person table of alphaCRM
*
*=====================================
*/
</script>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "alphaCRM";

// Create connection
$conn = new mysqli($servername, $username, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("<br> Connection failed: " . $conn->connect_error);
} 
echo "<br> Connected successfully";



// sql insert into table
// you can get an exact template for this from phpmyadmin
$sql = "INSERT INTO personTable ( `Salutation`, `FirstName`, `LastName`, 
				`CompanyID`)  
			VALUES ('Mr.' , 'Bill' , 'Bloggs' , '' ),
				('Mrs.' , 'Wilhelmina' , 'Bloggs' , '1' ),
				('Mrs.' , 'Hermione' , 'Hermit' , '300' ),
				('Mr.' , 'Roy Vincent' , 'Canseco' , '3' )
				;";

if ($conn->query($sql) === TRUE) {
    echo "<br> Data for Table personTable inserted successfully";
} else {
    echo "<br> Error inserting to table: " . $conn->error;
}




$conn->close();



?>
