<?php
/***
 * Student Code: 026608082023-0
 * Author:  Chumpol Mokarat
 * Date: Aug 8, 2023
 * Source: https://www.lazada.co.th/
 */

include "./libs/function.php";
include "./templates/header.php";
include "./templates/menu.php";

// https://www.example.com/iot_device_view.php?act=VIEW&iotid=x
if(!isset($_GET['act']) || $_GET['act'] !== 'EDIT'){
    echo "กรุณาเลือกดูรายละเอียดข้อมูลก่อน!<br/>";
    echo "<a href='iot_devices.php'>ย้อนกลับ</a>";
    die();
} // end if

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
echo "<h1 style='text-align: center;'>แก้ไขอุปกรณ์ไอโอที (IoT Devices)</h1>";
echo "<div class='w3-row'>";
echo "<div class='w3-row w3-left'>";
echo "<h2><i class='fa fa-inbox' aria-hidden='true'></i> รหัสอุปกรณ์ : {$_GET['iotid']}</h2>";

// File upload form
echo "<div class='w3-center' style='width:100%;'>";
echo "<form action='./src/upload.php' method='post' enctype='multipart/form-data'>";
echo "เลือกรูปภาพสำหรับอัปโหลด:<br>";
echo "<input type='file' name='iotPhoto' class='w3-input'>";
echo "<button type='submit' name='submit' class='w3-blue w3-button'>อัปโหลดรูปภาพ</button>";
echo "<input type='hidden' name='iotid' value='{$_GET['iotid']}'>";
echo "</form>";
echo "</div>";

echo "</div></div>";

echo "<p><a href='iot_devices.php' class='w3-green w3-button'>ย้อนกลับ</a></p>";
echo "</div>";

include "./templates/footer.php";
?>