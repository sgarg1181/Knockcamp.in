<html>
    <head>
<title>Members</title>
        <link 2rel="stylesheet" href="shubham/css/bootstrap.min.css">
    <script src="shubham/js/bootstrap.min.js"></script>
    
    </head>
    <body>
    
<?php
if(isset($_GET["team"]))    
{
    ?>
            <div class="container">
        <div class="row">
            <?php
    $society=$_GET["team"];
    $connection=mysqli_connect('localhost','root','','knockcamp');
    $sql="Select * from members where society= '$society'and team='General Member'";
    $execute=mysqli_query($connection,$sql);
     while($rows=mysqli_fetch_array($execute))
                {   $id=$rows['id'];
                    $name=$rows['name'];
                    $post=$rows['post'];
                    $image=$rows['image'];           
        ?>    
          <div class="col-lg-3 ">
          <div class="card " style="margin-top:15px; margin-bottom:15px;">
    <img class="card-img-top" src="shubham/Society/<?php echo $society; ?>/members/<?php echo $image; ?>" height="150" width="180" alt="Card image cap">
      <div class="card-body">
        <h4 class="card-title"><?php echo $name; ?></h4>
        <p><span class="desc2">Post: <?php echo $post; ?></span></p>
          </div>       
        <div class="card-footer bg-transparent border-success"><?php echo $society; ?></div>
    </div>       
      </div>
    
        
     <?php           
                } ?> </div>
        </div>
            <?php
    }    ?>
            <?php
if(isset($_GET["coreteam"]))    
{
    ?>
            <div class="container">
        <div class="row">
        <?php
    $society=$_GET["coreteam"];
    $connection=mysqli_connect('localhost','root','','knockcamp');
    $sql="Select * from members where society= '$society' and team='Core Team'";
    $execute=mysqli_query($connection,$sql);
     while($rows=mysqli_fetch_array($execute))
                {   $id=$rows['id'];
                    $name=$rows['name'];
                    $post=$rows['post'];
                    $image=$rows['image'];           
        ?>    
          <div class="col-lg-3 ">
          <div class="card " style="margin-top:15px; margin-bottom:15px;">
    <img class="card-img-top" src="shubham/Society/<?php echo $society; ?>/members/<?php echo $image; ?>" height="150" width="180" alt="Card image cap">
      <div class="card-body">
        <h4 class="card-title"><?php echo $name; ?></h4>
        <p><span class="desc2">Post: <?php echo $post; ?></span></p>
          </div>       
        <div class="card-footer bg-transparent border-success"><?php echo $society; ?></div>
    </div>       
      </div>
    
        
     <?php           
}?>
                </div>
        </div>
            <?php
    }    ?>

        
    </body>
</html>

