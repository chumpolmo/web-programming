<?php
/////////////////////////////////////
// Author: Chumpol Mokarat
// Student Code: 0265xxxxxxxx-x
/////////////////////////////////////

include "../templates/header.php";
include "../templates/menu.php";
include "../libs/function.php";

$conn = connectDB();

echo "<div class='w3-container'>";

if(isset($_POST['logSubmit'])){
	$logEmail = $_POST['logEmail'];
	$logPasswd = $_POST['logPasswd'];
	$sql = "SELECT usr_id, usr_email, usr_passwd FROM users WHERE usr_email LIKE '$logEmail' AND usr_passwd LIKE '$logPasswd'";
	$res = $conn->query($sql);
	$row = $res->fetch_object();
	if($res->num_rows == 1 && $row->usr_email == $logEmail && $row->usr_passwd == $logPasswd){
		//$row = $res->fetch_object();
		$_SESSION['logemail'] = $row->usr_email;
		$_SESSION['loggedIn'] = true;

		if(isset($_POST['logRemember']) && $_POST['logRemember'] == 1){
			setcookie('ck_logrem', $_POST['logRemember'], (time() + 86400), "/"); // 86400 = 1 day
			setcookie('ck_logemail', $_POST['logEmail'], (time() + 86400), "/");
			setcookie('ck_logpasswd', $_POST['logPasswd'], (time() + 86400), "/");
			// setcookie('ck_logrem', $_POST['logRemember']);
			// setcookie('ck_logemail', $_POST['logEmail']);
			// setcookie('ck_logpasswd', $_POST['logPasswd']);
		}

		echo "กำลังเข้าสู่ระบบ รอสักครู่...";
		echo "<meta http-equiv='refresh' content='3; url=../index.php'>";
		//die();
	}else{
		$_SESSION['loggedIn'] = false;
		$_SESSION['logemail'] = '';
		echo "<br><br><div class='w3-center'>";
		echo "<i class='fa fa-info-circle' aria-hidden='true'></i> ข้อมูลผู้ใช้งานไม่ถูกต้อง กรุณาเข้าสู่ระบบอีกครั้ง...";
		echo "<br><a href='../login.php' class='w3-button w3-green'>เข้าสู่ระบบ</a>";
		echo "</div><br><br><br>";
	}
	//freeSQL($res);
}else if(isset($_POST['uSubmit'])){
	$usr_fullname = $_POST['accName'];
	$usr_country = $_POST['accCountry'];
	$usr_timezone = $_POST['accTimezone'];
	$usr_email = $_POST['accEmail'];
	$usr_username = $_POST['accUser'];
	$usr_passwd = $_POST['accPasswd'];
	$usr_company = $_POST['accComp'];
	$usr_active = 1; // Boolean: 1 or 0
	$usr_role = 10; // Int: 10 - user, 20  - admin

	$sql = "INSERT INTO users (usr_id, usr_email, usr_passwd, usr_fullname, usr_username, usr_company, usr_country, usr_timezone, usr_active, usr_role) VALUES ";
	$sql.= "(NULL, \"{$usr_email}\", \"{$usr_passwd}\", \"{$usr_fullname}\", \"{$usr_username}\", \"{$usr_company}\", \"{$usr_country}\", \"{$usr_timezone}\", {$usr_active}, {$usr_role})";
	$res = $conn->query($sql);
	if(!$res){
		echo "<br><a href='../index.php' class='w3-button w3-blue'>กรอกข้อมูลใหม่อีกครั้ง</a><br><br>";
		die("Error create new user: ".$res->error());
	}
	echo "การเพิ่มข้อมูลผู้ใช้ใหม่สำเร็จ รอสักครู่...<br><br>";
	echo "<meta http-equiv='refresh' content='3; url=../users_list.php'>";
}else if(isset($_POST['eSubmit'])){
	$usr_id = $_POST['accId'];
	$usr_fullname = $_POST['accName'];
	$usr_country = $_POST['accCountry'];
	$usr_timezone = $_POST['accTimezone'];
	$usr_email = $_POST['accEmail'];
	$usr_username = $_POST['accUser'];
	$usr_passwd = $_POST['accPasswd'];
	$usr_company = $_POST['accComp'];

	$sql = "UPDATE users SET usr_email=\"{$usr_email}\", usr_passwd=\"{$usr_passwd}\", usr_fullname=\"{$usr_fullname}\", usr_username=\"{$usr_username}\", usr_company=\"{$usr_company}\", usr_country=\"{$usr_country}\", usr_timezone=\"{$usr_timezone}\" ";
	$sql.= "WHERE usr_id={$usr_id}";
	$res = $conn->query($sql);
	if(!$res){
		echo "<br><a href='../user_edit.php?act=EDIT&uid={$usr_id}' class='w3-button w3-blue'>กรอกข้อมูลใหม่อีกครั้ง</a><br><br>";
		die("Error update user: ".$res->error());
	}
	echo "การแก้ไขข้อมูลผู้ใช้สำเร็จ รอสักครู่...<br><br>";
	echo "<meta http-equiv='refresh' content='3; url=../users_list.php'>";
}else if(isset($_GET['act']) && $_GET['act'] == 'DELETE' && isset($_GET['uid'])){
	$usr_id = $_GET['uid'];
	$sql = "DELETE FROM users WHERE usr_id={$usr_id}";
	$res = $conn->query($sql);
	if(!$res){
		echo "<br><a href='../users_list.php' class='w3-button w3-blue'>กรุณาเลือกข้อมูลอีกครั้ง</a><br><br>";
		die("Error delete user: ".$res->error());
	}
	echo "การลบข้อมูลผู้ใช้สำเร็จ รอสักครู่...<br><br>";
	echo "<meta http-equiv='refresh' content='3; url=../users_list.php'>";
}else if(isset($_GET['act']) && $_GET['act'] == 'DELETE' && isset($_GET['nid'])){
	$nid = $_GET['nid'];
	$sql = "DELETE FROM news WHERE id={$nid}";
	$res = $conn->query($sql);
	if(!$res){
		echo "<div class='w3-panel w3-pale-yellow'><h3><i class='fa fa-exclamation-circle'></i> Warning!</h3><p>การลบข่าวไม่สำเร็จ รอสักครู่...</p>";
		echo "</div>";
		echo "<meta http-equiv='refresh' content='2; url=../news_list.php'>";
	}
	echo "<div class='w3-panel w3-pale-green'><h3><i class='fa fa-check-circle-o'></i> Success!</h3><p>การลบข่าวสำเร็จ รอสักครู่...</p>";
	echo "</div>";
	echo "<meta http-equiv='refresh' content='2; url=../news_list.php'>";
}else if(isset($_POST['nSubmit'])){
	$title = $_POST['newsTitle'];
	$body = $_POST['newsBody'];
	$slug = $_POST['newsSlug'];

	$sql = "INSERT INTO news (id, title, slug, body, usr_id) ";
	$sql.= "VALUES(NULL, '$title', '$slug', '$body', (SELECT usr_id FROM users WHERE usr_email LIKE '{$_SESSION['logemail']}'))";
	$res = $conn->query($sql);
	if(!$res){
		echo "<div class='w3-panel w3-pale-yellow'><h3><i class='fa fa-exclamation-circle'></i> Warning!</h3><p>การเพิ่มข่าวไม่สำเร็จ รอสักครู่...</p>";
		echo "</div>";
		echo "<meta http-equiv='refresh' content='2; url=../news_form.php'>";
	}
	echo "<div class='w3-panel w3-pale-green'><h3><i class='fa fa-check-circle-o'></i> Success!</h3><p>การเพิ่มข่าวสำเร็จ รอสักครู่...</p>";
	echo "</div>";
	echo "<meta http-equiv='refresh' content='2; url=../news_list.php'>";
}else if(isset($_POST['neSubmit'])){
	$id = $_POST['newsId'];
	$title = $_POST['newsTitle'];
	$body = $_POST['newsBody'];
	$slug = $_POST['newsSlug'];

	$sql = "UPDATE news SET title=\"{$title}\", body=\"{$body}\", slug=\"{$slug}\" ";
	$sql.= "WHERE id={$id}";
	$res = $conn->query($sql);
	if(!$res){
		echo "<div class='w3-panel w3-pale-yellow'><h3><i class='fa fa-exclamation-circle'></i> Warning!</h3><p>การเพิ่มข่าวไม่สำเร็จ <a href='../news_edit.php?act=EDIT&nid={$id}' class='w3-button w3-blue'>กรอกข้อมูลใหม่อีกครั้ง</a></p>";
		echo "</div>";
		die();
	}
	echo "<div class='w3-panel w3-pale-green'><h3><i class='fa fa-check-circle-o'></i> Success!</h3><p>การแก้ไขข้อมูลข่าวสำเร็จ รอสักครู่...</p>";
	echo "</div>";
	echo "<meta http-equiv='refresh' content='3; url=../news_list.php'>";
} // end if, validate submit

echo "</div>";

closeDB($conn);

include "../templates/footer.php";
?>