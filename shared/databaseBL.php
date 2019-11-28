<?php
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function createUserPass($userID) {
	
	return md5($userID);
	
}
?>