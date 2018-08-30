<?php  
include('Include/functions.php');
?>
<?php
if(isset($_POST["submit"]))
{
     global $connection;
        $id=$_GET['id'];
        $sql="delete from events  where id='$id'";
        $execute=mysqli_query($connection,$sql);
        if(!$execute)
        {
            $_SESSION['ErrorMessage']='Failed!!!!!!';
        }
        else{
             $_SESSION['SuccessMessage']='Deleted Successfully';
            header("Location:Dashboard.php");

}
}
?>

<html>
<head>
    
    <title>Delete Post</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
    <style>
        <?php include("css/dashboard.php") ?>
    </style>
    </head>
<body>
  <?php  $X=$_SESSION["society"];  ?>
            
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 ">
            <br><br>
            <h2 style="color:white;">Admin Panel</h2>
            <ul id="Side_Menu" class="nav nav-pills nav-stacked">
                <li ><a href="Dashboard.php"><span class="glyphicon glyphicon-th"></span> Dashboard</a></li>
                <li class="active"><a href="Addevents.php"><span class="glyphicon glyphicon-list-alt"></span> Add new Event</a></li>
                <li><a href="managemembers.php"><span class="glyphicon glyphicon-user"></span> Manage members</a></li>
                <li><a href="Dashboard.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
        <div class="row" style="height:30px;"></div>
        <div class="col-sm-10">
            <div><?php echo message();
                    echo successmessage();?></div>
        <h1>Delete Post</h1>
             <?php   global $connection;
                    $id=$_GET['id'];
                $sql="Select * from events where id='$id'";
                $execute=mysqli_query($connection,$sql);
                    while($rows=mysqli_fetch_array($execute))
                {
                    
                 $descriptiontobeupdated=$rows['description'];
                    $Titletobeupdated=$rows['title'];
                        $imagetobeupdated=$rows['image'];
                        $venuetobeupdated=$rows['venue'];
                        $datetime=$rows['datetime'];
                       }
                        ?>

            <form action="Deletepost.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                <label for="title">Title: *Minimun Length:2 char </label>
                <input disabled class="form-control" type="text" name="Title" id="title" Value="<?php echo $Titletobeupdated; ?>">
                </div>
                    <div class="form-group">
                        <strong>Existing Image: </strong><img src="Society/<?php echo $X; ?>/<?php echo $imagetobeupdated; ?>" width="170"; height="70";><br>
                <label for="selectimage">Select Image: </label>
                <input disabled type="file" class="form-control" name="Image" id="selectimage" >
                </div>
                    <div class="form-group">
                <label for="venue">Venue: </label>
                <input disabled class="form-control" type="text" name="Venue" id="venue" value="<?php echo $venuetobeupdated; ?>">
                </div>
                    <div class="form-group">
                <label for="datetime">Date And Time: </label>
                <input disabled class="form-control" type="text" name="Datetime" id="datetime" value="<?php echo $datetime; ?>">
                </div>
                    <div class="form-group">
                        
                        <label>Society: <?php echo $X; ?></label>
                </div>
                    <div class="form-group">
                <label for="postarea">Description: <p style="align:right;">*Minimun Length: 30 char</p> </label>
                <textarea disabled class="form-control"  name="Description" id="postarea" placeholder="Description and Registeration Link"><?php echo $descriptiontobeupdated; ?></textarea>
                </div>
                    <br>
                    <button name="submit" class="btn btn-primary btn-block" >Confirm Deletion?</button>
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
