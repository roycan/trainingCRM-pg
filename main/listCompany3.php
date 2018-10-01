<!DOCTYPE html>
<html>

<head>

<script>
/*

*	File:			listCompany3.php
*	By:			Roy Canseco
*	Date:			30 Sep 2018
*
*	This script lists the information of the companies 
		and the persons in our database through a 
		data table.
*=====================================
*/

</script>

<title> listCompany3.php </title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>

<body>


<?php
{  //  connect to database 

		
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
	
}

{  // select data from the database

		
	$sql = "SELECT `preName`, `Name` , tperson.ID, tperson.Salutation, 
				tperson.FirstName, tperson.LastName, tperson.Tel , tperson.email
				FROM `tcompany` 
				LEFT JOIN tperson ON tperson.CompanyID=tcompany.ID 
				ORDER BY `tcompany`.`Name` ASC
	";
	$result = $conn->query($sql);
	
	
	if ($result->num_rows > 0) {
		
		
		
	    echo '
	    
	    <script>
			$(document).ready(function() {
			    $("#peopleTable").DataTable();
			} );
		</script>
		
		<table id="peopleTable" class="table table-striped table-hover table-bordered" style="width:100% ">
		        <thead>
		            <tr>
		                <th>preName</th>
		                <th>Name</th>
		                <th>Salutation</th>
		                <th>FirstName</th>
		                <th>LastName</th>
		                <th>Tel</th>
		                <th>Email</th>
		            </tr>
		        </thead>
		        <tbody>
	    
	    ';
	    
	    
	    
	    // output data of each row
	    
	    
	    
	    
	    while($row = $result->fetch_assoc()) {
	        echo '
	        			<tr>
		                <td><b>'.$row["preName"].'</b></td>
		                <td><b>'.$row["Name"].'</b></td>
		                <td>'.$row["Salutation"].'</td>
		                <td>'.$row["FirstName"].'</td>
		                <td>'.$row["LastName"].'</td>
		                <td>'.$row["Tel"].'</td>
		                <td>'.$row["email"].'</td>
		            </tr>
	        ';
	        
	        
	   }     
	        


	        
	        
	        
	        
	    
	    echo "   
		    </tbody>
		        <tfoot>
		            <tr>
		                <th>preName</th>
		                <th>Name</th>
		                <th>Salutation</th>
		                <th>FirstName</th>
		                <th>LastName</th>
		                <th>Tel</th>
		                <th>Email</th>
		            </tr>
		        </tfoot>
		    </table>	    
    
	    ";
	    
	    
	    
	    
	    
	    
	    
	} else {
	    echo "0 results";
	}
	
	


}




$conn->close();
?>


<br><hr><br>


<a href="index.php"> Quit to index page</a>



</body>
</html>