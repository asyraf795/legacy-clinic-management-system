<?php 
include("../shared/databaseDL.php");
include("../shared/databaseBL.php");
function showPrescription($detailOfPrescription) {
	
	if ($detailOfPrescription != 0) {
    // output data of each row	
	echo '
	<div id="gridtable">
	<table>
	<tbody>
	

	<tr>
	<td align="right"><b>Received Status</b></td><td><input type="text" name="prescriptionStatus" value="'.$detailOfPrescription[0]['prescriptionStatus'].'" readonly></td>
	</tr>
	
	
	</tbody>
	</table>
	<br>';
	
	echo '<div align="center"><table width = "70%">';
	echo '<tr><th>No</th><th>Drug ID</th><th>Name</th><th>Description</th>';
	$i = 1;
	foreach ($detailOfPrescription as $detailerPrescription) {
		echo '<tr><td>'.$i.'</td><td><input type="text" name="drugID'.$i.'" value = "'.$detailerPrescription['drugID'].'" readonly></td><td>'.$detailerPrescription['prescriptionDescription'].'</td><td><input type="number"  value = "'.$detailerPrescription['prescriptionQuantity'].'" min="1" max="999" name="prescriptionQuantity'.$i.'" required></td></tr>';
		$i++;
	}
	echo '</table></div></div> <br><div align="right"><input name="complete" type="submit" value="Complete"><div>';
	} else {
    echo "<center></br></br></br></br></br>No result found</center>";
	}	
}

function getPrescription($patientID, $medicalDate) {
	$servername = "localhost";
	$username = "client";
	$password = "client123";
	$dbname = "cmsDB";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	$sql="SELECT prescriptionTable.drugID, drugName, prescriptionDescription, prescriptionStatus, billStatus FROM drugTable, prescriptionTable, billTable, medicalTable WHERE medicalDate LIKE '$medicalDate' and medicalTable.patientID = '$patientID' and prescriptionTable.drugID = drugTable.drugID and medicalTable.medicalID = prescriptionTable.medicalID;";

	$result = (mysqli_query($conn, $sql));
	$detailOfPrescription;
	if (mysqli_num_rows($result) > 0) {
		$i = 0;
	    while($row = mysqli_fetch_assoc($result)) {	
			$detailOfPrescription[$i][0] = $row['billStatus'];
			$detailOfPrescription[$i][1] = $row['prescriptionStatus'];
			$detailOfPrescription[$i][2] = $row['drugID'];
			$detailOfPrescription[$i][3] = $row['drugName'];
			$detailOfPrescription[$i][4] = $row['prescriptionDescription'];
			$i++;
		}

		
		mysqli_close($conn);
		return $detailOfPrescription;

	} else {
		mysqli_close($conn);
		return 0;	
	}

}

function selectionPrescription($listOfMedicalDate, $patientID) {

	if ($listOfMedicalDate != 0) {	
	echo "<input type=\"hidden\" name=\"medicalID\" value=\"".$listOfMedicalDate[0][1]."\"><select name=\"medicalDate\" onchange=\"showUser(".$listOfMedicalDate[0][1].", ".$patientID.")\">    
	<option selected=\"true\" style=\"display:none;\">Select Date</option>";
		foreach($listOfMedicalDate as $medical) {
        	echo '<option value='.$medical[0].'>'.$medical[0].'</option>';	
		
		}
		echo "</select>";
	} else {
    echo "<center></br></br></br></br></br>No Record</center>";
	}







}

function deliverPrescription($billStatus, $prescriptionStatus) {
	$servername = "localhost";
	$username = "client";
	$password = "client123";
	$dbname = "cmsDB";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

}

function deliverPrescriptionSuccess($flag) {
	


}

function checkStatus($billStatus, $prescriptionStatus) {
	if ($billStatus == "paid" && $prescriptionStatus == "not received") {
		return 2;
	} else if ($billStatus == "not paid") {
		return 1;
	} else {
		return 3;
	
	
	}

}


if (isset($_POST['view'])) {
	$listOfMedicalDate = getPrescriptionDate(test_input($_POST['patientID']));
	selectionPrescription($listOfMedicalDate, test_input($_POST['patientID']));
}

if (isset($_GET['medicalID'])) {
	$listOfPrescription = getPrescriptionList(test_input($_GET['medicalID']), test_input($_GET['patientID']));
	showPrescription($listOfPrescription);


}

if (isset($_POST['complete'])) {
	if($_POST['prescriptionStatus']=='not received') {
		echo 123213123213;
	$numOfPrescription = numOfPrescription($_POST['medicalID']);
	for($i = 1; $i <= $numOfPrescription; $i++) {
		
		$drugID = test_input($_POST["drugID".$i]);
		$prescriptionQuantity = test_input($_POST["prescriptionQuantity".$i]);	
		$flag = checkDrugAvailibility($prescriptionQuantity, $drugID);
		if (!$flag) {
			echo "<script>
			alert(\"Error. Please check back the prescription quantity\");
			window.history.back();		
			</script>";
		
		} else {	
			for($i = 1; $i <= $numOfPrescription; $i++) {
		
				$drugID = test_input($_POST["drugID".$i]);
				$prescriptionQuantity = test_input($_POST["prescriptionQuantity".$i]);		
				$flag = distributePrescription($prescriptionQuantity, $drugID, test_input($_POST['medicalID']));
				if ($flag) {
					echo "<script>
					alert(\"Successfully Distribute\");
					window.location.href='./patientPrescription.php';					
					</script>";		
				}

			}
		}
	}
	} else {
		
		header("location: ../main.php");
	}

}


?>














