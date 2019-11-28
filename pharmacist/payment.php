<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS Payment</title>
<?php include('../general_files/style.html')?>
<script>
function showUser(value) {
    if (value == "") {
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
        xmlhttp.open("GET","paymentBL.php?billID="+value,true);
        xmlhttp.send();
    }
}
</script>
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
	<li><a href="./payment.php">Payment</a></li>
</ol>
	<div>
<?php include("../shared/presentationBL.php") ?>




	</div>
	<div >
    <div>
    <form action = "" method="post">
		<input type="text" placeholder="Patient's ID" name="patientID" value="<?php getFunction("patientID")?>"required> <input type="submit" name="view">
	</form>
    </div>
    <br>    <form action="paymentBL.php" method="post">

    <div>
<?php 
	include("paymentBL.php");
	
?>
        
    </div>
    <br>
        <div id="txtHint"></div>
	</form>
    </div>


		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>