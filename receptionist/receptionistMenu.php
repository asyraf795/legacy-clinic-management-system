<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<style>
.navbar {
	margin-bottom: 0px;
}
</style>

	<nav class="navbar navbar-default " role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="./receptionistMain.php"><img style="height: 24px;" src="../general_files/logo.jpg"></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="./receptionistMain.php">Main <span class="sr-only">(current)</span></a></li>
<li class="dropdown"><a href="./receptionistMain.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Register Patient <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<!-- Timetable -->
						<li><a href="./newPatient.php">New</a></li>
						<!--Assessment-->
						<li><a href="./returningPatient.php">Returning</a></li>
						<!--Exam Slip-->
					</ul></li>				
				<li><a href="ViewEdit.php">View and Edit <span class="sr-only">(current)</span></a></li> 								                <li><a href="./searchPatient.php">Search <span class="sr-only">(current)</span></a></li>
				<li><a href="setAppointment.php">Set appointments <span class="sr-only">(current)</span></a></li>




			</ul>
			<ul class="nav navbar-nav navbar-right">

				<li class="dropdown"><a href="./receptionistMain.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ID Put Here<span class="caret"></span>
				</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="./changePassword.php?action=2">Change Password</a></li>

					</ul></li>

				<li><a href="./logoutBL.php">Logout</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>

</body>
</html>