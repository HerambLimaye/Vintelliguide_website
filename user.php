<?php

session_start();

require_once "pdo.php";

// Demand a GET parameter
if ( ! isset($_SESSION['username']) || strlen($_SESSION['username']) < 1  ) {
    die('Name parameter missing');
}

if(isset($_POST['search']) && isset($_POST['placename'])){
 $stmt = $pdo->query("SELECT place.place_name, category.name,category.category_id
  FROM place JOIN member JOIN category
  ON member.place_id = place.place_id
    AND member.category_id = category.category_id");
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
	if($_POST['placename']==$row['place_name'] && ($_POST['categories']==$row['category_id'] || $_POST['categories']==0)){
		header('Location: '.$row['place_name'].'.html');
		return;
	}
}
$_SESSION['nf']="place not found";
header('Location: user.php');
return;
}

if(isset($_SESSION['username'])){
  $stmtb = $pdo->prepare('SELECT * FROM user_info WHERE username=:urnm');
  $stmtb->execute(array(
	  ':urnm' => $_SESSION['username'])
	);
  $rowb = $stmtb->fetchAll(PDO::FETCH_ASSOC);
  $_SESSION['rr']=$rowb;
}

 ?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="images/v-icon.png">

<title>Vintelliguide User Page</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
      rel="stylesheet"
    />

<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/user.css">
<script src="js/userfirst.js"></script>


</head>



<body>

<header class="headerrr fixed-top">

<img src="images/tlogo1.png" alt="logo">

<nav class="navbar navbar-expand-lg navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">

<button type="button" class="navbar-toggler d-flex" data-toggle="collapse" data-target="#myNavbar" onclick="headerchange()">
       &#9776;
      </button>

</div>

 <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
<li><a href="#search" class="nav-link nav-tabs navss">Search</a></li>
<li><a href="#preferredDest" class="nav-link nav-tabs navss">Preferred</a></li>
<li><a href="#bestDestinations" class="nav-link nav-tabs navss">Popular Destinations</a></li>
<li><a href="#reviews" class="nav-link nav-tabs navss">Review</a></li>
<li><a href="#aboutUs" class="nav-link nav-tabs navss">About Us</a></li>
<li><a href="logout.php" target="_parent"><button class="btn">Logout</button></a></li>
</ul>
</div>
</div>

</nav>



</header>


<section id="usernameSpecifier">
<p>
Welcome , <span id="usernameShower"><?php echo htmlentities($_SESSION['username']);?></span>
</p>
</section>


<section id="search" class="srhsec">
<div>
<div>
<h1>VintelliGuide</h1>
</div>
<p align="center" style="color:red;background:white;">
  <?php
  if(isset($_SESSION['nf'])){
  echo $_SESSION['nf'];
  unset($_SESSION['nf']);
}
?>
</p>
<form method="post">

<select name="categories" id="categorySelect" class="categoryIn">
  <option value=0>All Categories</option>
  <option value=1>Historical</option>
  <option value=2>Hill Stations</option>
  <option value=3>Honeymoon</option>
  <option value=4>National parks</option>
  <option value=5>Beaches</option>
  <option value=6>Waterfalls</option>
  <option value=7>National Heritages</option>
  <option value=8>Metro cities</option>
</select>

<input type="text" id="placeName" name="placename" placeholder="Destination" class="placeIn ">
<button name="search" class="srhbtn btn">Search Place</button>
</form>
</div>
</section>


<section id="preferredDest" class="dest">

<h2 align="center">Preferred Desitnations</h2>

<div class="container">
<div class="row">

<?php
if(isset($rowb[0]['cat_3'])){

 $stmtc = $pdo->prepare('SELECT * FROM place WHERE category_id=:rb LIMIT 2');
 $stmtc->execute(array(
   ':rb' => $rowb[0]['cat_1'])
 );

 $rowsc = $stmtc->fetchAll(PDO::FETCH_ASSOC);
foreach ($rowsc as $rowc) {
  $rcb=$rowc['place_name'];
  echo
  '<div class="col-md-4">
  <div class="card h-100">
  <a href='.rawurlencode($rcb).'.html>
  <img src="images/'.$rowc['place_name'].'.jpg" alt="'.$rowc['place_name'].'">
  <h4>'.$rowc['place_name'].'</h4>
  </a>
  </div>
  </div>';
}


$stmtc = $pdo->prepare('SELECT * FROM place WHERE category_id=:rba LIMIT 2');
$stmtc->execute(array(
  ':rba' => $rowb[0]['cat_2'])
);

$rowsc = $stmtc->fetchAll(PDO::FETCH_ASSOC);
foreach ($rowsc as $rowc) {
 echo
 '<div class="col-md-4">
 <div class="card h-100">
 <a href='.rawurlencode($rowc['place_name']).'.html>
 <img src="images/'.$rowc['place_name'].'.jpg" alt="'.$rowc['place_name'].'">
 <h4>'.$rowc['place_name'].'</h4>
 </a>
 </div>
 </div>';
}


$stmtc = $pdo->prepare('SELECT * FROM place WHERE category_id=:rbb LIMIT 2');
$stmtc->execute(array(
  ':rbb' => $rowb[0]['cat_3'])
);

$rowsc = $stmtc->fetchAll(PDO::FETCH_ASSOC);
foreach ($rowsc as $rowc) {
 echo
 '<div class="col-md-4">
 <div class="card h-100">
 <a href='.rawurlencode($rowc['place_name']).'.html>
 <img src="images/'.$rowc['place_name'].'.jpg" alt="'.$rowc['place_name'].'">
 <h4>'.$rowc['place_name'].'</h4>
 </a>
 </div>
 </div>';
}

}

