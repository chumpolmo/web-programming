<?php
// Database information
define("_DB_HOST", "localhost");
define("_DB_NAME", "xxx"); // Database Name
define("_DB_USER", "xxx"); // Database Username
define("_DB_PASSWD", "xxx"); // Database Password

function connectDB(){
	$conn = new mysqli(_DB_HOST, _DB_USER, _DB_PASSWD, _DB_NAME);
    if($conn->connect_error){
      die("Connection fail " . $conn->connect_error);
      return false;
    }
    return $conn;
} // end connectDB function

function freeSQL($res){
	$res->free_result();
} // end freeSQL function 

function closeDB($conn){
	$conn->close();
} // end closeDB function

// ตรวจสอบข้อมูลประเทศ
function getCountry($cid){
	$tmp = null;
	switch ($cid) {
		case 'THA':
			$tmp = "ไทย (Thailand)";
			break;
		case 'ENG':
			$tmp = "อังกฤษ (England)";
			break;
		case 'FRE':
			$tmp = "ฝรั่งเศส (French)";
			break;
		default:
			$tmp = "ไม่ระบุ (N/A)";
			break;
	}
	return $tmp;
}

// ตรวจสอบข้อมูลโซนเวลา
function getTimeZone($tzid){
	$tmp = null;
	if ($tzid == "TH") {
		$tmp = "Asia/Bangkok";
	} else if ($tzid == "GH") {
		$tmp = "Africa/Accra";
	} else if ($tzid == "US") {
		$tmp = "US/Central";
	} else {
		$tmp = "ไม่ระบุ (N/A)";
	}
	return $tmp;
}

// ตรวจสอบสถานะอุปกรณ์
function getStatus($s){
	$st = "";
	// Code...
	if ($s == true) {
		$st = "In stock";
	} else {
		$st = "Out of stock";
	}
	return $st;
}

// ตรวจสอบสถานะผู้ใช้งานระบบ
function getRole($r){
	if($r == 1){
		return "Active";
	}
	return "Inactive";
}

// ตรวจสอบบทบาทผู้ใช้งานระบบ
function getActive($a){
	if($a == 10){
		return "สมาชิก (Member)";
	}else if($a == 20){
		return "ผู้ดูแลระบบ (Administrator)";
	}else
		return "ผู้ใช้ทั่วไป (Guest)";
}
?>