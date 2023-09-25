<?php
/***
 * Student Code: xxxxxxxxxxxx-x
 * Author:  Chumpol Mokarat
 * Date: September 4, 2023
 */
include "./libs/function.php";
include "./templates/header.php";
include "./templates/menu.php";

if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true){
  echo "กรุณาเข้าสู่ระบบ รอสักครู่!";
  header("Refresh: 3; url=login.php");
  die();
}

// Code here.
echo "<div class='w3-container'>";
echo "<h1 style='text-align: center;'>ข้อมูลบัญชีผู้ใช้ระบบ</h1>";

$conn = connectDB();
$sql = "SELECT * FROM users";

// For search data
$keyword = "";
if(isset($_GET['sSubmit']) && $_GET['sSubmit'] == 'ค้นหา'){
  $keyword = $_GET['keyword'];
  $sql = "SELECT * FROM users WHERE usr_email LIKE '%$keyword%' OR usr_username LIKE '%$keyword%' OR usr_fullname LIKE '%$keyword%'";

} // end if, validate search button
$res = $conn->query($sql);

echo "<div class='w3-left'>";
echo "<a href='user_form.php' class='w3-button w3-green'>เพิ่มข้อมูลผู้ใช้</a>";
echo "&nbsp;&nbsp;<i class='fa fa-list-alt' aria-hidden='true'></i> ข้อมูลผู้ใช้ {$res->num_rows} รายการ<br>";
echo "</div>";

echo "<div class='w3-right'>";
echo "<form action='{$_SERVER['PHP_SELF']}' method='GET'>";
echo "คำค้น : <input type='text' name='keyword' value='$keyword'>";
echo "<input type='submit' name='sSubmit' value='ค้นหา' class='w3-blue'>";
echo "<input type='submit' name='cSubmit' value='เคลียร์' class='w3-red' onclick='location.href=\"./\"'>";
echo "</form>";
echo "</div>";

echo "<table style='width:100%' class='w3-table-all'>";
echo "<tr class='w3-blue'><td style='width:10%;'>รหัสผู้ใช้</td><td style='width:35%;'>อีเมล</td><td style='width:35%;'>ชื่อ-สกุล</td><td style='width:20%;'>ดำเนินการ</td></tr>";

if ($res->num_rows > 0) {
  while($row = $res->fetch_object()) {
    echo "<tr><td>" . $row->usr_id. "</td><td>" . $row->usr_email. "</td><td>" . $row->usr_fullname. "</td>";
    echo "<td><a href='user_view.php?act=VIEW&uid={$row->usr_id}' class='w3-button w3-green'>รายละเอียด</a> <a href='user_edit.php?act=EDIT&uid={$row->usr_id}' class='w3-button w3-orange'>แก้ไข</a> ";
    if($row->usr_id !== "1000")
      echo "<a href='./src/action_page.php?act=DELETE&uid={$row->usr_id}' onclick='return confirm(\"กรุณายืนยันการลบข้อมูล?\");' class='w3-button w3-red'>ลบ</a>";
    else
      echo "<a href='#' onclick='alert(\"ไม่สามารถลบข้อมูลนี้ได้?\");' class='w3-button w3-grey'>ลบ</a>";
    echo "</td></tr>";
  }
} else {
  echo "<tr><td colspan='4' class='w3-center'>--ไม่มีข้อมูลผู้ใช้ระบบ--</td></tr>";
}
freeSQL($res);
echo "<table><br>";
echo "<a href='index.php' class='w3-button w3-green'>กลับหน้าหลัก</a>";
echo "</div>";

closeDB($conn);

include "./templates/footer.php";
?>