else if(isset($rowb[0]['cat_2'])){

  $stmtc = $pdo->prepare('SELECT * FROM place WHERE category_id=:rb LIMIT 3');
  $stmtc->execute(array(
    ':rb' => $rowb[0]['cat_1'])
  );

  $rowsc = $stmtc->fetchAll(PDO::FETCH_ASSOC);
 foreach ($rowsc as $rowc) {
   $rcb=$rowc['place_name'];
   echo
   '<div class="col-md-4">
   <div class="card h-100">
   <a href='.rawurlencode($rcb).'.html>
   <img src="images/'.$rowc['place_name'].'.jpg" alt="'.$rowc['place_name'].'">
   <h4>'.$rowc['place_name'].'</h4>
   </a>
   </div>
   </div>';
 }


 $stmtc = $pdo->prepare('SELECT * FROM place WHERE category_id=:rb LIMIT 3');
 $stmtc->execute(array(
   ':rb' => $rowb[0]['cat_2'])
 );

 $rowsc = $stmtc->fetchAll(PDO::FETCH_ASSOC);
 foreach ($rowsc as $rowc) {
  $rcb=$rowc['place_name'];
  echo
  '<div class="col-md-4">
  <div class="card h-100">
  <a href='.rawurlencode($rcb).'.html>
  <img src="images/'.$rowc['place_name'].'.jpg" alt="'.$rowc['place_name'].'">
  <h4>'.$rowc['place_name'].'</h4>
  </a>
  </div>
  </div>';
 }

}

else if(isset($rowb[0]['cat_1'])){

  $stmtc = $pdo->prepare('SELECT * FROM place WHERE category_id=:rb LIMIT 6');
  $stmtc->execute(array(
    ':rb' => $rowb[0]['cat_1'])
  );

  $rowsc = $stmtc->fetchAll(PDO::FETCH_ASSOC);
  foreach ($rowsc as $rowc) {
   $rcb=$rowc['place_name'];
   echo
   '<div class="col-md-4">
   <div class="card h-100">
   <a href='.rawurlencode($rcb).'.html>
   <img src="images/'.$rowc['place_name'].'.jpg" alt="'.$rowc['place_name'].'">
   <h4>'.$rowc['place_name'].'</h4>
   </a>
   </div>
   </div>';
  }

}

else{
  echo
  '<div class="col-md-4">
  <div class="card h-100">
  <a href="dudhsagar.html">
  <img src="images/dudhsagar2.jpg" alt="agra">
  <h4>DUDHSAGAR</h4>
  </a>
  </div>
  </div>

  <div class="col-md-4">
  <div class="card h-100">
  <a href="gir.html">
  <img src="images/gir1.jpg" alt="shimla">
  <h4>GIR</h4>
  </a>
  </div>
  </div>

  <div class="col-md-4">
  <div class="card h-100">
  <a href="manali.html">
  <img src="images/manali2.jpg" alt="kerala">
  <h4>MANALI</h4>
  </a>
  </div>
  </div>

  <div class="col-md-4">
  <div class="card h-100" >
  <a href="taj mahal.html">
  <img src="images/taj1.jpg" alt="jaipur">
  <h4>TAJMAHAL</h4>
  </a>
  </div>
  </div>

  <div class="col-md-4">
  <div class="card h-100">
  <a href="varkala.html">
  <img src="images/varkala1.jpg" alt="darjeeling">
  <h4>VARKALA</h4>
  </a>
  </div>
  </div>

  <div class="col-md-4">
  <div class="card h-100">
  <a href="goa.html">
  <img src="images/goa.jpg" alt="goa">
  <h4>GOA</h4>
  </a>
  </div>
  </div> ';
}
?>


</div>
</div>

</section>


<section id="bestDestinations" class="dest">

<h2 align="center">Most Popular Destination</h2>

<div class="container">
<div class="row">

<div class="col-md-4">
<div class="card h-100">
  <a href="Agra.html" >
<img src="images/agra.jpg" alt="agra">
<h4>AGRA</h4>
</a>
</div>
</div>

