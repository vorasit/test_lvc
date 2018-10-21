<?php

include '../connectmysql.php';
session_start();    //เปิดใช้งานsession

/////////////////////////////////////////////////////////////////////////

$username = $_SESSION[username];   //sessionค่าตัวแปรยังคงอยู่ไม่ว่าเราจะเปลี่ยนหน้าไปและเก็บค่าแบบความลับ
$password = $_SESSION[password];

$_SESSION[username] = $username;   //sessionค่าตัวแปรยังคงอยู่ไม่ว่าเราจะเปลี่ยนหน้าไปและเก็บค่าแบบความลับ
$_SESSION[password] = $password;
////////////////////////////////////////////////////////////////////////////////////////////////

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
    $get_username = $objResult[username];
    $get_password = $objResult[password];
    $get_name = $objResult[name];
}

if ($username == $get_username and $password == $get_password and $_SESSION[username] and $_SESSION[password]) {
} else {
    header('Location:../login.php');
    exit;
}
//session_write_close()

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
    <link href="../css/clean-blog.min.css" rel="stylesheet">
    <link href="../css/all.min.css" rel="stylesheet" type="text/css">
    <script src="../js/clean-blog.min.js"></script>
    <title>วิชา PHP</title>
    <link rel="icon" type="image/่jpg" href="../img/lvc.jpg">
<script language="javascript">
var limit="10:00"//ตัวแปรตั้งเวลา  นาที:วินาที
if (document.images){
var parselimit=limit.split(":")
parselimit=parselimit[0]*60+parselimit[1]*1
}
function begintimer(){
if (!document.images)
return
if (parselimit==1)
// เหตุการณ์ที่ต้องการให้เกิดขึ้น
// window.location='page.php'; ถ้าต้องการให้กระโดดไปยัง Page อื่น
frmTest.submit();
else{
parselimit-=1
curmin=Math.floor(parselimit/60)
cursec=parselimit%60
if (curmin!=0)
curtime="เวลาที่เหลือ <font color=red> "+curmin+" </font>นาที กับ <font color=red>"+cursec+" </font>วินาที "
else
if(cursec==0)
{
alert('หมดเวลาแล้วจ้า');
}
else
{
curtime="เวลาที่เหลือ <font color=red>"+cursec+" </font>วินาที "
}
document.getElementById('dplay').innerHTML = curtime;
setTimeout("begintimer()",1000)
}
}
//-->
</script>
    <?php
      $name_sql = "SELECT * FROM login where username='$username'";
      $name_query = mysql_query($name_sql) or die('Error Query ['.$strSQL.']');
      $name_result = mysql_fetch_array($name_query);
      $name = $name_result[name];
    ?>
</head>
<body onLoad="begintimer()">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="../subject_test.php">Test Online V-NET</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a>ชื่อผู้ใช้งาน :<?php echo "$name"; ?></a>
            </li>
            <li class="nav-item">
              <a href="../logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../img/test.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <img src="../img/lvc.png">
              <h2>วิทยาลัยอาชีวศึกษาลำปาง</h2>
              <span class="subheading">แผนกวิชาเทคโนโลยีสารสนเทศ</span>
              <span class="subheading">รหัสวิชา 3000-0001</span>
              <span class="subheading">วิชา PHP</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto"> 

<div class="container">
  <div class="row">
    <div class="col-md-12">
<form action="check_test.php" method="post" name="frmTest">
          <div align="center"><font color="#0000FF"><br />
          <div class="col-md-4">
  <label for="usr">รหัสนักศึกษา :</label><br>
    <input name="id_score" type="text" id="id_score" class="form" value="<?php echo $get_username; ?>"/>
    </div>
<br>   
    <div class="col-md-4">
    <label for="usr">กรุณากรอกชื่อ-สกุล :</label><br>

    <input name="name" type="text" id="name" class="form" value="<?php echo $get_name; ?>"/>
    </div>
    <br />
    <div id=dplay></div><!-- แสดงเวลา -->
    <br /></font><font color="#0000FF">จงเลือกคำตอบที่ถูกที่สุดเพียงข้อเดียว </font><br />
<?php
$sql = 'select count(*) from test'; // เปลี่ยน test
$sub = mysql_query($sql);
$c = mysql_fetch_array($sub);
$count = $c[0];
  echo "จำนวนทั้งหมด $count ข้อ";
?>
  <hr />


  <table width="75%" border="0" align="center">
  <tr class="table-warning">
      <td>
<?php
    $number = 1;
    $dbname = 'db_test_lvc';
    $tbtest = 'test';      /////////////////////////////////// เปลี่ยน test
    mysql_select_db($dbname) or die('connect fail');
    $sql = "SELECT * FROM $tbtest ORDER BY RAND( ) LIMIT 0,20";
    $counttest = "SELECT COUNT(id) FROM $tbtest";
    $result = mysql_db_query("$dbname", $sql);
    $i = 0;
    while ($r = mysql_fetch_array($result)) {
        $id = $r[id];
        $question = $r[question];
        $choice1 = $r[choice1];
        $choice2 = $r[choice2];
        $choice3 = $r[choice3];
        $choice4 = $r[choice4];

        echo "<center><b>  $number.$question</b></center><br>
        &nbsp;&nbsp;<input type='radio' name='select_$id' value='1'>
        $choice1<br>
        &nbsp;&nbsp;<input type='radio' name='select_$id' value='2'>
        $choice2<br>
        &nbsp;&nbsp;<input type='radio' name='select_$id' value='3'>
        $choice3<br>
        &nbsp;&nbsp;<input type='radio' name='select_$id' value='4'>
        $choice4<br>
        <input type='hidden' name='total_question[]' value='$id'>
        <hr> ";
        ++$number;
        ++$i;
    }
?>
        <div class="container" align="center">
          <div class="row">
            <div class="col-md-12">
      <?php
        echo "จำนวนทั้งหมด $i ข้อ";
      ?>
            </div>
          </div>
        </div>
      </td>
    </tr>
   </table>
  <p align="center">
    <input type="submit" value="ส่งข้อสอบ" class="btn"/>
    <input type="reset" value="ยกเลิก" class="btn"/>
  </p>
</form>

        </div>
    </div>
    </div>
    </div>
    </div>
      </div>
    </div>
    <a href="../subject_test.php">back</a>
</body>
</html>