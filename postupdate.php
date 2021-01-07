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
        <title>Update Page post</title>
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
				echo "Updating post information: " . $_POST["postID"] . " " . $_POST["post_title"] . " " . $_POST["post_text"]. "..."; 
				$sql = 'UPDATE post SET postID = "' .$_POST["postID"] . '", post_title = "' .$_POST["post_title"] . '", post_text = "' .$_POST["post_text"]. '"';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "Record updated successfully";
			?>
				<p>You will be redirected momentarily</p>
				<script>
					var timer = setTimeout(function() {
						window.location='postPage.php'
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
