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
        <title>Login Page</title>
        <style>
        .header {
          padding: 30px;
          text-align: center;
          font-size: 30px;
        }
        </style>
    </head>
    <body>
        <div class="header">
          <h1>User Login</h1>
        </div>
        <div id="container">
		<br><br><h1>Please enter your userID:</h1>
		<form action="/userHome.php" method="post">
			<table>
				<tr><td>User ID:</td><td><input type="text" id="userID" name="userID" value=""></td></tr>
			</table>
			<br><input type="submit" value="LOGIN">
		</form>
		<br><br><br>
    </body>
</div>
</html>
