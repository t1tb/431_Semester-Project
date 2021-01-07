<?php
session_cache_limiter('private, must-revalidate');

session_start();

?>


<!DOCTYPE HTML>

<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type=text/css>

html{margin:0 auto;max-width:50em}
body{font-family:'Century Gothic', sans-serif;background:#272727;color:#94D4F5;}
h1{font-size:150%;font-weight:700;text-transform:uppercase;
letter-spacing:0.18em;padding:1em 0 0 0;line-height:3px;text-align: center;}
h2{font-size:150%;font-weight:700;text-transform:capitalize;
letter-spacing:0.18em;padding:1em 0 0 0;line-height:3px;text-align: center;}
h3{text-align: center;}
h4{font-size:200%;font-weight:700;text-transform:uppercase;
letter-spacing:0.18em;padding:1em 0 0 0;line-height:3px;text-align: center;color:#E1E1E1;}
h5{font-size:130%;font-weight:700;color:#E1E1E1;}
p{font-size:120%;color:#E1E1E1;text-transform:capitalize;}
/*a:visited{color: #E1E1E1;}*/

</style>
</head>

<h4>Sign Up</h4>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'ljw5390';
$password = 'Group18';
$host = 'localhost';
$dbname = 'group18_431W';

try {


	if (isset($_POST['uid']))
	{
		$id = $_POST['uid'];
	}
	if (isset($_SESSION['userID']))
	{
		$id = $_SESSION['userID'];
	}
	//$pwd = $_POST['password'];
	//if($_MODULE['id'] && $_MODULE['pwd']){
	if(!isset($id) || $id == null)
	{
		echo '<script>alert("Please enter User ID!\nYou will be redirected in 1 second upon clicking \'OK\'")</script>';
		header("Refresh:1; url=signup1.php");
		exit;
	}

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = 'SELECT first_name FROM user WHERE userID = "' . $id . '"';
    $q = $pdo->query($sql);

    if($q->rowCount() > 0)
	{
		echo '<h2>This User ID is already registered.... </h2>';
		echo '<h2>Please try another.</h2>';
		echo "<h3><br>You will be redirected in 2 seconds...</h3>";
		header("Refresh:2; url=signup1.php");
		exit;
	}

	
	if (!isset($_SESSION['userID']))
	{
		$_SESSION['userID']= $id;
	}
	echo "<h3><br><br>Congratulations! <br><br>You can use \"" . $id . '" as your login User ID! </h3>';

    $q->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

$pass = $q->fetch();
?>


<body>
  
	 

	<div style = 'width:340px; margin:0 auto; margin-top:4em;'>
	<p>please continue to finish up your information</p>
	<p>Fields with * Mark are required fields</p>
	<form style = "" action="signup_process2.php" method="post">

		<div class="form-group">
			
			<input style ="display: none;" type="text" id="userID" name="userID" value="<?php echo htmlspecialchars($id) ?>">

			<h5>Your Email Address*</h5>
			<input class = "form-control" type="text" id="email" name="email" placeholder="Enter your email address" value="" required>
			<h5>Your First Name*</h5>
			<input class = "form-control" type="text" id="first_name" name="first_name" placeholder="Enter your first name" value="" required>
			<h5>Your Last Name*</h5>
			<input class = "form-control" type="text" id="last_name" name="last_name" placeholder="Enter your last name" value="" required>
      
      <h5>Your Country*</h5>
			<input class = "form-control" type="text" id="country" name="country" value="">
			<h5>Your Hobby*</h5>
			<input class = "form-control" type="text" id="Program_hobby" name="Program_hobby" value="">
			<h5>Your University*</h5>
			<input class = "form-control" type="text" id="university" name="university" value="">

			<h5>Password*</h5>
			<input class = "form-control" type="password" id="password" name="password" placeholder="Enter your password" value="" required>
			<h5>Re-Enter Password*</h5>
			<input class = "form-control" type="password" id="passwordre" name="passwordre" placeholder="Re-enter your password" value="" required>
		</div>
		
		<input class="btn btn-primary" align = "right" style  = "float: right;"type = "submit" value = "Next">
		<!-- <button class="btn btn-default">btn btn-default</button>
		<button class="btn btn-secondary">btn btn-secondary</button>
        <button class="btn btn-primary">btn btn-primary</button>
        <button class="btn btn-link">btn btn-link</button>
        <button class="btn btn-success">btn btn-success</button>
        <button class="btn btn-info">btn btn-info</button>
        <button class="btn btn-warning">btn btn-warning</button>
        <button class="btn btn-danger">btn btn-danger</button> -->
	</form>
	<a href = 'http://localhost/v/login/signup1.php' ><button class="btn btn-default">Back</button></a>
	</div>


</body>

</html>