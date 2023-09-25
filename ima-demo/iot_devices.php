<?php
/***
 * Student Code: xxxxxxxxxxxx-x
 * Author:  Chumpol Mokarat
 * Date: July 27, 2023
 * Source: https://www.lazada.co.th/
 */

include "./libs/function.php";
include "./templates/header.php";
include "./templates/menu.php";

if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true){
  echo "กรุณาเข้าสู่ระบบ รอสักครู่!";
  header("Refresh: 3; url=login.php");
  die();
}

$iotDevices = array(
  array(
    "iotId" => 1,
    "iotTitle" => "สมาร์ทรีโมทคอนโทรลโดย Ewelink APP",
    "iotDesc" => "สมาร์ทรีโมทคอนโทรลโดย Ewelink APP สำหรับ Smart Home 63A DIN Rail WIFI Circuit Breaker Switch TONGOU",
    "iotPhoto" => "./photos/1.png",
    "iotPrice" => 649,
    "iotStatus" => true,
    "iotDate" => "05/10/2023"
  ),
  array(
    "iotId" => 2,
    "iotTitle" => "Smart Human Body Sensor",
    "iotDesc" => "Tuya ZigBee 3.0 PIR Smart Human Body Sensor เซ็นเซอร์ประตูหน้าต่างอุณหภูมิและความชื้น Wireless Motion Detector Security Alarm System สำหรับ Alexa Goo Gle Home",
    "iotPhoto" => "./photos/2.png",
    "iotPrice" => 209,
    "iotStatus" => false,
    "iotDate" => "06/22/2023"
  ),
  array(
    "iotId" => 3,
    "iotTitle" => "Ewelink แป้นสวิตช์ Wi-Fi",
    "iotDesc" => "Ewelink แป้นสวิตช์ Wi-Fi เปิดปิด ตั้งเวลาผ่านแอปและรีโมท 433MHz รองรับ Google Home/Alexa Smart Wall Touch Switch Wi-Fi RF433Mhz",
    "iotPhoto" => "./photos/3.png",
    "iotPrice" => 479,
    "iotStatus" => true,
    "iotDate" => "05/24/2023"
  ),
  array(
    "iotId" => 4,
    "iotTitle" => "Tuya Wi-Fi Zigbee Smart Air Box",
    "iotDesc" => "Tuya Wi-Fi Zigbee Smart Air Box เซ็นเซอร์ตรวจจับแก๊สฟอร์มัลดีไฮด์, VOC, CO2, อุณหภูมิและความชื้น",
    "iotPhoto" => "./photos/4.png",
    "iotPrice" => 499,
    "iotStatus" => true,
    "iotDate" => "04/08/2023"
  ),
  array(
    "iotId" => 5,
    "iotTitle" => "CPC Wi-Fi Zigbee Smart Light Box",
    "iotDesc" => "CPC Wi-Fi Zigbee Smart Light Box เซ็นเซอร์ตรวจจับความเคลื่อนไหวเพื่อเปิด/ปิดไฟ",
    "iotPhoto" => "./photos/5.png",
    "iotPrice" => 299,
    "iotStatus" => false,
    "iotDate" => "03/09/2023" // String or text
  )
);

// Code here.
echo "<div class='w3-container'>";
echo "<h1 style='text-align: center;'>ข้อมูลอุปกรณ์ไอโอที (IoT Devices)</h1>";
echo "<div class='w3-row'>";
echo "<div class='w3-row w3-center'>";

// $key - array index (0 --> n-1)
foreach ($iotDevices as $key => $value) {
  // code...
  echo "<div class='w3-card-2 w3-col' style='width:30%;margin:6px;'>";
  echo "<div class='w3-display-container'>";
  echo "<img src='{$value['iotPhoto']}' style='width:100%;' title='รหัสข่าว {$value["iotId"]}'>";
  echo "<div class='w3-display-topright w3-container w3-pale-blue w3-round'>รหัสอุปกรณ์ {$value["iotId"]}</div>";
  echo "</div>";
  echo "<h6>{$value['iotTitle']}</h6>";
  echo "<p><a href='iot_device_view.php?act=VIEW&iotid={$value["iotId"]}' class='w3-green w3-button'>ดูรายละเอียด</a></p>";

  echo "</p></div>";
} // End foreach

echo "</div></div></div>";

echo "<p style=\"text-align: right;color: #CECECE;font-style: italic;\">ขอบคุณข้อมูลจาก: https://www.lazada.co.th/</p>";

include "./templates/footer.php";
?>