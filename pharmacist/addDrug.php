<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS Add Drug</title>
<?php include('../general_files/style.html')?>

</head>

<body>

	<div></div>
	<div>
    <?php include("pharmacistMenu.php"); ?>
</div>
	<div class="container-fluid">
		<div></div>
		<div>
			
		</div>
		<div>
			
<ol class="breadcrumb">
	<li>Update Drug / <a href="./addDrug.php">Add</a></li>
</ol>
	<div>
		




	</div>
	<div align="center">
    <form method="post" action="addDrugBL.php">
    <div>
    <b>Please Fill In The Following Table</b> <br><br>
		<table border="1" id="gridtable">
        <tbody>
        <tr>
        <td align="right">ID:</td><td><input type="text" name="drugID" required></td>
        </tr>
        <tr>
        <td align="right">Name:</td><td><input type="text" name="drugName" required></td>
        </tr>
        <tr>
        <td align="right">Form:</td><td><input type="text" name="drugForm" required></td>
        </tr>        
        <tr>
        <td align="right">Dose:</td><td><input type="text" name="drugDose" required></td>
        </tr>
        <tr>
        <td align="right">Quantity</td><td><input type="number" name="drugQuantity" min="1" max="99999" required></td>
        </tr>
        <tr>
        <td align="right">Price:</td><td><input type="number" step="0.01" min="0.00" max="999.99" name="drugPrice" required></td>
        </tr>
        </tbody>
        </table>
		</div>
        <div></div>
        <div>
        <br>
        <input type="submit">
        </div>
        </form>
	</div>


		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>