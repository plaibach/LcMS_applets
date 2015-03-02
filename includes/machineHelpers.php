<?php
#Finds information on a single model_type Intended for implementation with hyperlinked Machine_Type field
function find_record($dbc, $num)
{
require( 'includes/connect_db.php' );
//get information on single machine type
$query = 'SELECT MachineTypes.Machine_Type, MachineTypes.Hardware_Class, MachineTypes.Marketing_Name, MachineTypes.Desktop_Name, MachineTypes.Form_Factor, MachineTypes.Display_Size, MachineTypes.Manufacturer, MachineTypes.Launch_Date, MachineTypes.Network_Device, MachineTypes.RAM, MachineTypes.HDD FROM MachineTypes WHERE MachineTypes.Machine_Type = "' . $pattern . '" ';


$results = mysqli_query($dbc,$query);
if ($results)
	{

echo '<TABLE align="center" BORDER="1" >';
			echo '<TR>';
			echo '<TH>Machine_Type</TH>';
			echo '<TH>Hardware_Class</TH>';
			echo '<TH>Marketing_Name</TH>';	
			echo '<TH>Desktop_Name</TH>';
			echo '<TH>Form_Factor</TH>';
			echo '<TH>Display_Size</TH>';
			echo '<TH>Manufacturer</TH>';
			echo '<TH>Launch_Date</TH>';
			echo '<TH>Network_Device</TH>';
			echo '<TH>RAM</TH>';
			echo '<TH>HDD_Size</TH>';
			echo '</TR>';
			
		while ( $row = mysqli_fetch_array($results , MYSQLI_ASSOC ) )
			{	
				
				echo '<TR>' ;
				echo '<TD>' . $row['Machine_Type'] . '</TD>' ;
				echo '<TD>' . $row['Hardware_Class'] . '</TD>' ;
				echo '<TD>' . $row['Marketing_Name'] . '</TD>' ;
				echo '<TD>' . $row['Desktop_Name'] . '</TD>' ;
				echo '<TD>' . $row['Form_Factor'] . '</TD>' ;
				echo '<TD>' . $row['Display_Size'] . '</TD>' ;
				echo '<TD>' . $row['Manufacturer'] . '</TD>' ;
				echo '<TD>' . $row['Launch_Date'] . '</TD>' ;
				echo '<TD>' . $row['Network_Device'] . '</TD>' ;
				echo '<TD>' . $row['RAM'] . '</TD>' ;
				echo '<TD>' . $row['HDD'] . '</TD>' ;
				echo '</TR>' ;
			}
			echo '</TABLE>';
	}
	else
	{
	echo '"' . mysqli_num_rows($results) . '"';
	}
}


