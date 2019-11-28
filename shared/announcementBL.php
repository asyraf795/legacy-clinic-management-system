<?php

function readAnnouncement($userDomain, $flag) {
	
	error_reporting(E_ERROR | E_PARSE);
	if ($flag == 1) {
		$filename = "announcement/".$userDomain."Announcement.txt";
	}
	else if ($flag == 2) {
		$filename = "../announcement/".$userDomain."Announcement.txt";
	}
	$myfile = fopen($filename, "r") or die("Unable to open file!");
	// Output one line until end-of-file
	while(!feof($myfile)) {
  		echo fgets($myfile) ."<br>";
	}
	fclose($myfile);

}

function writeAnnouncement($userDomain, $updatedText) {
	
	$fileName = "";
	$fileName = "../announcement/".$userDomain."Announcement.txt";
	error_reporting(E_ERROR | E_PARSE);
	$myfile = fopen($fileName, "w+") or die("Unable to open file!");
	fwrite($myfile, $updatedText);
	fclose($myfile);
	
	echo "<script>
    	alert(\"Successfully sent\");
		window.location.href='../main.php';
	</script>";
		
}
	
	
	
if (isset($_GET['userDomain'])){
		
	readAnnouncement($_GET['userDomain'], $_GET['d']);
			
}
else if (isset($_POST['userDomain'])){
		
	writeAnnouncement($_POST['userDomain'], $_POST['updatedAnnouncement']);
			
}
	
?>