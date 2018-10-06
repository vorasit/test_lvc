<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>เข้าสู่ระบบ</title>
    <link rel="icon" type="image/่jpg" href="img/lvc.jpg">
</head>
<body>
<div class="contener" align="center">
<img src="img/lvc.jpg" width="10%" hight="10%">
    <h2>LOGIN SYSTEM LVC </h2>
<p class="h3">TEST ONLINE LVC V-NET</p>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
    <div class="jumbotron">
    <h4 align="center"> กรุณาเข้าสู่ระบบ </h4>
     <form  action="check_login.php" method="POST">
              <div class="row">
              <label class="col-md-4" style="text-align:right"> Username :</label>
                <div class="col-md-4">
                <input type="text" id="txtusername" name="txtusername" class="form-control" required placeholder="Username" />
                </div>
                </div>
 
 
              <div class="row">
              <br>
              <label class="col-md-4" style="text-align:right"> Password :</label>
                <div class="col-md-4">
                     <input type="password" id="txtpassword" name="txtpassword" class="form-control" required placeholder="Password" />
            </div>
              </div>
 
 
 
              <div class="row">
              <div class="col-md-4"> </div>
              <div class="col-md-4">
        
 
                </div>
                <div class="col-md-4"> </div>
              &nbsp; &nbsp; &nbsp; <br /> 
              <div class="col-md-12">
              <p align="center">

              <button type="submit" class="btn btn-primary" id="btn" value="Signin"> เข้าสู่ระบบ </button> 
              <button type="reset" class="btn btn-danger">ยกเลิก</button>
              </p>

              
              <p align="center">
              <a href="form_addlogin.php">สมัครเพื่อเข้าใช้งาน</a>
              </p>
              


              </div>
              <br>
              <?php
                if (isset($_GET['e']))
              {
              ?>
        <div class="container">
        <div class="alert alert-danger alert-dismissible fade show">
               <center>ไม่สามารถเข้าสู่ระบบได้</center>
        </div>
        </div>
        <?php
          }
          ?>
            </form>
            </div>
      </div>
    </div>
  </div>

</body>
</html>
