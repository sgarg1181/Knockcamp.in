<?php  
include('Include/functions.php');
?>
<?php
if(isset($_POST["submit"]))
{
     global $connection;
        $id=$_GET['id'];
        $sql="delete from members  where id='$id'";
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
                <li ><a href="Addevents.php"><span class="glyphicon glyphicon-list-alt"></span> Add new Event</a></li>
                <li class="active"><a href="managemembers.php"><span class="glyphicon glyphicon-user"></span> Manage members</a></li>
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
                $sql="Select * from members where id='$id'";
                $execute=mysqli_query($connection,$sql);
                    while($rows=mysqli_fetch_array($execute))
                {
                    
                 $nametobeupdated=$rows['name'];
                    $posttobeupdated=$rows['post'];
                        $imagetobeupdated=$rows['image'];
                        $contacttobeupdated=$rows['contact'];
                        $team=$rows['team'];
                       }
                        ?>

            <form action="DeleteAdmin.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                <label for="name">Name:  </label>
                <input disabled class="form-control" type="text" name="name" id="name" value="<?php echo $nametobeupdated; ?>" required>
                </div>
                    <div class="form-group">
                <label for="post">POST: </label>
                <input disabled class="form-control" type="text" name="post" id="post" value="<?php echo $posttobeupdated; ?>" >
                </div>
                    <div class="form-group">
                <label for="contact">Contact Information: </label>
                <input disabled class="form-control" type="text" name="contact" id="contact" value="<?php echo $contacttobeupdated; ?>">
                </div>
                    Existing Image: <img src="Society/<?php echo $X; ?>/members/<?php echo $imagetobeupdated; ?>" height="100" width="170;">
                    <div class="form-group">
                <label for="selectimage">Select Image: </label>
                <input disabled type="file" class="form-control" name="image" id="selectimage" >
                </div>
                    Existing team: <?php echo $team; ?>
                    <div class="form-group">
                <label for="team">Team: </label>
                 <select disabled class="form-control" id="team" name="team">
                    <option>Core Team</option>
                     <option>General Member</option>
                    </select>
               </div>    
                    <br>
                    <button name="submit" class="btn btn-primary btn-block" >Delete Member</button>
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
