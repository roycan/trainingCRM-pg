<!DOCTYPE html>
<html>

<head>

<script>
/*

*	File:			selectCompany.php
*	By:			Roy Canseco
*	Date:			27 Sep 2018	
*
*	This script chooses a company to display its info and personnel.
*
*=====================================
*/
</script>


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

<h2>Select Company Page</h2>
<br>




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



	$sql = "SELECT id, prename, name FROM tCompany
				ORDER BY name";
	$result = pg_query($conn, $sql);



{ //create dropdown from DB results

	if ($result) {
	
	echo'
	<div class="dropdown">
	  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
	    Select Company
	  </button>
	  <div class="dropdown-menu">
	';    
	    
	    
	    // output data of each row
	    $i = 1;
	    while($row = pg_fetch_assoc($result)) {
	        echo '<a class="dropdown-item" href="listPeople.php?ID='.$row["id"].'">'.
	        		$i.' '.$row["prename"].' '.$row["name"].'</a>';
				$i++;	    
	    }
	    
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