<div class="col-md-4">
<div class="card h-100">
  <a href="Shimla.html" >
<img src="images/shimla.jpg" alt="shimla">
<h4>SHIMLA</h4>
</a>
</div>
</div>

<div class="col-md-4">
<div class="card h-100">
  <a href="Kerala Backwater.html" >
<img src="images/kerala.jpg" alt="kerala">
<h4>KERALA BACKWATERS</h4>
</a>
</div>
</div>

<div class="col-md-4">
<div class="card h-100" >
  <a href="jaipur.html">
<img src="images/jaipur.jpg" alt="jaipur">
<h4>JAIPUR</h4>
</a>
</div>
</div>

<div class="col-md-4">
<div class="card h-100">
  	<a href="Darjeeling.html">
<img src="images/darjeeling.jpg" alt="darjeeling">
<h4>DARJEELING</h4>
</a>
</div>
</div>

<div class="col-md-4">
<div class="card h-100">
  <a href="Goa.html">
<img src="images/goa.jpg" alt="goa">
<h4>GOA</h4>
</a>
</div>
</div>

</div>
</div>

</section>

<section id="reviews">

<h2 align="center" class="revi">Reviews</h2>

<div class="container">
<div class="row">

<div class="col-sm-6">
<h4>Mayuri Gosavi</h4>
<h5>Agra</h5>
<p>"A serene place with the most richest of Indian and Mughal History.Proud to be Indian after seeing Taj Mahal,one of seven wonders."</p>
</div>

<div class="col-sm-6">
<h4>Aditi Sahasane</h4>
<h5>Mahabaleshwar</h5>
<p>"Our own Switzerland!!A place to must visit atleast once in lifetime"</p>
</div>

<div class="col-sm-6">
<h4>Ayushi Bhagat</h4>
<h5>Goa</h5>
<p>"Made me feel young again,like when I was in my twenties.The energy and lifestyle here is phenomenal."</p>
</div>

<div class="col-sm-6">
<h4>Heramba Limaye</h4>
<h5>Darjeeling</h5>
<p>"The freshness of the tea leaves is always in the air giving soothing and energizing vibes.I am taking 10Kg of tea packets home! ;)</p>
</div>

</div>
</div>

</section>


<section id="events">

<h2 align="center" class="revi">INDIAN EVENTS</h2>

<div class="container">
<div class="row justify-content-center">

<div class="col-10">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
   <div class="carousel-item active">
		 <a href="https://en.wikipedia.org/wiki/Carnival_in_Goa" target="_blank">
      <img class="d-block w-100 img-thumbnail" src="images/goaCarnival.jpg" alt="First slide">
			<div class="carousel-caption d-none d-md-block">
    <h5>GOA CARNIVAL</h5>
    	</div>
		</a>
    </div>

    <div class="carousel-item img-thumbnail">
			<a href="https://en.wikipedia.org/wiki/Kumbh_Mela" target="_blank">
      <img class="d-block w-100" src="images/kumbh.jpg" alt="Second slide">
			<div class="carousel-caption d-none d-md-block">
    <h5>KUMBHA MELA</h5>
	</div>
</a>
    </div>

    <div class="carousel-item img-thumbnail">
			<a href="https://en.wikipedia.org/wiki/Delhi_Republic_Day_parade" target="_blank">
      <img class="d-block w-100" src="images/RepublicDayParade.jpg" alt="Third slide">
			<div class="carousel-caption d-none d-md-block">
    <h5>REPUBLIC DAY PARADE</h5>
    	</div>
		</a>
    </div>
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

</div>
</div>
</div>

</section>


<footer id="aboutUs">

<div>
<img src="images/tlogo1.png" alt="logo">
</div>

<div id="address">
<h6>Address</h6>
<p>
1st floor,Twin Tower,<br>
Powai,Mumbai,<br>
Maharashtra,India.<br>
Pincode: 400 210
</p>
</div>

<div id="contactUs">
Phone : **********
<br>
Mail : vintelliguides@gmail.com
</div>

<div id="socialMedia">
 <div class="social_links">
                                <ul class="nav nav-tabs nav-fill">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-square sze icon1"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter-square sze"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="instagram">
                                            <i class="fab fa-instagram sze"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="youtube">
                                            <i class="fab fa-youtube sze"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>


</div>
<br>
<br>
<br>
<br>
<div id="cright">
<p align="center">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved and owned by Vintelliguides ltd.</p>
</div>

</footer>


<script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
showSlides(slideIndex = n);
}

function showSlides(n) {
var i;
var slides = document.getElementsByClassName("mySlides");
var dots = document.getElementsByClassName("dot");
if (n > slides.length) {slideIndex = 1}
if (n < 1) {slideIndex = slides.length}
for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
}
for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
}
slides[slideIndex-1].style.display = "block";
dots[slideIndex-1].className += " active";
}
	 </script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
