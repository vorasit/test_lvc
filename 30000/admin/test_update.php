<?php

include '../../connectmysql.php';
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
    header('Location:../../login.php');
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
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <script language="JavaScript">
        function chkdel(){if(confirm('  กรุณายืนยันการลบอีกครั้ง !!!  ')){
                    return true;
                }else{
                    return false;
                    }
        }
    </script>


    <script language="javascript">
function IsNumeric1(sText,obj)
{
	 if (sText.length > 2){
	  
	  alert("กรุณากรอกตัวเลขได้ไม่เกิน 2 หลักเท่านั้น");
  } 

  if (sText.length == 1){
    if(sText < "1" ){
	  
	  alert("กรุณาอย่าใส่ตัวเลข 0 นำหน้า ");
    } 
  }
    var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
        if(IsNumber==false){
            alert("กรุณาใส่ตัวเลข");
            obj.value=sText.substr(0,sText.length-1);
        }
   }
</script>

<title>แก้ไขแบบทดสอบ</title>
<link rel="icon" type="image/่jpg" href="../../img/lvc.jpg">
    <?php
      $name_sql = "SELECT * FROM login where username='$username'";
      $name_query = mysql_query($name_sql) or die('Error Query ['.$strSQL.']');
      $name_result = mysql_fetch_array($name_query);
      $name = $name_result[name];
    ?>
</head>
<body>
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-header">

            <a class="navbar-brand" href="admin_page.php">Test Online V-NET</a>
</div>
            <ul class="nav navbar-nav">
                <li class="active">
                  <a href="../../subject_test.php" >Home ทดสอบการใช้งาน</a>
                </li>
                <li>
                  <a>ชื่อผู้ใช้งาน :<?php echo "$name"; ?></a>
                </li>
                <li>
                  <a href="logout.php">Logout</a>
                </li>
              </ul>
</div>
</nav>

    <div class="container">
  <h2>แก้ไขแบบทดสอบ วิชา php</h2>
  <p>แบบทดสอบออนไลน์ TEST LVC ONLINE</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ข้อที่่</th>
        <th>โจทย์</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>คำตอบ</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $objDB = mysql_select_db('db_test_lvc');
    $strSQL = 'SELECT * FROM test ORDER BY id ASC';  //เปลี่ยน test
    $objQuery = mysql_query($strSQL) or die('Error Query ['.$strSQL.']');
         $i = 1;
            while ($objResult = mysql_fetch_array($objQuery)) {
                ?>
      <tr>
        <td><?php echo $objResult['id']; ?></td>
        <td><?php echo $objResult['question']; ?></td>
        <td><?php echo $objResult['choice1']; ?></td>
        <td><?php echo $objResult['choice2']; ?></td>
        <td><?php echo $objResult['choice3']; ?></td>
        <td><?php echo $objResult['choice4']; ?></td>
        <td><?php echo $objResult['answer']; ?></td>
        <td><a href="form_edit.php?id_dis=<?php echo $objResult['id']; ?>"target="_self"><font size="5">แก้ไข</font></td>    
        <td><a href="delete.php?id_dis=<?php echo $objResult['id']; ?>"class="style2" OnClick="return chkdel();"><font size="5">ลบ</font></a></td>
      </tr>
      <?php
            }
        ?>
    </tbody>
  </table>
  <strong>จำนวนทั้งหมด
        <?php $sql = mysql_query('SELECT COUNT(*) FROM test');   //test
    $res = mysql_fetch_array($sql);
    $records = $res[0];
 echo $records.'ข้อ';?>
      </strong>

<form id="form_insert" name="form_insert" method="post" action="save_insert.php">
      <table class="table table-striped">
      <tr>
        <td colspan="2"><div align="center"><strong><font size="5">เพิ่มข้อมูล</font></strong></div></td>
        </tr>

      <tr>
        <td ><div align="center"><label for="textfield">ข้อที่</label>
          <strong>:</strong><input type="text" name="txtid" id="txtid"  onKeyUp="IsNumeric1(this.value,this)"/>
        </div></td>
      </tr>

      <tr>
        <td ><div align="center"><label for="textfield">คำถาม</label>
          <strong>:</strong><input type="text" name="txtquest" id="txtquest" />
        </div></td>
      </tr>

      <tr>
        <td ><div align="center"><label for="textfield">1</label>
          <strong>:</strong><input type="text" name="txtch1" id="txtch1" />
        </div></td>
      </tr>

      <tr>
        <td ><div align="center"><label for="textfield">2</label>
          <strong>:</strong><input type="text" name="txtch2" id="txtch2" />
        </div></td>
      </tr>

      <tr>
        <td ><div align="center"><label for="textfield">3</label>
          <strong>:</strong><input type="text" name="txtch3" id="txtch3" />
        </div></td>
      </tr>

      <tr>
        <td ><div align="center"><label for="textfield">4</label>
          <strong>:</strong><input type="text" name="txtch4" id="txtch4" />
        </div></td>
      </tr>
      <tr>
        <td ><div align="center"><label for="textfield">คำตอบ</label>
          <strong>:</strong><input type="text" name="txtanswer" id="txtanswer" onKeyUp="IsNumeric1(this.value,this)"/>
        </td>
      </tr>
    </table>
    <p align="center">
    <button type="submit" class="btn btn-primary" id="btn" value="insert"> เพิ่มข้อมูล </button> 
    <button type="reset" class="btn btn-danger">ยกเลิก</button>
    </p>
    </form>
</div>
</body>
</html>
