<?php  
include('Include/functions.php');
Confirm_Login();
?>
<?php
if(isset($_POST["submit"]))
    
{global $connection;
    $title=mysqli_real_escape_string($connection,$_POST['Title']);
    $Venue=mysqli_real_escape_string($connection,$_POST['Venue']);
    $Datetime=mysqli_real_escape_string($connection,$_POST['Datetime']);
 $Description=mysqli_real_escape_string($connection,$_POST['Description']);
 $image=$_FILES['Image']['name'];
 $Society=$_SESSION['society'];
 if(!is_dir("Society/$Society"))
 {
   mkdir("Society/$Society");   
 }
 $Target="Society/$Society/".basename($_FILES["Image"]["name"]);
   if((strlen($title)<2))
    {
        $_SESSION["ErrorMessage"]="Too Short Title";
    }
 elseif((strlen($Description)<20))
    {
        $_SESSION["ErrorMessage"]="Too Short Description";
    }
    else{
        $sql="Insert into events(title,image,datetime,description,venue,society)
                values('$title','$image','$Datetime','$Description','$Venue','$Society')";
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
    
    <title>Add new Event</title>
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
  $X=$_SESSION["society"];  ?>
            
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 ">
            <br><br>
            <h2 style="color:white;">Admin Panel</h2>
            <ul id="Side_Menu" class="nav nav-pills nav-stacked">
                <li ><a href="Dashboard.php"><span class="glyphicon glyphicon-th"></span> Dashboard</a></li>
                <li class="active"><a href="Addevents.php"><span class="glyphicon glyphicon-list-alt"></span> Add new Event</a></li>
                <li><a href="managemembers.php"><span class="glyphicon glyphicon-user"></span> Manage members</a></li>
                <li><a href="../admin_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
        <div class="row" style="height:30px;"></div>
        <div class="col-sm-10">
            <div><?php echo message();
                    echo successmessage();?></div>
        <h1>Add New Event</h1>
            <form action="Addevents.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                <label for="title">Title: *Minimun Length:2 char </label>
                <input class="form-control" type="text" name="Title" id="title" placeholder="Title">
                </div>
                    <div class="form-group">
                <label for="selectimage">Select Image: </label>
                <input type="file" class="form-control" name="Image" id="selectimage" >
                </div>
                    <div class="form-group">
                <label for="venue">Venue: </label>
                <input class="form-control" type="text" name="Venue" id="venue" placeholder="Venue">
                </div>
                    <div class="form-group">
                <label for="datetime">Date And Time: </label>
                <input class="form-control" type="text" name="Datetime" id="datetime" placeholder="eg. Nov-26 5:00PM">
                </div>
                    <div class="form-group">
                        
                        <label>Society: <?php echo $X; ?></label>
                </div>
                    <div class="form-group">
                <label for="postarea">Description: <p style="align:right;">*Minimun Length: 30 char</p> </label>
                <textarea class="form-control"  name="Description" id="postarea" placeholder="Description"></textarea>
                </div>
                    <br>
                    <button name="submit" class="btn btn-primary btn-block" >Submit Event</button>
                    <br>
                </fieldset>
                
                </form>
            
            </div>
        </div>
        </div>
    <div id="Footer">
<hr><p>Theme By | Shubham Garg |&copy;2017 --- All right reserved.</p>
<a style="color: white; text-decoration: none; cursor: pointer; font-weight:bold;"  target="_blank">
<p>
This site is only used for blood bank services Knockcamp.in have all the rights. no one is allow to distribute
copies other then <br> Knockcamp.in &trade;  india &trade;</p><hr>
</a>
	
</div>
<div style="height: 10px; background: #27AAE1;"></div> 

    </body>
    
</html>
