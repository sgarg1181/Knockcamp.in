<?php
//session_start();
include 'Include/dbconnect.php';


if(isset($_POST['submit']))
{
  $email = mysqli_real_escape_string($con_ser, $_POST['email']);


  $check = "SELECT * FROM teacher WHERE Email = '$email'";
  $res = mysqli_query($con_ser, $check);
  $count = mysqli_num_rows($res);
  if($count != 0){
    //echo "Send email to user with password";
    $str = "0123456789asdfghjklpoiumnbv";
    $str = str_shuffle($str);
    $str = substr($str, 0, 8);
    $url = "http://localhost/knockcamp/reset_password.php?token=$str&email=$email";

    //$email_pwd = $new_pwd;
    //$db_pwd = md5($str);
 

    //phpmail
    $subject = "Reset Password";
    $message = "To resrt your password, please visit this link: $url";
    $from = "From: kundankumarnigam97@gmail.com";

    mail($email, $subject, $message, $from);
    $msg = "Your new password has been email to you!";
    echo "<script type='text/javascript'>alert('$msg');</script>";

    //$query = "UPDATE teacherlogin SET password = '$db_pwd' WHERE email = '$email'";
    //$query_run = mysqli_query($con_ser, $query);

  }
  else
  {
    $msg1 = "Email does not exist!";
    echo "<script type='text/javascript'>alert('$msg1');</script>";

  }
}
?>

<!DOCTYPE>
<html>
<head>

  <title>Forget Password</title>
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
            Forget password
          </h4>
          <div style="padding: 20px;" id="form-olvidado">
            <form action ="forget_pwd.php" accept-charset="UTF-8" role="form" method="post">
              <fieldset>
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-envelope text-primary"></span>
                  </span>
                  <input class="form-control" placeholder="Email" name="email" type="email" required="" autofocus="">
                </div>            
                <div class="form-group">
                  <button  type="submit" name="submit" class="btn btn-primary btn-block">
                    Submit
                  </button>
                  <p class="help-block">
                    <a class="pull-right text-muted" href="student_admin.php" id="olvidado"><small>Login?</small></a>
                  </p>

                </div>
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

  