function find_record_machine($dbc, $pattern)
{
require( 'includes/connect_db.php' );
//get information on single machine type
$query = 'SELECT MachineTypes.Machine_Type, MachineTypes.Hardware_Class, MachineTypes.Marketing_Name, MachineTypes.Desktop_Name, MachineTypes.Form_Factor, MachineTypes.Display_Size, MachineTypes.Manufacturer, MachineTypes.Launch_Date, MachineTypes.Network_Device, MachineTypes.RAM, MachineTypes.HDD FROM MachineTypes WHERE MachineTypes.Machine_Type = "' . $pattern . '" ';

$results = mysqli_query($dbc,$query);
if ($results){
echo '<TABLE align="center" BORDER="1" >';
			
		while ( $row = mysqli_fetch_array($results , MYSQLI_ASSOC ) )
			{	
				
				echo '<TR>' ;
				echo '<TH>Machine_Type</TH>';
				echo '<TD>' . $row['Machine_Type'] . '</TD></TR>' ;
				echo '<TR><TH>Hardware_Class</TH>';
				echo '<TD>' . $row['Hardware_Class'] . '</TD></TR>' ;
				echo '<TR><TH>Marketing_Name</TH>';	
				echo '<TD>' . $row['Marketing_Name'] . '</TD></TR>' ;
				echo '<TR><TH>Desktop_Name</TH>';
				echo '<TD>' . $row['Desktop_Name'] . '</TD></TR>' ;
				echo '<TR><TH>Form_Factor</TH>';
				echo '<TD>' . $row['Form_Factor'] . '</TD></TR>' ;
				echo '<TR><TH>Display_Size</TH>';
				echo '<TD>' . $row['Display_Size'] . '</TD></TR>' ;
				echo '<TR><TH>Manufacturer</TH>';
				echo '<TD>' . $row['Manufacturer'] . '</TD></TR>' ;
				echo '<TR><TH>Launch_Date</TH>';
				echo '<TD>' . $row['Launch_Date'] . '</TD></TR>' ;
				echo '<TR><TH>Network_Device</TH>';
				echo '<TD>' . $row['Network_Device'] . '</TD></TR>' ;
				echo '<TR><TH>RAM</TH>';
				echo '<TD>' . $row['RAM'] . '</TD></TR>' ;
				echo '<TR><TH>HDD_Size</TH>';
				echo '<TD>' . $row['HDD'] . '</TD></TR>' ;
				echo '</TR>' ;
			}
			echo '</TABLE>';
	}
	else
	{
	echo '"' . mysqli_num_rows($results) . '"';
	}
}

 function new_machine_search($dbc, $model) {
 // video @ http://10.10.1.93/flowplayer/index_generic.html
 //$pattern appends wild card to $model parameter
 $pattern = '%' . $model . '%' ;
 
 if ($model == 'apple' || $model == 'lenovo' || $model == 'lol')
 {
	 header('Location: http://10.10.1.93/flowplayer/index_generic.html');
	 die();
 }
 
 require( 'includes/connect_db.php' );
 $query = 'SELECT MachineTypes.Machine_Type, MachineTypes.Marketing_Name, MachineTypes.Desktop_Name FROM MachineTypes WHERE MachineTypes.Machine_Type LIKE "' . $pattern . '" OR  MachineTypes.Desktop_Name LIKE "' . $pattern . '" OR MachineTypes.Marketing_Name LIKE "' . $pattern . '"';

 $results = mysqli_query($dbc,$query);

 //Search first by Desktop_Name
	if ($results)
	{
		if (mysqli_num_rows($results) > 0)
			
		{
		print_records($results);	
		}
			
	}
	else
	{

		echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
	}

	
	mysqli_close( $dbc ) ;


}





 function machine_search($dbc, $model) {
 
 //$pattern appends wild card to $model parameter
 $pattern = '%' . $model . '%' ;
 
 require( 'includes/connect_db.php' );
 // $querya = 'SELECT MachineTypes.Machine_Type, MachineTypes.Marketing_Name, MachineTypes.Desktop_Name FROM MachineTypes WHERE MachineTypes.Machine_Type LIKE "' . $pattern . '" OR  MachineTypes.Desktop_Name LIKE "' . $pattern . '" OR MachineTypes.Marketing_Name LIKE "' . $pattern . '"';
 // querya Searches by Machine type
 $querya = 'SELECT MachineTypes.Machine_Type, MachineTypes.Marketing_Name, MachineTypes.Desktop_Name FROM MachineTypes WHERE MachineTypes.Machine_Type LIKE "' . $pattern . '" ';
// queryb Searches by Desktop_Name
 $queryb = 'SELECT MachineTypes.Machine_Type, MachineTypes.Marketing_Name, MachineTypes.Desktop_Name FROM MachineTypes WHERE MachineTypes.Desktop_Name LIKE "' . $pattern . '" ';
// queryc Searches by Marketing Name  
 $queryc = 'SELECT MachineTypes.Machine_Type, MachineTypes.Marketing_Name, MachineTypes.Desktop_Name FROM MachineTypes WHERE MachineTypes.Marketing_Name LIKE "' . $pattern . '" '; 

 $resultsa = mysqli_query($dbc,$querya);
 $resultsb = mysqli_query($dbc,$queryb);
 $resultsc = mysqli_query($dbc,$queryc); 
 //Search first by Desktop_Name
	if ($resultsb && $resultsa && $resultsc)
	{
		if (mysqli_num_rows($resultsb) > 0)
		{
		print_records($resultsb);	
		}
		
	//if none found by desktop name search by Marketing_Name	
		else if (mysqli_num_rows($resultsc) > 0)
		{
		print_records($resultsc);
		}
	
	//if none found by Marketing_Name search by Machine_Type
		else if (mysqli_num_rows($resultsa) > 0)
		{
		print_records($resultsa);
		}
		
		
	}
	else
	{

		echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
	}

	
	mysqli_close( $dbc ) ;


}

function show_record($results)
{
echo '<TABLE align="center" BORDER="1" >';
			echo '<TR>';
			echo '<TH>Machine Type</TH>';
			echo '<TH>Hardware_Class</TH>';
			echo '<TH>Marketing_Name</TH>';	
			echo '<TH>Desktop_Name</TH>';
			echo '<TH>Form_Factor</TH>';
			echo '<TH>Display_Size</TH>';
			echo '<TH>Manufacturer</TH>';
			echo '<TH>Launch_Date</TH>';
			echo '<TH>Network_Device</TH>';
			echo '<TH>RAM</TH>';
			echo '<TH>HDD_Size</TH>';
			echo '</TR>';
		while ( $row = mysqli_fetch_array($results , MYSQLI_ASSOC ) )
			{	
				echo '<TR>' ;
				echo '<TD>' . $row['Machine_Type'] . '</TD>' ;
				echo '<TD>' . $row['Hardware_Class'] . '</TD>' ;
				echo '<TD>' . $row['Marketing_Name'] . '</TD>' ;
				echo '<TD>' . $row['Desktop_Name'] . '</TD>' ;
				echo '<TD>' . $row['Form_Factor'] . '</TD>' ;
				echo '<TD>' . $row['Display_Size'] . '</TD>' ;
				echo '<TD>' . $row['Manufacturer'] . '</TD>' ;
				echo '<TD>' . $row['Launch_Date'] . '</TD>' ;
				echo '<TD>' . $row['Network_Device'] . '</TD>' ;
				echo '<TD>' . $row['RAM'] . '</TD>' ;
				echo '<TD>' . $row['HDD'] . '</TD>' ;
				echo '</TR>' ;
			}
			echo '</TABLE>';

}

function print_records($results) 
{

echo '<TABLE align="center" BORDER="1" >';
			echo '<TR>';
			echo '<TH>Machine_Type</TH>';
			echo '<TH>Marketing_Name</TH>';	
			echo '<TH>Desktop_Name</TH>';
			echo '</TR>';
			while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
			{	$alink = '<A HREF=machinetype.php?model=' . $row['Machine_Type'] . '>' . $row['Machine_Type'] . '</A>' ;
				echo '<TR>' ;
				echo '<TD>' . $alink . '</TD>' ;
				echo '<TD>' . $row['Marketing_Name'] . '</TD>' ;
				echo '<TD>' . $row['Desktop_Name'] . '</TD>' ;
				echo '</TR>' ;
			}
			echo '</TABLE>';
}

?>
