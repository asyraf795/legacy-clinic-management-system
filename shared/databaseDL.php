<?php
//admin
function getUserID() {
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
	
	$sql = "select t.userID from usertable, (select * from pharmacisttable union select * from receptionisttable union select * from doctortable union select * from admintable) as t where userTable.userID = t.userID and userTable.userID != 'superAdmin'";
	
	$result = (mysqli_query($conn, $sql));
	$listOfUserID;
	if (mysqli_num_rows($result) > 0) {
		$i = 0;
	    while($row = mysqli_fetch_assoc($result)) {	
			$listOfUserID[$i] = $row['userID'];
			$i++;
		}

		
		mysqli_close($conn);
		return $listOfUserID;

	} else {
		mysqli_close($conn);
		return 0;	
	}

}

function getUser($userID) {
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
	
	$sql = "select t.userID, userRealName, userEmail, userDomain from usertable, (select * from pharmacisttable union select * from receptionisttable union select * from doctortable union select * from admintable) as t where userTable.userID = t.userID and userTable.userID = '$userID'";
	$result = (mysqli_query($conn, $sql));
	$detailOfUser;
	if (mysqli_num_rows($result) > 0) {
	    $row = mysqli_fetch_assoc($result);
		$detailOfUser[0] = $row['userID'];
		$detailOfUser[1] = $row['userRealName'];
		$detailOfUser[2] = $row['userEmail'];
		$detailOfUser[3] = $row['userDomain'];
		
		mysqli_close($conn);
		return $detailOfUser;

	} else {
		mysqli_close($conn);
		return 0;	
	}

}

function removeUser($userID) {
	$servername = "localhost";
	$username = "client";
	$password = "client123";
	$dbname = "cmsDB";
	$sql = "DELETE FROM userTable WHERE userID = '$userID';";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		return true;
	}
	mysqli_close($conn);
	return false;

}

function resetUserPass($userID, $userPass) {
	$servername = "localhost";
	$username = "client";
	$password = "client123";
	$dbname = "cmsDB";	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "UPDATE userTable SET userPass = '$userPass' WHERE userID = '$userID'";
	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		return true;
	}
	mysqli_close($conn);
	return false;
}

function editUser($userID, $userRealName, $userEmail, $userDomain) {
	$servername = "localhost";
	$username = "client";
	$password = "client123";
	$dbname = "cmsDB";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	
	$sql = "UPDATE ".$userDomain."Table SET userRealName = '$userRealName', userEmail = '$userEmail' WHERE userID = '$userID'";
	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		return true;
	}
	
	mysqli_close($conn);
	return false;

}

function addUser ($userID, $userPass, $userRealName, $userEmail, $userDomain) {
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
	
	$sql = "SELECT userID FROM (select * from pharmacisttable union select * from receptionisttable union select * from doctortable union select * from admintable) as t WHERE t.userID = '$userID'";
	
	
	$result = (mysqli_query($conn, $sql));
	if (mysqli_num_rows($result) == 0) {
		if ($userDomain == 'admin') {
			$sql = "INSERT INTO adminTable (userID, userRealName, userEmail)VALUES ('$userID', '$userRealName', '$userEmail');";
		} else if ($userDomain == 'doctor') {
			$sql = "INSERT INTO doctorTable (userID, userRealName, userEmail)VALUES ('$userID', '$userRealName', '$userEmail');";
		} else if ($userDomain == 'pharmacist') {
			$sql = "INSERT INTO pharmacistTable (userID, userRealName, userEmail)VALUES ('$userID', '$userRealName', '$userEmail');";
		} else if ($userDomain == 'receptionist') {
			$sql = "INSERT INTO receptionistTable (userID, userRealName, userEmail)VALUES ('$userID', '$userRealName', '$userEmail');";	
		}	
		$sql .= "INSERT INTO userTable (userID, userPass, userDomain) VALUES ('$userID','$userPass', '$userDomain');";
		if (mysqli_multi_query($conn, $sql)) {
			mysqli_close($conn);
			return true;
		}

	} else {
		mysqli_close($conn);
		return false;
	}
	
}

