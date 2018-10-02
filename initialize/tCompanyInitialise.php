<?php
/*

*	File:			tCompanyInitialise.php
*	By:			TMIT , Roy Canseco
*	Date:			02 Oct 2018
*
*	This script initializes the t_companies TABLE
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





{	// initialize table from csv values

	
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
		
		echo '<br> $numFields : '.$numFields.'<br />';


	}
	
	//	=======^^^^^^^^^^^^^^^^^^^^^^^=============^^^^^^^^^=====

										
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
					prename VARCHAR( 50 ) ,
					name VARCHAR( 250 ) NOT NULL,
					regtype VARCHAR( 50 )  NULL,		
					streeta VARCHAR( 150 )  NULL,
					streetb VARCHAR( 150 )  NULL,
					streetc VARCHAR( 150 )  NULL,
					city VARCHAR( 150 )  NULL,
					region VARCHAR( 150 )  NULL,
					postcode VARCHAR( 50 )  NULL,				
					country VARCHAR( 250 ) NOT NULL
		)";	
	
			
			if (pg_query($conn, $createTable_SQL) )  {	
				echo "'CREATE ".$tableName."' -  Successful.";
			} else {
				echo "'CREATE ".$tableName."' - Failed.";
			}
	}		
	
		echo "<br /><hr /><br />";
		
		
	{	// INSERT data to table	
			
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
