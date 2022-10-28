<?php
session_start();

require_once("./controller/DBController.php");
$db_handle = new DBController();

if(!empty($_POST["u_action"])) {
	switch($_POST["u_action"]) {
		case "Save":
			if(!empty($_POST["u_email"]) && !empty($_POST["u_pass"])){
				
				$tmp_email = $_POST["u_email"];
				$tmp_pass = $_POST["u_pass"];
				$tmp_status = $_POST["u_status"];

				$cusInsert = $db_handle->processQuery("INSERT INTO customer (CUS_ID, CUS_EMAIL, CUS_PASSWD, CUS_STATUS) VALUES (NULL, '$tmp_email', '$tmp_pass', $tmp_status)");
				if($cusInsert === TRUE){
					echo "New record has been inserted successfully!<br>";
					header("Refresh:3; url=authen.php");
					exit(0);
				}else{
					echo "[INFO] Errors in inserting data to database, please try again.<br>";
				} // End if, checked user login.
			} // Checked "Login" case.
			break;
	} // End if, switch case.
} // End if, checked action.
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Example: PHP & MySQL Database Operations</title>
</head>
	<body>

		<h1>PHP Insert Form:</h1>

		<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
		E-mail: <input type="email" name="u_email" required><br>
		Password: <input type="password" name="u_pass" required><br>
		Retry-Password: <input type="password" name="u_rt_pass" required><br>
		Status: <input type="radio" name="u_status" value="0" checked> Inactive <input type="radio" name="u_status" value="1"> Active<br>
		<input type="submit" name="u_action" value="Save">
		<input type="reset" name="u_reset" value="Reset"><br>
		</form><br>

		<div>
			<a href="./authen.php"><< Back</a>
		</div>

	</body>
</html>