function getListOfUser($userDomain, $userID, $userRealName, $userEmail) {

	$sql = "select t.userID, userDomain, userEmail, userRealName from usertable, (select * from pharmacisttable union select * from receptionisttable union select * from doctortable union select * from admintable) as t where userTable.userID = t.userID and userTable.userID != 'superAdmin'";
 
	if ($userID != "") {	
		$sql .= " and userTable.userID Like '%$userID%'";		
	}
	if ($userDomain != "") {	
		$sql .= " and userDomain Like '%$userDomain%'";		
	}

	if ($userRealName != "") {	
		$sql .= " and userRealName Like '%$userRealName%'";		
	}
	if ($userEmail != "") {	
		$sql .= " and userEmail Like '%$userEmail%'";		
	}

	$sql .= " ORDER BY t.userID";
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

	$result = (mysqli_query($conn, $sql));
	$listOfStaff;
	if (mysqli_num_rows($result) > 0) {
		$i = 0;
	    while($row = mysqli_fetch_assoc($result)) {		
			
			$listOfStaff[$i][0] = $row['userID'];
			$listOfStaff[$i][1] = $row['userRealName'];
			$listOfStaff[$i][2] = $row['userEmail'];
			$listOfStaff[$i][3] = $row['userDomain'];
			$i++;
		}				

		
		mysqli_close($conn);
		return $listOfStaff;

	} else {
		mysqli_close($conn);
		return 0;	
	}

}




//pharmacist

function getListOfDrug($drugID, $drugName, $drugForm, $drugQuantityLow, $drugQuantityHigh, $drugPriceLow, $drugPriceHigh, $drugDose) {

	$sql = "select * from drugTable where drugPrice != \"\"";
	
	if ($drugID != "") {	
		$sql .= " and drugID Like '%$drugID%'";		
	}
	if ($drugName != "") {	
		$sql .= " and drugName Like '%$drugName%'";		
	}
	if ($drugQuantityLow != "") {	
		$sql .= " and drugQuantity >= '$drugQuantityLow'";		
	}	
	if ($drugQuantityHigh != "") {	
		$sql .= " and drugQuantity <= '$drugQuantityHigh'";		
	}
	if ($drugPriceLow != "") {	
		$sql .= " and drugPrice >= '$drugPriceLow'";		
	}
	if ($drugPriceHigh != "") {	
		$sql .= " and drugPrice <= '$drugPriceHigh'";		
	}
	if ($drugDose != "") {	
		$sql .= " and drugDose Like '%$drugDose%'";		
	}
	if ($drugForm != "") {	
		$sql .= " and drugForm Like '%$drugForm%'";		
	}

	
	$sql .= " ORDER BY drugID";

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

	$listOfDrug;
	if (mysqli_num_rows($result) > 0) {
		$i = 0;
	    while($row = mysqli_fetch_assoc($result)) {		
			
			$listOfDrug[$i][0] = $row['drugID'];
			$listOfDrug[$i][1] = $row['drugName'];
			$listOfDrug[$i][2] = $row['drugForm'];
			$listOfDrug[$i][3] = $row['drugDose'];
			$listOfDrug[$i][4] = $row['drugQuantity'];
			$listOfDrug[$i][5] = $row['drugPrice'];

			$i++;
		}				

		
		mysqli_close($conn);
		return $listOfDrug;

	} else {
		mysqli_close($conn);
		return 0;	
	}


}

function addDrug($drugID, $drugName, $drugForm, $drugDose, $drugQuantity, $drugPrice) {
	
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
	$sql = "SELECT * FROM drugTable WHERE drugID = '$drugID'";

	$result = mysqli_query($conn, $sql);
echo $sql;
	
	if (mysqli_num_rows($result) < 1){
		$sql = "INSERT into drugTable (drugID, drugName, drugForm, drugDose, drugQuantity, drugPrice) VALUES ('$drugID', '$drugName', '$drugForm', '$drugDose', '$drugQuantity', '$drugPrice')";

	} else {
		$sql = "SELECT drugID FROM drugTable WHERE drugID = '$drugID' and drugName = '$drugName' and drugForm = '$drugForm' and drugDose = '$drugDose' and drugQuantity = \"0\" and drugPrice = \"0\"; ";
		$result = mysqli_query($conn, $sql);
echo $sql;
		if (mysqli_num_rows($result) > 0) {
			$sql = "UPDATE drugTable SET drugQuantity = '$drugQuantity', drugPrice = '$drugPrice' WHERE drugID= '$drugID'";
		} else {
			mysqli_close($conn);
			return false;
		}
	}
	if (mysqli_query($conn, $sql)) {echo $sql;
		mysqli_close($conn);
		return true;
	}
	
	mysqli_close($conn);
	return false;

	
}

