<?php
include_once("head.php"); 
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin login</title>
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


<section class="parent">
  <div class="child">
    
    <?php 

      
        if(isset($_POST['username']) && isset($_POST['password']))
          {
            $option = $_POST['option'];
            if($option == "General Admin")
            {
            $query = "SELECT * FROM general_admin WHERE Email = :username AND Password = :password";
            }
            elseif($option == "Society Admin")
            {
            $query = "SELECT * FROM society_admins WHERE username = :username AND password = :password";
            }
             elseif($option == "Student Admin")
            {
            $query = "SELECT * FROM student_admin WHERE username = :username AND Password = :password";
            }
            else
            {
            $query = "SELECT * FROM teacher WHERE Email = :username AND Password = :password";

            }
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password=md5($password);
            $stmt = $sdb->prepare($query);
           $stmt->execute(array(':username' => $username, ':password' => $password));
           $row = $stmt->fetch(PDO::FETCH_ASSOC);
              
            if($row['id']>0)
              {
                func::createRecord($sdb,$username,$row['id']);
                if($option=="Student Admin")
                {
                  header("location:experience_form.php");
                }//echo func:: createString(32);
                elseif($option=="General Admin")
              {
                header("location:addarticle.php");
              } 
               elseif($option=="Teacher Admin")
                {
                  header("location:notice_form.php");
                }
                elseif($option=="Society Admin")
                {
                  $_SESSION["society"]=$row['society'];
                  header("location:societyadmin/Dashboard.php");
                }
               
              }
              else
              {               
              ?>
              <script type="text/javascript">alert(" Invalid email id or password!")</script>
              <?php          
              unset($_POST['username']);
              unset($_POST['password']);
            }
            
          } 
            ?>  
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

        <div class="col-md-6 col-md-offset-3" style="margin-top: 80px">
          <h4 style="border-bottom: 1px solid #c5c5c5;">
            <i class="glyphicon glyphicon-user text-primary">
            </i>
            Admin Access
          </h4>
          <div style="padding: 20px;" id="form-olvidado">
            <form action="student_admin.php" accept-charset="UTF-8" role="form" id="login-form" method="post" >
              <fieldset>
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user text-primary"></span>
                  </span>
                  <select class="form-control" name="option">
                    <option>Teacher Admin</option>
                    <option>Society Admin</option>
                    <option>General Admin</option>
                    <option>Student Admin</option>

                  </select>
                </div>
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user text-primary"></span>
                  </span>
                  <input class="form-control" placeholder="Roll No/E-mail" name="username" required="" autofocus="">
                </div>
                <div class="form-group input-group">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-lock text-primary">
                    </i>
                  </span>
                  <input class="form-control" placeholder="Password" name="password" type="password" value="" required="">
                </div>
                <?php
                if(func::checklogin($sdb))//check login state)
    {
      $logout="Already logged in";
          // echo "<script type='text/javascript'> alert('$logout');</script>"; 
        echo $logout;?>
        <div class="form-group">
                  <a href="admin_logout.php">
                    Logout
                  </a>
           <?php
        } 
        else
  {    ?>
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary btn-block">
                    Access
                  </button>
         <?php   }  ?>
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
    
  </div>
</section>
</body>
</html>
<?php
  include 'footer.php';
  ?>
  