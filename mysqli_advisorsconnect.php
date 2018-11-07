<?php
// Create a connection to the estatedb database and set the encoding to utf-8
DEFINE ('DB_USER', 'smcac1_cancers');
DEFINE ('DB_PASSWORD', 'smcac1_cancers');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'smcac1_Scientists');


// Make the connection
$dbcon = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
('Could not connect to MySQL: ' . mysqli_connect_error() );
// Set the encoding
mysqli_set_charset($dbcon, 'utf8');
echo 'Succesfully connected to Scientist database<br>'
?>