function getDrugID() {
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
	
	$sql = "select drugID FROM drugTable WHERE drugPrice != \"\"";
	
	$result = (mysqli_query($conn, $sql));
	$listOfDrugID;
	if (mysqli_num_rows($result) > 0) {
		$i = 0;
	    while($row = mysqli_fetch_assoc($result)) {	
			$listOfDrugID[$i] = $row['drugID'];
			$i++;
		}

		
		mysqli_close($conn);
		return $listOfDrugID;

	} else {
		mysqli_close($conn);
		return 0;	
	}

}

function editDrug($drugID, $drugName, $drugForm, $drugDose, $drugQuantity, $drugPrice, $drugOldID) {
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
	$sql = "SELECT drugID FROM drugTable WHERE drugID = '$drugOldID' and NOT EXISTS (SELECT * FROM prescriptionTable WHERE prescriptionTable.drugID = drugTable.drugID);";
	
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
		$sql = "UPDATE drugTable SET drugID = '$drugID', drugName = '$drugName', drugForm = '$drugForm', drugDose = '$drugDose', drugQuantity = '$drugQuantity', drugPrice = '$drugPrice' WHERE drugID = '$drugOldID' ";
		
	} else {
		$sql = "SELECT drugID FROM drugTable WHERE drugID = '$drugOldID' and drugName = '$drugName' and drugForm = '$drugForm' and drugDose = '$drugDose' and drugQuantity != \"0\" and drugPrice != \"0\";";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			$sql = "UPDATE drugTable SET drugQuantity = '$drugQuantity' and drugPrice = '$drugPrice';";
		} else {
			mysqli_close($conn);
			return false;
		}
	}
	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		return true;
	}

	mysqli_close($conn);
	return false;


}

function removeDrug($drugID) {
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
	$sql = "SELECT drugID FROM drugTable WHERE drugID = '$drugID' and NOT EXISTS (SELECT * FROM prescriptionTable WHERE prescriptionTable.drugID = drugTable.drugID);";
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$sql = "DELETE FROM drugTable WHERE drugID = '$drugID';";
		
	} else {
		$sql = "UPDATE drugTable SET drugQuantity = \"0\" , drugPrice = \"0\" WHERE drugID = '$drugID';";
		
	}
	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		return true;
	}

	mysqli_close($conn);
	return false;


}

function getDrug($drugID) {
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
	
	$sql = "select * from drugTable where drugQuantity != \"\" and drugPrice != \"\" and drugID = '$drugID'";

	$result = (mysqli_query($conn, $sql));
	$detailOfDrug;
	if (mysqli_num_rows($result) > 0) {
	    $row = mysqli_fetch_assoc($result);
		$detailOfDrug[0] = $row['drugID'];
		$detailOfDrug[1] = $row['drugName'];
		$detailOfDrug[2] = $row['drugForm'];
		$detailOfDrug[3] = $row['drugDose'];
		$detailOfDrug[4] = $row['drugQuantity'];
		$detailOfDrug[5] = $row['drugPrice'];
		
		mysqli_close($conn);
		return $detailOfDrug;

	} else {
		mysqli_close($conn);
		return 0;	
	}

}

function getPrescriptionDate($patientID) {

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
	$sql = "select Distinct medicalDate, medicalTable.medicalID from medicalTable, prescriptionTable where medicalTable.medicalID = prescriptionTable.medicalID and medicalTable.patientID = '$patientID'";

	$result = mysqli_query($conn, $sql);


	$listOfMedicalDate = "";
	if (mysqli_num_rows($result) > 0) {
		$i = 0;
   		while($row = mysqli_fetch_assoc($result)) {
			$listOfMedicalDate[$i][0] = $row["medicalDate"];
			$listOfMedicalDate[$i][1] = $row["medicalID"];
			$i++;
		}
		mysqli_close($conn);
		return $listOfMedicalDate;
	}

	mysqli_close($conn);
	return 0;	
}

