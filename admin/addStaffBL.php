<?php
include("../shared/databaseDL.php");
include("../shared/databaseBL.php");



function addUserSuccess($flag) {
	if ($flag) {
	echo "<script>
    alert(\"User successully added\");
	window.location.href='./addStaff.php';
	</script>";
	} else {
	echo "<script>
    alert(\"userID already registered. Use another ID\");
	window.location.href='./addStaff.php';
	</script>";
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$flag = addUser(test_input($_POST["userID"]), createUserPass(test_input($_POST["userID"])), test_input($_POST["userRealName"]), test_input($_POST["userEmail"]), test_input($_POST["userDomain"]));
	
	addUserSuccess($flag);
	
}








?>









