<?php
/*

*	File:			tPersonInitialise.php
*	By:			TMIT  ,  Roy Canseco
*	Date:			02 Oct 2018
*
*	This script initialises the tPerson TABLE
*
*
*=====================================
*/



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





{
	
		$tableName = "tPerson";	
		$CSVfilename = "csvPerson";
		
		$tableField = array(
					'Salutation',
					'FirstName',
					'LastName',
					'CompanyID'
		);
		$numFields = sizeof($tableField);
			
		

	//	=======^^^^^^^^^^^^^^^^^^^^^^^===========^^^^^^^^^=====

										
	{  //		read CSV data file
	
			$file = fopen($CSVfilename, "r"); 		
			$i = 0;
			while(!feof($file))
			  {		  	
				$thisLine = fgets($file);		
				$tableData[$i] = explode(",", $thisLine);
				$i++; 
			  }
			fclose($file);
			
			$numRows = sizeof($tableData);
	}
		
		
		echo '$ <br> numRows : '.$numRows.'<br />';
		echo '$tableField[$numFields-1] : '.$tableField[$numFields-1].'<br />';
		

	{	//		DROP table		
	
		
			$drop_SQL = "DROP TABLE ".$tableName;
			
			if (pg_query($conn, $drop_SQL))  {	
				echo "'DROP ".$tableName."' -  Successful.";
			} else {
				echo "'DROP ".$tableName."' - Failed.";
			}
	}
		
		echo "<br /><hr /><br />";
		
	
	{	//		CREATE table
		
			$createTable_SQL =  "CREATE TABLE ".$tableName." (
						id SERIAL NOT NULL PRIMARY KEY , 
						salutation VARCHAR( 20 ) , 
						firstname VARCHAR( 50 ) , 
						lastname VARCHAR( 50 ) NOT NULL, 
						companyid VARCHAR( 11 ) NOT NULL 
			)";
		
		
		
			if (pg_query($conn, $createTable_SQL))  {	
				echo "'CREATE ".$tableName."' -  Successful.";
			} else {
				echo "'CREATE ".$tableName."' - Failed.";
			}
	}		
	
	
		echo "<br /><hr /><br />";
		
		
	{	// Insert csv data into the table
			
			$table_SQLinsert = "INSERT INTO ".$tableName." (";
			
			//$table_SQLinsert .=   "x"; 
			foreach($tableField as $tableFieldName) {
				$table_SQLinsert .=  $tableFieldName;
				if($tableFieldName <> $tableField[$numFields-1]) {
					$table_SQLinsert .=  ", ";
				}
			}
			$table_SQLinsert .=  ") VALUES ";

			$indx = 0;		
			while($indx < $numRows) {			
				$table_SQLinsert .=  "(";
				
				foreach($tableField as $key => $tableFieldName) {
					
					$table_SQLinsert .=  "'".trim($tableData[$indx][$key])."'";
					if($tableFieldName <> $tableField[$numFields-1]) {
						$table_SQLinsert .=  ", ";
					}

				}

				$table_SQLinsert .=  ") ";
				if ($indx < ($numRows - 1)) {
					$table_SQLinsert .=  ",\n";
				}
				
				$indx++;
			}
		
	}
		
		{	//	Echo and Execute the SQL and test for success   
			
						echo "<strong><u>SQL:<br /></u></strong>";
						echo $table_SQLinsert."<br /><br />";
							
						if (pg_query($conn, $table_SQLinsert))  {				
							echo "was SUCCESSFUL.<br /><br />";
						} else {
							echo "FAILED.<br /><br />";		
						}
		}
}






pg_close($conn);
?>