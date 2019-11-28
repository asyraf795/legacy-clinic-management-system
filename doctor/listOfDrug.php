<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS List Of Drug</title>
<?php include('../general_files/style.html')?>

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
	<li><a href="listOfDrug.php">Drug List</a></li>
</ol>


<?php include("../shared/presentationBL.php"); ?>

	<div>
		<form method="GET" action="">

<table border="0" cellpadding="0" cellspacing="0" width="35%" align="center" style="width: 200px; overflow: hidden; white-space: nowrap;">
  	<tbody><tr>
    	<td width="25%">
    		<table cellpadding="0" cellspacing="0" width="100%" > 
			  <tbody><tr bgcolor="#D9EDF7">
				<th  width="100%" colspan="12" class="tbtitle"><center>Search Drug</center></th>   
			  </tr>

			  <tr>
			    <td class="TbMain">&nbsp;ID:
			    </td><td class="TbMain"><input type="text" name="drugID" size="20" value="<?php getFunction("drugID")?>"></td>
	
			    <td class="TbMain">&nbsp;Name:
			    </td><td class="TbMain"><input type="text" name="drugName" size="20" value="<?php getFunction("drugName")?>"></td>
                <td class="TbMain">&nbsp;Drug Form:
			    </td><td class="TbMain"><input type="text" name="drugForm" size="20" value="<?php getFunction("drugForm")?>"></td>
				<td class="TbMain">&nbsp;Dose:
			    </td><td  class="TbMain"><input type="text" name="drugDose" size="20" value="<?php getFunction("drugDose")?>"></td>
			    <td class="TbMain">&nbsp;Quantity:
			    </td><td class="TbMain"><input type="text" name="drugQuantityLow" size="3" value="<?php getFunction("drugQuantityLow")?>">-<input type="text" name="drugQuantityHigh" size="3" value="<?php getFunction("drugQuantityHigh")?>"></td>
			
			    <td class="TbMain">&nbsp;Price:
			    </td><td  class="TbMain"><input type="text" name="drugPriceLow" size="3" value="<?php getFunction("drugPriceLow")?>">-<input type="text" name="drugPriceHigh" size="3" value="<?php getFunction("drugPriceHigh")?>"></td>
				

			  </tr>
			  <tr>
			    
			  </tr>	
					  		  
			  <tr>
			    <td width="100%" colspan="12" class="tbfoot" align="center">&nbsp;<br><input type="submit" value="Search" name="list" onclick="go();">
			    <input type="reset" value="Cancel" name="Cancel" >
			  </td>			  			  		  
			  </tr>
			</tbody></table>
		</td>
	</tr>
</tbody></table>

<u>Tips:</u><br>
1. Click search button to list drugs for this in stock.<br>
2. Input fields to obtain specified list.</form>




	</div>
	<div class="panel panel-info">
	<?php include("../pharmacist/listOfDrugBL.php"); ?>


	</div>


		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>