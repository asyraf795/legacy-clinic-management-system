<?php 

if (!isset($_GET['action'])==2)
header("Location: blank.html");					
?>
<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CMS Change Password</title>
<?php include("stylePL.php"); ?>

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
	<li><a href="http://mysis.unimy.edu.my/services/home.htm#">Change Password</a></li>
</ol>







	<div>
		




	</div>
	<div>
		<div class="panel-heading"><b>Note: Minimum character for password is 8, and maximum character is 12</b></div>
		<div class="panel-body">
        <form action="asdf.php" method="post">
			<table>
            <tbody>
            <tr>
            	<td align="right"><b>Old Password :</b></td><td><input type="password" name="fullname" size="20" value="" required></td> 
            </tr>
            <tr>
            	<td align="right"><b>New Password :</b></td><td><input type="password" name="fullname" size="20" value="" required></td> 
            </tr>
            <tr>
            	<td align="right"><b>Re-type New Password :</b></td><td><input type="password" name="fullname" size="20" value="" required></td> 
            </tr>
            </tbody>
            </table>
            <input type="submit">
            </form>
		</div>
	</div>















</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>