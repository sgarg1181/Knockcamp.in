<?php
  include 'dbconnect.php';
  session_start();
  //login
if (isset($_POST['submit'])) {


    $login_email=mysqli_real_escape_string($con_ser,$_POST['login_email']);
    $login_password=mysqli_real_escape_string($con_ser,$_POST['login_password']);
    $admin =mysqli_real_escape_string($con_ser,$_POST['admin']);
    $pass_hash=md5($login_password);
    if(!empty($login_email) && !empty($login_password) && !empty($admin))
    {

      //teacher admin
      if($admin == 'Teacher Admin')
     {
      $login_query = "SELECT * FROM teacher WHERE Email='$login_email' AND Password='$pass_hash'";
      if($query1_run=mysqli_query($con_ser,$login_query))
      {
        $query_num_rows=mysqli_num_rows($query1_run);
        if($query_num_rows==0)
        {
          $msg= " Invalid email id or password!";
            echo "<script type='text/javascript'>alert('$msg');</script>";

        }
        else
        {               
          while($row=mysqli_fetch_assoc($query1_run))
          {
           $user_id=$row['id'];
           $_SESSION['user_id']=$user_id;
           // die("Password changed successfully! <a href='notice_board.php'>Return</a> to the login page");
           header("location: notice_form.php");
          //echo "<script> window.location.assign('notice_board.php'); </script>";

         }

       }
     }
   }


//society admin
if($admin == 'Society Admin')
     {
      echo $login_query = "SELECT * FROM society_admins WHERE username='$login_email' AND password='$pass_hash'";
      if($query1_run=mysqli_query($con_ser,$login_query))
      {
        $query_num_rows=mysqli_num_rows($query1_run);
        if($query_num_rows==0)
        {
          $msg= " Invalid email id or password!";
            echo "<script type='text/javascript'>alert('$msg');</script>";

        }
        else
        {               
          while($row=mysqli_fetch_assoc($query1_run))
          {
           $user_id=$row['id'];

           $_SESSION['user_id']=$user_id;
           $_SESSION['society'] = $row['society'];
           // die("Password changed successfully! <a href='notice_board.php'>Return</a> to the login page");
           header("location: societyadmin/Dashboard.php");
          //echo "<script> window.location.assign('notice_board.php'); </script>";

         }

       }
     }
   }
//general admin

   if($admin == 'General Admin')
     {
      $login_query = "SELECT * FROM general_admin WHERE Email='$login_email' AND Password='$pass_hash'";
      if($query1_run=mysqli_query($con_ser,$login_query))
      {
        $query_num_rows=mysqli_num_rows($query1_run);
        if($query_num_rows==0)
        {
          $msg= " Invalid email id or password!";
            echo "<script type='text/javascript'>alert('$msg');</script>";

        }
        else
        {               
          while($row=mysqli_fetch_assoc($query1_run))
          {
           $user_id=$row['id'];
           $_SESSION['user_id']=$user_id;
           // die("Password changed successfully! <a href='notice_board.php'>Return</a> to the login page");
           header("location: addarticle.php");
          //echo "<script> window.location.assign('notice_board.php'); </script>";

         }

       }
     }
   }


 }
 }
  ?>
<!DOCTYPE>
<html>
<head>

  <title>Admin Login</title>
  <link rel="stylesheet" href="shubham/css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="shubham/css/dashboard.css">
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

        <a href="http://www.knockcamp.in/" class="navbar-brand">knockcamp.in</a></div>
        <div class="collapse navbar-collapse" id="collapse">
        </div> 
      </div>
    </nav>
    <div class="container">
      <div class="row">

        <div class="col-md-6 col-md-offset-3" style="margin-top: 80px">
          <h4 style="border-bottom: 1px solid #c5c5c5;">
            <i class="glyphicon glyphicon-user text-primary">
            </i>
            Admin Access
          </h4>
          <div style="padding: 20px;" id="form-olvidado">
            <form action="admin_login.php" accept-charset="UTF-8" role="form" id="login-form" method="post" >
              <fieldset>
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user text-primary"></span>
                  </span>
                  
                  <select class="form-control" name="admin" style="display: block;">
                    <option>Society Admin</option>
                    <option>Teacher Admin</option>
                    <option>General Admin</option>
                  </select>
                </div>
      
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-envelope text-primary"></span>
                  </span>
                  <input class="form-control" placeholder="Email" name="login_email" type="email" required="" autofocus="">
                </div>
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-lock text-primary">
                    </i>
                  </span>
                  <input class="form-control" placeholder="Password" name="login_password" type="password" value="" required="">
                </div>
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary btn-block">
                    Access
                  </button>
                  <p class="help-block">
                    <a class="pull-right text-muted" href="change_pwd.php" id="olvidado"><small>Reset password?</small></a>
                  </p>
                  <p class="help-block">
                    <a class="pull-left text-muted" href="forget_pwd.php" id="olvidado"><small>Forget password?</small></a>
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
  

