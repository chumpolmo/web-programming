<?php
include "templates/header.php";
include "templates/menu.php";
include "libs/function.php";

if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true){
	echo "กรุณาเข้าสู่ระบบ รอสักครู่!";
	header("Refresh: 3; url=login.php");
	die();
} // end if, validate session

// User edit
$conn = connectDB();

$accId = 0;
$accName = '';
$accEmail = '';
$accUser = '';
$accPasswd = '';
$accComp = '';
$accCountry = '';
$accTimezone = '';
if(isset($_GET['act']) && $_GET['act'] == "EDIT"){
	$sql = "SELECT * FROM users WHERE usr_id={$_GET['uid']}";
	$res = $conn->query($sql);
	$obj = $res->fetch_object();
	$accId = $obj->usr_id;
	$accName = $obj->usr_fullname;
	$accEmail = $obj->usr_email;
	$accUser = $obj->usr_username;
	$accPasswd = $obj->usr_passwd;
	$accComp = $obj->usr_company;
	$accCountry = $obj->usr_country;
	$accTimezone = $obj->usr_timezone;
} // end if, check "EDIT" method
?>
<div class="w3-container">
	<h1><?=_MY_HEAD_B?></h1>
	<p>กรุณาระบุข้อมูลผู้ใช้งานจริง เพื่อสิทธิประโยชน์ในการติดตามข่าวสารและโปรโมชั่นจากทางร้าน</p>
	<form action="src/action_page.php" method="post">
		<input type="hidden" name="accId" value="<?=$accId?>">
		<table>
			<tr>
				<td>ชื่อ-สกุล</td><td><input type="text" id="accName" name="accName" value="<?=$accName?>"></td>
			</tr>
			<tr>
				<td>อีเมล<span class="w3-text-red">*</span></td><td><input type="email" id="accEmail" name="accEmail" value="<?=$accEmail?>" required></td>
			</tr>
			<tr>
				<td>ชื่อผู้ใช้</td><td><input type="text" id="accUser" name="accUser" value="<?=$accUser?>" required></td>
			</tr>
			<tr>
				<td>รหัสผ่าน<span class="w3-text-red">*</span></td><td><input type="password" id="accPasswd" name="accPasswd" value="<?=$accPasswd?>" required></td>
			</tr>
			<tr>
				<td>หน่วยงาน</td><td><input type="text" id="accComp" name="accComp" value="<?=$accComp?>"></td>
			</tr>
			<tr>
				<td>ประเทศ<span class="w3-text-red">*</span></td><td>
					<select name="accCountry" required>
						<option value="">-เลือก-</option>
						<option value="THA" <?php if($accCountry == 'THA') echo 'selected'; ?>>ไทย</option>
						<option value="ENG" <?php if($accCountry == 'ENG') echo 'selected'; ?>>อังกฤษ</option>
						<option value="FRE" <?php if($accCountry == 'FRE') echo 'selected'; ?>>ฝรั่งเศส</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>โซนเวลา</td><td>
					<select name="accTimezone">
						<option value="">-เลือก-</option>
						<option value="TH" <?php if($accTimezone == 'TH') echo 'selected'; ?>>Asia/Bangkok</option>
						<option value="GH" <?php if($accTimezone == 'GH') echo 'selected'; ?>>Africa/Accra</option>
						<option value="US" <?php if($accTimezone == 'US') echo 'selected'; ?>>US/Central</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
				<button type="submit" name="eSubmit" class="w3-button w3-blue" onclick="return confirm('ยืนยันการแก้ไขข้อมูล?')">แก้ไข</button>
				<button type="reset" class="w3-button w3-red">เคลียร์</button>
				<div>
					<span class="w3-text-red">หมายเหตุ * หมายถึง กรุณากรอกข้อมูลให้สมบูรณ์</span>
				</div>
				</td>
			</tr>
		</table><br>
		<a href='users_list.php' class='w3-button w3-green'>ย้อนกลับ</a>
	</form>
</div>
<?php
freeSQL($res);
closeDB($conn);

include "templates/footer.php";
?>