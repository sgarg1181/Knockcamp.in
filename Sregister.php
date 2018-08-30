<?php include("Include/functions.php"); ?>
<?php 
$username='';
$password='';
if(isset($_POST["submit"]))
    
{   global $connection;
    $society=mysqli_real_escape_string($connection,$_POST["society"]);
    $username=mysqli_real_escape_string($connection,$_POST["Username"]);
    $password=mysqli_real_escape_string($connection,$_POST["Password"]);
    $confirmpassword=mysqli_real_escape_string($connection,$_POST["Confirmpassword"]);
    $pass_hash=md5($password);

    $Admin=$_SESSION["username"];

    if(empty($_POST["Username"])||empty($_POST["Password"])||empty($_POST["Confirmpassword"]))
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
        
        $sql="INSERT INTO society_admins(society,username,password,addedby)
        Values('$society','$username','$pass_hash','$Admin')";
        
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
        #country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
            </style>
            <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
    $("#search-box").keyup(function(){
        $.ajax({
        type: "POST",
        url: "readsociety.php",
        data:'keyword='+$(this).val(),
        beforeSend: function(){
            $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data){
            $("#suggesstion-box").show();
            $("#suggesstion-box").html(data);
            $("#search-box").css("background","#FFF");
        }
        });
    });
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
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
                <li class="active"><a href="Sregister.php"><span class="glyphicon glyphicon-log-out"></span>Society registeration </a></li>


            <li ><a href="Tregister.php"><span class="glyphicon glyphicon-log-out"></span>Teacher registeration</a></li>
              <li  ><a href="Gregister.php"><span class="glyphicon glyphicon-log-out"></span>General registeration</a></li>
                <li><a href="admin_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
        <div class="col-sm-10">
        <h1>Manage Admins</h1>
           <div><?php echo message();
               echo successmessage();?></div>
            <div>
            <form action="Sregister.php" method="post">
                <fieldset>
                    <div class="form-group">
                <label for="categoryname">Society: </label>
                <div class="frmSearch">
                <input required class="form-control" type="text" name="society" id="search-box" autocomplete="off" autofocus="" placeholder="Society Name">
                <div id="suggesstion-box"></div>
            </div>








                </div>
                    <div class="form-group">
                <label for="categoryname">Email(@thapar.edu): </label>
                <input required class="form-control" type="text" name="Username" id="categoryname" placeholder="Email">
                </div>
                    <div class="form-group">
                <label for="categoryname">Password: </label>
             <input required class="form-control" type="password" name="Password" id="categoryname" placeholder="Password" >
                </div>
                    <div class="form-group">
                <label for="categoryname">Confirm-Password: </label>
                <input required class="form-control" type="password" name="Confirmpassword" id="categoryname" placeholder="Confirm Password">
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
                <th>Society Name</th>
                <th>Action</th>
            </tr>
            <?php   global $connection;
                $sql="Select * from SOCIETY_ADMINS order by id desc";
                $execute=mysqli_query($connection,$sql);
                    $srno=0;
                while($rows=mysqli_fetch_array($execute))
                {
                    $id=$rows["id"];
                    $username=$rows['username'];
                    $society=$rows['society'];
                    $srno++;
                    ?>
                    <tr>
                    <td><?php echo $srno;?></td>
                    <td><?php echo $username;?></td>
                    <td><?php echo $society;?></td>
                    <td><a href="DeleteAdmin.php?id=<?php echo $id; ?>"><span class="btn btn-danger btn-block">Delete</span></a></td>
                    </tr>   
                <?php    
                }
                ?>
                </table>
            </div>
        </div>
        </div>
    
    </div>
     <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
     <script type="text/javascript">
$(function() {
    
    //autocomplete
    $(".auto").autocomplete({
        source: "readsociety.php",
        minLength: 1
    });                

});
</script>
    </body>

</html>