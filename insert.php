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
        <title>Inserting User</title>
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
				echo "Inserting new user: " . $_POST["userID"] . ", " . $_POST["first_name"] . ", " . $_POST["last_name"] . ", " . $_POST["country"] . ", " . $_POST["email"] . ", " . $_POST["Program_hobby"] . ", " . $_POST["university"] . "...";
				$sql = 'INSERT INTO user(userID, first_name, last_name, country, email, Program_hobby, university, password) ';
				$sql = $sql . 'VALUES ("'.$_POST["userID"] . '","' . $_POST["first_name"] . '","' . $_POST["last_name"] . '","' . $_POST["country"] . '","' . $_POST["email"] . '","' . $_POST["Program_hobby"] . '","' . $_POST["university"] . '","' . $_POST["userID"] . '")';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "New record created successfully";
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
    </div>
    </body>
</div>
</html>
