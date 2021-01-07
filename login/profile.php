<?php 
require 'localdatabase.php';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = 'SELECT userID, first_name, last_name, country, email, Program_hobby, university FROM user WHERE userID = "' . $_SESSION['userID'] . '"';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
if($row = $q->fetch())
{
  $id = $_SESSION['userID'];
  $fname = $row['first_name'];
  $lname = $row['last_name'];
  $country = $row['country'];
  $email = $row['email'];
  $hobby = $row['Program_hobby'];
  $uni = $row['university'];
}
else
{
  echo '<script>alert("You have not logged in!\nYou will be redirected in 1 second upon clicking \'OK\'")</script>';
  header("Refresh:1; url=User_login.html");
  exit;
}
?>
<!DOCTYPE HTML>

<head>
  
<title>Your Profile</title>   
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


</style>
</head>

<body>
<div class="container">
<div class="row gutters">
  <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
      <div class="card-body">
        <div class="account-settings">
          <div class="user-profile">
            
            <h5 class="user-name"><?php echo htmlspecialchars($fname); ?> <?php echo htmlspecialchars($lname); ?></h5>
            <h6 class="user-email"><?php echo htmlspecialchars($email); ?></h6>
          </div>
          <br><br><br>
          <div class="about">
            <h5 class="mb-2 text-primary">About</h5>
            <p>You enjoy doing <?php echo htmlspecialchars($hobby); ?>.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
      <form class="card-body" action="user_update.php" method="post">
        <div class="row gutters">

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h6 class="mb-3 text-primary">Personal Details</h6>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" value = "<?php echo htmlspecialchars($fname); ?>" required>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
              <label for="eMail">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email ID" value = "<?php echo htmlspecialchars($email); ?>"  required>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
              <label for="LastName">Last Name</label>
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value = "<?php echo htmlspecialchars($lname); ?>"  required>
            </div>
          </div>
          
          
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
              <label for="Country">Country</label>
              <input type="name" class="form-control" id="country" name="country" placeholder="Enter Country" value = "<?php echo htmlspecialchars($country); ?>"  required>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
              <label for="University">University</label>
              <input type="name" class="form-control" id="university" name="university"placeholder="Enter University" value = "<?php echo htmlspecialchars($uni); ?>"  required>
            </div>
          </div>
        
        </div>
        <div class="row gutters">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="text-right">
              <button type="button" onclick = "location='userhome.php'" class="btn btn-secondary">Cancel</button>
              <input type="submit" class="btn btn-primary" value ="Update">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  
</div>
</div>
</body>
</html>