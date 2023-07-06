<?php
session_start();

require_once("./denied.php");

require_once("./controller/DBController.php");
$db_handle = new DBController();
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Example: PHP & MySQL Database Operations</title>
</head>
	<body>
		<h1>Welcome, <?=$_SESSION['ss_email']?>.</h1><hr>
		<div>
			<a href="./authen.php">Home</a> | 
			<a href="./insert.php">Insert</a> |
			<a href="./logout.php">Logout</a>
		</div>

		<h2>Customers:</h2>
		<table border="1">
			<tr>
				<th>ID</th>
				<th>E-mail</th>
				<th>Status</th>
				<th>ACTION</th>
			</tr>
		<?php
			$cus_array = $db_handle->runQuery("SELECT * FROM customer ORDER BY CUS_ID ASC");
			if (!empty($cus_array)) { 
				foreach($cus_array as $key => $value){
		?>
				<tr>
					<td><?=$cus_array[$key]['CUS_ID']?></td>
					<td><?=$cus_array[$key]['CUS_EMAIL']?></td>
					<td><?=$cus_array[$key]['CUS_STATUS']?></td>
					<td>
					<?php
						if($cus_array[$key]['CUS_ID'] != 1){
					?>
						[ <a href="edit.php?u_action=EDIT&cid=<?=$cus_array[$key]['CUS_ID']?>">Edit</a>] 
						[ <a href="delete.php?u_action=DELETE&cid=<?=$cus_array[$key]['CUS_ID']?>" onClick="return confirm('Are you sure?');">Delete</a> ]
					<?php
						}else{
							echo "[Admin]";
						}
					?>
					</td>
				</tr>
		<?php
				} // End foreach.
			} // End if, checked customer array is not empty.
		?>
		</table>

	</body>
</html>
