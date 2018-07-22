<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair Display SC  " rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Jura  " rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script>
//This is to prevent any jQuery code from running before the document is finished loading (is ready).
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='home.html']").on('click', function(event) {

   // Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
      });
    } // End if
  });
})
</script>


</head>



 <style>
.jumbotron 
{
    background-color: dodgerblue; 
    color: white;
	height : 200px ;
	padding: 40px 24px;
}

body
{
	font-family:Jura ;
}

p
{
	text-align : center ;
	font-size : 60px ;
}
.heading
{
	text-align : center ;
font-family : Playfair Display SC   ;
}

small
{
	font-size : 20px ;
}

.bg-grey {
    background-color: #f6f6f6;
	color: black ;
    margin:0px;
}

.container-fluid {
    padding: 60px 50px;
	margin: 0px;
	color: black ;
}

footer {
	text-align : center ;
	margin : left;
	color : black ;	
}

 .logo-small {
      color: black;
      font-size: 50px;
  }
  .logo {
      color: black;
      font-size: 200px;
  }

.navbar {
    margin-bottom: 0;
    background-color: dodgerblue;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
}

.navbar li a, .navbar .navbar-brand {
    color: white !important;
}

.navbar-nav li a:hover, .navbar-nav li.active a {
    color: dodgerblue !important;
    background-color: #fff !important;
}

.navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
}

.thumbnail {
    padding: 0 0 15px 0;
    border: none;
    margin-left: 0px;
    margin-right : 0px ;
    border-radius: 0;
}

.thumbnail img {
    width: 100%;
    height: 100%;
    margin-bottom: 0px;
}

.thumbnail1 {
    padding: 0 0 15px 0;
    border-style : solid ;
    border-radius: 5px;
}

.thumbnail2 {
    padding: 0 0 15px 0;
    border-style : solid ;
    border-radius: 5px;
}

.thumbnail1 img {
    width: 100%;
    height: 280px;
}

.thumbnail2 img {
    width: 100%;
    height: 280px;
}

 @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin-left: 0px ;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }

</style>

<body id="myPage" style="background:url('images/backgroundimg.jpeg') ; data-spy="scroll" data-target=".navbar" data-offset="60">

 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="projects.php">PROJECTS</a></li>
	<li><a href="generalawareness.php">GENERAL AWARENESS</a></li>
	<li><a href="#statistics">STATISTICS</a></li>
 	<li><a href="#login">LOGIN</a></li>	
        <li><a href="#contact">CONTACT</a></li>
      </ul>
    </div>
  </div>
</nav> 

<div class="jumbotron">
<p>
	<img src="./vcarelogo.jpg" alt="LOGO" height=150px width=270px align=left>
	<div class="heading">
 	
	<h2><b> V Care Cancer Foundation </b> </h2> <br>
    	<small>"Together we can and we will conquer cancer"</small>
	</div>
</p>
</div>

<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
  <h1><b>About us</b></h1><br>
  <h4>V Care nourishes a cancer patient's mind and spirit. <br> It is a voluntary support. V Care works meaningfully and diligently with all its stakeholders, patients, doctors, nurses, hospital administrative staff, indivusual donors, corporates, charitable trusts, social organizations, NGOs, similar international and national organizations, and above all, its volunteers.</h4>
    </div>
    <div>
      <p><input type="button" class="btn btn-info" value="Admin Login"></p>
      <p><input type="button" class="btn btn-info" value="Volunteer Login"></p>
      <p><input type="button" class="btn btn-info" value="Donor Login"></p>
      </div>
  </div>
</div>






<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <img src="http://workpower.com.au/wp-content/uploads/2015/06/Values-logo.png" alt="our values">
    </div>

    <div class="col-sm-1">
    </div>
    
    <div class="col-sm-7">
      <h1><b>Our Values</b></h1><br>

      <h4>
	<strong>MISSION :</strong> A V Care foundation is a voluntraysupport group dedicated to providing free help, hope, awareness and education to cancer patients and their families through outreach programs and services that improve the quality of their lives.<br><br>
	<strong>VISION:</strong> Together we can and we will conquer the cancer.<br><br>
      </h4>
     </div>
  </div>

</div>



<div id="contact" class="container-fluid">
<h1><b>Contact Us</b></h1>
  <div class="row">

 <div class="col-sm-7">
      <h4> <br><br>
      <span class="glyphicon glyphicon-map-marker"></span> A-102, Om Residency, J.W.Road, Near Tata memorial Hospital <br>
							   Opposite Bhoiwada Court, Parel, Mumbai-12<br>
      <span class="glyphicon glyphicon-phone"></span> 9821949401 <br>
      <span class="glyphicon glyphicon-envelope"></span> Email admin@vcare.org <br>

	<a href="locationmap.html"><button type="onClick">VIEW ON GOOGLE MAP</button></a>
	
	</div> 
  </div>




</body> 
</html>


