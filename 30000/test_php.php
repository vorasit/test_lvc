<?php

include '../connectmysql.php';
session_start();    //เปิดใช้งานsession

/////////////////////////////////////////////////////////////////////////


$username=$_SESSION[username];   //sessionค่าตัวแปรยังคงอยู่ไม่ว่าเราจะเปลี่ยนหน้าไปและเก็บค่าแบบความลับ
$password=$_SESSION[password];

$_SESSION[username]=$username;   //sessionค่าตัวแปรยังคงอยู่ไม่ว่าเราจะเปลี่ยนหน้าไปและเก็บค่าแบบความลับ
$_SESSION[password]=$password;
////////////////////////////////////////////////////////////////////////////////////////////////

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

    $get_username=$objResult[username];  
	  $get_password=$objResult[password];
    $get_name=$objResult[name];

}

if($username==$get_username and $password==$get_password and $_SESSION[username] and $_SESSION[password])
	{
		
	}else{
    header("Location:../login.php");
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
</head>
<body onLoad="begintimer()">


<div class="jumbotron text-center">
                <h1>วิทยาลัยอาชีวศึกษาลำปาง</h1>
                <h2>แผนกวิชาเทคโนโลยีสารสนเทศ</h2>
                <h3>รหัสวิชา 3000-000-1</h3>
                <h3>วิชา PHP</h3>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-12">
<form action="check_test.php" method="post" name="frmTest">
          <div align="center"><font color="#0000FF"><br />
          <div class="col-md-4">
  <label for="usr">รหัสนักศึกษา :</label>
    <input name="id_score" type="text" id="id_score" class="form" value="<? echo $get_username ; ?>"/>
    </div>

    <div class="col-md-4">
    <label for="usr">กรุณากรอกชื่อ-สกุล :</label>

    <input name="name" type="text" id="name" class="form" value="<? echo $get_name ; ?>"/>
    </div>
    <br />
    <div id=dplay></div><!-- แสดงเวลา -->
    <br /></font><font color="#0000FF">จงเลือกคำตอบที่ถูกที่สุดเพียงข้อเดียว </font><br />
<?
$sql = "select count(*) from test";// เปลี่ยน test
$sub = mysql_query($sql);
$c = mysql_fetch_array($sub);
$count = $c[0];
  echo "จำนวนทั้งหมด $count ข้อ";
?>
  <hr />


  <table width="75%" border="0" align="center">
  <tr class="table-warning">
      <td>
        <?
$number=1;

$dbname="db_test_lvc";
$tbtest="test";      /////////////////////////////////// เปลี่ยน test

mysql_select_db($dbname) or die ("connect fail");

$sql="SELECT * FROM $tbtest ORDER BY RAND( ) LIMIT 0,20";
$counttest="SELECT COUNT(id) FROM $tbtest";
$result= mysql_db_query("$dbname",$sql);
$i=0;
while($r=mysql_fetch_array($result))
	{
	$id=$r[id];
	$question=$r[question];
	$choice1=$r[choice1];
	$choice2=$r[choice2];
	$choice3=$r[choice3];
	$choice4=$r[choice4];
	
	echo "<b>  $number.$question</b><br>
		<input type='radio' name='select_$id' value='1'>
		$choice1<br>
		<input type='radio' name='select_$id' value='2'>
		$choice2<br>
		<input type='radio' name='select_$id' value='3'>
		$choice3<br>
		<input type='radio' name='select_$id' value='4'>
		$choice4<br>
		<input type='hidden' name='total_question[]' value='$id'>
		<hr> ";
    $number++;
    $i++;
	}
?>
  <div class="container" align="center">
    <div class="row">
      <div class="col-md-12">
<?
  echo "จำนวนทั้งหมด $i ข้อ";
?>
      </div>
    </div>
  </div>
      </td>
    </tr>
  </table>

  <p>&nbsp;</p>
  <p align="center">
    <input type="submit" value="ส่งข้อสอบ" class="btn"/>
    <input type="reset" value="ยกเลิก" class="btn"/>
  </p>
</form>

        </div>
    </div>
    </div>
    </div>
    <a href="../subject_test.php">back</a>
</body>
</html>