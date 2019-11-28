<?php
include("../shared/databaseDL.php");
include("../shared/databaseBL.php");

function showSearchDrug($listOfDrug) {
	
	if ($listOfDrug != 0) {
		echo '<table id="gridtable" width="100%">';
		echo '<tr><th>No</th><th>Drug ID</th><th>Name</th><th>Form</th><th>Dose</th><th>Quantity</th><th>Price</th></tr>';
		$i = 1;
		foreach ($listOfDrug as $detailOfDrug) {			
		    echo "<tr><td>".$i."</td><td>".$detailOfDrug[0]."</td><td>".$detailOfDrug[1]."</td><td>".$detailOfDrug[2]."</td><td>".$detailOfDrug[3]."</td><td>".$detailOfDrug[4]."</td><td>".$detailOfDrug[5]."</td></tr>";
			$i++;
		}
		echo '</table>';
	} else {
		echo '<center></br></br></br></br></br>No Search Found</center>';
	}
	
}
$drugID = $drugName = $drugForm = $drugQuantityLow = $drugQuantityHigh = $drugPriceLow = $drugPriceHigh = $drugDose = "";

if (isset($_GET['drugID'])) {
	$drugID = test_input($_GET["drugID"]);
	$drugName = test_input($_GET["drugName"]);
	$drugForm = test_input($_GET["drugForm"]);
	$drugQuantityLow = test_input($_GET["drugQuantityLow"]);
	$drugQuantityHigh = test_input($_GET["drugQuantityHigh"]);
	$drugPriceLow = test_input($_GET["drugPriceLow"]);
	$drugPriceHigh = test_input($_GET["drugPriceHigh"]);
	$drugDose = test_input($_GET["drugDose"]);

}
 
$listOfUser = getListOfDrug($drugID, $drugName, $drugForm, $drugQuantityLow, $drugQuantityHigh, $drugPriceLow, $drugPriceHigh, $drugDose);

showSearchDrug($listOfUser);
?>