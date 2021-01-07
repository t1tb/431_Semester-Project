<?php

require 'localdatabase.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Page</title>
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
				// echo "Updating user information: " . $_POST["userID"] . " " . $_POST["first_name"] . " " . $_POST["last_name"] . " " . $_POST["country"] . " " . $_POST["email"] . " " . $_POST["Program_hobby"] . " " . $_POST["university"] . "..."; 
				$sql = 'UPDATE user SET first_name = "' .$_POST["first_name"] . '", last_name = "' .$_POST["last_name"] . '", country = "' .$_POST["country"] . '", email = "' .$_POST["email"] . '", university = "' .$_POST["university"] . '" WHERE userID = "' .$_SESSION["userID"] . '"';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
					if($conn->exec($sql))
					{
						echo '<script>alert("Successfully updated!\nYou will be redirected in 1 second upon clicking \'OK\'")</script>';
						  header("Refresh:1; url=profile.php");
						  exit;
					}
					else
					{
						echo '<script>alert("Failed to update. Please try again\nYou will be redirected in 1 second upon clicking \'OK\'")</script>';
						  header("Refresh:1; url=profile.php");
						  exit;
					}
			?>
				<p>You will be redirected momentarily</p>
				<script>
					var timer = setTimeout(function() {
						window.location='start.php'
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
