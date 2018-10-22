<?

include '../connectmysql.php';
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
    header("Location:../login.php");
    exit;
	}
session_write_close()
?>

<?
include '../connectmysql.php';
	
	// $hostname="localhost";
	// $user="root";
	// $password="12345678";
	$dbname="db_test_lvc";
	$tbscore="score";//ตารางเก็บคะแนน    ////////// score
	$tbtest="test";//ตารางโจทย์          ///////////// test

	mysql_select_db($dbname) or die ("connect db fail");

	$correct=0;
	$total=count($_REQUEST["total_question"]);
	$sql="select id,answer from $tbtest order by id";    
	$result=mysql_db_query("$dbname",$sql);
	while($r=mysql_fetch_array($result))
		{
			$id=$r[id];
			$answer=$r[answer];
	
		if(in_array($id,$_REQUEST["total_question"]))
					{
			$select="select_".$id;
					if($_REQUEST[$select]==$answer)
							{
						$correct++;
							}
						
					}
		}
		$name=$_REQUEST["name"];
		$id_user = $_POST[id_score];
		$id=$_REQUEST["get_username"];
		$sql2 = "insert into $tbscore (id_score,name,correct) values ('$id_user','$name','$correct')"; 
		$dbquery= mysql_db_query($dbname,$sql2);
	if (!$dbquery)
		{
			echo ("ERROR SQL").mysql_error();
			exit();
		}
		else
		{
			
		header("location:score_test.php");
		}
		
	?>

		
	
	
