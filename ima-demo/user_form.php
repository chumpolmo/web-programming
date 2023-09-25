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
	<div>
		<h1><?=_MY_HEAD_C?></h1>
	</div>
	<p>กรุณาระบุอีเมลที่คุณใช้งานจริง เพื่อสิทธิประโยชน์ในการติดตามข่าวสารและโปรโมชั่นจากทางร้าน</p>
	<form action="src/action_page.php" method="post">
		<table>
			<tr>
				<td>ชื่อ-สกุล</td><td><input type="text" id="accName" name="accName">
				</td>
			</tr>
			<tr>
				<td>อีเมล<span class="w3-text-red">*</span></td><td><input type="email" id="accEmail" name="accEmail" required></td>
			</tr>
			<tr>
				<td>ชื่อผู้ใช้</td><td><input type="text" id="accUser" name="accUser" required></td>
			</tr>
			<tr>
				<td>รหัสผ่าน<span class="w3-text-red">*</span></td><td><input type="password" id="accPasswd" name="accPasswd" required></td>
			</tr>
			<tr>
				<td>หน่วยงาน</td><td><input type="text" id="accComp" name="accComp"></td>
			</tr>
			<tr>
				<td>ประเทศ<span class="w3-text-red">*</span></td><td>
					<select name="accCountry" required>
						<option value="">-เลือก-</option>
						<option value="THA">ไทย</option>
						<option value="ENG">อังกฤษ</option>
						<option value="FRE">ฝรั่งเศส</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>โซนเวลา</td><td>
					<select name="accTimezone">
						<option value="">-เลือก-</option>
						<option value="TH">Asia/Bangkok</option>
						<option value="GH">Africa/Accra</option>
						<option value="US">US/Central</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
				<button type="submit" name="uSubmit" class="w3-button w3-blue">บันทึก</button>
				<button type="reset" class="w3-button w3-red">เคลียร์</button>
				<div>
					<span class="w3-text-red">หมายเหตุ * หมายถึง กรุณากรอกข้อมูลให้สมบูรณ์</span>
				</div>
				</td>
			</tr>
		</table>
	</form>
	<a href='users_list.php' class='w3-button w3-green'>ย้อนกลับ</a>
</div>
<?php
include "templates/footer.php";
?>