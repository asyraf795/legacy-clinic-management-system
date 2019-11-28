<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS Check Up and Prescribe</title>
<?php include('../general_files/style.html'); include('../shared/presentationBL.php'); 

?>





<style>
.container .text{
  resize: none;
  outline: none;
  width: 100%;
  padding: 100px;
    padding-left:0;
padding-top:0;

  border: 1;
  height: 100%;
  margin: 0px;
  
  
}
table.scroll {
    width: 516px; /* 140px * 5 column + 16px scrollbar width */
    border-spacing: 0;
}

table.scroll tbody, table.scroll thead tr { display: block; }

table.scroll tbody {
    height: 200px;
	
    overflow-y: scroll;
    overflow-x: hidden;
}

table.scroll tbody td, table.scroll thead th {
    width: 100px;
}

table.scroll tbody td:last-child {
	width: 200px;
}
table.scroll thead th:last-child {
    width: 216px; /* 140px + 16px scrollbar width */
}
</style>
</head>

<body>

	<div></div>
	<div>
    <?php  include("doctorMenu.php"); ?>
</div>
	<div class="container-fluid">
		<div></div>
		<div>
			
		</div>
		<div>
			
<ol class="breadcrumb">
	<li><a href="./checkUpAndPrescribe.php">Check Up and Prescribe</a></li>
</ol>
	<div>
		
<div>
<form action="" method="post">
		<input type="text" placeholder="Patient's ID" name="patientID" value="<?php getFunction('patientID');?>"required> <input type="submit">
</form>

</div>
<div>
<form action="checkUpAndPrescribeBL.php" method="post">

<input type ="hidden" name="patientID" value="<?php getFunction('patientID');?>"required>
<?php include("checkUpAndPrescribeBL.php"); ?>
</form>
</div>
	</div>
	<div>

	</div>

		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>