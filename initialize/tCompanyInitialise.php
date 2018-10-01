<?php
/*

*	File:			tCompanyInitialise.php
*	By:			TMIT , Roy Canseco
*	Date:			26 Sep 2018
*
*	This script initialises the tCompany TABLE
*
*
*=====================================
*/



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







 {

	
	{	//		Table Definition 
		$tableName = "tCompany";	
		$CSVfilename = "csvCompany";

		$tableField = array(
					'preName',
					'Name',
					'RegType',
					'StreetA',			
					'StreetB',			
					'StreetC',			
					'City',			
					'Region',			
					'Postcode',			
					'COUNTRY'				
		);
		$numFields = sizeof($tableField);
		
		echo '$numFields : '.$numFields.'<br />';

		$createTable_SQL = "
					CREATE TABLE alphacrm.".$tableName." (
					ID INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					preName VARCHAR( 50 ) ,
					Name VARCHAR( 250 ) NOT NULL,
					RegType VARCHAR( 50 )  NULL,
					
					StreetA VARCHAR( 150 )  NULL,
					StreetB VARCHAR( 150 )  NULL,
					StreetC VARCHAR( 150 )  NULL,
					City VARCHAR( 150 )  NULL,
					Region VARCHAR( 150 )  NULL,
					Postcode VARCHAR( 50 )  NULL,
					
					COUNTRY VARCHAR( 250 ) NOT NULL
		)";
	}
	
	//	=======^^^^^^^^^^^^^^^^^^^^^^^=========  End of Definition Part ======^^^^^^^^^=====

										
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
		echo '$numRows : '.$numRows.'<br />';
		echo '$tableField[$numFields-1] : '.$tableField[$numFields-1].'<br />';

		{	//		DROP table		
	
		
			$drop_SQL = "DROP TABLE ".$tableName;
			
			if (mysqli_query($conn, $drop_SQL))  {	
				echo "'DROP ".$tableName."' -  Successful.";
			} else {
				echo "'DROP ".$tableName."' - Failed.";
			}
		}
		
		echo "<br /><hr /><br />";
	
		{	//		CREATE table		
			
			if (mysqli_query($conn, $createTable_SQL))  {	
				echo "'CREATE ".$tableName."' -  Successful.";
			} else {
				echo "'CREATE ".$tableName."' - Failed.";
			}
		}		
		echo "<br /><hr /><br />";
			
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
					
					$table_SQLinsert .=  "'".$tableData[$indx][$key]."'";
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
		
			{	//	Echo and Execute the SQL and test for success   
			
						echo "<strong><u>SQL:<br /></u></strong>";
						echo $table_SQLinsert."<br /><br />";
							
						if (mysqli_query($conn, $table_SQLinsert))  {				
							echo "was SUCCESSFUL.<br /><br />";
						} else {
							echo "FAILED.<br /><br />";		
						}
			}
}




$conn->close();



?>
