
<!DOCTYPE html>
<html>

<head>


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





<script>
/*

*	File:			selectRow_person.php
*	By:			Roy Canseco
*	Date:			26 Sep 2018	
*
*	This script selects data from the person table of the alphaCRM database
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



{	// select data from your database
	// you can get this from pgAdmin3
	$sql = "
		SELECT 
		  t_persons.salutation, 
		  t_persons.firstname, 
		  t_persons.lastname, 
		  t_companies.name
		FROM 
		  public.t_persons, 
		  public.t_companies
		WHERE 
		  t_persons.companyid = t_companies.id AND
		  t_companies.name = 'Pie Company'
		ORDER BY
		  t_persons.lastname ASC, 
		  t_persons.firstname ASC;
		
			";
			
	$result = pg_query($conn, $sql);

	$i=1;
	if ( $result) {
	    echo "<table class=table> 
	    			<tr>
	    				<th>ID</th>
	    				<th>Salutation</th>
	    				<th>First Name</th>
	    				<th>Last Name</th>
	    				<th>Company ID</th>
	    			</tr>";
	    			
	    // output data of each row
	    while($row = pg_fetch_assoc($result)) {
	        echo "<tr>
	        			<td>".$i." -</td>
	        			<td>".$row["salutation"]."</td> 
	        			<td>".$row["firstname"]." </td>
	        			<td>".$row["lastname"]." </td>
	        			<td>[Company ".$row["name"]."]</td>
	        		</tr>";
	        	$i++;
	    }
	    echo "</table>";
	} else {
	    echo "0 results";
	}

}


pg_close($conn);
?>





</body>
</html>

