<?php
include 'connectmysql.php';
session_start();    //เปิดใช้งานsession

/////////////////////////////////////////////////////////////////////////


$username=$_SESSION[username];   //sessionค่าตัวแปรยังคงอยู่ไม่ว่าเราจะเปลี่ยนหน้าไปและเก็บค่าแบบความลับ
$password=$_SESSION[password];

$_SESSION[username]=$username;   //sessionค่าตัวแปรยังคงอยู่ไม่ว่าเราจะเปลี่ยนหน้าไปและเก็บค่าแบบความลับ
$_SESSION[password]=$password;
//////////////////////////////////////////////////////////////////////////////////////////////////////////

//echo $_SESSION[username] .$username ;
//exit;


/////////////////////////////////////////////////////////////////////////////////////////////////
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");            //ฟอนแสดงutf8
mysql_query("SET character_set_connection=utf8");
///////////////////////////////////////////////////////////////////////////////////////////////////
$objDB = mysql_select_db("db_test_lvc");     //  เลือกฐานข้อมูล
//////////////////////////////////////////////////////////////////////////////////////////////////
$strSQL = "SELECT * FROM login where username='$username' and password= '$password'";  //  ภาษาmysql ว่าค่าที่รับมาจาก $username = username ว่าเข้าสู่ฐานข้อมูล
 ////////////////////////////////////////////////////////////////////////////////////////////////////
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");     //คิวรี่ฐานข้อมูลโดยเลือกฐานข้อมูลไว้แล้ว คือ $objDB = mysql_select_db("data_district");  
//////////////////////////////////////////////////////////////////////////////////////////////////////
while($objResult = mysql_fetch_array($objQuery))    //mysql_fetch_array ใช้ในการคืนค่าข้อมูลในฐานข้อมูลที่อยู่ในลักษณะแถวredrord   //เก็บค่าไว้แล้ววนด้วยwhile
{
    $get_username=$objResult[username];     // แทนค่าใส่ลงไปในตัวแปร $get_username
	  $get_password=$objResult[password];
}

if($username==$get_username and $password==$get_password and $_SESSION[username] and $_SESSION[password])
	{
		
	}else{
    header("Location:login.php");
    exit;
	}
session_write_close()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>หน้าผู้ดูแลระบบ</title>
    <link rel="icon" type="image/่jpg" href="img/lvc.jpg">
</head>
<body>
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-header">

            <a class="navbar-brand" href="admin_page.php">Test Online V-NET</a>
</div>
            <ul class="nav navbar-nav">
                <li class="active">
                  <a href="subject_test.php" >Home ทดสอบการใช้งาน</a>
                </li>
                <li>
                  <a>ชื่อผู้ใช้งาน :<? echo "$username"; ?></a>
                </li>
                <li>
                  <a href="logout.php">Logout</a>
                </li>
              </ul>
</div>
</nav>
<div class="container">
<div align="center">
  <h2>ยินดีต้อนรับเข้าสู่ระบบ</h2>
  <p>แบบทดสอบออนไลน์ TEST LVC ONLINE V-NET</p>            
</div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>รหัสวิชา</th>
        <th>ชื่อวิชา</th>
        <th>ครูผู้สอน</th>
        <th>คลิกเลือกทำแบบทดสอบ</th>
        <th>ดูคะแนน</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>300000</td>
        <td>php</td>
        <td>ปิ่น</td>
        <td><a href="30000/admin/test_update.php">แก้ไขแบบทดสอบ</a></td>
        <td><a href="30000/admin/score_update.php">ดูคะแนน</a></td>
      </tr>
      <!-- เพิ่มหัวข้อตรงนี้นะ -->
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td><a href="">แก้ไขแบบทดสอบ</a></td>
        <td><a href="">ดูคะแนน</a></td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
        <td><a href="">แก้ไขแบบทดสอบ</a></td>
        <td><a href="">ดูคะแนน</a></td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>