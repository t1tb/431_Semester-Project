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
        <title>Delete Page user_group</title>
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
                echo "Deleting user: " . $_POST["name"] . "..."; 
                $sql = 'DELETE FROM user_groups WHERE name = "' . $_POST["name"] . '"';
                try {
                    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conn->exec($sql);
                    echo "User deleted successfully";
                ?>
                <p>You will be redirected momentarily</p>
                <script>
                    var timer = setTimeout(function() {
                        window.location='user_groupsPage.php'
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
