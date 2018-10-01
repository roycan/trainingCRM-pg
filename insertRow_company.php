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
$sql = "INSERT INTO companyTable (`preName`, `Name`, `regType`, `StreetA`, 
				`StreetB`, `StreetC`, `City`, `Region`, `Postcode`, `Country`) 
			VALUES ('The' ,  'Pie Company' , '' , '89 Gravy Road' , '' , '' ,
					'Pastryville' , 'NSW' , '1297' , 'Australia'),
				('The' , 'Roy Company' , '' , '' , '' , '' , '' , 'Metro Manila',
				'' , 'Philippines') ,
				('' , 'TMIT World' , 'Limited' , '44 Lily Close' , '' , '' , 
				'Bicester' , 'Oxfordshire' , 'OX26 3EJ' , 'UK') 
				;";

if ($conn->query($sql) === TRUE) {
    echo "<br> Data for Table companyTable inserted successfully";
} else {
    echo "<br> Error inserting to table: " . $conn->error;
}







$conn->close();



?>
