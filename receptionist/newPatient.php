<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS New Register</title>
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
	<li>Register Patient / <a href="./newPatient.php">New</a></li>
</ol>
	<div>
		




	</div>
	<div >
<form action="newPatientBL.php" method="post">
<table width="100%" id="gridtable">
<tr>
<th colspan="6">Patient's Details
</th>
</tr>
     <tr >

       <td>Full Name:</td>
        <td colspan="2"><input type = "text" name="patientName" onblur="this.value=this.value.toUpperCase()" required></td>
        <td>IC:</td>
        <td colspan="2"><input type="text" name="patientID" value="" required required></td>
    </tr>
    <tr>
        <td>Birth Date</td>
        <td colspan="2"><input type="date" name="patientBirthDate" required></td>
        <td>Age:</td>
        <td colspan="2"><input type="number" name="patientAge" required min="1" max="200"></td>
    </tr>
    <tr>
        <td>Weight(KG): </td>
        <td colspan="2"><input type="number" step="0.1" min="0.1" max="300" name="patientWeigth" required></td>
        <td>Height(m):</td>
        <td colspan="2"><input type="number" step="0.1" min="0.1" max="300" name="patientHeight" required></td>
    </tr>

    <tr>
    <td>Gender:</td>
        <td colspan="2">Male <input type="radio" name="patientGender" value="M" required> Female <input type="radio" name="patientGender" value="F"></td>
        <td>Blood Group:</td>
        <td colspan="2"><select name="Selection" required> 
            <option value="O">O</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="AB">AB</option>
          </select>   - <input type="radio" name="blood" value="-" required> + <input type="radio" name="blood" value="+"></td>

    </tr>
    <tr>
        <td>Patient's Description:</td>
        <td colspan="5"><textarea name="patientDescription" id="textarea" required></textarea></td>
    </tr>
<tr>
<th colspan="6">Others
</th>
    <tr>
        <td>Address:</td>
        <td colspan="5"><textarea name="patientAddress" id="textarea" required></textarea></td>
    </tr>
    <tr>
        <td>Contact Number (Mobile):</td>
        <td colspan="2"><input type="text" name="patientMobile" required></td>
        <td>Contact Number (Home)</td>
        <td colspan="2"><input type="text" name="patientHome"></td>
    </tr>
    <tr>
        <td>Emergency Contact:</td>
        <td colspan="2"><input type="text" name="patientEmergency"></td>
        <td>Occupation:</td>
        <td colspan="2"><input type="text" name="patientOccupation" required></td>
    </tr>
    </table>
       
<div align="right">
 
  <input type="submit" name="submitEdit" value="Submit">
</div>
</form>
	</div>


		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>