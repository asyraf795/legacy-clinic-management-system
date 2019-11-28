<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>MySiS</title>
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
		




	</div>
	<div class="panel panel-info">
		<div class="panel-heading">Announcements</div>
		<div class="panel-body">
			<?php include("../shared/announcementBL.php"); readAnnouncement("receptionist", 2)?>
		</div>
	</div>


		</div>
	</div>
	<div><div>&nbsp;</div></div>


</body></html>