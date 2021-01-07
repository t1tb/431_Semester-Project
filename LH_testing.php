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
        <title>Reports Page</title>
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
          <h1>Reports</h1>
        </div>
        <div id="container">
        <br><br><h3>Click below to navigate to the Functions page</h3>
                <?php echo '<form action="/start.php" method="post"><input type="submit" value="Functions"></form>'; ?>
            <br>
		<br><h2>1) Get the number of posts for each user</h2>
		<form action="/insert.php" method="post">
			<table>
				<label for="sortPref">Sort by: </label>
        <select name="sortPref" id="sortPref">
          <option value="ASC">Ascending</option>
          <option value="DESC">Descending</option>
        </select>
			</table>
			<br><input type="submit" value="EXECUTE">
		</form>
    <br><h2>2) Get the number of comments for each user</h2>
		<form action="/insert.php" method="post">
			<table>
				<label for="sortPref">Sort by: </label>
        <select name="sortPref" id="sortPref">
          <option value="ASC">Ascending</option>
          <option value="DESC">Descending</option>
        </select>
			</table>
			<br><input type="submit" value="EXECUTE">
		</form>
    <br><h2>3) Sort replies on a post by their number of likes</h2>
		<form action="/insert.php" method="post">
			<table>
        <tr><td>Post ID:</td><td><input type="text" id="postID" name="postID" value=""></td></tr>
        <label for="sortPref">Sort by: </label>
        <select name="sortPref" id="sortPref">
          <option value="ASC">Ascending</option>
          <option value="DESC">Descending</option>
        </select>
			</table>
			<br><input type="submit" value="EXECUTE">
		</form>
    <br><h2>4) Get all friends of a user</h2>
		<form action="/111111111111.php" method="post">
			<table>
				<tr><td>User ID:</td><td><input type="text" id="userID" name="userID" value=""></td></tr>
			</table>
			<br><input type="submit" value="EXECUTE">
		</form>
   <br><h2>5) Add a like to all replies of a user:</h2>
		<form action="/feature9.php" method="post">
			<table>
				<tr><td>User ID 1 (gives likes):</td><td><input type="text" id="userID" name="userID" value=""></td></tr>
				<tr><td>User ID 2 (receives likes):</td><td><input type="text" id="userID" name="userID" value=""></td></tr>
			</table>
			<br><input type="submit" value="EXECUTE">
		</form>
    <br><h2>6) Get the names of every user in a group</h2>
		<form action="/insert.php" method="post">
			<table>
				<tr><td>Group Name:</td><td><input type="text" id="group_name" name="group_name" value=""></td></tr>
			</table>
			<br><input type="submit" value="EXECUTE">
		</form>
    <br><h2>7) Get total posts and replies for friends of a user in a group</h2>
		<form action="/report7.php" method="post">
			<table>
				<tr><td>User ID:</td><td><input type="text" id="userID" name="userID" value=""></td></tr>
        <tr><td>Group Name:</td><td><input type="text" id="group_name" name="group_name" value=""></td></tr>
			</table>
			<br><input type="submit" value="EXECUTE">
		</form>
		<br><br><br>
    </body>
</div>
</html>
