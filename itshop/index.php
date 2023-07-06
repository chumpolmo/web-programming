<?php
session_start();

require_once("./controller/DBController.php");
$db_handle = new DBController();

if(!empty($_POST["u_action"])) {
	switch($_POST["u_action"]) {
		case "Login":
			if(!empty($_POST["u_email"]) && !empty($_POST["u_pass"])){
				$cusByUaP = $db_handle->runQuery("SELECT * FROM customer WHERE CUS_EMAIL LIKE '".$_POST["u_email"]."' AND CUS_PASSWD LIKE '".$_POST["u_pass"]."'");
				if($cusByUaP !== NULL){
					$_SESSION["ss_email"] = $cusByUaP[0]['CUS_EMAIL'];
					$_SESSION["ss_status"] = $cusByUaP[0]['CUS_STATUS'];
					echo "Loading...<br>";
					header("Refresh:3; url=authen.php");
					exit(0);
				}else{
					echo "[INFO] User or password is incorrect, please try again.<br>";
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
		<h1>PHP Login Form:</h1>

		<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
		E-mail: <input type="email" name="u_email" required><br>
		Password: <input type="password" name="u_pass" required><br>
		<input type="submit" name="u_action" value="Login">
		<input type="reset" name="u_reset" value="Reset"><br>
		</form>

	</body>
</html>
