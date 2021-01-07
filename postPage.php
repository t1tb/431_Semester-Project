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
    $sql = 'SELECT postID, post_title, post_text FROM post';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Posts</title>
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
          <h1>Posts</h1>
        </div>
        <div id="container">
            <br><br><h3>Click below to navigate to the Reports page</h3>
                <?php echo '<form action="/reports.php" method="post"><input type="submit" value="Reports"></form>'; ?>
            <br><br><h3>Click below to navigate to different tables</h3>
        <form method="post" action="">
				  <label for="tableChoice">Tables: </label>
          <select name="tableChoice" id="tableChoice">
            <option value="1">users</option>
            <option value="2">user_post</option>
            <option value="3">friend</option>
            <option value="4">groups</option>
            <option value="5">user_groups</option>
            <option value="6">likes</option>
            <option value="7">comment</option>
            <option value="8">post</option>
            <option value="9">reply</option>
          </select><input type="submit" name="submit"/>
      </form><?php if(isset($_POST['submit'])) 
{ $part = $_POST['tableChoice'];
switch ($part) 
{ case "1" : header( "Location: http://cmpsc431-s3-g-18.vmhost.psu.edu/start.php" );
break;
case "2" : header( "Location: http://cmpsc431-s3-g-18.vmhost.psu.edu/user_postPage.php" );
break;
case "3" : header( "Location: http://cmpsc431-s3-g-18.vmhost.psu.edu/friendPage.php" );
break;
case "4" : header( "Location: http://cmpsc431-s3-g-18.vmhost.psu.edu/groupsPage.php" );
break;
case "5" : header( "Location: http://cmpsc431-s3-g-18.vmhost.psu.edu/user_groupsPage.php" );
break;
case "6" : header( "Location: http://cmpsc431-s3-g-18.vmhost.psu.edu/likesPage.php" );
break;
case "7" : header( "Location: http://cmpsc431-s3-g-18.vmhost.psu.edu/commentPage.php" );
break;
case "8" : header( "Location: http://cmpsc431-s3-g-18.vmhost.psu.edu/postPage.php" );
break;
case "9" : header( "Location: http://cmpsc431-s3-g-18.vmhost.psu.edu/replyPage.php" );
break;
}
} ?>
            <br><br><h2>Current List of Posts</h2>
            <table border=1 cellspacing=5 cellpadding=5>
                <thead>
                    <tr>
                        <th>Post ID</th>
                        <th>Post title</th>
                        <th>Post text</th>
                        <th>Delete?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['postID']) ?></td>
                            <td><?php echo htmlspecialchars($row['post_title']); ?></td>
                            <td><?php echo htmlspecialchars($row['post_text']); ?></td>
                            <td><?php echo '<form action="/postdelete.php" method="post"><input type="submit" value="DELETE"><input type="hidden" name="postID" value="' . htmlspecialchars($row['postID']) . '"></form>'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <br><h2>Insert a new post:</h2>
        <form action="/postinsert.php" method="post">
            <table>
                <tr><td>Post ID:</td><td><input type="text" id="postID" name="postID" value=""></td></tr>
                <tr><td>Post title:</td><td><input type="text" id="post_title" name="post_title" value=""></td></tr>
                <tr><td>Post text:</td><td><input type="text" id="post_text" name="post_text" value=""></td></tr>
            </table>
            <br><input type="submit" value="INSERT">
        </form>
        <br><h2>Update post information:</h2>
        <form action="/postupdate.php" method="post">
            <table>
                <tr><td>Post ID:</td><td><input type="text" id="postID" name="postID" value=""></td></tr>
                <tr><td>Post title:</td><td><input type="text" id="post_title" name="post_title" value=""></td></tr>
                <tr><td>Post text:</td><td><input type="text" id="post_text" name="post_text" value=""></td></tr>
            </table>
            <br><input type="submit" value="UPDATE">
        </form>
		<br><br><br>
    </body>
</div>
</html>