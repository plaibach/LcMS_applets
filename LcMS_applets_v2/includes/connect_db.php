<?php # CONNECT TO MySQL DATABASE.


$dbc = @mysqli_connect ( 'localhost', 'lms_reports', 'poop', 'Inventory' )

# Otherwise fail gracefully and explain the error. 
OR die ( mysqli_connect_error() ) ;

# Set encoding to match PHP script encoding.
mysqli_set_charset( $dbc, 'utf8' ) ;
