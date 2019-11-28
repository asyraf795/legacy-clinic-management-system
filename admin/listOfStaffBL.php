<?php

include("../shared/databaseDL.php");
include("../shared/databaseBL.php");

function showSearchUser($listOfUser) {
	
	if ($listOfUser != 0) {
		echo '<table id="gridtable" width="100%">';
		echo '<tr><th>No</th><th>ID</th><th>Name</th><th>Domain</th><th>Email</th></tr>';
		$i = 1;
		foreach ($listOfUser as $detailOfUser) {			
		    echo "<tr><td>".$i."</td><td>".$detailOfUser[0]."</td><td>".$detailOfUser[1]."</td><td>".$detailOfUser[3]."</td><td>".$detailOfUser[2]."</td></tr>";
			$i++;
		}
		echo '</table>';
	} else {
		echo '<center></br></br></br></br></br>No Search Found</center>';
	}
	
}
$userID = "";
$userRealName = "";
$userEmail = "";
$userDomain = "";

if (isset($_GET['userID'])) {
	$userID = test_input($_GET["userID"]);
	$userDomain = test_input($_GET["userDomain"]);
	$userRealName = test_input($_GET["userRealName"]);
	$userEmail = test_input($_GET["userEmail"]);
}
 
$listOfUser = getListOfUser($userDomain, $userID, $userRealName, $userEmail);

showSearchUser($listOfUser);
?>