<?php include("Include/functions.php"); ?>
<?php 
$name='';
$username='';
$password='';
if(isset($_POST["submit"]))
{  
 global $connection;
    $name=mysqli_real_escape_string($connection,$_POST["name"]);
    $username=mysqli_real_escape_string($connection,$_POST["Username"]);
    $password=mysqli_real_escape_string($connection,$_POST["Password"]);
    $confirmpassword=mysqli_real_escape_string($connection,$_POST["Confirmpassword"]);
    $pass_hash=md5($password);
    $Admin=$_SESSION["username"];
    if(empty($_POST["name"])||empty($_POST["Username"])||empty($_POST["Password"])||empty($_POST["Confirmpassword"]))
    {
        $_SESSION["ErrorMessage"]="All Entities Must be Filled Out";
    }
    elseif(strlen($_POST["Username"])<5)
    {
        $_SESSION["ErrorMessage"]="Too Short Username";
    }
  elseif(strlen($_POST["Password"])<5)
    {
        $_SESSION["ErrorMessage"]="Atleast 5 character password";
    }
 elseif($_POST["Password"]!==$_POST["Confirmpassword"])
    {
        $_SESSION["ErrorMessage"]="Password Doesn't Match";
    }
    
    else{
        
      $sql="INSERT INTO teacher(Name,Email,Password,addedby)
        Values('$name','$username','$pass_hash','$Admin')";
        
            $execute=mysqli_query($connection,$sql);
        if(!$execute)
        {
            $_SESSION['ErrorMessage']='Failed!!!!!!';
        }
        else{
            $_SESSION['SuccessMessage']='Admin Added Successfully';
            $category='';
        }
    }
}
?>

<!DOCTYPE>
<html>
    <head>
    
    <title>Manage Admins</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/dashboard.css">
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
        <ul id="Side_Menu" class="nav nav-pills nav-stacked">
                <li ><a href="addarticle.php"><span class="glyphicon glyphicon-list-alt"></span>Add Article</a></li>
                <li ><a href="homecarousal.php"><span class="glyphicon glyphicon-user"></span>Carousal Images</a></li>
                <li ><a href="Sregister.php"><span class="glyphicon glyphicon-log-out"></span>Society registeration </a></li>
            <li class="active"><a href="Tregister.php"><span class="glyphicon glyphicon-log-out"></span>Teacher registeration</a></li>
            <li  ><a href="Gregister.php"><span class="glyphicon glyphicon-log-out"></span>General registeration</a></li>
                <li><a href="admin_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
        <div class="col-sm-10">
        <h1>Manage Admins</h1>
           <div><?php echo message();
               echo successmessage();?></div>
            <div>
            <form action="Tregister.php" method="post">
                <fieldset>
                <div class="form-group">
                <label for="categoryname">Name </label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Name">
                </div>
                <div class="form-group">
                <label for="categoryname">Email(@Thapar.edu): </label>
                <input class="form-control" type="text" name="Username" id="categoryname" placeholder="Email">
                </div>
                    <div class="form-group">
                <label for="categoryname">Password: </label>
                <input class="form-control" type="password" name="Password" id="categoryname" placeholder="Password" >
                </div>
                    <div class="form-group">
                <label for="categoryname">Confirm-Password: </label>
                <input class="form-control" type="password" name="Confirmpassword" id="categoryname" placeholder="Confirm Password">
                </div>
                    <br>
                    <button name="submit" class="btn btn-primary btn-block" >Add Admin</button>
                    <br>
                </fieldset>
                
                </form>
            
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover ">  
            <tr><th>Serial No.</th>
                <th>Admin Name</th>
                <th>Added By</th>
                <th>Action</th>
            </tr>
            <?php   global $connection;
                $sql="Select * from teacher order by id desc";
                $execute=mysqli_query($connection,$sql);
                    $srno=0;
                while($rows=mysqli_fetch_array($execute))
                {
                    $id=$rows["id"];
                    $username=$rows['Email'];
                    $addedby=$rows['addedby'];
                    $srno++;
                    ?>
                    <tr>
                    <td><?php echo $srno;?></td>
                    <td><?php echo $username;?></td>
                    <td><?php echo $addedby;?></td>
                    <td><a href="DeleteTeacher.php?id=<?php echo $id; ?>"><span class="btn btn-danger btn-block">Delete</span></a></td>
                    </tr>   
                <?php    
                }
                ?>
                </table>
            </div>
        </div>
        </div>
    
    </div>
     
    </body>

</html>