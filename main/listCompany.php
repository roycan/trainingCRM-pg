<!DOCTYPE html>
<html>

<head>

<script>
/*

*	File:			listCompany.php
*	By:			Roy Canseco
*	Date:			29 Sep 2018
*
*	This script lists companies and links to their company page.
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

</head>

<body>



<form action="listPeople.php" name="form1" method="post">
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



{ //create table from DB results

	
	$sql = "SELECT ID, preName, Name FROM tCompany
				ORDER BY Name";
	$result = pg_query($conn, $sql);
	

	
	if ($result) {
	
		echo'
			<div class="container">
			  <h2>List of Companies</h2>
			  <ul class="list-group">
		';    
	    
	    
	    // output data of each row
	    $i = 1;
	    while($row = pg_fetch_assoc($result)) {
	        echo '<li class="list-group-item">'.$i.' <a href="listPeople.php?ID='.$row["id"].'"
	        	  >'.$row["prename"].' '.$row["name"].'</a></li>';
				$i++;	    
	    }
	    echo "
		     </ul>
			</div>   
	   ";
	    
	
	    
	} else {
	    echo "0 results";
	}


	echo'
	  </div>
	</div>
	
	';

}



pg_close($conn);
?>

	
	</div>
</form>	






<br><hr><br>


<a href="index.php"> Quit to index page</a>




</body>
</html>