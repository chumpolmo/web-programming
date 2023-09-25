<?php
/***
 * Student Code: 026608082023-0
 * Author:  Chumpol Mokarat
 * Date: Sep 7, 2023
 */

include "./libs/function.php";
include "./templates/header.php";
include "./templates/menu.php";

// https://www.example.com/iot_device_view.php?act=VIEW&iotid=x
if(!isset($_GET['act']) || $_GET['act'] !== 'VIEW'){
    echo "<div class='w3-container'>";
    echo "กรุณาเลือกดูรายละเอียดข้อมูลก่อน!<br/>";
    echo "<a href='users_list.php'>ย้อนกลับ</a>";
    echo "</div>";
    die();
} // end if

// Code here.
echo "<div class='w3-container'>";
echo "<h1 style='text-align: center;'>ข้อมูลผู้ใช้งาน</h1>";
echo "<h2><i class='fa fa-id-card'></i> รหัสผู้ใช้ : {$_GET['uid']}</h2>";

$conn = connectDB();
$sql = "SELECT * FROM users WHERE usr_id={$_GET['uid']}";
$res = $conn->query($sql);

while($user = $res->fetch_object()){
  echo "<div class='w3-card-4'>";
  echo "<header class='w3-container w3-blue'>";
  echo "<h1>ชื่อ-สกุล : {$user->usr_fullname}</h1>";
  echo "</header>";

  echo "<div class='w3-container'>";
  echo "<p><table class='w3-table w3-striped'>";
  echo "<tr><td style='width:25%;'>อีเมล (E-mail)</td><td>{$user->usr_email}</td></tr>";
  echo "<tr><td>ชื่อผู้ใช้ (Username)</td><td>{$user->usr_username}</td></tr>";
  echo "<tr><td>หน่วยงาน (Company)</td><td>{$user->usr_company}</td></tr>";
  echo "<tr><td>ประเทศ (Country)</td><td>{$user->usr_country}</td></tr>";
  echo "<tr><td>เขตเวลา (Timezone)</td><td>{$user->usr_timezone}</td></tr>";
  echo "<tr><td>สถานะการใช้งาน (Active)</td><td>".getActive($user->usr_active)."</td></tr>";
  echo "<tr><td>ประเภทผู้ใช้งาน (Role)</td><td>".getRole($user->usr_role)."</td></tr>";
  echo "</table></p>";
  echo "</div>";
  echo "</div>";
} // End while loop

echo "<br><a href='users_list.php' class='w3-button w3-green'>ย้อนกลับ</a>";
echo "</div>";

include "./templates/footer.php";
?>