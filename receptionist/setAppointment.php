<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS Set Appointment</title>
<?php include('../general_files/style.html')?>
<script>
function showUser(userID) {
    if (userID == "") {
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
        xmlhttp.open("GET","../doctor/appointmentBL.php?userID="+userID,true);
        xmlhttp.send();
    }
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
	<li><a href="appointment.php">Appointments</a></li>
</ol>
	<div>
<form action="setAppointmentBL.php" method="post"><?php include("setAppointmentBL.php"); 
	echo '<div align="center"><table id="gridtable"><tr><th colspan = "2"><center>Fill in input to set appointment</center></th></tr><tr><td>';
	$listOfDoctor = getSelectDoctor();
	selectionDoctor ($listOfDoctor, 2);
	$listOfPatient = getSelectPatient();
	selectionPatient ($listOfPatient);
	echo '</td><td ><input type="date" name="date"></td></tr><tr><td colspan = "2"><center><input type = "submit" name="appointmentSubmit"></td></tr></table></center></div>';
?></form>

<br><br>
<form action="setAppointmentBL.php" method="post"><?php 
	echo '<div align="center"><table id="gridtable"><tr ><th colspan = "2"><center>Fill in input to cancel appointment</center></th></tr><tr><td>';
	$listOfDoctor = getSelectDoctor();
	selectionDoctor ($listOfDoctor, 1);
	$listOfPatient = getSelectPatient();
	selectionPatient ($listOfPatient);
	echo '</td><td><input type="date" name="date"></td></tr><tr><td colspan = "2"><center><input type = "submit" name="appointmentCancel"></center></td></tr></table></div>';
?></form>

	</div>
	<div>
        <br>
        <div id="txtHint"></div>

	</div>


		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>