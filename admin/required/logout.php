<?php
require("config.php");

session_destroy();

session_start();
setcookie("aid", "", time() - 60 * 5);
setFlash("success", "Logged Out Succesfully");
header("Location:../login");

exit();
