<?php

include '../connectmysql.php';
session_start();    //เปิดใช้งานsession

/////////////////////////////////////////////////////////////////////////

$username = $_SESSION[username];   //sessionค่าตัวแปรยังคงอยู่ไม่ว่าเราจะเปลี่ยนหน้าไปและเก็บค่าแบบความลับ
$password = $_SESSION[password];

$_SESSION[username] = $username;   //sessionค่าตัวแปรยังคงอยู่ไม่ว่าเราจะเปลี่ยนหน้าไปและเก็บค่าแบบความลับ
$_SESSION[password] = $password;
//////////////////////////////////////////////////////////////////////////////////////////////////////////

//echo $_SESSION[username] .$username ;
//exit;

/////////////////////////////////////////////////////////////////////////////////////////////////
mysql_query('SET character_set_results=utf8');
mysql_query('SET character_set_client=utf8');            //ฟอนแสดงutf8
mysql_query('SET character_set_connection=utf8');
///////////////////////////////////////////////////////////////////////////////////////////////////
$objDB = mysql_select_db('db_test_lvc');     //  เลือกฐานข้อมูล
//////////////////////////////////////////////////////////////////////////////////////////////////
$strSQL = "SELECT * FROM login where username='$username' and password= '$password'";  //  ภาษาmysql ว่าค่าที่รับมาจาก $username = username ว่าเข้าสู่ฐานข้อมูล
 ////////////////////////////////////////////////////////////////////////////////////////////////////
$objQuery = mysql_query($strSQL) or die('Error Query ['.$strSQL.']');     //คิวรี่ฐานข้อมูลโดยเลือกฐานข้อมูลไว้แล้ว คือ $objDB = mysql_select_db("data_district");
//////////////////////////////////////////////////////////////////////////////////////////////////////
while ($objResult = mysql_fetch_array($objQuery)) {    //mysql_fetch_array ใช้ในการคืนค่าข้อมูลในฐานข้อมูลที่อยู่ในลักษณะแถวredrord   //เก็บค่าไว้แล้ววนด้วยwhile
     //echo "<br>";

  //echo "test = ".$objResult[username];
    //exit;

    $get_username = $objResult[username];     // แทนค่าใส่ลงไปในตัวแปร $get_username
    $get_password = $objResult[password];
}

if ($username == $get_username and $password == $get_password and $_SESSION[username] and $_SESSION[password]) {
} else {
    header('Location:../login.php');
    exit;
}
session_write_close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../jquery-3.3.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title>ผลการสอบ</title>
    <link rel="icon" type="image/่jpg" href="../img/lvc.jpg">
    <?php
      $name_sql = "SELECT * FROM login where username='$username'";
      $name_query = mysql_query($name_sql) or die('Error Query ['.$strSQL.']');
      $name_result = mysql_fetch_array($name_query);
      $name = $name_result[name];
    ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="subject_test.php">Test Online V-NET</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="subject_test.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" >ชื่อผู้ใช้งาน :<?php echo "$name"; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="../logout.php">Logout</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="container" align="center">
<h2>คะแนนทดสอบ</h2>
  <h2>วิชา php</h2>   
</div>
<div class="container">         
  <table class="table table-striped">
    <thead>
      <tr>
        <th>รหัสนักศึกษา</th>
        <th>ชื่อ-นามสกุล</th>
        <th>คะแนนที่ได้</th>
        <th>คลิกเลือกทำแบบทดสอบ</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $strSQL1 = 'SELECT * FROM score ORDER BY id_score ASC';     //// เปลี่ยน score
    $objQuery1 = mysql_query($strSQL1) or die('Error Query ['.$strSQL1.']');
        while ($objResult1 = mysql_fetch_array($objQuery1)) {
            ?>
      <tr>
        <td><div><?php echo $objResult1['id_score']; ?></div></td>
        <td><div><?php echo $objResult1['name']; ?></div></td>
        <td><div><?php echo $objResult1['correct']; ?></div></td>
        <td><a href="test_php.php">เริมทำแบบทดสอบ</a></td>   
      </tr>
    <?php
        }
    ?>
    </tbody>
  </table>
</div>
<div class="container" align="center">
<div class="container"><a href="../subject_test.php">หน้าหลัก</a></div>
</div>
</body>
</html>