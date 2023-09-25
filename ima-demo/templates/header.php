<?php
session_start();

if(file_exists("libs/config.php"))
	include "libs/config.php";
else
	include "../libs/config.php";
?>
<html>
<head>
	<meta charset="utf-8">
	<title><?=_MY_TITLE?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		body,h1,h2,h3,h4,h5,h6,p,td,input,button,select {
			font-family: Prompt, cursive;
		}
	</style>
</head>
<body>