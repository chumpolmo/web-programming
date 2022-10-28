<?php
session_start();

require_once("./denied.php");

require_once("./controller/DBController.php");
$db_handle = new DBController();

if(!empty($_GET["u_action"])) {
	switch($_GET["u_action"]) {
		case "DELETE":
			if(!empty($_GET["cid"])){
				
				$tmp_id = $_GET["cid"];

				$cusDelete = $db_handle->processQuery("DELETE FROM customer WHERE CUS_ID=$tmp_id");
				if($cusDelete === TRUE){
					echo "Deleted successfully!<br>";
					header("Refresh:3; url=authen.php");
					exit(0);
				}else{
					echo "[INFO] Errors in deleting data to database, please try again.<br>";
				} // End if, checked user login.
			} // Checked "Login" case.
			break;
	} // End if, switch case.
} // End if, checked action.
?>