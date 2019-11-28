<?php
include("../shared/databaseDL.php");
include("../shared/databaseBL.php");



function addDrugSuccess($flag) {
	if ($flag) {
	echo "<script>
    alert(\"Drug successully added\");
	window.location.href='./addDrug.php';
	</script>";
	} else {
	echo "<script>
    alert(\"drugID already registered. Use another ID\");
	window.location.href='./addDrug.php';
	</script>";
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$flag = addDrug(test_input($_POST["drugID"]), test_input($_POST["drugName"]), test_input($_POST["drugForm"]), test_input($_POST["drugDose"]), test_input($_POST["drugQuantity"]), test_input($_POST["drugPrice"]));
	
	addDrugSuccess($flag);
	
	}




