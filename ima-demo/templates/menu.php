<!-- style="text-align: center;border-top: 1 solid seagreen;border-bottom: 1 solid seagreen;" -->
<nav class="w3-bar w3-blue" style="text-align: center;border-top: 1 solid seagreen;border-bottom: 1 solid seagreen;">
 <a href="index.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-home" aria-hidden="true"></i> หน้าแรก</a>
 <a href="news_list.php" class="w3-bar-item w3-button w3-mobile">ข่าวประชาสัมพันธ์</a>
 <?php
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
 ?>
 <div class="w3-dropdown-hover">
    <button class="w3-button">ข้อมูลหลัก <i class="fa fa-caret-down"></i></button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="users_list.php" class="w3-bar-item w3-button w3-mobile">บัญชีผู้ใช้</a>
        <a href="iot_devices.php" class="w3-bar-item w3-button w3-mobile">อุปกรณ์ไอโอที</a>
    </div>
 </div>
 <?php } ?>
 <a href="contact.php" class="w3-bar-item w3-button w3-mobile">ติดต่อเรา</a>
 <span class="w3-right w3-mobile">
    <?php
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
            echo "<a href='./src/logout.php' onclick='return confirm(\"ยืนยันการออกจากระบบ?\")' class='w3-bar-item w3-button w3-mobile'><i class='fa fa-sign-out' aria-hidden='true'></i> ออกจากระบบ</a>";
        }else{
            echo "<a href='login.php' class='w3-bar-item w3-button w3-mobile'>เข้าสู่ระบบ</a>";
        }
    ?>
 </span>
</nav>
<label class='w3-right w3-margin-right'>
<?php
        $dateTmp = date('j F Y'); // m/d/Y, d/m/y, j F Y 
        if(isset($_SESSION['logemail']) && $_SESSION['logemail'] == true){
            echo "<i class='fa fa-user-circle-o' aria-hidden='true'></i> {$_SESSION['logemail']}&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        echo "<i class='fa fa-calendar' aria-hidden='true'></i> ".$dateTmp;
?>
</label>
