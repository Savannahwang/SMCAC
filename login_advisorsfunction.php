<?php 
// Function for loading the URL of pages
function load( $page = 'advisors-signin.php' )
{
  // The code for setting the page URL
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;
  // Trim the URL
  $url = rtrim( $url, '/\\' ) ;
  $url .= '/' . $page ;
 //Redirect to the page and exit the script. 
  header( "Location: $url" ) ; 
  exit() ;
}
// Create a function to check email and password 
function validate( $dbcon, $email = '', $psword = '')
{
  // Initiate the array to hold the error messages 
  $errors = array() ; 
  // Has the email been entered?
  if ( empty( $email ) ) 
  { $errors[] = 'You forgot to enter your email' ; 
  } 
  else  { $email = mysqli_real_escape_string( $dbcon, trim( $email) ) ; 
  }
  // Has the password been entered
  if ( empty( $psword ) ) 
  { $errors[] = 'Enter your password.' ; 
  } 
  else { $psword = mysqli_real_escape_string( $dbcon, trim( $psword ) ) ; 
  }
  // If everything is OK select the email and the psword from the members' table
  if ( empty( $errors ) ) 
  {
  	echo "no errors so far";
    $q = "SELECT email, psword FROM Scientists WHERE email='$email' AND psword='$psword'" ;  
    $result = mysqli_query ( $dbcon, $q ) ;
    if ( @mysqli_num_rows( $result ) == 1 ) 
    {
      $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ;
      return array( true, $row ) ;
      echo 'FOUND'; 
    }
    // If the user name and password do not match the database record, create an error message
    else { $errors[] = 'The email and password do not match our records.' ; 
          echo 'NOT FOUND'; 

    }
  }
  // Retrieve the error messages
  return array( false, $errors ) ; 
}
