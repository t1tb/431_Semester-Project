<?php 
require 'localdatabase.php';

if(isset($_POST['userID']))
{
  $id = $_POST['userID'];
}
else
{
  echo '<script>alert("No User Is Selected!\nYou will be redirected in 1 second upon clicking \'OK\'")</script>';
  header("Refresh:1; url=userhome.php");
  exit;
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = 'SELECT userID, first_name, last_name, country, email, Program_hobby, university FROM user WHERE userID = "' . $id . '"';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
if($row = $q->fetch())
{
  
  $fname = $row['first_name'];
  $lname = $row['last_name'];
  $country = $row['country'];
  $email = $row['email'];
  $hobby = $row['Program_hobby'];
  $uni = $row['university'];
}
else
{
  echo '<script>alert("No Profile Is Found! The user might have deleted his/her account.\nYou will be redirected in 1 second upon clicking \'OK\'")</script>';
  header("Refresh:1; url=userhome.php");
  exit;
}
?>
<!DOCTYPE HTML>

<head>
  
<title>Profile</title>   
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

<body>
<div class="container">
<div>
  <div>
    <div class="card h-100">
      <div class="card-body">
        <div class="account-settings">
          <div class="user-profile">
            
            <h5 class="user-name"><?php echo htmlspecialchars($fname); ?> <?php echo htmlspecialchars($lname); ?></h5>
            <h6 class="user-email"><?php echo htmlspecialchars($email); ?></h6>
          </div>
          
          <br><br>
          <div class="about">
            <h5 class="mb-2 text-primary">About</h5>
            <p><?php echo htmlspecialchars($fname); ?> enjoy doing <?php echo htmlspecialchars($hobby); ?>.</p>
          </div>
          <br><br>
          <div class="about">
            <h5 class="mb-2 text-primary">Country</h5>
            <p><?php 
            if (isset($country) && $country != null)
            {
              echo htmlspecialchars($country);
            } ?></p>
          </div>
          <br><br>
          <div class="about">
            <h5 class="mb-2 text-primary">University</h5>
            <p><?php 
            if (isset($uni) && $uni != null)
            {
              echo htmlspecialchars($uni);
            }
            ?></p>
          </div>

          <div class="row gutters">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <span class="text-left">
                <button type="button" onclick = "location='userhome.php'" class="btn btn-secondary">Cancel</button>
              </span>
              <span class="text-right" style = "float:right;">
                <?php
                try {
                $id = $_POST['userID'];
                
                if(!isset($id) || $id == null || !isset($_SESSION['userID']))
                {
                  echo '<script>alert("No User Is Selected or You Have Not Logged In!\nYou will be redirected in 1 second upon clicking \'OK\'")</script>';
                  header("Refresh:1; url=userhome.php");
                  exit;
                }

                  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                  $sql = 'SELECT userID FROM friend WHERE userID = "' . $_SESSION['userID'] . '" AND friendID = "' .$id. '"';
                  $q = $pdo->query($sql);

                  if(!($q->rowCount() > 0))
                  {
                    echo '<form action="add_friend.php" method="post"><input type="hidden" name = "friendID" value="' .htmlspecialchars($id). '"><input type="submit" class="btn btn-primary" value ="Add Friends"></form>';
                  }
                  else
                  {
                    echo '<button class="btn btn-secondary" >Already Friends</button>';
                  }

              } catch (PDOException $e) {
                  die("Could not connect to the database $dbname :" . $e->getMessage());
              }
                ?>
              </span>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
</body>
</html>