<?php  
include('Include/functions.php');
?>
<?php
if(isset($_POST["submit"]))
{global $connection;
    $title=mysqli_real_escape_string($connection,$_POST['Title']);
   $image=$_FILES['Image']['name'];
 if(!is_dir("Carousal"))
 {
   mkdir("Carousal");   
 }
 $Target="Carousal/".basename($_FILES["Image"]["name"]);
 

 if((strlen($title)<2))
    {
        $_SESSION["ErrorMessage"]="Too Short Title";
    }
    else{
        $sql="Insert into carousalimage(title,image)
                values('$title','$image')";
        $execute=mysqli_query($connection,$sql);
                 move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
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
    
    <title>Carousal Images</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
    <style>
        <?php include("css/dashboard.php") ?>
    </style>
    </head>
<body>          
<?php 
include_once("loginmand.php");
 ?>         
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 ">
            <br><br>
            <h2 style="color:white;">Admin Panel</h2>
            <ul id="Side_Menu" class="nav nav-pills nav-stacked">
                <li ><a href="addarticle.php"><span class="glyphicon glyphicon-list-alt"></span>Add Article</a></li>
                <li class="active" ><a href="homecarousal.php"><span class="glyphicon glyphicon-user"></span>Carousal Images</a></li>
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
        <h1>Image to Display</h1>
            <form action="homecarousal.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                <label for="title">Title: *Minimun Length:2 char </label>
                <input class="form-control" type="text" name="Title" id="title" placeholder="Title">
                </div>
            <div class="form-group">
                <label for="selectimage">Select Image: </label>
                <input type="file" class="form-control" name="Image" id="selectimage" >
                </div>
                    <br>
                    <button name="submit" class="btn btn-primary btn-block" >Image for Carousal</button>
                    <br>
                </fieldset>
                
                </form>
            
            </div>
        </div>
        </div>
   
    </body>
    
</html>
