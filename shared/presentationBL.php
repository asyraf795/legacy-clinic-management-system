<?php 
function getFunction($detail){
	if (isset($_GET[$detail])) echo $_GET[$detail];
	else if (isset($_COOKIE[$detail])) echo $_COOKIE[$detail];
	else if (isset($_POST[$detail])) echo $_POST[$detail];
}

function getSelectedFunction($detail) {
	if(isset($_GET[$detail])) 
		if ($_GET[$detail] == "") 
			echo "All"; 
		else getFunction($detail);
}

?>