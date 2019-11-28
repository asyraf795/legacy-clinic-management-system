<?php

include("../receptionist/ViewEditBL.php");

function showMedicalRecord($medicalRecord) {
	if ($medicalRecord != 0) {
		echo '
		<div id="gridtable">
		<table>
		<tbody>
		
		<tr>
		<th>
		Date
		</th>	
		<th>
		Doctor
		</th>
		<th>
		Description
		</th>
		</tr>
		<tr>
		<td>
		'.$medicalRecord['medicalDate'].'
		</td>
		<td>
		'.$medicalRecord['userRealName'].'
		</td>	
		<td>	
		'.$medicalRecord['medicalDescription'].'
		</td>
		</tr>
	
		</tbody>
		<table>
		<br>';
		
		
	
	
	
	}
	
}

function selectedMedicalID ($listOfMedicalID) {
	if ($listOfMedicalID != 0) {
	echo "<select name=\"medicalID\" onchange=\"showUser(this.value)\">     <option selected=\"true\" style=\"display:none;\">Select Medical Record ID</option>";
    foreach ($listOfMedicalID as $medicalID) {
        echo '<option value='.$medicalID['medicalID'].'>'.$medicalID['medicalID'].'</option>';
		
	}
	echo "</select>";
	} 
}

function showPrescriptionRecord($medicalRecord) {
	if ($medicalRecord != 0) {
		$i = 1;
		echo '<table width="100%">';
		echo '<tr><th>No</th><th>Drug Name</th><th>Drug Dose</th><th>Drug Form</th><th>Prescription</th><th>Quantity</th>';
		foreach($medicalRecord as $detailOfMedicalRecord) {
			echo '<tr>'.'<td>'.$i++.'</td>'.'<td>'.$detailOfMedicalRecord["drugName"].'</td>'.'<td>'.$detailOfMedicalRecord["drugDose"].'</td>'.'<td>'.$detailOfMedicalRecord["drugForm"].'</td>'.'<td>'.$detailOfMedicalRecord["prescriptionDescription"].'</td>'.'<td>'.$detailOfMedicalRecord["prescriptionQuantity"].'</td>'.'</tr>'; 
		}
		echo '</table>';
	}
	
	
}


if(isset($_GET['view'])) {
	$detailOfPatient = getPatient($_GET['patientID']);
	showPatient($detailOfPatient, false);
	$listOfMedicalID = getMedicalID($_GET['patientID']); 
	selectedMedicalID($listOfMedicalID);
}

if(isset($_GET['medicalID'])) {
	
	if($_GET['medicalID'] != "") {
		
		$medicalRecord = getMedicalRecord(test_input($_GET['medicalID']));
		showMedicalRecord($medicalRecord);
		$prescriptionRecord = getPrescriptionRecord(test_input($_GET['medicalID']));
		showPrescriptionRecord($prescriptionRecord);
	
	}


}



?>


