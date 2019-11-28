<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Main</title>
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
        xmlhttp.open("GET","../shared/announcementBL.php?userDomain="+str+"&d=2",true);
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
	<li><a href="../main.php">Main</a></li>
</ol>
	<div>
		




	</div>
       <div class="panel panel-info">
		<div class="panel-heading">Announcements</div>

        	<div  class="panel-body container">
		 <form action="../shared/announcementBL.php" method="post">
    	<div><select name="userDomain" onchange="showUser(this.value)" required> 
        	<option selected="true" style="display:none;">Select Domain</option>
            <option value="doctor">Doctor</option>
            <option value="pharmacist">Pharmacist</option>
            <option value="receptionist">Receptionist</option>
          </select> </div>
          <br>	
      
            <textarea name="updatedAnnouncement" id="txtHint" class = "text " style="resize:none" ></textarea>
	<br>
    <div align="right">
    <input type="submit" value="Send">
    </div>
    
    </form>
	</div>
    </div>


		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>