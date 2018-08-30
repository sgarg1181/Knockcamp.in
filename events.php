<?php 
include('Include/functions.php');
?>
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
          color:aqua;
          font-size: 1.3em;
          padding: 2px;
          margin-top: 5px;
          margin-bottom: 5px;
         }
      .desc2{
          font-size: 1.3em;
          padding: 1px;
          color: aqua;
          margin-left: 5px;
          margin-top: 5px;
          margin-bottom: 5px;
        
      }
      .card-footer{
          font-size: 1.2em;
          color: cornflowerblue;
      }
      .card-title{
          font-size: 1.2em;
          color: cornflowerblue;
          font-family: helvetica;
         }
      .desc3{
          background-color: black;
          border: solid 1px round;
          color: white;
          display:flex;
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
    <h1 class="my-4">Upcoming Events
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home_thapar_university.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Events</li>
    </ol>
    <div class="row">
        <?php   
                $connection=mysqli_connect('localhost','root','','knockcamp');
      if(isset($_GET["society"])&&isset($_GET["Page"])){
            $x=$_GET["society"];
            $page=$_GET["Page"];
                    $showpostfrom=($page*4)-4;
                    if($page==0||$page<0){
                        $showpostfrom=0;
                    }
                $sql="Select * from events where society='$x' order by id desc
                LIMIT $showpostfrom,4";
        }
        elseif(isset($_GET["Page"])){
            $page=$_GET["Page"];
                    $showpostfrom=($page*4)-4;
                    if($page==0||$page<0){
                        $showpostfrom=0;
                    }
                    $sql= "Select * from events order by id desc LIMIT $showpostfrom,4";
        }
        else{
               // redirect_to("events.php?Page=1");
        }
        $execute=mysqli_query($connection,$sql);
            while($rows=mysqli_fetch_array($execute))
                {   $id=$rows['id'];
                    $title=$rows['title'];
                    $venue=$rows['venue'];
                    $datetime=$rows['datetime'];
                    $image=$rows['image'];
                    $society=$rows['society'];
                    $description=$rows['description'];            
        ?>    
      <div class="col-lg-6 ">
          <div class="card border-dark bg-dark text-white" style="margin-top:15px; margin-bottom:15px;">
    <img class="card-img-top" src="societyadmin/Society/<?php echo $society; ?>/<?php echo $image; ?>" height="300" width="170" alt="Card image cap">
      <div class="card-body">
        <h4 class="card-title"><?php echo $title; ?></h4>
        <p class="card-text"><?php 
                    if(strlen($description)>50){
                        $description=substr($description,0,150).'...';
                    }
                    
                    echo $description; ?></p>
<p><span class="desc1">Venue: <?php echo $venue ?></span><br><span class="desc2">Date and Time: <?php echo $datetime; ?></span></p>
            <?php
            if(isset($_GET['society']))
            { ?>
          <a href="FullPost.php?society=<?php echo $x?>&id=<?php echo $id; ?>"><span class="btn btn-danger block">Read More &rsaquo; &rsaquo;</span>
          </a>
          <?php }else { ?>
            <a href="FullPost.php?id=<?php echo $id; ?>"><span class="btn btn-danger block">Read More &rsaquo; &rsaquo;</span>
          </a>
          <?php } ?>
      </div>       
        <div class="card-footer bg-transparent border-success"><?php echo $society; ?></div>
    </div>       
      </div>
                <?php    
                  }
                ?>
          </div>
    </div>
    <div class="container">
    
        <?php if(isset($_GET["Page"])){ ?>
                <nav>
                    <ul class="pagination justify-content-center">
                <?php 
                        if($page>1)
                        {
                          if(isset($_GET['society']))
                          { ?> 
                        <li><a href="events.php?society=<?php echo$x;?>&Page=<?php echo $page-1; ?>">&laquo;</a></li>
                      <?php }
                      else { ?>
                        <li><a href="events.php?Page=<?php echo $page-1; ?>">&laquo;</a></li>
                            <?php }
                        } ?>
                        <?php 
                global $connection;
                if(isset($_GET['society']))
                {
                  $sql="SELECT count(*) from events WHERE  society='{$x}' ";
                }
                else
                {
                  $sql="SELECT count(*) from events";
                }
                $execute=mysqli_query($connection,$sql);
                $rows=mysqli_fetch_array($execute);
                $totalpost=array_shift($rows);
                $pages=$totalpost/4;
                $pages=ceil($pages);
                
                if(isset($_GET['society']))
                {


                 }   
                  else{
                  for($i=1;$i<=$pages;$i++)
                  {
                    if($i==$page){
                  ?>
                        <li class="active"><a href="events.php?Page=<?php echo $i ?>"><?php echo $i ?></a></li>
                  <?php }else{ ?>
                        <li><a href="events.php?Page=<?php echo $i ?>"><?php echo $i ?></a></li><br>
                    <?php }}
                     if($page+1<=$pages){?>
                        <li><a href="events.php?Page=<?php echo $page+1; ?>">&raquo;</a></li>
                        <?php }?>
                        </ul></nav>
                <?php }
              }?>
    
        

    
    <!-- /.row -->

    <!-- Pagination -->
   
          
    <!-- /.container -->
  </div>
    <br>
    <br>
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
