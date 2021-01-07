<?php
session_cache_limiter('private, must-revalidate');

if(!isset($_SESSION))
{
	SESSION_START();
}

?>

<!DOCTYPE HTML>

<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
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

<h3><?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'ljw5390';
$password = 'Group18';
$host = 'localhost';
$dbname = 'group18_431W';

try {

	if(isset($_SESSION['userID']))
	{
		$id = $_SESSION['userID'];
	}
	else
	{
		echo '<h2>You have not entered Your User ID</h2>';
		//echo "<a href = 'http://localhost/v/login/signup1.php'><input class="btn btn-default" type="button" value="Back"></a>";
		exit;
	}

	$email = $_POST['email'];
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$pwd = $_POST['password'];
	$pwdre = $_POST['passwordre'];

	if($pwd != $pwdre)
	{
		echo '<script>alert("2 Passwords do not match!\nYou will be redirected in 1 second upon clicking \'OK\'")</script>';
		header("Refresh:1; url=signup_process.php");
		exit;
	}
	
	// if($pwd == null || $email == null || $fname == null || $lname == null || $pwdre == null)
	// {
	// 	echo '<script>alert("Please fill all required fields!\nYou will be redirected in 1 second upon clicking \'OK\'")</script>';
	// 	echo "" . $_SESSION['userID'] . "";
	// 	header("Cache-control: private, must-revalidate; Refresh:1; url=signup_process.php");
	// 	//header("  ");
	// 	exit;
	// }

?></h3>


<body>
<h2><?php
    echo "Inserting new user: " . $_POST["userID"] . ", " . $_POST["first_name"] . ", " . $_POST["last_name"] . ", " . $_POST["country"] . ", " . $_POST["email"] . ", " . $_POST["Program_hobby"] . ", " . $_POST["university"] . "...";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'INSERT INTO user(userID, first_name, last_name, country, email, Program_hobby, university, password) ';
    $sql = $sql . 'VALUES ("'.$_POST["userID"] . '","' . $_POST["first_name"] . '","' . $_POST["last_name"] . '","' . $_POST["country"] . '","' . $_POST["email"] . '","' . $_POST["Program_hobby"] . '","' . $_POST["university"] . '","' . $_POST["password"] . '")';

	if($conn = exec($sql))
	{
		echo "Successfully Registered";
	}
 

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?></h2>
</body>

</html>