<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'ath5234';
$password = 'Group18';
$host = 'localhost';
$dbname = 'group18_431W';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Page comment</title>
        <style>
        .header {
          padding: 60px;
          text-align: center;
          font-size: 15px;
        }
        </style>
    </head>
    <body>
        <div class="header">
		<h1>
			<?php 
				echo "Updating user information: " . $_POST["commentID"] . " " . $_POST["userID"] . " " . $_POST["replyID"] . " " . $_POST["comment_text"]. "..."; 
				$sql = 'UPDATE comment SET commentID = "' .$_POST["commentID"] . '", userID = "' .$_POST["userID"] . '", replyID = "' .$_POST["replyID"] . '", comment_text = "' .$_POST["comment_text"]. '"';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "Record updated successfully";
			?>
				<p>You will be redirected momentarily</p>
				<script>
					var timer = setTimeout(function() {
						window.location='commentPage.php'
					}, 4000);
				</script>
			<?php
				} catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
				$conn = null;
			?>
		</h1>
    </body>
</div>
</html>
