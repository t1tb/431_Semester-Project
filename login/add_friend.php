<?php 
require 'localdatabase.php';

if(!isset($_SESSION['userID']))
  {
    echo '<script>alert("You Have Not Logged In!\nYou will be redirected in 1 second upon clicking \'OK\'")</script>';
    header("Refresh:1; url=User_login.html");
    exit;
  }

if(isset($_POST['friendID']))
{
  $fid = $_POST['friendID'];
}
else
{
  echo '<script>alert("No User Is Selected!\nYou will be redirected in 1 second upon clicking \'OK\'")</script>';
  header("Refresh:1; url=userhome.php");
  exit;
}


$sql = 'INSERT INTO friend(userID, friendID) VALUES ("' . $_SESSION["userID"] . '","' . $fid. '")';
    try {
      $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if ($conn->exec($sql))
      {
        echo '<script>alert("Successfully Added Friend!")</script>';
        header("Refresh:1; url=userhome.php");
      }

    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;

?>
<!DOCTYPE HTML>

<head>
  
<title>Add Friend</title>   
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<style type=text/css>

body{margin-top:20px;
color: #bcd0f7;
    background: #1A233A;
    font-family:'Century Gothic', sans-serif;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
}
.account-settings .about {
    margin: 1rem 0 0 0;
    font-size: 0.8rem;
    text-align: center;
}
.card {
    background: #272E48;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
.form-control {
    border: 1px solid #596280;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #1A233A;
    color: #bcd0f7;
}
p{font-size: 150%;}
h5{font-size: 170%;}


</style>
</head>

</html>