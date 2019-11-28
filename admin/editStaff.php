<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS Edit Staff</title>
<?php include('../general_files/style.html')?>

<style>

.container{
  padding: 70px
  border: 1px solid silver
}

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
</style>
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
        xmlhttp.open("GET","editRemoveStaffBL.php?userID="+userID+"&editRemove=1",true);
        xmlhttp.send();
    }
}
</script>
</head>

<body>

	<div></div>
	<div>
    <?php include("adminMenu.php"); ?>
</div>
	<div class="container-fluid">
		<div></div>
		<div>
			
		</div>
		<div>
			
<ol class="breadcrumb">
	Update Staffs / <li><a href="./editStaff.php">Edit</a></li>
</ol>
<div>
		




	</div>
	<div align="center">
    <div><?php include("editRemoveStaffBL.php"); 
	$listOfUserID = getUserID();
	selectionUserID($listOfUserID);
	?>
	
	
	
	</div>
   
    <form method="post" action="editRemoveStaffBL.php">
    <div id="txtHint"></div>
	</form>
    

	</div>


		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>