function getPrescriptionList($medicalDate, $patientID) {
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
	$sql = "SELECT drugID, prescriptionDescription, prescriptionStatus, medicalID, prescriptionQuantity FROM prescriptionTable WHERE medicalID = '$medicalDate'; ";
	$result = mysqli_query($conn, $sql);
	$listOfDrug = "";
	$i = 0;
	if (mysqli_num_rows($result) > 0) {
    	while($listOfDrug[$i] = mysqli_fetch_assoc($result)) {
			$i++;
		}
		unset($listOfDrug[$i]);	
		mysqli_close($conn);
		return $listOfDrug;
	}
	mysqli_close($conn);
	return 0;

}

function numOfPrescription($medicalID) {
	$sql="SELECT count(*) as numOfPrescription From prescriptionTable where medicalID = '$medicalID'";	
	$servername = "localhost";
	$username = "client";
	$password = "client123";
	$dbname = "cmsDB";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	
	$result = mysqli_query($conn, $sql);
	$numOfPrescription;
	if (mysqli_num_rows($result) > 0) {
		$numOfPrescription = mysqli_fetch_assoc($result);

		return $numOfPrescription['numOfPrescription'];
	}
	return 0; 
}

function checkDrugAvailibility($prescriptionQuantity, $drugID) {
	$sql="SELECT * From drugTable where drugQuantity >= '$prescriptionQuantity' and drugID = '$drugID'";	
	$servername = "localhost";
	$username = "client";
	$password = "client123";
	$dbname = "cmsDB";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		
		return true;
	}
	return false; 

}

function distributePrescription($prescriptionQuantity, $drugID, $medicalID) {
	$sql = "UPDATE prescriptionTable SET prescriptionQuantity = '$prescriptionQuantity' WHERE drugID = '$drugID' and medicalID = '$medicalID'";
	$servername = "localhost";
	$username = "client";
	$password = "client123";
	$dbname = "cmsDB";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	
	$result = mysqli_query($conn, $sql);
	$sql ="UPDATE drugTable SET drugQuantity = (drugQuantity-'$prescriptionQuantity') WHERE drugID = '$drugID'";
	
	
	$result = mysqli_query($conn, $sql);
	$sql ="UPDATE prescriptionTable SET prescriptionStatus = 'received' WHERE medicalID = '$medicalID'";
	
	
	$result = mysqli_query($conn, $sql);


	if ($result) {
		return true;
			
	}
	return false;
}

//Receptionist

function addPatient($patientID,$patientName,$patientAge,$patientGender,$patientBloodType,$patientAddress,$patientDescription,$patientMobile,$patientHome,$patientEmergency,$patientBirthDate,$patientOccupation,$patientHeight,$patientWeigth) {
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

	$sql = "INSERT INTO `patienttable`(`patientID`, `patientName`, `patientAge`, `patientGender`, `patientHeight`, `patientWeigth`, `patientAddress`, `patientDescription`, `patientBloodType`, `patientMobile`, `patientEmergency`, `patientHome`, `patientOccupation`, `patientBirthDate`) VALUES ('$patientID', '$patientName', '$patientAge', '$patientGender', '$patientHeight', '$patientWeigth', '$patientAddress', '$patientDescription', '$patientBloodType', '$patientMobile', '$patientEmergency', '$patientHome', '$patientOccupation', '$patientBirthDate');";


	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);

		return true;
	} else {
		mysqli_close($conn);
echo $sql;
		return false;
	}
}

function getListOfPatient($patientID, $patientName, $patientAge, $patientGender, $medicalDate) {
	$sql = "select patientTable.patientID, patientName, patientGender, patientAge, patientAddress, patientMobile, patientHome, patientEmergency, latestMedicalDate from patientTable, (SELECT patientID, MAX(medicalDate) as latestMedicalDate FROM medicalTable GROUP BY patientID) as T where patientTable.patientID = T.patientID";
	
	if ($patientID != "") {	
		$sql .= " and patientTable.patientID Like '%$patientID%'";
	} 
	if ($patientAge != "") {
		$sql .= " and patientAge Like '$patientAge'";
	} 
	if ($patientGender != "") {
		$sql .= " and patientGender Like '%$patientGender%'";
	} 
	if ($patientName != "") {
		$sql .= " and patientName Like '%$patientName%'";
	}
    if ($medicalDate != null) {
		$sql .= " and latestMedicalDate like '%$medicalDate%'";
	}
	$sql .= " ORDER BY patientName";
	
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
	$listOfPatient;
	if (mysqli_num_rows($result) > 0) {
		$i = 0;
		while ($listOfPatient[$i] = mysqli_fetch_assoc($result)) {
			$i++;
		}
		unset($listOfPatient[$i]);
		
	} else {
		$listOfPatient = 0;
	}
	mysqli_close($conn);
	return $listOfPatient;
}

