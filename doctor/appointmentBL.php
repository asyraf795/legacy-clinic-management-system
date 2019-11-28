<?php
include("../shared/databaseDL.php");
include("../shared/databaseBL.php");
function showDrAppointment($listOfAppointment) {
	if ($listOfAppointment != 0) {
    // output data of each row	
		$i = 1;
	
		echo '<br><br><table id="gridtable" width="100%">';
		echo '<tr><th>No</th><th>Date</th><th>Patient ID</th><th>Name</th><th>Status</th></tr>';
		foreach ($listOfAppointment as $detailOfAppoinment) {
		    echo '<tr>'.'<td>'.$i.'</td>'.'<td>'.$detailOfAppoinment[0].'</td>'.'<td>'.$detailOfAppoinment[1].'</td>'.'<td>'.$detailOfAppoinment[2].'</td>'.'<td>'.$detailOfAppoinment[3].'</td>'.'</tr>'; 
    	$i++;
		}
	echo '</table>';
	} else {
    	echo "<center></br></br></br></br></br>No appointment</center>";
	}
}

if (isset($_GET['appointmentDate'])) {
	$listOfAppointment = getDrAppointment(test_input($_GET["userID"]), test_input($_GET["appointmentDate"]));
	showDrAppointment($listOfAppointment);
	} else if(isset($_SESSION["userID"])){
		$listOfAppointment = getDrAppointment(test_input($_SESSION["userID"]), "");
		showDrAppointment($listOfAppointment);
} else if(isset($_GET["userID"])){
		$listOfAppointment = getDrAppointment(test_input($_GET["userID"]), "");
		showDrAppointment($listOfAppointment);
}


?>