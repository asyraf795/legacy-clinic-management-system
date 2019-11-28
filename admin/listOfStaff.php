<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS List Of Staff</title>
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
	<li><a href="./listOfStaff.php">Staff List</a></li>
</ol>
	<div>
		


<?php include("../shared/presentationBL.php"); ?>

	</div>
        
    	<div><form action="" method="get"><select name="userDomain"> 
        
<!--find a way on how to show the value of dropdown -->
        	<option value="" >All</option>
            
            <option value="Doctor">Doctor</option>
            <option value="Pharmacist">Pharmacist</option>
            <option value="Receptionist">Receptionist</option>
          </select> 
		<input type="text" name="userID" placeholder="Staff ID" value="<?php getFunction("userID")?>">
        <input type="text" name="userRealName" placeholder="Staff Name" value ="<?php getFunction("userRealName")?>">
        <input type="text" name="userEmail" placeholder="Staff Email" value="<?php getFunction("userEmail")?>">

        <input type="submit">
         </form>
    </div>
    <br>
    <div>
    <?php include("listOfStaffBL.php"); ?>
    </div>
   <div>
   
   
   
   
   
   
   
   </div>
	</div>
    </div>


		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>