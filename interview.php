<?php
include('Include/dbconnect.php');
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $inter="SELECT * FROM interview WHERE id = {$id}";}
else{
  $inter="SELECT * FROM interview";  
}
$detail=mysqli_query($con_ser, $inter);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Interview</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    

  <style type="text/css">
  h1 {
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

    @-webkit-keyframes bummer {
     100% {
      -webkit-transform: scale(1.5); 
    }
  }

  @keyframes bummer {
   100% {
    transform: scale(1.5); 
  }
}
  .dropdown-submenu {
    position: relative;
  }

  .dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
  }
.bg-light-gray {
  background-color:   #d9d9d9;
}
.card{
  align-self: center;
  width: 90%;
}
.panel{
  width: 80%;
}
.card-header{
  background-color: #343a40!important;
  color: white;
}
.card-block button
{
    float:right;
}
.nav{
  margin-bottom: 0px;
}
</style>

</head>

<body class="bg-light-gray">

  <!-- Navigation --><br><br><br>
  <?php
  require_once 'navigation.php'; 
  require_once 'taketop.php';
 ?>

<div class="container">
            <form action="interview.php" method = "GET">
<input class="btn btn-primary btn-sm" type="submit" value="Submit" style="float:right;">
<input type="text" style="float: right; height: 30px;" class="form" placeholder="Search..." name="search" id="search" >
    </form>
<br><br>
<a href="student_admin.php" style="float: right;">
<span class="glyphicon glyphicon-user" style="position: relative; top:1px;
align-self: center;">
 Wanna share experience?</span></a>
<div class="container">

  <h1 class="my-4 text-center text-lg-left" style="float: left; margin-top: 0px;">Interviews</h1><br>
</div>

 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home_thapar_university.php">Home</a>
        </li>
     <li class="breadcrumb-item">Interviews</li>
      </ol>
    </div>
  <div class="container">
      <div class="row">
      <div class="col-sm-8">
  <br>

  <?php 
  if(isset($_GET['search']))
  {   
  $search=mysqli_real_escape_string($con_ser,$_GET['search']);
  $searched =$con_ser->query(" SELECT * FROM interview WHERE company_name LIKE'%{$search}%' OR author_name LIKE'%{$search}%' ORDER BY id"); 
  while($row = mysqli_fetch_assoc($searched))
    {
      ?>
      <div class="card">
      <div class="card-header"><?php 
      echo "<strong>Company's name :- </strong>"."<strong>".$row["company_name"]."</strong>"."<br>"; 
     
      ?></div>
      <div class="card-block" style="margin: 1em;">
      <?php
       echo "<strong> AUTHOR :- </strong>"."<strong>".$row["author_name"]."</strong>"."<br>";
      $experience=$row["experience"];
      $show_less=substr($experience,0,100);
      {
      echo "<strong> Experience </strong><br />";
      echo $show_less;  
      }
      ?>      
<a href="interview.php?id=<?php echo($row["id"]); ?>"><button class="btn" id="show_more" name="show_more">Show more</button></a>
</div>
</div><br>
      <?php
    }
  }
  else
  {
  while($row = mysqli_fetch_assoc($detail))
    {
      ?>
      <div class="card">
      <div class="card-header"><?php  
      echo "<strong>Company's name :- </strong>"."<strong>".$row["company_name"]."</strong>"."<br>"; 
      ?></div>
`      <div class="card-block" style="margin: 1em;">
      <?php
      
       echo "<strong> AUTHOR :- </strong>"."<strong>".$row["author_name"]."</strong>"."<br>";
      $experience=$row["experience"];
      $show_less=substr($experience,0,100);
      if(isset($_GET['id']))
      {
        echo "<strong> Experience </strong><br />";
        echo $experience;
        ?><a href="interview.php?Page=1";><button class="btn" id="show_more" name="show_more">Back</button></a><?php
      }
      else
      {
      echo "<strong> Experience </strong><br />";
      echo $show_less;  
      ?><a href="interview.php?id=<?php echo($row["id"]); ?>"><button class="btn" id="show_more" name="show_more">Show more</button></a><?php
      }
      ?>
        </div>
      </div>   
<br>
      <?php
    }
}
  ?></b>
  </div>
<div class="col-sm-offset-1  col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                        <div class="panel-title">Companies</div><br>
                    </div>
                    <div class="panel-body">
                        <?php   global $con_ser;
                $sql="Select DISTINCT company_name from interview";
                $execute=mysqli_query($con_ser,$sql);
                   while($rows=mysqli_fetch_array($execute))
                {
                    $company=$rows['company_name']; 
                 ?>
                <a id="heading" href="interview.php?search=<?php echo $company; ?>"><?php echo $company."<hr>"; ?></a>        
                 <?php }
            ?>
                    </div>
                    <div class="panel-footer">Knockcamp.com</div>
                
                </div>
</div>
</div>
</div>
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

<?php
  $company_name = "SELECT company_name FROM interview";
  $author_name = "SELECT author_name FROM interview";
  $experience = "SELECT experience FROM interview";

    mysqli_query($con_ser, $company_name);
    mysqli_query($con_ser, $author_name);
    mysqli_query($con_ser, $experience);
  
if (isset($_GET['submit'])) {
   $company_name=mysqli_real_escape_string($con_ser,$_POST['company_name']);
   $author_name=mysqli_real_escape_string($con_ser,$_POST['author_name']);
   $experience=mysqli_real_escape_string($con_ser,$_POST['experience']);
  
    $query = "INSERT INTO interview (id, company_name, author_name, experience) 
    VALUES('', '$company_name', '$author_name', '$experience')";
    
    mysqli_query($con_ser, $query);
}

?><center>
  <?php
if(isset($_GET["Page"])){
            $page=$_GET["Page"];
                    $showpostfrom=($page*10)-10;
                    if($page==0||$page<0){
                        $showpostfrom=0;
                    }
                  $sql="Select * from interview order by id desc LIMIT $showpostfrom,10";
                      }
     ?> 
      <?php if(isset($_GET["Page"])){ ?>
                <nav>
                    <ul class="pagination justify-content-center">
                <?php 
                        if($page>1)
                        {
                           ?> 
                        <li><a href="interview.php?Page=<?php echo $page-1; ?>">&laquo;</a></li>
                            <?php }
                         ?>
                        <?php 
                global $connection;
                  $sql="SELECT count(*) from interview";
                $execute=mysqli_query($con_ser,$sql);
                $rows=mysqli_fetch_array($execute);
                $totalinter=array_shift($rows);
                $pages=$totalinter/4;
                $pages=ceil($pages);
                
        
                        for($i=1;$i<=$pages;$i++)
                  {
                  if($i==$page){
                  ?>
                        <li class="active"><a href="interview.php?Page=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php }else{ ?>
                        <li><a href="interview.php?Page=<?php echo $i ?>"><?php echo $i ?></a></li><br>
                    <?php }} if($page+1<=$pages){?>
                        <li><a href="interview.php?Page=<?php echo $page+1; ?>">&raquo;</a></li>
                        <?php }?>
  <?php }
?>
</center>
<?php 
require_once 'footer.php';
   ?>
