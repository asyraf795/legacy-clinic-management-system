<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS Dr Appointments</title>
<?php include('../general_files/style.html')?>
<script>
function showUser(appointmentDate, userID) {
    if (appointmentDate == "") {
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
        xmlhttp.open("GET","appointmentBL.php?userID="+userID+"&appointmentDate="+appointmentDate,true);
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
	<li><a href="appointment.php">Appointments</a></li>
</ol>
	<div>
		


<?php
$_SESSION["userID"] = "asyraf795";
?>

	</div>
	<div>
		<input type="date" name="appointmentDate" onChange="showUser(this.value, '<?php echo $_SESSION["userID"] ?>')">
        <br>
        <div id="txtHint"><?php include("appointmentBL.php"); ?></div>

	</div>


		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>