<?php
// DEFINE('DB_USER', 'mdb53');
// DEFINE('DB_PASS', 'mdb+53');
// DEFINE('DB_HOST', 'localhost');
// DEFINE('DB_DB', 'masakin_1443');

DEFINE('DB_USER', 'myodbc');
DEFINE('DB_PASS', '');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_DB', 'shabdeali');

function connectTo()
{
  /*
 Does -> Connects to data base
 Returns -> Connection object
*/
  $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DB);
  // Check connection
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
  return $con;
}
function sqlReady($input)
{
  /*
 Takes -> Any string
 Returns -> Escapes the string
*/
  $con = connectTo();
  $string = mysqli_real_escape_string($con, $input);
  $con->close();
  return $string;
}
