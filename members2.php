<?php if(!isset($_GET['coreteam'])){
    header("Location: society.php");
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Events</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>



  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">


  <style type="text/css">
    
    .h1 {
      text-shadow:5px 5px 10px white;
    }
    .footer-social { float: center; margin-top:5px;}
    .footer-social li {  display: inline;float:center;}
    .footer-social span {margin-left: 2 40px; }
    .read-more-state {
      display: none;
    }




    ul.nav li.dropdown:hover > ul.dropdown-menu{
      display: block;
      visibility:visible;  
    }

    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu .dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
    }
      .desc1{
          color:floralwhite;
          padding: 1px;
          margin-top: 5px;
          margin-bottom: 5px;
         }
      .desc2{
          padding: 1px;
          color:aliceblue;
          margin-left: 5px;
          margin-top: 5px;
          margin-bottom: 5px;
        
      }
      .card-footer{
          font-size: 1.2em;
          color:floralwhite;
          background-color: black;
      }
      .card-body{
          background-color:black; 
          color:white;
      }
  </style>
</head>

<body >

  <!-- Navigation -->
  <?php
  include 'navigation.php';
  ?>


  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">Members
    </h1>
      <div class="container" >
    <div class="row">
        <?php
    $society=$_GET["coreteam"];
    $connection=mysqli_connect('localhost','root','','knockcamp');
    if(isset($_GET["Page"])){
            $page=$_GET["Page"];
                    $showpostfrom=($page*6)-6;
                    if($page==0||$page<0){
                        $showpostfrom=0;
                    }
                  $sql="Select * from members where society='$society' and team = 'Core Team' order by id desc LIMIT $showpostfrom,6";
                      }
                      else{
    $sql="Select * from members where society= '$society'and team='Core Team'";}
    $execute=mysqli_query($connection,$sql);
     while($rows=mysqli_fetch_array($execute))
                {   $id=$rows['id'];
                    $name=$rows['name'];
                    $post=$rows['post'];
                    $image=$rows['image'];           
        ?>    
          <div class="col-lg-3 ">
          <div class="card bg-danger" style="margin-top:15px; margin-bottom:15px;">
    <img class="card-img-top" src="societyadmin/Society/<?php echo $society; ?>/<?php echo $image; ?>" height="100%" width="100%" alt="Card image cap">
      <div class="card-body">
        <h4 class="card-title"><?php echo $name; ?></h4>
        <p><span>Post: <?php echo $post; ?></span></p>
          </div>       
        <div class="card-footer bg-transparent border-success"><?php echo $society; ?></div>
    </div>       
      </div>
    
        
     <?php           
                } ?>
        
        </div>
      </div>
      <?php if(isset($_GET["Page"])){ ?>
                <nav>
                    <ul class="pagination justify-content-center">
                <?php 
                        if($page>1)
                        {
                           ?> 
                        <li><a href="members2.php?coreteam=<?php echo($team) ?>&Page=<?php echo $page-1; ?>">&laquo;</a></li>
                            <?php }
                        } ?>
                        <?php 
                global $connection;
                $team=$_GET['coreteam'];
                  $sql="SELECT count(*) from members where society='$team' and team = 'Core Team'";
                $execute=mysqli_query($connection,$sql);
                $rows=mysqli_fetch_array($execute);
                $totalinter=array_shift($rows);
                $pages=$totalinter/4;
                $pages=ceil($pages);
                
        
                        for($i=1;$i<=$pages;$i++)
                  {
                  if($i==$page){
                  ?>
                        <li class="active"><a href="members2.php?coreteam=<?php echo($team) ?>&Page=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php }else{ ?>
                        <li><a href="members2.php?coreteam=<?php echo($team) ?>&Page=<?php echo $i ?>"><?php echo $i ?></a></li><br>
                    <?php }} if($page+1<=$pages){?>
                        <li><a href="members2.php?coreteam=<?php echo($team) ?>&Page=<?php echo $page+1; ?>">&raquo;</a></li>
                        <?php } ?>
    <!-- /.row -->
    </div>
   
  <!-- /.container -->

  <!-- Footer -->
  <?php
  include 'footer.php';
  ?> 

  <script>


    $('ul.nav li.dropdown').hover(function() {
      if(window.width > 767) {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
      }   
    });
  </script>

  <script type='text/javascript'
  src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
