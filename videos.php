<!DOCTYPE html>
<html lang="en">
<head>
<title>Videos</title>
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
.bg-light-gray {
    background-color: #f7f7f7;
  }
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


</style>
  </head>

  <body class="bg-light-gray">

    <!-- Navigation -->
    <?php
    include 'navigation.php';
    ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Videos
      </h1>
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home_thapar_university.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Videos</li>        
      </ol>

      
    <div class = "container">
<div class = "row">
      <?php
     
    $connection=mysqli_connect('localhost','root','','knockcamp');
    $sql= "select * from video_form";
        $execute=mysqli_query($connection,$sql);
                while($rows=mysqli_fetch_array($execute))
                {
                
                  $link=$rows['link'];
                  $title=$rows['title'];
                  $filepath=$rows['filepath'];
                  ?>
            

   <div class="col-xs-12 col-lg-4 col-md-4 col-sm-12" style="margin-top:20px;">
          <div class="card h-100">
            <a href="<?php echo $link;  ?>" target="_blank"> <img style="width: 339px; height: 330px" class="card-img-top" src="<?php echo $filepath ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title" >
                <a href="<?php echo "https://".$link;  ?>"><?php echo $title ?></a>
              </h4>
             
            </div>
          </div>
          
    </div>
                 <?php    } ?>
            </div>
            </div>
            <br>
        
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
