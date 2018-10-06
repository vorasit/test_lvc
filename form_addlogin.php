<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>สมัครสมาชิก</title>
    <link rel="icon" type="image/่jpg" href="img/lvc.jpg">
    <script>
    function confirm(){
      alert("ขอบคุุณที่กดยืนยัน");
    }
    </script>
</head>
<body>
<div class="contener" align="center">
<img src="img/lvc.jpg" width="10%" hight="10%">
    <h2>REGISTER SYSTEM LVC </h2>
<p class="h3"> TEST ONLINE LVC V-NET</p>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
    <div class="jumbotron">
    <h4 align="center"> แบบฟอร์มสมัครสมาชิกนักศึกษา </h4>
     <form  action="add_loginstu.php" method="POST">
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
              <label class="col-md-4" style="text-align:right"> ชื่อจริงนักศึกษา :</label>
                <div class="col-md-4">
                <input type="text" id="txtname" name="txtname" class="form-control" required placeholder="name" />
                </div>
                </div>

                <div class="col-md-12">
                <p align="center">
                
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="check" value="1" onclick="confirm()">ยืนยันการสมัคร
                    </label>
               
                </p>
                </div>
                

              <div class="row">
              <div class="col-md-4"> </div>
              <div class="col-md-4">
                </div>
                <div class="col-md-4"> </div>
              &nbsp; &nbsp; &nbsp; <br /> 
              <div class="col-md-12">
              <p align="center">

              <button type="submit" class="btn btn-primary" id="btn" value="Signin" > ยืนยัน </button> 
              <button type="reset" class="btn btn-danger">ยกเลิก</button>
              </p>


              </div>
              <br>
              <?php
                if (isset($_GET['e']))
              {
              ?>
        <div class="container">
        <div class="alert alert-danger alert-dismissible fade show">
               <center>ไม่สามารถสมัครได้ กรุณากดยืนยันการสมัคร</center>
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
