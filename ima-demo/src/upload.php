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
	$imgFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
	$uploadChk = 1; // Status flags

	$imgSize = getimagesize($_FILES['iotPhoto']['tmp_name']);
	if($imgSize){
		echo "ไฟล์รูปภาพ -- {$imgSize['mime']}";
	}else{
		echo "ไม่ใช่ไฟล์รูปภาพ!";
		$uploadChk = 0;
	} // end if, check image size

	if($uploadChk == 1){
		$targetFile = $targetDir.$_POST['iotid'].".".$imgFileType;
		if(move_uploaded_file($_FILES['iotPhoto']['tmp_name'], $targetFile)){
			echo "<br>ไฟล์รูปภาพ {$_FILES['iotPhoto']['name']} อัปโหลดสำเร็จ รอสักครู่";
		}else{
			echo "<br>อัปโหลดไฟล์ไม่สำเร็จ รอสักครู่!";
		} // end if, check upload file
	}else{
		echo "<br>ไม่สามารถอัปโหลดไฟล์รูปภาพที่เลือกได้ รอสักครู่!";
	} // end if, check upload status
}else{
	echo "<br>กรุณาเลือกดูรายละเอียดข้อมูลก่อนอัปโหลดไฟล์ รอสักครู่!";
} // end if, check submit button

header("Refresh:3; url=../iot_devices.php");
die();
?>