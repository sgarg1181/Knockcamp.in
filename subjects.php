<!DOCTYPE html>
<html lang="en">
<head>
<title>Computer</title>
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
    <link href='//fonts.googleapis.com/css?family=Cutive' rel='stylesheet'>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



     <style>
  .bg-light-gray {
    background-color:  #d9d9d9;
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

  h1
  {
  text-shadow:5px 5px 10px white;
  }
  
  input{
 
  border-radius:5px;
  }
  .dropdown-submenu {
    position: relative;
}


  .center-pills { display: inline-block;
    float:none;
    margin-top: 10px;
    
    
         }

  </style>
 
</head>
<body class="bg-light-gray">

    <!-- Navigation -->
    <?php
    include 'navigation.php';
    ?>




<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="table-responsive">
                <table class="table table-striped table-hover ">  
            <tr><th>Serial No.</th>
                <th>Subjects Name</th>
                <th style="float: right;">Course Material</th>
            </tr>
           





            <?php   if(isset($_GET["branch"])){
    $connection=mysqli_connect('localhost','root','','knockcamp');
    $branch=$_GET["branch"];
    $year=$_GET["year"];
   // $year=$_GET["year"]; do yearwise
    $sql= "select subjects from subjects where year='$year' and branch='$branch'";
        $execute=mysqli_query($connection,$sql);
        $sr=1;
                while($rows=mysqli_fetch_array($execute))
                {
                    $subjects=$rows['subjects']; 
            ?>
                    <tr>
                    <td><?php echo $sr++;?></td>
                    <td><strong><?php echo $subjects;?></strong></td>
                    <td style="float: right;">
           <a style="height: 45px;width: 200px; margin-bottom: 5px;" href="tutorial.php?subject=<?php echo $subjects; ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Tutorials</a></td>
                    </tr>   
                <?php    
                }}
                ?>
                </table>
            </div>


     </div>
</div>
</div>
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