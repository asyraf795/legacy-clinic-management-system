<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS Search Patient</title>
<?php include('../general_files/style.html')?>

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
	<div >

<div id="pageMiddle">
  <table width="100%">
    <tr>
      <td>
        <b>Search Patient</b></br></br>
        <form method="get" action="">
          
           <table>
           <tr><td>                  
          <input type="text" name="patientID" placeholder="Patient ID" value="<?php getFunction("patientID")?>">
          <input type="text" name="patientName" placeholder="Name" value="<?php getFunction("patientName")?>">
          <input type = "number" name="patientAge" min="0" max="200" placeholder="Age" value="<?php getFunction("patientAge")?>">
		  <select name="patientGender"> 
          <option value = "" selected="true" style="display:none;">Gender</option>
           <option value="">Both</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
          </select> 
          <input type="date" name="medicalDate" value="<?php getFunction("drugID")?>">          <input type="submit" >

          </td></tr></table>
          <br>
        </form>
      </td>
      <td>
 
      </td>
    </tr>
  </table>
<?php include("searchPatientBL.php"); ?>

	</div>


		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>