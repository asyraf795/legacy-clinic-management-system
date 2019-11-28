<?php
session_start();
if( isset($_SESSION['myusername']) ){
header("location: logiadsfdasn.php");	
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256"><title>Med15 Login Page</title>
<meta content="Asyraf" name="author">
<meta content="Copyright © 2015 UniMy. All Rights Reserved." name="copyright">
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<link rel="Stylesheet" type="text/css" href="login_files/templates.css">
<script language="JavaScript" src="login_files/chkform.js" type="text/javascript"></script>
</head>
<body class="bdmain" onload="killframe();document.frm.ses_username.focus();">
<form action="loginBL.php" method="post" name="frm" onsubmit="return chkForm(&#39;frm&#39;, &#39;myusername&#39;,&#39;Please fill in the following field: Username&#39;,&#39;mypassword&#39;,&#39;Please fill in the following field: Password&#39;)">
<center>
<table border="0" cellpadding="0" cellspacing="0" width="40%">
	<tbody><tr>
		<td>&nbsp;

		</td><td>
	
	</td></tr>
	<tr>
		<td>&nbsp;

		</td><td>
	
	</td></tr>
    <tr>
		<td>&nbsp;

		</td><td>
	
	</td></tr>
    <tr>
		<td>&nbsp;

		</td><td>
	
	</td></tr>
    <tr>
		<td>&nbsp;

		</td><td>
	
	</td></tr>
    <tr>
		<td>&nbsp;

		</td><td>
	
	</td></tr>
	<tr>
		<td>&nbsp;

		</td><td>
	
	</td></tr>
	<tr>
		<td>&nbsp;

		</td><td>
	
	</td></tr>
	<tr>
		<td align="center">		<img src="login_files/med.jpg" alt=""  border="0">
		
		</td>
	</tr>
	<tr>
		<td align="center">
			<div id="whitebox">
	
				<div id="whitebox_t">
					<div id="whitebox_tl">
						<div id="whitebox_tr"></div>
					</div>
				</div>
						
				<div id="whitebox_m"><h3 id="extension" class="div_h3"> Login </h3>		
          <table border="0" cellspacing="1" cellpadding="0" width="98%">
			<tbody><tr>
				<td align="right" width="28%"></td>
				<td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
			</tr>
            
            <?php
			
			if (isset($_GET['status'])==2)
			echo "<tr><td colspan='2' align='center'><font color='red'>Invalid Username or Password.</font></td></tr>";
	
												
						?><tr>

				<td align="right">Username</td>
				<td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="myusername" type="text" size="35"></td>
			</tr>
			<tr>
				<td align="right">Password</td>
				<td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="mypassword" type="password" size="35"></td>
			</tr>
			<tr>
				<td>&nbsp;

				</td><td>
			
			</td></tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" style="background: " value=" E N T E R "> <input type="reset" style="background: " value=" R E S E T ">
				
				
				
				
				</td>
			</tr>
		</tbody>
       </table>
		
				</div>
			
				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>	
						
			</div>
		</td>
	</tr>
</tbody></table>




		</center>
        </form>
        </body>
        </html>