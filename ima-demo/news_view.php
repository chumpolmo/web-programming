<?php
/***
 * Student Code: 026599999999-9
 * Author: Chumpol Mokarat
 * Date: Sep 14, 2023
 */
include "./libs/function.php";
include "./templates/header.php";
include "./templates/menu.php";

$conn = connectDB();

$id = 0;
$title = "";
$body = "";
$slug = "";
$author = "";
if(isset($_GET['act']) && $_GET['act'] == 'VIEW'){
  $id = $_GET['nid'];

  $sql = "SELECT N.*, U.usr_fullname AS author FROM news AS N ";
  $sql.= "INNER JOIN users AS U ON N.usr_id=U.usr_id WHERE N.id={$id}";
  $res = $conn->query($sql);
  if(!$res){
    echo "<div class='w3-panel w3-pale-yellow'><h3>Warning!</h3><p>แสดงรายการข่าวไม่สำเร็จ!</p>";
    echo "</div>";
    echo "<a href='news_list.php' class='w3-button w3-green'>กลับหน้าหลัก</a>";
    die();
  }
  $row = $res->fetch_object();
  $title = $row->title;
  $body = $row->body;
  $slug = $row->slug;
  $author = $row->author;
}

closeDB($conn);

echo "<div class='w3-container'>";
echo "<h1 style='text-align: center;'>รายละเอียดข่าวประชาสัมพันธ์</h1>";
?>
<div class="w3-card-4">
  <header class="w3-container w3-blue">
    <h1><i class="fa fa-newspaper-o" aria-hidden="true"></i> รหัสข่าว: <?=$id?></h1>
  </header>
  <div class="w3-container">
    <p>
      <b>เรื่อง (Title):</b> <?=$title?><br>
      <b>รายละเอียด (body):</b> <?=$body?><br>
      <b>Slug:</b> <?=$slug?><br>
    </p>
  </div>
  <footer class="w3-container w3-pale-blue">
    <p class="w3-right"><i class="fa fa-user-circle" aria-hidden="true"></i> <b>ผู้โพสต์:</b> <?=$author?></p>
  </footer>
</div>
<?php
echo "<br><a href='news_list.php' class='w3-button w3-green'>ย้อนกลับ</a>";
echo "</div>";

include "./templates/footer.php";
?>
