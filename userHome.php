<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'ath5234';
$password = 'Group18';
$host = 'localhost';
$dbname = 'group18_431W';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = 'SELECT first_name, last_name FROM user WHERE userID = "' . $_POST["userID"] . '" ' ;
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
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
        <h1><?php $row = $q->fetch();
        echo "Welcome " . $row['first_name'] . " " . $row['last_name']  . "!";
        ?></h1>
        </div>
        <div id="container">
          <br><br><h2>Add a new friend</h2>
              <form action="/friendinsert.php" method="post">
            <table>
                <tr><td>Friend ID:</td><td><input type="text" id="friendID" name="friendID" value=""></td></tr>
            </table>
            <input type="hidden" name="userID" value=$_POST["userID"]>
            <br><input type="submit" value="ADD">
        </form>
		      <br><br><h2>Create a new post</h2>
              <form action="/postinsert.php" method="post">
            <table>
                <tr><td>Post title:</td><td><input type="text" id="post_title" name="post_title" value=""></td></tr>
                <tr><td>Post text:</td><td><input type="text" id="post_text" name="post_text" value=""></td></tr>
            </table>
            <br><input type="submit" value="CREATE">
        </form>
		    <br><br><h2>Create a new reply to a post</h2>
              <form action="/replyinsert.php" method="post">
            <table>
                <tr><td>Post ID:</td><td><input type="text" id="post_title" name="post_title" value=""></td></tr>
                <tr><td>Reply message:</td><td><input type="text" id="post_text" name="post_text" value=""></td></tr>
            </table>
            <br><input type="submit" value="CREATE">
        </form>
        <br><br><h2>Like a reply</h2>
              <form action="/likeinsert.php" method="post">
            <table>
                <tr><td>Reply ID:</td><td><input type="text" id="post_title" name="post_title" value=""></td></tr>
            </table>
            <br><input type="submit" value="LIKE">
        </form>
        </form>
        <br><br><h2>Create a group</h2>
              <form action="/user_groupsinsert.php" method="post">
            <table>
                <tr><td>Group ID:</td><td><input type="text" id="groupID" name="groupID" value=""></td></tr>
                <tr><td>Group name:</td><td><input type="text" id="name" name="name" value=""></td></tr>
            </table>
            <br><input type="submit" value="LIKE">
        </form>
        </form>
        <br><br><h2>Join a group</h2>
              <form action="/groupinsert.php" method="post">
            <table>
                <tr><td>Group name:</td><td><input type="text" id="name" name="name" value=""></td></tr>
            </table>
            <br><input type="submit" value="LIKE">
        </form>
		<br><br><br>
    </body>
</div>
</html>
