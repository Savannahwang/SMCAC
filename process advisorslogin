<?php
// Was the form submitted?
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
// Connect to the database .
  require ( 'mysqli_advisorsconnect.php' ) ;
// Load the validation functions.
  require ( 'login_advisorsfunction.php' ) ;
// Check the login data
  list ( $check, $data ) = validate ( $dbcon, $_POST[ 'email' ], $_POST[ 'psword' ] ) ;
// If successful, set session data and display the forum.php page
  if ( $check )  
  {
   echo "Checked succes!!!";

// Access the session details
    session_start();
    $_SESSION[ 'email' ] = $data[ 'email' ] ;
    $_SESSION[ 'psword' ] = $data[ 'psword' ] ;
    load ( 'cancertypes-advisors-edit.php' ) ;

  }
// If it fails, set the error messages
  else { $errors = $data; } 
// Close the database connection.
   echo "Checked UNsucces!!!";

  mysqli_close( $dbcon ) ; 
}
// If it unsuccessful continue to display the login page
include ( 'advisors-signin.php' ) ;
echo "Login Unsucessful";
?>
