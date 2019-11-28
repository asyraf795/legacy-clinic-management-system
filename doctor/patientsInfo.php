<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS Patient's Info</title>
<?php include('../general_files/style.html')?>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","patientsInfoBL.php?medicalID="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>

<body>

	<div></div>
	<div>
    <?php include("doctorMenu.php"); ?>
</div>
	<div class="container-fluid">
		<div></div>
		<div>
			
		</div>
		<div>
			
<ol class="breadcrumb">
	<li><a href="./patientsInfo.php">Patient's Info</a></li>
</ol>
	<div>
		

<?php include("../shared/presentationBL.php")?>


	</div>
	<div >
    <form action = "" method="get">
		<input type="text" placeholder="Patient's ID" name="patientID" value="<?php getFunction("patientID");?>" required> <input type="submit" name="view">
	</form>
	</div>
<div id = "gridTable"> 
	<?php include("patientsInfoBL.php") ?>
</div>
<br>
<div>
    <div id="txtHint"></div>

</div>

		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>