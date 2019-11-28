<?php
include("../shared/databaseDL.php");
include("../shared/databaseBL.php");

function removeDrugSuccess($flag) {
	if ($flag) {
		echo "<script>
    	window.location.href='./removeDrug.php';
		alert(\"Drug successfully removed\");
		</script>";
	} 
	
} 

function editDrugSuccess($flag) {
	if ($flag) {
		echo "<script>
    	alert(\"Drug successfully updated\");
		window.location.href='./editDrug.php';
		</script>";
	} else {
	echo "<script>
    alert(\"drugID already registered. Use another ID\");
	window.location.href='./editDrug.php';
	</script>";
	}
}

function getEditRemove($detailOfDrug, $editRemove) {

	if ($detailOfDrug) {
		$requiredReadOnly = "";
		if ($editRemove == 1) {
			$requiredReadOnly = "required";
		} else {
			$requiredReadOnly = "readonly";
		}
		echo "<br><b>Edit/Remove Drug Table</b></br><br>	
		<table border=\"1\" id=\"gridtable\">
        <tbody>
		<input type=\"hidden\" name=\"drugOldID\" value=".$detailOfDrug[0].">
        <tr>
        <td align=\"right\">ID:</td><td><input type=\"text\" name=\"drugID\" value=\"".$detailOfDrug[0]."\" ".$requiredReadOnly."></td>
        </tr>
        <tr>
        <td align=\"right\">Name:</td><td><input type=\"text\" name=\"drugName\" value=\"".$detailOfDrug[1]."\" ".$requiredReadOnly."></td>        
		</tr>
        <tr>
        <td align=\"right\">Form:</td><td><input type=\"text\" name=\"drugForm\" value=\"".$detailOfDrug[2]."\" ".$requiredReadOnly."></td>        
		</tr>
		<tr>
        <td align=\"right\">Dose:</td><td><input type=\"text\" name=\"drugDose\" value=\"".$detailOfDrug[3]."\" ".$requiredReadOnly."></td>        
		</tr>

        <tr>
        <td align=\"right\">Volume/Amount:</td><td><input type=\"number\" name=\"drugQuantity\" value=\"".$detailOfDrug[4]."\" ".$requiredReadOnly."></td>
		</tr>
        <tr>
        <td align=\"right\">Quantity:</td><td><input type=\"number\" name=\"drugPrice\" value=\"".$detailOfDrug[5]."\" ".$requiredReadOnly."></td>
		</tr>
        </tbody>
        </table>

		";		;	
		
		if ($editRemove == 1) {
			echo	'<div align=""><br>
			<input type="Submit" name="submit" value ="Edit"></div>
			</div>';

		} else if ($editRemove == 2) {
			echo '<br><input type="Submit" name="submit" value ="Remove">';

		}

	}
	
}

function selectionDrugID ($listOfDrugID) {
	if ($listOfDrugID != 0) {
	echo "<select name=\"drugID\" onchange=\"showUser(this.value)\">     <option selected=\"true\" style=\"display:none;\">Select Drug ID</option>";
    for ($i = 0; $i < count($listOfDrugID) ; $i++) {
        echo '<option value='.$listOfDrugID[$i].'>'.$listOfDrugID[$i].'</option>';
		
	}
	echo "</select>";
} else {
    echo "<center></br></br></br></br></br>No Staff In Database</center>";
}	
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_POST['submit'] == "Remove") {
		$flag = removeDrug(test_input($_POST['drugID']));
		removeDrugSuccess($flag);		
	} else if ($_POST['submit'] == "Edit") {
		$flag = editDrug(test_input($_POST['drugID']), test_input($_POST['drugName']), test_input($_POST['drugForm']), test_input($_POST['drugDose']), test_input($_POST['drugQuantity']), test_input($_POST['drugPrice']),  test_input($_POST['drugOldID']));
		editDrugSuccess($flag);
	}
}

if (isset($_GET['drugID'])) {
	$detailOfDrug = getDrug(test_input($_GET['drugID']));
	getEditRemove($detailOfDrug, $_GET['editRemove']);
}
	
?>

