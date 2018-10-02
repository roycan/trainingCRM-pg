<!DOCTYPE html>
<html>

<head>

<script>
/*

*	File:			listCompany2.php
*	By:			Roy Canseco
*	Date:			29 Sep 2018
*
*	This script list company details in a data table.
*
*=====================================
*/

</script>

<title> listCompany.php </title>

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

	<script>
		$(document).ready(function() {
		    $('#companyTable').DataTable();
		} );
	</script>


</head>

<body>




<div class="container">



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





{ //create data table from DB results

	$sql = "SELECT * FROM tCompany
				ORDER BY Name";
	$result =  pg_query($conn, $sql);
	
	
	
	if ($result) {
	
		
			echo'
			<table id="companyTable" class="table table-striped table-bordered" style="width:100%">
		        <thead>
		            <tr>
		            	<th>ID (edit)</th>
		                <th>preName</th>
		                <th>Name</th>
		                <th>RegType	</th>
		                <th>StreetA</th>
		                <th>StreetB date</th>
		                <th>StreetC</th>
		                <th>City	</th>
		                <th>Region</th>
		                <th>Postcode date</th>
		                <th>Country</th>
		                <th>People</th>
		            
		            </tr>
		        </thead>
		        <tbody>
			';        
		        
		     
		{	// output data of each row
		    $i = 1;
		    while($row = pg_fetch_assoc($result)) {
		        echo '	
		  				<tr>
		        			<td> <a href="editCompanyForm.php?ID='.$row["id"].'" >'.$i.'</a></td>
		               <td>'.$row["prename"].'</td>
		               <td>'.$row["name"].'</td>
		               <td>'.$row["regtype"].'</td>
		               <td>'.$row["streeta"].'</td>
		               <td>'.$row["streetb"].'</td>
		               <td>'.$row["streetc"].'</td>
		               <td>'.$row["city"].'</td>
		               <td>'.$row["region"].'</td>
		               <td>'.$row["postcode"].'</td>
		               <td>'.$row["country"].'</td>
		               <td><a href="listPeople.php?ID='.$row["id"].'" > link </a> </td>
		            </tr>
		        ';		        	  
		        	  
					$i++;	    
		    }        		
		}  
		   
		 	echo'       
		        </tbody>
		        <tfoot>
		            <tr>   
		            	<th>ID (edit)</th>
		                <th>preName</th>
		                <th>Name</th>
		                <th>RegType	</th>
		                <th>StreetA</th>
		                <th>StreetB </th>
		                <th>StreetC</th>
		                <th>City	</th>
		                <th>Region</th>
		                <th>Postcode date</th>
		                <th>Country</th>
		                <th>People</th>
		            </tr>
		        </tfoot>
		    </table>
	
			';
	
	    
	} else {
	    echo "0 results";
	}
	

}



pg_close($conn);
?>

	
	
</div>



<br><hr><br>


<a href="index.php"> Quit to index page</a>


</body>
</html>