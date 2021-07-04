<?php
session_start();

require_once "pdo.php";

if ( ! isset($_SESSION['username']) || strlen($_SESSION['username']) < 1  ) {
    die('Username parameter missing');
}

if(isset($_POST['kycDone'])){

	if(isset($_POST['email'])){
		$stmt = $pdo->prepare('UPDATE user_info SET
		  email=:em WHERE username=:usern');

		$stmt->execute(array(
		  ':em' => $_POST['email'],
		  ':usern' => $_SESSION['username'])
		);
	}

	if(isset($_POST['ageRadios'])){
		$stmt = $pdo->prepare('UPDATE user_info SET
		  age_group=:ar WHERE username=:usern');

		$stmt->execute(array(
		  ':ar' => $_POST['ageRadios'],
		  ':usern' => $_SESSION['username'])
		);
	}

	if(isset($_POST['workRadios'])){
		$stmt = $pdo->prepare('UPDATE user_info SET
		  work=:wr WHERE username=:usern');

		$stmt->execute(array(
		  ':wr' => $_POST['workRadios'],
		  ':usern' => $_SESSION['username'])
		);
	}

	if(isset($_POST['partnerRadios'])){
		$stmt = $pdo->prepare('UPDATE user_info SET
		  partner=:pr WHERE username=:usern');

		$stmt->execute(array(
		  ':pr' => $_POST['partnerRadios'],
		  ':usern' => $_SESSION['username'])
		);
	}

	if(isset($_POST['nationality'])){
		$stmt = $pdo->prepare('UPDATE user_info SET
		  nationality=:nat WHERE username=:usern');

		$stmt->execute(array(
		  ':nat' => $_POST['nationality'],
		  ':usern' => $_SESSION['username'])
		);
	}

	if(isset($_POST['residence'])){
		$stmt = $pdo->prepare('UPDATE user_info SET
		  residence=:res WHERE username=:usern');

		$stmt->execute(array(
		  ':res' => $_POST['residence'],
		  ':usern' => $_SESSION['username'])
		);
	}

	if(isset($_POST['destCategories'][0])){
		$stmt = $pdo->prepare('UPDATE user_info SET
		  cat_1=:ca1 WHERE username=:usern');

		$stmt->execute(array(
		  ':ca1' => $_POST['destCategories'][0],
		  ':usern' => $_SESSION['username'])
		);
	}

	if(isset($_POST['destCategories'][1])){
		$stmt = $pdo->prepare('UPDATE user_info SET
		  cat_2=:ca2 WHERE username=:usern');

		$stmt->execute(array(
		  ':ca2' => $_POST['destCategories'][1],
		  ':usern' => $_SESSION['username'])
		);
	}

	if(isset($_POST['destCategories'][2])){
		$stmt = $pdo->prepare('UPDATE user_info SET
		  cat_3=:ca3 WHERE username=:usern');

		$stmt->execute(array(
		  ':ca3' => $_POST['destCategories'][2],
		  ':usern' => $_SESSION['username'])
		);
	}

	header('Location: user.php');
	return;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="images/v-icon.png">

<title>Vintelliguide KYC Page</title>

<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="css/kyc.css">



</head>
<body>

<h1>VGuides KYC</h1>

<p>Hello dear <b><?php echo htmlentities($_SESSION['username']); ?></b>!!!We are excited to have you with us.Please  tell us a little about yourself,so that we can give the best experience :)</p>

<h3>OPEN UP A BIT!</h3>
<br>

<div>
<form name="form1" method="post">

  <div class="form-group">
    <label for="InputEmail"><h5>Email address</h5></label>
    <input type="email" class="form-control textt" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

 <div class="form-group">
 <h5>Please select your age group</h5><br>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="ageRadios" id="ageRadios1" value=1>
  <label class="form-check-label" for="ageRadios1">
    Less than 20 years old
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="ageRadios" id="ageRadios2" value=2 checked>
  <label class="form-check-label" for="ageRadios2">
    20 to 30 years old
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="ageRadios" id="ageRadios3" value=3>
  <label class="form-check-label" for="ageRadios3">
    30 to 50 years old
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="ageRadios" id="ageRadios4" value=4>
  <label class="form-check-label" for="ageRadios4">
    More than 50 years old
  </label>
</div>
</div>

<div class="form-group">
<h5>What is your current working status?</h5>
<div class="form-check">
  <input class="form-check-input" type="radio" name="workRadios" id="workRadios1" value=1>
  <label class="form-check-label" for="workRadios1">
    Student
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="workRadios" id="workRadios2" value=2 checked>
  <label class="form-check-label" for="workRadios2">
    Working/entrepreneur class
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="workRadios" id="workRadios3" value=3>
  <label class="form-check-label" for="workRadios3">
    Retired/on break
  </label>
</div>
</div>

<div class="form-group">
<h5>With whom do you generally travel?</h5>
<div class="form-check">
  <input class="form-check-input" type="radio" name="partnerRadios" id="partnerRadios1" value=1>
  <label class="form-check-label" for="partnerRadios1">
    SOLO
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="partnerRadios" id="partnerRadios2" value=2 checked>
  <label class="form-check-label" for="partnerRadios2">
    Couple/spouse
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="partnerRadios" id="partnerRadios3" value=3>
  <label class="form-check-label" for="partnerRadios3">
    Friends
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="partnerRadios" id="partnerRadios4" value=4>
  <label class="form-check-label" for="partnerRadios4">
    Family
  </label>
</div>
</div>

<div class="form-group">
    <label for="inputNationality"><h5>Nationality</h5></label>
    <input type="text" class="form-control textt" id="inputNationality" aria-describedby="yourCountry" placeholder="Your Nationality"  name="nationality">
  </div>

<div class="form-group">
    <label for="inputResidency"><h5>Residence City</h5></label>
    <input type="text" class="form-control textt" id="inputResidency" aria-describedby="yourCity" placeholder="Enter city of Residence"  name="residence">
  </div>

<div class="form-group">
<h5>Interested Traveling Categories</h5>
  <small id="categoryHelp" class="form-text text-muted">Maximum 3 categories of interest can be selected.</small>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value=1 id="Check1" name="destCategories[]" checked >
  <label class="form-check-label" for="Check1">
    Historical
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value=2 id="Check2" name="destCategories[]" >
  <label class="form-check-label" for="Check2">
    Hill Stations
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value=3 id="Check3" name="destCategories[]" >
  <label class="form-check-label" for="Check3">
    Couple/Honeymoon
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value=4 id="Check4" name="destCategories[]" >
  <label class="form-check-label" for="Check4">
    National Parks
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value=5 id="Check5" name="destCategories[]" >
  <label class="form-check-label" for="Check5">
    Beaches
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value=6 id="Check6" name="destCategories[]" >
  <label class="form-check-label" for="Check6">
    Waterfalls
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value=7 id="Check7" name="destCategories[]" >
  <label class="form-check-label" for="Check7">
    Monuments of National Heritage
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value=8 id="Check8" name="destCategories[]" >
  <label class="form-check-label" for="Check8">
    Metropolitian Cities
  </label>
</div>
</div>

 <button type="submit" name="kycDone" class="btn btn-primary">Submit</button>

</form>
</div>


<script type="text/javascript">
function checkBoxLimit() {
	var checkBoxGroup = document.forms['form1']['destCategories[]'];
	var limit = 3;
	for (var i = 0; i < checkBoxGroup.length; i++) {
		checkBoxGroup[i].onclick = function() {
			var checkedcount = 0;
			for (var i = 0; i < checkBoxGroup.length; i++) {
				checkedcount += (checkBoxGroup[i].checked) ? 1 : 0;
			}
			if (checkedcount > limit) {
				console.log("You can select maximum of " + limit + " checkboxes.");
				alert("You can select maximum of " + limit + " checkboxes.");
				this.checked = false;
			}
		}
	}
}

</script>
<script type="text/javascript">checkBoxLimit()</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
