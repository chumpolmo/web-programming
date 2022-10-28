<?php
/**
 * Function: User Permissions
 * */
if(empty($_SESSION["ss_email"]) || empty($_SESSION["ss_status"])){
	echo "Permission denied, please try again!<br>";
	header("Refresh:3; url=index.php");
	exit(0);
} // End if, checked user permission.
?>