<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS View Edit</title>
<?php include('../general_files/style.html')?>
<script>



function editForm() {
	alert('The document now can be editted');
	$('.info').removeAttr('readOnly');
	$('#submit').removeAttr('disabled');
;	
}
</script>
</head>

<body>

	<div></div>
	<div>
    <?php include("receptionistMenu.php"); ?>
</div>
	<div class="container-fluid">
		<div></div>
		<div>
			
		</div>
		<div>
			
<ol class="breadcrumb">
	<li><a href="./receptionistMain.php">Main</a></li>
</ol>
	<div>
		


<?php include("../shared/presentationBL.php"); ?>

	</div>
	<div id = "gridTable">
    <form action = "" method="GET">
		<input type="text" placeholder="Patient's ID" name="patientID" value="<?php getFunction("userID")?>" required> <input type="submit" value="View" name="edit">

	</form>
        <form action = "ViewEditBL.php" method="post">
        <input type="hidden" value="<?php getFunction("userID")?>" name="patientOldID">
	<?php include("ViewEditBL.php") ?>
</form>
</div>




		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>