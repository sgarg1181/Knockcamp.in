<!DOCTYPE html>
<html>
<head>
  <title>Societies</title>
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

  <title>Home</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <style>

    h1
    {
      text-shadow:5px 5px 10px black;
    }

    .footer-social { float: center; margin-top:5px;}
    .footer-social li {  display: inline;float:center;}
    .footer-social span {margin-left: 2 40px; }


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
    input{

      border-radius:5px;
    }
    .dropdown-submenu {
      position: relative;
    }






    {box-sizing: border-box}
    body {font-family: "Lato", sans-serif;
    background-color:#474040;}

    /* Style the tab */
    div.tab {
      float: left;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
      width: 30%;
      overflow-y: scroll;
      position: relative;
    }

    /* Style the buttons inside the tab */
    div.tab button {
      display: block;
      background-color: inherit;
      color: black;
      padding: 22px 16px;
      width: 100%;
      border: none;
      outline: none;
      text-align: left;
      cursor: pointer;
      transition: 0.3s;
      font-size: 17px;

    }

    /* Change background color of buttons on hover */
    div.tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current "tab button" class */
    div.tab button.active {
      background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
      float: left;
      padding: 0px 12px;

      width: 70%;
      border-left: none;
      justify-content: space-around;
    }
    h3
    {
      font-family: sans-serif;
      font-weight: bold; 
      font-size: 200%;
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
.btn-block {
  height: 30px !important;
  width: 39px !important;
}
.bg-light-gray {
  background-color:   #d9d9d9;
}

</style>
</head>
<body class ="bg-light-gray">

  <?php 
  include 'navigation.php';
  ?>
  

  <h1 align="center" style="color: black;"><strong>Socities</strong></h1>
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home_thapar_university.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Society</li>
      </ol>
  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'society-1')" id="defaultOpen">CCS</button>
    <button class="tablinks" onclick="openCity(event, 'society-2')">Entrepreneurship Development Cell(EDC)</button>
    <button class="tablinks" onclick="openCity(event, 'society-3')">Games and Sports</button>
    <button class="tablinks" onclick="openCity(event, 'society-4')">Literary Society</button>
    <button class="tablinks" onclick="openCity(event, 'society-5')">Music And Drama (MUDRA)</button>
    
    <button class="tablinks" onclick="openCity(event, 'society-49')">Saturnalia</button>
  </div>

  <div id="society-1" class="tabcontent">
    <h3 style="color: black;">CCS</h3>
    <img src="ccsimg.png" alt="ccs logo" style="vertical-align: middle; float: right; margin: .5em 1em 1em 1em; width:100px;height:100px">
    <p style="color: black;"><font size="+1.5" face="roboto">The Creative Computing Society, one of the most active & elite societies of Thapar University aims to garner creativity and talent & propagate awareness regarding various tech-related knowledge throughout the ingenious minds of Thapar and beyond. Creative Computing Society helped students in realizing their potential by providing them a platform where they could show their skills and also a platform for learning and increasing their technical skills.</font></p>

<form method="get" action="society.php">
     <a href="members1.php?team=Creative Computing Society&Page=1" class="btn btn-info btn-lg"><span>TEAM</span></a>
    <a href="members2.php?coreteam=Creative Computing Society&Page=1" class="btn btn-info btn-lg" ><span>CORE TEAM</span></a>
     <a href="events.php?society=Creative Computing Society&Page=1" class="btn btn-info btn-lg" ><span>Event Details</span></a>
     </form> 
    </div>

  <div id="society-2" class="tabcontent">
    <h3 style="color: black;">EDC</h3>
    <img src="edc.png" alt="edc logo" style="vertical-align: middle; float: right; margin: .5em 1em 1em 1em; width:100px;height:100px">
    <p style="color: black;"><font size="+1.5" face="roboto">Thapar University Entrepreneurship Development Cell, is a non-profit organization, completely run by T.U. students for helping future entrepreneurs and start-ups. It works very closely with the Venture Lab of Thapar University, Patiala.</font></p>


     <a href="members1.php?team=Entrepreneurship Development Cell&Page=1" class="btn btn-info btn-lg"><span>TEAM</span></a>
    <a href="members2.php?coreteam=Entrepreneurship Development Cell&Page=1" class="btn btn-info btn-lg" ><span>CORE TEAM</span></a>
     <a href="events.php?society=Entrepreneurship Development Cell&Page=1" class="btn btn-info btn-lg" ><span>Event Details</span></a>
    
  </div>

  <div id="society-3" class="tabcontent">
    <h3 style="color: black;">Games and Sports</h3>
    <img src="sa.png" alt="sa logo" style="vertical-align: middle; float: right; margin: .5em 1em 1em 1em; width:100px;height:100px">
    <p style="color: black;"><font size="+1.5" face="roboto">The University has several playgrounds and well-maintained athletic track to encourage the students to take part in different games such as Cricket, Hockey, Football, Basketball, Volleyball, Lawn Tennis and Badminton. The University also boasts of a Gymnasium-cum-Badminton Hall and a Swimming Pool Complex equipped with all modern facilities. The sports department organizes various sporting events like ‘Thaparlympics’, ‘URJA’ etc.</font></p>

     <a href="members1.php?team=Games and Sports&Page=1" class="btn btn-info btn-lg"><span>TEAM</span></a>
    <a href="members2.php?coreteam=Games and Sports&Page=1" class="btn btn-info btn-lg" ><span>CORE TEAM</span></a>
     <a href="events.php?society=Games and Sports&Page=1" class="btn btn-info btn-lg" ><span>Event Details</span></a>
     </div>

  <div id="society-4" class="tabcontent">
    <h3 style="color: black;">Literary Society</h3>
    <img src="lit.png" alt="lit logo" style="vertical-align: middle; float: right; margin: .5em 1em 1em 1em; width:100px;height:100px">
    <p style="color: black;"><font size="+1.5" face="roboto">Literary Society has been formed with the objective to hone literary skills, improve oratorical, communication and subliminal skills. This Society also brings out the yearly Institute magazine ‘Avant Garde’ Major Activities: ACUMEN (Inter hostel competitions), Debates, Script writing, ELIXIR (the Inter year literary festival), Choreography, Poetry, Group Discussions, Quizzes, etc.</font></p>
    <a href="members1.php?team=Literary Society&Page=1" class="btn btn-info btn-lg"><span>TEAM</span></a>
    <a href="members2.php?coreteam=Literary Society&Page=1" class="btn btn-info btn-lg" ><span>CORE TEAM</span></a>
     <a href="events.php?society=Literary Society&Page=1" class="btn btn-info btn-lg" ><span>Event Details</span></a>
      </div>
  <div id="society-5" class="tabcontent">
    <h3 style="color: black;">MUDRA</h3>
    <img src="mudra.png" alt="mudra logo" style="vertical-align: middle; float: right; margin: .5em 1em 1em 1em; width:100px;height:100px">
    <p style="color: black;"><font size="+1.5" face="roboto">The objective of this society is to hone the extra-curricular skills of students in the area of Music, Dramatics, Theatre and developing managerial prowess contributing towards their overall personality. It organizes several big events such as MUDRA night and Izhaar etc.</font></p>
  <a href="members1.php?team=MUDRA&Page=1" class="btn btn-info btn-lg"><span>TEAM</span></a>
    <a href="members2.php?coreteam=MUDRA&Page=1" class="btn btn-info btn-lg" ><span>CORE TEAM</span></a>
     <a href="events.php?society=MUDRA&Page=1" class="btn btn-info btn-lg" ><span>Event Details</span></a>
      </div>
  
  <div id="society-49" class="tabcontent">
    <h3 style="color: black;">Saturnalia</h3>
    <img src="sat.jpg" alt="sat logo" style="vertical-align: middle; float: right; margin: .5em 1em 1em 1em; width:100px;height:100px">
    <p style="color: black;"><font size="+1.5" face="roboto">Saturnalia is the annual Techno-Cultural Festival of Thapar University, Patiala and one of the largest fest in North India. The fest has a footfall of more than 15k people and an online reach of more than 1 lac The fest will take place on Nov 10-12, 2017.</font></p>
   <a href="members1.php?team=Saturnalia&Page=1" class="btn btn-info btn-lg"><span>TEAM</span></a>
    <a href="members2.php?coreteam=Saturnalia&Page=1" class="btn btn-info btn-lg" ><span>CORE TEAM</span></a>
     <a href="events.php?society=Saturnalia&Page=1" class="btn btn-info btn-lg" ><span>Event Details</span></a>

  </div>

  <script>
    function openCity(evt, SName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(SName).style.display = "block";
      evt.currentTarget.className += " active";
    }

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
var topNavBar = 50;
var footer = 48;
var height = $(window).height();
$('.tab').css('height', (height - (topNavBar+footer)));

$(window).resize(function(){
  var height = $(window).height();
  $('.tab').css('height', (height - (topNavBar+footer)));
});
</script>

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
