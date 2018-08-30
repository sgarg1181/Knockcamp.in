<?php  
include('Include/functions.php');
?>
<?php
if(isset($_POST["submit"]))
{global $connection;
    $name=mysqli_real_escape_string($connection,$_POST['name']);
    $post=mysqli_real_escape_string($connection,$_POST['post']);
    $contact=mysqli_real_escape_string($connection,$_POST['contact']);
    $team=mysqli_real_escape_string($connection,$_POST['team']);
 $image=$_FILES['image']['name'];
 $Society=$_SESSION['society'];
 if(!is_dir("Society/$Society/"))
 {
   mkdir("Society/$Society/");   
 }
 $Target="Society/$Society/".basename($_FILES["image"]["name"]);
   if((strlen($contact)!=10))
    {
        $_SESSION["ErrorMessage"]="Wrong contact information";
    }
    else{
        $sql="Insert into members(name,post,team,image,contact,society)
                values('$name','$post','$team','$image','$contact','$Society')";
        $execute=mysqli_query($connection,$sql);
         move_uploaded_file($_FILES["image"]["tmp_name"],$Target);
        if(!$execute)
        {
            $_SESSION["ErrorMessage"]="Failed";
        }
        else{
            $_SESSION["SuccessMessage"]="Member added succesfully";    
        }        
    }
}
?>

<html>
<head>
    
    <title>Manage Members</title>
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
                <li ><a href="Addevents.php"><span class="glyphicon glyphicon-list-alt"></span> Add new Event</a></li>
                <li class="active"><a href="managemembers.php"><span class="glyphicon glyphicon-user"></span> Manage members</a></li>
                <li><a href="../admin_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
        <div class="row" style="height:30px;"></div>
        <div class="col-sm-10">
            <div><?php echo message();
                    echo successmessage();?></div>
        <h1>Add Members</h1>
            <form action="managemembers.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                <label for="name">Name:  </label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Enter name of member" required>
                </div>
                    <div class="form-group">
                <label for="post">POST: </label>
                <input class="form-control" type="text" name="post" id="post" placeholder="Post" >
                </div>
                    <div class="form-group">
                <label for="contact">Contact Information: </label>
                <input class="form-control" type="text" name="contact" id="contact" placeholder="Phone number">
                </div>
                    <div class="form-group">
                <label for="selectimage">Select Image: </label>
                <input type="file" class="form-control" name="image" id="selectimage" >
                </div>
                    <div class="form-group">
                <label for="team">Team: </label>
                 <select class="form-control" id="team" name="team">
                    <option>Core Team</option>
                     <option>General Member</option>
                    </select>
               </div>    
                    <br>
                    <button name="submit" class="btn btn-primary btn-block" >Add Member</button>
                    <br>
                    
                </fieldset>
                
                </form>
            <div class="table-responsive">
                <table class="table table-striped table-hover ">  
            <tr><th>Serial No.</th>
                <th>Member Name</th>
                <th>Post</th>
                <th>Team</th>
                <th>Contact Info.</th>
                <th>image</th>
                <th>Action</th>
            </tr>
            <?php   global $connection;
                $sql="Select * from members order by team";
                $execute=mysqli_query($connection,$sql);
                    $srno=0;
                while($rows=mysqli_fetch_array($execute))
                {
                    $id=$rows["id"];
                    $name=$rows['name'];
                    $team=$rows['team'];
                    $post=$rows['post'];
                    $image=$rows['image'];
                    $contact=$rows['contact'];
                    $srno++;
                    ?>
                    <tr>
                    <td><?php echo $srno;?></td>
                    <td><?php echo $name;?></td>
                    <td><?php echo $post;?></td>
                    <td><?php echo $team;?></td>
                    <td><?php echo $contact;?></td>
                    <td><img src="Society/<?php echo $X; ?>/<?php echo $image; ?>" width="190" height="60" alt="Profile photo"></td>
                    <td><a href="EditAdmin.php?id=<?php echo $id; ?>"><span class="btn btn-warning">Edit</span></a> 
                        <a href="DeleteAdmin.php?id=<?php echo $id; ?>"><span class="btn btn-danger">Delete</span></a></td>
                    </tr>   
                <?php    
                }
                ?>
                </table>
            </div>
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












