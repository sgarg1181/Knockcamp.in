<?php include("Include/DB.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
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

     <header>
        

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: 0px">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>  
        <div class="carousel-inner" role="listbox">
      
            <div class="carousel-item active" style="background-image: url('TU.jpg');width: 1500px; height: 450px"  >
        </div>
        
  <?php global $connection;
                $sql="select * from carousalimage order by id desc LIMIT 0,3";
                $execute=mysqli_query($connection,$sql);
                while($rows=mysqli_fetch_array($execute))
                {
                    $id =$rows['id'];
                    $image =$rows['image'];
                    $title =$rows['title'];
               
                ?>

        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('Carousal/<?php echo $image ?>'); width: 1500px; height: 450px" >
        </div>
            <?php } ?>  
        
        </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Trending Articles</h1>
    <div class="row">
    <div class="row">
      
       <?php global $connection;
                $sql="select * from articles order by id desc LIMIT 0,6";
                $execute=mysqli_query($connection,$sql);
                while($rows=mysqli_fetch_array($execute))
                {
                    $id =$rows['id'];
                    $datetime =$rows['datetime'];
                    $title =$rows['title'];
                    $article =$rows['article'];
                    $author=$rows['author'];
                ?>
    <!-- Marketing Icons Section -->
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header"><font color="red"><?php echo $title; ?></font></h4>
          <div class="card-body ">
            <input type="checkbox" class="read-more-state" id="post-1" />
            
            <p class="card-text read-more-wrap"> <?php if(strlen($article)>150)
                    { $article=substr($article,0,450).'...';}    
                    echo $article; ?></p>
            </div>
            <a href="Fullarticle.php?articleid=<?php echo $id; ?>" class="btn btn-primary">Learn More</a>
          <div class="card-footer">
              <p><strong>Published on: <?php echo $datetime ?></strong></p>
              <p><strong>Author: <?php echo $author; ?></strong></p>
            </div>
        </div>
      </div>

    <?php } ?>
        </div>
    <!-- /.row -->

    <!-- /.row -->
      </div>
     </div>
  <!-- /.container -->



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