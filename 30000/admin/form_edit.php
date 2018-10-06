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
		
	}else{
    header("Location:../../login.php");
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
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

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

    <title>ฟอร์มแก้ไขข้อมูล</title>
    <link rel="icon" type="image/่jpg" href="../../img/lvc.jpg">
</head>
<body>

<div class="container">

<form action="save_edit.php?id_edit=<?php echo $_GET["id_dis"];?>" method="post">

<?php

$strSQL = "SELECT * FROM test WHERE id = '".$_GET["id_dis"]."' ";   //เปลียน test
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$objResult = mysql_fetch_array($objQuery);

if(!$objResult)
{
echo "กรุณากลับสู่ระบบอีกครั้ง";
}
else
{

}
?>


<table class="table table-striped">
      <tr>
        <td colspan="2"><div align="center"><strong><font size="5">แก้ไขข้อมูล</font></strong></div></td>
        </tr>

      <tr>
        <td ><div align="center"><label for="textfield">ข้อที่</label>
          <strong><?php echo $objResult["id"];?></strong><input type="hidden" name="txtid" id="txtid" value="<?php echo $objResult["id"];?>" >
        </div></td>
      </tr>

      <tr>
        <td ><div align="center"><label for="textfield">คำถาม</label>
          <strong>:</strong><input type="text" name="txtquest" id="txtquest" value="<?php echo $objResult["question"];?>"/>
        </div></td>
      </tr>

      <tr>
        <td ><div align="center"><label for="textfield">1</label>
          <strong>:</strong><input type="text" name="txtch1" id="txtch1" value="<?php echo $objResult["choice1"];?>"/>
        </div></td>
      </tr>

      <tr>
        <td ><div align="center"><label for="textfield">2</label>
          <strong>:</strong><input type="text" name="txtch2" id="txtch2" value="<?php echo $objResult["choice2"];?>" />
        </div></td>
      </tr>

      <tr>
        <td ><div align="center"><label for="textfield">3</label>
          <strong>:</strong><input type="text" name="txtch3" id="txtch3" value="<?php echo $objResult["choice3"];?>"/>
        </div></td>
      </tr>

      <tr>
        <td ><div align="center"><label for="textfield">4</label>
          <strong>:</strong><input type="text" name="txtch4" id="txtch4" value="<?php echo $objResult["choice4"];?>"/>
        </div></td>
      </tr>

      <tr>
        <td ><div align="center"><label for="textfield">คำตอบ</label>
          <strong>:</strong><input type="text" name="txtanswer" id="txtanswer" value="<?php echo $objResult["answer"];?>"onKeyUp="IsNumeric1(this.value,this)"/>
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