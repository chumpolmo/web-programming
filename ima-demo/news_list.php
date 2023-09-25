<?php
/***
 * Student Code: 026599999999-9
 * Author: Chumpol Mokarat
 * Date: Sep 14, 2023
 */
include "./libs/function.php";
include "./templates/header.php";
include "./templates/menu.php";

echo "<div class='w3-container'>";
echo "<h1 style='text-align: center;'>ข่าวประชาสัมพันธ์</h1>";

// Code here.
$conn = connectDB();
$sql = "SELECT * FROM news";

// For search data
$keyword = '';
if(isset($_GET['sSubmit'])){
  $keyword = $_GET['keyword'];
  $sql = "SELECT * FROM news WHERE ";
  $sql.= "title LIKE '%{$keyword}%' OR ";
  $sql.= "body LIKE '%{$keyword}%' OR ";
  $sql.= "slug LIKE '%{$keyword}%' ";
} // end if, check submit button 
$res = $conn->query($sql);

// Your comment
echo "<div class='w3-left'>";
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
  echo "<a href='news_form.php' class='w3-green w3-button'>เพิ่มข่าวใหม่</a>";
}
echo " ข้อมูลข่าว {$res->num_rows} รายการ";
echo "</div>";

echo "<div class='w3-right'>";
echo "<form action='{$_SERVER['PHP_SELF']}' method='GET'>";
echo "คำค้น : <input type='text' name='keyword' value='{$keyword}'>";
echo "<input type='submit' name='sSubmit' value='ค้นหา' class='w3-blue'>";
echo "<input type='submit' name='cSubmit' value='เคลียร์' class='w3-red' onclick='location.href=\"./\"'>";
echo "</form>";
echo "</div>";
?>
<div class="w3-row">
  <div class="w3-row w3-center">
<?php
if($res->num_rows > 0){
  while($news = $res->fetch_object()){
?>
    <div class="w3-card-2 w3-col" style="width:24%;margin:6px;">
      <div class="w3-display-container">
        <img src="./photos/newspaper.png" style="width:100px;" title="รหัสข่าว <?=$news->id?>">
        <div class="w3-display-topright w3-container w3-pale-green w3-round">รหัสข่าว <?=$news->id?></div>
      </div>
      <h6 class="w3-pale-blue"><?=$news->title?></h6>
      <p><?=mb_substr($news->body, 0, 100)."..."?></p>
      <p>
        <?php 
          echo "<a href='news_view.php?act=VIEW&nid={$news->id}' class='w3-button w3-green'>รายละเอียด</a> ";
          if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
          echo "<a href='news_edit.php?act=EDIT&nid={$news->id}' class='w3-button w3-orange'>แก้ไข</a> <a href='./src/action_page.php?act=DELETE&nid={$news->id}' onclick='return confirm(\"กรุณายืนยันการลบข้อมูล?\");' class='w3-button w3-red'>ลบ</a>";
        } ?>
      </p>
    </div>
<?php
  }
}else{
  // Code here.
?>
    <div class="w3-card-2 w3-col" style="width:100%;margin:6px;">
      <div class="w3-display-container">
        --ไม่มีรายการข้อมูล--
      </div>
    </div>
<?php
}
?>
  </div>
</div>
<?php
// Free result memory
freeSQL($res);
closeDB($conn);

echo "<br>";
echo "<a href='index.php' class='w3-button w3-green'>กลับหน้าหลัก</a>";
echo "</div>";

// Close the connection

include "./templates/footer.php";
?>