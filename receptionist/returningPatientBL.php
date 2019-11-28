<?php
include("../shared/databaseDL.php");
include("../shared/databaseBL.php");

function showRegisterSuccess($flag) { 
	if ($flag) {
		echo "<script>
    	alert(\"Patient successfully registered.\");
 		window.location.href='./receptionistMain.php'; </script>";
	} else {
		echo "<script>
   		alert(\"Patient already registered.\");
		window.location.href='./returningPatient.php'; </script>";
	}
} 

function createMedicalNumber($latestID) {
	if ($latestID != 1) {
		$latestID++;
		return $latestID;
	}
	return 1;
}



$patientID = "";

if (isset($_GET['patientID'])) {
	$patientID = test_input($_GET['patientID']);
} else if (isset($_POST['patientID'])) {
	$patientID =test_input($_POST['patientID']);
}

if ($patientID != "") {

	$latestID = getLatestNumberFromMedical($patientID);
	if($latestID != false) {
		$latestID = createMedicalNumber($latestID); 
		$latestID = addMedical($patientID, $latestID);
	}
	
	showRegisterSuccess($latestID);
}




?>
