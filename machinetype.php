

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="machinetype.css">
<title>LcMS Device Lookup v1.0</title>

</head>

<body>


<p>
LcMS Device Lookup v1.0<br>
Furry search of Desktop_Name, Marketing_Name, and Machine_Type

<form name="lookupForm" action="machinetype.php" method ="POST">


<input type="text" autofocus placeholder="gimme something" onFocus="this.select()" name="model" value="<?php if (isset($_POST['model'])) echo $_POST['model']; ?>">

<p><input type="submit" class="submit"></p> 
		
		</form>
</p>
<p>
<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/machineHelpers.php' ) ;

	if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

		$model = $_POST['model'];

		new_machine_search($dbc, $model);
		}
	else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') 
{
	if(isset($_GET['model']))
	{
find_record_machine($dbc, $_GET['model']) ;	
	}	
}

mysqli_close( $dbc ) ;
?>
</p>		
</body>
</html>
