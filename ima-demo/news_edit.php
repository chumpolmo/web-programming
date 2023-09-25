<?php
/***
 * Student Code: 026599999999-9
 * Author: Chumpol Mokarat
 * Date: Sep 14, 2023
 */
include "./libs/function.php";
include "./templates/header.php";
include "./templates/menu.php";

if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true){
  echo "กรุณาเข้าสู่ระบบ รอสักครู่!";
  header("Refresh: 3; url=login.php");
  die();
}

$conn = connectDB();

$id = 0;
$title = '';
$body = '';
$slug = '';
if(isset($_GET['act']) && $_GET['act'] == "EDIT"){
	$sql = "SELECT * FROM news WHERE id={$_GET['nid']}";
	$res = $conn->query($sql);
	$obj = $res->fetch_object();
	$id = $obj->id;
	$title = $obj->title;
	$slug = $obj->slug;
	$body = $obj->body;
} // end if, check "EDIT" method

echo "<div class='w3-container'>";
echo "<h1 style='text-align: center;'>แก้ไขข่าวประชาสัมพันธ์</h1>";
?>
<form action="./src/action_page.php" method="post">
  <table style="width:100%;">
    <tr>
      <td style="width:15%;">เรื่อง (Title)*</td><td><input type="text" name="newsTitle" maxlength="128" class="w3-input w3-border" value="<?=$title?>" required></td>
    </tr>
    <tr>
      <td>รายละเอียด (Body)*</td><td><textarea name="newsBody" rows="5" class="w3-input w3-border" required><?=$body?></textarea></td>
    </tr>
    <tr>
      <td>Slug</td><td><input type="text" name="newsSlug" class="w3-input w3-border" maxlength="128" value="<?=$slug?>"></td>
    </tr>
    <tr>
      <td></td><td>
      	<input type="hidden" name="newsId" value="<?=$id?>">
        <button type="submit" name="neSubmit" class="w3-button w3-blue">แก้ไข</button>
        <button type="reset" class="w3-button w3-red">เคลียร์</button>
      </td>
    </tr>
  </table>
</form>
<?php
echo "<br><a href='news_list.php' class='w3-button w3-green'>ย้อนกลับ</a>";
echo "</div>";

include "./templates/footer.php";
?>
