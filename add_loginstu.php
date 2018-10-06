<?php
include 'connectmysql.php';
$username = $_POST[txtusername];
$password = $_POST[txtpassword];
$name = $_POST[txtname];
$check = $_POST[check];

if($check)
    {
        $dbname="db_test_lvc";
        mysql_select_db($dbname) or die ("connect db fail");
        $log = "insert into login values ('$username','$password','$name','student')"; 
		$dbquery= mysql_db_query($dbname,$log) or die ("not insert");
        ?>
        <script>
        alert("สมัครสมาชิกเสร็จสิ้น")
        window.location.assign("login.php")
        </script>
        <?
    }
else
    {
        ?>
        <script>
        window.location.assign("form_addlogin.php?e=error")
        </script>
        <?
    }

?>