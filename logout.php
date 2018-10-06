<?php

//การ Logout ก็คือการ clear session ครับ


session_start();
unset($_SESSSION['username']); // clear session
unset($_SESSION['password']);
session_destroy(); // ทำลาย session

session_write_close();
mysql_close();

header("location:login.php");

?>
