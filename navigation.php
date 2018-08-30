 <nav class="navbar navbar-default  navbar-expand-lg navbar-dark bg-dark relative-top" style="margin-top: -60px">
  <div class="container">
    <a class="navbar-brand" href="home_thapar_university.php">KNOCKCAMP</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item" >
          <a class="nav-link" href="home_thapar_university.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="videos.php">Videos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="events.php?Page=1">Events</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="test" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
            Tutorials
          </a>
          
          <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="navbarDropdownPortfolio">
          
           <li class="dropdown dropdown-submenu">
            <a class="dropdown-item" data-toggle="dropdown" href="#">1st Year<i class="ion-chevron-right"></i></a>

            <ul class="dropdown-menu">
                <?php 
                $connection=mysqli_connect('localhost','root','','knockcamp');
                $sql= "select Distinct branch from subjects where year='1st Year'";
                $execute=mysqli_query($connection,$sql);
                while($rows=mysqli_fetch_array($execute))
                {
                    $branch=$rows['branch'];
                    ?>
              <li><a class="dropdown-item" href="subjects.php?branch=<?php echo $branch; ?>&year=1st Year"><?php echo $branch; ?></a></li>
            <?php
                }
                ?>

               </ul>
          </li>
          
          
          <li class="dropdown dropdown-submenu">
            <a class="dropdown-item" data-toggle="dropdown" href="#">2nd Year<i class="ion-chevron-right"></i></a>
            <ul class="dropdown-menu">
             <?php 
                $connection=mysqli_connect('localhost','root','','knockcamp');
                $sql= "select Distinct branch from subjects where year='2nd Year'";
                $execute=mysqli_query($connection,$sql);
                while($rows=mysqli_fetch_array($execute))
                {
                    $branch=$rows['branch'];
                    ?>
              <li><a class="dropdown-item" href="subjects.php?branch=<?php echo $branch; ?>&year=2nd Year"><?php echo $branch; ?></a></li>
            <?php
                }
                ?>
        </ul>
         </li>
         

         
         <li class="dropdown dropdown-submenu">
          <a class="dropdown-item" data-toggle="dropdown" href="#">3rd Year<i class="ion-chevron-right"></i></a>
          <ul class="dropdown-menu">
            <?php 
                $connection=mysqli_connect('localhost','root','','knockcamp');
                $sql= "select Distinct branch from subjects where year='3rd Year'";
                $execute=mysqli_query($connection,$sql);
                while($rows=mysqli_fetch_array($execute))
                {
                    $branch=$rows['branch'];
                    ?>
              <li><a class="dropdown-item" href="subjects.php?branch=<?php echo $branch; ?>&year=3rd Year"><?php echo $branch; ?></a></li>
            <?php
                }
                ?>
</ul>
        </li>
       

        
        <li class="dropdown dropdown-submenu">
          <a class="dropdown-item" data-toggle="dropdown" href="#">4th Year<i class="ion-chevron-right"></i></a>
          <ul class="dropdown-menu">
        <?php 
                $connection=mysqli_connect('localhost','root','','knockcamp');
                $sql= "select Distinct branch from subjects where year='4th Year'";
                $execute=mysqli_query($connection,$sql);
                while($rows=mysqli_fetch_array($execute))
                {
                    $branch=$rows['branch'];
                    ?>
              <li><a class="dropdown-item" href="subjects.php?branch=<?php echo $branch; ?>&year=4th Year"><?php echo $branch; ?></a></li>
            <?php
                }
                ?>  </ul>
        </li>

        

        </ul>

      </li>



      <li class="nav-item dropdown">
        <a class="nav-link " href="interview.php?Page=1" aria-haspopup="true" aria-expanded="false">
          Interviews
        </a>
        
      </li>
     
      <!--<li class="nav-item dropdown">
        <a class="nav-link " href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gallery
        </a>
       
      </li>-->
      <li class="nav-item">
        <a class="nav-link" href="notice_board.php">Notice Board</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="society.php">Society</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact_us.php">Contact Us</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="student_admin.php">Admin login</a>
      </li>
    </ul>
  </div>
</div>
</nav>
