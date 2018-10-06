<?php
include 'connectmysql.php';
session_start();

$username =$_POST['txtusername'];
$password =$_POST['txtpassword'];

$_SESSION[username]=$username;
$_SESSION[password]=$password;

$objDB = mysql_select_db("db_test_lvc");
$strSQL = "SELECT * FROM login where username='$username' and password= '$password'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery))
{
  //   echo "<br>";

   

//     echo "test = ".$objResult[username];


      $get_username=$objResult[username];
	  $get_password=$objResult[password];
	  $get_name=$objResult[name];
		$status=$objResult["status"];

///exit;
}

?>

<?

if($username==$get_username and $password==$get_password and $_SESSION[username] and $_SESSION[password])
{
		if($status == "admin"){
			header("location:admin_page.php");
			
		}
		else
		{
			header("location:subject_test.php");
		}
}else{
   ?>
	<script>
		//alert ("username or password invaled");
		window.location.assign("login.php?e=error")
	</script>
<?
}

// ///////////////////////////////////////
session_write_close()
?>
