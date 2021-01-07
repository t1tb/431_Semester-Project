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
    $sql = 'SELECT U.userID, U.first_name, U.last_name, count(UP.postID) FROM user as U, user_post as UP WHERE U.userID = UP.userID GROUP BY U.userID ORDER BY count(UP.postID) ' . $_POST["sortPref"];
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Users sorted by posts</title>
        <style type=text/css>
        body{font-family:'Century Gothic', sans-serif;background:#272727;color:#E1E1E1;}
        .header {
          padding: 60px;
          text-align: center;
          font-size: 15px;
        }

        .vv {
          margin: 1em 0;
          min-width: 300px;
        }
        .vv tr {
          border-top: 1px solid #ddd;
          border-bottom: 1px solid #ddd;
        }
        .vv th {
          display: none;
        }
        .vv td {
          display: block;
        }
        .vv td:first-child {
          padding-top: .5em;
        }
        .vv td:last-child {
          padding-bottom: .5em;
        }
        .vv td:before {
          content: attr(data-th) ": ";
          font-weight: bold;
          width: 6.5em;
          display: inline-block;
        }
        @media (min-width: 480px) {
          .vv td:before {
            display: none;
          }
        }
        .vv th, .vv td {
          text-align: left;
        }
        @media (min-width: 480px) {
          .vv th, .vv td {
            display: table-cell;
            padding: .25em .5em;
          }
          .vv th:first-child, .vv td:first-child {
            padding-left: 0;
          }
          .vv th:last-child, .vv td:last-child {
            padding-right: 0;
          }
        }

        .vv {
          background: #34495E;
          color: #fff;
          border-radius: .4em;
          overflow: hidden;
        }
        .vv tr {
          border-color: #46637f;
        }
        .vv th, .vv td {
          margin: .5em 1em;
        }
        @media (min-width: 480px) {
          .vv th, .vv td {
            padding: 1em !important;
          }
        }
        .vv th, .vv td:before {
          color: #dd5;
        }
        
        </style>
    </head>
    

<body align = 'center'>
<br><br>
<h2><?php echo 'Users sorted by their number of posts in ' . $_POST["sortPref"] . ' order'; 
?></h2>
    <div align = 'center'>
            <table class = 'vv' ><!-- border=1 cellspacing=5 cellpadding=5 -->
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Num of Posts</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['userID']); ?></td>
                            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['count(UP.postID)']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>