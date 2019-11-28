<?php

include("../shared/databaseDL.php");
include("../shared/databaseBL.php");


function showEditMedicalSuccess($flag) {
	if ($flag) {
		echo '<script>alert("Successfully checked up patient");</script>';	
	} 
}


if(isset($_POST['submit'])) {
	$listOfPrescription = "";
	$numOfDrug = numOfDrug();
	for($i = 1; $i <= $numOfDrug; $i++) {
		if($_POST['prescriptionDescription'.$i]!="") {
			$listOfPrescription[$i][0] = test_input($_POST["drugID".$i]);
			$listOfPrescription[$i][1] = test_input($_POST["prescriptionDescription".$i]);
			}
	}
	$userID='121212';
	$flag = editMedical(test_input($userID), test_input($_POST['medicalDescription']), test_input($_POST['patientID']), $listOfPrescription, test_input($_POST['medicalID']));
	showEditMedicalSuccess($flag);
	
} else if(isset($_POST['patientID'])) {

	$detailOfMedical = getMedical(test_input($_POST['patientID']));
	if ($detailOfMedical == 0) {
			echo "<script>
    	alert(\"Please ask patient to register at receptionist counter\");
		window.location = window.location.href; 		
		 </script>";
	}
	else {
		echo '<br><center>
		<div id="gridtable" >
		<table  class="container">
		<tbody>
	
		<tr>
		<th>
		Medical Record ID
		</th>
		<td><input type="text" name="medicalID" value="'.$detailOfMedical['medicalID'].'" readonly>
	
		</td>
		</tr>
		<tr>
		<th>
		Date
		</th>
		<td>'.$detailOfMedical['medicalDate'].'
		
		</td>
		</tr>
		<tr>
		<th rowspan="6">
		Description
			</th>
		<td  rowspan="6">
            <textarea name="medicalDescription" class = "text " style="resize:none" ></textarea>
		</td>
		</tr>
	
		</tbody>
		<table></center>
		<br></div>';
		
		
		$listOfDrug = getDrugForPrescribe();
		if($listOfDrug != 0) {
			echo '<right><table border = "1" class = "scroll" width="" height="">';
			echo '<thead><tr><th>No</th><th>ID</th><th>Drug</th><th>Prescription</th></tr></thead><tbody>';
			$i = 1;
			foreach($listOfDrug as $detailOfDrug) {
        		echo '<tr>'.'<td>'.$i.'</td>'.'<td><input type="text" name="drugID'.$i.'" value="'.$detailOfDrug['drugID'].'" readonly></td>'.'<td>'.$detailOfDrug['drugName'].', '.$detailOfDrug['drugDose'].', '.$detailOfDrug['drugForm'].'</td>'.'<td><input type="text"  name="prescriptionDescription'.$i++.'" ></td>'.'</tr>'; 
			} 
			echo '</tbody></table></right><br><br><input type="submit" name="submit">';}

		}
	
	
	
}


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

?>