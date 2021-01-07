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
    $sql = 'SELECT userID, first_name, last_name, country, email, Program_hobby, university FROM user';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Users Page</title>
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
          <h1>Users</h1>
        </div>
        <div id="container">
            <br><br><h3>Click below to go back to the Home page</h3>
                <?php echo '<form action="/index.html" method="post"><input type="submit" value="Home"></form>'; ?>
            <br><h3>Click below to navigate to the Reports page</h3>
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

            <br><h2>Insert a new user:</h2>
            <form action="/insert.php" method="post">
                <table>
                    <tr><td>User ID:</td><td><input type="text" id="userID" name="userID" value=""></td></tr>
                    <tr><td>First name:</td><td><input type="text" id="first_name" name="first_name" value=""></td></tr>
                    <tr><td>Last name:</td><td><input type="text" id="last_name" name="last_name" value=""></td></tr>
            <tr><td>Country:</td><td><input type="text" id="country" name="country" value=""></td></tr>
                    <tr><td>Email:</td><td><input type="text" id="email" name="email" value=""></td></tr>
            <tr><td>Program Hobby:</td><td><input type="text" id="Program_hobby" name="Program_hobby" value=""></td></tr>
                    <tr><td>University:</td><td><input type="text" id="university" name="university" value=""></td></tr>
                </table>
                <br><input type="submit" value="INSERT">
            </form>
            <br><h2>Update user information:</h2>
            <form action="/update.php" method="post">
                <table>
                    <tr><td>User ID:</td><td><input type="text" id="userID" name="userID" value=""></td></tr>
                    <tr><td>First name:</td><td><input type="text" id="first_name" name="first_name" value=""></td></tr>
                    <tr><td>Last name:</td><td><input type="text" id="last_name" name="last_name" value=""></td></tr>
            <tr><td>Country:</td><td><input type="text" id="country" name="country" value=""></td></tr>
                    <tr><td>Email:</td><td><input type="text" id="email" name="email" value=""></td></tr>
            <tr><td>Program Hobby:</td><td><input type="text" id="Program_hobby" name="Program_hobby" value=""></td></tr>
                    <tr><td>University:</td><td><input type="text" id="university" name="university" value=""></td></tr>
                </table>
                <br><input type="submit" value="UPDATE">
            </form>
            <br>


            <br><br><h2>Current List of Users</h2>
            <table border=1 cellspacing=5 cellpadding=5>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>Hobby</th>
                        <th>University</th>
                        <th>Delete?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['userID']); ?></td>
                            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['country']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['Program_hobby']); ?></td>
                            <td><?php echo htmlspecialchars($row['university']); ?></td>
                            <td><?php echo '<form action="/delete.php" method="post"><input type="submit" value="DELETE"><input type="hidden" name="userID" value="' . htmlspecialchars($row['userID']) . '"></form>'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
		<br><br>
    </body>
</div>
</html>
