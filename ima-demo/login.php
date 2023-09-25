<?php
/***
 * Student Code: xxxxxxxxxxxx-x
 * Author:  Chumpol Mokarat
 * Date: August 99, 9999
 */
include "./templates/header.php";
include "./templates/menu.php";
include "./libs/function.php";

$f_logRemember = '';
$f_logEmail = '';
$f_logPasswd = '';
if(isset($_COOKIE['ck_logrem']) && $_COOKIE['ck_logrem'] == true) {
  $f_logRemember = 'checked';
  $f_logEmail = $_COOKIE['ck_logemail'];
  $f_logPasswd = $_COOKIE['ck_logpasswd'];
}
?>
<div class="w3-container"><br>
  <div class="w3-container">
    <h1><i class="fa fa-sign-in" aria-hidden="true"></i> Login</h1>
  </div>
  <form action="./src/action_page.php" method="post" class="w3-container">
  <p>
    <label><i class="fa fa-envelope" aria-hidden="true"></i> อีเมล (E-mail)</label>
    <input type="email" name="logEmail" class="w3-input w3-border" value="<?=$f_logEmail?>" placeholder="ระบุอีเมล" required><br>
    <label><i class="fa fa-key" aria-hidden="true"></i> รหัสผ่าน (Password)</label> 
    <input type="password" name="logPasswd" class="w3-input w3-border" value="<?=$f_logPasswd?>" placeholder="ระบุรหัสผ่าน" required><br>
    <input type="checkbox" name="logRemember" class="w3-check" value="1" <?=$f_logRemember?>> <label>Remember me</label><br><br>
    <button type="submit" name="logSubmit" class="w3-button w3-blue"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
    <button type="reset" class="w3-button w3-grey">Reset</button>
  </p>
  </form>
</div>
<?php
include "./templates/footer.php";
?>