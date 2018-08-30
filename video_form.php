
<?php
//signup    

include 'Include/dbconnect.php';

if (isset($_POST['submit']) ) {
$title=mysqli_real_escape_string($con_ser,$_POST['year']);
$link=mysqli_real_escape_string($con_ser,$_POST['branch']);	
$fileExistsFlag = 0; 
	$fileName = $_FILES['Filename']['name'];
	//$link = mysqli_connect("localhost","root","","fileupload") or die("Error ".mysqli_error($link));''
	$query = "SELECT filename FROM video_form WHERE filename='$fileName'";	
	$result = mysqli_query($con_ser, $query);
	while($row = mysqli_fetch_array($result)) {
		if($row['filename'] == $fileName) {
			$fileExistsFlag = 1;
		}		
	}
	/*
	* 	If file is not present in the destination folder
	*/
	if($fileExistsFlag == 0) { 

if(!is_dir("vidimg/"))
 {
   mkdir("vidimg/");   
 }
		$target = "vidimg/";		
		$fileTarget = $target.$fileName;	
		$tempFileName = $_FILES["Filename"]["tmp_name"];
		$root = getcwd();
		$result1 = move_uploaded_file($tempFileName,$root."/".$fileTarget);
		/*
		*	If file was successfully uploaded in the destination
		*/
		if($result1) { 
			echo "Your file <html><b><i>".$fileName."</i></b></html> has been successfully uploaded";		
			 $query2 = "INSERT INTO video_form(id,link,title,filepath,filename) VALUES ('','$link','$title' ,'$fileTarget','$fileName')";
			$result2= mysqli_query($con_ser, $query2);	
			if($result2){
			$msg1= "You have successfully posted notice!";
			echo "<script type='text/javascript'>alert('$msg1');</script>";}
		
		}
		else {			
			echo "Sorry !!! There was an error in uploading your file";			
		}
	}
	/*
	* 	If file is already present in the destination folder
	*/
	else {
		echo "File <html><b><i>".$fileName."</i></b></html> already exists in your folder. Please rename the file and try again.";
	}	
}
?>


<!DOCTYPE>
<html>
<head>

<title>VIDEOS</title>
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
                                <li ><a href="addsubjects.php"><span class="glyphicon glyphicon-plus"></span> Add Subjects</a></li>
<li class="active"><a href="video_form.php"><span class="glyphicon glyphicon-tasks"></span> Videos</a></li>
                <li><a href="log_out.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>

<div class="container">
<div class="row">

<div class="col-md-6 col-md-offset-3">

<h4 style="border-bottom: 1px solid #c5c5c5;">
<i class="glyphicon glyphicon-list text-primary">
</i>
VIDEOS</h4>
<!--<ul class="nav navbar-nav ml-auto">-->


<div style="padding: 20px;" id="form-olvidado">
<form action="video_form.php" accept-charset="UTF-8" role="form" enctype="multipart/form-data"  method="post">
<fieldset>
<label>Enter the title</label>
<div class="form-group input-group">

<input  style="width: 350px" class="form-control" placeholder="title" name="year" type="text" required="" autofocus="">
</div>
<label>Enter the link</label>
<div class="form-group input-group">

<input  style="width: 350px" class="form-control" placeholder="link" name="branch" type="text" required="" autofocus="">

</div>
<label>Upload the pic  of tech(if any)</label>
<div>
<input type="file" name="Filename">

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
