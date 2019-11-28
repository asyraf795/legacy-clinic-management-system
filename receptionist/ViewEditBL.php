
<?php
include("../shared/databaseDL.php");
include("../shared/databaseBL.php");

function editPatientSuccess($flag) {
	if($flag) {
		echo "<script>
  	    alert(\"Patient Detail successfully updated.\");
        window.location.href='./returningPatient.php'; </script>";
	} else {
		echo "<script>
    	alert(\"Patient ID is registered to another patient.\");
 		window.history.back.refresh(); </script>";
	}


}

function showPatient($detailOfPatient, $enabled) {
	if ($enabled) {
	echo '<input type="hidden" name="patientOldID" value="'.$detailOfPatient["patientID"].'"> 
	<div align="right"><input id = "edit" onClick="editForm()" type="button" value="Edit" >';}echo '</div><br><table width="100%" id="gridtable">
    <tr>
        <th colspan="4">Patient\'s Details</th>
    </tr>
    <tr>
        <td>Full Name:</td>
        <td><input class = "info" type="text" name="patientName" value="'.$detailOfPatient["patientName"].'" readonly required></td>
        <td>IC:</td>
        <td><input class = "info" type="text" name="patientID" value="'.$detailOfPatient["patientID"].'" readonly required></td>
    </tr>
    <tr>
        <td>Birth Date:</td>
        <td><input class = "info" type="text" name="patientBirthDate" value="'.$detailOfPatient["patientBirthDate"].'" readonly required></td>
        <td>Age:</td>
        <td><input class = "info" type="text" name="patientAge" value="'.$detailOfPatient["patientAge"].'" readonly required></td>
    </tr>
	<tr>
        <td>Weight(KG): </td>
        <td ><input type="number" class = "info"  step="0.1" min="0.1" max="300" name="patientWeigth" value="'.$detailOfPatient["patientWeigth"].'"  readonly required></td>
        <td>Height(m):</td>
        <td ><input type="number" class = "info" step="0.1" min="0.1" max="300" name="patientHeight" value="'.$detailOfPatient["patientHeight"].'"   readonly required></td>
    </tr>
    <tr>
        <td>Sex:</td>
        <td><input class = "info" type="text" name="patientGender" value="'.$detailOfPatient["patientGender"].'" readonly required></td>
        <td>Blood Group:</td>
        <td><input class = "info" type="text" name="patientBloodType" value="'.$detailOfPatient["patientBloodType"].'" readonly required></td>
    </tr>
    <tr>
        <td>Patient\'s Description:</td>
        <td colspan="3"><input class = "info" type="text" name="patientDescription" value="'.$detailOfPatient["patientDescription"].'" readonly required></td>
    </tr>
    <tr>
        <th colspan="4">Other Details</th>
    </tr>
    <tr>
        <td>Address:</td>
        <td colspan="3"><input class = "info" type="text" name="patientAddress" value="'.$detailOfPatient["patientAddress"].'" readonly required></td>
    </tr>
    <tr>
        <td>Contact Number(Mobile):</td>
        <td><input class = "info" type="text" name="patientMobile" value="'.$detailOfPatient["patientMobile"].'" readonly required></td>
        <td>Contact Number(Home):</td>
        <td><input class = "info" type="text" name="patientHome" value="'.$detailOfPatient["patientHome"].'" readonly required></td>
    </tr>
    <tr>
        <td>Emergency Contact:</td>
        <td><input class = "info" type="text" name="patientEmergency" value="'.$detailOfPatient["patientEmergency"].'" readonly required></td>
        <td>Occupation:</td>
        <td><input class = "info" type="text" name="patientOccupation" value="'.$detailOfPatient["patientOccupation"].'" readonly required></td>
    </tr>
</table><br>';
	if ($enabled) {
		echo '<div align="right"><input type="submit" id = "submit" disabled="true"></div>';


	}
}


if(isset($_GET['edit'])) {
	
	$detailOfPatient= getPatient($_GET['patientID']);
	showPatient($detailOfPatient, true);
 

}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$patientOldID = $patientID=$patientName=$patientAge=$patientGender=$patientBloodType=$patientAddress=$patientDescription=$patientMobile=$patientEmergency=$patientHome=$patientBirthDate=$patientOccupation=$patientHeight=$patientWeight = "";
	
	$patientOldID = test_input($_POST["patientOldID"]);
	$patientID = test_input($_POST["patientID"]);
	$patientOldID = test_input($_POST["patientOldID"]);
    $patientName = test_input($_POST["patientName"]);
    $patientAge = test_input($_POST["patientAge"]);
    $patientGender = test_input($_POST["patientGender"]);
    $patientBloodType = test_input($_POST["patientBloodType"]);
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

	$flag = editPatient($patientOldID, $patientID, $patientName, $patientAge, $patientGender, $patientBloodType, $patientAddress, $patientDescription, $patientMobile, $patientEmergency, $patientHome, $patientBirthDate, $patientOccupation, $patientHeight, $patientWeigth);
	editPatientSuccess($flag);
}


?>

