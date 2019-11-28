<?php
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
$servername = "localhost";
$username = "acaptest";
$password = "";
$dbname = "medical";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 
$mypassword=md5($mypassword);

$mydomain = "";

// To protect MySQL injection (more detail about MySQL injection)
$myusername = test_input($myusername);
$mypassword = test_input($mypassword);
$myusername = mysqli_real_escape_string($conn, $myusername);
$mypassword = mysqli_real_escape_string($conn, $mypassword);
$sql="SELECT * FROM user WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($conn, $sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_start();


$copy = mysqli_fetch_assoc;
$mydomain = test_input($copy['field']);
$_SESSION["myusername"] = $myusername;
$_SESSION["mypassword"] = $mypassword;
$_SESSION["mydomain"] = $mydomain;

if ($mydomain == "doctor"){
}
else if ($mydomain == "receptionist"){
}
else if ($mydomain == "pharmacist"){
}
else if ($mydomain == "admin"){
}

header("location:login_success.php");
}
else {
header( "Location: loginPL.php?status=2" );
}
mysqli_close($conn);

?>
