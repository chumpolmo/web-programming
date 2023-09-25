<?php
/***
 * Student Code: 026608082023-0
 * Author: Chumpol Mokarat
 * Date: Aug 8, 2023
 */

if(isset($_POST['submit'])){
	// code...
	$targetDir = "../photos/";
	$targetFile = basename($_FILES['iotPhoto']['name']);
	$uploadChk = 1; // Status flag
	$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

	$checkSize = getimagesize($_FILES['iotPhoto']['tmp_name']);
	if($checkSize !== false){
		echo "ไฟล์รูปภาพเป็น - ".$checkSize['mime'];
		$uploadChk = 1;
	} else {
		echo "กรุณาเลือกไฟล์รูปภาพ!";
		$uploadChk = 0;
	} // end if, check image size

	// ตรวจสอบรูปแบบไฟล์ที่อนุญาตให้ upload
	// code...

	if($uploadChk == 0){
		echo "ไฟล์ที่เลือกมาไม่สามารถอัปโหลดในระบบได้!";
	} else {
		$targetFile = $targetDir . $_POST['iotid'] . '.' .$imageFileType;
		if(move_uploaded_file($_FILES['iotPhoto']['tmp_name'], $targetFile)){
			echo "อัปโหลดรูปภาพสำเร็จ...".basename($_FILES['iotPhoto']['name']);
		} else {
			echo "การอัปโหลดรูปภาพไม่สำเร็จ!";
		} // end if, this file was not uploaded
	} // end if, check $uploadChk var

} else {
	echo "Permission denied, please waiting...";
} // end if, check submit button

header("Refresh:3; url=../iot_devices.php");
die();
?>