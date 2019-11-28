


<?php
include("../shared/databaseDL.php");
include("../shared/databaseBL.php");





function showSearchPatient($listOfPatient) {
	if ($listOfPatient != 0) {
    // output data of each row	
	$i = 1;
	echo '<table id="gridtable" width="100%">';
	echo '<tr><th>No</th><th>IC</th><th>Name</th><th>Gender</th><th>Age</th><th>Address</th><th>Contact Personal</th><th>Contact Home</th><th>Contact Emergency</th><th>Latest Check Up</th></tr>';
	
    foreach($listOfPatient as $detailOfPatient) {
        echo '<tr>'.'<td>'.$i.'</td>'.'<td>'.$detailOfPatient["patientID"].'</td>'.'<td>'.$detailOfPatient["patientName"].'</td>'.'<td>'.$detailOfPatient["patientGender"].'</td>'.'<td>'.$detailOfPatient["patientAge"].'</td>'.'<td>'.$detailOfPatient["patientAddress"].'</td>'.'<td>'.$detailOfPatient["patientMobile"].'</td>'.'<td>'.$detailOfPatient["patientHome"].'</td>'.'<td>'.$detailOfPatient["patientEmergency"].'</td>'.'<td>'.$detailOfPatient["latestMedicalDate"].'</td>'.'</tr>'; 
    	$i++; 
	}
	echo '</table>';
	} else {
    	echo "<center></br></br></br></br></br>No list of patients</center>";
	}
	
		
}

$patientID = $patientName = $patientAge = $patientGender = $medicalDate = "";






if (isset($_GET['patientID'])) {
   $patientID = test_input($_GET["patientID"]);
   $patientName = test_input($_GET["patientName"]);
   $patientAge = test_input($_GET["patientAge"]);
   $patientGender = test_input($_GET["patientGender"]);
   $medicalDate = test_input($_GET["medicalDate"]);

}



$lisfOfPatient = getListOfPatient($patientID,$patientName,$patientAge,$patientGender,$medicalDate);

showSearchPatient($lisfOfPatient);




?>




