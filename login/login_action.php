<?php
session_start();

require 'localdatabase.php';

try {
	$id = $_POST['userID'];
	$pwd = $_POST['password'];
  $_SESSION['userID'] = $_POST['userID'];
	$_SESSION['password'] = $_POST['password'];
	//if($_MODULE['id'] && $_MODULE['pwd']){
	if($id == null || $pwd == null)
	{
		echo '<script>alert("Please enter User ID/Password!\nYou will be redirected in 1 second upon clicking \'OK\'")</script>';
		header("Refresh:1; url=User_login.html");
		exit;
	}

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = 'SELECT password FROM user WHERE userID = "' . $id . '"';
    $q = $pdo->query($sql);

    if(!($q->rowCount() > 0))
	{
		echo '<script>alert("User ID not found. Click \'Sign up\' to register a new account. \nYou will be redirected in 1 second upon clicking \'OK\'")</script>';
		header("Refresh:1; url=User_login.html");
		exit;
	}
    $q->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

$pass = $q->fetch();
?>
<!DOCTYPE HTML>

<head>
<style type=text/css>

html{margin:0 auto;max-width:50em}
body{font-family:'Century Gothic', sans-serif;text-align: center;background:#272727;color:#94D4F5;}
h1{font-size:150%;font-weight:700;text-transform:uppercase;
letter-spacing:0.18em;padding:1em 0 0 0;line-height:3px;}
/*a:visited{color: #E1E1E1;}*/

</style>
</head>

<body>
  
	 <h1  style = "margin-top:10em">
	 <?php 
	 //echo htmlspecialchars($pass['password']) ;


	if($pass['password'] == "" . $_POST["password"] . "")
	{

		echo '<script>alert("Login Successful!")</script>';

		header("Refresh:1; url=userhome.php");
	}
	else
	{
		echo '<script>alert("Wrong User ID/Password. Please check and re-enter. \nYou will be redirected in 1 second upon clicking \'OK\'")</script>';
		header("Refresh:1; url=User_login.html");
		
	 
	}
	?></h1>


</body>

</html>