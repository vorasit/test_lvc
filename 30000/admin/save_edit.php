<?php

include '../../connectmysql.php';
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
     //echo "<br>";

   

  //echo "test = ".$objResult[username];
//exit;

      $get_username=$objResult[username];     // แทนค่าใส่ลงไปในตัวแปร $get_username
	  $get_password=$objResult[password];


}

if($username==$get_username and $password==$get_password and $_SESSION[username] and $_SESSION[password])
	{
        
		
		$id =$_POST['txtid'];
		$quest=$_POST['txtquest'];
		$ch1=$_POST['txtch1'];
        $ch2=$_POST['txtch2'] ;
        $ch3=$_POST['txtch3'];
        $ch4=$_POST['txtch4'];
        $ans=$_POST['txtanswer'];
        $id_edit=$_POST['id_edit'];

		$strSQL = "UPDATE test SET question='$quest' ,choice1='$ch1',choice2='$ch2',choice3='$ch3',choice4='$ch4',answer='$ans'
        WHERE id = '$id_edit' ";    //เปลี่ยน test
		
		$objQuery = mysql_query($strSQL)or die(mysql_error());
		
			if($objQuery)
			{
			?>
				<script>
				alert ("แก้ไขข้อมูลเสร็จสิ้น");
				window.location.assign("test_update.php");
				</script>
			
			
			<?
			}
			else
			{
			echo "Error Save [".$strSQL."].กรุณากลับสู่ระบบอีกครั้ง";
			}
		
	}else{
    header("Location:../../login.php");
    exit;
	}
session_write_close()



?>
