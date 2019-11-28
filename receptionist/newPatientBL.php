<?php
include("../shared/databaseDL.php");
include("../shared/databaseBL.php");

function showAddPatientSuccessRedirect($flag, $patientID) {
	if ($flag) {
	    header("Location: returningPatientBL.php?patientID=".$patientID."");

	} else {
	echo "<script>
    alert(\"Patient already registered. Please check if field correctly filled or please register as returning patient.\");
 window.history.back(); </script>";
 	}
} 

$patientID=$patientName=$patientAge=$patientGender=$patientBloodType=$patientAddress=$patientDescription=$patientMobile=$patientEmergency=$patientHome=$patientBirthDate=$patientOccupation=$patientHeight=$patientWeigth = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$patientID = test_input($_POST["patientID"]);
    $patientName = test_input($_POST["patientName"]);
    $patientAge = test_input($_POST["patientAge"]);
    $patientGender = test_input($_POST["patientGender"]);
    $patientBloodType = test_input($_POST["Selection"]);
    $patientBloodType .= test_input($_POST["blood"]);
    $patientAddress = test_input($_POST["patientAddress"]);
    $patientDescription = test_input($_POST["patientDescription"]);
    $patientEmergency = test_input($_POST["patientEmergency"]);
    $patientMobile = test_input($_POST["patientMobile"]);
	$patientHome = test_input($_POST["patientHome"]);

    $patientEmergency = test_input($_POST["patientEmergency"]);
    $patientBirthDate = test_input($_POST["patientBirthDate"]);
    $patientOccupation = test_input($_POST["patientOccupation"]);
    $patientHeight = test_input($_POST["patientHeight"]);
    $patientWeigth = test_input($_POST["patientWeigth"]);


}


if ( $patientID != "") {
	$flag=addPatient($patientID,$patientName,$patientAge,$patientGender,$patientBloodType,$patientAddress,$patientDescription,$patientMobile,$patientEmergency,$patientEmergency,$patientBirthDate,$patientOccupation,$patientHeight,$patientWeigth);
	showAddPatientSuccessRedirect($flag, $patientID);
}

?>

