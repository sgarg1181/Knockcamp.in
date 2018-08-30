<?php
include 'Include/dbconnect.php';

if (isset($_POST['submit'])) {

   $company_name=mysqli_real_escape_string($con_ser,$_POST['company_name']);
   $author_name=mysqli_real_escape_string($con_ser,$_POST['author_name']);
   $experience=mysqli_real_escape_string($con_ser,$_POST['experience']);
  
   
    $query = "INSERT INTO interview (id, company_name, author_name, experience) 
    VALUES('', '$company_name', '$author_name', '$experience')";
    
    mysqli_query($con_ser, $query);
     $msg1= "Thanks for sharing experience!";
        echo "<script type='text/javascript'>alert('$msg1');</script>";

include_once("admin_logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Experience</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
.bs-example{
   margin: 20px;
}
</style>
</head>
<body>
  <?php
  include 'loginmand.php';
  ?>
	<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
      <div class="navbar-header">

<a href="home_thapar_university.php" class="navbar-brand">KNOCKCAMP</a>
      </div>
        <div class="collapse navbar-collapse" id="collapse">
        </div> 
      </div>
    </nav>
<div class="bs-example">
<form action="experience_form.php" method="post">
<div class="form-group">
<label for="companyName">Company Name</label>
<input type="text" style="width: 300px" class="form-control" id="company_name" name="company_name" placeholder="Company Name" required>
</div>
<div class="form-group">
<label for="authorName">Author Name</label>
<input type="text" style="width: 300px" class="form-control" id="author_name" name="author_name" placeholder="Author Name" required>
</div>
<label for="eperience">Experience</label>
<div class="form-group">

<textarea rows="8" cols="100" name="experience" id="experience" placeholder="Write your eperience..."></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>   
<?php
include 'footer.php';
?>                         