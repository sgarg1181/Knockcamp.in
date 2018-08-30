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
     .blogpost{
    background-color: #f5f5f5;
    padding: 20px 10px 10px 10px;
    overflow: hidden;
}
#heading{
    color: #005E90;
    font-weight: bold;
    font-family: sans-serif;
}
#heading:hover{
    color: #0090DB;
}
      .description{
    color: #868686;
    font-weight:bold;
    margin-top:-2px;
}

      .post{
     font-size: 1.1em;
      font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
      text-align: justify;
}
      .footer{
          font-weight: bolder;
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
    <h1 class="my-4">Event Details
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home_thapar_university.php">Home</a>
      </li>
        <li class="breadcrumb-item"><a href="events.php?Page=1">Events</a></li>
         <li class="breadcrumb-item active">Event Details</li>
    </ol>
      <div class="row">
          <div class=" col-sm-12">
       <?php  
          $getid=$_GET['id'];
          $connection=mysqli_connect('localhost','root','','knockcamp');
                $sql="Select * from events where id='$getid'";
                $execute=mysqli_query($connection,$sql);
                while($rows=mysqli_fetch_array($execute))
                {   $id=$rows['id'];
                    $title=$rows['title'];
                    $venue=$rows['venue'];
                    $datetime=$rows['datetime'];
                    $image=$rows['image'];
                    $society=$rows['society'];
                    $description=$rows['description'];            
                }
              ?>    
          <div class="blogpost thumbnail">
              <center><img class="img-responsive img-rounded" src="societyadmin/Society/<?php echo $society; ?>/<?php echo $image; ?>" height="100%" width="100%" alt="Poster Unavailable"></center>
         <div class="caption">
                        <h2 id=heading><?php echo htmlentities($title); ?></h2>
             <p class="description"><strong>Date and Time:<?php echo $datetime; ?></strong><br><strong>Venue: <?php echo $venue; ?></strong></p>
                        <p class="post"><?php echo $description; ?></p>
                    </div>
              <div class="footer"><?php echo $society; ?></div>
          </div>
          </div>
      </div>
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
