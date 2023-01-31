<?php

define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "learning");
define("BASE_URL", "http://localhost/SILVERWOOD");


// ------------ MySQL Connection ------------
$mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
if ($mysqli->connect_errno)
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

// ------------ Email Configuration ------------
define("notificationEmail", "shazaan@SILVERWOOD.com");

// ------------ RECORDS PER PAGE ------------
define("RECORDS_PER_PAGE", 10);

// ------------ Start Session ------------
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

// ------------ FUNCTIONS TO MAKE PHP CODING EASY ------------
$aid = Encrypt('aid');

// Function 1: isLoggedIn() to check whether the user is logged in or not or redirect to login page
function isLoggedIn()
{
	global $aid;
	if (isset($_SESSION[$aid]) || isset($_COOKIE[$aid])) {
		if (isset($_COOKIE[$aid]))
			$_SESSION[$aid] = $_COOKIE[$aid];
		return true;
	} else
		return false;
}

// Function 2: Security function secure() to prevent SQL Injection and Cross Site Scripting (XSS)
function secure($strToSecure)
{
	global $mysqli;
	$strToSecure = mysqli_real_escape_string($mysqli, $strToSecure);
	$strToSecure = strip_tags($strToSecure);
	return $strToSecure;
}

// Function 3: Security function Encrypt() to encrypt a data using MD5 Algorithm
function Encrypt($data)
{
	$cipher = md5(md5("saqib") . secure($data) . md5("nisar"));
	return $cipher;
}

// Function 4: Mailing function mailSender() to send email with server compatible mode
function mailSender($to, $from, $subject, $message)
{
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: <$from>";
	mail($to, $subject, $message, $headers);
}

// Function 5: Setting Flash Data for temporary Messages
function setFlash($name, $value)
{
	$_SESSION[Encrypt("Hertz" . $name)] = $value;
}

// Function 6: Get Flash Data for temporary Messages
function isFlashSet($name)
{
	if (isset($_SESSION[Encrypt("Hertz" . $name)])) {
		return true;
	} else {
		return false;
	}
}

// Function 7: Get Flash But Don't Delete the data  temporary Messages
function getFlash($name)
{
	if (isset($_SESSION[Encrypt("Hertz" . $name)])) {
		$value = $_SESSION[Encrypt("Hertz" . $name)];
		return $value;
	} else {
		return NULL;
	}
}

// Function 8: Get Flash Data for temporary Messages
function getFlashDelete($name)
{
	if (isset($_SESSION[Encrypt("Hertz" . $name)])) {
		$value = $_SESSION[Encrypt("Hertz" . $name)];
		unset($_SESSION[Encrypt("Hertz" . $name)]);
		return $value;
	} else {
		return NULL;
	}
}

// Function 9: Function generate_string() to generate Random Strings (Can be used for Forgot Password & Email Verification)
function generate_string($strength = 32)
{
	$input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$input_length = strlen($input);
	$random_string = '';
	for ($i = 0; $i < $strength; $i++) {
		$random_character = $input[mt_rand(0, $input_length - 1)];
		$random_string .= $random_character;
	}
	return $random_string;
}
