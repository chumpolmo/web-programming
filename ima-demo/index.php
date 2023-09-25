<?php
include "templates/header.php";
include "templates/menu.php";

if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true){
	echo "กรุณาเข้าสู่ระบบ รอสักครู่!";
	header("Refresh: 0; url=login.php");
	die();
}
?>
<div class="w3-container">
	<div class="w3-panel w3-pale-blue w3-border w3-border-blue w3-center w3-round-small">
		<h1><i class="fa fa-laptop" aria-hidden="true"></i><br><?=_MY_HEAD_A?></h1>
		<p>ระบบบริหารจัดการข้อมูลทั่วไป ได้แก่ ข้อมูลผู้ใช้งานระบบ ข้อมูลอุปกรณ์ไอโอที และ อื่น ๆ</p><br><br>
	</div>
</div>
<?php
include "templates/footer.php";
?>