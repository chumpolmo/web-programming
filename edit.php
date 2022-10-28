<?php
session_start();

require_once("./controller/DBController.php");
$db_handle = new DBController();

if(!empty($_POST["u_action"])) {
	switch($_POST["u_action"]) {
		case "Edit":
			if(!empty($_POST["c_email"]) && !empty($_POST["c_pass"])){
				
				$tmp_id = $_POST["c_id"];
				$tmp_email = $_POST["c_email"];
				$tmp_pass = $_POST["c_pass"];
				$tmp_status = $_POST["c_status"];

				$cusUpdate = $db_handle->processQuery("UPDATE customer SET CUS_EMAIL='$tmp_email', CUS_PASSWD='$tmp_pass', CUS_STATUS=$tmp_status WHERE CUS_ID=$tmp_id");
				if($cusUpdate === TRUE){
					echo "Updated successfully!<br>";
					header("Refresh:3; url=authen.php");
					exit(0);
				}else{
					echo "[INFO] Errors in updating data to database, please try again.<br>";
					header("Refresh:3; url=authen.php");
					exit(0);
				} // End if, checked user login.
			} // Checked "Login" case.
			break;
	} // End if, switch case.
} // End if, checked action.

$u_email = $u_pass = "";
$u_id = $u_status = 0;
if(!empty($_GET["u_action"])) {
	switch($_GET["u_action"]) {
		case "EDIT":
			if(!empty($_GET["cid"])){
				
				$tmp_id = $_GET["cid"];

				$cus_array = $db_handle->runQuery("SELECT * FROM customer WHERE CUS_ID=$tmp_id");
				if(!empty($cus_array)){
					$c_id = $cus_array[0]['CUS_ID'];
					$c_email = $cus_array[0]['CUS_EMAIL'];
					$c_pass = $cus_array[0]['CUS_PASSWD'];
					$c_status = $cus_array[0]['CUS_STATUS'];
				}else{
					echo "[INFO] Errors in selected data from database, please try again.<br>";
					header("Refresh:3; url=authen.php");
					exit(0);
				} // End if, checked user login.
			} // Checked "Login" case.
			break;
	} // End if, switch case.
} // End if, checked "EDIT" action.
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Example: PHP & MySQL Database Operations</title>
</head>
	<body>

		<h1>PHP Update Form:</h1>

		<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
		<input type="hidden" name="c_id" value="<?=$c_id?>">
		<div style="color: red;">Warning: E-mail does not work after an "update", please retry login.</div>
		E-mail: <input type="email" name="c_email" value="<?=$c_email?>" required><br>
		Password: <input type="password" name="c_pass" value="<?=$c_pass?>" required><br>
		Retry-Password: <input type="password" name="c_rt_pass" value="<?=$c_pass?>" required><br>
		Status: <input type="radio" name="c_status" value="0" <?php if($c_status == 0){echo "checked";}?>> Inactive 
		<input type="radio" name="c_status" value="1" <?php if($c_status == 1){echo "checked";}?>> Active<br>
		<input type="submit" name="u_action" value="Edit">
		<input type="reset" name="u_reset" value="Reset"><br>
		</form><br>

		<div>
			<a href="./authen.php"><< Back</a>
		</div>

	</body>
</html>