function getLatestNumberFromMedical($patientID) {
	$sql = "SELECT * FROM medicalTable WHERE patientID='$patientID' AND medicalDate = CURDATE()";
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
	if (mysqli_num_rows($result) == 0) {
		$sql = "SELECT MAX(medicalID) AS latestID FROM medicalTable"; 
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) == 0) {
			return 1;
		}
		$latestID = mysqli_fetch_assoc($result);
		mysqli_close($conn);

		return $latestID['latestID'];
	} 
	mysqli_close($conn);

	return false;
}

function addMedical($patientID, $latestID) {
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
	echo $latestID;
	$sql = "INSERT into medicalTable (medicalID, patientID, medicalDate) VALUES ('$latestID', '$patientID', CURDATE())";   

	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);

		return true;
	}

	
}

function getPatient($patientID) {
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

	$sql = "SELECT * FROM patientTable WHERE patientID = '$patientID'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) != 0){   
 		$detailOfPatient = mysqli_fetch_assoc($result);
		mysqli_close($conn);

		return $detailOfPatient;
	}
}

function editPatient($patientOldID, $patientID, $patientName, $patientAge, $patientGender, $patientBloodType, $patientAddress, $patientDescription, $patientMobile, $patientEmergency, $patientHome, $patientBirthDate, $patientOccupation, $patientHeight, $patientWeigth) {
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

	$sql = "UPDATE patientTable SET patientID = '$patientID', patientName='$patientName', patientAge='$patientAge', patientGender='$patientGender', patientBloodType='$patientBloodType', patientAddress='$patientAddress', patientDescription='$patientDescription', patientMobile='$patientMobile', patientEmergency='$patientEmergency', patientHome='$patientHome',patientBirthDate='$patientBirthDate', patientOccupation='$patientOccupation', patientHeight='$patientHeight', patientWeigth='$patientWeigth' WHERE patientID = '$patientOldID';";
	if (mysqli_query($conn, $sql)) {
		echo $sql;
		$sql = "UPDATE medicalTable SET  patientID = '$patientID' WHERE  patientID = '$patientOldID';";
		$sql .= "UPDATE appointmentTable SET  patientID = '$patientID' WHERE  patientID = '$patientOldID';";
		$sql .= "UPDATE prescriptionTable SET  patientID = '$patientID' WHERE  patientID = '$patientOldID';";
		mysqli_multi_query($conn, $sql);
		mysqli_close($conn);
		return true;
	} else {
		mysqli_close($conn);
		return false;
	}

}


//Doctor
function getDrAppointment($userID, $appointmentDate) {
	$sql = "select appointmentTable.patientID, patientName, appointmentTable.appointmentDate, appointmentStatus from appointmentTable,(select patientName, patientID from patientTable) as temp where appointmentTable.patientID = temp.patientID and userID = '$userID' and appointmentDate LIKE '%$appointmentDate%' and appointmentDate >= CURDATE() ORDER BY appointmentDate";


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
	$listOfAppointment = "";
	$i = 0;
	if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
			$listOfAppointment[$i][0] = $row["appointmentDate"];
			$listOfAppointment[$i][1] = $row["patientID"];
			$listOfAppointment[$i][2] = $row["patientName"];
			$listOfAppointment[$i][3] = $row["appointmentStatus"];
			$i++;
		}
		mysqli_close($conn);
		return $listOfAppointment;
	}

	mysqli_close($conn);
	return 0;	


}

function getDrugForPrescribe() {
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
		$sql="SELECT drugID, drugName, drugDose, drugForm From drugTable where drugQuantity != \"\" and drugPrice != \"\" order by drugName";	
	
	$result = mysqli_query($conn, $sql);
	$listOfDrug;
	if (mysqli_num_rows($result) > 0) {
		$i = 0;
		while ($listOfDrug[$i] = mysqli_fetch_assoc($result)) {
			$i++;
		}
		unset($listOfDrug[$i]);	
		mysqli_close($conn);
		return $listOfDrug;		
	} 
	mysqli_close($conn);
	return $listOfDrug;	
	
}

