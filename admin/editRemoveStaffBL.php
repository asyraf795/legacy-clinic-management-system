<?php
include("../shared/databaseDL.php");
include("../shared/databaseBL.php");

function resetUserPassSuccess($flag) {
	if ($flag) {
		echo "<script>
    	alert(\"User password Resetted\");
		window.location.href='./editStaff.php';
		</script>";
	}	
}

function removeUserSuccess($flag) {
	if ($flag) {
		echo "<script>
    	window.location.href='./removeStaff.php';
		alert(\"User successfully removed\");
		</script>";
	}
	
} 

function editUserSuccess($flag) {
	if ($flag) {
		echo "<script>
    	alert(\"User successfully updated\");
		window.location.href='./editStaff.php';
		</script>";
	}
}

function getEditRemove($detailOfUser, $editRemove) {
	if ($detailOfUser) {
		$requiredReadOnly = "";
		if ($editRemove == 1) {
			$requiredReadOnly = "required";
		} else {
			$requiredReadOnly = "readonly";
		}
		echo "<br><b>Edit/Remove Staff Table</b><br><br>
		<table border=\"1\" id=\"gridtable\">
        <tbody>
        <tr>
        <td align=\"right\">ID:</td><td width=\"200\"><input type=\"text\" name=\"userID\" value=\"".$detailOfUser[0]."\" readonly></td>
        </tr>
        <tr>
        <td align=\"right\">Name:</td><td><input type=\"text\" name=\"userRealName\" onblur=\"this.value=this.value.toUpperCase()\" value=\"".$detailOfUser[1]."\" ".$requiredReadOnly."></td>        
		</tr>
        <tr>
        <td align=\"right\">Email:</td><td><input type=\"text\" name=\"userEmail\" value=\"".$detailOfUser[2]."\" ".$requiredReadOnly."></td>        
		</tr>
        <tr>
		<td align=\"right\">Domain:</td><td><input type=\"text\" name=\"userDomain\" value=\"".$detailOfUser[3]."\" ".$requiredReadOnly.">
		</tr>
        </tbody>
        </table>";	
		
		if ($editRemove == 1) {
			echo	'<div align=""><br>
			<input type="Submit" name="submit" value ="Edit"></div>
			</div>
			<div align=""><br>
			<input type="Submit" name="submit" value ="Reset Password">';
		} else if ($editRemove == 2) {
			echo '<br><input type="Submit" name="submit" value ="Remove">';

		}

	}
	
}

function selectionUserID ($listOfUserID) {
	if ($listOfUserID != 0) {
	echo "<select name=\"userID\" onchange=\"showUser(this.value)\">     <option selected=\"true\" style=\"display:none;\">Select Staff ID</option>";
    for ($i = 0; $i < count($listOfUserID) ; $i++) {
        echo '<option value='.$listOfUserID[$i].'>'.$listOfUserID[$i].'</option>';
		
	}
	echo "</select>";
} else {
    echo "<center></br></br></br></br></br>No Staff In Database</center>";
}	
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_POST['submit'] == "Remove") {
		$flag = removeUser(test_input($_POST['userID']));
		removeUserSuccess($flag);		
	} else if ($_POST['submit'] == "Edit") {
		$flag = editUser(test_input($_POST['userID']), test_input($_POST['userRealName']), test_input($_POST['userEmail']), test_input($_POST['userDomain']));
		editUserSuccess($flag);
	} else if ($_POST['submit'] == "Reset Password") {
		$flag = resetUserPass(test_input($_POST['userID']), createUserPass(test_input($_POST["userID"])));
		resetUserPassSuccess($flag); 
	}
		
}

if (isset($_GET['userID'])) {
	$detailOfUser = getUser(test_input($_GET['userID']));
	getEditRemove($detailOfUser, $_GET['editRemove']);
}
	
?>

