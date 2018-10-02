<?php
/*

*	File:			tLookupInitialise.php
*	By:			TMIT
*	Date:			28 Sep 2018
*
*	This script initialises the tLookup TABLE
*		by populating it with a list of Salutations
*		for use in the table tPerson
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





{  // Get the lookup values from csv and generate lookup table

	
	{	//		Table Definition 
		$tableName = "tLookup";	


		//		ONLY the fields to insert - NOT any auto_inc field	
		$tableField = array(
					'lookupType',
					'lookupValue' ,
					'lookupOrder'
		);
		$numFields = sizeof($tableField);
		
		echo ' <br> $numFields : '.$numFields.'<br />';


			
		//		set startInsertsField to 1 if first field is auto_increment
		//			otherwise set to 0.

	}

	//	=======^^^^^^^^^^^^^^^^^^^^^^^==========^^^^^^^^^=====

										
	{//		read CSV data file
		$CSVfilename = "csvSalutations";	
		
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



////////////////////////////////
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
	
		$createTable_SQL = "
			CREATE TABLE ".$tableName." (
				id SERIAL NOT NULL  PRIMARY KEY ,
				lookupType VARCHAR( 50 ) NOT NULL,
				lookupValue VARCHAR( 250 ) NOT NULL, 
				lookupOrder INT NOT NULL DEFAULT '0'
		)";
			
			
			if (pg_query($conn, $createTable_SQL)) {	
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
							
						if (pg_query($conn, $table_SQLinsert)) {				
							echo "was SUCCESSFUL.<br /><br />";
						} else {
							echo "FAILED.<br /><br />";		
						}
			}
			
}


pg_close($conn);
?>