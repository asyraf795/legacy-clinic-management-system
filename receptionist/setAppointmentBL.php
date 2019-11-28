<?php 
include("../shared/databaseBL.php");


function getSelectDoctor() {
	$sql = "SELECT doctorTable.userID, userRealName FROM doctorTable, userTable WHERE userTable.userID = doctorTable.userID";
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
	$result = mysqli_query($conn, $sql);
	$listOfDoctor = "";
	$i = 0;
	if (mysqli_num_rows($result) > 0) {
    	while($listOfDoctor[$i] = mysqli_fetch_assoc($result)) {
			$i++;
		}
		unset($listOfDoctor[$i]);	
		mysqli_close($conn);
		return $listOfDoctor;
	}
	mysqli_close($conn);
	return 0;
	
}

function getSelectPatient() {
	
	$sql = "SELECT patientID, patientName FROM patientTable";
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
	$result = mysqli_query($conn, $sql);
	$listOfPatient = "";
	$i = 0;
	if (mysqli_num_rows($result) > 0) {
    	while($listOfPatient[$i] = mysqli_fetch_assoc($result)) {
			$i++;
		}
		unset($listOfPatient[$i]);	
		mysqli_close($conn);
		return $listOfPatient;
	}
	mysqli_close($conn);
	return 0;
	
}

function selectionDoctor ($listOfDoctor, $i) {
	if ($listOfDoctor != 0) {
		
		if ($i == 1) {echo "<select name=\"userID\" onchange=\"showUser(this.value)\" required>  ";
			} else {echo "<select name=\"userID\"  required>  ";
			}
	  echo " <option selected=\"true\" style=\"display:none;\">Select Doctor</option>";
    foreach ($listOfDoctor as $doctor) {
        echo '<option value='.$doctor['userID'].'>'.$doctor['userRealName'].'</option>';
		
	}
	echo "</select>";
} else {
    echo "<center></br></br></br></br></br>No Staff In Database</center>";
}	
}

function selectionPatient ($listOfPatient) {
	if ($listOfPatient != 0) {
	echo "<select name=\"patientID\" required>     <option selected=\"true\" style=\"display:none;\">Select Patient</option>";
    foreach ($listOfPatient as $patient) {
        echo '<option value='.$patient['patientID'].'>'.$patient['patientName'].'</option>';
		
	}
	echo "</select>";
} else {
    echo "<center></br></br></br></br></br>No Patient In Database</center>";
}	
}

function cancelAppointment($appointmentDate, $userID, $patientID) {
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
	$sql = "Select * from appointmenttable where appointmentDate = '$appointmentDate' and userID = '$userID' and patientID='$patientID' ";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) <= 0) {
		return false;
	}
	$sql = "DELETE FROM appointmentTable where appointmentDate = '$appointmentDate' and userID = '$userID' and patientID='$patientID'";

	$result = mysqli_query($conn, $sql);
	if($result) {
		return true;	
	}	
	return false;
	
}
function setAppointment($appointmentDate, $userID, $patientID) {
	$sql = "INSERT INTO appointmentTable (appointmentDate, userID, patientID, appointmentStatus) VALUES ('$appointmentDate', '$userID', '$patientID', 'incomplete')";
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
	$result = mysqli_query($conn, $sql);
	if($result) {
		return true;	
	}	
	return false;
	
}

if (isset($_POST['appointmentSubmit'])) {

	$flag = setAppointment(test_input($_POST['date']), test_input($_POST['userID']), test_input($_POST['patientID']))	;
	if ($flag) {
		echo '<script>
		alert("Appointment successfully set");
		</script>';	
		
	}
	

}
if (isset($_POST['appointmentCancel'])) {

	$flag = cancelAppointment(test_input($_POST['date']), test_input($_POST['userID']), test_input($_POST['patientID']))	;
	if ($flag) {
		echo '<script>
		alert("Appointment successfully cancel");
		</script>';	
		
	}
}



?>
