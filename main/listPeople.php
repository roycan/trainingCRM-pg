<!DOCTYPE html>
<html>

<head>

<title>listPeople.php</title>

<script>
/*

*	File:			listPeople.php
*	By:			Roy Canseco
*	Date:			27 Sep 2018	
*
*	This script shows company details and lists its employees
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



////////////////////////////////////////////

{ 	// list company information

	echo '<center>';
	$ID = $_GET["ID"];
	
	
	$sql = "SELECT  * FROM tCompany WHERE ID=".$ID.";" ;
	$result = pg_query($conn, $sql);
	
	
	if ($result) {
		
		 $row = pg_fetch_assoc($result) ;
		 
		
	    echo "<h2>".$row["prename"]." ".$row["name"]."</h2>";
	    echo "".$row["regtype"]."<br>";
	    echo "".$row["streeta"]." ".$row["streetb"]." ".$row["streetc"]."<br>";
	    echo "".$row["city"]." ".$row["region"]."<br>";
		 echo "".$row["postcode"]." ".$row["country"]."<hr>";
		
		
	} else {
	    echo "0 results";
	}

}


echo '</center>';

/////////////////////////////////////////////////////

{	// list company personnel
	
	$sql = "SELECT * FROM tperson WHERE companyid = '".$ID."';";
	$result = pg_query($conn, $sql);
	
	
	if ($result) {
		
		echo '
			<div class="container">
			  <h4>Basic List Group</h4>
			  <ul class="list-group">
		';
	
	    // output data of each row
	    while($row = pg_fetch_assoc($result)) {
	        echo "<a href='editPerson.php?ID=".$row["id"]."'>
	        		<li class='list-group-item'>".$row["salutation"]." ".
	        		$row["firstname"]." ".$row["lastname"]." </li></a> ";
	        
	    }
	    
		echo '    
			  </ul>
			</div>
		';    
	    
	    
	} else {
	    echo "0 results";
	}


}


pg_close($conn);



///////////////////////////////////////////////////

// add button to create a new person

echo'

		<div class="container">
		 
		<form action="createPerson.php?CompanyID='.$ID.'" name="addPersonForm" method="post">
			
		  <button type="submit" class="btn btn-primary">Add a new Person</button>
		</form>
		
		</div>
';



?>

<br><hr><br>

<a href="selectCompany.php">View another Company</a>
<br>
<a href="index.php"> Quit to index page</a>



</body>
</html>