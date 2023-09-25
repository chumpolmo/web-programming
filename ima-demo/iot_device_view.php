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
if(!isset($_GET['act']) || $_GET['act'] !== 'VIEW'){
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
echo "<h1 style='text-align: center;'>รายละเอียดอุปกรณ์ไอโอที (IoT Devices)</h1>";
echo "<div class='w3-row'>";
echo "<div class='w3-row w3-left'>";
echo "<h2><i class='fa fa-inbox' aria-hidden='true'></i> รหัสอุปกรณ์ : {$_GET['iotid']}</h2>";

// $key - array index (0 --> n-1)
foreach ($iotDevices as $key => $value) {
  // code...
  if ($_GET['iotid'] == $value['iotId']) {
    echo "<div style=\"border: 1px solid #CCCCCC; border-radius:5px; display: inline-block; width: 100%; margin: 5px; padding: 5px;\">";
    echo "<table border=\"0\" class='w3-table w3-striped'>";
    echo "<tr><td style='width:20%;text-align:right;' rowspan=\"6\"><img src=\"".$value['iotPhoto']."\" style=\"width:100%;\" title=\"".$value['iotTitle']."\"></td>";
    echo "<tr><td style='vertical-align:text-top;'>ชื่ออุปกรณ์</td><td style='vertical-align:text-top;'>".$value['iotTitle']."</td></tr>";
    echo "<tr><td style='vertical-align:text-top;'>รายละเอียด</td><td style='vertical-align:text-top;'>".$value['iotId']." (*ต้องเป็นข้อมูลตรงตามเนื้อหา)</td></tr>";
    echo "<tr><td style='vertical-align:text-top;'>ราคา</td><td style='vertical-align:text-top;'>".$value['iotId']." (*ต้องเป็นข้อมูลตรงตามเนื้อหา)</td></tr>";
    
    // สร้างฟังก์ชันเพื่อตรวจสอบสถานะของอุปกรณ์และแสดงผลสถานะ ดังด้านล่าง
    // True - In stock, False - Out of stock
    echo "<tr><td style='vertical-align:text-top;'>สถานะ</td><td style='vertical-align:text-top;'>".getStatus($value['iotStatus'])."</td></tr>";

    // สร้างรูปแบบวันที่ตามต้องการ
    $curDate = strtotime('today');
    $strDateTmp = strtotime($value['iotDate']);
    $addedDateTmp = (($curDate - $strDateTmp) / 86400);
    $myDate = date('j F Y', $strDateTmp);

    // ฟังก์ชันสำหรับการแปลงทศนิยมให้เป็นจำนวนเต็ม
    // ceil(value)
    // floor(value)
    echo "<tr><td style='vertical-align:text-top;'>วันที่นำเข้าสินค้า</td><td style='vertical-align:text-top;'>".$myDate." (อยู่ในระบบมาแล้ว ".$addedDateTmp." วัน)</td></tr>";

    echo "<tr><td colspan='2'>";
    echo "<a href='iot_device_edit.php?act=EDIT&iotid={$value['iotId']}' class='w3-orange w3-button'>Edit photo...</a>";
    echo "</td></tr>";

    echo "</table>";
    echo "</div>";
  } // End if
} // End foreach

echo "</div></div>";

echo "<p><a href='iot_devices.php' class='w3-green w3-button'>ย้อนกลับ</a></p>";
echo "</div>";

include "./templates/footer.php";
?>