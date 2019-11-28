<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS Add Staff</title>
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
	Update Staff / <li><a href="./addStaff.php">Add</a></li>
</ol>
	<div>
		




	</div>
        
    	<div align="center">
        <br><br><b>Please enter detail to register staff</b> <br><br>
        <form action="addStaffBL.php" method="post">
        <table id="gridtable">
        <tbody>
        <tr>
        <td><b>ID :</b></td><td width="200">	<input type="text" name="userID" placeholder="Staff ID" required ></td>
        </tr>
        <tr>
        <td><b>Name :</b></td><td >        <input type="text" name="userRealName" placeholder="Staff Name" onblur="this.value=this.value.toUpperCase()" required>
</td>
        </tr>
        <tr>
        <td><b>Email :</b></td><td>        <input type="text" name="userEmail" placeholder="Staff Email" required>
</td>
        </tr>  
        <tr>
        <td><b>Domain :</b></td><td align = "center"><select name="userDomain" required>     
                <option value="admin">Admin</option>
       
        <option value="doctor">Doctor</option>
            <option value="pharmacist">Pharmacist</option>
            <option value="receptionist">Receptionist</option>
          </select> </td>
        </tr>  
        </tbody>
        </table>       

	<br><br>

        <input type="submit" value="Register">
         </form>
    </div>
    <br>

   <div>
   
   
   
   
   
   
   
   </div>
	</div>
    </div>


		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>