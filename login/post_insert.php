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
	 	$sql = 'INSERT INTO post(post_title, post_text) VALUES ("' . $_POST["post_title"] . '","' . $_POST["post_text"]. '")';
		try {
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if($conn->exec($sql))
			{
				$sql = 'SELECT postID FROM post ORDER BY postID DESC LIMIT 1';
				$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
				$q = $pdo->query($sql);
    			$q->setFetchMode(PDO::FETCH_ASSOC);
    			if ($row = $q->fetch())
    			{
    				$sql = 'INSERT INTO user_post(postID, userID) VALUES ("' . $row["postID"] . '","' . $_SESSION["userID"]. '")';
    				if($conn->exec($sql))
    				{
    					echo '<script>alert("Operation Successful!")</script>';
						header("Refresh:1; url=userhome.php");
    				}
    				
    			}
				
			}
			
			
		} catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
		$conn = null;

	?></h1>


</body>

</html>