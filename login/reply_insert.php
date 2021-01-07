<?php
session_start();

require 'localdatabase.php';

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
	 	$sql = 'INSERT INTO reply(userID, postID, reply_text) VALUES ("' . $_POST["userID"] . '","' . $_POST["postID"] . '","' . $_POST["reply_text"] . '")';
		try {
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn->exec($sql);
			echo '<script>alert("Operation Successful!")</script>';
			header("Refresh:1; url=userhome.php");
		} catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
		$conn = null;

	?></h1>


</body>

</html>