function getMedical($patientID) {
	$servername = "localhost";
	$username = "client";
	$password = "client123";
	$dbname = "cmsDB";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	
	$sql="SELECT medicalID, medicalDate From medicalTable where patientID ='$patientID' and userID = '' and medicalDescription = '' and medicalDate = '".date('y-m-d')."'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	
		
		$row = mysqli_fetch_assoc($result);
		mysqli_close($conn);

		return $row;
	
	}
	mysqli_close($conn);

	return 0;
	
}

function editMedical($userID, $medicalDescription, $patientID,$prescriptionDescription,$medicalID) {
	
	$servername = "localhost";
	$username = "client";
	$password = "client123";
	$dbname = "cmsDB";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql = "UPDATE medicalTable SET medicalDescription = '$medicalDescription' WHERE medicalID = '$medicalID'";
	if (mysqli_query($conn, $sql)) {
		$billID ="";
		$sql = "SELECT MAX(billID) as latestBill FROM billTable";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			$bill = mysqli_fetch_assoc($result);
			$billID = $bill['latestBill'] + 1;
		}
		foreach ($prescriptionDescription as $detailOfPrescription) {
			$sql = "INSERT INTO prescriptionTable (medicalID, drugID, patientID, billID, prescriptionDescription, prescriptionStatus) VALUES ('$medicalID', '$detailOfPrescription[0]', '$patientID', '$billID', '$detailOfPrescription[1]', 'not received')";
			mysqli_query($conn, $sql);
		}
		$sql = "INSERT INTO billTable (billID, billStatus) VALUES ('$billID', 'not paid')";
		mysqli_query($conn, $sql);
		mysqli_close();
		return true;
			
	}
		
	
}
	
function numOfDrug() {
	$sql="SELECT count(*) as numOfDrug From drugTable where drugQuantity != \"\" and drugPrice != \"\" order by drugName";	
	$servername = "localhost";
	$username = "client";
	$password = "client123";
	$dbname = "cmsDB";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	
	$result = mysqli_query($conn, $sql);
	$numOfDrug;
	if (mysqli_num_rows($result) > 0) {
		$numOfDrug = mysqli_fetch_assoc($result);

		return $numOfDrug['numOfDrug'];
	}
	return 0; 
	
	
}

function getMedicalID($patientID) {
	$sql = "SELECT medicalID FROM medicalTable WHERE patientID= '$patientID';";
	$servername = "localhost";
	$username = "client";
	$password = "client123";
	$dbname = "cmsDB";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$result = mysqli_query($conn, $sql);
	$listOfMedicalID;
	if (mysqli_num_rows($result) > 0) {
		$i = 0;
		while ($listOfMedicalID[$i] = mysqli_fetch_assoc($result)) {
			$i++;
		}
		unset($listOfMedicalID[$i]);
		
	} else {
		$listOfMedicalID = 0;
	}
	mysqli_close($conn);
	return $listOfMedicalID;
}

function getMedicalRecord($medicalID) {
	$servername = "localhost";
	$username = "client";
	$password = "client123";
	$dbname = "cmsDB";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql="SELECT medicalDate, userRealName, medicalDescription From medicalTable, doctorTable where medicalID ='$medicalID' and medicalTable.userID = doctorTable.userID";
	$result = mysqli_query($conn, $sql);
	$medicalRecord = "";
	if (mysqli_num_rows($result) > 0) {
    	// output data of each row	
		$medicalRecord = mysqli_fetch_assoc($result);
	}
	return $medicalRecord;


}

function getPrescriptionRecord($medicalID) {
	$sql="SELECT drugName, drugDose, drugForm, prescriptionDescription, prescriptionQuantity From drugTable, (SELECT drugID, prescriptionDescription, prescriptionQuantity FROM prescriptionTable Where medicalID = '$medicalID') as tempDrugID where drugTable.drugID = tempDrugID.drugID ";
	$servername = "localhost";
	$username = "client";
	$password = "client123";
	$dbname = "cmsDB";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
    	// output data of each row
		$i = 0;	
		while($medicalRecord[$i] = mysqli_fetch_assoc($result)){
			$i++;	
		}
		unset($medicalRecord[$i]);

	} else {
		$medicalRecord = 0;
	}
	mysqli_close($conn);
	return $medicalRecord;
}
?>
