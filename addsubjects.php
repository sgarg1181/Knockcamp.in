<?php
//signup

include 'Include/dbconnect.php';

if (isset($_POST['submit'])) {
$year=mysqli_real_escape_string($con_ser,$_POST['year']);
$branch=mysqli_real_escape_string($con_ser,$_POST['branch']);
$subjects=mysqli_real_escape_string($con_ser,$_POST['subjects']);	
		
				
			$query2 = "INSERT INTO subjects(id,year,branch,subjects) VALUES ('','$year','$branch','$subjects')";
			$result2= mysqli_query($con_ser, $query2);	
			if($result2){
			$msg1= "You have successfully added subject!";
			echo "<script type='text/javascript'>alert('$msg1');</script>";
		}
		
		
		else {			
			echo "Sorry !!! There was an error in adding your subject";			
		}
	
	
		
}
?>

<!DOCTYPE>
<html>
<head>

<title>Add Subjects</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/dashboard.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<style>
body{
background-color: #ffffff;
}
.navbar-brand{
font-size: 1.5em;
color: blue;
}

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
<body>
<?php 
include_once("loginmand.php");
 ?>

<nav class="navbar navbar-inverse" role="navigation">
<div class="container">
<div class="navbar-header">

<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a href="home_thapar_university.php" class="navbar-brand">KNOCKCAMP</a>
</div>

<div class="collapse navbar-collapse" id="collapse">
</div>	
</div>

</nav>
 <div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 ">
            <br><br>
            <ul id="Side_Menu" class="nav nav-pills nav-stacked">
                <li  ><a href="notice_form.php"><span class="glyphicon glyphicon-list-alt"></span> Notice Board</a></li>
                <li ><a href="tut_form.php"><span class="glyphicon glyphicon-tasks"></span> Tutorials</a></li>
                                <li class="active" ><a href="addsubjects.php"><span class="glyphicon glyphicon-plus"></span> Add Subjects</a></li>
                                <li  ><a href="video_form.php"><span class="glyphicon glyphicon-film"></span>Videos</a></li>

                <li><a href="admin_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
<div class="container">
<div class="row">

<div class="col-md-6 col-md-offset-3">

<h4 style="border-bottom: 1px solid #c5c5c5;">
<i class="glyphicon glyphicon-plus text-primary">
</i>
Add Subjects
</h4>
<!--<ul class="nav navbar-nav ml-auto">-->


<div style="padding: 20px;" id="form-olvidado">
<form action="addsubjects.php" accept-charset="UTF-8" role="form" enctype="multipart/form-data"  method="post">
<fieldset>
<label>Enter the year</label>
<div class="form-group input-group">

<input list="year" style="width: 350px" class="form-control" placeholder="Year" name="year" type="text" required="" autofocus="">
<datalist id="year">
<option value="1st year ">
<option value="2nd year">
<option value="3rd year">
<option value="4th year">
</datalist>
</div>
<label>Enter the Branch/Group</label>
<div class="form-group input-group">

<input list="branch" style="width: 350px" class="form-control" placeholder="Branch" name="branch" type="text" required="" autofocus="">
<datalist id="branch">
<option value="CML">
<option value="COE">
<option value="CAG">
<option value="CIVIL">
<option value="CHEMICAL">
<option value="MECHANICAL">
<option value="MECHATRONICS">
<option value="MECH-PRODUCTION">
<option value="BIOTECHNOLOGY">
<option value="ELECTRICAL">
<option value="EIC">
<option value="ENC">
<option value="ELECTRONICS">
</datalist>

</div>
<label>Subjects</label>
<div class="form-group input-group">

<input  style="width: 350px" class="form-control" placeholder="Subjects" name="subjects" type="text" required="" autofocus="">
</div>
<br>

<div class="form-group">
<button type="submit" style="width: 100px" name="submit" class="btn btn-primary btn-block">
	Submit
</button>
</div>
</fieldset>
</form>
</div>

</div>
</div>
</div>
     </div>
     </div>
</body>

</html>
<?php
include 'footer.php';
?>

