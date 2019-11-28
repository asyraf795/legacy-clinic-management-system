<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS Remove Drug</title>
<?php include('../general_files/style.html')?>
<script>
function showUser(drugID) {
    if (drugID == "") {
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
        xmlhttp.open("GET","editRemoveDrugBL.php?drugID="+drugID+"&editRemove=2",true);
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
	<li>Update Drug / <a href="removeDrug.php">Remove</a></li>
</ol>
	<div>
		




	</div>
	<div align="center">
    <div><?php include("editRemoveDrugBL.php"); 
	$listOfDrugID = getDrugID();
	selectionDrugID($listOfDrugID);
	?>
	
	
	
	</div>
   
    <form method="post" action="editRemoveDrugBL.php">
    <div id="txtHint"></div>
	</form>
    

	</div>


		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>