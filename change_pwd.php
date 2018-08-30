<?php
session_start();
include 'Include/dbconnect.php';
//$email = $_SESSION['email'];
  //Modify password
if (isset($_POST['submit'])) {

    $email=mysqli_real_escape_string($con_ser,$_POST['email']);
    $old_password=mysqli_real_escape_string($con_ser,$_POST['old_password']);
    $old_hash=md5($old_password);
    $new_password=mysqli_real_escape_string($con_ser,$_POST['new_password']);
    $new_hash=md5($new_password);

    $pwd = ("SELECT password FROM teacher WHERE Email='$email'");
    $resu = mysqli_query($con_ser, $pwd) or die("Invalid Credential!");
    $row=mysqli_fetch_assoc($resu);
    $oldpwddb = $row['password'];
//echo $oldpwddb;
    if($old_hash == $oldpwddb)
    {
      $update_pwd = "UPDATE teacher SET Password='$new_hash' where Email='$email'";
      mysqli_query($con_ser, $update_pwd);
      session_destroy();
      //die("Password changed successfully! <a href='teacher_login.php'>Return</a> to the login page");
       $msg = "Password changed successfully!";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        //header('location:teacher_login.php');
        echo "<script> window.location.assign('student_admin.php'); </script>";

    }

    else
    {               

     $msg = "Old password doesn't match...";
     echo "<script type='text/javascript'>alert('$msg');</script>";

          // header("location: notice_board.php");

   
 

}
}
?>

<!DOCTYPE>
<html>
<head>

  <title>Reset Password</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/dashboard.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  

  <style>
  body{
    background-color: #ffffff;
  }
  .navbar-brand{
    font-size: 1.5em;
    color: blue;
  }

  .bg-light-gray {
    background-color: #f7f7f7;
  }
  .h1 {
    text-shadow:5px 5px 10px white;
  }
  .footer-social { float: center; margin-top:5px;}
  .footer-social li {  display: inline;float:center;}
  .footer-social span {margin-left: 2 40px; }
  .read-more-state {
    display: none;
  }
  ul.nav li.dropdown:hover > ul.dropdown-menu{
    display: block;
    visibility:visible;  
  }

  .dropdown-submenu {
    position: relative;
  }

  .dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
  }
</style>
</head>
<body>
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
      <div class="navbar-header">

        <a href="home_thapar_university.php" class="navbar-brand">KNOCKCAMP</a></div>
        <div class="collapse navbar-collapse" id="collapse">
        </div> 
      </div>
    </nav>
    <div class="container">
      <div class="row">

        <div class="col-md-6 col-md-offset-3">
          <h4 style="border-bottom: 1px solid #c5c5c5;">
            <i class="glyphicon glyphicon-user text-primary">
            </i>
            Reset password
          </h4>
          <div style="padding: 20px;" id="form-olvidado">
            <form action ="change_pwd.php" accept-charset="UTF-8" role="form" method="post">
              <fieldset>
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-envelope text-primary"></span>
                  </span>
                  <input class="form-control" placeholder="Email" name="email" type="email" required="" autofocus="">
                </div>
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-lock text-primary"></span>
                  </span>
                  <input class="form-control" placeholder="Old Password" name="old_password" type="password" value="" required="">
                </div>
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-lock text-primary">
                    </i>
                  </span>
                  <input class="form-control" placeholder="New Password" name="new_password" id="new_password" type="password" value="" required="">
                </div>
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-lock text-primary">
                    </i>
                  </span>
                  <input class="form-control" placeholder="Confirm New Password" name="confirm_new_password" id="confirm_new_password" type="password" value="" required="">
                </div>
                <script type="text/javascript">
                  var password = document.getElementById("new_password")
                  , confirm_password = document.getElementById("confirm_new_password");

                  function validatePassword(){
                    if(password.value != confirm_password.value) {
                      confirm_new_password.setCustomValidity("Passwords Don't Match");
                    } else {
                      confirm_new_password.setCustomValidity('');
                    }
                  }
                  new_password.onchange = validatePassword;
                  confirm_new_password.onkeyup = validatePassword;

                </script>
                <div class="form-group">
                  <button  type="submit" name="submit" class="btn btn-primary btn-block">
                    Submit
                  </button>
                </div>
                <p class="help-block">
                    <a class="pull-right text-muted" href="student_admin.php" id="olvidado"><small>Login?</small></a>
                  </p>
              </fieldset>
            </form>
          </div>

        </div>
      </div>
    </div>


  </body>

  </html>
  <?php
  include 'footer.php';
  ?>

  
