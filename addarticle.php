<?php  
include('Include/functions.php');
?>
<?php
if(isset($_POST["submit"]))
{global $connection;
    $title=mysqli_real_escape_string($connection,$_POST['Title']);
 $article=mysqli_real_escape_string($connection,$_POST['Article']);
     date_default_timezone_set("Asia/Kolkata");
$currenttime=time();
$datetime=strftime("%H:%M:%S %d-%m-%Y ",$currenttime);
$author=mysqli_real_escape_string($connection,$_POST['Author']);
   if((strlen($title)<2))
    {
        $_SESSION["ErrorMessage"]="Too Short Title";
    }
 elseif((strlen($article)<20))
    {
        $_SESSION["ErrorMessage"]="Too Short Description";
    }
    else{
        $sql="Insert into articles(title,datetime,article,author)
                values('$title','$datetime','$article','$author')";
        $execute=mysqli_query($connection,$sql);
        if(!$execute)
        {
            $_SESSION["ErrorMessage"]="Failed";
        }
        else{
            $_SESSION["SuccessMessage"]="Successfull";    
        }        
    }
}
?>

<html>
<head>
    
    <title>Add Article</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
    <style>
        <?php include("css/dashboard.php") ?>
    </style>
    </head>
<body > 
<?php 
include_once("loginmand.php");
 ?>         
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 ">
            <br><br>
            <h2 style="color:white;">Admin Panel</h2>
            <ul id="Side_Menu" class="nav nav-pills nav-stacked">
                <li class="active" ><a href="addarticle.php"><span class="glyphicon glyphicon-list-alt"></span>Add Article</a></li>
                <li ><a href="homecarousal.php"><span class="glyphicon glyphicon-user"></span>Carousal Images</a></li>
                <li ><a href="Sregister.php"><span class="glyphicon glyphicon-log-out"></span>Society registeration </a></li>
            <li><a href="Tregister.php"><span class="glyphicon glyphicon-log-out"></span>Teacher registeration</a></li>
              <li  ><a href="Gregister.php"><span class="glyphicon glyphicon-log-out"></span>General registeration</a></li>
                <li><a href="admin_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>

        </div>
        <div class="row" style="height:30px;"></div>
        <div class="col-sm-10">
            <div><?php echo message();
                    echo successmessage();?></div>
        <h1>Add Article</h1>
            <form action="addarticle.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                <label for="title">Title: *Minimun Length:2 char </label>
                <input class="form-control" type="text" name="Title" id="title" placeholder="Title">
                </div>

                    <div class="form-group">
                <label for="datetime">Author: </label>
                <input class="form-control" type="text" name="Author" id="datetime" placeholder="Name of Author">
                </div>
                    <div class="form-group">
                <label for="postarea">Article: <p style="align:right;">*Minimun Length: 30 char</p> </label>
                <textarea class="form-control"  name="Article" id="postarea" placeholder="Article"></textarea>
                </div>
                    <br>
                    <button name="submit" class="btn btn-primary btn-block" >Submit Article</button>
                    <br>
                </fieldset>
                
                </form>
            
            </div>
        </div>
        </div>


    </body>
    
</html>
