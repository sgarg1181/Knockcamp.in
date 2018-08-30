<?php include("Include/functions.php"); ?>
<!DOCTYPE>
<html>
    <head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
        <style>
              <?php include("css/dashboard.php") ?>  
        </style>
    </head>
<body>
<?php
include_once("loginmand.php");  ?>
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 ">
            <br><br>
            <h2 style="color:white;">Admin Panel</h2>
            <ul id="Side_Menu" class="nav nav-pills nav-stacked">
                <li class="active"><a href="Dashboard.php"><span class="glyphicon glyphicon-th"></span> Dashboard</a></li>
                <li><a href="Addevents.php"><span class="glyphicon glyphicon-list-alt"></span> Add new Event</a></li>
                <li><a href="managemembers.php"><span class="glyphicon glyphicon-user"></span> Manage members</a></li>
                <li><a href="../admin_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
        <div class="row" style="height:30px;"></div>
        <div class="col-sm-10">
        <div><?php echo message();
                 echo successmessage();?></div>
            <h1>Admin Dashboard</h1>
            <table class="table table-striped table-hover">
             <tr>
                <th>No.</th>
                <th>Post title</th>
                <th>Date and time</th>
                <th>Banner</th>
                <th>Venue</th>
                <th>Action</th>
                <th>Details</th>
             </tr>
                <?php  
                global $connection;
                $sql="select * from events";
                $execute=mysqli_query($connection,$sql);
                $srno=1;
                while($rows=mysqli_fetch_array($execute))
                {
                    $id =$rows['id'];
                    $Datetime =$rows['datetime'];
                    $Title =$rows['title'];
                    $Image =$rows['image'];
                    $Venue =$rows['venue'];
                    $Society=$rows['society'];
                ?>
                
                <tr>
                    <td><?php echo $srno++; ?></td>
                    <td><?php if(strlen($Title)>15){$Title=substr($Title,0,8).'..';} 
                    echo $Title; 
                        ?></td>
                    <td><?php if(strlen($Datetime)>15){$Datetime=substr($Datetime,0,10).'..';} 
                        echo $Datetime; ?></td>
                    <td><img src="Society/<?php echo $Society?>/<?php echo $Image; ?>" width="220" height="60"></td>
                    <td><?php if(strlen($Venue)>15){$Venue1=substr($Venue,0,8).'..';
                                  echo $Venue1;}
                            else{
                            echo $Venue; }?></td>
                    <td><a href="Editpost.php?id=<?php echo $id; ?>"><span class="btn btn-warning">Edit</span></a> 
                        <a href="Deletepost.php?id=<?php echo $id; ?>"><span class="btn btn-danger">Delete</span></a></td>
                    <td><a href="/knockcamp/FullPost.php?id=<?php echo $id; ?>" target="_blank"><span class="btn btn-primary" >Live Preview </span> </a></td>
                    
                </tr>
                
                <?php } ?>
                
            </table>
        </div>
        </div>
    
    </div>
    <div id="Footer">
<hr><p>Theme By | Shubham Garg |&copy;2017-2020 --- All right reserved.</p>
<a style="color: white; text-decoration: none; cursor: pointer; font-weight:bold;"  target="_blank">
<p>
This site is only used for blood bank services bloodbank.com have all the rights. no one is allow to distribute
copies other then <br> Knockcamp.com &trade;  india &trade;</p><hr>
</a>
	
</div>
<div style="height: 10px; background: #27AAE1;"></div> 

    </body>

</html>