<?php
include("../shared/databaseBL.php");
function getBillID($patientID){
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
	$sql = "SELECT billTable.billID FROM billTable, prescriptionTable WHERE billTable.billID = prescriptionTable.billID and patientID = '$patientID'";
	
	$result = (mysqli_query($conn, $sql));
	$listOfBillID;
	if (mysqli_num_rows($result) > 0) {
		$i = 0;
	    while($row = mysqli_fetch_assoc($result)) {	
			$listOfBillID[$i] = $row['billID'];
			$i++;
		}

		
		mysqli_close($conn);
		return $listOfBillID;

	} else {
		mysqli_close($conn);
		return 0;	
	}	


}
function selectionBillID ($billID) {
	if ($billID != 0) {
	echo "<select name=\"billID\" onchange=\"showUser(this.value)\">     <option selected=\"true\" style=\"display:none;\">Select Bill</option>";
    for ($i = 0; $i < count($billID) ; $i++) {
        echo '<option value='.$billID[$i].'>'.$billID[$i].'</option>';
		
	}
	echo "</select>";
} else {
    echo "<center></br></br></br></br></br>No bill</center>";
}	
}
function generateReceiptDetail($billID){
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
	$sql = "SELECT billTable.billID, billStatus, sum(prescriptionQuantity * drugPrice) as total, billTotal, prescriptionTotal from billTable, prescriptionTable, drugTable WHERE billTable.billID = prescriptionTable.billID and prescriptionTable.drugID = drugTable.drugID and billTable.billID = '$billID'";
	
	$result = (mysqli_query($conn, $sql));
	$detailOfReceipt;
	if (mysqli_num_rows($result) > 0) {		
		mysqli_close($conn);

		$detailOfReceipt = mysqli_fetch_assoc($result);
		return $detailOfReceipt;
	}




}
function createReceipt($detailOfReceipt) {
	
	if ($detailOfReceipt != 0) {
    // output data of each row	
	$billTotal = $prescriptionTotal = "";
	if ($detailOfReceipt['billTotal'] != 0) {
			$billTotal = $detailOfReceipt['billTotal'];

	} else {
			$billTotal = $detailOfReceipt['total'] + 40;

	}
	if ($detailOfReceipt['prescriptionTotal'] != 0) {
		$prescriptionTotal = $detailOfReceipt['prescriptionTotal'];
	} else {
		$prescriptionTotal = $detailOfReceipt['total'];
	}
	echo '
	<div id="gridtable">
	<table>
	<tbody>
	

	<tr>
	<td align="right"><b>Bill Status</b></td><td><input type="text" name="billStatus" value="'.$detailOfReceipt['billStatus'].'" readonly></td>
	</tr>
	
	
	</tbody>
	</table>
	<br>';
	
	echo '<div align="center"><table width ="50%">';
	echo '<tr><th colspan = "3"><b>Receipt</b></th></tr>';
	echo '<tr><td>1</td><td >Check Up</td><td>RM40.00</td></tr>';
	echo '<tr><td>2</td><td>Prescription</td><td><input type="hidden" name="prescriptionTotal" value="'.$prescriptionTotal.'" readonly>RM'.$prescriptionTotal.'</input></td></tr>';
	echo '<tr><th colspan = "2"><b>Total</b></th><td><input type="hidden" name="billTotal" value="'.$billTotal.'" readonly>RM'.$billTotal.'</input></td>';

	echo '</table></div></div> <br><div align="center"><input name="pay" type="submit" value="pay"><div>';
	} else {
    echo "<center></br></br></br></br></br>No result found</center>";
	}	
}
function payBill($billID, $billTotal, $prescriptionTotal) {
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
	$sql = "UPDATE billTable SET billStatus = 'paid', billTotal = '$billTotal', prescriptionTotal = '$prescriptionTotal' WHERE billID ='$billID'";
	echo $sql;
	$result = (mysqli_query($conn, $sql));
	if ($result) 
	{return true;}
	return false;
}

if(isset($_POST['view'])) {
	$listOfBillID =	getBillID(test_input($_POST['patientID']));
	selectionBillID ($listOfBillID);
}

if(isset($_GET['billID'])) {
	$detailOfReceipt = generateReceiptDetail(test_input($_GET['billID']));
	createReceipt($detailOfReceipt);
}

if(isset($_POST['pay'])) {
	if ($_POST['billStatus']!='paid') {
	$flag = payBill($_POST['billID'], $_POST['billTotal'], $_POST['prescriptionTotal']);

				if ($flag) {
					echo "<script>
					alert(\"Successfully paid\");
					window.location.href='./payment.php';					
					</script>";		
				}
	} else { 
					
					header("location:  payment.php")	;
				
	}
}
?>