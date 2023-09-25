<?php
include "../templates/header.php";
include "../templates/menu.php";

session_destroy();

// Delete a cookie
// setcookie('ck_logrem', '', time() - 3600);
// setcookie('ck_logemail', '', time() - 3600);
// setcookie('ck_logpasswd', '', time() - 3600);
?>
<div class="w3-container">
	<div class="w3-panel w3-pale-blue w3-border w3-border-blue w3-center w3-round-small">
		<h1><i class="fa fa-sign-out" aria-hidden="true"></i> ออกจากระบบ</h1>
		<p>กำลังออกจากระบบ รอสักครู่...</p><br><br>
	</div>
</div>
<?php
echo "<meta http-equiv='refresh' content='3; url=../login.php'>";

include "../templates/footer.php";
?>