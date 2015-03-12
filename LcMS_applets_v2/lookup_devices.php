<!DOCTYPE html>
<html>

<!-- Life-cycle Management Applet Collection
     Paul Laibach - LcMS Concept and Implementation
     Connor Hayes - Applet Development and Testing
-->

<head>

   <title>LcMS Device Lookup v1.3</title>
   <link rel="stylesheet" type="text/css" href="lookup_applets.css">

</head>

<body>

   <h3>
      Life-cycle Management System<br>
      -- Device Lookup v1.3 --
   </h3>

   <form name="lookupForm" action="lookup_devices.php" method ="POST">
      <input type="text" title="Searches for input string anywhere in Machine Type, Marketing Name, Desktop Name, Hardware Class, Form Factor, and Manufacturer." autofocus placeholder="gimme something" onFocus="this.select()" name="userInput" value="<?php if (isset($_POST['userInput'])) echo $_POST['userInput']; ?>"><br><br>
      <input type="submit" class="submit">
   </form>

   <h4>
      Furry search of LcMS devices
   </h4>

   <div class="wrapper">

      <?php
         # Connect to MySQL server and the database
         require( 'includes/connect_db.php' ) ;
         # Includes these helper functions
         require( 'includes/machineHelpers.php' ) ;
            if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
               $userInput = $_POST['userInput'];
               new_machine_search($dbc, $userInput);
               }
            else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET')
         {
            if(isset($_GET['userInput']))
            {
         find_record_machine($dbc, $_GET['userInput']) ;
            }
         }
         mysqli_close( $dbc ) ;
      ?>

   </div>
</body>

</html>
